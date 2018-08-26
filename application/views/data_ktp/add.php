<div class="main">
<div class="container">

	<div class="panel panel-default">

		<div class="panel-heading">
			<strong>Tambah KTP</strong>
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
						<!--<li><a href="#sosial-media" data-toggle="tab">Sosial media</a></li>-->
					</ul>
				</div><!-- end left panel -->

				<!-- right panel -->
				<div class="col-xs-9">

				<?php echo form_open_multipart('data_ktp/add'); ?>

				<!-- Tab panes -->
				<div class="tab-content">

					<!-- informasi pribadi -->
					<div class="tab-pane active" id="informasi-pribadi">

						<h3 class="panel-body-title">Informasi pribadi</h3>

						<div class="form-group">
							<label for="nama">NIK <span class="field-required">*</span></label>
							<div class="form-input">
								<input type="number" name="nik" value="<?php echo set_value('nik'); ?>" class="form-control input-50" id="nik" required="required"/>
								<p class="help-block">Hanya boleh angka</p>
							</div>
						</div>

						<div class="form-group">
							<label for="nama">Nama <span class="field-required">*</span></label>
							<div class="form-input">
								<input type="text" name="nama" value="<?php echo set_value('nama'); ?>" class="form-control input-50" id="nama" required="required"/>
							</div>
						</div>

						<div class="form-group">
							<label for="tempat_lahir">Tempat Lahir <span class="field-required">*</span></label>
							<div class="form-input">
								<input type="text" name="tempat_lahir" value="<?php echo set_value('tempat_lahir'); ?>" class="form-control input-50" id="tempat_lahir" required="required"/>
							</div>
						</div>

						<div class="form-group">
							<label for="tanggal_lahir">Tanggal Lahir <span class="field-required">*</span></label>
							<div class="form-input input-group input-50">
								<input type="text" class="form-control datepicker" aria-label="Tanggal lahir" name="tanggal_lahir" value="<?php echo set_value('tanggal_lahir'); ?>" required="required">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							</div>
						</div>

						<div class="form-group">
							<label for="jenis_kelamin">Jenis Kelamin <span class="field-required">*</span></label>
							<div class="form-input">
								<?php
								$array_jenis_kelamin = array(
									'laki-laki' => 'Laki-laki',
									'perempuan' => 'Perempuan'
									);

								echo form_dropdown('jenis_kelamin', $array_jenis_kelamin, '', 'class="form-control input-50" id="jenis_kelamin" required="required"');
								?>
							</div>
						</div>

						<div class="form-group">
							<label for="golongan_darah">Golongan Darah <span class="field-required">*</span></label>
							<div class="form-input">
								<select name="golongan_darah" class="form-control input-50" id="golongan_darah" required="required">
									<option value="A">A</option>
									<option value="B">B</option>
									<option value="O">O</option>
									<option value="AB">AB</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="agama">Agama <span class="field-required">*</span></label>
							<div class="form-input">
								<input type="text" name="agama" value="<?php echo set_value('agama'); ?>" class="form-control input-50" id="agama"  required="required"/>
							</div>
						</div>

						<div class="form-group">
							<label for="status_perkawinan">Status Perkawinan <span class="field-required">*</span></label>
							<div class="form-input">
								<select name="status_perkawinan" class="form-control input-50" id="status_perkawinan" required="required">
									<option value="belum menikah">Belum Menikah</option>
									<option value="menikah">Menikah</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="pekerjaan">Pekerjaan <span class="field-required">*</span></label>
							<div class="form-input">
								<input type="text" name="pekerjaan" value="<?php echo set_value('pekerjaan'); ?>" class="form-control input-50" id="pekerjaan" required="required"/>
							</div>
						</div>

						<div class="form-group">
							<label for="kewarganegaraan">Kewarganegaraan <span class="field-required">*</span></label>
							<div class="form-input">
								<select name="kewarganegaraan" class="form-control input-50" id="kewarganegaraan" required="required">
									<option value="WNI">WNI</option>
									<option value="WNA">WNA</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="berlaku_hingga">Berlaku Hingga <span class="field-required">*</span></label>
							<div class="form-input input-group input-50">
								<input type="text" class="form-control datepicker" aria-label="Berlaku hingga" name="berlaku_hingga" value="<?php echo set_value('berlaku_hingga'); ?>" required="required" name="berlaku_hingga">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							</div>
						</div>

						<div class="form-group">
							<label for="email">Email <span class="field-required">*</span></label>
							<div class="form-input">
								<input type="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control input-50" id="email" required="required" />
								<p class="help-block">Format email : namaemail@domain.com</p>
							</div>
						</div>

						<div class="form-group">
							<label for="nama">Foto <span class="field-required">*</span></label>
							<div class="form-input">
								<input type="file" name="foto" class="form-control input-50" id="foto" required="required"/>
							</div>
						</div>

					</div><!-- end informasi pribadi -->

					<!-- alamat -->
					<div class="tab-pane" id="alamat">

						<h3 class="panel-body-title">Alamat</h3>

						<div class="form-group">
							<label for="alamat">Alamat</label>
							<div class="form-input">
								<textarea name="alamat" class="form-control input-50" id="alamat"><?php echo set_value('alamat'); ?></textarea>
							</div>
						</div>

						<div class="row">

							<div class="col-md-3">
								<div class="form-group">
									<label for="rt">Rt</label>
									<div class="form-input">
										<input type="text" name="rt" value="<?php echo set_value('rt'); ?>" class="form-control" id="rt" />
									</div>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label for="rw">Rw</label>
									<div class="form-input">
										<input type="text" name="rw" value="<?php echo set_value('rw'); ?>" class="form-control" id="rw" />
									</div>
								</div>
							</div>

						</div>

						<div class="form-group">
							<label for="wilayah">Wilayah</label>
							<div class="form-input">
								<input type="text" name="wilayah" value="<?php echo set_value('wilayah'); ?>" class="form-control input-50" id="wilayah" />
							</div>
						</div>

						<div class="form-group">
							<label for="kelurahan">Kelurahan</label>
							<div class="form-input">
								<input type="text" name="kelurahan" value="<?php echo set_value('kelurahan'); ?>" class="form-control input-50" id="kelurahan" />
							</div>
						</div>

						<div class="form-group">
							<label for="kecamatan">Kecamatan</label>
							<div class="form-input">
								<input type="text" name="kecamatan" value="<?php echo set_value('kecamatan'); ?>" class="form-control input-50" id="kecamatan" />
							</div>
						</div>
					</div><!-- end alamat -->

					<!-- sosial media
					<div class="tab-pane" id="sosial-media">

						<h3 class="panel-body-title">Sosial Media</h3>

						<div class="form-group">
							<label for="twitter">Twitter</label>
							<div class="form-input">
								<input type="text" name="twitter" value="<php echo set_value('twitter'); ?>" class="form-control input-50" id="twitter" placeholder="@namakamu"/>
							</div>
						</div>

						<div class="form-group">
							<label for="facebook">Facebook</label>
							<div class="form-input">
								<input type="text" name="facebook" value="<php echo set_value('facebook'); ?>" class="form-control input-50" id="facebook" />
							</div>
						</div>

						<div class="form-group">
							<label for="instagram">Instagram</label>
							<div class="form-input">
								<input type="text" name="instagram" value="<php echo set_value('instagram'); ?>" class="form-control input-50" id="instagram" />
								<p class="help-block">username instagram kamu</p>
							</div>
						</div>

						<div class="form-group">
							<label for="path">Path</label>
							<div class="form-input">
								<input type="text" name="path" value="<php echo set_value('path'); ?>" class="form-control input-50" id="path" />
							</div>
						</div>

					</div>end sosial media -->
				</div><!-- end tab panes -->

				<input type="hidden" name="date_created" value="<?php echo date('Y-m-d'); ?>" class="form-control input-50" id="date_created" />

				<input type="hidden" name="date_modify" value="<?php echo date('Y-m-d'); ?>" class="form-control input-50" id="date_modify" />

				<div class="well form-actions">
					<button type="submit" class="btn btn-success">Submit</button>
					<a href="<?php echo site_url(); ?>/data_ktp" class="btn" >Cancel</a>
				</div> <!-- /form-actions -->

				<?php echo form_close(); ?>

				</div><!-- end right panel-->

			</div><!-- end row -->
		</div><!-- end panel body-->
	</div><!-- end panel -->

</div><!-- end container-->
</div><!-- end main -->
