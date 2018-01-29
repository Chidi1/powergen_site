<?php
    $page = "index";
	require_once("./common.php");

	$table_name = substr($primary_key, 0, -3);
	if(!$next and $$primary_key and $table_name)				
		$variables_array = retreiveData($db, $table_name, $primary_key, $$primary_key);	#misc
	
	if($delete){
		$row = execQuery($db, "DELETE FROM ".$table_name." WHERE ".$primary_key." = '".$$primary_key."'");
		$$primary_key = "";
		$variables_array = array();
		passParameters("main.php", array("login_id"=>$login_id, "err_dob"=>$dob));
	}

	if($next or $enter_another)	{
		$query = "SELECT * FROM ".$table_name." limit 1";	#fetch all columns in the table, limit to one row for speed
		//$query_st = sqlite_query($db, $query);	# process the query and store result set in $query_st
		$max_cols = sqlite_num_fields($query_st);	#get number of columns in the table
		
		$column_array = array();	#initialize column array

		if(!$$primary_key){
			$row = execQuery($db, "SELECT max(".$primary_key.") FROM ".$table_name);
			$$primary_key = $row[0] + 1;
		}
		for ($i=0; $i<$max_cols; $i++){		
			$variable = strtolower(sqlite_field_name($query_st, $i));

			if(sqlite_check_data_type($db, $table_name, $variable, "DATE")){
				$day = $variable."_day";
				$month = $variable."_month";
				$year = $variable."_year";
				$$variable = date_converter ($$day, $$month, $$year);
			}
			
			$table_pk = sqlite_check_primarykey($db, $table_name, $variable);	#sql_fxn
			if($table_pk)			#check if the variable is a primary key
				$primary_key = $variable;
$$variable = str_replace(">>;", "", $$variable);
$$variable = str_replace("page_content =", "", $$variable);
$$variable = str_replace("=>", "", $$variable);
$$variable = str_replace("note ;", "", $$variable);
$$variable = str_replace('"', "'", $$variable);

//$$variable = str_replace('\"', '"', $$variable);
//$$variable = str_replace("\'", "'", $$variable);
			$column_array[$variable] = $$variable;	 #build column array using the column name as array key and data as value
//print $$variable."<br>";
		}
		if($name or $content or $topic){
			insert_update_builder($db, $column_array, $table_name, $primary_key, $$primary_key);
		}

		if($upload_picture){
			if($primary_key == "fund_form_id")
				uploadPDF($table_name, $$primary_key, $_FILES['upload_picture']['tmp_name']);		#misc
			else
				upload($table_name, $$primary_key, $_FILES['upload_picture']['tmp_name']);		#misc
		}
		
		if(!$enter_another){
			passParameters("main.php", array("login_id"=>$login_id, "err_dob"=>$dob));
		}
		else{
			$$primary_key = "";		#reset the primary key value
			$name = "";
		}
	}

	$first_col = 1;		#start column and end column to create input fields for from the table
	$last_col = 0;
	
	$query = "SELECT ".$primary_key.", name FROM ".$table_name." ORDER BY name";
	if(!countRows($db, $query))
		$query = "SELECT ".$primary_key.", title FROM ".$table_name." ORDER BY title";
	if($primary_key == "video_id")
		$query = "SELECT ".$primary_key.", topic FROM ".$table_name." ORDER BY topic";

	$col_title = array($table_name);
	$redirect_path = "enter_value.php?login_id=$login_id&table_name=$table_name&primary_key=$primary_key&".$primary_key;

	headerInfo($db, $table_name." details", $login_id, $page_id);	#html
?>
	<TABLE width='90%'>
		<tr>
			<td>
				<form action='enter_value.php' method='post' enctype="multipart/form-data">
				<INPUT TYPE='hidden' NAME='login_id' VALUE='<?php print $login_id?>'>
				<INPUT TYPE='hidden' NAME='table_name' VALUE='<?php print $table_name?>'>
				<INPUT TYPE='hidden' NAME='primary_key' VALUE='<?php print $primary_key?>'>
				<INPUT TYPE='hidden' NAME='new_client' VALUE='<?php print $new_client?>'>
				<INPUT TYPE='hidden' NAME='return_page' VALUE='<?php print $return_page?>'>
				<INPUT TYPE='hidden' NAME='<?php print $primary_key?>' VALUE='<?php print $$primary_key?>'>
				<input type="hidden" name="MAX_client_SIZE" value="1500000" />	<!-- 	used for the uploading of files -->
			</td>
		</tr>
		<tr>
			<td valign=top>
				<TABLE width='70%'>
					  <?php createHtmlForm($status, $table_name, $db, $variables_array, $first_col, $last_col)	#page_maker?>
					<tr>
						<td align=center valign=bottom >
							<INPUT type=file value='Upload Pictures' name='upload_picture' class='button'>
						</td>
					</tr>
					<tr>
						<td align=left >
							<INPUT class=submit_button type=submit value="Enter >>" name=next>
						</td>
					</tr>
					<tr>
						<td align=right >
							<INPUT class=button_green type=submit value="Enter Another >>" name=enter_another>
						</td>
					</tr>
					<tr>
					   <td>
                            <A href="main.php">
							<font color='#000000'>
							Click to return to Main page
					    </td>
					 </tr>
					<tr>
						<td align=right >
							<INPUT class=button_red type=submit value="Delete Value >>" name=delete>
						</td>
					</tr>
				</TABLE>
			</td>

			<td width='10' style="border-right: 1px solid #DBDBDB;"> &nbsp; </td>
			
			<TD vAlign=top width="300">
				<div style="overflow:auto; width:250px; height: 400px;"> 
				<TABLE >
					<?php tableHeader ($col_title)?>
					<TR>
						<TD>
							<?php 	
								gettabledata($db, $query, $redirect_path);  #html 
							?>
						</TD>
					</TR>
				</TABLE>
				</div>
			</TD>
		</tr>
		<tr>
			<td>
				</form>
				</p>
			</td>
		</tr>
			</td>
		</tr>
			
	</table>

<?php
	$page_id = "Services";
	sqlite_close($db);

	//footerTitle($db, $page_id)
?>
