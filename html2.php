<?php
	function headerInfo($db, $page_name, $login_id)	{
		$variables = array("login_id"=>$login_id, "page_name"=>$page_name);
		$row = execQuery($db, "SELECT display_name FROM member WHERE member_id = '".$login_id."'");;
		$h = "h3";		// dark blue - #001346    mid blue - #3974AC    light blue - #8DDAFF
	?>
	<html>
		<head>
			<title> Powergen Advisers Ltd </title>
			<link rel="stylesheet" type="text/css" href="s.css" />
			<link rel="shortcut icon" href="image/favicon.ico" >
		</head>

		<body>
			 <table align="center" width="950" cellpadding="0" cellspacing="0" bgcolor='#ffffff'> 
				<tr>
					<td width='100%'> 
						<table width='100%' cellpadding="0" cellspacing="0">
							<tr>
								<td width=120> 
									<img src="image/logo.jpg" height=85> 
									<img src="image/line.jpg" height=85> 
								</td>
								<td valign=top class=style_title> 
									Powergen Advisers Limited
								</td>
								<td valign=top align=right>
									<table width='100%'>
										<tr>
											<td class=style_title2 align=right valign=top>
												Contact Us  <font color=#ACACAC>&nbsp;|&nbsp;</font> 
												Innovation & Tech. <font color=#ACACAC>&nbsp;|&nbsp;</font> 
												Our People <font color=#ACACAC>&nbsp;|&nbsp;</font> 
												Press					
											</td>
										</tr>
										<tr>
											<td class=style_title4 valign=bottom align=right height=50>
												Search <?php textBox("textbox2", $status, "search", $value, "20") ?>
												<INPUT class=button_small type=submit value="GO" name=go_search> 
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td colspan=3>
									<div id="nav">
									<table width='72%' cellpadding="0" cellspacing="2">
										<tr>
											<td class=nav>
												<A href="<?php urlLink("index.php", $variables)?>"> Home </a> 
											</td>
											<td class=nav>
												<A href="<?php urlLink("about.php", $variables)?>"> About SAPETRO </a> 
											</td>
											<td class=nav>
												<A href="<?php urlLink("partners.php", $variables)?>"> Technical Partners </a> 
											</td>
											<td class=nav>
												<A href="<?php urlLink("news.php", $variables)?>"> News & Events </a> 
											</td>
											<td class=nav>
												<A href="<?php urlLink("index.php", $variables)?>"> Sustainability </a> 
											</td>
											<td class=nav>
												<A href="<?php urlLink("index.php", $variables)?>"> Careers </a> 
											</td>
										</tr>
									</table>
									<hr>
									</div>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td align=center valign=top>
						<table width='100%' cellpadding="0" cellspacing="0">
				
		<?php
	}

	function footerTitle($db, $page_id){	
		sqlite_close($db);
	?>
						</table>
					</td>
				</tr>
				<tr>
					<td align='right' colspan=3>
						<font color="#111111" size=1>Copyright© 2012 SC. </font>
						<a href="http://www.cube-serve.com" target=_blank> <font color="#111111" size=1> Powered by Cube Serve Ltd </font> </a>
					</td>
				</tr>
			</table>
			</body>
		</html>
	<?
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
		<select class=textbox name=<?php print "'".$var_day."' ".$option_status." ".$class?>>
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
		<select class=textbox name=<?php  print "'".$var_month."' ".$option_status." ".$class?>>
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
		<select class=textbox name=<?php  print "'".$var_year."' ".$option_status." ".$class?>>
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
		<select class=textbox name='<?print $name?>' <?print $option_status?>>
		<? 
			if(!$value) print("<option></option>");

			$query_st = sqlite_query($db, $query);
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
		<select class=textbox name='<?print $name?>' <?print $option_status?>>
		<? 
			if(!$value) print("<option></option>");
			foreach ($option_array as $key => $value) {
				#set value to that of primary key in database and not displayed value
				print("<option value='".$key."' $status>");
				print strtoupper($value);
				print("</option>");
				$status = "";
			}
		?>
		</select>
		<?
	}

	function includespace()	{
		?>
			<TR>
				<TD>&nbsp;</TD>
			</TR>
		<?
	}

	function includeLineAndSpace()	{
		?>
			<TR>
				<TD>&nbsp;</TD>
			</TR>
			<TR width=10>
				<TD bgColor=#333333 colSpan=5> <hr> </TD>
			</TR>
			<TR>
				<TD>&nbsp;</TD>
			</TR>
		<?
	}

	function textArea($status, $name, $cols, $rows, $text)	{
			echo("<br><textarea class=textbox NAME='$name' COLS='$cols' ROWS='$rows' value='".htmlspecialchars($name, ENT_QUOTES)."' $status>$text</textarea>");
	}

	function textBoxOnChange($status, $name, $value, $size, $script_name)	{
		echo("<INPUT class=textbox TYPE='text' NAME='$name' SIZE='$size' VALUE='".htmlspecialchars($value, ENT_QUOTES)."' onchange='javascript: $script_name()' $status>");
	}

	function textBox($class, $status, $name, $value, $size)	{
		echo("<INPUT class='$class' TYPE='text' NAME='$name' SIZE='$size' VALUE='".htmlspecialchars($value, ENT_QUOTES)."' $status>");
	}

	function passwordBox($name, $value, $size)	{
		echo("<INPUT class=textbox TYPE='password' NAME='$name' SIZE='$size' VALUE='".htmlspecialchars($value, ENT_QUOTES)."'>");
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

	function gettabledata($db, $query, $url)	{
		$query_st = sqlite_query($db, $query);
		$col_numbers = sqlite_num_fields($query_st);
		$width = intval(100/$col_numbers) + 2;	#column width in percentage
		
		for ($i=0; $row = sqlite_fetch_array($query_st); $i++)	{
			?>
			<TR>
				<?php
					for ($i=1; $i<$col_numbers; $i++)	{	
						$value = $row[$i];
					?>
					<TD> 
						<?php 
							print("<A HREF='".$url."=".urlencode($row[0])."'>");
							print "<span class=style6>";
							print $value."</span> </A>"  #just display values with no link for all other rows
						?>
					</TD>
				<?php } ?>
			</TR>
			<?
		}
	}

	function getTableDataNote($db, $query, $url){
		$query_st = sqlite_query($db, $query);

		for ($i=0; $row = sqlite_fetch_array($query_st); $i++)	{
			print $row['note_content']."<br>";
			print "<div align=right class='style1'> ";
			print "<A href='".$url."=".urlencode($row[0])."'> <span class='style1'> ";
			print $row['display_name']."";
			print "</span> </br>".$row['date']." </a> </div> <br><br>";
		}
	}

	function gettabledataNoLink($db, $query)	{
		$query_st = sqlite_query($db, $query);
		$col_numbers = sqlite_num_fields($query_st);
		$width = intval(100/$col_numbers) + 2;	#column width in percentage
		
		for ($i=0; $row = sqlite_fetch_array($query_st); $i++)	{
			?>
			<TR>
				<?php
					for ($i=1; $i<$col_numbers; $i++)	{	
						$value = $row[$i];
					?>
					<TD> 
						<?php 
							print $value #just display values with no link for all other rows
						?>
					</TD>
				<?php } ?>
			</TR>
			<?
		}
	}

	function getTableDataGrouped($db, $query, $url, $col_title)	{
		$query_st = sqlite_query($db, $query);
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

				$query_st = sqlite_query($db, $query);
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
		$query_st = sqlite_query($db, $query);
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

		$query_st = sqlite_query($db, $query);	# process the query and store result set in $query_st
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

		$query_st = sqlite_query($db, $query);
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