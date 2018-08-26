<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pengguna extends CI_Controller
{	

	//Construct
	public function __construct() 
	{
		parent::__construct();

		$this->load->model( 'm_pengguna', 'pengguna' );

		need_login();

		need_admin();
	}

	public function index(){
		redirect('backend/pengguna/lists');
	}

//---------------------------------------------------------

	/**
	 *  Master Pengguna lists
	 *
	 *
	 */
	public function lists() {

		$data = array(
			'title'				=> 'Daftar Pengguna',
			'menu'				=> 'master',
			'submenu'			=> 'pengguna',
			'result'			=> $this->pengguna->lists_pengguna()
			);

		$this->load->view( 'inc/header', $data );
		$this->load->view( 'backend/pengguna/lists', $data );
		$this->load->view( 'inc/footer', $data );
	}

//---------------------------------------------------------

	/**
	 *  Master Pengguna add
	 *
	 *
	 */
	function add()
	{

		/* Config tambah pengguna */
		$config = array(
			array(
				'field' => 'first_name',
				'label' => 'Nama depan',
				'rules' => 'required'
				),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|valid_email|is_unique[frm_users.email]'
				),
			array(
				'field' => 'phone',
				'label' => 'Telepon',
				'rules' => 'required|trim'
				),			
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => "required|min_length[8]|max_length[20]|matches[password_confirm]"
				),
			array(
				'field' => 'password_confirm',
				'label' => 'Konfirmasi password',
				'rules' => 'required'
				),
			);

		// set config rules
		$this->form_validation->set_rules($config);	

		// tampilkan form
		if($this->form_validation->run() === FALSE)
		{
			$data = array(
				'title'		=> 'Tambah Pengguna',
				'menu'		=> 'master',
				'submenu'	=> 'pengguna'
				);

			$this->load->view( 'inc/header', $data );
			$this->load->view( 'backend/pengguna/add', $data );
			$this->load->view( 'inc/footer', $data );
		}
		else
		{
			$email   	 	= strtolower($this->input->post('email'));
			$password 		= $this->input->post('password');
			$level_user 	= $this->input->post('level_user');

			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'company'    => $this->input->post('company'),
				'phone'      => $this->input->post('phone'),
			);

			// register session
			$register_user = $this->ion_auth->register( $email, $password, $email, $additional_data, $level_user );
			
			$this->session->set_flashdata('message', '<div class="alert alert-success">Tambah data berhasil</div>');

			redirect( "backend/pengguna/lists" );
		}
	}

//---------------------------------------------------------

	/**
	 *  Master Pengguna Edit
	 *
	 *
	 */
	function edit($id)
	{
		// setup validation rules
		$config = array(
			array(
				'field' => 'first_name',
				'label' => 'Nama depan',
				'rules' => 'required'
				),
			array(
				'field' => 'phone',
				'label' => 'Telepon',
				'rules' => 'required|trim'
				),			
		);

		// set validation untuk password
		if($this->input->post('password'))
		{
			$config = array(
				array(
					'field' => 'password',
					'label' => 'Password',
					'rules' => "required|min_length[8]|max_length[20]|matches[password_confirm]"
				),
				array(
					'field' => 'password_confirm',
					'label' => 'Konfirmasi password',
					'rules' => 'required'
				)
			);
		}

		$this->form_validation->set_rules($config);

		// tampilkan form
		if ($this->form_validation->run() === FALSE)
		{
			$data = array(
				'title'		=> 'Edit Pengguna',
				'menu'		=> 'master',
				'submenu'	=> 'pengguna',
				'pengguna'	=> $this->ion_auth->user($id)->row(),
				'current_level'	=> $this->ion_auth->get_users_groups($id)->row()->id
				);

			$this->load->view( 'inc/header', $data );
			$this->load->view( 'backend/pengguna/edit', $data );
			$this->load->view( 'inc/footer', $data );
		}
		else
		{
			$get_level_user = $this->input->post('level_user');
			$password 		= $this->input->post('password');

			$data = array(
				'first_name' 	=> $this->input->post('first_name'),
				'last_name'  	=> $this->input->post('last_name'),
				'company'    	=> $this->input->post('company'),
				'phone'      	=> $this->input->post('phone'),
				'level_user' 	=> $get_level_user
				);

			// update password, jika di kirim
			if($password)
			{
				$data['password'] = $password;
			}


			// update level user
			if (isset($get_level_user) && !empty($get_level_user)) {

				// remove current group
				$this->ion_auth->remove_from_group('', $id);

				// update group
				foreach ($get_level_user as $level) {
					$this->ion_auth->add_to_group($level, $id);
				}

			}

			// check to see if we are updating the user
			if($this->ion_auth->update($id, $data))
			{
				$this->session->set_flashdata('action_status', '<div class="alert alert-info">Update info berhasil</div>');

				redirect( 'backend/pengguna/lists' );
			}
		}
	}

//---------------------------------------------------------

	/**
	 * Pengguna Delete
	 *
	 *
	 */
	function delete($id)
	{
		if($id != 1 )
		{
			$delete_user = $this->pengguna->delete_pengguna($id);			
		
			$this->session->set_flashdata('action_status', '<div class="alert alert-info">Hapus data berhasil</div>');			
		}
		else
		{
			if($id == 1)
			{
				$this->session->set_flashdata('action_status', '<div class="alert alert-danger">Superadmin tidak dapat di hapus</div>');							
			}
			else
			{
				$this->session->set_flashdata('action_status', '<div class="alert alert-danger">Hapus data gagal</div>');							
			}
		}

		redirect('backend/pengguna/lists');
	}

//---------------------------------------------------------

	/**
	 *  Activate pengguna
	 *
	 *
	 */
	public function activate( $id, $code = false )
	{
		if ($code !== false)
		{
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation)
		{
			// redirect them to the auth page
			$this->session->set_flashdata('action_status', '<div class="alert alert-info">'.$this->ion_auth->messages().'</div>');
			redirect( 'backend/pengguna/lists' );
		}
		else
		{
			// redirect them to the forgot password page
			$this->session->set_flashdata('action_status', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}

//---------------------------------------------------------

	/**
	 *  Deactivate pengguna
	 *
	 *
	 */
	function deactivate($id = NULL)
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}

		$id = (int) $id;

		$this->load->library('form_validation');
		$this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label'), 'required');
		$this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label'), 'required|alpha_numeric');

		if ($this->form_validation->run() == FALSE)
		{
			// insert csrf check
			$this->data['csrf'] = $this->_get_csrf_nonce();
			$this->data['user'] = $this->ion_auth->user($id)->row();

			$this->_render_page('backend/pengguna/deactivate_user', $this->data);
		}
		else
		{
			// do we really want to deactivate?
			if ($this->input->post('confirm') == 'yes')
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
				{
					show_error($this->lang->line('error_csrf'));
				}

				// do we have the right userlevel?
				if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
				{
					$this->ion_auth->deactivate($id);
				}
			}

			$this->session->set_flashdata('action_status', '<div class="alert alert-info">'.$this->ion_auth->messages().'</div>');

			// redirect them back to the auth page
			redirect( 'backend/pengguna/lists' );
		}
	}

//---------------------------------------------------------

	/**
	 *  Helper private method
	 *
	 *
	 */

	private function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	private function _valid_csrf_nonce()
	{
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
			$this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	private function _render_page($view, $data=null, $returnhtml=false)//I think this makes more sense
	{

		$this->viewdata = (empty($data)) ? $this->data: $data;

		$view_html = $this->load->view($view, $this->viewdata, $returnhtml);

		if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
	}
}