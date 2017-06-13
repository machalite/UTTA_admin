<?php
	//populate user data from database into the table

	//fetch strings to display
	include_once ("strings.php");
	//fetch connection settings
	include("connection.php");

	$sql=mysqli_query($con,"SELECT id,code,name FROM faculty ORDER BY id");
  	while($data=mysqli_fetch_array($sql,MYSQLI_ASSOC))
	{
			//populate table
?>

	<tr>
		<td><?php echo $data['code'];?></td>
		<td><?php echo $data['name'];?></td>

		<!-- generate action buttons -->
		<td width="160">
			<!-- update button -->
			<a href="faculty_form.php?&id=<?php echo $data['id']; ?>">
				<button type="button" class="btn btn-primary">
					<i class="fa fa-pencil"></i></button>
			</a>
			<!-- deactivate button -->
			<a href="faculty_form.php?&id=<?php echo $data['id']; ?>">
				<button type="button" class="btn btn-secondary">
					<i class="fa fa-power-off"></i></button>
			</a>
			<!-- delete button -->
			<a href="faculty_del.php?&id=<?php echo $data['id']; ?>
				&name=<?php echo $data['name']; ?>"
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
