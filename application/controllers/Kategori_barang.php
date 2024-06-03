<?php
class Kategori_barang  extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('model_global');	
	}



	function index(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_access() == 1){

				$id_group 	= $this->session->userdata('id_group');
				$where      = array('id_group' => $id_group);

       			$data = array('contents' => 'Dashboard/Kategori_barang/index',
						  'data' => $this->model_global->edit_data($where,'ref_kategori')->result()
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
				$data = array('contents' => 'Dashboard/Kategori_barang/add');
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
							'kategori' 		 => $txt1,
							'keterangan' => $txt2,
							'created_at' => $created_at,
							'id_group' 	 => $id_group
							);



				$this->model_global->input_data($data,'ref_kategori');
				//log
			
				$assign_type= '';
				activity_log("Master Data -> Kategori_barang", "Menambah data Kategori_barang", $txt1, $assign_type);
		 		$this->session->set_flashdata('succeed','Sukses, Satu data telah berhasil disimpan.');
				redirect('Kategori_barang');
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
				$where = array('id_kategori' => $id);
				$this->model_global->hapus_data($where,'ref_kategori');

				$this->session->set_flashdata('succeed', 'Satu Data  telah di hapus.');
				//log
				$assign_to  = '';
				$assign_type= '';
				activity_log("Master Data -> Kategori_barang", "Menghapus data Kategori_barang", $id, $assign_to, $assign_type);
				$this->session->set_flashdata('succeed','Sukses, Satu data telah berhasil dihapus.');
				redirect('Kategori_barang');
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
				$where = array('id_kategori' => $id);
				$data = array( 	'contents' => 'Dashboard/Kategori_barang/edit',
								'data' => $this->model_global->edit_data($where,'ref_kategori')->row()
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
							'kategori' 		  => $txt1,
							'keterangan'  => $txt2,
							'modified_at' => $modified_at
							);

				$where = array(
								'id_kategori' => $id
							);


				$this->model_global->update_data($where,$data,'ref_kategori');
				$assign_type= '';
				activity_log("Master Data -> Kategori_barang", "Mengubah data Kategori_barang", $txt1, $assign_type);	
				$this->session->set_flashdata('succeed','Sukses, Satu data telah berhasil diperbaharui.');
				redirect('Kategori_barang');
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
