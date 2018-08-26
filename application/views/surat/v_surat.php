<div class="main">
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<strong>Buat Surat</strong>
			<a href="<?php echo site_url(); ?>/data_ktp" class="btn-xs pull-right"><i class="glyphicon glyphicon-arrow-left">
			</i> Kembali ke Home</a>
		</div>
		<div class="panel-body">

			<?php echo validation_errors(); ?>


      <form method="post" action="<?= base_url('index.php/homesurat/simpan')  ?> ">


          <div class="form-group col-md-6">
						<div class="row>">
							<div class="col-md-10">
            <label for="">NIK</label>
					</div>
<div class="col-md-10">
              <input type="text" class="form-control" name="nik[]" id="nik1" placeholder="" required>
						</div>
<div class="col-xs-2">
                <button class="btn btn-outline-secondary" id="cari1" type="button"><i class="fas fa-search"></i><span class="glyphicon glyphicon-search"></span></button>
							</div>
            </div>



		<div class="row>">
							<div class="col-md-10">
            <label for="">Nama</label>
					</div>

				<div class="col-xs-10">
            <input type="text" class="form-control" name="nama" id="nama1" placeholder="Nama" readonly>
					</div>
			<div class="col-md-10">
				<label for="">Tempat lahir </label>
			</div>
				<div class="col-xs-10">
            <input type="text" class="form-control mt-2" name="tempatlhr" id="tempatlhr" placeholder="Tempat_lahir" readonly>
					</div>

				<div class="col-md-10">
						<label for="">Tanggal lahir </label>
					</div>

				<div class="col-xs-10">
            <input type="date" class="form-control mt-2" name="tanggal_lahir" id="tanggal_lahir" placeholder="tanggal_lahir" readonly>

          </div>

					<div class="col-md-10">
							<label for="">kewarganegaraan </label>
						</div>

					<div class="col-xs-10">
	            <input type="text" class="form-control mt-2" name="kewarganegaraan" id="kewarganegaraan" placeholder="kewarganegaraan" readonly>

	          </div>
						<div class="col-md-10">
								<label for="">Agama </label>
							</div>

						<div class="col-xs-10">
		            <input type="text" class="form-control mt-2" name="agama" id="agama" placeholder="Agama" readonly>

		          </div>
						<div class="col-md-10">
									<label for="">Jenis Surat </label>
								</div>

						<div class="col-xs-10">
			          
                               <select name="jenissurat" class="form-control input-80"  required="required">
									<option value="PENGANTAR">SURAT PENGANTAR</option>
									<option value="IZIN USAHA">SURAT IZIN USAHA</option>
									
								</select>
							</div>
							<div class="col-md-10">
										<label for="">Tempat </label>
									</div>

							<div class="col-xs-10">
				            <input type="text" class="form-control mt-2" name="tempat" placeholder="Tempat" >

								</div>
								<div class="col-md-10">
											<label for="">alamat </label>
										</div>

								<div class="col-xs-10">
					            <input type="text" class="form-control mt-2" name="alamat" placeholder="alamat" >

									</div>
									<div class="col-md-10">


										<label for="inputAddress2">Keterangan</label></div>
										<textarea class="form-control" name="ket" rows="3"></textarea>
										<!-- <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor"> -->
									</div>
					</div>

 <script>
$('#nik1').keypress(function(event) {
    if (event.keyCode == 13) {
        event.preventDefault();
        alert('Tekan Button Cari #tidak bisa enter');
		console.log(msg);
    }
});
</script>

         <div class="col-xs-10">
        <button type="submit" class="btn btn-secondary"><i class="fa fa-print">&nbsp;</i>Cetak</button>
        <div>
         </div>
      </form>

  </div>
</div>
</div>
</div>
