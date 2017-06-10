<?php
	//called on log out

	@session_start();
	//fetch connection settings
	include_once ("connection.php");
	//fetch strings to display
	include_once ("strings.php");

	//Get login date and time
	$dateTime=date('Y-m-d H:i:s');
	//get user id from session
	$id=$_SESSION['id'];

	//record logout in activity log
	$sql = "INSERT INTO activitylog (user,activity,timestamp)
		VALUES($id,'$actLogout','$dateTime')";
	mysqli_query($con, $sql))


	//destroy all sessions on log out
	session_unset();
	@session_destroy();
	session_write_close();
	setcookie(session_name(),'',0,'/');
	session_regenerate_id(true);

	//redirect to login page
	header("Location: login.php");
?>
