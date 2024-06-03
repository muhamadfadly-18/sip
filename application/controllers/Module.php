<?php
class Module  extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('model_module');
 
	}
 
	function index(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			
				$data = array('contents' => 'Dashboard/Modules/index',
						  'data_module' => $this->model_module->tampil_data()->result()
							);
				$this->load->view('Layouts/warper', $data);
			
		}else{
			session_destroy();
			redirect('dashboard');
		}
	}

	public function add(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
				$data = array('contents' => 'Dashboard/Modules/add');
				$this->load->view('Layouts/warper', $data);
			
		}else{
			session_destroy();
			redirect('dashboard');
		}
	}

	public function add_action(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
				$id_parent = addslashes($this->input->post('id_parent'));
				$name_module = addslashes($this->input->post('name_module'));
				if($this->input->post('id_parent') == 0){
					$name_controller = "#";
				}else{
					$name_controller = addslashes($this->input->post('name_controller'));
				}
				
				$icon = addslashes($this->input->post('icon'));
				$sort = addslashes($this->input->post('sort'));
				$created_at = addslashes(date("Y-m-d H:i:s"));
		 
		 		$count_user_access = $this->db->select('id_group, COUNT(id_group) AS count', false)
                  ->from('ref_user_access')
                  ->group_by('ref_user_access.id_group')
                  ->get()->result();

               

				$data = array(
					'id_parent' => $id_parent,
					'name_module' => $name_module,
					'name_controller' => $name_controller,
					'icon' => $icon,
					'sort' => $sort,
					'created_at' => $created_at
					);

				$this->model_module->input_data($data,'ref_module');
				if($this->db->insert_id() != null){
				 $id_module = $this->db->insert_id();
					foreach($count_user_access as $value){
	                	$array = array(
	                					'id_group' => $value->id_group,
	                					'id_module'=> $id_module,
	                					'id_parent' => $id_parent
	                		);
	                	print_r($id_module);
	                	$this->model_module->input_data_user_access($array,'ref_user_access');
	                }
               /* print_r($id_module);*/
            	}
            	

            	$this->session->set_flashdata('succeed', 'Data modul baru telah tersimpan.');
				redirect('module');
			
		}else{
			session_destroy();
			redirect('dashboard');
		}
	}

	public function delete($id){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			
				$where = array('id_module' => $id);
				$where_up = array('id_parent' => $id);

				$data = array(
								'id_parent' => "0"
								);
				$this->model_module->hapus_data_user_access($where,'ref_user_access');
				$this->model_module->hapus_data($where,'ref_module',$where_up,$data);

				$this->session->set_flashdata('succeed', 'Satu data module berhasil dihapus.');
				redirect('module');
			
		}else{
			session_destroy();
			redirect('dashboard');
		}
	}

	public function edit($id){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			
				$where = array('id_module' => $id);
				$data = array( 	'contents' => 'Dashboard/Modules/edit',
								'data_module' => $this->model_module->edit_data($where,'ref_module')->row()
								);
				$this->load->view('Layouts/warper', $data);
			
		}else{
			session_destroy();
			redirect('dashboard');
		}
	}

	public function update($id_module){

		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			
				$name_module = addslashes($this->input->post('name_module'));
				$name_controller = addslashes($this->input->post('name_controller'));
				$icon = addslashes($this->input->post('icon'));
				$sort = addslashes($this->input->post('sort'));
				$modified_at = addslashes(date("Y-m-d H:i:s"));
		 
				$data = array(
								'name_module' => $name_module,
								'name_controller' => $name_controller,
								'icon' => $icon,
								'sort' => $sort,
								'modified_at' => $modified_at
								);

				$where = array(
								'id_module' => $id_module
							);
			 
				$this->model_module->update_data($where,$data,'ref_module');

				$this->session->set_flashdata('succeed', 'Satu data module baru saja diperbarui.');
				redirect('module');
			
		}else{
			session_destroy();
			redirect('dashboard');
		}
	}
	
 
}
?>
