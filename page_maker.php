<?php
	function getInputType($status, $col_length, $data_type, $variable, $value, $table_name, $db) {
		#remove all digits and brackets from the data type variable
		$digits = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "(", ")");
		$data_type = str_replace($digits, "", strtolower($data_type));
		
		//$class = "text_field";
		
		$foreign_key_table = findForeignKeyTable($db, $table_name, $variable);	#find any column that is a foreign key, and return the table
		if(!$foreign_key_table){
			if ($data_type == 'int' or $data_type == 'integer' or $data_type == 'real')
				textBox($class, $status, $variable, $value, $col_length);        #html
			elseif ($data_type == 'varchar'){
				textBox($class, $status, $variable, $value, 50);        #html
			}
			elseif ($data_type == 'text')
				textArea($class, $status, $variable, 50, 15, $value);
			elseif ($data_type == 'date')
				display_date_options_multi($status, $value, $variable."_day", $variable."_month", $variable."_year", "past", $class);
			else
				textBox($class, $status, $variable, $value, 50);        #html
		}
		else{
			$query = "SELECT ".$foreign_key_table."_id, name FROM ".$foreign_key_table." ORDER BY name"; //.$foreign_key_table."_id";
			option($db, $status, $variable, $value, $query);
		}
	}
	
	function findForeignKeyTable($db, $table_name, $column){
		#this function works by taking taking columns that have an extension of _no or _id and finding a table that has the same name as this key. This located table is then displayeed as the linked table
		
		$find_table = substr($column, 0, -3);
		$under_scores = substr_count($column, "_id");	
		if(!$under_scores)	#check for _id .. if none is found then check for _no as possible foreign keys
			$under_scores = substr_count($column, "_no");

		//$find_table = str_replace("-", "", $find_table); # remove - in some columns, dash makes it readable
		$query_st = sqlite_list_tables($db);		#sql_fxn - get the list of all tables in the database
		for ($i=0; $row = sqlite_fetch_array($query_st); $i++){	#fetch all the tables in the database
			if($row[0] == $find_table and $under_scores)	#do not check the table that this column is in
				return $row[0];
		}
	}

	function findForeignKeyTable2($db, $table_name, $column){
		//$column = strtolower($column);

		$query_st = sqlite_list_tables($db);
		for ($i=0; $row = sqlite_fetch_row($query_st); $i++){		#fetch all the tables in the database
			
			$query = "SELECT * FROM ".$row[0]." limit 1";		#fetch all columns in all tables in the database
			$result = sqlite_query($db, $query);
			$max_cols = sqlite_num_fields($result);
			
			if($row[0] != $table_name){	#do not check the table that this column is in
				for ($j=0; $j<$max_cols; $j++){	
					$found_column = strtolower(sqlite_field_name($result, $j)); 
					if ($found_column == $column){	#check if search column exists in another table
						//return sqlite_field_table($result, $j);
						return $row[0];
					}
				}
			}
		}
	}

	function createHtmlForm($status, $table_name, $db, $variables_array, $first_col, $last_col){
		if(strlen($table_name)>30)
			$query = $table_name;
		else
			$query = "SELECT * FROM ".$table_name." limit 1";	#fetch all columns in the table, limit to one row for speed
		
		//$query_st = sqlite_query($db, $query);		# process the query and store result set in $query_st
		$max_cols = sqlite_num_fields($query_st);	# get number of columns in the table and 
		$max_cols = $max_cols - $last_col;			# subtract the last col value. So these last few
													# columns will not be displayed
		$col_data_type  = sqlite_list_column_data_types($table_name, $db);		#sql_fxn - find the column datatype for all columns in the table, return an array

		for ($i=$first_col; $i<$max_cols; $i++){		#start from 1, so first column is ignored ie primary key

			//$col_length = sqlite_field_len($query_st, $i);		#find the column max data lenght
			$col_length = 30;
			
			$variable = strtolower(sqlite_field_name($query_st, $i));		#get column name in lower case
			
			if($variables_array[$variable])	#check if the value for this variable has been sent
				$value = $variables_array[$variable];
			else
				$value = $$variable;
			
			#remove all trailing _id and _no extensions from the columns as these signify foreign keys.
			#after, remove all under scores and replace them with space to make it more user friendly
			#lastly, make the column name capital.
			$field_name = str_replace("_id", " ", sqlite_field_name($query_st, $i));
			$field_name = str_replace("_no", " ", $field_name);
			$field_name = str_replace("_", " ", $field_name);
			//$field_name = strtoupper($field_name);
			?>
			<tr>
				<td class=style1>
					<?php print ucwords($field_name)?>: <br>
					<?php getInputType($status, $col_length, $col_data_type[$variable], $variable, $value, $table_name, $db);	#html -> this?> 
				</td>
			</tr>
			<tr>
				<td height=3>&nbsp;</td>
			</tr>
			
			<?php 
		}
	}

	function showRetrievedPageCols($query, $first_col, $last_col, $max_per_row)
	{		
		//$query_st = sqlite_query($db, $query);	# process the query and store result set in $query_st
		$max_cols = sqlite_num_fields($query_st);	# get number of columns in the table and 
		$max_cols = $max_cols - $last_col;			# subtract the last col value. So these last few
													# columns will not be displayed
		for ($index=0; $row = sqlite_fetch_array($query_st); $index++)	{	?>
		<TR>
			<TD height=25>&nbsp;</TD>
		</TR>
		<TR>
			<TD>
				<TABLE border=0 width='100%'>
					<TR>
					<?php
					for ($i=$first_col; $i<$max_cols; $i++){
						#remove all trailing _id and _no extensions from the columns as these signify foreign keys.
						#after, remove all under scores and replace them with space to make it more user friendly
						#lastly, make the column name capital.
						$field_name = str_replace("_id", " ", sqlite_field_name($query_st, $i));
						$field_name = str_replace("_no", " ", $field_name);
						$field_name = str_replace("_", " ",strtoupper($field_name));
						?>
							<TD width=175 valign=top>
								<font color=red size=3><?php print $field_name?></font><br>
								<big><?php 
									print $row[$i];
								?></big>
							</TD>
							<TD width=50 valign=top>&nbsp;</TD>
						<?php 
						if($i%$max_per_row == 0 and $i<$max_cols-1 and $i)	#create new row if max per row is 
							print "</TR><TR>".includeSpace();		#reached
					}
					?>
				</TABLE>
			</TD>
		</TR><?
		}
	}

	function showRetrievedPageRows($query, $max_per_row)
	{		
		//$query_st = sqlite_query($db, $query);	# process the query and store result set in $query_st
		?>
		<TR>
			<TD>
				<TABLE border=0>
					<TR>
					<?php
					for ($i=0; $row = sqlite_fetch_array($query_st); $i++){
						#remove all trailing _id and _no extensions from the columns as these signify foreign keys.
						#after, remove all under scores and replace them with space to make it more user friendly
						#lastly, make the column name capital.
						$field_name = str_replace("_id", " ", sqlite_field_name($query_st, 0));
						$field_name = str_replace("_no", " ", $field_name);
						$field_name = str_replace("_", " ",strtoupper($field_name));
						?>
							<TD width=175 valign=top>
								<font color=red size=3><?php print $field_name?></font><br>
								<big><?php 
									print $row[0];
								?></big>
							</TD>
							<TD width=50 valign=top>&nbsp;</TD>
						<?php 
						if($i%$max_per_row == 0 and $i<$max_cols-1 and $i)	#create new row if max per row is 
							print "</TR><TR>".includeSpace();		#reached
					}
					?>
				</TABLE>
			</TD>
		</TR><?
	}

	function createSqlInputUpdate($table_name, $variables){
		
		$query = "SELECT * FROM ".$table_name." limit 1";	#fetch all columns in the table, limit to one row for speed
		//$query_st = sqlite_query($db, $query);	# process the query and store result set in $query_st
		$max_cols = sqlite_num_fields($query_st);	#get number of columns in the table
		
		$column_array = array();	#initialize column array

		for ($i=0; $i<$max_cols; $i++){		

			$data_type  = sqlite_field_type($query_st, $i);		#find the column datatype
			$variable = strtolower(sqlite_field_name($query_st, $i));
			$meta_data = sqlite_fetch_field($query_st);	#get column information in the form of an array

			//if($data_type == "date")
				//$$variable = date_converter ($date_day, $date_month, $date_year);

			if($meta_data['primary_key'])
				$primary = $variable;	#find the table primary key
			
			$column_array[$variable] = $$variable;	 #build column array using the column name as array key and data as value
		}
		insert_update_builder($db, $column_array, $table_name, $primary, $$primary);
	}

	function displayTableHeader($query){
		$column_array = array();
		//$query_st = sqlite_query($db, $query);	# process the query and store result set in $query_st
		$max_cols = sqlite_num_fields($query_st);	# get number of columns in the table and 
		$max_cols = $max_cols - $last_col;			# subtract the last col value. So these last few
													# columns will not be displayed
		for ($i=0; $i<$max_cols; $i++){		#start from 1, so first column is ignored ie primary key
			$field_name = str_replace("_id", " ", sqlite_field_name($query_st, 0));
			$field_name = str_replace("_no", " ", $field_name);
			$field_name = str_replace("_", " ",strtoupper($field_name));
			$column_array[] = $field_name;
		}

		return $column_array;
	}

	function displayTableTitle($db, $query){
		//$query_st = sqlite_query($db, $query);
		$max_cols = sqlite_num_fields($query_st);
		$col_title = array();	#initialize array
		for ($i=0; $i<$max_cols; $i++)	{
			#run te columnname thruthree filters
			$field_name = str_replace("_id", " ", sqlite_field_name($query_st, $i));
			$field_name = str_replace("_no", " ", $field_name);
			$field_name = str_replace("_", " ",strtoupper($field_name));
			
			$col_title[] = $field_name;	#add column name to array
		}

		return $col_title;
	}
?>