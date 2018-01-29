<?php
	require_once("./common.php");


	headerInfo($db, $login_id, $search, $page_id, $sub_page_id);	#html
?>
   <tr>
		<td width='100%'>
			<table width='100%' cellpadding="0" cellspacing="0" > 
				<tr>
					<td valign=top> 
						<div id="fadeshow1">
							<img src="./banner/1.jpg" alt="banner" width="750" height='325' title="banner"  />
						</div>
						<?php
							fadeImage($db)	#java_fxn imageSlideShow();
						?>
						
						<br><br>
						<table width='90%'>
							<tr>
								<td class=style2 width='33%' valign=top>
									<span class=style_title3>
										About Us
									</span>
									<hr color='#F2F200'>
									<img src="image/project_2a.jpg" height=155 width=225>
									<br><br>
									Powergen is an energy focussed advisory firm which is generally regarded as one of the leading advisors in the Nigerian gas and power sectors. 
									<br><br>
									The team is led by an accomplished energy professional who was involved in the development, operations and maintenance of the first Independent Power Producer (IPP) in Nigeria. 
									<br><br><br>
									<div align=right>
										<A class=ahref href="about_us.php"> > Read More </a>
									</div>
								</td>
								<td class=style2 width='33%' valign=top>
									<span class=style_title3>
										Clients
									</span>
									<hr color='#F2F200'>
									<img src="image/project_1a.jpg" height=155 width=225>
									<br><br>
										&raquo; ACTIS, London, UK
									<br><br>
										&raquo; AES Corporation, Arlington Virginia USA
									<br><br>
										&raquo; Africa Power Generation Limited, Geneva.
									<br><br>
										&raquo; Globeleq Advisors (UK) limited, London, UK
									<br><br><br>
									<div align=right>
										<A class=ahref href="clients.php"> > Read More </a>
									</div>
								</td>
								<td class=style2 width='33%' valign=top>
									<span class=style_title3>
										Selected Projects
									</span>
									<hr color='#F2F200'>
									<img src="image/project_3a.jpg" height=155 width=225>
									<br><br>
										&raquo; Leadership of the Commercial team of the first Independent Power Producer in Nigeria.
									<br><br>
										&raquo; Retained on a two-year contract by a major international power company.
									<br><br>
										&raquo; Engaged by a new International power company which is interested in developing LNG to power solutions across Africa.
									<br><br>
									<div align=right>
										<A class=ahref href="selected_projects.php"> > Read More </a>
									</div>
								</td>
							</tr>
						</table>
					</td>
					<td width=20> 
						&nbsp;
					</td>
					<td valign=top width=240> 
						<table width='100%'>
							<tr>
								<td valign=top class=style2 height=300 width='100%'>
									<span class=style_title3>
										Research
									</span>
									<hr color='#F2F200'>
										&raquo Nigeria Vision 202020 Energy Report <br><br>
										&raquo IPP Development Process in Nigeria <br><br>
										&raquo Lagos Gas Supply Options (2012) <br><br>
										&raquo Feasibility Studies for Captive Power Plants in Lagos, Ogun, Delta and Anambra States <br><br>
								</td>
							</tr>
							<tr>
								<td align=right height=45 valign=top>
									<A class=ahref href="research.php"> >> Read More </a>
								</td>
							</tr>
							<tr>
								<td valign=top class=style2 height=300 width='100%'>
									<span class=style_title3>
										Media
									</span>
									<hr color='#F2F200'>
									&raquo Preferred Bidders for Nigeria's Power Firms Named – Tunde Gbajumo interviewed on CNBC Africa <br><br>
									&raquo Dividing the Electricity Pie in Nigeria <br><br>

								</td>
							</tr>
							<tr>
								<td align=right height=45 valign=top>
									<A class=ahref href="media.php"> >> Read More </a>
								</td>
							</tr>
							<tr>
								<td class=style2>
									<span class=style_title3>
										Follow Us On:
									</span>
									<hr color='#F2F200'>
									<img src="image/icon_facebook.gif" height=32>
									<img src="image/icon_twitter.gif" height=32>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
<?php
	$page_id = "index";
	footerTitle($db, $page_id)
?>