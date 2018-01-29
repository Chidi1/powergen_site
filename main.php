<?php
	require_once("./common.php");
	
	#check which button was clicked by user
	if($enter_value)
		passParameters("enter_value.php", array("login_id"=>$login_id, "primary_key"=>$primary_key));
	
	elseif($admin_tools)
		passParameters("sqlite_editor.php", array("login_id"=>$login_id, "type"=>$search));
	
	headerInfo($db, $login_id, $search, $page_id);	#html
//phpinfo();
?>
	<tr>
		<td valign=top width=550>
			<table width='100%'>
				<TR>
					<TD class=style4>
						<form action='main.php' method='post'>
						<INPUT TYPE='hidden' NAME='login_id' VALUE='<?php print $login_id?>'>
						<?php print $message?>
					</TD>
				</TR>
				<TR>
					<TD>
						Select Form to Enter Values<br>
						<?php 
							$option_array = array( "page_id"=>"Page", "sub_page_id"=>"Sub Page", "sub_sub_page_id"=>"Sub Sub Page", "research_id"=>"Research", "news_id"=>"News", "contact_page_id"=>"Contact", "banner_id"=>"Banner");
							
							optionArray($status, "primary_key", $primary_key, $option_array); 
						?>
					</TD>
				</TR>
				<TR>				
					<TD>
						<INPUT class=button type=submit value="Enter Values >>" name=enter_value> 
					</TD>
				</TR> 
				<TR>
					<TD valign=bottom height=20 colspan=3>
						&nbsp;
					</TD>
				</TR>
				<TR>
					<?php //if($userlevel == 'a'){?>
						<TD align=right>
							<INPUT class=buttonred type=submit value=" Admin Tools >>" name=admin_tools> 
						</TD>
					<?php //}?>
				</TR>
				<TR>
					</form>
				</TR>
			</table>
		</td>
	</tr>
<?php
	$page_id = "index";
	footerTitle($db, $page_id)
?>