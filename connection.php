<?php
include_once("strings.php");

$server = "";
$username = "";
$password = "";
$db = "";

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
