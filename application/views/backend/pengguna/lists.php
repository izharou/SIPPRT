<div class="container white-container">
	
	<?php echo $this->session->flashdata('action_status'); ?>

	<!-- Head title -->
	<div class="row">
		<div class="col-md-6">
			<h3 class="head-title"><span class="glyphicon glyphicon-play"></span> <?php echo $title; ?></h3>
		</div>

		<div class="col-md-6">
			<ul class="list-inline pull-right">
				<li>
					<a href="<?php echo site_url().'/backend/pengguna/add'; ?>" class="btn btn-primary btn-sm" data-tooltip="tooltip" data-placement="top" title="Tambah pengguna" data-original-title="Tambah pengguna"><i class="glyphicon glyphicon-plus"></i> Tambah pengguna</a>
				</li>
			</ul>
		</div>
	</div>

	<hr class="hr-head-title">	
	
	<!-- Content -->
	<div class="row">
		<div class="col-md-12">

			<table class="table table-striped table-hover table-bordered table-condensed">

				<thead>
				    <tr class="info">
						<th class="text-center">NO</th>
						<th>Nama Lengkap</th>
						<th>Email</th>
						<th>Level</th>
						<th class="text-center">Status</th>
						<th class="text-center">Aksi</th>
				    </tr>
			    </thead>

			    <tbody>
				
				<?php 
				$i = 1;
				foreach ($result as $user):
				?>
					<tr>
						<td class="text-center"><?php echo $i; ?></td>
			            <td><?php echo $user->first_name.' '.$user->last_name;?></td>
			            <td><?php echo $user->email;?></td>
			            <td>
							<?php foreach ($user->groups as $group):?>
								<?php echo $group->name ;?><br />
			                <?php endforeach?>
						</td>

						<td class="text-center">
							<?php 
							echo ($user->active) ? anchor("backend/pengguna/deactivate/".$user->id, 'aktif', 'class="label label-success"') : anchor("backend/pengguna/activate/". $user->id, 'tidak aktif', 'class="label label-default"');
							?>
						</td>

						<td class="text-center">
							<?php echo anchor("backend/pengguna/edit/".$user->id, '<i class="glyphicon glyphicon-pencil"></i>') ;?>

							<a href="#" data-url="<?php echo site_url().'/backend/pengguna/delete/'.$user->id; ?>" class="confirm_delete"><i class="glyphicon glyphicon-trash"></i></a>

						</td>
					</tr>
				
				<?php 
				$i++;
				endforeach;
				?>

				</tbody>

			</table>

		</div><!-- end col-md-12 -->
	</div><!-- end row-->

</div><!-- end container -->

<!-- sweet alert -->
<script src="<?php echo base_url(); ?>assets/bower_components/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bower_components/sweetalert/dist/sweetalert.css">

<script type="text/javascript">
$(document).ready(function(){
	$('.confirm_delete').on('click', function(){
		
		var delete_url = $(this).attr('data-url');

		swal({
			title: "Hapus user ?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Hapus !",
			cancelButtonText: "Batalkan",
			closeOnConfirm: false			
		}, function(){
			window.location.href = delete_url;
		});

		return false
	});

});
</script>