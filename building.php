<?php
  //displays building data for administration

	//display header
	include_once ("header.php");
	//fetch strings to display
	include_once ("strings.php");
	//fetch connection settings
	include("connection.php");
?>

<!-- PAGE CONTENT -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3><?php echo $buildingTitle;?></h3>
        </div>
      </div>
    </div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 responsive">
      <div class="x_panel">
        <div class="x_title">
          <a href="building_form.php">
						<!-- displays add button -->
            <button type="button" class="btn btn-success">
              <i class="fa fa-plus"></i>
							<?php echo (" ".$textAdd." ".$textBuilding);?></button>
          </a>
        </div>
        <div class="x_content">
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th><?php echo $tableName;?></th>
                <th><?php echo $tableDescription;?></th>
								<th><?php echo $tableActive;?></th>
                <th><?php echo $tableAction;?></th>
              </tr>
            </thead>
            <tbody>
              <?php
							//populate table with data from database
							$strDisp="SELECT id,name,description,active FROM building
                ORDER BY id";
							$sql=mysqli_query($con,$strDisp);
							while($data=mysqli_fetch_array($sql,MYSQLI_ASSOC))
							{//begin populate table ?>
								<tr>
									<td><?php echo $data['name'];?></td>
                  <td><?php echo $data['description'];?></td>
									<td>
										<input type="checkbox" name="active" disabled
										<?php if($data['active']==1){?>checked<?php } ?>>
									</td>

									<!-- generate action buttons -->
									<td width="160">
										<!-- update button -->
										<a href="building_form.php?&id=<?php echo $data['id']; ?>
											&ops=2">
											<button type="button" class="btn btn-primary">
												<i class="fa fa-pencil"></i></button>
										</a>
										<!-- deactivate button -->
										<a href="building_func.php?&id=<?php echo $data['id']; ?>
											&name=<?php echo $data['name']; ?>
											&active=<?php echo $data['active']; ?>&ops=4">
											<button type="button" class="btn btn-secondary">
												<i class="fa fa-power-off"></i></button>
										</a>


										<!-- delete button -->
										<!-- Uncomment if you want user be able to
										permanently delete record -->
										<!-- <a href="building_func.php?&id=<?php //echo $data['id']; ?>
											&name=<?php //echo $data['name']; ?>&ops=3"
											onClick="return confirm('<?php //echo $msgDel;?>')">
											<button type="button" class="btn btn-danger">
												<i class="fa fa-trash"></i></button>
										</a> -->

									</td>
								</tr>
							<?php }//end populate table ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END OF PAGE CONTENT -->

<?php
	//display footer
	include("footer.php");
?>
