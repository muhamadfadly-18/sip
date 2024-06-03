<?php
class Subactivity extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('model_global');

	}


	function index(){
		if ($this->session->userdata('name_user') and $this->session->userdata('username')) {
			if ($this->model_user_access->access_access() == 1) {

				$DataSubActivity = $this->db->query("SELECT * FROM ref_subactivity")->result();


				$data = array('contents' => 'Dashboard/Subactivity/index',
								'DataSubActivity' => $DataSubActivity
				);

				$this->load->view('Layouts/warper', $data);
			} else {
				$this->load->view('Layouts/error-404');
			}
		} else {
			session_destroy();
			redirect('dashboard');
		}
	}

	public function add(){
		if ($this->session->userdata('name_user') and $this->session->userdata('username')) {
			if ($this->model_user_access->access_add() == 1) {

				$SelectActivity = $this->db->query("SELECT * FROM ref_activity")->result();

				$data = array('contents' => 'Dashboard/Subactivity/add',
							'SelectActivity' => $SelectActivity
							);


				$this->load->view('Layouts/warper', $data);
			} else {
				$this->load->view('Layouts/error-404');
			}
		} else {
			session_destroy();
			redirect('dashboard');
		}
	}

	public function add_action(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_add() == 1){

				$id_activity = addslashes($this->input->post('id_activity'));
				$nama_subactivity = addslashes($this->input->post('nama_subactivity'));
				$id_user_input = addslashes($this->input->post('id_user'));
				$tgl_input = addslashes(date("Y-m-d H:i:s"));

				$data = array(
								'id_activity' => $id_activity,
								'nama_subactivity' => $nama_subactivity,
								'id_user_input' => $id_user_input,
								'tgl_input' => $tgl_input,
								
				            );

				$this->model_global->input_data($data,'ref_subactivity');
				$this->session->set_flashdata('success', 'Data Sub Activity baru telah di simpan.');
				redirect('subactivity');
				

			}else{
				$this->load->view('Layouts/error-404');
			}
		}else{
			session_destroy();
			redirect('dashboard');
		}
	}

	public function delete($id_subactivity){
    	if($this->session->userdata('name_user') and $this->session->userdata('username')){
      		if($this->model_user_access->access_delete() == 1){

        		$where = array('id_subactivity' => $id_subactivity);
        
		        $this->model_global->hapus_data($where,'ref_subactivity');
		        $this->session->set_flashdata('success', 'Perhatian, Data Sub Activity telah dihapus.');
		        redirect('subactivity');
      
    	}else{
        		$this->load->view('Layouts/error-404');
      		}
    	}else{
      		session_destroy();
      		redirect('dashboard');
    	}
  	}


  	public function edit($id_subactivity){
	    if($this->session->userdata('name_user') and $this->session->userdata('username')){
	      if($this->model_user_access->access_edit() == 1){

	        $where = array('id_subactivity' => $id_subactivity);

			$SelectActivity = $this->db->query("SELECT * FROM ref_activity")->result();

	        $data = array('contents' => 'Dashboard/Subactivity/edit',
	        				'DataSubActivity' => $this->db->query("SELECT * FROM ref_subactivity WHERE id_subactivity = '$id_subactivity'")->row(),
	        				'SelectActivity' => $SelectActivity
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

	public function update($id_subactivity){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_edit() == 1){

				$where = array(
								'id_subactivity' => $id_subactivity
							);

				$id_activity = addslashes($this->input->post('id_activity'));
				$nama_subactivity = addslashes($this->input->post('nama_subactivity'));
				$id_user_update = addslashes($this->input->post('id_user'));
				$tgl_update = addslashes(date("Y-m-d H:i:s"));

				$data = array(
								'id_activity' => $id_activity,
								'nama_subactivity' => $nama_subactivity,
								'id_user_update' => $id_user_update,
								'tgl_update' => $tgl_update,
				            );
			 
				$this->model_global->update_data($where,$data,'ref_subactivity');
				$this->session->set_flashdata('success', 'Data Sub Activity telah di perbarui.');
				redirect('subactivity');

			
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
