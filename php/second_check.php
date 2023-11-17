<?php
session_start();
require_once("dbconnect.php");
$array =  $_POST['contact'];
$email = $_SESSION['email'];
	switch ($array) {
		case 'pc':
			$res = $mysqli->query("UPDATE users SET interest = '$array' WHERE email = '$email'");
		
			break;
		case 'eco':
			$res = $mysqli->query("UPDATE users SET interest_2 = '$array' WHERE email = '$email'");
		
			break;
		case 'ai':
			$res = $mysqli->query("UPDATE users SET interest = '$array' WHERE email = '$email'");
		
			break;
		case 'db':
			$res = $mysqli->query("UPDATE users SET interest_2 = '$array' WHERE email = '$email'");
		
			break;
};
$res = $mysqli->query("UPDATE users SET `end` = '1' WHERE email = '$email'");
$mysqli -> close();
$_SESSION['end'] = 1;
header("HTTP/1.1 301 Moved Permanently");
header("Location: ".$address_site."/dash/dash.php");
?>
