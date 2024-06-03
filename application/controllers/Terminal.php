<?php
class Terminal  extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('model_global');
 
	}

	
	function index(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_access() == 1){
				$resultData = $this->db->query('SELECT * FROM ref_terminal')->result();

				$data = array(
								'contents' => 'Dashboard/Terminal/index',
								'resultData' => $resultData,
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
	
	public function add(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_add() == 1){
				$resultData = $this->db->query('SELECT * FROM ref_terminal')->result();

				$data = array(
							'contents' => 'Dashboard/Terminal/add',
							'resultData' => $resultData,
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

	public function add_action(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_add() == 1){

				$terminal = addslashes($this->input->post('terminal'));
				// $status = addslashes($this->input->post('status'));

				$data = array(
							'terminal' => $terminal,
							'status' => 1,
                            'id_group' => 1,
				);


                $this->model_global->input_data($data,'ref_terminal');

				$this->session->set_flashdata('succeed', 'Data pengguna baru telah di simpan.');
				redirect('Terminal');

			}else{
				$this->load->view('Layouts/error-404');
			}
		}else{
			session_destroy();
			redirect('dashboard');
		}
	}

	public function edit($id){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_edit() == 1){
				$where = array('id_terminal' => $id);

				$data = array( 	'contents' => 'Dashboard/Terminal/edit',
								'data_terminal' => $this->model_global->edit_data($where,'ref_terminal')->row(),
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

	public function update($id){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_edit() == 1){

				$terminal = addslashes($this->input->post('terminal'));
				// $status = addslashes($this->input->post('status'));

				$data = array(
							'terminal' => $terminal,
							'status' => 1,
							'id_group' => 1,
				);

					$where = array(
								'id_terminal' => $id
							);
					
					$this->model_global->update_data($where,$data,'ref_terminal');

					$this->session->set_flashdata('succeed', 'Satu data pengguna telah di perbarui.');
					redirect('Terminal');
				}
				

		}else{
			session_destroy();
			redirect('dashboard');
		}
	}

	
	function detail($id){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_access() == 1){

				$where = array('id_terminal' => $id);
				$data_terminal = $this->model_global->edit_data($where,'ref_terminal_tank')->result();

				$data = array(
                    'contents' => 'Dashboard/Terminaltank/index',
					'id_terminal' => $id,
                    'data_terminal' => $data_terminal
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


	public function delete($id){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_delete() == 1){
				$where = array('id_terminal' => $id);

				$this->model_global->hapus_data($where,'ref_terminal');

				$this->session->set_flashdata('succeed', 'Satu data pengguna telah di hapus.');
				redirect('Terminal');
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
