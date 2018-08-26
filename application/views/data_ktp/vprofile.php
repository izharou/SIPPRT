<div class="main">
<div class="container">

	<div class="panel panel-default">

		<div class="panel-heading">
			<strong>Information Detail</strong>
			<a href="<?php echo site_url(); ?>/data_ktp" class="btn-xs pull-right"><i class="glyphicon glyphicon-arrow-left"></i> Kembali ke daftar ktp</a>
		</div><!-- end panel-heading -->

		<div class="panel-body">

			<?php echo validation_errors(); ?>

			<div class="row">

				<!-- left panel -->
				<div class="col-xs-3">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs tabs-left">
						<li class="active"><a href="#informasi-pribadi" data-toggle="tab">Informasi Pribadi</a></li>
						<li><a href="#alamat" data-toggle="tab">Alamat</a></li>
						<!--<li><a href="#sosial-media" data-toggle="tab">Sosial media</a></li> -->
					</ul>
				</div><!-- end left panel -->

				<!-- right panel -->
				<div class="col-xs-9">

				<?php echo form_open_multipart('data_ktp/viewprofile/'.$row->id); ?>

				<!-- Tab panes -->
				<div class="tab-content">

					<!-- informasi pribadi -->
					<div class="tab-pane active" id="informasi-pribadi">

						<h3 class="panel-body-title">Informasi pribadi</h3>

						<div class="form-group">
							<label for="nama">NIK </label>
							<div class="form-input">
								<input type="number" name="nik" value="<?php echo $row->nik; ?>" class="form-control input-50" id="nik" readonly/>

							</div>
						</div>

						<div class="form-group">
							<label for="nama">Nama </label>
							<div class="form-input">
								<input type="text" name="nama" value="<?php echo $row->nama; ?>" class="form-control input-50" id="nama"  readonly/>
							</div>
						</div>

						<div class="form-group">
							<label for="tempat_lahir">Tempat Lahir </label>
							<div class="form-input">
								<input type="text" name="tempat_lahir" value="<?php echo $row->tempat_lahir; ?>" class="form-control input-50" id="tempat_lahir" readonly/>
							</div>
						</div>

						<div class="form-group">
							<label for="tanggal_lahir">Tanggal Lahir </label>
							<div class="form-input input-group input-50">
								<input type="text" class="form-control datepicker" aria-label="Tanggal lahir" name="tanggal_lahir" value="<?php echo waktu($row->tanggal_lahir); ?>" readonly/>
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							</div>
						</div>

						<div class="form-group">
							<label for="jenis_kelamin">Jenis Kelamin </label>
							<div class="form-input">
								<?php
								$array_jenis_kelamin = array(
									'laki-laki' => 'Laki-laki',
									'perempuan' => 'Perempuan'
									);

								echo form_dropdown('jenis_kelamin', $array_jenis_kelamin, '', 'class="form-control input-50" id="jenis_kelamin" readonly');
								?>
							</div>
						</div>

						<div class="form-group">
							<label for="golongan_darah">Golongan Darah</label>
							<div class="form-input">
								<select name="golongan_darah" class="form-control input-50" id="golongan_darah" readonly>
									<option value="A">A</option>
									<option value="B">B</option>
									<option value="O">O</option>
									<option value="AB">AB</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="agama">Agama </label>
							<div class="form-input">
								<input type="text" name="agama" value="<?php echo $row->agama ; ?>" class="form-control input-50" id="agama" readonly/>
							</div>
						</div>

						<div class="form-group">
							<label for="status_perkawinan">Status Perkawinan </label>
							<div class="form-input">
								<select name="status_perkawinan" class="form-control input-50" id="status_perkawinan" readonly>
									<option value="belum menikah">Belum Menikah</option>
									<option value="menikah">Menikah</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="pekerjaan">Pekerjaan </label>
							<div class="form-input">
								<input type="text" name="pekerjaan" value="<?php echo $row->pekerjaan; ?>" class="form-control input-50" id="pekerjaan" readonly/>
							</div>
						</div>

						<div class="form-group">
							<label for="kewarganegaraan">Kewarganegaraan </label>
							<div class="form-input">
								<select name="kewarganegaraan" class="form-control input-50" id="kewarganegaraan" readonly>
									<option value="WNI">WNI</option>
									<option value="WNA">WNA</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="berlaku_hingga">Berlaku Hingga </label>
							<div class="form-input input-group input-50">
								<input type="text" class="form-control datepicker" aria-label="Berlaku hingga" name="berlaku_hingga" value="<?php echo waktu($row->berlaku_hingga); ?>" readonly>
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							</div>
						</div>

						<div class="form-group">
							<label for="email">Email </label>
							<div class="form-input">
								<input type="email" name="email" value="<?php echo $row->email; ?>" class="form-control input-50" id="email" readonly />
							
							</div>
						</div>

					<!--
						<div class="form-group">
							<label for="nama">Foto <span class="field-required">*</span></label>
							<div class="form-input">
								<input type="file" name="foto" class="form-control input-50" id="foto" required="required"/>
							</div>
						</div>
					-->

					</div><!-- end informasi pribadi -->

					<!-- alamat -->
					<div class="tab-pane" id="alamat">

						<h3 class="panel-body-title">Alamat</h3>

						<div class="form-group">
							<label for="alamat">Alamat</label>
							<div class="form-input">
								<textarea name="alamat" class="form-control input-50" id="alamat" readonly><?php echo $row->alamat; ?></textarea>
							</div>
						</div>

						<div class="row">

							<div class="col-md-3">
								<div class="form-group">
									<label for="rt">Rt</label>
									<div class="form-input">
										<input type="text" name="rt" value="<?php echo $row->rt; ?>" class="form-control" id="rt" readonly/>
									</div>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label for="rw">Rw</label>
									<div class="form-input">
										<input type="text" name="rw" value="<?php echo $row->rw; ?>" class="form-control" id="rw" readonly/>
									</div>
								</div>
							</div>

						</div>

						<div class="form-group">
							<label for="wilayah">Wilayah</label>
							<div class="form-input">
								<input type="text" name="wilayah" value="<?php echo $row->wilayah; ?>" class="form-control input-50" id="wilayah" readonly/>
							</div>
						</div>

						<div class="form-group">
							<label for="kelurahan">Kelurahan</label>
							<div class="form-input">
								<input type="text" name="kelurahan" value="<?php echo $row->kelurahan; ?>" class="form-control input-50" id="kelurahan" readonly/>
							</div>
						</div>

						<div class="form-group">
							<label for="kecamatan">Kecamatan</label>
							<div class="form-input">
								<input type="text" name="kecamatan" value="<?php echo $row->kecamatan; ?>" class="form-control input-50" id="kecamatan" readonly/>
							</div>
						</div>
					</div><!-- end alamat -->


				</div><!-- end tab panes -->
        </div>
				<input type="hidden" name="date_created" value="<?php echo date('Y-m-d'); ?>" class="form-control input-50" id="date_created" />

				<input type="hidden" name="date_modify" value="<?php echo date('Y-m-d'); ?>" class="form-control input-50" id="date_modify" />


				<?php
				echo form_hidden('id', $row->id);
				echo form_close();
				?>

				</div><!-- end right panel-->

			</div><!-- end row -->
		</div><!-- end panel body-->
	</div><!-- end panel -->

</div><!-- end container-->
</div><!-- end main -->
