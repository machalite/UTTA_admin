<?php
  @session_start();

  //fetch connection settings
  include_once("connection.php");
  //fetch strings to display
  include_once ("strings.php");

  //get selected user's id and username
  $id=$_GET['id'];
  $name=$_GET['name'];
  

  // attempt delete
  $sql="DELETE FROM user WHERE id='$id'";

  if(!mysqli_query($con, $sql))
  {
		echo "<center>".$msgDelFail.$sql."</center>" . mysqli_error($con);
	}
  else
  {
    echo "<center>".$msgDelSucceed."</center><br>";

    //record deletion in activity log
    //Get login date and time
    //get user id from session
    $userId=$_SESSION['id'];
    $strAct=$actDeleted." ".$textUser.$msgWithId.$id.$msgWithName.$name;
    $sql = "INSERT INTO activitylog (user,activity)
      VALUES($userId,'$strAct')";
    mysqli_query($con, $sql);
	}

  //close connection
  mysqli_close($con);

  echo "<meta http-equiv='refresh' content='1; url=user.php'>";
?>
