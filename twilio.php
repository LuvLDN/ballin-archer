<?php
require_once("/usr/share/php/Services/Twilio.php");

if(isset($_POST['to'])) {
	$to = $_POST['to'];
	$message = $_POST['message'];
} else {
	$to = "+447853262719";
	$message = "hello world";
}
$to = "+447530606033";
$from = "+441782435576";

try {
	// Your Account Sid and Auth Token from twilio.com/user/account
	$sid = "ACfdd6fa4773779374df46bac975a5ebc7"; 
	$token = "21ad90beb98e7b7dbac44276d6f83317"; 
	$client = new Services_Twilio($sid, $token);
	 
	$client->account->messages->sendMessage($from, $to, $message, array());

    echo '{"status":"success"}';
} catch(Exception $e) {
	echo '{"status":"error", "message": "' . $e->getMessage() . '" }';
}

?>