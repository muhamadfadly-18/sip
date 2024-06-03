<?php
class Client  extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Model_Client');

	}



	function index(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_access() == 1){
				$data = array('contents' => 'Dashboard/V_Client/index',
						  'data' => $this->Model_Client->tampil_data()->result()
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
				$data = array('contents' => 'Dashboard/V_Client/add');
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
				$txt1 = addslashes($this->input->post('txt1'));
				$txt2 = addslashes($this->input->post('txt2'));
				$txt3 = addslashes($this->input->post('txt3'));
				$txt4 = addslashes($this->input->post('txt4'));
				$txt5 = addslashes($this->input->post('txt5'));
				$txt6 = addslashes($this->input->post('txt6'));
				$status = addslashes($this->input->post('status'));
				$jenis = addslashes($this->input->post('jenis'));
			

				$data = array(
							'company_name' => $txt1,
							'address' => $txt2,
							'phone' => $txt3,
							'contact_name' => $txt4,
							'contact_email' => $txt5,
							'contact_phone' => $txt6,
							'status' => $status,
							'jenis' => $jenis,
							'id_group' => $id_group
							);

				$this->Model_Client->input_data($data,'ref_client');
				//log
			
				$assign_type= '';
				activity_log("Master Data -> Client", "Menambah data client", $txt1, $assign_type);
		 
				redirect('Client');
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
				$where = array('id_client' => $id);
				$this->Model_Client->hapus_data($where,'ref_client');

				$this->session->set_flashdata('succeed', 'Satu Data  telah di hapus.');
				//log
				$assign_to  = '';
				$assign_type= '';
				activity_log("Master Data -> Client", "Menghapus data client", $id, $assign_to, $assign_type);
				redirect('Client');
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
				$where = array('id_client' => $id);
				$data = array( 	'contents' => 'Dashboard/V_Client/edit',
								'data' => $this->Model_Client->edit_data($where,'ref_client')->row()
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


				$this->Model_Client->update_data($where,$data,'subkontrak');

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
