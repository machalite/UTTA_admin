<?php
	//settings for DB connection

	//fetch strings to display
	include_once("strings.php");

	//declaration and initialisation
	$host="localhost"; //localhost if hosted locally
	$user="root"; //default=root
	$pass="";
	$db="uttadb"; //database name (default=uttadb)

	//test variable
	// $host="120.89.92.80"; //localhost if hosted locally
	// $user="atmajaya_utta"; //default=root
	// $pass="=+6gPpL+GUfK";
	// $db="atmajaya_uttadb"; //database name (default=uttadb)

	//connect to database
	$con=mysqli_connect($host,$user,$pass,$db);

	// Check connection
	if (mysqli_connect_errno())
	{
		// if connection error, display this
		echo $connectionDbConFail . mysqli_connect_error();
	}
?>
