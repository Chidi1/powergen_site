<?php
	require_once("./common.php");

	$clientname = $dirname."/small/".$clients[$i];

	headerInfo($db, "Clients", $member_id);	#html
?>
  <table width="70%" align=center>
	
	<tr>
		<td> 
			List of clients include:
			<ul>
				<li>ACTIS, London, UK </li>
				<li>AES Corporation, Arlington Virginia USA </li>
				<li>Africa Power Generation Limited, Geneva. </li>
				<li>Globeleq Advisors (UK) limited, London, UK</li>
				<li>Globeleq Advisors (UK) limited/Akwa Ibom State Government/Ibom Power Limited </li>
				<li>Gruppo Investments/OANDO Gas and Power Limited, Lagos </li>
				<li>Lagos State Government, Nigeria</li>
				<li>Ogun State Government, Nigeria </li>
				<li>Merton Tenz Consortium comprising of Alstom, STAG Engineering, Odujurin & Adefulu and FBN Capital, Nigeria </li>
			</ul>

			
			<br><br>
		 </td>
	</tr>

	<tr>
		<td> 
			<img src="./image/project_1.jpg" alt=" " height="120" title="Project Development"  /> 
			<img src="./image/project_2a.jpg" alt=" " height="120" title="Advisory Services"  />
			<img src="./image/project_3a.jpg" alt=" " height="120" title="Commissioned Research"  />
		</td>
	</tr>
</table>
<?php
	$page_id = "index";
	footerTitle($db, $page_id)
?>