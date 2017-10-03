<?php
  //displays lists user activities

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
          <h3><?php echo $usageLogTitle;?></h3>
        </div>
      </div>
    </div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 responsive">
      <div class="x_panel">
        <div class="x_title">
        </div>
        <div class="x_content">
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th><?php echo $usageLogName;?></th>
                <th><?php echo $usageLogLineId?></th>
								<th><?php echo $usageLogActivity?></th>
								<th><?php echo $usageLogTime;?></th>
              </tr>
            </thead>
            <tbody>
              <?php
							//populate the table with activity log from database
							$strDisp="SELECT u.id,s.name,s.lineid,activity,timestamp
							FROM usageLog u, student s
							WHERE u.student=s.id ORDER BY timestamp DESC";
							$sql=mysqli_query($con,$strDisp);
							while($data=mysqli_fetch_array($sql,MYSQLI_ASSOC))
							{//begin populate table?>
							<tr>
								<td><?php echo $data['name'];?></td>
                <td><?php echo $data['lineid'];?></td>
								<td><?php echo $data['activity'];?></td>
								<td><?php echo $data['timestamp'];?></td>
							</tr>
							<?php  }//end populate table ?>
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
	require("footer.php");
?>
