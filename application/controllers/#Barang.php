<?php
class Barang  extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('model_global');	
	}



	function index(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_access() == 1){

				$id_group 	= $this->session->userdata('id_group');
				$where      = array('id_group' => $id_group);

       			$data = array('contents' => 'Dashboard/Barang/index',
						  'data' => $this->model_global->edit_data($where,'barang')->result()
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
				$kategori_barang    = $this->model_global->getAll('ref_kategori')->result();
				$satuan           	= $this->model_global->getAll('ref_satuan')->result();

				$data = array('contents' => 'Dashboard/Barang/add',
							'kategori_barang' => $kategori_barang,
							'satuan' => $satuan

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
				$kode_barang 	= addslashes($this->input->post('kode_barang'));
				$nama_barangg 	= addslashes($this->input->post('nama_barangg'));
				$jenis 			= addslashes($this->input->post('jenis'));
				$kategori 		= addslashes($this->input->post('kategori'));
				$satuan 		= addslashes($this->input->post('satuan'));
				$spesifikasi 	= addslashes($this->input->post('spesifikasi'));
				$keterangan 	= addslashes($this->input->post('keterangan'));
				$id_group 		= $this->session->userdata('id_group');
				$created_at     = addslashes(date("Y-m-d H:i:s"));

				$data = array(
							'id_barang' 	=> $kode_barang,
							'nama_brg' 	 	=> $nama_barangg,
							'id_jenis'   	=> $jenis,
							'id_kategori' 	=> $kategori,
							'id_unit' 		=> $satuan,
							'spesifikasi' 	=> $spesifikasi,
							'keterangan' 	=> $keterangan,
							'created_at' 	=> $created_at,
							'id_group' 	 	=> $id_group
							);



				$this->model_global->input_data($data,'barang');
				//log
			
				$assign_type= '';
				activity_log("Master Data -> Barang", "Menambah data Barang", $id_group, $assign_type);
		 		$this->session->set_flashdata('succeed','Sukses, Satu data telah berhasil disimpan.');
				redirect('Barang');
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
				$where = array('id_barang' => $id);
				$this->model_global->hapus_data($where,'barang');

				$this->session->set_flashdata('succeed', 'Satu Data  telah di hapus.');
				//log
				$id_group 		= $this->session->userdata('id_group');
				$assign_type= '';
				activity_log("Master Data -> Barang", "Menghapus data Barang", $id, $id_group, $assign_type);
				$this->session->set_flashdata('succeed','Sukses, Satu data telah berhasil dihapus.');
				redirect('Barang');
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
				$where = array('id_barang' => $id);
				$kategori_barang    = $this->model_global->getAll('ref_kategori')->result();
				$satuan           	= $this->model_global->getAll('ref_satuan')->result();
				$data = array( 	'contents' => 'Dashboard/Barang/edit',
								'data' => $this->model_global->edit_data($where,'barang')->row(),
								'kategori_barang' => $kategori_barang,
								'satuan' => $satuan
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

				$kode_barang 	= addslashes($this->input->post('kode_barang'));
				$nama_barangg 	= addslashes($this->input->post('nama_barangg'));
				$jenis 			= addslashes($this->input->post('jenis'));
				$kategori 		= addslashes($this->input->post('kategori'));
				$satuan 		= addslashes($this->input->post('satuan'));
				$spesifikasi 	= addslashes($this->input->post('spesifikasi'));
				$keterangan 	= addslashes($this->input->post('keterangan'));
				$modified_at    = addslashes(date("Y-m-d H:i:s"));
				$id_group 		= $this->session->userdata('id_group');

				$data = array(
							'nama_brg' 	 	=> $nama_barangg,
							'id_jenis'   	=> $jenis,
							'id_kategori' 	=> $kategori,
							'id_unit' 		=> $satuan,
							'spesifikasi' 	=> $spesifikasi,
							'keterangan' 	=> $keterangan,
							'update_at' => $modified_at
							);

				$where = array(
								'id_barang' => $id
							);


				$this->model_global->update_data($where,$data,'barang');
				$assign_type= '';
				activity_log("Master Data -> Barang", "Mengubah data Barang", $id_group, $assign_type);	
				$this->session->set_flashdata('succeed','Sukses, Satu data telah berhasil diperbaharui.');
				redirect('Barang');
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
