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
					<a href="<?php echo site_url().'/backend/group/add'; ?>" class="btn btn-primary btn-sm" data-tooltip="tooltip" data-placement="top" title="Tambah group" data-original-title="Tambah group"><i class="glyphicon glyphicon-plus"></i> Tambah group</a>
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
				    <tr>
						<th class="text-center" width="50px">NO</th>
						<th>Nama Group</th>
						<th>Keterangan</th>
						<th class="text-center">Aksi</th>
				    </tr>
			    </thead>

			    <tbody>
				
				<?php 
				$i = 1;
				foreach ($result as $group):
				?>
					<tr>
						<td class="text-center"><?php echo $i; ?></td>
			            <td><?php echo $group->name;?></td>
			            <td><?php echo $group->description;?></td>
						<td class="text-center">
						
							<?php  
							if( $group->id != 1 && $group->id != 2):
							?>

							<a href="<?php echo site_url().'/backend/group/edit/'.$group->id; ?>"><i class="glyphicon glyphicon-pencil"></i></a>

							<a href="<?php echo site_url().'/backend/group/delete/'.$group->id; ?>"><i class="glyphicon glyphicon-trash"></i></a>

				            <?php  
				            else:

				            endif;
				            ?>

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

<script type="text/javascript">
function confirm_delete() {
	var get_confirm = confirm('Apakah Anda yakin ingin menghapus data ini ?');

	return get_confirm;
}
</script>