<?php
class VI  extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Model_VI');

	}



	function index(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_access() == 1){
				$data = array('contents' => 'Dashboard/V_VI/index',
						  'data' => $this->Model_VI->tampil_data()->result()
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
				$data = array('contents' => 'Dashboard/V_VI/add');
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
				$po_number = addslashes($this->input->post('po_number'));
				$bukti_pengeluaran_no = addslashes($this->input->post('bukti_pengeluaran_no'));
				$tanggal_subkontrak = addslashes($this->input->post('tanggal_subkontrak'));
				$kode_barang = addslashes($this->input->post('kode_barang'));
				$nama_barang = addslashes($this->input->post('nama_barang'));
				$satuan = addslashes($this->input->post('satuan'));
				$disubkontrakkan = addslashes($this->input->post('disubkontrakkan'));
				$penerima_subkontrak = addslashes($this->input->post('penerima_subkontrak'));


				$data = array(
							'po_number' => $po_number,
							'bukti_pengeluaran_no' => $bukti_pengeluaran_no,
							'tanggal_subkontrak' => $tanggal_subkontrak,
							'kode_barang' => $kode_barang,
							'nama_barang' => $nama_barang,
							'satuan' => $satuan,
							'disubkontrakkan' => $disubkontrakkan,
							'penerima_subkontrak' => $penerima_subkontrak
							);



				$this->Model_VI->input_data($data,'subkontrak');

				$this->session->set_flashdata('succeed', 'Data baru telah di simpan.');
				redirect('SubKontrak');
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
				$where = array('id_subkontrak' => $id);
				$this->Model_VI->hapus_data($where,'subkontrak');

				$this->session->set_flashdata('succeed', 'Satu Data  telah di hapus.');
				redirect('SubKontrak');
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
				$where = array('id_subkontrak' => $id);
				$data = array( 	'contents' => 'Dashboard/SubKontrak/edit',
								'data' => $this->Model_VI->edit_data($where,'subkontrak')->row()
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

				$po_number = addslashes($this->input->post('po_number'));
				$bukti_pengeluaran_no = addslashes($this->input->post('bukti_pengeluaran_no'));
				$tanggal_subkontrak = addslashes($this->input->post('tanggal_subkontrak'));
				$kode_barang = addslashes($this->input->post('kode_barang'));
				$nama_barang = addslashes($this->input->post('nama_barang'));
				$satuan = addslashes($this->input->post('satuan'));
				$disubkontrakkan = addslashes($this->input->post('disubkontrakkan'));
				$penerima_subkontrak = addslashes($this->input->post('penerima_subkontrak'));


				$data = array(
							'po_number' => $po_number,
							'bukti_pengeluaran_no' => $bukti_pengeluaran_no,
							'tanggal_subkontrak' => $tanggal_subkontrak,
							'kode_barang' => $kode_barang,
							'nama_barang' => $nama_barang,
							'satuan' => $satuan,
							'disubkontrakkan' => $disubkontrakkan,
							'penerima_subkontrak' => $penerima_subkontrak
							);

				$where = array(
								'id_subkontrak' => $id
							);


				$this->Model_VI->update_data($where,$data,'subkontrak');

				$this->session->set_flashdata('succeed', 'Satu Data telah di perbarui.');
				redirect('SubKontrak');
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
