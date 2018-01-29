<?php
	require_once("./common.php");

	headerInfo($db, "User Manual", $member_id);	#html
?>
  <table width="90%">
	<tr>
	    <td valign='top'>
			The user manual is currently being created.
		</td>
	</tr>
 </table>
<?php
	$page_id = "index";
	footerTitle($db, $page_id)

/*
CREATE TABLE client (
  client_id integer(8) NOT NULL,
  name varchar(150) default NULL,
  contact_person varchar(200) default NULL,
  address varchar(255),
  email varchar(60),
  telephone varchar(55),
  mobile_number varchar(66),
  PRIMARY KEY  (client_id)
);


INSERT INTO bank VALUES (1, 'Afribank');
INSERT INTO bank VALUES (2, 'First Bank');
INSERT INTO bank VALUES (3, 'Oceanic Bank');
INSERT INTO bank VALUES (4, 'GT Bank');
INSERT INTO bank VALUES (5, 'Zenith Bank');
INSERT INTO bank VALUES (6, 'Sterling Bank');
INSERT INTO bank VALUES (7, 'Citi Bank');
INSERT INTO bank VALUES (8, 'Intercontineltal Bank');
INSERT INTO bank VALUES (9, 'Diamond Bank');
INSERT INTO bank VALUES (10, 'Spring Bank');
INSERT INTO bank VALUES (11, 'Standard chartered Bank');
INSERT INTO bank VALUES (12, 'Standard Trust');
INSERT INTO bank VALUES (13, 'Skye Plc');
INSERT INTO bank VALUES (14, 'UBA');
INSERT INTO bank VALUES (15, 'NATWEST England');
INSERT INTO bank VALUES (16, 'Access Bank');
INSERT INTO bank VALUES (17, 'WEMA Bank');

*/


?>
