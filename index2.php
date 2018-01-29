<?php
	require_once("./common.php");
	
	headerInfo($db, $login_id, $search, "", "");	#html
?>
   <tr>
		<td height=75 bgcolor='#B8B5BB' valign=bottom >
			<table width='100%'>
			   <tr>
					<td align=center valign=bottom>
						<font color='#ffffff'>
							CuePoint
							<br>
							<h1> Advisory </h1>
						</font>
					</td>
					<td align=center valign=bottom>
						<font color='#ffffff'>
							CuePoint
							<br>
							<h1> Solutions </h1>
						</font>
					</td>
					<td align=center valign=bottom>
						<font color='#ffffff'>
							CuePoint
							<br>
							<h1> Consulting </h1>
						</font>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table width='100%' bgcolor='#ffffff'>
				<tr>
					<td>
						<div id="fadeshow1">
							<img src="./banner/1.jpg" alt="banner" width="1000" height='400' title="banner"  />
						</div>
						<?php
							fadeImage($db)	#java_fxn imageSlideShow();?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table width='100%'>
			   <tr>
					<td valign=top bgcolor='#7F0C7B' style="border-bottom: 1px solid #DBDBDB;padding: 35px">
						<font color='#ffffff'>
							<h2> Welcome to Cue Point </h2>
							<br><br>
							Insight HR consultancy has been working with businesses to achieve their goals for over twenty years.
							<br><br>
							We measure our performance and achievements against the values of Speed-Quality-Expertise, which characterises our culture. These values form a key part of our vision to Exceed Customer Expectations in all that we do. Our service ethos is translated into the way in which we develop our client relationships and grow our professional team, offering a unique mix of expertise and individuality. We aim to meet each of our clients’ specific needs by Doing Things a Different Way to deliver measurable value.
						</font>
					</td>
					<td class=style2 width='25%' bgcolor='#F7A23B'> 
						<table width='100%' border=0 valign=top>
						   <tr>
								<td valign=top >
									<?php scrollNewsStory(); ?>
								</td>
						   </tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
<?php
	$page_id = 100;
	footerTitle($db, $page_id);		#html
?>
