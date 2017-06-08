<?php
	//populate user data from database into the table

	//fetch strings to display
	include_once ("strings.php");
	//open db connection
	include("connection.php");
	$sql=mysqli_query($con,"SELECT id,username,lastlogin FROM user ORDER BY id");
  while($data=mysqli_fetch_array($sql,MYSQLI_ASSOC))
	{
			//populate table
?>

	<tr>
		<td><?php echo $data['username'];?></td>
		<td><?php echo $data['lastlogin'];?></td>

		<!-- generate action buttons -->
		<td width="160">
			<!-- update button -->
			<a href="user_form.php?&id=<?php echo $data['id']; ?>">
				<button type="button" class="btn btn-primary">
					<i class="fa fa-pencil"></i></button>
			</a>
			<!-- deactivate button -->
			<a href="user_form.php?&id=<?php echo $data['id']; ?>">
				<button type="button" class="btn btn-secondary">
					<i class="fa fa-power-off"></i></button>
			</a>
			<!-- delete button -->
			<a href="user_del.php?&id=<?php echo $data['id']; ?>"
				onClick="return confirm('<?php echo $msgDel;?>')">
				<button type="button" class="btn btn-danger">
					<i class="fa fa-trash"></i></button>
			</a>
		</td>
	</tr>

<?php
	//end populate table
	}
?>
