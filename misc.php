<?php
	function display_date ($sqlite_date)	{
		if ($sqlite_date){
			list($year, $month, $day) = explode('-', $sqlite_date, 3);	#break date to month, day and year
			$disp_date = date("F d, Y", mktime (0,0,0,$month,$day,$year));
		}
		else	{
			$disp_date = date("l F d, Y");
		}
		return $disp_date;
	}

	function datesqlite () {
		return date("Y-m-d");
	}
	
	function date_today_in_DMY ()	{
		return date("d-m-Y");
	}
	
	function dateDMY ()	{
		return date("d/m/Y");
	}
	function dateMDY ()	{
		return date("m/d/Y");
	}
	function dateYMD ()	{
		return date("Y-m-d");
	}
	
	function convertDateDMY($date){
		//list($day, $month, $year) = explode('-', $date, 3);
		list($day, $month, $year) = explode('/', $date, 3);
		$sqlite_date = date_converter ($day, $month, $year);

		return 	$sqlite_date;	
	}

	function date_converter ($date_day, $date_month, $date_year)	{
		
		if($date_day < 10 and (strlen($date_day) < 2))	 $date_day = "0".$date_day;
		if($date_month < 10 and (strlen($date_month) < 2)) $date_month = "0".$date_month;
		
		$sqlite_date = trim($date_year."-".$date_month."-".$date_day);
		$check_date = checkdate($date_month,$date_day,$date_year);
		if ($check_date == "")	#check date is valid, if not return error massage 2
			$sqlite_date = -2;
		
		return 	$sqlite_date;	
	}
	
	function periodDisplay($start_date, $end_date){
		#convert date to sqlite format for use in query
		
		if($start_date){
			$s_date = display_date(convertDateDMY($start_date));
			if($end_date){
				$e_date = display_date(convertDateDMY($end_date));
				$display_date = "<big>".$s_date."</big> to <big>".$e_date."</big>";
			}
			else
				$display_date = "<big>".$s_date."</big> to today";
		}
		else
			$display_date = "<big> date of employment till date</big>";

		return $display_date;
	}

	function todayAsEpoch()	{
		#returns today's date as epoch
		$today = getdate();
		$today_date = mktime($today['hours'],0,0,$today['mon'],$today['mday'],$today['year']);

		return $today_date;
	}
	
	function dateConvert($text_date, $hours, $minutes, $seconds)	{	
	#convert date in text form "year-mon-day" to unix epoch format
		//$date = explode("/", $text_date);"day/mon/year"
		
		$date = explode("-", $text_date);
		$value_day = trim($date[2]);
		$value_month = trim($date[1]); 
		$value_year = trim($date[0]);

		$epoch_date = mktime($hours, $minutes, $seconds, $value_month, $value_day, $value_year);
		
		if ($epoch_date == -1)
			$epoch_date = "";	

		return $epoch_date;
	}

	function convertYearsToDays($years){		#find years in days and return two variblaes in an array
		$days = round($years * 365.25);			#the year in days and the year plus one in days
		$years = trim($years + 1);	#add one to years
		$days_1 = round($years * 365.25);
		$days_array = array($days, $days_1);

		return $days_array;
	}
	
	function urlLink($page, $parameters){		#encode the values to be passed 

		if(!is_array($parameters)){
			$variables = explode("&", $parameters);
			$max_i = sizeof($variables);
			$temp_array = array();
			for($i=0; $i<$max_i; $i++){
				$vars = explode("=", $variables[$i]);
				$temp = trim($vars[0]);
				$$temp = trim($vars[1]);
				$temp_array[$temp] = trim($$temp);
			}
			$parameters = trim($temp_array);
		}
		foreach ($parameters as $key => $value){
			$pass_parameters .= trim($key."=".$value."&");
		}

		$redirect_path = trim($pass_parameters."pws_dog=kekere");	#include password to load pages.
		$redirect_path = str_replace ("a", "%%-", $redirect_path);
		$redirect_path = str_replace ("e", "$$-", $redirect_path);
		$redirect_path = str_replace ("i", "##-", $redirect_path);
		$redirect_path = str_replace ("o", "++-", $redirect_path);
		$redirect_path = str_replace ("&", "XX-", $redirect_path);

		print $page."?path=".urlencode($redirect_path);	
	}

	function passParameters($page, $parameters){		#encode the values to be passed 

		foreach ($parameters as $key => $value){
			$pass_parameters .= trim($key."=".$value."&");
		}
		$redirect_path = trim($pass_parameters."pws_dog=kekere");	#include password to load pages.
		$redirect_path = str_replace ("a", "%%-", $redirect_path);
		$redirect_path = str_replace ("e", "$$-", $redirect_path);
		$redirect_path = str_replace ("i", "##-", $redirect_path);
		$redirect_path = str_replace ("o", "++-", $redirect_path);
		$redirect_path = str_replace ("&", "XX-", $redirect_path);

		header("Location: ".$page."?path=".urlencode($redirect_path));	
	}

	function recoverParameters($redirect_path){
		$redirect_path = str_replace ("%%-", "a", $redirect_path);
		$redirect_path = str_replace ("$$-", "e", $redirect_path);
		$redirect_path = str_replace ("##-", "i", $redirect_path);
		$redirect_path = str_replace ("++-", "o", $redirect_path);
		$redirect_path = str_replace ("XX-", "&", $redirect_path);

		$variables = explode("&", $redirect_path);
	
		return $variables;
	}

	function retreiveData($db, $table_name, $primary_key, $value){
		
		$query = "SELECT * FROM ".$table_name." WHERE $primary_key = '".$value."'";	#fetch all columns in the table

		//$query_st = sqlite_query($db, $query);	# process the query and store result set in $query_st
		$max_cols = sqlite_num_fields($query_st);	#get number of columns in the table
		$row = sqlite_fetch_array($query_st);	#fetch the rows retrieved
		
		$column_array = array();	#initialize column array

		for ($i=0; $i<$max_cols; $i++){		
			$variable = strtolower(sqlite_field_name($query_st, $i));
			$variable_content = $row[$i];
			$variable_content = str_replace('\"', '"', $variable_content);
			$variable_content = str_replace("\'", "'", $variable_content);
			
			$column_array[$variable] = trim($variable_content);	 #build column array using the column name as array key and data as value
		}
		return $column_array;
	}

	function field_check($err_array)	{
		# ensure all field set to array list are filled

		$max_i = sizeof($err_array);

		for($i=0; $i < $max_i; $i++)
		{
			if ($err_array[$i])
				$error = 0;
			else
				$error = 1;
		}
		return $error;
	}

	function displayAsterisk($error, $error_code, $name, $name2)	{

		if ($error_code == 7)	{
			if(($error == trim($error_code)) and (empty($name)))	{
				?><big><font color='red'>*</font></big><?	
			}
		}
		else	{
			if(($error == trim($error_code)) and (empty($name)) and (!empty($name2)))	{
				?><big><font color='red'>*</font></big><?	
			}
		}
	}

	function countRows($db, $query){
		//$query_st = sqlite_query($db, $query);
		return sqlite_num_rows($query_st);
	}

	function check_email($email)	{

		$check = "@";
		$pos = strpos($email, $check);

		if ($pos)
			return 1;
		return 0;
	}

	function sendMail(){
		#create three input fields.
		#set the action to any page the functionis display in
		#process the information in common.php when sendmail_button is clicked
		?>
		<p>
			<FORM action='<?php $PHP_SELF?>' method=post>
				<B>Your Email&nbsp;&nbsp;<br>
				<INPUT class=form size=25 name=youremail><BR><BR>
				<B>Friend's Email<br>
				<INPUT class=form size=25 name=friendemail><BR><BR>
				<B>Message<br>
				<INPUT class=form size=25 name=message> <BR><BR>
				<INPUT class=form type=submit name="sendmail_button" value="Send Mail!"></FORM></FORM></TD></TR></TBODY></TABLE></TD></TABLE>
			<br>
		</p>
		<?php
	}

	function send_email($from, $subject, $to, $content)	{
		#send email.
		//$to = trim($address;

		$check_email = check_email($to);
		
		if($check_email)	{
			$from_header = "From: ".$from."\ncc: ".$cc;			
			$gone = mail($to, $subject, $content, $from_header);
			//$gone = 1; #remove when email server in ready to go
		} else {
			$gone = 0;
		}

		return $gone;
	}

	function checkEmailAddress($email){
		$pos = strpos($email, "@");		//check for at sign
		if ($pos === false)
			return 0;		#not found to exit function returning zero
		else 
			$found = 1;

		$pos = strpos($email, ".");		//then check for full stop
		if ($pos === false) 
			return 0;	#not found to exit function returning zero
		else 
			$found = 1;

		return $found;
	}

	function sendContactEmail($from, $subject, $to, $content)	{
		#send email.
		//$to = trim($address;

		$checkEmailAddress = checkEmailAddress($to);
		
		if($checkEmailAddress)	{
			$from_header = "From: ".$from."\ncc: ".$cc;			
			$gone = mail($to, $subject, $content, $from_header);
			//$gone = 1; #remove when email server in ready to go
		} else {
			$gone = 0;
		}

		return $gone;
	}
	
	function scrollTopReports($db)
	{	
		?>
		<marquee width="950" scrolldelay=275 onmouseover='this.stop();' onmouseout='this.start();'>
			<table width="100%">
				<tr>
					<?php
						$query = "SELECT report_id, title FROM report ORDER BY number_read LIMIT 5";
						//$query_st = sqlite_query($db, $query);
						for ($i=0; $row = sqlite_fetch_array($query_st); $i++){
							print "<TD width=150>";
							print "<font color=red>".$row['title']."</font>";
							print("</TD>");
							$status = "";
						}
					?>
				</tr>
			</table>
		</marquee >
		<?php
	}

	function scrollNewsStory()
	{	?>
		<table border=0 class=style2>
			<TR>
				<TD class=style2>
					News & Announcements
				</TD>
			</TR>
			<TR>
				<TD height='100%' class=style2>
					<Marquee width="100%" scrolldelay=350 direction=up border=0>
						HR seminar coming in May, 2013
						<br><br>
						Launch of new website coming soon
					</marquee >
				</td>
			</tr>
		</table>
		<?php
	}

	function list_dir($dirname){
		$result_array = array();  
		if ($handle = opendir($dirname)) {

		   /* This is the correct way to loop over the directory. */
		   while (false !== ($flie = readdir($handle))) {
				$result_array[] = trim($flie);
		   }
		   closedir($handle); 
		}

		return $result_array;
	}

	function randomImage($dir, $width, $height){
		$pics = list_dir($dir);
		$size = sizeof($pics);
		
		if($width)
			$width = "width=".$width;
		if($height)
			$height = "height=".$height;
		
		for($index=0; $index<$size; $index++){	#iterate thru till you get a valid picture, else pic another flie
			$i = rand(0, $size);
			$fliename = trim($dir."/".$pics[$i]);
			if(flie_exists($fliename) and !is_dir($fliename)){
				print "<img src='".$fliename."' ".$width." ".$height." />";
				break;
			}
		}
	}

	function randomImageTitled($pics, $dir){
		$size = sizeof($pics)-1;
		$i = rand(0, $size);
		print "<img src='".$dir."/".$pics[$i]."' /><br>";
		$fliename = str_replace("_", " ", $pics[$i]);
		print "<em>".str_replace(".jpg", "", $fliename)."</em>";
	}

	function upload($dir, $id, $type_fliename){
		$flie = "./".$dir."/".$id.".jpg";
		//$flie = trim($dir."/".$id.".jpg");
		move_uploaded_file ($type_fliename, $flie);
	}
	function uploadPDF($dir, $id, $type_fliename){
		$flie = "./".$dir."/".$id.".pdf";
		move_uploaded_file ($type_fliename, $flie);
	}

	function selectIconGif(){
		$dirname = "images/gifs";		#directory of original pictures
		$flies = list_dir($dirname);	#get the names of all flies in directory
		$max_flies = sizeof($flies)-1;
		$icon = rand(2, $max_flies);
		print "<img src='".$dirname."/".$flies[$icon]."' /> ";
	}

	function loadstocks($db, $actual_file){
		//$actual_file = "euro_stocks.csv";
		$stocks_id = 0;
		$ind = 0;		#index counter for the line array
		if(file_exists($actual_file))	{
			$fp = fopen ($actual_file, "r");		#open file for read only
			while (!feof ($fp)) {		#iterate through the file until the end
				$line = fgets($fp);		#retrieve single line from the file
				$stocks = explode(',', $line);	#insert each column from into separate array cell

				$name = trim($stocks[$ind]); $ind++;
				$open = trim($stocks[$ind]); $ind++;	
				$high = trim($stocks[$ind]); $ind++;	
				$low = trim($stocks[$ind]);	 $ind++;
				$close = trim($stocks[$ind]); $ind++;
				$change = trim($stocks[$ind]); $ind++;
				$percentage_change = trim($stocks[$ind]);	 $ind++;
				$number_of_deals = trim($stocks[$ind]); $ind++;
				$traded_volumes_in_units = trim($stocks[$ind]); $ind++;
				$traded_value = trim($stocks[$ind]); $ind++;
				
				if($name){
					$stocks_id = $stocks_id + 1;
					$col_array = array("stocks_id"=>$stocks_id, "name"=>$name, "open"=>$open, "high"=>$high, "low"=>$low, "close"=>$close, "change"=>$change, "percentage_change"=>$percentage_change, "number_of_deals"=>$number_of_deals, "traded_volumes_in_units"=>$traded_volumes_in_units, "traded_value"=>$traded_value, "date"=>dateMDY ());			#sql_fxn
					insert_update_builder($db, $col_array, "stocks", "stocks_id", $stocks_id);
					$ind = 0;		#index counter for the line array
				}
			}
			fclose($fp);
		}
	}

	function fallingText($text, $font_size){
		?>
		<marquee style="z-index:2;position:absolute;left:198;top:47;font-family:Cursive;font-size:<?php print $font_size?>pt;color:ffcc00;height:201;"scrollamount="5" direction="down"> <?php print $text?></marquee>

		<marquee style="z-index:2;position:absolute;left:15;top:29;font-family:Cursive;font-size:<?php print $font_size?>pt;color:ffcc00;height:56;"direction="down"><?php print $text?></marquee>
		
		<marquee style="z-index:2;position:absolute;left:3;top:60;font-family:Cursive;font-size:<?php print $font_size?>pt;color:ffcc00;height:47;"scrollamount="7" direction="down"><?php print $text?></marquee>

		<marquee style="z-index:2;position:absolute;left:14;top:65;font-family:Cursive;font-size:<?php print $font_size?>pt;color:ffcc00;height:191;"scrollamount="4" direction="down"><?php print $text?></marquee>

		<marquee style="z-index:2;position:absolute;left:70;top:75;font-family:Cursive;font-size:<?php print $font_size?>pt;color:ffcc00;height:301;"scrollamount="5" direction="down"><?php print $text?></marquee>

		<marquee style="z-index:2;position:absolute;left:287;top:44;font-family:Cursive;font-size:<?php print $font_size?>pt;color:ffcc00;height:88;"scrollamount="7" direction="down"><?php print $text?></marquee>

		<marquee style="z-index:2;position:absolute;left:304;top:105;font-family:Cursive;font-size:<?php print $font_size?>pt;color:ffcc00;height:276;"direction="down"><?php print $text?></marquee>

		<marquee style="z-index:2;position:absolute;left:29;top:80;font-family:Cursive;font-size:<?php print $font_size?>pt;color:ffcc00;height:321;"direction="down"><?php print $text?></marquee>

		<marquee style="z-index:2;position:absolute;left:202;top:56;font-family:Cursive;font-size:<?php print $font_size?>pt;color:ffcc00;height:2;"scrollamount="4" direction="down"><?php print $text?></marquee>

		<marquee style="z-index:2;position:absolute;left:97;top:72;font-family:Cursive;font-size:<?php print $font_size?>pt;color:ffcc00;height:64;"scrollamount="5" direction="down"><?php print $text?></marquee>
		
		<marquee style="z-index:2;position:absolute;left:296;top:32;font-family:Cursive;font-size:<?php print $font_size?>pt;color:ffcc00;height:468;"scrollamount="5" direction="down"><?php print $text?></marquee>
		
		<marquee style="z-index:2;position:absolute;left:227;top:4;font-family:Cursive;font-size:<?php print $font_size?>pt;color:ffcc00;height:199;"direction="down"><?php print $text?></marquee>
		
		<marquee style="z-index:2;position:absolute;left:103;top:99;font-family:Cursive;font-size:<?php print $font_size?>pt;color:ffcc00;height:384;"scrollamount="5" direction="down"><?php print $text?></marquee>
		
		<marquee style="z-index:2;position:absolute;left:166;top:94;font-family:Cursive;font-size:<?php print $font_size?>pt;color:ffcc00;height:209;"scrollamount="3" direction="down"><?php print $text?></marquee>
		
		<marquee style="z-index:2;position:absolute;left:37;top:79;font-family:Cursive;font-size:<?php print $font_size?>pt;color:ffcc00;height:270;"scrollamount="7" direction="down"><?php print $text?></marquee>
		
		<marquee style="z-index:2;position:absolute;left:316;top:118;font-family:Cursive;font-size:<?php print $font_size?>pt;color:ffcc00;height:298;"scrollamount="4" direction="down"><?php print $text?></marquee>
		
		<marquee style="z-index:2;position:absolute;left:226;top:51;font-family:Cursive;font-size:<?php print $font_size?>pt;color:ffcc00;height:349;"scrollamount="1" direction="down"><?php print $text?></marquee>
		
		<marquee style="z-index:2;position:absolute;left:291;top:80;font-family:Cursive;font-size:<?php print $font_size?>pt;color:ffcc00;height:456;"scrollamount="7" direction="down"><?php print $text?></marquee>
		
		<marquee style="z-index:2;position:absolute;left:187;top:42;font-family:Cursive;font-size:<?php print $font_size?>pt;color:ffcc00;height:413;"scrollamount="7" direction="down"><?php print $text?></marquee>
		
		<marquee style="z-index:2;position:absolute;left:54;top:17;font-family:Cursive;font-size:<?php print $font_size?>pt;color:ffcc00;height:499;"scrollamount="6" direction="down"><?php print $text?></marquee>
		
		<marquee style="z-index:2;position:absolute;left:161;top:12;font-family:Cursive;font-size:<?php print $font_size?>pt;color:ffcc00;height:89;"scrollamount="2" direction="down"><?php print $text?></marquee>
		<span style="position:absolute;top:400px"></span>		
	<?php
	}
?>
