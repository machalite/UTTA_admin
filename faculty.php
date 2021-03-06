<?php
  //displays faculty data for administration

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
          <h3><?php echo $facultyTitle;?></h3>
        </div>
      </div>
    </div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 responsive">
      <div class="x_panel">
        <div class="x_title">
          <a href="faculty_form.php">
						<!-- displays add button -->
            <button type="button" class="btn btn-success">
              <i class="fa fa-plus"></i>
							<?php echo (" ".$textAdd." ".$textFaculty);?></button>
          </a>
        </div>
        <div class="x_content">
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th><?php echo $tableCode;?></th>
                <th><?php echo $tableName;?></th>
                <th><?php echo $tableAction;?></th>

              </tr>
            </thead>
            <tbody>
              <?php
								//populate data table
								include 'faculty_proc.php';
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
