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

	<?php echo form_open('backend/group/edit/'.$row['id'],array( "class" => "form-horizontal form-validasi" ) ); ?>

	<div class="form-group">
		<label for="Nama group" class="col-md-4 control-label required">Nama Group</label>
		<div class="col-md-4">
			<input type="text" name="group_name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $row['name']); ?>" class="form-control" id="name" required="required" autofocus="autofocus"/>
		</div>
	</div>

	<div class="form-group">
		<label for="Keterangan" class="col-md-4 control-label required">Keterangan</label>
		<div class="col-md-4">
			<input type="text" name="group_description" value="<?php echo ($this->input->post('description') ? $this->input->post('description') : $row['description']); ?>" class="form-control" id="group" required="required"/>
		</div>
	</div>

	<!-- Update button -->
	<div class="row">
		<div class="col-md-12">
			<div class="save-cancel well text-right">
				<input type="submit" value="Update" class="btn btn-success submit-btn btn-md"/>
				<a href="<?php echo site_url(); ?>/backend/group/lists_group" class="btn">Batal</a>
			</div>
		</div>
	</div>

	<?php 
	echo form_close(); 
	?>

</div>