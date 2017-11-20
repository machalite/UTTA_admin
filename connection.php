<?php
include_once("strings.php");

$server = "us-cdbr-iron-east-05.cleardb.net";
$username = "bfc1e725797bdf";
$password = "c4e344fc";
$db = "heroku_2ad6e3d7ef27f71";

// $server = "localhost";
// $username = "root";
// $password = "";
// $db = "uttadb";

$con = new mysqli($server, $username, $password, $db);

if (mysqli_connect_errno())
{
	// if connection error, display this
	echo $connectionDbConFail . mysqli_connect_error();
}
?>
