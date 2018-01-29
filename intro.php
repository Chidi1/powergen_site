<?php
	require_once("./common.php");
	
	#check which button was clicked by member
	if($password == "cue"){ 
		passParameters("index.php", array("login_id"=>$member_id, "member_id"=>$member_id)); 
	}

	//headerInfo($db, $login_id, $search, $page_id);	#html
?>
<html>
	<head>
		<title> Online Website </title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<META HTTP-EQUIV='Refresh' CONTENT='0; URL= index.php'>
	</head>
	<body>
	</body>
</html>
