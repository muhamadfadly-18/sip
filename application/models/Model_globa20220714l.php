<?php

class Model_global extends CI_Model{

	public function getAll($table)
    {
        return $this->db->get($table);
    }

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

  public function cekJobOrder()
   {
       $query = $this->db->query("SELECT MAX(id_bm) as id_bm from barang_masuk");
       $hasil = $query->row();
       return $hasil->no_job_order;
   }

	   public function cekNoPpkb()
	    {
					$date =  date('ym');
	        $query = $this->db->query("SELECT MAX(id_reg_vessel) as id_reg_vessel from ref_register_vessel");
	        $hasil = $query->row();

					$nilai = $hasil->id_reg_vessel + 1;
					$data = 'PPKB.BUP.'.$date.'.'.$nilai;
					return $data;
	    }

			public function cekNoRpkro()
 	    {
					$date =  date('dm');
 	        $query = $this->db->query("SELECT MAX(id_rpkro) as id_rpkro from t_rpkro");
 	        $hasil = $query->row();
					$nilai = $hasil->id_rpkro + 1;
					$data = 'IDTJB-RPKRO.SUB.'.$date.'.'.$nilai;
 	        return $data;
 	    }

			public function cekPilotOrder()
 	    {

 	        $query = $this->db->query("SELECT MAX(id_pilot_order) as id_pilot_order from tr_pilot_order");
 	        $hasil = $query->row();
					$nilai = $hasil->id_pilot_order + 1;
					$data = '0'.$nilai;
 	        return $data;
 	    }

}
