<?php
$db['server'] = "localhost";
$db['user'] = "root";
$db['pass'] = "";
$db['dbname'] = "cms";

foreach ($db as $key => $value) {
	define(strtoupper($key),$value);
}

$conn = mysqli_connect(SERVER,USER,PASS,DBNAME);
if(!$conn) {
	die("Failed to conmunicate with the server");
}


?>