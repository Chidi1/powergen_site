<?php
	require_once("./common.php");	#common.php
	
	if($enter)
		passParameters("enter_value.php", array("login_id"=>$login_id, "primary_key"=>"blog_id"));

	$query = "SELECT b.blog_id as SN, blog_content, strftime('%d-%m-%Y', date) as date FROM member m, blog b WHERE b.member_id = m.member_id AND m.member_id = '".$login_id."' ORDER BY b.blog_id DESC LIMIT 20 ";

	$col_title = array("S/N", "content", "date");
	$variables = array("member_id"=>$member_id, "page_name"=>$page_name);
	$redirect_path = "enter_value.php?login_id=$login_id&table_name=$table_name&primary_key=blog_id&blog_id";

	headerInfo($db, "My Blog", $login_id);	#html
?> 
	<table width='80%'>
		<TR>
			<td align=center>
				<table width='90%'>
				<?php
					tableHeader ($col_title);
					gettabledata($db, $query, $redirect_path);  #html
				?>
				</table>
			</td>
		</TR>
		<TR>
			<TD class=style4>
				<form action='blog.php' method='post'>
				<INPUT TYPE='hidden' NAME='login_id' VALUE='<?print $login_id?>'>
			</TD>
		</TR>
		<TR>
			<TD height=30> &nbsp; </TD>
		</TR>
		<TR>
			<td align=center>
				<INPUT type=submit value='Enter Your Blog' name='enter' class='big_button_red'>
			</td>
		</TR>
		<TR>
			</form>
		</TR>
	</TABLE>
<?php
	footerTitle($db, $page_id)
?>