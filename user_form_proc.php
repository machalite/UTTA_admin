<?php
  //fetch connection settings
	include_once("connection.php");

	//escape user inputs for security
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$id = mysqli_real_escape_string($con, $_POST['id']);

	//encrypt submitted password using MD5
	$password =md5(mysqli_real_escape_string($con,$_POST['pass']));
  $reppassword =md5(mysqli_real_escape_string($con,$_POST['repass']));

  //Add user if ID is empty (insertion)
  if(empty($id))
  {
    //Check if password repetition match
    if($password!=$reppassword)
    {
      //displays message and redirect to form
			?>
			<script>
				alert("<?php echo $msgPassNotMatch;?>");
				// window.location.href = "user_form.php";
			</script>
			<?php
			include("user_form.php");
    }
    else
    {
      //attempt insert query execution
      $sql = "INSERT INTO user (username,password)
        VALUES('$username','$password')";

      if(!mysqli_query($con, $sql))
			{
				//display fail message and sql error
        echo $msgInsFail. mysqli_error($con);
      }
    }
  }
  //update member if there is an ID
  else
  {
    $newpassword =md5(mysqli_real_escape_string($con,$_POST['newpass']));

		//Old password already encrypted in MD5
		$oldpassword =mysqli_real_escape_string($con,$_POST['oldpassword']);

		//Check if submitted password match with previous password
    if($password!=$oldpassword)
    {
			//Check if new password repetition match
			if($newpassword!=$reppassword)
			{
				//displays message and redirect to form
				?>
				<script>
					alert("<?php echo $msgPassNotMatch;?>");
					window.location.href = "user_form.php";
				</script>
				<?php
			}
      //displays message and redirect to form
			?>
			<script>
				alert("<?php echo $msgPassInv;?>");
				window.location.href = "user_form.php";
			</script>
			<?php
    }

    //attempt insert query execution
    $sql = "UPDATE user SET username='$username', password='$newpassword'
			WHERE id=$id";

			if(!mysqli_query($con, $sql))
			{
				//display fail message and sql error
				echo $msgUpdFail. mysqli_error($con);
			}
  }
  //close connection
  mysqli_close($con);

  //redirect page
  echo "<meta http-equiv='refresh' content='1; url=user.php'>";
  ?>
