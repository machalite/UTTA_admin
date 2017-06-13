<?php
	//called on log out

	@session_start();
	//display header
	include_once ("connection.php");
	//fetch strings to display
	include_once ("strings.php");

	//get user id from session
	$userId=$_SESSION['id'];

	//record logout in activity log
	$sql = "INSERT INTO activitylog (user,activity)
		VALUES($userId,'$actLogout')";

	//execute SQL statement
	mysqli_query($con, $sql);

	//destroy all sessions on log out
	session_unset();
	@session_destroy();
	session_write_close();
	setcookie(session_name(),'',0,'/');
	session_regenerate_id(true);

	//redirect to login page
	header("Location: login.php");
?>
