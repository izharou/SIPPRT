<?php

  class M_surat extends CI_Model {
    public function __construct(){

    // Setup nama tabel ktp
		$this->tbl_ktp = 'tbl_penduduk';
    $this->tbl_hsurat = 'tbl_headsurat';
    $this->tbl_detsurat = 'tbl_headsurat';
	}


	//1.select(table, id)
	public function get_data($table, $id){
		if($id!="")
		{
			$query=$this->db->get_where($table, $id);
		}
		else
		{
			$query=$this->db->get_where($table);
		}

		return $query->result_array();
	}

	//2.insert(table, data)
	public function set_data($table, $data){

    $this->db->insert($table, $header);

	}

	//3.insert(table, data, id)
	public function update_data($table, $data, $id){
		$this->db->update($table, $data, $id);
	}

	//3.insert(table, id)
	public function remove_data($id){
		// $this->db->delete('h_surat', $id);
		// $this->db->delete('d_surat', $id);

    $tables = array('tbl_headsurat', 'tbl_detsurat');
    $this->db->where('idsurat', $id);
    $this->db->delete($tables);
	}

	public function hapus($table, $id){
		$this->db->delete($table, $id);
	}



  function code_otomatis(){
    // $this->db->select('Right(h_surat.id_surat,3) as kode ',false);
    // $this->db->order_by('id_surat', 'desc');
    // $this->db->limit(1);
    // $query = $this->db->get('h_surat');
    // if($query->num_rows()<>0){
    //     $data = $query->row();
    //     $kode = intval($data->kode)+1;
    // }else{
    //     $kode = 1;
    //
    // }
    // $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
    // $kodejadi  = "SR".$kodemax;
    // return $kodejadi;

    $this->db->select("*");
    $this->db->from("tbl_headsurat");
    $this->db->limit(1);
    $this->db->order_by('idsurat',"DESC");
    $query = $this->db->get();
    $result = $query->result();
    $id = $result[0]->idsurat;
    return $id;

    }

        function no_surat()   {
          $this->db->select('*');
          $this->db->from('tbl_headsurat');
          $this->db->order_by('idsurat',"DESC");
          $query = $this->db->get();
          $dt = $query->row();
          $dtt = $dt->tanggal;
          $split = explode('-', $dtt);

          $m1 = date('m');
          $m2 = $split[1];
          // print_r($dtt);
          // die();
          if ($m1 != $m2) {
            $kodemax = '001';
          }
          else {
            $this->db->select('LEFT(tbl_headsurat.nosurat,3) as kode', FALSE);
            $this->db->order_by('idsurat','DESC');
            $this->db->limit(1);
            $query = $this->db->get('tbl_headsurat');      //cek dulu apakah ada sudah ada kode di tabel.
            if($query->num_rows() <> 0){
             //jika kode ternyata sudah ada.
             $data = $query->row();
             $kode = intval($data->kode) + 1;
            }
            else{
             //jika kode belum ada
             $kode = 1;
            }
            $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
            // $kodejadi = "KASIR".$kodemax;
          }
          return $kodemax;
         }

    function print_surat($id){
      $this->db->select('*');
      $this->db->from('tbl_headsurat');
      $this->db->join('tbl_detsurat', 'tbl_headsurat.idsurat = tbl_detsurat.idsurat');
      $this->db->join('tbl_penduduk', 'tbl_penduduk.nik = tbl_detsurat.nik');
      $this->db->where('tbl_headsurat.idsurat',$id);
      $query = $this->db->get();
      return $query->result_array();
      // $this->CI->db->select('*');
      // $this->CI->db->where('user_id' , $id);
      // $user = $this->CI->db->get();
      // $user = $user->row_array();
      // $this->CI->validation->set_default_value($user);
    }


}
?>
