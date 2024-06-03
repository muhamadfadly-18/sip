<?php 
 
class Model_JurnalUmum extends CI_Model{

	function tampil_data(){
        //$this->db->order_by("created_at", "desc");
        return $this->db->get('jurnal_umum');
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function hapus_data_user_access($where_id_user_access,$table){
		$this->db->where($where_id_user_access);
		$this->db->delete($table);
	}

	function hapus_data_user($where_id_user,$table){
		$this->db->where($where_id_user);
		$this->db->delete($table);
	}

	function edit_data($where,$table){	
		return $this->db->select('a.*, b.nama_rek')
				 ->from('jurnal_umum a')
				 ->join('rekening b', 'a.no_rek = b.no_rek', 'inner')
				 ->where('no_jurnal', $where['no_jurnal'])->get();
		//return $this->db->get_where($table,$where);
	}
 
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	

	function tampil_data_user_access(){
        return $this->db->get('jurnal_umum');
	}

	function input_data_user_access($array,$table){
		$this->db->insert($table, $array);
	}
	
}