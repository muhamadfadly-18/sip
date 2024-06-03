<?php

class Model_Rekening extends CI_Model{

	function tampil_data(){
       // $this->db->order_by("created_at", "desc");
        return $this->db->get('rekening');
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
		return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function tampil_data_user_access(){
        return $this->db->get('ref_module');
	}

	function input_data_user_access($array,$table){
		$this->db->insert($table, $array);
	}


function select_box($array,$no_rek = 0,$Rekening = array())
    {
        static $i = 1;
        $tab = str_repeat(" ",$i);

		static $a = 0;
		$pusher = "----";

		$showPusher = str_repeat($pusher,$a);

        if($no_rek==0)
        {
            $menu_html .= $tab;
            $i++;
            foreach ($array as $element) {
                if (($element->no_rek != 0) && !in_array($element->no_rek,$Rekening)) {
                    $Rekening[] = $element->no_rek;
                }
            }
        }
        $menu_html = '';

        foreach($array as $element)
        {
            if($element->no_rek == $Rekening)
            {
                $a++;
                if(in_array($element->no_rek,$Rekening))
                {

                    $menu_html .= '<option value="' . $element->no_rek . '">'.$showPusher.'| '.$element->Rekening.'</option>';
                }
                else {

                    $menu_html .= '<option value="' . $element->no_rek . '">'.$showPusher.'| ' . $element->Rekening . '</option>';
                }
                if(in_array($element->no_rek,$Rekening))
                {
                    $menu_html .= '<ul>';
                    $menu_html .= $this->select_box($array, $element->no_rek, $Rekening);
                    $menu_html .= '</ul>';
                }
                --$a;

            }
        }
        return $menu_html;
    }

}
