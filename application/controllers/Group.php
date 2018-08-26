<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Group extends CI_Controller
{	

	//Construct
	public function __construct() 
	{
		parent::__construct();

		$this->load->model( 'm_group', 'group' );

		need_login();
	}

	function index()
	{
		redirect('backend/group/lists_group');
	}

	/**
	 * Daftar group
	 *
	 *
	 */
	function lists_group() {

		$data = array(
			'title'				=> 'Daftar Group',
			'menu'				=> 'pengguna',
			'submenu'			=> 'group',
			'result'			=> $this->group->lists_group()
			);

		$this->load->view( 'inc/header', $data );
		$this->load->view( 'backend/group/lists-group', $data );
		$this->load->view( 'inc/footer', $data );	
	}

//---------------------------------------------------------

	/**
	 * tambah group
	 *
	 *
	 */
	function add()
	{	
		// check validation
		$this->form_validation->set_rules('group_name', 'Nama group', 'required|alpha_dash');
		$this->form_validation->set_rules('description', 'Keterangan', 'required');

		// jika false, tampilkan form
		if($this->form_validation->run() === FALSE)
		{
			$data = array(
				'title'			=> 'Tambah Group',
				'menu'			=> 'pengguna',
				'submenu'		=> 'group'
				);

			$this->load->view( 'inc/header', $data );
			$this->load->view( 'backend/group/add-group', $data );
			$this->load->view( 'inc/footer', $data );
		}
		else
		{
			// tambah group baru
			$add_group = $this->ion_auth->create_group( $this->input->post('group_name'), $this->input->post('description') );

			// set session messange untuk hasil result add_group dan redirect
			if($add_group === TRUE)
			{
				$this->session->set_flashdata('action_status', '<div class="alert alert-info">Tambah group berhasil</div>');
			}
			else
			{
				$this->session->set_flashdata('action_status', '<div class="alert alert-alert">Tambah group gagal</div>');
			}

			// redirect ke list group
			redirect( "backend/group/lists_group" );
		}
	}

//---------------------------------------------------------

	/**
	 * edit group
	 *
	 * @param integer $id
	 * @return view
	 */
	function edit($id)
	{	
		// jika group null, redirect
		if($id == null) {
			$this->session->set_flashdata('action_status', '<div class="alert alert-info">Group tidak ada</div>');

			redirect( "backend/group/lists_group" );
		}

		// ID 1 dan 2 untuk admin dan member tidak dapat di edit
		if($id == 1 || $id == 2) 
		{					
			$this->session->set_flashdata('action_status', '<div class="alert alert-info">Admin dan member tidak dapat di edit</div>');

			redirect('backend/group/lists_group');
			exit();
		}

		// set valldation
		$this->form_validation->set_rules('group_name', 'Nama group', 'required|alpha_dash');
		$this->form_validation->set_rules('group_description', 'Keterangan', 'required');

		// tampilkan form
		if ($this->form_validation->run() === FALSE)
		{
			$data = array(
				'title'			=> 'Edit Group',
				'menu'			=> 'pengguna',
				'submenu'		=> 'group',
				'row'			=> $this->group->edit_group( $id)
				);

			$this->load->view( 'inc/header', $data );
			$this->load->view( 'backend/group/edit-group', $data );
			$this->load->view( '/inc/footer', $data );
		}
		else
		{
			// update group
			$group_update = $this->ion_auth->update_group($id, $_POST['group_name'], $_POST['group_description']);

			if($group_update === TRUE)
			{
				$this->session->set_flashdata('action_status', '<div class="alert alert-info">Update group berhasil</div>');

				redirect("backend/group/lists_group");
			}			
		}
	}	

//---------------------------------------------------------

	function delete( $id ) {

		if( $id == 1 || $id == 2 ) {		
			redirect('backend/group/lists_group');
			exit();
		}

		$delete = $this->group->delete_group( $id );

		if( $delete != 0 ) {

			$this->session->set_flashdata( 'action_status', '<div class="alert alert-info">Hapus data berhasil</div>' );

		} else {

			$this->session->set_flashdata( 'action_status', '<div class="alert alert-warning">Hapus data gagal</div>' );

		}

		redirect('backend/group/lists_group');
	}

}