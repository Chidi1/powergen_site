<?php
	require_once("./common.php");
	
	$query = "SELECT sub_page_id, page_id, name, content FROM sub_page WHERE sub_page_id = '".$sub_page_id."'";
	$row = execQuery($db, $query);# user.php

	$content = $row['content'];
	$content = str_replace('\"', '"', $content);
	$content = str_replace("\'", "'", $content);
	
	//$content = str_replace("\n", "<br>", $content);

	headerInfo($db, $login_id, $search, $row['page_id'], $sub_page_id);	#html
?>
   <tr>
		<td height=15> &nbsp; </td>
		<td valign=top>
			<table cellpadding='0' cellspacing='0'>
				<tr> <td height=25> &nbsp; </td> </tr>
				<tr>
					<td class=style2>
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
					<td class=style3>
						<?php
							print $row['note'];
						?>
					</td>
				</tr>
			</table>
		</td>
		<td height=15> &nbsp; </td>
	</tr>
<?php
	footerTitle($db, $sub_page_id);		#html
?>
