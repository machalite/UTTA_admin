<?php
  //displays lists user activities

	//display header
	include_once ("header.php");
	//fetch strings to display
	include_once ("strings.php");
?>

<!-- PAGE CONTENT -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3><?php echo $actLogTitle;?></h3>
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
                <th><?php echo $actLogUsername;?></th>
								<th><?php echo $actLogActivity?></th>
								<th><?php echo $actLogTime;?></th>
              </tr>
            </thead>
            <tbody>
              <?php
								//populate data table
								include 'activity_log_proc.php';
							?>
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
