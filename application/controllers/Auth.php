<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	// redirect if needed, otherwise display the user list
	public function index()
	{
		redirect('auth/login');
	}

	public function login()
	{
		// validasi input
		$this->form_validation->set_rules('identity', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === TRUE)
		{
			// input post
			$identity = $this->input->post('identity');
			$password = $this->input->post('password');
			$remember = (bool) $this->input->post('remember');

			// jika login berhasil, redirect ke halaman dashboard
			if ($this->ion_auth->login($identity, $password, $remember) === TRUE)
			{
				redirect('data_ktp');
			}
			else
			{
				$this->session->set_flashdata('action_status', '<div class="alert alert-danger">Username atau password Anda salah</div>');

				redirect('auth/login', 'refresh');		
			}
		}
		else
		{
			$data = array(
				'title'	=> 'Login'
				);

			$this->load->view('login/login', $data);
		}
	}

	// log the user out
	public function logout()
	{
		$this->data['title'] = "Logout";

		// log the user out
		$logout = $this->ion_auth->logout();

		// redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('auth/login', 'refresh');
	}

	public function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	public function _valid_csrf_nonce()
	{
		$csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
		if ($csrfkey && $csrfkey == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

}