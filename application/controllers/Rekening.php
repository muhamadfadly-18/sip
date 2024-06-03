<?php
class Rekening extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('Model_Rekening');
 
	}

	
 
	function index(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_access() == 1){
				$data = array('contents' => 'Dashboard/Rekening/index',
						  'data' => $this->Model_Rekening->tampil_data()->result()
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
				$data = array('contents' => 'Dashboard/Rekening/add');
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
				$no_rek = addslashes($this->input->post('no_rek'));
				$induk = addslashes($this->input->post('induk'));
				$nama_rek = addslashes($this->input->post('nama_rek'));
				//$jenis = addslashes($this->input->post('jenis_kbli'));
				//$created_at = addslashes(date("Y-m-d H:i:s"));
		 
				$data = array(
							'no_rek' => $no_rek,
							'induk' => $induk,
							'nama_rek' => $nama_rek,
							);

							
							
				$this->Model_Rekening->input_data($data,'Rekening');

				$this->session->set_flashdata('succeed', 'Data Account telah di simpan.');
				redirect('Rekening');
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
				$where = array('no_rek' => $id);
				$this->Model_Rekening->hapus_data($where,'Rekening');

				$this->session->set_flashdata('succeed', 'Satu data Account telah di hapus.');
				redirect('Rekening');
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
				$where = array('no_rek' => $id);
				$data = array( 	'contents' => 'Dashboard/Rekening/edit',
								'Rekening' => $this->Model_Rekening->edit_data($where,'Rekening')->row()
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

				$no_rek = addslashes($this->input->post('no_rek'));
				$induk = addslashes($this->input->post('induk'));
				$nama_rek = addslashes($this->input->post('nama_rek'));
				$data = array(
								'no_rek' => $no_rek,
								'induk' => $induk,
								'nama_rek' => $nama_rek,
								);

				$where = array(
								'no_rek' => $id
							);
			 
							
				$this->Model_Rekening->update_data($where,$data,'Rekening');

				$this->session->set_flashdata('succeed', 'Satu data Account telah di perbarui.');
				redirect('Rekening');
			}else{
				$this->load->view('Layouts/error-404');
			}
		}else{
			session_destroy();
			redirect('dashboard');
		}
	}

	/*FUNCTION USER ACCESS*/

	public function manage($id){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_edit() == 1){
			
				$where = array('kode_kbli' => $id);
				$data = array( 	'contents' => 'Dashboard/User_access/manage',
								'data_user_access' => $this->model_user_access->edit_data($where,'ref_user_access')->result(),
								'data_group' =>  $this->Model_Rekening->edit_data($where,'ref_group')->row()
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

	public function update_manage($kode_kbli){

		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_edit() == 1){

				
				$id_access = array('kode_kbli' => $kode_kbli);
		 		$data_user_access = $this->model_user_access->edit_data($id_access,'ref_user_access')->result();
		 		$hitung_data = count($data_user_access);

		 		for($i=1; $i <= $hitung_data; $i++){
		 			$id_user_access = addslashes($this->input->post('id_user_access'.$i));
		 			$akses = addslashes($this->input->post('akses'.$i));
					$tambah = addslashes($this->input->post('tambah'.$i));
					$lihat = addslashes($this->input->post('lihat'.$i));
					$edit = addslashes($this->input->post('edit'.$i));
					$hapus = addslashes($this->input->post('hapus'.$i));
					$ex_excel = addslashes($this->input->post('ex_excel'.$i));
					$ex_pdf = addslashes($this->input->post('ex_pdf'.$i));
					$modified_at = addslashes(date("Y-m-d H:i:s"));

		 			$data = array(
		 						/*'id_user_access' => $id_user_access,*/
								'akses' => $akses,
								'tambah' => $tambah,
								'lihat' => $lihat,
								'edit' => $edit,
								'hapus' => $hapus,
								'ex_excel' => $ex_excel,
								'ex_pdf' => $ex_pdf,
								'modified_at' => $modified_at
								);
		 			$where = array('id_user_access' => $id_user_access);
		 			/*print_r($data);*/

		 			$this->model_user_access->update_data($where,$data,'ref_user_access');
		 		}

		 		$this->session->set_flashdata('succeed', 'Satu data kewenangan telah di kelola.');
				redirect('group');
			}else{
				$this->load->view('Layouts/error-404');
			}
		}else{
			session_destroy();
			redirect('dashboard');
		}
	}

	/*FUNCTION USER ACCESS*/

	
 
}
?>
