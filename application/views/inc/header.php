<!DOCTYPE html>
	<!--header-->
<html lang="en">
	<head>

   <link rel="icon" href="../../assets/img/.ico" type="image/ico">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $title; ?></title>
		<!--
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css">
		-->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/datatables.min.css') ?>">
		<!--<link rel="stylesheet" href="<php echo base_url('assets/css/bootstrap.min.css') ?>">-->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-cerulean.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-vertical-tabs/bootstrap.vertical-tabs.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!-- jquery js -->
		<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.js"></script>

		<!-- bootstrap js -->
		<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.js"></script>

		<!-- bootstrap datepicker js -->
		<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>

		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">

	</head>
	<body class="crud">

	<?php if( $this->ion_auth->logged_in() === TRUE ): ?>

	<nav class="navbar navbar-default" role="navigation">
		<div class="container">

			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">SIDPP  <span class="glyphicon glyphicon-globe"></span></a>
			</div>

			<div class="collapse navbar-collapse navbar-ex1-collapse">

				<ul class="nav navbar-nav">

					<li><a href="<?php echo site_url().'/data_ktp'; ?>">Data Penduduk   <span class="glyphicon glyphicon-list"></span> </a></li>
  				<li><a href="<?php echo site_url().'/homesurat'; ?>">Surat        <span class="glyphicon glyphicon-envelope -list"></span> </a></li>
					<!--<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Master <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<php echo site_url(); ?>/backend/pengguna">Pengguna</a></li>
							<li><a href="<php echo site_url(); ?>/backend/group">Groups</a></li>
						</ul>
					</li>-->

				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li><a href="#">Hai, <?php echo get_name_by_session(); ?></a></li>
					<li><a href="<?php echo site_url().'/auth/logout'; ?>"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
					<!--
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li><a href="#">Separated link</a></li>
						</ul>
					</li>
					-->
				</ul>
			</div>
		</div>
	</nav>

	<?php endif; ?>
	<!--header-->
