<?php
	require_once("./connect_login.php");
	require_once("./misc.php");
	require_once("./sql_fxn.php");
	require_once("./html.php");
	require_once("./page_maker.php");
	require_once("./java_fxn.php");
	require_once("./graph_fxn.php");	
	require_once("./sc_fxn.php");
	
	error_reporting (0);
/*
	$db_name = 'website_db.sdb';
	if ($db = sqlite_open($db_name)) { 
		//sqlite_query($db, $db, 'DROP TABLE IF EXISTS `ddms_uni`.`course`;
	} else {
		die($sqliteerror);
	}
*/
	### register_globals = off ### +++
	//HTTP_GET_VARS
	while (list($key, $val) = @each($HTTP_GET_VARS)) {
		  $GLOBALS[$key] = $val;
	}
	//HTTP_POST_VARS
	while (list($key, $val) = @each($HTTP_POST_VARS)) {
		  $GLOBALS[$key] = $val;
		  $content2 .= $key." => ".$val.";\n";
		  $link_array[$key] = $val;
	}
	//HTTP_POST_FILES
	while (list($key, $val) = @each($HTTP_POST_FILES)) {
		  $GLOBALS[$key] = $val;
	}
	//$HTTP_SESSION_VARS
	while (list($key, $val) = @each($HTTP_SESSION_VARS)) {
		  $GLOBALS[$key] = $val;
	}
	### register_globals = off ### ---

	$parameters = recoverParameters($path);		#misc.php
	$max_i = sizeof($parameters);
	for($i=0; $i<$max_i; $i++){
		$vars = explode("=", $parameters[$i]);
		$temp = $vars[0];
		$$temp = $vars[1];
	}

?>