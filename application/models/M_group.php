<?php
class M_group extends CI_Model
{

	function __construct()
	{
		parent::__construct();

		$this->tbl_group = 'tbl_groups';
	}

	/*
	 * daftar group
	 *
	 * @return mix
	 */
	function lists_group() {

		$result = $this->db->get($this->tbl_group);

		if ($result->num_rows() > 0)
		{
			return $result->result();
		}
		else
		{
			return FALSE;
		}
	}

//------------------------------------------------------------

	/*
	 * Edit group by id
	 *
	 * @param integer
	 * @return mix
	 */

	function edit_group( $id ) {

		$result = $this->ion_auth->group( $id );

		if ($result->num_rows() > 0)
		{
			return $result->row_array();
		}
		else
		{
			return FALSE;
		}
	}

//------------------------------------------------------------

	/*
	 * Hapus daftar group by id
	 *
	 * @param integer
	 * @return mix
	 */
	function delete_group( $id ) {

		if( $id != 1 || $id != 2 ) {

			$array_where = array(
				'id' => $id
				);

			$this->db->limit(1);
			$result = $this->db->delete( $this->tbl_group, $array_where );

			return $this->db->affected_rows();

		} else {

			return FALSE;

		}
	}
}
