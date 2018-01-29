<?php
	require_once("./common.php");
	
	$query = "SELECT page_id, name, content FROM page WHERE page_id = '".$page_id."'";
	$row = execQuery($db, $query);# user.php
	$page_id = 10;
	$content = $row['content'];
	
	//$content = str_replace("\n", "<br>", $content);
	headerInfo($db, $login_id, $search, $page_id);	#html
?>
	<tr>
		<td colspan=2 height=30  width=670>
			<h1> Site Map </h1>
			<table width='100%'>

<body lang=EN-GB style='tab-interval:36.0pt'>

<div class=Section1>

<p><span >Home Page</span></p>

<p><span >About us</span></p>

<p><span

mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol'><span
style='mso-list:Ignore'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:14.0pt;
line-height:115%'>Management Team</span></p>

<p><span

mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol'><span
style='mso-list:Ignore'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:14.0pt;
line-height:115%'>Board</span></p>

<p><span

mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol'><span
style='mso-list:Ignore'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:14.0pt;
line-height:115%'>Organizational Structure</span></p>

<p><span >Our
Services</span></p>

<p class=ListParagraph style='text-indent:-18.0pt;mso-list:l5 level1 lfo2'><span

mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol'><span
style='mso-list:Ignore'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:14.0pt;
line-height:115%'>Investment banking</span></p>

<p class=ListParagraph style='margin-left:54.0pt;text-indent:-18.0pt;
mso-list:l3 level3 lfo6'><span lang=EN-US
style='font-size:12.0pt;line-height:115%;mso-fareast-font-family:Calibri'><span
style='mso-list:Ignore'>i)<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:12.0pt;
line-height:115%'>Debt capital Markets</span></p>

<p class=ListParagraph style='margin-left:54.0pt;text-indent:-18.0pt;
mso-list:l3 level3 lfo6'><span lang=EN-US
style='font-size:12.0pt;line-height:115%;mso-fareast-font-family:Calibri'><span
style='mso-list:Ignore'>ii)<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:12.0pt;
line-height:115%'>Equity capital markets</span></p>

<p class=ListParagraph style='margin-left:54.0pt;text-indent:-18.0pt;
mso-list:l3 level3 lfo6'><span lang=EN-US
style='font-size:12.0pt;line-height:115%;mso-fareast-font-family:Calibri'><span
style='mso-list:Ignore'>iii)<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:12.0pt;
line-height:115%'>Financial advisory</span></p>

<p class=ListParagraph style='margin-left:54.0pt;text-indent:-18.0pt;
mso-list:l3 level3 lfo6'><span lang=EN-US
style='font-size:12.0pt;line-height:115%;mso-fareast-font-family:Calibri'><span
style='mso-list:Ignore'>iv)<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:12.0pt;
line-height:115%'>Project &amp; Structured finance</span></p>

<p class=ListParagraph style='text-indent:-18.0pt;mso-list:l5 level1 lfo2'><span

mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol'><span
style='mso-list:Ignore'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:14.0pt;
line-height:115%'>Asset Management</span></p>

<p class=ListParagraph style='margin-left:54.0pt;text-indent:-18.0pt;
mso-list:l9 level3 lfo7'><span lang=EN-US
style='font-size:12.0pt;line-height:115%;mso-fareast-font-family:Calibri'><span
style='mso-list:Ignore'>i)<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:12.0pt;
line-height:115%'>Our Investment Philosophy</span></p>

<p class=ListParagraph style='margin-left:54.0pt;text-indent:-18.0pt;
mso-list:l9 level3 lfo7'><span lang=EN-US
style='font-size:12.0pt;line-height:115%;mso-fareast-font-family:Calibri'><span
style='mso-list:Ignore'>ii)<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:12.0pt;
line-height:115%'>Our services</span></p>

<p class=ListParagraph style='margin-left:54.0pt;text-indent:-18.0pt;
mso-list:l9 level3 lfo7'><span lang=EN-US
style='font-size:12.0pt;line-height:115%;mso-fareast-font-family:Calibri'><span
style='mso-list:Ignore'>iii)<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:12.0pt;
line-height:115%'>Portfolio Management</span></p>

<p class=ListParagraph style='margin-left:54.0pt;text-indent:-18.0pt;
mso-list:l9 level3 lfo7'><span lang=EN-US
style='font-size:12.0pt;line-height:115%;mso-fareast-font-family:Calibri'><span
style='mso-list:Ignore'>iv)<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:12.0pt;
line-height:115%'>Mutual funds</span></p>

<p class=ListParagraph style='margin-left:54.0pt;text-indent:-18.0pt;
mso-list:l9 level3 lfo7'><span lang=EN-US
style='font-size:12.0pt;line-height:115%;mso-fareast-font-family:Calibri'><span
style='mso-list:Ignore'>v)<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:12.0pt;
line-height:115%'>Trusteeship</span></p>

<p class=ListParagraph style='margin-left:54.0pt;text-indent:-18.0pt;
mso-list:l9 level3 lfo7'><span lang=EN-US
style='font-size:12.0pt;line-height:115%;mso-fareast-font-family:Calibri'><span
style='mso-list:Ignore'>vi)<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:12.0pt;
line-height:115%'>Fixed Income Funds</span></p>

<p class=ListParagraph style='margin-left:54.0pt;text-indent:-18.0pt;
mso-list:l9 level3 lfo7'><span lang=EN-US
style='font-size:12.0pt;line-height:115%;mso-fareast-font-family:Calibri'><span
style='mso-list:Ignore'>vii)<span style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
lang=EN-US style='font-size:12.0pt;line-height:115%'>Money market fund</span></p>

<p class=ListParagraph style='margin-left:54.0pt;text-indent:-18.0pt;
mso-list:l9 level3 lfo7'><span lang=EN-US
style='font-size:12.0pt;line-height:115%;mso-fareast-font-family:Calibri'><span
style='mso-list:Ignore'>viii)<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:12.0pt;
line-height:115%'><span style='mso-spacerun:yes'> </span>Heritage fund</span></p>

<p class=ListParagraph style='text-indent:-18.0pt;mso-list:l5 level1 lfo2'><span

mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol'><span
style='mso-list:Ignore'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:14.0pt;
line-height:115%'>Principal Investment/Private equity</span></p>

<p class=ListParagraph style='text-indent:-18.0pt;mso-list:l5 level1 lfo2'><span
lang=EN-US style='font-size:18.0pt;line-height:115%;font-family:Symbol;
mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol'><span
style='mso-list:Ignore'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:14.0pt;
line-height:115%'>Market</span><span lang=EN-US style='font-size:18.0pt;
line-height:115%'></span></p>

<p><span >Research</span></p>

<p class=ListParagraph style='text-indent:-18.0pt;mso-list:l1 level1 lfo3'><span

mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol'><span
style='mso-list:Ignore'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:14.0pt;
line-height:115%'>Research notes</span></p>

<p><span >Resources</span></p>

<p class=ListParagraph style='text-indent:-18.0pt;mso-list:l1 level1 lfo3'><span

mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol'><span
style='mso-list:Ignore'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:14.0pt;
line-height:115%'>Trades</span></p>

<p><span >Media
Room</span></p>

<p class=ListParagraph style='text-indent:-18.0pt;mso-list:l1 level1 lfo3'><span

mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol'><span
style='mso-list:Ignore'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:14.0pt;
line-height:115%'>Press Releases</span></p>

<p class=ListParagraph style='text-indent:-18.0pt;mso-list:l1 level1 lfo3'><span

mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol'><span
style='mso-list:Ignore'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:14.0pt;
line-height:115%'>Awards Recognition</span></p>

<p class=ListParagraph style='text-indent:-18.0pt;mso-list:l1 level1 lfo3'><span

mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol'><span
style='mso-list:Ignore'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:14.0pt;
line-height:115%'>Management Team</span></p>

<p class=ListParagraph style='text-indent:-18.0pt;mso-list:l1 level1 lfo3'><span

mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol'><span
style='mso-list:Ignore'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:14.0pt;
line-height:115%'>Speeches/Presentations</span></p>

<p class=ListParagraph style='text-indent:-18.0pt;mso-list:l1 level1 lfo3'><span

mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol'><span
style='mso-list:Ignore'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:14.0pt;
line-height:115%'>Photos/Videos</span></p>

<p><span >Events</span></p>

<p><span >Career</span></p>

<p class=ListParagraph style='text-indent:-18.0pt;mso-list:l10 level1 lfo5'><span

mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol'><span
style='mso-list:Ignore'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:14.0pt;
line-height:115%'>Vacancies</span></p>

<p class=ListParagraph style='text-indent:-18.0pt;mso-list:l10 level1 lfo5'><span

mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol'><span
style='mso-list:Ignore'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:14.0pt;
line-height:115%'>Graduate programme</span></p>

<p><span >Contact Us</span></p>

</div>
			</table>
		</td>
	</tr>
	<tr>
		<td width='20' style="border-right: 0px solid #DBDBDB;"> &nbsp; </td>
		<td valign=top> 
			<?php
				if($row['page_id'] != 1 and $row['page_id'] != 5){
					if($sub_page_id == 107) print "<br>";
					//sideBanner($db);
				}
			?>
		</td>
	</tr>
<?php
	$page_id = "index";
	footerTitle($db, $page_id)
?>