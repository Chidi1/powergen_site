<?php
	require_once("./common.php");
	
	$query = "SELECT sub_sub_page_id, ss.sub_page_id as sub_page_id, page_id, ss.name as name, ss.content FROM sub_sub_page ss, sub_page s WHERE sub_sub_page_id = '".$sub_sub_page_id."'";
	$row = execQuery($db, $query);# user.php
	$page_id = $row['page_id'];
	
	$content = $row['content'];
	//$content = str_replace("\n", "<br>", $content);
	
	$query_form = "SELECT fund_form_id, ff.name as form, f.name as fund FROM fund_form ff, fund f WHERE f.fund_id = ff.fund_id ORDER BY ff.fund_id";
	$col_title = array("");
	$url = "./fund_form/";
	headerInfo($db, $login_id, $search, $sub_sub_page_id);	#html
?>
	<tr>
		<td valign=top width=670>
			<span class=style2> <?php print $row['name'];	?> </span> <br>
			<table width='100%'>
				<tr>
					<td valign=top width='100%'>
						<?php
							displayDownloadForms($db, "SELECT fund_form_id, ff.name as form, f.name as fund FROM fund_form ff, fund f WHERE f.fund_id = ff.fund_id ORDER BY ff.fund_id", $url);	#sc_fxn
							//displayDownloadFormsList(); #sc_fxn
						?>
					</td>
				</tr>
			</table>
		</td>
		<td width='20' style="border-right: 0px solid #DBDBDB;"> &nbsp; </td>
		<td valign=top> 
			<?php
				//sideBanner($db);
			?>
		</td>
	</tr>
<?php
	$page_id = "index";
	footerTitle($db, $page_id)
?>