<?php			
	function headerInfo($db, $page_name, $login_id)	{
							// Green		gray	yellow		lime green	light green
		$color_array = array("#006D33", "#B8B5BB", "#F2F200", "#79D485", "#EAFFF4", "#3DB7E4");
		
		$variables = array("login_id"=>$login_id, "page_id"=>$page_id);
		$query = "SELECT page_id, name, content, note FROM page ORDER BY page_id";
		//$row = execQuery($db, $query);# user.php
		if($page_id){	
			$nav_class = "nav_class".$page_id;
			$$nav_class = "active ";
			
			$cell_class = "cell_class".$page_id;
			$$cell_class = "cell";
		}
		else {
			$nav_class_index = "active ";
			$cell_class_index = "cell";
		}
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset="UTF-8" />
			<title> Powergen Advisers Ltd </title>

			<link rel="stylesheet" type="text/css" media="all" href="./s.css" />
			<link rel="stylesheet" type="text/css" href="menu.css" />
			<link rel="shortcut icon" href="image/favicon.ico" >
			<?php 
				if($search){	
					textHighlight();		#java_fxn
					$search_var = "'".$search."'";
					$text_highlight_onload = 'onload="highlightSearchTerms('.$search_var.');"';
				}
			?>
		</head> 
		<body >
			 <table align="center" cellpadding='0' cellspacing='0' bgcolor=#ffffff width='950' class='main_table'> 
				<tr>
					<td> 
						<table bgcolor='#ffffff' cellpadding='0' cellspacing='0' width='100%' align="left" border=0>
							<tr>
								<td> 
									<table width='100%'>
										<tr>
											<td valign=top class=style_title> 
												Powergen Advisers Limited
												<table width='100%'>
													<tr>
														<td class=style_title4 valign=bottom align=right height=50>
															<!--
															Search <?php textBox("textbox2", $status, "search", $value, "20") ?>
															<INPUT class=button_small type=submit value="GO" name=go_search> -->
															&nbsp;
														</td>
													</tr>
													<tr>
														<td class=style_title2 align=right>
															Energy Business Advisors 
														</td>
													</tr>
												</table>
											</td>
											<td width=350 align=right> 
												<img src="image/logo.jpg" height=110> 
												<!-- <img src="image/line.jpg" height=110> -->
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td width='90%' align=left>
									<table width='100%' cellpadding='0' cellspacing='0' border=0>
										<tr>
											<td width='8%' bgcolor='#BCBCBC'>
												&nbsp;
											</td>
											<td width='92%' align='right' bgcolor='#BCBCBC'>
												<div id="access" style="float: left">
													<div class="menu-header">
														<ul>
															<li class=<?php print $cell_class_index ?>> 
																<a href="./index.php" class=<?php print $nav_class_index ?>passive> 
																	Home
																</a>
															</li>
															<?php
																$pages = array("About", "Services", "Research", "Clients", "Media", "Careers", "Contact");
																$max_i = sizeof($pages);
																for ($i=0; $i <= $max_i; $i++)	{
																	$row_page_id = $row['page_id'];
																	$nav_class = "nav_class".$row_page_id;
																	$cell_class = "cell_class".$row_page_id;
																	$page_url = str_replace(" ", "_", strtolower($pages[$i])).".php";
																	?>
																		<li class=<?php print $$cell_class ?>> 
																			<a href="<?php print $page_url?>" class=<?php print $$nav_class ?>passive> 
																				<?php print $pages[$i];	?>
																			</a>
																		</li>
																	<?php
																}
															?>
														</ul>
													</div>
												</div>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td valign=top width='100%' bgcolor=#ffffff >
						<span class=style_title2>
							<?php print $page_name ?>
						</span>
						<table width='100%' border="0" cellpadding='0' cellspacing='0' >

		<?php
	}

	function footerTitle($db, $page_id){	
		?>
						</table>
					</td>
				</tr>
			</table>
			 <table align="center" cellpadding='0' cellspacing='0' width='75%'> 
				<tr>
					<td align="right">
						<a href="http://www.cube-serve.com" target=_blank> <font color="#bcbcbc" size=1> Powered by Cube Serve </font> </a>
					</td>
				</tr>
			</table>
			</body>
		</html>
	<?
	}
	
	function loginDisplay($login_id){
		?>
		<div id="secondary">
			<h3> <font color='#09304C'> MEMBER LOGIN </font> </h3>		  
			<b> Currently not logged in. </b> 
			<br> <br>
			<form name="form" method="post" action="programme.php">
				<span for="username"> Username </span> <br>
				<input type="text" name="username" class="textbox" />
				<span for="password"> Password </span> <br>
				<input type="password" name="password" class="textbox" />
				<div class="button_div">
				<br>
					<input type="submit" name="Submit" class="submit_button" value="Login" />
					<a href="forgot.php?page_id=1420&amp;a=pwdreset">Forgot?</a> &nbsp;
					<a href="tac.php?page_id=322">Register</a>
				</div>
			</form>
		</div>
		<?php
	}

	function display_date_options_multi($option_status, $text_date, $var_day, $var_month, $var_year, $era, $class)	{
		if(!$text_date)
			$text_date = date_today_in_DMY();
		if($option_status == "readonly")
			$option_status = "disabled";
		
		$date = explode("-", $text_date);
		$value_day = $date[0];
		$value_month = $date[1]; 
		$value_year = $date[2];
		?>
		Day
		<select class='$class' name=<?php print "'".$var_day."' ".$option_status." ".$class?>>
		<option></option>
		<?php  
			for ($i=0; $i<=31; $i++){
				if(($i == $value_day) and (!empty($value_day)))
					$status = "selected";
				print("<option value='".$i."' $status>".$i."</option>");
				$status = "";
			}
		?>
		</select>

		Month
		<select class='$class' name=<?php  print "'".$var_month."' ".$option_status." ".$class?>>
		<option></option>
		<?php  
			for ($i=0; $i<=12; $i++){
				if(($i == $value_month) and (!empty($value_month)))
					$status = "selected";
				print("<option value='".$i."' $status>".$i."</option>");
				$status = "";
			}
		?>
		</select>

		Year
		<select class='$class' name=<?php  print "'".$var_year."' ".$option_status." ".$class?>>
		<option></option>
		<?php 	if($era == "past")	{
				$end_year = date("Y") + 1;
				$start_year = date("Y") - 65;
			}
			else	{
				$end_year = date("Y") + 10;
				$start_year = date("Y") - 3;
			}
			
			for ($i=$start_year; $i<=$end_year; $i++){
				if(($i == $value_year) and (!empty($value_year)))
					$status = "selected";
				print("<option value='".$i."' $status>".$i."</option>");
				$status = "";
			}
		?>
		</select>
		<?php 
	}

	function option($db, $option_status, $name, $value, $query)	{
		if($option_status == "readonly")
			$option_status = "disabled";
		?>
		<select class='$class' name='<?print $name?>' <?print $option_status?>>
		<? 
			if(!$value) print("<option></option>");

			//$query_st = sqlite_query($db, $query);
			for ($i=0; $row = sqlite_fetch_array($query_st); $i++){
				#set value to that of primary key in database and not displayed value
				if(($row[0] == $value) and (!empty($row[0])))
					$status = "selected";
				print("<option value='".$row[0]."' $status>");
				print($row[1]);
				print("</option>");
				$status = "";
			}
		?>
		</select>
		<?
	}

	function optionArray($option_status, $name, $value, $option_array)	{
		if($option_status == "readonly")
			$option_status = "disabled";
		?>
		<select class='$class' name='<?print $name?>' <?print $option_status?>>
		<? 
			if(!$value) print("<option></option>");
			foreach ($option_array as $key => $value) {
				#set value to that of primary key in database and not displayed value
				print("<option value='".$key."' $status>");
				print ($value);
				print("</option>");
				$status = "";
			}
		?>
		</select>
		<?
	}

	function includespace()	{
		?>
			<tr>
				<td>&nbsp;</td>
			</tr>
		<?php
	}

	function includeLineAndSpace()	{
		?>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr width=10>
				<td bgcolor=#333333 colspan=5> <hr> </td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
		<?php
	}

	function textArea($class, $status, $name, $cols, $rows, $text)	{
		echo("<textarea class='$class' NAME='$name' COLS='$cols' ROWS='$rows' value='".htmlspecialchars($name, ENT_QUOTES)."' $status> $text </textarea>");
	}
	function textAreaNoClass($status, $name, $cols, $rows, $text)	{
		echo("<textarea NAME='$name' COLS='$cols' ROWS='$rows' value='".htmlspecialchars($name, ENT_QUOTES)."' $status>$text</textarea>");
	}

	function textboxOnChange($status, $name, $value, $size, $script_name)	{
		echo("<INPUT class= TYPE='text' NAME='$name' SIZE='$size' VALUE='".htmlspecialchars($value, ENT_QUOTES)."' onchange='javascript: $script_name()' $status>");
	}

	function textbox($class, $status, $name, $value, $size)	{
		echo("<INPUT class='$class' TYPE='text' NAME='$name' SIZE='$size' VALUE='".htmlspecialchars($value, ENT_QUOTES)."' $status>");
	}

	function passwordBox($name, $value, $size)	{
		echo("<INPUT class= TYPE='password' NAME='$name' SIZE='$size' VALUE='".htmlspecialchars($value, ENT_QUOTES)."'>");
	}

	function radioButton($status, $name, $value)	{
		echo("<INPUT TYPE='radio' NAME='$name' VALUE='".htmlspecialchars($value, ENT_QUOTES)."' $status>");
	}

	function checkBox($status, $name, $value)	{
		//if($value)
			//$checked = "checked";
		echo("<INPUT TYPE='checkbox' NAME='$name' VALUE='".htmlspecialchars($value, ENT_QUOTES)."' $status  $checked>");
	}
	
	function checkBox2($status, $name, $value)	{
		echo("<INPUT TYPE='checkbox' NAME='$name' VALUE='".htmlspecialchars($value, ENT_QUOTES)."' $status>");
	}

	function hiddenBox ($passed_variables)	{
		foreach ($passed_variables as $key => $value) {
			print("\n<input type='hidden' name='$key' VALUE='$value'>");
		}
	}

	function submitButton($name, $value, $class, $status){
		if($status == "readonly")
			$status = "disabled";

		echo("<INPUT type=submit value='".$value."' name='".$name."' class='".$class."' ".$status.">");
	}

	function tableHeader ($col_title)	{
		$max_i = sizeof($col_title);
		$width = intval(100/$max_i) + 2;	#column width in percentage
		print "<TR>";
		for ($i=0; $i<$max_i; $i++)	{
			?>
			<TD> 
				<h4><?php print strtoupper($col_title[$i])?> </h4>
			</TD>
			<?php
		}
		print "</TR>";
	}

	function gettabledataNews($db, $query, $url, $table_id)	{
		//$query_st = sqlite_query($db, $query);
		$col_numbers = sqlite_num_fields($query_st);
		$width = intval(100/$col_numbers) + 2;	#column width in percentage
		for ($i=0; $row = sqlite_fetch_array($query_st); $i++)	{
			?>
			<TR>
				<TD <?php print $bg_color?> valign=center class=style6> 
					<?php 
						list($day, $month, $year) = explode('-', $row[2]);	#break date to day and month
						$date = date("F d, Y", mktime (0,0,0,$month,$day,$year));

						print("<A HREF='".$url."=".urlencode($row[0])."'> <srong> ");
						print $row[1]."</srong> </A> <br>";  #just display values with no link for all other rows
						print "<div align=right>".$date."</div>";  #just display values with no link for all other rows
						if($table_id == $row[0] and $table_id)
							print "<p>".str_replace("\n", "<br>", $row[3])."</p>"
					?>
					<br>
				</TD>
			</TR>
			<?
			if($bg_color == "bgcolor=#ffffff")
				$bg_color = "bgcolor=#ffffff";
			else
				$bg_color = "bgcolor=#ffffff";
		}
	}

	function gettabledata($db, $query, $url)	{
		//$query_st = sqlite_query($db, $query);
		$col_numbers = sqlite_num_fields($query_st);
		$width = intval(100/$col_numbers) + 2;	#column width in percentage
		
		for ($i=0; $row = sqlite_fetch_array($query_st); $i++)	{
			?>
			<TR>
				<?php
					for ($i=1; $i<$col_numbers; $i++)	{	
						$value = $row[$i];
					?>
					<TD <?php print $bg_color?> valign=top> 
						<?php 
							print("<A HREF='".$url."=".urlencode($row[0])."'>");
							print "<span class=style6>";
							print $value."</span> </A>"  #just display values with no link for all other rows
						?>
					</TD>
				<?php } ?>
			</TR>
			<?
			if($bg_color == "bgcolor=#D4D4D4")
				$bg_color = "bgcolor=#ffffff";
			else
				$bg_color = "bgcolor=#D4D4D4";
		}
	}

	function getTableDataNote($db, $query, $url){
		//$query_st = sqlite_query($db, $query);

		for ($i=0; $row = sqlite_fetch_array($query_st); $i++)	{
			print $row['content']."<br>";
			print "<div align=right class='style1'> ";
			if($url)
				print "<A href='".$url."=".urlencode($row[0])."'> ";
			print "<span class='style1'> ";
			print $row['display_name']."";
			print "</span> </br>".$row['date']." </a> </div> <br><br>";
		}
	}

	function gettabledataNoLink($db, $query)	{
		//$query_st = sqlite_query($db, $query);
		$col_numbers = sqlite_num_fields($query_st);
		$width = intval(100/$col_numbers) + 2;	#column width in percentage
		
		for ($i=0; $row = sqlite_fetch_array($query_st); $i++)	{
			?>
			<TR>
				<?php
					for ($i=1; $i<$col_numbers; $i++)	{	
						$value = $row[$i];
					?>
					<TD <?php print $bg_color?> valign=top> 
						<?php 
							print $value # display values with no link
						?>
					</TD>
				<?php } ?>
			</TR>
			<?
							/*
			if($bg_color == "bgcolor=#D4D4D4")
				$bg_color = "bgcolor=#ffffff";
			else
				$bg_color = "bgcolor=#D4D4D4";
				*/
		}
	}

	function getTableDataGrouped($db, $query, $url, $col_title)	{
		//$query_st = sqlite_query($db, $query);
		$col_numbers = sqlite_num_fields($query_st);	#find the number of columns, so the width can be calculated
		$width = intval(100/$col_numbers) + 2;	#column width in percentage

		for ($i=0; $row = sqlite_fetch_array($query_st); $i++)	{
			#following bit of code is used to display the sector each share is in. 
			#this is done by holding the current and previous values of the sector and comparing. 
			#then the values are stoed in $$present_sector & $$previous_sector respectively
			
			$present_unit = "unit".$i;	#the variable will be iterated, so it is loaded into another variable
			$$present_unit = $row[$col_numbers-1];	#ordering is done by the last column
			$j = $i-1;
			$previous_unit = "unit".$j;

			if($$present_unit != $$previous_unit)	{
				?>		
				<TR>
					<TD vAlign=top colSpan=3>&nbsp;</TD>
				</TR>
				<TR>
					<TD colspan=4>
						<h5>
							<?php 	print ($$present_unit);?>
						</h5>
					</TD>
				</TR>
				<TR>
					<?php  tableHeader ($col_title);?>
				</TR>
			<?php 	}	# end of if($$present_unit != $$previous_unit)?>
			<TR>
				<TD width="5%" class=displaytable>
					<?php 	print("<A HREF='".$url."=".urlencode($row[0])."'>");  
						print($row[0]."</A>");
					?>
				</TD>
				<?php 	#code for displaying all except the last row in the table, as this is already shown above
					for ($index=1; $index<$col_numbers-1; $index++)	{	?> 
							<TD class=displaytable width="<?php  print $width?>%"> 
								<?php  print "<A HREF='".$url."=".urlencode($row[0])."'>".$row[$index]."</A>";  ?>
							</TD>
							<?php 
					}	#end of for(index)	?>
			</TR>
			<?php 
		}#end of for($i)
	}

	function displayTableDiscussion($db, $query, $login_id, $name, $col_title)
	{		
		$variables = array("login_id"=>$login_id, "discussion_id"=>$discussion_id);
		?>
		<TABLE width='100%' align=center>
			<?php 
				tableHeader ($col_title);

				//$query_st = sqlite_query($db, $query);
				for ($i=0; $row = sqlite_fetch_array($query_st); $i++)	{	#CCFFFF
					$variables["discussion_id"] = $row['discussion_id']
					?>
					<TR>
						<TD align='center' vAlign=top width=20>
							<A href="<?php urlLink("discussion_chain.php", $variables)?>">
							<span class=style6> <?php print $i+1?> </span>
							</a>
						</TD>
						<TD align='center' vAlign=top>
							<A href="<?php urlLink("discussion_chain.php", $variables)?>">
							<span class=style6> <?php print $row['topic']; ?> </span>
							</a>
						</TD>
					</TR>
					<TR>
						<TD align=right colspan=3 class=subscript>
							<?php print "<font color=red> Posted by: ".$row['member']."</font><br> on: ".$row['date'].""?>
						</TD>
					</TR>
					<?php 
				}
			?>
		</TABLE>
	<?php 
	}

	function getTableDataTickBox($query, $member_id, $check_member)	{
		//$query_st = sqlite_query($db, $query);
		$col_numbers = sqlite_num_fields($query_st);	#find the number of columns, so the width can be calculated
		$width = intval(100/$col_numbers) + 2;	#column width in percentage
		
		print "<TR>";
		for ($i=0; $row = sqlite_fetch_array($query_st); $i++)	{
			$selected = array_search($row[0], $check_member); #find a value in an array
			?>
				<TD align=LEFT  class=errorocode>
					<?php 
						if($selected) {
							$checked = "checked";
							print "<font color=red>";
						}
						print $row['name'].checkBox($status, "ch_".$row[0], $row[0], $checked);
						if($selected) print "</font>";
					?>
				</TD>
			<?php 
			$checked = "";	#clear the contents of checked variable -- re-initialize
			if($i%3 == 0) print "</TR><TR>";
		}
		print "</TR>";
	}

	function displayContent($db, $query, $first_col, $last_col, $par_row) {

		//$query_st = sqlite_query($db, $query);	# process the query and store result set in $query_st
		$max_cols = sqlite_num_fields($query_st) - $last_col;	# get number of columns in the table and 
		$row = execQuery($db, $query);

		for ($i=$first_col; $i<$max_cols; $i++){		#start from 1, so first column is ignored ie primary key
			$field_name = sqlite_field_name($query_st, $i);		#get column name in lower case

			?>
			<TABLE border=0>
				<TR>  
					<TD width=200 class=highlight>
						<?php
							print str_replace("_", " ",strtoupper($field_name))."</font>";
						?>
					</TD>
					<TD width=20> &nbsp; </TD>
					<TD>
						<strong>
						<?php 
							print $row[$field_name]."</font>";
						?>
						</strong>
					</TD>
				</TR>
			</TABLE>
			<?php 
		}
	}

	function displayContentColumns($db, $query, $class, $start, $end, $par_column) {

		//$query_st = sqlite_query($db, $query);
		$col_numbers = sqlite_num_fields($query_st);
		$col_numbers = $col_numbers - $end;	#ignore last two columns .... total and status

		$row = execQuery($db, $query);
		$cnt = 0;			#initialize the counter
		?>
		<TABLE width='100%' border=0>
			<TR>
				<?php
				for ($i=$start; $i<$col_numbers; $i++)	{	#ignore the first 3 columns in the table
						?>
						<TD width=350 vAlign='top' class='<?php print $class?>'>
							<span class=style2> <?php print strtoupper(str_replace("_", " ", sqlite_field_name($query_st, $i)))	?> </span>
							<br>
							<?php print $row[$i]?>
						</TD>
						<?php	
							$cnt = $cnt + 1;
					if($cnt % $par_column == 0)	{	#maximum number of columns to be displayed on each row
						includespace();
						$cnt = 0;			#initialize the counter
					}
				}
				?>
			</TR>				
		</TABLE>
		<?php
	}	
?>