<div class="container white-container">

	<!-- Head title -->
	<div class="row">
		<div class="col-md-6">
			<h3 class="head-title"><span class="glyphicon glyphicon-play"></span> <?php echo $title; ?></h3>
		</div>

		<div class="col-md-6">
			<a href="<?php echo site_url().'/backend/group'; ?>" class="pull-right"><i class="glyphicon glyphicon-arrow-left"></i> Kembali ke daftar group</a>				
		</div>
	</div>

	<hr class="hr-head-title">	

	<?php echo $this->session->flashdata('action_status'); ?>
	<?php echo validation_errors(); ?>

	<?php echo form_open('backend/group/add',array( "class" => "form-horizontal form-validasi" ) ); ?>

	<div class="form-group">
		<label for="Nama group" class="col-md-4 control-label required">Nama Group</label>
		<div class="col-md-4">
			<input type="text" name="group_name" value="<?php echo $this->input->post('group'); ?>" class="form-control" id="group" required="required" autofocus="autofocus"/>
		</div>
	</div>

	<div class="form-group">
		<label for="Keterangan" class="col-md-4 control-label required">Keterangan</label>
		<div class="col-md-4">
			<input type="text" name="description" value="<?php echo $this->input->post('description'); ?>" class="form-control" id="group" required="required"/>
		</div>
	</div>

	<!-- Submit button -->
	<div class="row">
		<div class="col-md-12">
			<div class="save-cancel well text-right">
				<input type="submit" value="Submit" class="btn btn-success submit-btn btn-md"/>
				&nbsp;
				<a href="<?php echo site_url(); ?>/backend/group/lists_group" class="btn">Batal</a>
			</div>				
		</div>
	</div>

	<?php 
	echo form_close(); 
	?>

</div>