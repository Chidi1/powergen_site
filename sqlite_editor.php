<?php 
	require_once("./common.php");

	if($next and $query){
		//$query = "CREATE TABLE  user (user_id int(10) NOT NULL, username varchar(150) NOT NULL, password varchar(150) NOT NULL, name varchar(255) NOT NULL, user_level_id tinyint(3) NOT NULL, PRIMARY KEY  (user_id)) ;";
		
		sqlite_query($db, $query);
	}
	elseif($enter_value and $primary_key)
		passParameters("enter_value.php", array("member_id"=>$member_id, "primary_key"=>$primary_key));
	elseif($reset and $reset_password == "systemreboot"){
		sqlite_empty_database($db);
	}

	
	headerInfo($db, "SQLite Admin Page", $member_id);	#html
?>
  <table align='center' cellpadding="15" >
	<tr>
		<td colspan=2>
			<table width='80%'>
				<TR>
					<TD>
						<form action='sqlite_editor.php' method='post'>
							<INPUT TYPE='hidden' NAME='user_id' VALUE='<?php print $user_id?>'>
					</TD>
				</TR>
				<TR> <TD>&nbsp;</TD> </TR>
				<TR>
					<TD>Enter Query : </TD>
					<TD><?php textArea($class, $status, "query", 40, 5, $query) ?>	</TD>
				</TR>
			</table>
		</td>
	</TR> 
	<TR>
		<TD>
			<INPUT class=button type=submit value="Enter Query" name=next>
			<hr>
		</TD>
	</TR>
	<TR>
		<TD>
			Select Form to Enter Values<br>
			<?php 
				$option_array = array("user_id"=>"new user");
				$option_array = array("form_id"=>"form", "user_level_id"=>"user_level");
				optionArray($status, "primary_key", $primary_key, $option_array); 
			?>
		</TD>
	</TR>
	<TR>
		<TD>
			<INPUT class=button type=submit value="Enter Values >>" name=enter_value> 
		</TD>
	</TR>
		<tr>
			<td align=right colspan=2>
				<big>Reset Password </big> <br>
				<?php passwordBox("reset_password", $reset_password, 15); #html ?> <br>
				<INPUT type=submit value='Reset System' name='reset' class='button_red'>
			</td>
		</tr>
	<TR>
		<TD>
			</form>
		</TD>
	</TR>
 </table>
<?php
	$page_id = "contact_us";
	footerTitle($db, $page_id)
?>