<?php
	function threeBarChart($bar_width, $x_axis, $x_axis2, $x_axis3, $y_axis, $y_link, $link_addr, $bar_colour, $bar_colour2, $bar_colour3){
		$x_axis_size = count($x_axis);
		?>
		<table cellpadding=0 cellspacing=0 width=40 border=0>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr valign=Bottom>
				<?php
					for($i=0; $i<$x_axis_size; $i++)	{?>
						<td align=center width='<?php print $bar_width ?>' valign='bottom'>
							<font size=1><?php print $x_axis[$i]?></font>
						</td>
				<?php	}	?>
			</tr>
			<tr valign=Bottom>
				<?php
				for($i=0; $i<$x_axis_size; $i++)	{

					/*
					$height = log10($x_axis[$i])* 50;
					$height2 = log10($x_axis2[$i]) * 50;
					$height3 = log10($x_axis3[$i]) * 50;
					*/
					
					$height = $x_axis[$i]/1000;
					$height2 = $x_axis2[$i]/1000;
					$height3 = $x_axis3[$i]/1000;
					?>
					
					<td align=center valign='bottom'>
						<table>
							<tr>
								<td align=center width='<?php print $bar_width ?>' valign='bottom'>
									<img src='graph_bars/<?php print $bar_colour ?>.gif' height='<?php	print $height?>' width='<?php print $bar_width?>' border=0 hspace=0>
								</td>
								<td align=center width='<?php print $bar_width ?>' valign='bottom'>
									<img src='graph_bars/<?php print $bar_colour2 ?>.gif' height='<?php	print $height2?>' width='<?php print $bar_width?>' border=0 hspace=0>
								</td>
								<td align=center width='<?php print $bar_width ?>' valign='bottom'>
									<img src='graph_bars/<?php print $bar_colour3 ?>.gif' height='<?php	print $height3?>' width='<?php print $bar_width?>' border=0 hspace=0>
								</td>
								<td>
									<img src='graph_bars/nothing.gif' height='1' width='<?php print $bar_width*2?>'>
								</td>
							</tr>
						</table>
					</td>
					<?php
				}
			?>
				<td>&nbsp;</td>
			</tr>
			<tr valign=Bottom>
			<?php
				for($i=0; $i<$x_axis_size; $i++)	{	#print name and link to move to another page
					?>
					<td align=left valign='top'>
						<table>
							<tr>
								<td align=center width='<?php print $bar_width ?>' valign='top'>
									<img src='graph_bars/nothing.gif' height='1' width='<?php print $bar_width?>' border=0 hspace=0>
									<A class=navigation href="<?print $link_addr."=".$y_link[$i]?>">
										<?php print $y_axis[$i]?>
									</A>
								</td>
							</tr>
						</table>
					</td>
					<?php
				}
				?>
			</tr>
		</table><?php
	}

	function singleBarChart($bar_width, $max_bar_height, $x_axis, $y_axis, $bar_colour){
		$x_axis_size = count($x_axis);
		//$max_bar_height = round(log10($max_bar_height), 3) * 50;
		
		for($i=0; $i<$x_axis_size; $i++)	{
			
			$height = $x_axis[$i]/$max_bar_height * 250;
			?>
			<td align=center width='<?php print $bar_width ?>' valign='bottom' class=style1>
				<?php print $x_axis[$i]?>
				<img src='graph_bars/<?php print $bar_colour ?>.gif' height='<?php	print $height?>' width='<?php print $bar_width?>'>
				<br>
				<?php print $y_axis[$i]?>
			</td>
			<?php
		}
	}

	function twoBarChart($bar_width, $max_bar_height, $x_axis, $x_axis2, $y_axis, $y_axis2, $bar_colour, $bar_colour2){
		$x_axis_size = count($x_axis);
		//$max_bar_height = round(log10($max_bar_height), 3) * 50;
		
		for($i=0; $i<$x_axis_size; $i++)	{
			
			$height = $x_axis[$i]/$max_bar_height * 200;
			$height2 = $x_axis2[$i]/$max_bar_height * 200;
			?>
			<td align=center width='<?php print $bar_width ?>' valign='bottom' class=style1>
				<?php print $x_axis[$i]?>
				<img src='graph_bars/<?php print $bar_colour ?>.gif' height='<?php	print $height?>' width='<?php print $bar_width?>'>
				<br>
				<?php print $y_axis[$i]?>
			</td>
			<td align=center width='<?php print $bar_width ?>' valign='bottom' class=style1>
				<?php print $x_axis2[$i]?>
				<img src='graph_bars/<?php print $bar_colour2 ?>.gif' height='<?php	print $height2?>' width='<?php print $bar_width?>'>
				<br>
				<?php print $y_axis2[$i]?>
			</td>
			<?php
		}
	}

	function singleBarChartLink($bar_width, $max_bar_height, $x_axis, $y_axis, $value_link, $bar_colour) {
		$x_axis_size = count($x_axis);
		//$max_bar_height = round(log10($max_bar_height), 3) * 50;
		
		for($i=0; $i<$x_axis_size; $i++)	{
			
			$height = $x_axis[$i]/$max_bar_height * 250;
			?>
			<td align=center width='<?php print $bar_width ?>' valign='bottom' class=style1>
				<A class=navigation href="<?print $value_link[$i]?>"> <font color=black>
				<?php print $x_axis[$i]?>
				<img src='graph_bars/<?php print $bar_colour ?>.gif' height='<?php	print $height?>' width='<?php print $bar_width?>'>
				<br>
				<?php print $y_axis[$i]?>
				</a>
			</td>
			<?php
		}
	}
?>
