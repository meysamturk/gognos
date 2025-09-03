<?php

$sname= "localhost";
$unmae= "sql_gognos_com";
$password = "d0f49c7223be2";

$db_name = "sql_gognos_com";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}