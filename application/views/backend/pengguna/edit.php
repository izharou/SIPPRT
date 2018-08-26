<div class="container white-container">

	<!-- Head title -->
	<div class="row">
		<div class="col-md-6">
			<h3 class="head-title"><span class="glyphicon glyphicon-play"></span> <?php echo $title; ?></h3>
		</div>

		<div class="col-md-6">
			<a href="<?php echo site_url().'/backend/pengguna'; ?>" class="pull-right"><i class="glyphicon glyphicon-arrow-left"></i> Kembali ke daftar pengguna</a>
		</div>
	</div>

	<hr class="hr-head-title">	

	<?php 
	echo $this->session->flashdata('action_status');
	echo validation_errors(); 
	?>

	<?php echo form_open( 'backend/pengguna/edit/'.$pengguna->id, array( "class" => "form-horizontal form-validasi" ) ); ?>

	<div class="form-group">
		<label for="nama depan" class="col-md-4 control-label required">Nama depan</label>
		<div class="col-md-4">
			<input type="text" name="first_name" value="<?php echo $pengguna->first_name ?>" class="form-control" id="nama_depan" required="required" autofocus="autofocus"/>
		</div>
	</div>

	<div class="form-group">
		<label for="nama belakang" class="col-md-4 control-label">Nama belakang</label>
		<div class="col-md-4">
			<input type="text" name="last_name" value="<?php echo $pengguna->last_name; ?>" class="form-control" id="nama_belakang"/>
		</div>
	</div>

	<div class="form-group">
		<label for="email" class="col-md-4 control-label required">Email</label>
		<div class="col-md-4">
			<input type="email" name="email" value="<?php echo $pengguna->email ?>" class="form-control" id="email" readonly="readonly"/>
		</div>
	</div>

	<div class="form-group">
		<label for="telepon" class="col-md-4 control-label required">Telepon</label>
		<div class="col-md-4">
			<input type="text" name="phone" value="<?php echo $pengguna->phone ?>" class="form-control" id="telepon" required="required"/>
		</div>
	</div>

	<?php echo form_hidden('company', ''); ?>

	<div class="form-group">
		<label for="password" class="col-md-4 control-label">Password</label>
		<div class="col-md-4">
			<input type="text" name="password" class="form-control" id="password"/>
		</div>
	</div>

	<div class="form-group">
		<label for="password_confirm" class="col-md-4 control-label">Konfirmasi password</label>
		<div class="col-md-4">
			<input type="text" name="password_confirm" class="form-control" id="password_confirm"/>
		</div>
	</div>

	<div class="form-group">
		<label for="password_confirm" class="col-md-4 control-label">Level user</label>
		<div class="col-md-4">
			<?php
			$daftar_level = get_daftar_groups();
			echo form_dropdown('level_user[]', $daftar_level, $current_level, 'class="form-control"');
			?>
			<small class="help-span">Level admin dapat mengakses semua fitur</small>
		</div>
	</div>

	<!-- Update button -->
	<div class="row">
		<div class="col-md-12">
			<div class="save-cancel well text-right">
				<input type="submit" value="Update" class="btn btn-success submit-btn btn-md"/>
				<a href="<?php echo site_url(); ?>/backend/pengguna/lists " class="btn btn-md">Batal</a>
			</div>				
		</div>
	</div>

	<?php 
	echo form_close(); 
	?>

</div>

<script type="text/javascript">
</script>