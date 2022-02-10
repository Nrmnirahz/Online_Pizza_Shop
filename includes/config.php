<?php

$hostname="127.0.0.1";
$username="pizzashop";
$password="P@ssw0rd";
$db_name="pizzashop";

$conn = mysqli_connect($hostname, $username, $password, $db_name);

if (!$conn){
	echo "Connection failed!";
}
// }else
// 	echo "Connection successful";

if (!isset($_SESSION)) {
	session_start();
}