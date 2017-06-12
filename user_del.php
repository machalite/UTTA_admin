<?php
  @session_start();

  //fetch connection settings
  include_once("connection.php");
  //fetch strings to display
  include_once ("strings.php");

  //get selected user id
  $id=$_GET['id'];

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
    $dateTime=date('Y-m-d H:i:s');
    //get user id from session
    $userId=$_SESSION['id'];
    $strAct=$actDeleted." ".$textUser." ".$id;
    $sql = "INSERT INTO activitylog (user,activity,timestamp)
      VALUES($userId,'$strAct','$dateTime')";
    mysqli_query($con, $sql);
	}

  //close connection
  mysqli_close($con);

  echo "<meta http-equiv='refresh' content='1; url=user.php'>";
?>
