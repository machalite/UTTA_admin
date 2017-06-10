<?php
	//populate the table with activity log from database

	//fetch strings to display
	include_once ("strings.php");
	//fetch connection settings
	include("connection.php");
  $strQry="SELECT a.id,username,activity,timestamp
  FROM activitylog a, user u
  WHERE a.user=u.id ORDER BY timestamp DESC";
	$sql=mysqli_query($con,$strQry);
  while($data=mysqli_fetch_array($sql,MYSQLI_ASSOC))
	{
			//populate table
?>

	<tr>
		<td><?php echo $data['username'];?></td>
    <td><?php echo $data['activity'];?></td>
    <td><?php echo $data['timestamp'];?></td>
	</tr>

<?php
	//end populate table
	}
?>
