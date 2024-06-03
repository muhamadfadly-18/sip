<?php 
 
class Model_module extends CI_Model{

	function tampil_data(){
        $this->db->order_by("created_at", "desc");
        return $this->db->get('ref_module');
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function hapus_data($where,$table,$where_up,$data){
        $this->db->where($where_up);
        $this->db->update($table,$data);

		$this->db->where($where);
		$this->db->delete($table);
	}

    function hapus_data_user_access($where,$table){
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

    function input_data_user_access($data,$table){
        $this->db->insert($table,$data);
    }


	function select_box_tree($array,$parent_id = 0,$parents = array())
    {
        static $i = 1;
        $tab = str_repeat(" ",$i);

		static $a = 0;
		$pusher = "----";

		$showPusher = str_repeat($pusher,$a);

        if($parent_id==0)
        {
            $menu_html .= $tab;
            $i++;
            foreach ($array as $element) {
                if (($element->id_parent != 0) && !in_array($element->id_parent,$parents)) {
                    $parents[] = $element->id_parent;
                }
            }
        }
        $menu_html = '';

        foreach($array as $element)
        {
            if($element->id_parent == $parent_id)
            {
                $a++;
                if(in_array($element->id_module,$parents))
                {
                    
                    $menu_html .= '<option value="' . $element->id_module . '">'.$showPusher.'| '.$element->name_module.'</option>';
                }
                else {
                 	
                    $menu_html .= '<option value="' . $element->id_module . '">'.$showPusher.'| ' . $element->name_module . '</option>';
                }
                if(in_array($element->id_module,$parents))
                {
                    $menu_html .= '<ul>';
                    $menu_html .= $this->select_box_tree($array, $element->id_module, $parents);
                    $menu_html .= '</ul>';
                }
                --$a;
                
            }
        }
        return $menu_html;
    }
	
}