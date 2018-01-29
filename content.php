<?php
	require_once("./common.php");
	
	$query = "SELECT page_id, name, content, note FROM page WHERE page_id = '".$page_id."'";
	$row = execQuery($db, $query);# user.php

	$page_id = $row['page_id'];
	
	$content = $row['content'];
	$content = str_replace('\"', '"', $content);
	$content = str_replace("\'", "'", $content);
	
	$content = str_replace("\n", "<br>", $content);
	$login_id = 1;
	headerInfo($db, $login_id, $search, $page_id, $sub_page_id);	#html
?>
   <tr>
		<td width=120> &nbsp; </td>
		<td valign=top>
			<table cellpadding='0' cellspacing='0'>
				<tr> <td height=25> &nbsp; </td> </tr>
				<tr>
					<td class=style4>
						<?php print $row['name'];	?>
						<hr>
					</td>
				</tr>
				<tr> <td height=5> &nbsp; </td> </tr>
				<tr>
					<td class=style3>
						<?php print $content;	?>
					</td>
				</tr>
				<tr> <td height=10> &nbsp; </td> </tr>
				<tr>
					<td class=style3 align=center>
						<?php
							print $row['note'];
						?>
					</td>
				</tr>
			</table>
		</td>
		<td width=120> &nbsp; </td>
	</tr>
<?php
	footerTitle($db, $page_id);		#html
?>
