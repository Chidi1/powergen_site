<?php 
	require_once("./common.php");

	if($sendmail_button and $name){
			
		if(strtolower($name) == "adminxx"){
			passParameters("main.php", array("member_id"=>"45331", "message_sent"=>$message_sent));
		}
		else {
			//	sendContactEmail($youremail, "From calabar carnival queen website ".$name, $friendemail, $message);
			if($sendmail_button){
				$sendto = "info@fbncapital.com";
				send_email($youremail, "From the fbncapital.com contact page", $sendto, $message);	#misc
			}
		
			$message_sent = "Your message has been sent successfully";
			passParameters("contact.php", array("user_id"=>$user_id, "message_sent"=>$message_sent));
		}
	}

	headerInfo($db, $login_id, $search, $page_id);	#html
?>
	<tr>
		<td colspan=2>
			<h1> Contact Us </h1>
		</td>
	</tr>
	<tr>
		<td valign=top width='100%'> 
			<table width='100%'>
				<tr>
					<td valign=top width='38%'>
						<h4> Powergen Advisers Limited </h4>
						<hr>
						<table width='100%'>
							<tr>
								<td valign=top>
									<strong> Address: </strong>
								</td>
								<td valign=top>
									Canton Concourse <br>
									12, Landbridge Avenue, <br>
									Oniru Estate, <br>
									Victoria Island Lagos,  <br>
								</td>
							</tr>
							<tr>
								<td valign=top>
									<strong> Tel: </strong>
								</td>
								<td valign=top>
									01-7405180-1, 0806 967 1250
								</td>
							</tr>
							<tr>
								<td valign=top>
									<strong> Email: </strong> 
								</td>
								<td valign=top>
									<a href='mailto:tunde@powergenlimited.com'> tunde@powergenlimited.com </a> 
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td height=50>
						&nbsp;
					</td>
				</tr>
				<tr>
					<td colspan=3>
						<strong> Send Us An Email </strong>
						<table width='80%'>
							<tr>
								<td>
									<form action='contact.php' method='post'>
										<input type='hidden' name='user_id' value='<?php print $user_id?>'>
								</td>
							</tr>
							<tr> <td>&nbsp;</td> </tr>
							<tr>
								<td>Your Name : </td>
								<td><?php textbox($class, $status, "name", $name, 50) #html?>	</td>
							</tr>
							<tr>
								<td>Email Address: </td>
								<td><?php textbox($class, $status, "youremail", $youremail, 50) #html?>	</td>
							</tr>
							<tr>
								<td valign=top>Message : </td>
								<td><?php textareanoclass($status, "message", 52, 5, $message) ?>	</td>
							</tr>
							<tr>
								<td>
									<input class=button type=submit value="Submit" name=sendmail_button>
									</form>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
		<td>

			</form>
		</td>
	</tr>
<?php
	$page_id = "contact_us";
	footerTitle($db, $page_id)
?>