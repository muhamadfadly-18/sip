<?php
class Jenis_dokumen  extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('model_global');	
	}



	function index(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_access() == 1){

				$id_group 	= $this->session->userdata('id_group');
				$where      = array('id_group' => $id_group);

       			$data = array('contents' => 'Dashboard/Jenis_dokumen/index',
						  'data' => $this->model_global->edit_data($where,'ref_dokumen')->result()
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
				$data = array('contents' => 'Dashboard/Jenis_dokumen/add');
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
				$txt1 			= addslashes($this->input->post('txt1'));
				$txt2 			= addslashes($this->input->post('txt2'));
				$id_group 		= $this->session->userdata('id_group');
				$created_at     = addslashes(date("Y-m-d H:i:s"));

				$data = array(
							'dokumen' 		 => $txt1,
							'keterangan' => $txt2,
							'created_at' => $created_at,
							'id_group' 	 => $id_group
							);



				$this->model_global->input_data($data,'ref_dokumen');
				//log
			
				$assign_type= '';
				activity_log("Master Data -> Jenis_dokumen", "Menambah data Jenis_dokumen", $txt1, $assign_type);
		 		$this->session->set_flashdata('succeed','Sukses, Satu data telah berhasil disimpan.');
				redirect('Jenis_dokumen');
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
				$where = array('id_dokumen' => $id);
				$this->model_global->hapus_data($where,'ref_dokumen');

				$this->session->set_flashdata('succeed', 'Satu Data  telah di hapus.');
				//log
				$assign_to  = '';
				$assign_type= '';
				activity_log("Master Data -> Jenis_dokumen", "Menghapus data Jenis_dokumen", $id, $assign_to, $assign_type);
				$this->session->set_flashdata('succeed','Sukses, Satu data telah berhasil dihapus.');
				redirect('Jenis_dokumen');
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
				$where = array('id_dokumen' => $id);
				$data = array( 	'contents' => 'Dashboard/Jenis_dokumen/edit',
								'data' => $this->model_global->edit_data($where,'ref_dokumen')->row()
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

				$txt1 			= addslashes($this->input->post('txt1'));
				$txt2 			= addslashes($this->input->post('txt2'));
				$modified_at     = addslashes(date("Y-m-d H:i:s"));

				$data = array(
							'dokumen' 		  => $txt1,
							'keterangan'  => $txt2,
							'modified_at' => $modified_at
							);

				$where = array(
								'id_dokumen' => $id
							);


				$this->model_global->update_data($where,$data,'ref_dokumen');
				$assign_type= '';
				activity_log("Master Data -> Jenis_dokumen", "Mengubah data Jenis_dokumen", $txt1, $assign_type);	
				$this->session->set_flashdata('succeed','Sukses, Satu data telah berhasil diperbaharui.');
				redirect('Jenis_dokumen');
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
