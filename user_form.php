<?php
  //form for insert or update operation

	//display header
	include_once ("header.php");
	//fetch strings to display
	include_once ("strings.php");

	//if there passed ID, then fill textbox with data
	if(!empty($_GET['id']))
	{
		include_once("connection.php");

		//display update form title
		$text=$textUpdate+" "+$textUser;
		// attempt select query execution
		$sql=mysqli_query($con,"SELECT id,username,password,lastlogin FROM member
			WHERE id='$_GET[id]'");
		$data=mysqli_fetch_array($sql,MYSQLI_ASSOC);

		//fill variable with data from database to show in textfield
		$id=$data['id'];
		$username=$data['username'];
		$password=$data['password'];
		$lastlogin=$data['lastlogin'];
	}
	else {
		//empty variable if additio
				$text=$textAdd+" "+$textUser;
				$id=null;
				$username="";
				$password="";
				$lastlogin="";
	}

?>

	<!-- PAGE CONTENT -->
	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3><?php echo $text;?></h3>
				</div>
            </div>
		</div>

		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<ul class="nav navbar-right panel_toolbox">
							<li>
								<!--<a class="close-link"><i class="fa fa-close"></i></a>-->
							</li>
							<li class="dropdown">
							</li>
							<li>
								<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>

					<div class="x_content">
					<br />
						<!-- FORM -->
						<form name="userForm" method="post"
							action="tambahAnggota_proses.php" enctype="multipart/form-data"
								class="form-horizontal form-label-left">

								<!-- hidden textbox for id -->
								<input type="hidden" name="id" value="<?php echo $id;?>">

								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">
										<?php echo $formUsername;?> <span class="required">*</span>
									</label>
									<div class="col-md-3 col-sm-9 col-xs-12">
										<input type="text" name="username" class="form-control"
										required value=value="<?php echo $username;?>">
									</div>
								</div>

								<input type="hidden" name="usernamelama" value="<?php echo $data['username']; ?>" />

								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">
										Password <span class="required">*</span>
									</label>
									<div class="col-md-3 col-sm-9 col-xs-12">
										<input type="password" name="password" class="form-control" required>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">
										Password baru<span class="required">*</span>
									</label>
									<div class="col-md-3 col-sm-9 col-xs-12">
										<input type="password" name="pass1" class="form-control" required>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">
										Ulangi password <span class="required">*</span>
									</label>
									<div class="col-md-3 col-sm-9 col-xs-12">
										<input type="password" name="pass2" class="form-control" required>
									</div>
								</div>
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-3 col-xs-12">
									Nama <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-9 col-xs-12">
									<input type="text" name="name" class="form-control" value="<?php echo $name;?>" required>
									<input type="hidden" name="id" value="<?php echo $id;?>">
									<input type="hidden" name="fotoLama" value="<?php echo $image;?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-2 col-sm-3 col-xs-12">
									Foto
								</label>
								<div class="col-md-6 col-sm-9 col-xs-12">
									<img src="<?php echo $path;echo $image;?>" width="100px">
									<input type="file" name="image" class="form-control">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-2 col-sm-3 col-xs-12">
									Angkatan <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-9 col-xs-12">
									<input type="text" name="generation" class="form-control" value="<?php echo $generation;?>" required>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-2 col-sm-3 col-xs-12">
									E-Mail <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-9 col-xs-12">
									<input type="text" name="email" class="form-control" value="<?php echo $email;?>" required>
								</div>
							</div>

							<!-- show active if update -->
							<?php if(!empty($_GET['id']))
							{
								?>
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-3 col-xs-12">
									Aktif <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-9 col-xs-12">
									<input type="checkbox" name="active" class="form-control" <?php if($active==1){?>checked<?php } ?>>
								</div>
							</div>
							<?php } ?>

							<div class="ln_solid"></div>

							<div class="form-group">
								<div class="col-md-6 col-sm-9 col-xs-12 col-md-offset-2">
									<button type="submit" class="btn btn-primary"><?php echo $text;?></button>
									<a href="tampilAnggota.php">
										<button type="button" class="btn btn-danger">Batal</button>
									</a>
								</div>
							</div>
						</form>
						<!-- END OF FORM -->
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
