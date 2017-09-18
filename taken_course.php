<?php
  //displays class data for administration

	//display header
	include_once ("header.php");
	//fetch strings to display
	include_once ("strings.php");
	//fetch connection settings
	include_once ("connection.php");

	$studentId=$_GET['id'];
	$studentName=$_GET['name'];
	$studentCode=$_GET['code'];
?>

<!-- PAGE CONTENT -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3><?php echo $studentName;?></h3>
        </div>
      </div>
    </div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 responsive">
      <div class="x_panel">
        <div class="x_title">

					<!-- FORM -->
					<form name="takenCourseForm" method="post"
						action="taken_course_func.php?&ops=1" enctype="multipart/form-data"
							class="form-horizontal form-label-left">

							<!-- hidden textfield for id -->
							<input type="hidden" name="student" value="<?php echo $studentId." ".$studentCode;?>">

							<!-- Create dynamic listbox -->
							<div class="form-group">
								<label class="control-label col-md-1 col-sm-3 col-xs-12">
									<?php echo $formCourse;?></label>
								<div class="col-md-5 col-sm-9 col-xs-12">
									<select name="course" id="listBox" class="form-control">
										<?php
											$qry="SELECT id, name FROM course WHERE active=1
											ORDER BY name";
											$sql=mysqli_query($con,$qry);
											while($data=mysqli_fetch_array($sql,MYSQLI_ASSOC))
											{ //begin populate list ?>
												<option value=<?php echo $data['id']; ?>>
													<?php echo $data['name'];?>
												</option>
										<?php } //end populate list ?>
									</select>
								</div>
								<button type="submit" class="btn btn-success">
									<i class="fa fa-plus"></i>
									<?php echo (" ".$textAdd." ".$textCourse);?>
								</button>
							</div>
					</form>
        </div>

        <div class="x_content">
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th><?php echo $tableCode;?></th>
								<th><?php echo $tableCourse;?></th>
								<th><?php echo $tableLecturer;?></th>
								<th><?php echo $tableActive;?></th>
                <th><?php echo $tableAction;?></th>
              </tr>
            </thead>
            <tbody>
              <?php
							//populate table with data from database
							$strDisp="SELECT c.code, c.name AS course, l.name AS lecturer,
								c.active
							FROM takencourse t, course c, lecturer l
							WHERE c.id=t.course
							AND c.lecturer=l.id
							AND t.student=$studentId";
							$sql=mysqli_query($con,$strDisp);
							while($data=mysqli_fetch_array($sql,MYSQLI_ASSOC))
							{//begin populate table ?>
								<tr>
                  <td><?php echo $data['code'];?></td>
                  <td><?php echo $data['course'];?></td>
                  <td><?php echo $data['lecturer'];?></td>
									<td>
										<input type="checkbox" name="active" disabled
										<?php if($data['active']==1){?>checked<?php } ?>>
									</td>

									<!-- generate action buttons -->
									<td width="160">
										<!-- delete button -->
										<!-- Uncomment if you want user be able to
										permanently delete record -->
										<a href="taken_course_func.php?&id=<?php echo $data['id']; ?>
											&name=<?php echo $data['course']; ?>&ops=3"
											onClick="return confirm('<?php echo $msgDel;?>')">
											<button type="button" class="btn btn-danger">
												<i class="fa fa-trash"></i></button>
										</a>
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
