<?php
//process user's input from the form

	@session_start();

    //fetch connection settings
	include_once("connection.php");

	//escape user inputs for security
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$id = mysqli_real_escape_string($con, $_POST['id']);

	//encrypt submitted passwords using MD5
	$password =md5(mysqli_real_escape_string($con,$_POST['pass']));
  $reppassword =md5(mysqli_real_escape_string($con,$_POST['repass']));

	//get user id from session
	$userId=$_SESSION['id'];

  //Add if ID is empty (insertion)
  if(empty($id))
  {
    //Check if password repetition match
    if($password!=$reppassword)
    {
      echo "<center>".$msgPassNotMatch."</center><br>";
			echo "<meta http-equiv='refresh' content='1; url=user_form.php'>";
    }
    else
    {
      //attempt insert query execution
      $sql = "INSERT INTO user (username,password)
        VALUES('$username','$password')";

      if(!mysqli_query($con, $sql))
			{
				//displays fail message and sql error
        echo $msgInsFail. mysqli_error($con);
      }
			else
			{
				//concatenate activity description
				$strAct=$actCreate." ".$textUser." : ".$username;
				//record insertion in activity log
				$sql = "INSERT INTO activitylog (user,activity)
					VALUES($userId,'$strAct')";

				//execute SQL statement
				mysqli_query($con, $sql);
				//displays success message
				echo "<center>".$msgInsSucceed."</center><br>";
			}
			echo "<meta http-equiv='refresh' content='1; url=user.php'>";
    }
  }
  //update if there is an ID
  else
  {
    $newpassword =md5(mysqli_real_escape_string($con,$_POST['newpass']));

		//Old password already encrypted in MD5
		$oldpassword =mysqli_real_escape_string($con,$_POST['oldpassword']);

		//Check if submitted password match with previous password
    if($password!=$oldpassword)
    {
			echo "<center>".$msgPassInv."</center><br>";
			echo "<meta http-equiv='refresh' content='1; url=user.php'>";
    }
		//Check if new password repetition match
		elseif ($newpassword!=$reppassword)
		{
			echo "<center>".$msgPassNotMatch."</center><br>";
			echo "<meta http-equiv='refresh' content='1; url=user.php'>";
		}
		//submitted password match with old password
		//and password repetition matches
		else
		{
			//attempt update query execution
			$sql = "UPDATE user SET username='$username', password='$newpassword'
				WHERE id=$id";
			if(!mysqli_query($con, $sql))
			{
				//display fail message and sql error
				echo $msgUpdFail. mysqli_error($con);
			}
			else
			{
				//concatenate activity description
				$strAct=$actUpdated." ".$textUser.$msgWithId.$id.$msgWithName.$username;
				//record update in activity log
				$sql = "INSERT INTO activitylog (user,activity)
					VALUES($userId,'$strAct')";
				//execute SQL statement
				mysqli_query($con, $sql);
				//displays success message
				echo "<center>".$msgUpdSucceed."</center><br>";
			}
			//redirect page
			echo "<meta http-equiv='refresh' content='1; url=user.php'>";
		}
  }
  //close db connection
  mysqli_close($con);
?>