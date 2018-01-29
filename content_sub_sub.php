<?php
	require_once("./common.php");

	$query = "SELECT sub_sub_page_id, ss.sub_page_id as sub_page_id, page_id, ss.name as name, ss.content AS content FROM sub_sub_page ss, sub_page s WHERE s.sub_page_id = ss.sub_page_id AND sub_sub_page_id = '".$sub_sub_page_id."'";
	
	if($sub_sub_page_id == 10111 || $sub_sub_page_id == 10113 || $sub_sub_page_id == 10114 || $sub_sub_page_id == 10115 || $sub_sub_page_id== 10123 || $sub_sub_page_id== 10124){
		$query = "SELECT sub_sub_page_id, ss.sub_page_id as sub_page_id, ss.name as name, ss.content AS content FROM sub_sub_page ss WHERE sub_sub_page_id = '".$sub_sub_page_id."'";
	}
	
	$row = execQuery($db, $query);# user.php
	$sub_page_id = $row['sub_page_id'];
	
	$content = $row['content'];

	$content = str_replace('\"', '"', $content);
	$content = str_replace("\'", "'", $content);
	
	//$content = str_replace("\n", "<br>", $content);

	//if($sub_sub_page_id == 10121)
	//	$row['name'] = "";

	headerInfo($db, $login_id, $search, $sub_sub_page_id);	#html
?>
	<tr>
		<td valign=top width=670>
			<table width='100%'>
				<tr>
					<td valign=top width='100%' height=40>
						<span class=style2> <?php print $row['name'];	?> </span>
					</td>
				</tr>
				<tr>
					<td valign=top width='100%'>
						<?php
							if($sub_sub_page_id == 10124)
								fundPrice($db);
							elseif($sub_sub_page_id == 10123)
								displayDownloadForms($db, "SELECT fund_form_id, ff.name as form, f.name as fund FROM fund_form ff, fund f WHERE f.fund_id = ff.fund_id ORDER BY ff.fund_id", $url);	#sc_fxn
							else{
								$content = str_replace('**banner_image**', "", $content);
								print $content;
							}
							//elseif($sub_sub_page_id == 10121)
								//researchReport($db, "SELECT research_id, title, strftime('%d-%m-%Y', date) as date, content FROM research ORDER BY research_id desc LIMIT 10", 0, 10, $sub_page_id);
						?>
					</td>
				</tr>
			</table>
		</td>
		
		<td width='20' style="border-right: 0px solid #DBDBDB;"> &nbsp; </td>
		<td valign=top>
		<?php
			if($row['page_id'] != 1 and $row['page_id'] != 5){
				if($sub_page_id == 107) print "<br>";
				sideBanner($db);
			}
		?>
		</td>
	</tr>
<?php
	$page_id = "index";
	footerTitle($db, $page_id)
?>