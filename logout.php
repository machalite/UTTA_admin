<?php
	//called on log out

	//destroy all sessions on log out
	session_unset();
	@session_destroy();
	session_write_close();
	setcookie(session_name(),'',0,'/');
	session_regenerate_id(true);

	//redirect to login page
	header("Location: login.php");
?>
