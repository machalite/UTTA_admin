<?php
  //fetch connection settings
  include_once("connection.php");

  //get selected user id
  $id=$_GET['id'];

  // attempt delete
  $sql="DELETE FROM user WHERE id='$id'";

  if(mysqli_query($con, $sql))
  {
		echo "<center>".$msgDelSucceed."</center><br>";
	}
  else
  {
		echo "<center>".$msgDelFail.$sql."</center>" . mysqli_error($con);
	}

  //close connection
  mysqli_close($con);

  echo "<meta http-equiv='refresh' content='1; url=user.php'>";
?>
