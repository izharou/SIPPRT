<?php
class M_pengguna extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

//------------------------------------------------------------
	
	/*
	 * Lists tabel pengguna limit and offset
	 * @return array
	 */
	function lists_pengguna()
	{	
		$result = $this->ion_auth->users()->result();
	
		foreach ($result as $k => $user)
		{
			$result[$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
		}

		return $result;
	}

//------------------------------------------------------------
	
	/*
	 * Remove data pengguna by id
	 * @return integer
	 */
	function delete_pengguna( $id ) {

		$this->db->trans_start();

		$result = $this->ion_auth->delete_user($id);

		$this->db->trans_complete();

		return $result;
	}
}