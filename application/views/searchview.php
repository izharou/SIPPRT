<div class="main">
<div class="container">
<div class="row">
	<div class="panel panel-default">

		<div class="panel-heading">
			<strong>Daftar Kependudukan</strong>
			<a href="<?php echo site_url(); ?>/data_ktp/add" class="btn-xs pull-right"><i class="glyphicon glyphicon-plus"></i> Tambah KTP</a>
		</div><!-- end panel-heading -->

    <form action="<?php echo site_url('karyawan/cari');?>" method="get">
     <input type="text" name="cari" placeholder="Cari Data Karyawan">
     <button type="submit">Cari Data</button> <a href="<?php echo site_url('karyawan'); ?>" style="text-decoration:none; color: black;">Reset</a>
   </form>

		<div class="panel-body">

			<?php echo $this->session->flashdata('action_status'); ?>
			<?php echo validation_errors(); ?>

			<div class="row">
				<div class="col-md-12">

					<table class="table table-striped table-condensed">
						<tr>
							<td>#</td>

							<td>Foto</td>
							<td>NIK</td>
							<td>Nama</td>
							<td>Tempat Lahir</td>
							<td>Tanggal Lahir</td>

							<td>Jenis Kelamin</td>
							<td>Golongan Darah</td>
							<td>Alamat</td>
				<!--			<td>Rt</td>
							<td>Rw</td>

							<td>Wilayah</td>

							<td>Kelurahan</td>
							<td>Kecamatan</td>
							<td>Agama</td>
							<td>Status Perkawinan</td>
							<td>Pekerjaan</td>
							<td>Kewarganegaraan</td>
							<td>Berlaku Hingga</td>
							<td>Email</td>
							<td>Twitter</td>
							<td>Facebook</td>
							<td>Instagram</td>
							<td>Path</td>
							<td>Date Created</td>
							<td>Date Modify</td>
-->
							<td class="text-center">Actions</td>
						</tr>

						<?php
						if($results === FALSE )
						{
							echo '<tr><td colspan="8"><br><div class="well"><p>Data belum tersedia</p></div></td></tr>';
						}
						else
						{

						$i = 1;
						foreach($results as $row)
						{
							// url foto
							$foto_url = base_url().'/uploads/'.$row['foto'];

							// url thumbnail foto
							$thumbnail_foto_url = base_url().'/uploads/'.$row['thumb_foto'];
						?>
						<tr>
							<td><?php echo $i; ?></td>

							<!-- Menampilkan foto thumbnail -->
							<td>
								<a href="<?php echo site_url('data_ktp/viewprofile/'.$row['id']); ?>" target="_blank">
								<img src="<?php echo $thumbnail_foto_url;?>" alt="<?php echo $row['nama'] ?> ">
								</a>
							</td>

							<td><?php echo $row['nik']; ?></td>
							<td><?php echo $row['nama']; ?></td>
							<td><?php echo $row['tempat_lahir']; ?></td>
							<td><?php echo waktu($row['tanggal_lahir']); ?></td>

							<td><?php echo $row['jenis_kelamin']; ?></td>
							<td><?php echo $row['golongan_darah']; ?></td>
							<td><?php echo $row['alamat']; ?></td>
					<!--		<td><?php echo $row['rt']; ?></td>
							<td><?php echo $row['rw']; ?></td>

							<td><?php echo $row['wilayah']; ?></td>

							<td><?php echo $row['kelurahan']; ?></td>
							<td><?php echo $row['kecamatan']; ?></td>
							<td><?php echo $row['agama']; ?></td>
							<td><?php echo $row['status_perkawinan']; ?></td>
							<td><?php echo $row['pekerjaan']; ?></td>
							<td><?php echo $row['kewarganegaraan']; ?></td>
							<td><?php echo $row['berlaku_hingga']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['twitter']; ?></td>
							<td><?php echo $row['facebook']; ?></td>
							<td><?php echo $row['instagram']; ?></td>
							<td><?php echo $row['path']; ?></td>
							<td><?php echo $row['date_created']; ?></td>
							<td><?php echo $row['date_modify']; ?></td>
-->
							<td class="text-center">
								<div class="btn-group" role="button">
									<a href="<?php echo site_url('data_ktp/edit/'.$row['id']); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-pencil"></i></a>

									<a href="#" data-url="<?php echo site_url('data_ktp/remove/'.$row['id']); ?>" class="btn btn-sm btn-default confirm_delete"><i class="glyphicon glyphicon-trash"></i></a>
								</div>
							</td>
						</tr>

						<?php
							$i++;
							} // end foreach
						} // end if
						?>

					</table>


				</div>
			</div><!-- end row -->
		</div><!-- end panel body-->
	</div><!-- end panel -->
</div>
</div><!-- end container-->
</div><!-- end main -->

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

		return false;
	});
});
</script>
