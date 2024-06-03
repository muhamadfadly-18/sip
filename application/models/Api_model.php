<?php
class Api_model extends CI_Model
{
	function get_barang()
	{
		$this->db->order_by('id_barang', 'ASC');
		return $this->db->get('barang');
	}

  function get_terminal()
  {
    $this->db->order_by('id_terminal', 'ASC');
    return $this->db->get('ref_terminal');
  }

  function get_kegiatan()
  {
    $this->db->order_by('id', 'ASC');
    return $this->db->get('ref_kegiatan');
  }

  function get_kapal_pandu()
  {
    $this->db->order_by('id_kapal_pandu', 'ASC');
    return $this->db->get('ref_kapal_pandu');
  }

  function get_kapal_tunda()
  {
    $this->db->order_by('id_kapal_tunda', 'ASC');
    return $this->db->get('ref_kapal_tunda');
  }


	function insert_barang_masuk($data)
	{
		$this->db->insert('tr_notif', $data);
	}


	function fetch_single_user($user_id)
	{
		$this->db->where('id', $user_id);
		$query = $this->db->get('tbl_sample');
		return $query->result_array();
	}

	function update_api($user_id, $data)
	{
		$this->db->where('id', $user_id);
		$this->db->update('tbl_sample', $data);
	}
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function delete_single_user($user_id)
	{
		$this->db->where('id', $user_id);
		$this->db->delete('tbl_sample');
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}

?>
