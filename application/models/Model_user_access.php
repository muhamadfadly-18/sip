<?php 
 
class Model_user_access extends CI_Model{

    /*function tampil_data(){
        $this->db->order_by("create_at", "desc");
        return $this->db->get('ref_user_access');
    }

    function input_data($data,$table){
        $this->db->insert($table,$data);
    }

    function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }*/

    function edit_data($where,$table){      
        return $this->db->get_where($table,$where);
    }
 
    function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    function access_access()
    {
        foreach ($this->session->userdata('query_menu') as $val) {
            if($val->name_controller == $this->uri->segment(1)){
                $data = $val->akses;
            }
        }
        return $data;
    }

	function access_add()
    {
        foreach ($this->session->userdata('query_menu') as $val) {
            if($val->name_controller == $this->uri->segment(1)){
                $data = $val->tambah;
            }
        }
        return $data;
    }

    function access_view()
    {
        foreach ($this->session->userdata('query_menu') as $val) {
            if($val->name_controller == $this->uri->segment(1)){
                $data = $val->lihat;
            }
        }
        return $data;
    }

    function access_edit()
    {
        foreach ($this->session->userdata('query_menu') as $val) {
            if($val->name_controller == $this->uri->segment(1)){
                $data = $val->edit;
            }
        }
        return $data;
    }

    function access_delete()
    {
        foreach ($this->session->userdata('query_menu') as $val) {
            if($val->name_controller == $this->uri->segment(1)){
                $data = $val->hapus;
            }
        }
        return $data;
    }

    function access_ex_excel()
    {
        foreach ($this->session->userdata('query_menu') as $val) {
            if($val->name_controller == $this->uri->segment(1)){
                $data = $val->ex_excel;
            }
        }
        return $data;
    }

    function access_ex_pdf()
    {
        foreach ($this->session->userdata('query_menu') as $val) {
            if($val->name_controller == $this->uri->segment(1)){
                $data = $val->ex_pdf;
            }
        }
        return $data;
    }

    function table_checkbox($array,$parent_id = 0,$parents = array())
    {
        
        static $a = 0;
        $pusher = "-----";

        $showPusher = str_repeat($pusher,$a);

        if($parent_id==0)
        {
            foreach ($array as $element) {
                if (($element->id_parent != 0) && !in_array($element->id_parent,$parents)) {
                    $parents[] = $element->id_parent;
                }
            }
        }
        $menu_html = '';
        $i=1;
        foreach($array as $element)
        {
            $javascript = '<script>
                            document.getElementById("checkParent'.$element->id_user_access.'").onclick = function() {
                            // access properties using this keyword
                            if (this.checked) {
                                // if checked ...

                                // Akses ...
                                document.getElementById("checkAdd'.$element->id_user_access.'").checked = true;
                                document.getElementById("checkAdd'.$element->id_user_access.'").disabled = false;
                                // Akses ...

                                // Add ...
                                document.getElementById("checkView'.$element->id_user_access.'").checked = true;
                                document.getElementById("checkView'.$element->id_user_access.'").disabled = false;
                                // Add ...

                                // View ...
                                document.getElementById("checkEdit'.$element->id_user_access.'").checked = true;
                                document.getElementById("checkEdit'.$element->id_user_access.'").disabled = false;
                                // View ...

                                // Edit ...
                                document.getElementById("checkDelete'.$element->id_user_access.'").checked = true;
                                document.getElementById("checkDelete'.$element->id_user_access.'").disabled = false;
                                // Edit ...

                                // Delete ...
                                document.getElementById("checkExExcel'.$element->id_user_access.'").checked = true;
                                document.getElementById("checkExExcel'.$element->id_user_access.'").disabled = false;
                                // Delete ...

                                // Ex.Excel ...
                                document.getElementById("checkExPdf'.$element->id_user_access.'").checked = true;
                                document.getElementById("checkExPdf'.$element->id_user_access.'").disabled = false;
                                // Ex.Excel ...
                            } else {
                                // if not checked ...
                                // Akses ...
                                document.getElementById("checkAdd'.$element->id_user_access.'").checked = false;
                                document.getElementById("checkAdd'.$element->id_user_access.'").disabled = true;
                                // Akses ...

                                // Add ...
                                document.getElementById("checkView'.$element->id_user_access.'").checked = false;
                                document.getElementById("checkView'.$element->id_user_access.'").disabled = true;
                                // Add ...

                                // View ...
                                document.getElementById("checkEdit'.$element->id_user_access.'").checked = false;
                                document.getElementById("checkEdit'.$element->id_user_access.'").disabled = true;
                                // View ...

                                // Edit ...
                                document.getElementById("checkDelete'.$element->id_user_access.'").checked = false;
                                document.getElementById("checkDelete'.$element->id_user_access.'").disabled = true;
                                // Edit ...

                                // Delete ...
                                document.getElementById("checkExExcel'.$element->id_user_access.'").checked = false;
                                document.getElementById("checkExExcel'.$element->id_user_access.'").disabled = true;
                                // Delete ...

                                // Ex.Excel ...
                                document.getElementById("checkExPdf'.$element->id_user_access.'").checked = false;
                                document.getElementById("checkExPdf'.$element->id_user_access.'").disabled = true;
                                // Ex.Excel ...
                            }
                        };
                        </script>';
            if($element->akses == 1){
                $akses = 'checked';
            }else{
                $akses = '';
            }

            if($element->tambah == 1){
                $tambah = 'checked';
            }else{
                $tambah = 'disabled="true"';
            }

            if($element->lihat == 1){
                $view = 'checked';
            }else{
                $view = 'disabled="true"';
            }

            if($element->edit == 1){
                $edit = 'checked';
            }else{
                $edit = 'disabled="true"';
            }

            if($element->hapus == 1){
                $delete = 'checked';
            }else{
                $delete = 'disabled="true"';
            }

            if($element->ex_excel == 1){
                $ex_excel = 'checked';
            }else{
                $ex_excel = 'disabled="true"';
            }

            if($element->ex_pdf == 1){
                $ex_pdf = 'checked';
            }else{
                $ex_pdf = 'disabled="true"';
            }
            
            $name_module = $this->db->query("select name_module from ref_module where id_module = '$element->id_module'")->row();
            $a++;
            if($element->id_parent == $parent_id)
            {
                
                if(in_array($element->id_module,$parents))
                {
                    
                   /* $menu_html .= '<option value="' . $element->id_module . '">'.$element->name_module.'</option>';*/
                    $idParent = "";

                    $checkAdd = '<div class="active">
                                </div>';
                    $checkView = '<div class="active">
                                </div>';
                    $checkEdit = '<div class="active">
                                </div>';
                    $checkDelete = '<div class="active">
                                </div>';
                    $checkExExcel = '<div class="active">
                                </div>';
                    $checkExPdf = '<div class="active">
                                </div>';

                    $menu_html .= '<tr>';
                    $menu_html .= '<td>'.$showPusher.'| '.$name_module->name_module.'</td>';
                    $menu_html .= '<td>
                                    <div class="checkbox-custom">
                                    <input value="'.$element->id_user_access.'" type="hidden" name="id_user_access'.$i.'">
                                        <input value="1" '.$akses.' id="checkParent'.$idParent.'" type="checkbox" name="akses'.$i.'">
                                        <label></label>
                                    </div>
                                   </td>
                                    ';

                    $menu_html .= '<td>'.$checkAdd.'</td>';
                    $menu_html .= '<td>'.$checkView.'</td>';
                    $menu_html .= '<td>'.$checkEdit.'</td>';
                    $menu_html .= '<td>'.$checkDelete.'</td>';
                    $menu_html .= '<td>'.$checkExExcel.'</td>';
                    $menu_html .= '<td>'.$checkExPdf.'</td>';
                }
                else {

                      $idParent = $element->id_user_access;

                $checkAdd = '<div class="checkbox-custom">
                            <input '.$tambah.' value="1" id="checkAdd'.$element->id_user_access.'" type="checkbox" name="tambah'.$i.'">
                            <label></label>
                          </div>';
                $checkView = '<div class="checkbox-custom">
                              <input '.$view.' value="1" id="checkView'.$element->id_user_access.'" type="checkbox" name="lihat'.$i.'">
                              <label></label>
                            </div>';
                $checkEdit = '<div class="checkbox-custom">
                            <input '.$edit.' value="1" id="checkEdit'.$element->id_user_access.'" type="checkbox" name="edit'.$i.'">
                            <label></label>
                          </div>';
                $checkDelete = '<div class="checkbox-custom">
                            <input '.$delete.' value="1" id="checkDelete'.$element->id_user_access.'" type="checkbox" name="hapus'.$i.'">
                            <label></label>
                          </div>';
                $checkExExcel = '<div class="checkbox-custom">
                            <input '.$ex_excel.' value="1" id="checkExExcel'.$element->id_user_access.'" type="checkbox" name="ex_excel'.$i.'">
                            <label></label>
                          </div>';
                $checkExPdf = '<div class="checkbox-custom">
                            <input '.$ex_pdf.' value="1" id="checkExPdf'.$element->id_user_access.'" type="checkbox" name="ex_pdf'.$i.'">
                            <label></label>
                          </div>';

                      $menu_html .= '<tr>';
                      $menu_html .= '<td>'.$showPusher.'| '.$name_module->name_module.'</td>';
                      $menu_html .= '<td>
                                    <div class="checkbox-custom">
                                         <input value="'.$element->id_user_access.'" type="hidden" name="id_user_access'.$i.'">
                                        <input value="1" '.$akses.' id="checkParent'.$idParent.'" type="checkbox" name="akses'.$i.'">
                                        <label></label>
                                    </div>
                                   </td>
                                    ';
                        $menu_html .= '<td>'.$checkAdd.'</td>';
                        $menu_html .= '<td>'.$checkView.'</td>';
                        $menu_html .= '<td>'.$checkEdit.'</td>';
                        $menu_html .= '<td>'.$checkDelete.'</td>';
                        $menu_html .= '<td>'.$checkExExcel.'</td>';
                        $menu_html .= '<td>'.$checkExPdf.'</td>';
                }
                if(in_array($element->id_module,$parents))
                {
                    $menu_html .= $this->table_checkbox($array, $element->id_module, $parents);
                    
                }
                $menu_html .= '</tr>';
                $menu_html .= $javascript;
            }
            $i++;
            --$a;
            
        }
        return $menu_html;
    }


	
}