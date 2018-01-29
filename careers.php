<?php
	require_once("./common.php");

	$clientname = $dirname."/small/".$clients[$i];

	headerInfo($db, "Career", $member_id);	#html
?>
  <table width="70%" align=center>
	
	<tr>
		<td> 
			 <h4>Who are we looking for?</h4>

				We are interested in candidates who have the following characteristics:
				<ul>
				<li>Experience</li>
				<li>Academic Excellence</li>
				<li>Enthusiasm</li> 

			
			<br><br>
		 </td>
	</tr>

	<tr>
		<td align=right> 
			<img src="./page/career1.jpg" alt=" " height="240" title="Project Development"  /> 
		</td>
	</tr>
</table>
<?php
	$page_id = "index";
	footerTitle($db, $page_id)
?>