<?php
	function conn($host, $uname, $pword, $dbase){
		$link = mysql_connect($host, $uname, $pword)
			or die("Could not connect");
		
		mysql_select_db ($dbase)
			or die ('The database specified in database_name is incorrect');

		return $link;
	}
    
	function close_conn($link)	{
		mysql_close($link);
	}

	function loginBox() {
		?>
			<TABLE>
				<TR>
					<TD>
						<form action='index.php' method='post'>
						<INPUT TYPE='hidden' NAME='first_entry' VALUE='1'>
					</TD>
				</TR>
				<TR>
					<TD><strong>Username</strong></TD>
					<TD><?php textBox($class, $status, "username", $username, 20) #html?></TD>
				</TR>
				<TR>
					<TD><strong>Password</strong></TD>
					<TD><?php passwordBox("password", $password, 20)  #html?></TD>
				</TR>
				<TR>
					<TD><INPUT class=buttonblue type=submit value="Enter!"></FORM></TD>
				</TR>
			</TABLE>
		<?php
	}

	function googleSearch($bg_color){
		?>
		<FORM method=GET action="http://www.google.com/search">
			<input type=hidden name=ie value=UTF-8>
			<input type=hidden name=oe value=UTF-8>
			<TABLE bgcolor="<?print $bg_color?>"><tr><td>
			<!--<A HREF="http://www.google.com/"><IMG SRC="http://www.google.com/logos/Logo_40wht.gif" border="0" ALT="Google">  </A>  -->
			</td>
			</tr><tr>
			<td>
			<INPUT class=form TYPE=text name=q size=31 maxlength=255 value="">
			<INPUT type=submit name=btnG VALUE="Google Search">
			<font size=-1>
			<input type=hidden name=domains value="http://www.naijainlondon.com"><br><input type=radio name=sitesearch value=""> WWW <br><input type=radio name=sitesearch value="http://www.naijainlondon.com" checked> Nigerians In London <br>
			</font>
			</td></tr></TABLE>
		</FORM>
		<?php
	}

	function create_id($query)	{
		$year = date("Y");
		
		//$query_st = sqlite_query($db, $query);
		$row = sqlite_fetch_array($query_st);
		$part_1_of_old_id = substr($row[0], 0, 4);

		if(substr($part_1_of_old_id, 0, 1) == 2)	{	#check if 1st part of id is a year in the 3rd millenium
			if($year == $part_1_of_old_id)
				$new_id = $row[0] + 1;
			else
				$new_id = $year."001";
		}
		else	{
			$part_2_of_old_id = substr($row[0], 4) + 1;
			$new_id = $part_1_of_old_id.$part_2_of_old_id;
		}

		return $new_id;
	}
	
	function check_user($username, $password){
		$username = TRIM($username);
		$password = TRIM($password);
		#query to find user in database.
		$query = "SELECT member_id FROM user WHERE username = '". $username ."' AND password = '". $password ."'";
		//$query_st = sqlite_query($db, $query);

		if(sqlite_num_rows ($query_st) == 1)	{
			$row = sqlite_fetch_array($query_st);
				$member_id = $row[0];
		}
		else	{
			$member_id = -1;
		}

		return $member_id;
	}

	function check_user_question($username, $password){
		$username = TRIM($username);
		$password = TRIM($password);
		#query to find user in database.
		$query = "SELECT question_client_id FROM question_client WHERE username = '". $username ."' AND password = '". $password ."'";
		//$query_st = sqlite_query($db, $query);

		if(sqlite_num_rows ($query_st) == 1)	{
			$row = sqlite_fetch_array($query_st);
				$member_id = $row[0];
		}
		else	{
			$member_id = -1;
		}

		return $member_id;
	}

	function displayLoginName($member_id)	{
		$row = execQuery($db, "SELECT surname, first_name FROM member WHERE member_id = ".$member_id);

		return strtoupper($row['first_name']." ".$row['surname']);
	}

	function checkValidity()	{
		#please enter date (eg.mm/dd/yyyy)
		$date = "05/01/2012";  #enter installation date here, following date format example
		list($ins_month, $ins_day, $ins_year) = explode('/', $date, 3);	#break date to month day and year

		$today = mktime (0,0,0,date("m"),date("d"),date("y"));
		$expire = mktime (0,0,0,$ins_month,$ins_day+60,$ins_year);
		
		$expire_date = date("l F d, Y",$expire);

		echo "<br><br>Program Expiration date is $expire_date<br><br>";
		if ($today > $expire)
		{
			echo "<font color=red face = 'VERDANA' size= 18>";
			echo "<br>Program is no longer valid<br>Please register this software for continued use";
			echo "</font>";
			exit();
		}
	}

	function createBackup($dbase){
		//chmod("./backup.txt", 755);
		$fp = fopen ("./backup.txt", "w");	#open connection to client
		$result = sqlite_list_tables($dbase);
		for ($i = 0; $i < sqlite_num_rows($result); $i++)	{
			$table_name = sqlite_tablename($result, $i);	#get the names all tables in db
			
			$query = "select * from ".$table_name;	#select the contents of all tables
			//$query_st = sqlite_query($db, $query);
			$col_numbers = sqlite_num_fields($query_st);	#count how many columns per table
			
			fputs($fp, "\n\n# Content of Table '".$table_name."'\n");	#write table name into client
			//print ("<br><br># Content of Table '".$table_name."'<br>");	#write table name into client
			for ($j=0; $row = sqlite_fetch_array($query_st); $j++)	{
				$insert_sql = "insert into ".$table_name." values(";	#create insert query
				for ($k=0; $k<$col_numbers; $k++)	{
					$insert_sql .= "'".$row[$k]."', ";		#add values to insert query
				}
				$insert_sql = substr($insert_sql, 0, -2).");";
				fputs($fp, $insert_sql."\n");	#write insert query into client
				//print ($insert_sql."<br>");	#write insert query into client
			}
	   }
		fclose($fp);
		sqlite_free_result($result);	
	}

	function changeColumnData($change_col, $new_col_data, $old_col_data, $dbase){
		$change_col = strtolower($change_col);

		$result = sqlite_list_tables($dbase);
		for ($i=0; $row = sqlite_fetch_row($result); $i++){		#fetch all the tables in the database
			
			$query = "SELECT * FROM ".$row[0]." limit 1";		#fetch all columns in all tables in the database
			$res = sqlite_query($db, $query);
			$max_cols = sqlite_num_fields($res);
			for ($j=0; $j<$max_cols; $j++){
				//print sqlite_field_name($res, $j).", ";
				if (strtolower(sqlite_field_name($res, $j)) == $change_col){	#check if search column exists in tale
					$query_update = "UPDATE ".$row[0]." SET ".$change_col." = '".$new_col_data."' WHERE ".$change_col." = '".$old_col_data."'";
					//$query_st = sqlite_query($db, $query_update);
					break;
				}
			}
		}
		sqlite_free_result($result);	
		sqlite_free_result($res);	
	}
?>
