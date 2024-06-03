<?php 
 
class Model_menu extends CI_Model{
/*
	function list_menu(){
        $this->db->where('id_parent');
        return $this->db->get('ref_module')->result();
	}

	function list_child_menu($id){
		$this->db->where('id_parent', $id);
		return $this->db->get('ref_module')->result();
	}
*/

	/*public function menu($parent,$hasil){

		$w = $this->db->query("SELECT * from ref_module where id_parent='".$parent."'");
		if(($w->num_rows())>0)
		{
			$hasil .= "<ul class='site-menu'>";
		}
		foreach($w->result() as $h)
		{

			$hasil .= "<li  class='site-menu-item has-sub'>"."<a class='animsition-link' href='#'>"."<i class='site-menu-icon wb-dashboard' aria-hidden='true'></i>  
                    <span class='site-menu-title'>".$h->name_module."</span></a>";
			$hasil = $this->menu($h->id_module,$hasil);
			$hasil .= "</li>";
		}
		if(($w->num_rows)>0)
		{
			$hasil .= "</ul>";
		}
		return $hasil;
	}*/

	function bootstrap_menu($array,$parent_id = 0,$parents = array())
    {
        $url = $this->uri->segment(1);
        if($parent_id==0)
        {
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
                if(in_array($element->id_module,$parents))
                {
                    if($element->akses == 1){
                        if($url == $element->name_controller){
                            $active = "active";
                        }else{
                            $active = "";
                        }
                        $menu_html .= '<li class="site-menu-item has-sub">';
                        $menu_html .= '<a href="javascript:void(0)"><i class="site-menu-icon fa fa-'.$element->icon.'" aria-hidden="true"></i><span class="site-menu-title">'.$element->name_module.'</span><span class="site-menu-arrow"></span></a>';
                    }
                  
                }else{

                    if($element->akses == 1){
                        if($url == $element->name_controller){
                            $active = "active";
                        }else{
                            $active = "";
                        }
                        $menu_html .= '<li class="site-menu-item">';
                        $menu_html .= '<a class="animsition-link '.$active.'" href="' . base_url(''.$element->name_controller.'') . '"><i class="site-menu-icon fa fa-'.$element->icon.'" aria-hidden="true"></i><span class="site-menu-title">' . $element->name_module . '</span></a>';
                    }
                }
                if(in_array($element->id_module,$parents))
                {
                    $menu_html .= '<ul class="site-menu-sub">';
                    $menu_html .= $this->bootstrap_menu($array, $element->id_module, $parents);
                    $menu_html .= '</ul>';
                }
                $menu_html .= '</li>';
            }
        }
        return $menu_html;
    }

    /*function bootstrap_menu($array,$parent_id = 0,$parents = array())
    {
        if($parent_id==0)
        {
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
                if(in_array($element->id_module,$parents))
                {
                    
                    $menu_html .= '<option value="' . $element->id_module . '">|=> '.$element->name_module.'</option>';
                }
                else {
                 
                    $menu_html .= '<option value="' . $element->id_module . '">|=> ' . $element->name_module . '</option>';
                }
                if(in_array($element->id_module,$parents))
                {
                    $menu_html .= '<ul>';
                    $menu_html .= $this->bootstrap_menu($array, $element->id_module, $parents);
                    $menu_html .= '</ul>';
                }
                
            }
        }
        return $menu_html;
    }*/
	
}