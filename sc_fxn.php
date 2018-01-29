<?php
	function contactUs($db, $page_id){
		?>
		<table bgcolor='#dedede' style="border-right: 1px solid #ffffff;">
			<!--
			<?php
				if($page_id == 101){
					?>
					<tr>
						<td bgcolor='#ffffff' style='font-size: 12px; color:#676767;padding:10px'>
							<img src="./images/Kayode-Akinkugbe.jpg" alt=T height=140/>
						</td>
						<td colspan=2 class=style3 bgcolor='#ffffff' valign=top style='font-size: 12px; color:#676767;padding:10px'>
							<strong> Kayode Akinkugbe </strong> <br>
							MD/CEO <br>
							FBN Capital <br>
						
						</td>
					</tr>
					<?php
				}
			?>
			-->
			<tr>
				<td colspan=3> 
					Contact Us
				</td>
			</tr>
			<tr>
				<td colspan=3 bgcolor='#ffffff' style='font-size: 12px; color:#676767;padding:10px'>
					The Events Team <br>
					<a href='mailto:events@fbncapital.com'> events@fbncapital.com </a> <br>
					+234 1 279 8300 ext 2508-11, 2513 <br>
					+234 706 418 9863, +234 703 005 7836
				</td>
			</tr>
			<tr>
				<td colspan=3>
					&nbsp;
				</td>
			</tr>

			<tr>
				<td colspan=3 bgcolor='#ffffff' style='font-size: 12px; color:#676767;padding:10px'>
					<table>
						<tr>
							<td>
								<img src="./images/twitterbird.png" alt=T width=60/>
							</td>
							<td style='font-size: 25px;'>
								@ FBNCapital
							</td>
						</tr>
						<tr>
							<td colspan=2>
								<a href="http://www.twitter.com/fbncapital" target=_blank>
								- Follow us on twitter @fbncapital
								</a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		<?php
	}
		
	function panelProfiles($db){
		$query = "SELECT panelist_profiles_id, title, content FROM panelist_profiles ";
		?>
		<TABLE width='100%' align='center'>
			<TR>
				<TD valign=center width='100%'>
					<table width='100%'>
					<?php
						scriptReader();		#java_fxn
						//$query_st = sqlite_query($db, $query);
						
						for ($i=0; $row = sqlite_fetch_array($query_st); $i++)	{
							//$content = str_replace("\n", "<br>", $row['content']);;
							$content = str_replace("", "", $row['content']);;
							?>
								<tr>
									<td width='82%' valign=top>
										<span id='bobcontent<?php print $i ?>-title' class='handcursor'>
										<font size=3 color=#243C85> <?php print ucwords($row['title']) //ucwords?>  </font>
										<hr>
									</td>
								</tr>
								<tr>
									<td colspan=2>
										<div id='bobcontent<?php print $i ?>' class='switchgroup1' width='100%'> 
											<?php print $content ?>
										</div>
									</td>
								</tr>
							<?php
						}
					?>
					</table>
				</TD>
			</TR>
			</TR>
			<tr>
				<td height=0 align=right> 
					<script type="text/javascript">
					// MAIN FUNCTION: new switchcontent("class name", "[optional_element_type_to_scan_for]") REQUIRED
					// Call Instance.init() at the very end. REQUIRED

					var bobexample=new switchcontent("switchgroup1", "div") //Limit scanning of switch contents to just "div" elements
					bobexample.setStatus('', '')
					bobexample.setColor('#21409A', '#434343')
					bobexample.setPersist(true)
					bobexample.collapsePrevious(false) //Only one content open at any given time
					bobexample.init()
					</script>
				</td>
			</tr>
		</table>
		<?php
	}
	
	function expandAllScript(){
		?>
		<div valign=top align=right class='style6'>
			<a href="javascript:bobexample.sweepToggle('expand')" class='style6'> Expand All </a>
			|
			<a href="javascript:bobexample.sweepToggle('contract')" class='style6'> Contract All </a>
		</div>
		<?php
	}

	function register($db, $table_name, $variables_array, $first_col, $last_col){
	?>
			<div class=style2>
				Registration
				<hr>
			</div>
			<div class=style4>
				FBN Capital Investor Conference <br>
				15-16 November, 2012 <br>
				Federal Palace Hotel, Victoria Island, Lagos
			</div>

			<div class=style3>
				<br><br>
				Attendance is by registration only
				<br>
				<TABLE>
					<?php createHtmlForm($status, $table_name, $db, $variables_array, $first_col, $last_col)	#page_maker?>
					<tr>
						<td align=left class=style1>
							Mobile Number (include country code): <br>
							<?php 
								textBox($class, $status, "mobile_number", $mobile_number, 50); 
							?>
						</td>
					</tr>
					<tr>
						<td height=3>&nbsp;</td>
					</tr>
					<tr>
						<td align=left class=style1>
							Do you require hotel booking assistance? <br>
							<?php 
								$option_array = array("Yes"=>"YES", "No"=>"NO");
								optionArray($status, "hotel_required", $hotel_required, $option_array); 
							?>
						</td>
					</tr>
					<tr>
						<td height=3>&nbsp;</td>
					</tr>
					<tr>
						<td align=left class=style1>
							Do you require transportation assistance from Murtala Muhammed International Airport Lagos? <br>
							<?php 
								$option_array = array("Yes"=>"YES", "No"=>"NO");
								optionArray($status, "transportation_required", $transportation_required, $option_array); 
							?>
						</td>
					</tr>
					<tr>
						<td height=3>&nbsp;</td>
					</tr>
					<tr>
						<td align=left >
							<INPUT class=button type=submit value="Send" name=next>
						</td>
					</tr>
				</TABLE>
			</div>
	<?
	}

	function register_question($db){
		?>
			Would you like to attend this conference? 
			<br><br>
			<TABLE width='40%'>
				<tr>
					<td align=left >
						<form action='register.php' method='post'>
							<INPUT class=button_yes type=submit value="Yes" name=submit>
						</form>
					</td>
					<td align=left >
						<form action='programme.php' method='post'>
							<INPUT class=button_no type=submit value="No" name=submit>
						</form>
					</td>
				</tr>
			</TABLE>
		<?php
	}

	function page_footer(){
		?>
		<!--
		<p style=line-height:15px;>
			<div style=font-size:9px;>
			<div style=line-height:15px;>
				Enquiries:
				<br>
				
				Email: 
				<a href="mailto:olafisayo.ogunbiyi@fbncapital.com"> olafisayo.ogunbiyi@fbncapital.com </a>; 
				<a href="mailto:goke.salami@fbncapital.com"> goke.salami@fbncapital.com </a>; 
				<a href="mailto:events@fbncapital.com"> events@fbncapital.com </a>
				<br>

				Contact: 
				+234 816 348 1461; +234 806 0568 010; +234 1 279 8300 ext. 1006/1016
			</div>
			</div>
		</p>
		-->
		<?php
	}	
?>