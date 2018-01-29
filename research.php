<?php
	require_once("./common.php");

	$clientname = $dirname."/small/".$clients[$i];

	headerInfo($db, "Reserach", $member_id);	#html
?>
  <table width="70%" align=center>
	
	<tr>
		<td> 
			<h4> Coming Soon </h4>
		</td>
	</tr>

	<tr>
		<td> 
			<img src="./page/1.jpg" alt=" " height="120" title=" "  /> 
		</td>
	</tr>
</table>
<?php
	$page_id = "index";
	footerTitle($db, $page_id)
?>