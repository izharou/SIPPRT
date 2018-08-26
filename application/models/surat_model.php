<?php

class surat_model extends CI_Model {
  public function __construct(){
		$this->load->database();
	}

  public function cek_login($table,$where)
  {
    return $this->db->get_where($table,$where);
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

    $tables = array('h_surat', 'd_surat');
    $this->db->where('id_surat', $id);
    $this->db->delete($tables);
	}

	public function hapus($table, $id){
		$this->db->delete($table, $id);
	}

  // public function live_search(){
  //
  //       $query = $this
  //               ->db
  //               ->select('*')
  //               ->from('mahasiswa')
  //               ->like('TITLE',$search)
  //               ->get();
  //
  //       if($query->num_rows()>0)
  //       {
  //           return $query->result();
  //       }
  //       else
  //       {
  //           return null;
  //       }
  // }

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
    $this->db->from("h_surat");
    $this->db->limit(1);
    $this->db->order_by('id_surat',"DESC");
    $query = $this->db->get();
    $result = $query->result();
    $id = $result[0]->id_surat;
    return $id;

    }

    function no_surat()   {
      $this->db->select('*');
      $this->db->from('h_surat');
      $this->db->order_by('id_surat',"DESC");
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
        $this->db->select('LEFT(h_surat.no_surat,3) as kode', FALSE);
        $this->db->order_by('id_surat','DESC');
        $this->db->limit(1);
        $query = $this->db->get('h_surat');      //cek dulu apakah ada sudah ada kode di tabel.
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
      $this->db->from('h_surat');
      $this->db->join('d_surat', 'h_surat.id_surat = d_surat.id_surat');
      $this->db->join('mahasiswa', 'mahasiswa.nim = d_surat.nim');
      $this->db->join('konsentrasi', 'konsentrasi.id_konsentrasi = mahasiswa.id_konsentrasi');
      $this->db->join('program_studi', 'program_studi.id_program = konsentrasi.id_program');
      $this->db->where('h_surat.id_surat',$id);
      $query = $this->db->get();
      return $query->result_array();
      // $this->CI->db->select('*');
      // $this->CI->db->where('user_id' , $id);
      // $user = $this->CI->db->get();
      // $user = $user->row_array();
      // $this->CI->validation->set_default_value($user);
    }

    function di_edit($id){
      $this->db->select('*');
      $this->db->from('h_surat');
      $this->db->join('d_surat', 'h_surat.id_surat = d_surat.id_surat');
      $this->db->join('mahasiswa', 'mahasiswa.nim = d_surat.nim');
      $this->db->join('konsentrasi', 'konsentrasi.id_konsentrasi = mahasiswa.id_konsentrasi');
      $this->db->join('program_studi', 'program_studi.id_program = konsentrasi.id_program');
      $this->db->where('h_surat.id_surat',$id);
      $this->db->order_by("id_detail", "asc");
      $query = $this->db->get();
      return $query->result_array();
      // $this->CI->db->select('*');
      // $this->CI->db->where('user_id' , $id);
      // $user = $this->CI->db->get();
      // $user = $user->row_array();
      // $this->CI->validation->set_default_value($user);
    }

}
