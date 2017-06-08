<?php
	session_start();
  //fetch connection variable
	include_once("connection.php");
  //fetch strings to display
  include_once("strings.php");

	//Escape user inputs for security
	$username = mysqli_real_escape_string($con, $_POST['username']);
  //password MD5 encrypted
	$password = mysqli_real_escape_string($con,md5($_POST['password']));

	// attempt select query execution
	$sql = mysqli_query($con,"SELECT username,password FROM user WHERE username='$username' AND password='$password'");

	$data=mysqli_fetch_array($sql,MYSQLI_ASSOC);
	$userNum=mysqli_num_rows($sql);

  //check if there is error
	if($userNum==0)
  {
    //No matching username and password
    echo $logProcInvLogin;
    include 'login.php';
	}
	else if($userNum>1)
  {
    //There are several matching username and password
    echo $logProcDupLogin;
		include 'login.php';
	}
	else
  {
    //set session if log in successful
    //it will be used to prevent access to administration pages without login
    $_SESSION['username']=$data['username'];
    $_SESSION['password']=$data['password'];
    header("Location: index.php");
	}
?>
