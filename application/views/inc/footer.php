<!--Footer-->


<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/datatables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/script.js') ?>"></script>
<script>
	$("#cari1").click(function(){

						var nik = $("#nik1").val();
						$.ajax({
								url:"<?= base_url('index.php/homesurat/cariii/') ?>"+nik,
								// type: "post",
								// data: "/"+nim,
								cache:false,
								success:function(msg){
										///alert("tes");
										data=msg.split("|");
										// $("#nim1").val(data[0]);
										$("#nama1").val(data[2]);
										$("#tempatlhr").val(data[3]);
										$("#tanggal_lahir").val(data[4]);
										$("#kewarganegaraan").val(data[5]);
										$("#agama").val(data[6]);
										console.log(msg);
								}
								
						});
		});
	</script>

	<script>

	function confirm_delete()
	{

		var get_confirm = confirm('Apakah Anda yakin akan menghapus data ini ?');

		if(get_confirm == true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	$(document).ready(function(){
		$('.datepicker').datepicker({
			format: 'dd-mm-yyyy'
		});
	});
	</script>

	<div class="container">
		<hr>
		<p class="pull-left"><small>Sistem Informasi Data Penduduk & Penyuratan Tingkat RT</small></p>
		<p class="pull-right"><small>Fauzi &copy; </small></p>
	</div>

	</body>
</html>
