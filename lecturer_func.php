<?php
    @session_start();
    //fetch strings to display
    include_once ("strings.php");
    //fetch connection settings
    include("connection.php");

    //get operation ID
    $ops=$_GET['ops'];
    //get user id from session
    $userId=$_SESSION['id'];

    //------------------------------INSERT--------------------------------------
    if ($ops==1)
    {
      //get user inputs from the form
      $id = mysqli_real_escape_string($con, $_POST['id']);
      $name = mysqli_real_escape_string($con, $_POST['name']);
      $code = mysqli_real_escape_string($con, $_POST['code']);

      //attempt insert query execution
      $strIns = "INSERT INTO lecturer (name,code)VALUES('$name','$code')";

      if(!mysqli_query($con, $strIns))
      {
        //displays fail message and sql error
        echo $msgInsFail. mysqli_error($con);
      }
      else
      {
        //concatenate activity description
  		  $strAct=$actCreate." ".$textLecturer." : ".$name;
  		  //record insertion in activity log
  		  $sql = "INSERT INTO activitylog (user,activity)
  		  VALUES($userId,'$strAct')";
        //execute SQL statement
  		  mysqli_query($con, $sql);
  		  //displays success message
  		  echo "<center>".$msgInsSucceed."</center><br>";
      }
      //close connection
      mysqli_close($con);
      echo "<meta http-equiv='refresh' content='1; url=lecturer.php'>";
    }
    //------------------------------UPDATE--------------------------------------
    elseif ($ops==2)
    {
      //get user inputs from the form
      $id = mysqli_real_escape_string($con, $_POST['id']);
      $name = mysqli_real_escape_string($con, $_POST['name']);
      $code = mysqli_real_escape_string($con, $_POST['code']);

      //attempt update query execution
      $sql = "UPDATE lecturer SET name='$name', code='$code'WHERE id=$id";
      if(!mysqli_query($con, $sql))
      {
        //display fail message and sql error
        echo $msgUpdFail. mysqli_error($con);
      }
      else
      {
        //concatenate activity description
        $strAct=$actUpdated." ".$textLecturer.$msgWithId.$id.$msgWithName.$name;
        //record update in activity log
        $sql = "INSERT INTO activitylog (user,activity)
          VALUES($userId,'$strAct')";
        //execute SQL statement
        mysqli_query($con, $sql);
        //displays success message
        echo "<center>".$msgUpdSucceed."</center><br>";
      }
      //close connection
      mysqli_close($con);
      //redirect page
      echo "<meta http-equiv='refresh' content='1; url=lecturer.php'>";
    }
    //--------------------------------DELETE------------------------------------
    elseif ($ops==3)
    {
      //get selected record's id and username
      $id=$_GET['id'];
      $name=$_GET['name'];

      // attempt delete
      $sql="DELETE FROM lecturer WHERE id='$id'";

      if(!mysqli_query($con, $sql))
      {
          echo "<center>".$msgDelFail.$sql."</center>" . mysqli_error($con);
      }
      else
      {
        echo "<center>".$msgDelSucceed."</center><br>";

        //record deletion in activity log
        //get user id from session
        $userId=$_SESSION['id'];
        $strAct=$actDeleted." ".$textLecturer.$msgWithId.$id.$msgWithName.$name;
        $sql = "INSERT INTO activitylog (user,activity)
          VALUES($userId,'$strAct')";
        mysqli_query($con, $sql);
    	}
      //close connection
      mysqli_close($con);
      echo "<meta http-equiv='refresh' content='1; url=lecturer.php'>";
    }
    //------------------------------DEACTIVATE----------------------------------
    elseif ($ops==4)
    {
      //get selected record's id and name
      $id=$_GET['id'];
      $name=$_GET['name'];
      $active=$_GET['active'];

      //deactivate or activate record
      if($active==1)
      {
        $active=0;
        $msgFail=$msgDeActFail;
        $msgSuccess=$msgDeActSucceed;
        $msgAct=$actDeActivated;
      }
      elseif($active==0)
      {
        $active=1;
        $msgFail=$msgActFail;
        $msgSuccess=$msgActSucceed;
        $msgAct=$actActivated;
      }

      //attempt update query execution
      $sql = "UPDATE lecturer SET active=$active WHERE id=$id";
      if(!mysqli_query($con, $sql))
      {
        //display fail message and sql error
        echo $msgFail. mysqli_error($con);
      }
      else
      {
        //concatenate activity description
        $strDeAct=$msgAct." ".$textLecturer.
          $msgWithId.$id.$msgWithName.$name;

        //record update in activity log
        $sql = "INSERT INTO activitylog (user,activity)
          VALUES($userId,'$strDeAct')";
        //execute SQL statement
        mysqli_query($con, $sql);
        //displays success message
        echo "<center>".$msgSuccess."</center><br>";
      }
      //close connection
      mysqli_close($con);
      //redirect page
      echo "<meta http-equiv='refresh' content='1; url=lecturer.php'>";
    }

?>
