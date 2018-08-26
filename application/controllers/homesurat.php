<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homesurat extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		// Load model M_data_ktp
		$this->load->model('M_surat');

		// load need login di helper/app_helper.php
		need_login();
	}


	// Redirect ke halaman daftar surat
	function index() {
		redirect('homesurat/suratlist');
	}


	/**
	* Menampilkan listing data surat
	*
	* @return view
	**/
	function suratlist()
	{
			$title = array(
			'title' => 'Buat Surat',

			);

		// Menampikan data KTP ke view
		$this->load->view('inc/header',$title);
		$this->load->view('surat/v_surat');
		$this->load->view('inc/footer',$title);
	}


  function simpan()
  	{
			/*print_r($this->input->post());
			die();*/
  		$idsurat = $this->M_surat->code_otomatis() + 1;
			$nosurat = '';
  		$jenissurat = $this->input->post('jenissurat');
			$tempat = $this->input->post('tempat');
  		$tglsurat = date('Y-m-d');
  		$nik = $this->input->post('nik');
  		$nama = $this->input->post('nama');
  		$tempat_lahir = $this->input->post('tempat_lahir');
      $tanggal_lahir = $this->input->post('tanggal_lahir');
      $jenis_kelamin = $this->input->post('jenis_kelamin');
      $kewarganegaraan = $this->input->post('kewarganegaraan');
      $agama = $this->input->post('agama');
      $alamat = $this->input->post('alamat');
  		$ket = $this->input->post('ket');



  		$header = array(
        'jenissurat' => $jenissurat,
        'nosurat' => $nosurat,
        'tglsurat' => $tglsurat,
				'tempat' => $tempat,
				'alamat' => $alamat,
				'ket' => $ket,
      );

  		$this->db->insert('tbl_headsurat', $header);

  		// Mengambil ID Terakhir
      $this->db->select("*");
      $this->db->from("tbl_headsurat");
      $this->db->limit(1);
      $this->db->order_by('idsurat',"DESC");
      $query = $this->db->get();
      $result = $query->result();
      foreach ($nik as $nik1) {
        if ($nik1 != '') {
          $detail = array(
            'idsurat' => $result[0]->idsurat,
            'nik' => $nik1
          );
          $this->db->insert('tbl_detsurat', $detail);
        }
      }

  		// $this->surat_model->set_data($data);
  		redirect('/homesurat/cetak/'.$idsurat);
  	}


 function cari_penduduk($table_name,$column_name,$criteria = null,$id = null)
{
	$this->db->select($column_name);
	$this->db->from($table_name);
		if(!is_null($id)){
			$this->db->where('nik', $nik);
		}
		$this->db->order_by('nik', 'desc');
		return $this->db->get()->result();

}
	public function cetak()
	{
		if (!empty($this->uri->segment(3))) {
			$id = $this->uri->segment(3);
			$data['cetak'] = $this->M_surat->print_surat($id);
			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";
			// die();
			$this->load->view('surat/cetak',$data);

		}
		else {
			redirect(base_url(""));
		}
	}


		function cariii()
	{
		$this->load->model('M_surat');

		$nik = $this->uri->segment(3);
		// if ($this->surat_model->get_data('mahasiswa',array('nim' => $nim) != NULL) {
		// 	$data['siswa'] = $this->surat_model->get_data('mahasiswa',array('nim' => $nim));
		// }
		// else {
		// 	$data['siswa'] = 0;
		// }
		$data['penduduk'] = $this->M_surat->get_data('tbl_penduduk',array('nik' => $nik));
		// print_r($data);
		// die();
		if (!empty($data)) {
			$this->load->view('/surat/proses',$data);
		}
		else {
			$data['penduduk'] = array('nik' => '');
			$this->load->view('/surat/proses',$data);
		}
	}
}
?>
