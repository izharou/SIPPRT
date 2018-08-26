<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_ktp extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		// Load model M_data_ktp
		$this->load->model('M_data_ktp');

		// load need login di helper/app_helper.php
		need_login();
	}


	// Redirect ke halaman daftar KTP
	function index() {
		redirect('data_ktp/lists');
	}


	/**
	* Menampilkan listing data KTP
	*
	* @return view
	**/
	function lists()
	{

		$data = array(
			'title' => 'Daftar KTP',
			'results' => $this->M_data_ktp->get_all_frm_data_ktp()
			);

		// Menampikan data KTP ke view
		$this->load->view('inc/header',$data);
		$this->load->view('data_ktp/index',$data);
		$this->load->view('inc/footer',$data);
	}


	/**
	* Fungsi untuk menambahkan data ktp
	*
	* @return view
	**/
	function add()
	{
		// Memanggil library form validation
		$this->load->library('form_validation');

		// setup config validation
		$config = array(
			array(
				'field' => 'nik',
				'label' => 'NIK',
				'rules' => 'required|is_unique[tbl_penduduk.nik]'
			),
			array(
				'field' => 'tempat_lahir',
				'label' => 'Tempat Lahir',
				'rules' => 'required'
			),
			array(
				'field' => 'jenis_kelamin',
				'label' => 'Jenis Kelamin',
				'rules' => 'required'
			),
			array(
				'field' => 'golongan_darah',
				'label' => 'Golongan Darah',
				'rules' => 'required'
			),
			array(
				'field' => 'agama',
				'label' => 'Agama',
				'rules' => 'required'
			),
			array(
				'field' => 'status_perkawinan',
				'label' => 'Status Perkawinan',
				'rules' => 'required'
			),
			array(
				'field' => 'pekerjaan',
				'label' => 'Pekerjaan',
				'rules' => 'required'
			),
			array(
				'field' => 'kewarganegaraan',
				'label' => 'Kewarganegaraan',
				'rules' => 'required'
			),
			array(
				'field' => 'berlaku_hingga',
				'label' => 'Berlaku Hingga',
				'rules' => 'required'
			),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|is_unique[tbl_penduduk.email]'
			)
		);

		$this->form_validation->set_rules($config);

		// Jika form di submit, maka jalankan bagian ini
		if($this->form_validation->run())
		{
			// memanggil private function untuk upload gambar
			$get_foto = $this->_upload_gambar();

			// mendapatkan nama file foto
			$foto = $get_foto['file_name'];

			// setup nama thumbnail foto
			$thumb_foto = $get_foto['raw_name'].'_thumb'.$get_foto['file_ext'];

			// Mengumpulkan data POST dalam bentuk array
			$params = array(
				'nik' 				=> $this->input->post('nik'),
				'nama' 				=> $this->input->post('nama'),
				'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
				'tanggal_lahir' 	=> tanggal_db($this->input->post('tanggal_lahir')),
				'jenis_kelamin' 	=> $this->input->post('jenis_kelamin'),
				'golongan_darah' 	=> $this->input->post('golongan_darah'),
				'alamat' 			=> $this->input->post('alamat'),
				'rt' 				=> $this->input->post('rt'),
				'rw' 				=> $this->input->post('rw'),
				'wilayah' 			=> $this->input->post('wilayah'),
				'kelurahan' 		=> $this->input->post('kelurahan'),
				'kecamatan' 		=> $this->input->post('kecamatan'),
				'agama' 			=> $this->input->post('agama'),
				'status_perkawinan' => $this->input->post('status_perkawinan'),
				'pekerjaan' 		=> $this->input->post('pekerjaan'),
				'kewarganegaraan' 	=> $this->input->post('kewarganegaraan'),
				'berlaku_hingga' 	=> tanggal_db($this->input->post('berlaku_hingga')),
				'email' 			=> $this->input->post('email'),
				'thumb_foto'		=> $thumb_foto,
				'date_created' 		=> $this->input->post('date_created'),
			);

			// Insert data ke tabel
			$query = $this->M_data_ktp->add_frm_data_ktp($params);

			// Jika tambah query berhasil, maka return 1
			if( $query === TRUE) {

				// Setup session pesan tambah jika berhasil
				$this->session->set_flashdata('action_status', '<div class="alert alert-info">Data berhasil di tambah</div>');

			} else {

				// Setup session pesan tambah jika gagal
				$this->session->set_flashdata('action_status', '<div class="alert alert-danger">Data gagal di tambah</div>');
			}

			// redirect jika berhasil dan memberikan informasi sesuai session
			redirect('data_ktp/lists');
		}

		// Jika tidak ada data pengiriman, maka tampilkan form
		else
		{
			$data = array(
				'title' => 'Tambah KTP'
				);

			// Form untuk menambahkan data
			$this->load->view('inc/header',$data);
			$this->load->view('data_ktp/add',$data);
			$this->load->view('inc/footer',$data);
		}
	}


	/**
	* Fungsi untuk mengedit data ktp
	*
	* @param id integer
	* @return mix
	**/
	function edit($id)
	{
		// Memanggil library form validation
		$this->load->library('form_validation');

		// setup config validation
		$config = array(
			array(
				'field' => 'nik',
				'label' => 'NIK',
				'rules' => 'required'
			),
			array(
				'field' => 'tempat_lahir',
				'label' => 'Tempat Lahir',
				'rules' => 'required'
			),
			array(
				'field' => 'jenis_kelamin',
				'label' => 'Jenis Kelamin',
				'rules' => 'required'
			),
			array(
				'field' => 'golongan_darah',
				'label' => 'Golongan Darah',
				'rules' => 'required'
			),
			array(
				'field' => 'agama',
				'label' => 'Agama',
				'rules' => 'required'
			),
			array(
				'field' => 'status_perkawinan',
				'label' => 'Status Perkawinan',
				'rules' => 'required'
			),
			array(
				'field' => 'pekerjaan',
				'label' => 'Pekerjaan',
				'rules' => 'required'
			),
			array(
				'field' => 'kewarganegaraan',
				'label' => 'Kewarganegaraan',
				'rules' => 'required'
			),
			array(
				'field' => 'berlaku_hingga',
				'label' => 'Berlaku Hingga',
				'rules' => 'required'
			),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required'
			)
		);

		$this->form_validation->set_rules($config);

		// Jika form di submit, maka jalankan bagian ini
		if($this->form_validation->run())
		{
			$params = array(
				'nik' 				=> $this->input->post('nik'),
				'nama' 				=> $this->input->post('nama'),
				'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
				'tanggal_lahir' 	=> tanggal_db($this->input->post('tanggal_lahir')),
				'jenis_kelamin' 	=> $this->input->post('jenis_kelamin'),
				'golongan_darah' 	=> $this->input->post('golongan_darah'),
				'alamat'			=> $this->input->post('alamat'),
				'rt' 				=> $this->input->post('rt'),
				'rw' 				=> $this->input->post('rw'),
				'wilayah' 			=> $this->input->post('wilayah'),
				'kelurahan' 		=> $this->input->post('kelurahan'),
				'kecamatan' 		=> $this->input->post('kecamatan'),
				'agama' 			=> $this->input->post('agama'),
				'status_perkawinan' => $this->input->post('status_perkawinan'),
				'pekerjaan' 		=> $this->input->post('pekerjaan'),
				'kewarganegaraan' 	=> $this->input->post('kewarganegaraan'),
				'berlaku_hingga' 	=> tanggal_db($this->input->post('berlaku_hingga')),
				'email' 			=> $this->input->post('email'),
				'date_modify' 		=> $this->input->post('date_modify'),
			);

			// Update data ke table
			$query = $this->M_data_ktp->update_frm_data_ktp($id, $params);

			// Jika update query berhasil, maka return 1
			if( $query == 1) {

				// Setup session pesan update jika berhasil
				$this->session->set_flashdata('action_status', '<div class="alert alert-info">Data berhasil di update</div>');

			} else {

				// Setup session pesan update jika gagal
				$this->session->set_flashdata('action_status', '<div class="alert alert-danger">Data gagal di update</div>');
			}

			// redirect jika berhasil dan memberikan informasi sesuai session
			redirect('data_ktp/lists');
		}

		// Jika tidak ada data pengiriman, maka tampilkan edit form
		else
		{

			$data = array(
				'title' => 'Edit KTP',
				'row' => $this->M_data_ktp->get_frm_data_ktp($id),
				);

			$this->load->view('inc/header',$data);
			$this->load->view('data_ktp/edit',$data);
			$this->load->view('inc/footer',$data);
		}
	}

	/**
	* Fungsi untuk menghapus data ktp berdasarkan ID
	*
	* @param id Integer
	**/
	function remove($id)
	{
		$query = $this->M_data_ktp->delete_frm_data_ktp($id);

		// Jika delete query berhasil, maka return 1
		if( $query == 1) {

			// Setup session pesan delete jika berhasil
			$this->session->set_flashdata('action_status', '<div class="alert alert-info">Data berhasil di hapus</div>');

		} else {

			// Setup session pesan delete jika gagal
			$this->session->set_flashdata('action_status', '<div class="alert alert-danger">Data gagal di hapus</div>');
		}

		// Redirect ke halaman list, dilengkapi dengan session data
		redirect('data_ktp/lists');
	}

	/**
	* Private function untuk upload foto ktp
	*
	* @param id Integer
	**/
 	private function _upload_gambar() {

 		// Setup folder upload path
 		$config['upload_path']		= './uploads/';

 		// Setup file yang di izinkan
 		$config['allowed_types']	= 'gif|jpg|png|jpeg';

 		// Encrpt nama foto agar tidak sama
 		$config['encrypt_name']		= true;

 		// Memanggil library upload disertai dengan paramter $config array
 		$this->load->library('upload', $config);

 		// jika upload gagal, return false
 		if( $this->upload->do_upload( 'foto' ) == false) {
 			return false;
 			#return $this->upload->display_errors();
 		}

 		// jika upload berhasil, return nama file dan membuat thumbnail foto
 		else
 		{
 			// Mengambil data yang berhasil di upload
 			$uploaded_data = $this->upload->data();

 			// Mendapatkan nama file
 			$file_name = $uploaded_data['file_name'];

 			// Memanggil library GD 2
			$config['image_library'] = 'gd2';

			// Memanggil nama file images
			$config['source_image'] = './uploads/'.$file_name;

			// Membuat thumbnail
			$config['create_thumb'] = TRUE;

			// Mempertahankan foto berdasarkan ratio, hal ini digunakan agar foto tidak gepeng
			$config['maintain_ratio'] = TRUE;

			// Setting lebar dan tinggi
			$config['width']         = 100;
			//$config['height']       = 100;

			// Memanggil library image_lib untuk memproses images resize disertai dengan parameter $config
			$this->load->library('image_lib', $config);

			// Melakukan resize
			$this->image_lib->resize();

			// Return data
 			return $uploaded_data;
 		}
 	}
	function viewprofile($id)
	{
			$data = array(
				'title' => 'Informasi KTP',
				'row' => $this->M_data_ktp->get_frm_data_ktp($id),
				);

			$this->load->view('inc/header',$data);
			$this->load->view('data_ktp/vprofile',$data);
			$this->load->view('inc/footer',$data);

	}
	function searchlist()
  {
 	 $keyword = $this->input->get('searchlist', TRUE);
 	 $data = array(
 		 'title' => 'Daftar KTP',
 		 'results' => $this->M_data_ktp->searching($keyword)
 		 );

 	 // Menampikan data KTP ke view
 	 $this->load->view('inc/header',$data);
 	 $this->load->view('data_ktp/index',$data);
 	 $this->load->view('inc/footer',$data);
  }

}
