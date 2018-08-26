<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="icon" href="../../assets/img/.ico" type="image/ico">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $title; ?></title>

		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css">

		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body style="margin-top:30px;">
<style>
	body{
		background-image: url("../../assets/img/wood-background.png");
 		background-color: #cccccc;
	}
</style>

	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">

				<h1 class="text-center login-title" >Login</h1>

				<?php
				echo $this->session->flashdata('action_status');
				echo validation_errors();
				?>

				<div class="account-wall">

					<img class="profile-img" src="../../assets/img/loginprofile.png"
						alt="">

					<?php
					$array_form_login = array(
						'class' => 'form-signin'
						);

					echo form_open('auth/login', $array_form_login);
					?>

					<input name="identity" type="email" class="form-control" placeholder="Email" required="required" autofocus="autofocus">

					<input name="password" type="password" class="form-control" placeholder="Password" required="required">

					<button class="btn btn-lg btn-primary btn-block" type="submit">
						Sign in</button>

					<label class="checkbox pull-left">
						<input name="remember-me" type="checkbox" value="remember-me">
						Remember me
					</label>

					<a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>

					<?php echo form_close(); ?>

				</div>

				<!--<a href="#" class="text-center new-account">Create an account </a>-->

			</div>
		</div>
	</div>

	</body>
</html>
