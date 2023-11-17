<?php
session_start();
require_once("dbconnect.php");
$age = $_POST['rating'];
$type = $_POST['type'];
$_SESSION['type'] = $type;
$email = $_SESSION['email'];
$res = $mysqli->query("UPDATE users SET age = '$age', type = '$type' WHERE email = '$email'");
$mysqli -> close();
header("HTTP/1.1 301 Moved Permanently");
header("Location: ".$address_site."/index2.php");
?>
