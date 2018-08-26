<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Fungsi untuk mendapatkan nama by session
 *
 * @return string
 */
if(!function_exists('get_name_by_session'))
{
	function get_name_by_session()
	{
		$ci =& get_instance();
		$get_user = $ci->ion_auth->user();
		$extract_data = $get_user->row();
		return $extract_data->first_name.' '.$extract_data->last_name;
	}

}


function get_name_by_id_user( $id_user )
{
	$ci =& get_instance();
	$query 	= $ci->db->query("SELECT first_name, last_name FROM frm_users WHERE id = ?", $id_user);
	$row 	= $query->row();
	$nama_lengkap = $row->first_name.' '.$row->last_name;
	return $nama_lengkap;
}


function get_daftar_groups(){
	$ci =& get_instance();
	$get_groups 	= $ci->ion_auth->groups();
	$result_groups 	= $get_groups->result();

	$array_groups 	= array();
	
	foreach($result_groups as $group)
	{
		$array_groups[$group->id] = $group->name.' - '.$group->description;
	}

	return $array_groups;
}


function need_login($redirect_url = 'auth')
{
	$ci =& get_instance();	
	$check_login = $ci->ion_auth->logged_in();

	if($check_login === FALSE)
	{
		redirect($redirect_url);
	}
	else
	{
		return true;
	}
}

function need_admin($redirect_url = 'data_ktp/lists')
{
	$ci =& get_instance();	
	$check_admin = $ci->ion_auth->is_admin();

	if($check_admin === FALSE)
	{
		$ci->session->set_flashdata('action_status', '<div class="alert alert-danger">Anda tidak memiliki priviladge !</div>');

		redirect($redirect_url);
	}
}