<?php
class Kurs  extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Model_Kurs');

	}



	function index(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_access() == 1){
				$data = array('contents' => 'Dashboard/V_Kurs/index',
						  'data' => $this->Model_Kurs->tampil_data()->result()
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
				$data = array('contents' => 'Dashboard/V_Kurs/add');
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
				$kurs 		 = addslashes($this->input->post('kurs'));
        		$mata_uang 	 = addslashes($this->input->post('mata_uang'));
				$create_at 	 = addslashes(date("Y-m-d H:i:s"));
				$id_group 	= $this->session->userdata('id_group');

				$data = array(
					'kurs' 		 => $kurs,
              		'mata_uang'  => $mata_uang,
              		'created_at' => $create_at
				);

				$this->Model_Kurs->input_data($data,'ref_kurs');

				$assign_type= '';
				activity_log("Master Data -> Kurs", "Menambah data Kurs", $id_group, $assign_type);

				$this->session->set_flashdata('succeed', 'Data baru telah di simpan.');
				redirect('Kurs');
			}else{
				$this->load->view('Layouts/error-404');
			}
		}else{
			session_destroy();
			redirect('dashboard');
		}
	}

	public function delete($id){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_delete() == 1){
				$where = array('id_kurs' => $id);
				$this->Model_Kurs->hapus_data($where,'ref_kurs');
				$id_group 	= $this->session->userdata('id_group');
				$assign_type= '';
				activity_log("Master Data -> Kurs", "Menghapus data Kurs", $id_group, $assign_type);

				$this->session->set_flashdata('succeed', 'Satu Data  telah di hapus.');
				redirect('Kurs');
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
				$where = array('id_kurs' => $id);
				$data = array( 	'contents' => 'Dashboard/V_Kurs/edit',
								'data' => $this->Model_Kurs->edit_data($where,'ref_kurs')->row()
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
	

	// public function update($id){

	// 	if($this->session->userdata('name_user') and $this->session->userdata('username')){
	// 		if($this->model_user_access->access_edit() == 1){

	// 			$kurs 		 = addslashes($this->input->post('kurs'));
    //     		$mata_uang 	 = addslashes($this->input->post('mata_uang'));
	// 			$create_at 	 = addslashes(date("Y-m-d H:i:s"));
	// 			$id_group 	= $this->session->userdata('id_group');

	// 			$data = array(
	// 				'kurs' 		 => $kurs,
    //           		'mata_uang'  => $mata_uang,
    //           		'modified_at' => $create_at
	// 			);

	// 			$where = array(
	// 							'id_kurs' => $id
	// 						);

	// 			$this->Model_Kurs->update_data($where,$data,'ref_kurs');

	// 			$assign_type= '';
	// 			activity_log("Master Data -> Kurs", "Mengubah data Kurs", $id_group, $assign_type);

	// 			$this->session->set_flashdata('succeed', 'Satu Data telah di perbarui.');
	// 			redirect('kurs');
	// 		}else{
	// 			$this->load->view('Layouts/error-404');
	// 		}
	// 	}else{
	// 		session_destroy();
	// 		redirect('dashboard');
	// 	}
	// }

	public function update($id){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_edit() == 1){
				$kurs 		 = addslashes($this->input->post('kurs'));
				$mata_uang 	 = addslashes($this->input->post('mata_uang'));
				$create_at 	 = addslashes(date("Y-m-d H:i:s"));
				$id_group 	= $this->session->userdata('id_group');

				$data = array(
					'kurs' 		 => $kurs,
					'mata_uang'  => $mata_uang,
					'modified_at' => $create_at
				);

				$where = array(
								'id_kurs' => $id
							);

				$this->Model_Kurs->update_data($where,$data,'ref_kurs');
				$this->session->set_flashdata('success', 'Satu Data telah di perbarui');
				redirect('Kurs');

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
