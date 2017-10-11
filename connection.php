<?php
include_once("strings.php");
// $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
//
// $server = $url["host"];
// $username = $url["user"];
// $password = $url["pass"];
// $db = substr($url["path"], 1);

$server = "us-cdbr-iron-east-05.cleardb.net";
$username = "bfc1e725797bdf";
$password = "c4e344fc";
$db = "heroku_2ad6e3d7ef27f71";


$con = new mysqli($server, $username, $password, $db);

if (mysqli_connect_errno())
{
	// if connection error, display this
	echo $connectionDbConFail . mysqli_connect_error();
}


	//settings for DB connection

	//fetch strings to display
	// include_once("strings.php");

	//declaration and initialisation
	// $host="us-cdbr-iron-east-05.cleardb.net"; //localhost if hosted locally
	// $user="bfc1e725797bdf"; //default=root
	// $pass="c4e344fc";
	// $db="heroku_2ad6e3d7ef27f71"; //database name (default=uttadb)
	//
	// //connect to database
	// $con=mysqli_connect($host,$user,$pass,$db);
	//
	// // Check connection
	// if (mysqli_connect_errno())
	// {
	// 	// if connection error, display this
	// 	echo $connectionDbConFail . mysqli_connect_error();
	// }
?>
