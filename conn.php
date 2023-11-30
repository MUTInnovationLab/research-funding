<?php
$sname= "localhost";
$unmae= "root";
$password = "";
$db_name = "research_db";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}
