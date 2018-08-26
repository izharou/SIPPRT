<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buat extends CI_Controller {
	function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$this->load->model('surat_model');
	}

	public function index()
	{
		redirect(base_url(""));
	}


	public function observasi()
	{
		$this->load->model('surat_model');

		$search = $this->input->post('nim');

		$this->load->view('header');
		$this->load->view('buat_view');
		$this->load->view('footer');

		if ($this->uri->segment(3) == "simpan")
		{
			// $id_surat = $this->surat_model->code_otomatis() + 1;
			// $no_surat = $this->surat_model->no_surat();
			//
			// $bulan = array (
			//   1=>'I',
			//   'II',
			//   'III',
			//   'IV',
			//   'V',
			//   'VI',
			//   'VII',
			//   'VIII',
			//   'IX',
			//   'X',
			//   'XI',
			//   'XII'
			// );
			// $str = ltrim(date('m'), '0');
			// $bln = $bulan[$str];
			//
			// $no = $no_surat.'/KBAA/LP3I-DPK/'.$bln.'/'.date('Y');
			// $jenis = '1';
			// $tanggal = date('Y-m-d');
			// $nim = $this->input->post('nim');
			// $nama = $this->input->post('nama');
			// $tempat = $this->input->post('tempat');
			// $alamat = $this->input->post('alamat');
			// $ket = $this->input->post('ket');
			//
			// $data = array(
			// 	'id_surat' => $id_surat,
			// 	'no' => $no,
			// 	'tanggal' => $tanggal,
			// 	'jenis' => $jenis,
			// 	'nim' => $nim,
			// 	'nama' => $nama,
			// 	'tempat' => $tempat,
			// 	'alamat' => $alamat,
			// 	'ket' => $ket
			// );
			//
			// $this->surat_model->set_data($data);
			// redirect('surat/cetak/'.$id_surat);

			// $this->load->view('home');

			// $data['cetak'] = $this->surat_model->print_surat($id_surat);
			// $this->load->view('cetak',$data);
			// echo "<script>
      // alert('Simpan Data Berhasil!');
      // window.location.href='".base_url()."';
      // </script>";
		}elseif ($this->uri->segment(3) == "update") {

		}
	}

	function simpan()
	{
		$id_surat = $this->surat_model->code_otomatis() + 1;
		$no_surat = $this->surat_model->no_surat();

		$bulan = array (
			1=>'I',
			'II',
			'III',
			'IV',
			'V',
			'VI',
			'VII',
			'VIII',
			'IX',
			'X',
			'XI',
			'XII'
		);
		$str = ltrim(date('m'), '0');
		$bln = $bulan[$str];

		$no = $no_surat.'/KBAA/LP3I-DPK/'.$bln.'/'.date('Y');
		$jenis = '1';
		$tanggal = date('Y-m-d');
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$tempat = $this->input->post('tempat');
		$alamat = $this->input->post('alamat');
		$ket = $this->input->post('ket');

		// $data = array(
		// 	'id_surat' => $id_surat,
		// 	'no' => $no,
		// 	'tanggal' => $tanggal,
		// 	'jenis' => $jenis,
		// 	'nim' => $nim,
		// 	'nama' => $nama,
		// 	'tempat' => $tempat,
		// 	'alamat' => $alamat,
		// 	'ket' => $ket
		// );

		$header = array(
      'id_jenis' => $jenis,
      'no_surat' => $no,
      'tanggal' => $tanggal,
      'tempat' => $tempat,
      'alamat' => $alamat,
      'ket' => $ket
    );

		$this->db->insert('h_surat', $header);

		// Mengambil ID Terakhir
    $this->db->select("*");
    $this->db->from("h_surat");
    $this->db->limit(1);
    $this->db->order_by('id_surat',"DESC");
    $query = $this->db->get();
    $result = $query->result();
    foreach ($nim as $nim1) {
      if ($nim1 != '') {
        $detail = array(
          'id_surat' => $result[0]->id_surat,
          'nim' => $nim1
        );
        $this->db->insert('d_surat', $detail);
      }
    }

		// $this->surat_model->set_data($data);
		redirect('surat/cetak/'.$id_surat);
	}

	function update()
	{
		$id_surat = $this->input->post('id_surat');
		$nim = $this->input->post('nim');
		$header = array (
			'tempat' => $this->input->post('tempat'),
			'alamat' => $this->input->post('alamat'),
			'ket' => $this->input->post('ket')
		);

		$detail = array(

			'id_detail' => $this->input->post('id_detail'),
			'nim' => $nim
		);

		// Update Table Header
		$id = array('id_surat' => $id_surat);
		$this->surat_model->update_data('h_surat',$header,$id);

		// Hapus Detail
		$this->surat_model->hapus('d_surat',$id);
		// Looping POST Detail Lalu Update
		foreach ($nim as $nim1) {
			if ($nim1 != '') {
        $detail = array(
          'id_surat' => $id_surat,
          'nim' => $nim1
        );
        $this->db->insert('d_surat', $detail);
      }
		}

		redirect('surat/cetak/'.$id_surat);

		// echo "<pre>";
		// print_r($header);
		// echo "</pre>";
		// die();
	}

	function cari_mhs($table_name, $column_name,$criteria = null, $id = null)
	{
		$this->db->select($column_name);
		$this->db->from($table_name);

		if (!is_null($id)){
			$this->db->where('nim', $nim);
		}

		$this->db->order_by('nim', 'desc');

		return $this->db->get()->result();
	}




	function cariii()
	{
		$this->load->model('surat_model');

		$nim = $this->uri->segment(3);
		// if ($this->surat_model->get_data('mahasiswa',array('nim' => $nim) != NULL) {
		// 	$data['siswa'] = $this->surat_model->get_data('mahasiswa',array('nim' => $nim));
		// }
		// else {
		// 	$data['siswa'] = 0;
		// }
		$data['siswa'] = $this->surat_model->get_data('mahasiswa',array('nim' => $nim));
		// print_r($data);
		// die();
		if (!empty($data)) {
			$this->load->view('proses',$data);
		}
		else {
			$data['siswa'] = array('nim' => '');
			$this->load->view('proses',$data);
		}
		// print_r($data);
		// die();
		// $this->load->view('home',$data);
	}

}
