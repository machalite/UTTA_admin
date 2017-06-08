<!DOCTYPE html>
<html>

<?php
  //fetch strings to display
  include_once ("strings.php");

  @session_start();
  // Prevent user entering without log in
  //check if session is empty (no login)
  if(empty($_SESSION['username']) OR empty($_SESSION['password']))
  {
    //redirect to login.php
    echo "<meta http-equiv='refresh' content='1; url=login.php'>";
  }
?>

<head>
	<!-- META TAG-->
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Administration page for UTTA bot" />
	<meta name="keywords" content="UTTA, bot, line, university, time-table,
  scheduling, machalite, php" />
	<!-- END OF META TAG -->

	<!-- CSS -->
	<!-- Bootstrap -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- Bootstrap-Wysiwyg -->
	<link href="css/prettify.min.css" rel="stylesheet">
	<!-- Custom Theme Style -->
	<link href="css/custom.css" rel="stylesheet">
	<!-- Datatables -->
    <link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="css/scroller.bootstrap.min.css" rel="stylesheet">
	<!-- END OF CSS -->

  <!-- display favicon -->
	<link rel="shortcut icon" type="image/png" href="img/favicon.ico"/>

	<title><?php echo $headerTitle;?></title>
</head>

<body class="nav-md">
    <div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="index.php" class="site_title">
							<i class="fa fa-paw"></i>
              <?php echo $sidebarTitle;?>
						</a>
					</div>

					<div class="clearfix"></div>
					<br />

					<!-- SIDEBAR MENU -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3>Menu</h3>
							<ul class="nav side-menu">

								<li>
									<a href="tampilAnggota.php"><i class="fa fa-users"></i> Anggota </a>
								</li>

								<li>
									<a href="tampilProjek.php"><i class="fa fa-calendar"></i> Projek </a>
								</li>

								<li>
									<a href="tampilBerita.php"><i class="fa fa-edit"></i> Berita </a>
								</li>

								<li>
									<a href="tampilGaleri.php"><i class="fa fa-picture-o"></i> Galeri </a>
								</li>
							</ul>
						</div>
					</div>
					<!-- END OF SIDEBAR MENU -->
				</div>
			</div>

			<!-- TOP NAVIGATION -->
			<div class="top_nav">
				<div class="nav_menu">
					<nav class="" role="navigation">
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i></a>
						</div>

						<ul class="nav navbar-nav navbar-right">
							<li class="">
								<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<!-- MENAMPILKAN LOGO BESERTA NAMA DIVISI -->
									<img src="img/logo.png" alt="">
									<?php echo $_SESSION['username']; ?>
									<span class=" fa fa-angle-down"></span>
								</a>
								<ul class="dropdown-menu dropdown-usermenu pull-right">
									<li><a href="javascript:;">Help</a></li>
									<li><a href="keluar.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<!-- END OF TOP NAVIGATION -->
