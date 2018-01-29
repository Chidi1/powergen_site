<?php
	require_once("./common.php");

	$clientname = $dirname."/small/".$clients[$i];

	headerInfo($db, "Services", $member_id);	#html
?>
  <table width="70%" align=center>
	
	<tr>
		<td> 
			<h4>Project Development</h4>
			We can support project development through planning, permitting, negotiations, financial modelling and implementation. 

			<h4> Advisory Services </h4>
			We provide advisory services such as feasibility studies, business/strategic planning and negotiations for all aspects of the gas and power sectors.

			<h4>Commissioned Research</h4>
			Our experience of researching the sector is probably unequalled locally based on the participation of our team leader as a member of the energy committee of the Nigerian Presidents Vision 202020 program. He co-authored the medium term report which is currently being implemented through the road map for power sector reform. <br>
			
			
			<br><br>
		 </td>
	</tr>

	<tr>
		<td> 
			<img src="./page/service1.jpg" alt=" " height="140" title="Project Development"  /> 
			<img src="./page/service2.jpg" alt=" " height="140" title="Advisory Services"  />
			<img src="./page/service3.jpg" alt=" " height="140" title="Commissioned Research"  />
		</td>
	</tr>
</table>
<?php
	$page_id = "index";
	footerTitle($db, $page_id)
?>