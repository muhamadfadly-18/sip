<?php
class STS  extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Model_Sts');
		$this->load->model('Model_global');

	}



	function index(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_access() == 1){
				$data = array('contents' => 'Dashboard/V_Sts/index',
						  'data' => $this->Model_Sts->tampil_data()->result()
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
				$this->setData();
				$data = $this->data;
				$data = array('contents' => 'Dashboard/V_Sts/add');
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
				$status = addslashes($this->input->post('status'));


				$data = array(
							'sts' => $txt1,
							'status' => $status
							);



				$this->Model_Sts->input_data($data,'ref_sts');

				$this->session->set_flashdata('succeed', 'Data baru telah di simpan.');
				redirect('STS');
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
				$where = array('id_sts' => $id);
				$this->Model_Sts->hapus_data($where,'ref_sts');

				$this->session->set_flashdata('succeed', 'Satu Data  telah di hapus.');
				redirect('STS');
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
								'data' => $this->Model_Sts->edit_data($where,'subkontrak')->row()
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


				$this->Model_Sts->update_data($where,$data,'subkontrak');

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

	public function setData() {

		$this->data['nomor']  =  $this->GetDataModel->no_register_vessel();
		// $this->data['cargo_type'] = $this->GetDataModel->getcargo_type();
		// $this->data['oil_type'] = $this->GetDataModel->getoil_type();
		// $this->data['subActivity'] =  $this->GetDataModel->getSubActivitySTS();
		// $this->data['provider'] =  $this->GetDataModel->getProvider();



		// $activityModel = new ActivityModel();
		// $this->data['activity'] = $activityModel->orderBy('id_activity', 'ASC')->findAll();

	}

}
?>
