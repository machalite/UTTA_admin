<?php
//process user's input from the form

	@session_start();

    //fetch connection settings
	include_once("connection.php");

	//escape user inputs for security
  $id = mysqli_real_escape_string($con, $_POST['id']);
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$code = mysqli_real_escape_string($con, $_POST['code']);

	//get user id from session
	$userId=$_SESSION['id'];

  //Add if ID is empty (insertion)
  if(empty($id))
  {
    //attempt insert query execution
    $sql = "INSERT INTO faculty (name,code)VALUES('$name','$code')";

    if(!mysqli_query($con, $sql))
	{
        //displays fail message and sql error
        echo $msgInsFail. mysqli_error($con);
    }
	else
	{
	    //concatenate activity description
		$strAct=$actCreate." ".$textFaculty." : ".$name;
		//record insertion in activity log
		$sql = "INSERT INTO activitylog (user,activity)
		VALUES($userId,'$strAct')";

		//execute SQL statement
		mysqli_query($con, $sql);
		//displays success message
		echo "<center>".$msgInsSucceed."</center><br>";
	}
    echo "<meta http-equiv='refresh' content='1; url=faculty.php'>";
  }

  //update if there is an ID
  else
  {
    //attempt update query execution
	$sql = "UPDATE faculty SET name='$name', code='$code'
		WHERE id=$id";
	if(!mysqli_query($con, $sql))
	{
		//display fail message and sql error
		echo $msgUpdFail. mysqli_error($con);
	}
	else
	{
	    //concatenate activity description
		$strAct=$actUpdated." ".$textFaculty.$msgWithId.$id.$msgWithName.$name;
		//record update in activity log
		$sql = "INSERT INTO activitylog (user,activity)
			VALUES($userId,'$strAct')";
		//execute SQL statement
		mysqli_query($con, $sql);
		//displays success message
		echo "<center>".$msgUpdSucceed."</center><br>";
	}
	//redirect page
	echo "<meta http-equiv='refresh' content='1; url=faculty.php'>";
  }
  //close db connection
  mysqli_close($con);
?>
