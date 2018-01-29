<?php
	require_once("./common.php");

	$query = "SELECT page_id, name, content FROM page WHERE content like '%".$search."%' GROUP BY name";
	
	$query2 = "SELECT sub_page_id, page_id, name, content FROM sub_page WHERE content like '%".$search."%' GROUP BY name";

	$query3 = "SELECT sub_sub_page_id, sub_page_id, name, content FROM sub_sub_page ss WHERE content like '%".$search."%' GROUP BY name";	# ORDER BY name
	
	$query4 = "SELECT news_id, title, content FROM news n WHERE content like '%".$search."%'";
	
	$number_of_results = countRows($db, $query) + countRows($db, $query2) + countRows($db, $query3) + countRows($db, $query4);
	$page_id = 999;

	$new_row = 100;

	headerInfo($db, $login_id, $search_unused, $page_id);	#html
?>
	<tr>
		<td colspan=3 height=30  width=670>
			<h1> Results on: <?php print $search;	?> &nbsp; </h1>
		</td>
	</tr>
	<tr>
		<td valign=top width=670>
			<table width='100%'>
				<tr>
					<td>
						<p>
						<ul>
						<?php
							if($number_of_results){
								//$query_st = sqlite_query($db, $query);
								print "<h2> Search Results: ".$search."</h2> <br>";
								
								for ($i=0; $row = sqlite_fetch_array($query_st); $i++)	{
									$new_row = strpos($content, $search); #find where search occurs in the page 
									print "<li>"."<a href='./content.php?page_id=".$row['page_id']."&search=".$search."'>";
									print "<strong>".$row['name']." </a> </strong> <br>";
									//print substr($row['content'], 0, $new_row);
									print "<br> </li>";
								}

								//$query_st = sqlite_query($db, $query2);
								for ($i=0; $row = sqlite_fetch_array($query_st); $i++)	{
									$new_row = strpos($content, $search); #find where search occurs in the page 
									print "<li>"."<a href='./content_sub.php?sub_page_id=".$row['sub_page_id']."&search=".$search."'>";
									print "<strong>".$row['name']." </a> </strong> <br>";
									//print contentStripHtml(substr($row['content'], $new_row, 100));
									print "<br> </li>";
								}

								//$query_st = sqlite_query($db, $query3);
								for ($i=0; $row = sqlite_fetch_array($query_st); $i++)	{
									$new_row = strpos($content, $search); #find where search occurs in the page 
									print "<li>"."<a href='./content_sub_sub.php?sub_sub_page_id=".$row['sub_sub_page_id']."&search=".$search."'>";
									print "<strong>".$row['name']." </a> </strong> <br>";
									//print substr($row['content'], 0, $new_row);
									print "<br> </li>";
								}

								//$query_st = sqlite_query($db, $query4);
								for ($i=0; $row = sqlite_fetch_array($query_st); $i++)	{
									$new_row = strpos($content, $search); #find where search occurs in the page 
									print "<li>"."<a href='./content.php?page_id= ".$row['page_id']."5&search_word=".$search."'>";
									print "<strong>".$row['title']." </a> </strong> <br>";
									//print substr($row['content'], 0, $new_row);
									print "<br> </li>";
								}
							}
							else {
								print "<h2> No results found on search: ".$search."</h2>";
							}
						?>
					</ul>
					</p>
					</td>
				</tr>
			</table>
		</td>

		<td width='20' style="border-right: 0px solid #DBDBDB;"> &nbsp; </td>
		<td valign=top> 
			<?php
				sideBanner($db);
			?>
		</td>
	</tr>
<?php
	$page_id = "index";
	footerTitle($db, $page_id)
?>