<?php
class User  extends CI_Controller{
 
	function __construct(){
		parent::__construct();	
		$this->load->model('model_user_access');	
 
	}

	public function manage($id){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_edit() == 1){
				$where = array('id_group' => $id);
				$data = array( 	'contents' => 'Dashboard/User_access/manage',
								'data_user_access' => $this->model_user_access->edit_data($where,'ref_user_access')->row()
								);
				$this->load->view('Layouts/warper', $data);
			}else{
				$this->load->view('Layouts/error-404');
			}
		}else{
			session_destroy();
			redirect('dashboard');
		}
	}

	public function update($id_user){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_edit() == 1){
				$id_group = addslashes($this->input->post('id_group'));
				$name_user = addslashes($this->input->post('name_user'));
				$username = addslashes($this->input->post('username'));
				$password = addslashes($this->input->post('password'));
				$modified_at = addslashes(date("Y-m-d H:i:s"));
		 
				$data = array(
								'id_group' => $id_group,
								'name_user' => $name_user,
								'username' => $username,
								'password' => $password,
								'modified_at' => $modified_at
								);

				$where = array(
								'id_user' => $id_user
							);
			 
				$this->model_user->update_data($where,$data,'ref_user');
				redirect('user');
			}else{
				$this->load->view('Layouts/error-404');
			}
		}else{
			session_destroy();
			redirect('dashboard');
		}
	}
	
 
}
?>
