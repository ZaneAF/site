<?php
session_start();
require_once("dbconnect.php");
$res = $mysqli->query("UPDATE ai SET complete = '1' WHERE id_test = '2'");
$mysqli -> close();
header("HTTP/1.1 301 Moved Permanently");
header("Location: ".$address_site."/dash/dash.php");
?>
