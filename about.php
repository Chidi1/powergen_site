<?php
	require_once("./common.php");

	$clientname = $dirname."/small/".$clients[$i];

	headerInfo($db, "About", $member_id);	#html
?>
  <table width="70%" align=center>
	
	<tr>
		<td> 
			Powergen is an energy focussed advisory firm which is generally regarded as one of the leading advisors in the Nigerian gas and power sectors. 
			<br><br>
			The team is led by an accomplished energy professional who was involved in the development, operations and maintenance of the first Independent Power Producer (IPP) in Nigeria as its pioneer Commercial Director/Board Member. 
			<br><br>
			We benefit tremendously from the participation of our team in developing the Nigerian President’s Vision 202020 program for energy which is currently being implemented through the road map for power sector reform.
			<br><br>
		</td>
	</tr>

	<tr>
		<td> 
			<img src="./banner/1.jpg" alt=" " height="120" title=" "  /> <img src="./banner/2.jpg" alt=" " height="120" title=" "  /> <img src="./banner/3.jpg" alt=" " height="120" title=" "  />
			<br>
			<img src="./banner/4.jpg" alt=" " height="120" title=" "  /> <img src="./banner/5.jpg" alt=" " height="120" title=" "  /> <img src="./banner/6.jpg" alt=" " height="120" title=" "  />
		</td>
	</tr>
</table>
<?php
	$page_id = "index";
	footerTitle($db, $page_id)
?>