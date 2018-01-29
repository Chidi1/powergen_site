<?php
	function checkstatus($db, $col_value, $table, $column)	
	{
		#check if row exists in the datatbase to determine either update or input
		$query = "SELECT ".$column." FROM ".$table." WHERE ".$column." = '".$col_value."'";
		//$query_st = sqlite_query($db, $query);
		$row = sqlite_fetch_array($query_st);

		return $row[0];
	}

	function execQuery($db, $query)	
	{	
		//print($query."<br><br>");
		//$query_st = sqlite_query($db, $query);
		$row = sqlite_fetch_array($query_st);

		return $row;
	}
	
	function sqlite_list_tables($db){		#get list of all tables in the database
		//$query_st = sqlite_query($db, "SELECT name FROM sqlite_master WHERE type = 'table' ORDER BY name;");
		return $query_st;
	}

	function sqlite_list_column_data_types($table, $db){		#get list of all datatypes in a table
		$remove_characters = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "(", ")");
		$remove_characters2 = array("[", "]");

		//$query_st = sqlite_query($db, "SELECT name, sql FROM sqlite_master WHERE type = 'table' AND name = '".$table."';");
		$row = sqlite_fetch_array($query_st);
		
		$table_info = str_replace($remove_characters2, "", $row['sql']); #remove all unwanted characters inserted from the sql GUI program
		$column_array = explode(',', $table_info);
		$max_cols = sizeof($column_array);
		
		for ($i=0; $i<$max_cols; $i++)	{
			$column_info_array = explode(' ', trim($column_array[$i]));
			$data_type_array[trim($column_info_array[0])] = trim($column_info_array[1]);
		}
		return $data_type_array;
	}

	function sqlite_check_primarykey($db, $table, $column){		#get list of all tables in the database
		//$query_st = sqlite_query($db, "SELECT name, sql FROM sqlite_master WHERE type = 'table' AND name = '".$table."';");
		$row = sqlite_fetch_array($query_st);
		
		$remove_characters2 = array("[", "]");
		$table_info = str_replace($remove_characters2, "", $row['sql']); #remove all unwanted characters inserted from the sql GUI program
		$column_array = explode(',', $table_info);
		
		$max_cols = sizeof($column_array);
		for ($i=0; $i<$max_cols; $i++)	{
			$pk_check = strpos($column_array[$i], "PRIMARY KEY");
			$col_check = strpos($column_array[$i], "(".$column);		#( signifies the first line of the sql and the PK
			if ($pk_check AND $col_check)
				return $column;		#column name and primary key identifier present so this is our primary key
		}
		return 0;
	}

	function sqlite_check_data_type($db, $table, $column, $date_type){		#get data for a particular column
		$date_type = " ".$date_type;		#add space to begining of data type to ensure it is not a column name
		//$query_st = sqlite_query($db, "SELECT name, sql FROM sqlite_master WHERE type = 'table' AND name = '".$table."';");
		$row = sqlite_fetch_array($query_st);

		$column_array = explode(",", $row['sql']);
		$max_cols = sizeof($column_array);
		
		for ($i=0; $i<$max_cols; $i++)	{
			$pk_check = strpos(trim($column_array[$i]), $date_type);
			$col_check = strpos($column_array[$i], $column);
			if ($pk_check AND $col_check)
				return $column;		#column name and primary key identifier present so this is our primary key
		}
		return 0;
	}

	function sqlite_empty_database($db){		#get data for a particular column
		$query_st = sqlite_list_tables($db);		#sql_fxn - get the list of all tables in the database
		$leave_table = array("", "bank", "bank", "form", "payment_type", "tax_type", "user", "user_level");#set first value to blank, so zero is not returned
		for ($i=0; $row = sqlite_fetch_array($query_st); $i++){	#fetch all the tables in the database
			$key = array_search($row['name'], $leave_table);
			if(!$key){
				execQuery($db, "DELETE FROM ".$row['name']);
			}
		}
	}

	function insert_update_builder($db, $col_array, $table_name, $pri_key_col, $pri_key_value)
	{		
		$row_check = checkstatus($db, $pri_key_value, $table_name, $pri_key_col);	#this
	
		if ($row_check)	{
			$query = 'UPDATE '.$table_name.' SET ';
			foreach ($col_array as $key => $value) {
				$query .= $key.' = "'.$value.'",';
			}
			$query = substr($query, 0, -1);
			$query .= ' WHERE '.$pri_key_col.' = "'.$pri_key_value.'";';
		}
		else	{	
			$query = 'INSERT INTO '.$table_name.' (';
			foreach ($col_array as $key => $value)
				$query .= $key.', ';
			$query = substr($query, 0, -2);
			$query .= ') VALUES (';
			
			foreach ($col_array as $key => $value)
				$query .= '"'.$value.'", ';
			$query = substr($query, 0, -2);
			$query .= ');';
		}
//print $query.'<br>';
		//$query_st = sqlite_query($db, $query);
	}

	function selectQueryBuilder($db, $table, $column, $col_value, $first_col, $last_col)
	{
		$query = "SELECT * FROM ".$table." limit 1";	#get table column		
		//$query_st = sqlite_query($db, $query);
		$max_cols = sqlite_num_fields($query_st) - $last_col;	#get number of number of columns

		$f_table = array();
		$foreign_key = array();
		$start_query = "SELECT ";	#start select query
		
		for ($i=$first_col; $i<$max_cols; $i++)	{
			$col = sqlite_field_name($query_st, $i);
			$meta_data = sqlite_fetch_field($query_st, $i);	#get column information in the form of an array
			$foreign_key_table = findForeignKeyTable($db, $table, $col);	#page_maker
			
			if($meta_data->type == "date")	#format display if the data type is a date
				$start_query .= "DATE_FORMAT(".$table.".".$col.",' %d %b %Y') as ".$col.",";
			else{
				if(!$foreign_key_table or $meta_data->primary_key)
					$start_query .= $table.".".$col.",";		#add the value from the foreign table
				elseif($foreign_key_table and !$meta_data->primary_key){
					$foreign_table = str_replace("_id", "", $col);
					$f_table[] = $foreign_table;		#store table for use in middle query
					$foreign_key[] = $col;			#store foreignkeys for use in joins
					$start_query .= $foreign_table.".name as ".$foreign_table.",";
				}
			}
		}
		#create middle portion (the tables)
		$mid_query = " FROM ".$table.",";		
		for ($i=0; $i<sizeof($f_table); $i++)	{
			$mid_query .= $f_table[$i].",";
		}
		#create end, ie the table joins
		$end_query = " WHERE ";		
		for ($i=0; $i<sizeof($f_table); $i++)	{
			$end_query .= $table.".".$foreign_key[$i]." = ".$f_table[$i].".".$foreign_key[$i]." and ";
		}
		if($column){
			if(!is_numeric($col_value)){		#can not use like when it is a number have to use equal sign
				if(in_array ($column, $f_table))
					$end_query .= $column.".name like '".$col_value."%' and ";
				else
					$end_query .= $table.".".$column." like '".$col_value."%' and ";
			}
			else {
				if(in_array ($column, $f_table))
					$end_query .= $column.".name = '".$col_value."' and ";
				else
					$end_query .= $table.".".$column." = '".$col_value."' and ";
			}
		}
		
		$new_query = substr($start_query, 0, -1).substr($mid_query, 0, -1).substr($end_query, 0, -4)."ORDER BY ".$table.".".$column;	#remove the trailing comma and the trailing and from $end_query

		return $new_query;
	}

	function addMoreTables($table, $column, $primary_key, $query)
	{
		list($q_select, $q_from) = explode("FROM", $query, 2);
		$q_select = " SELECT ".$column;
		$q_select .= " FROM ".$table.", ".$q_from;
		$query = $q_select." and ".$primary_key;

		return $query;
	}

?>
