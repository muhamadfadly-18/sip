<?php
class Register  extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Model_Register');

	}



	function index(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_access() == 1){
				$data = array('contents' => 'Dashboard/V_Register/index',
						  'data' => $this->Model_Register->tampil_data()->result()
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
				$data = array('contents' => 'Dashboard/V_Register/add');
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
				$txt7 = addslashes($this->input->post('txt7'));
				$txt8 = addslashes($this->input->post('txt8'));
				$txt9 = addslashes($this->input->post('txt9'));
				$txt10 = addslashes($this->input->post('txt10'));
				$txt11 = addslashes($this->input->post('txt11'));
				$txt12 = addslashes($this->input->post('txt12'));
				$txt13 = addslashes($this->input->post('txt13'));
				$txt14 = addslashes($this->input->post('txt14'));
				$txt15 = addslashes($this->input->post('txt15'));
				$txt16 = addslashes($this->input->post('txt16'));
				$txt17 = addslashes($this->input->post('txt17'));
				$txt18 = addslashes($this->input->post('txt18'));
				$txt19 = addslashes($this->input->post('txt19'));
				$txt20 = addslashes($this->input->post('txt20'));
				$txt21 = addslashes($this->input->post('txt21'));
				$txt22 = addslashes($this->input->post('txt22'));
				$txt23 = addslashes($this->input->post('txt23'));
				$txt24 = addslashes($this->input->post('txt24'));
				$txt25 = addslashes($this->input->post('txt25'));
				$txt26 = addslashes($this->input->post('txt26'));
				$txt27 = addslashes($this->input->post('txt27'));
				$txt28 = addslashes($this->input->post('txt28'));
				$txt29 = addslashes($this->input->post('txt29'));

        $created_at = addslashes(date("Y-m-d H:i:s"));
        $modified_at = addslashes(date("Y-m-d H:i:s"));


				$data = array(
							'no_job_order' => $txt1,
							'tanggal_job_order' => $txt2,
							'no_sail_in_plan' => $txt3,
							'tanggal_sail_in_plan' => $txt4,
							'no_sail_out_plan' => $txt5,
							'tanggal_sail_out_plan' => $txt6,
							'nama_kapal' => $txt7,
							'no_imo_vessel' => $txt8,
							'id_type_vessel' => $txt9,
							'jml_crew' => $txt10,
							'grt' => $txt11,
							'loa' => $txt12,
							'actual_muatan' => $txt13,
							'id_jenis_cargo' => $txt14,
							'cargo_type' => $txt15,
							'id_activity' => $txt16,
							'id_sts_operator' => $txt17,
							'nama_agen_marketing' => $txt18,
							'local_agen' => $txt19,
							'pemilik_vessel' => $txt20,
							'call_sign' => $txt21,
							'actual_date_of_arrival' => $txt22,
							'actual_time_of_arrival' => $txt23,
							'estimate_date_of_depart' => $txt24,
							'estimate_time_of_depart' => $txt25,
							'cargo_no' => $txt26,
							'next_port' => $txt27,
							'last_port' => $txt28,
							'id_kurs' => $txt29,

              'created_at' => $created_at,
              'modified_at' => $modified_at
							);



				$this->Model_Register->input_data($data,'ref_register_vessel');

				$this->session->set_flashdata('succeed', 'Data baru telah di simpan.');
				redirect('Register');
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
				$where = array('id_reg_vessel' => $id);
				$this->Model_Register->hapus_data($where,'ref_register_vessel');

				$this->session->set_flashdata('succeed', 'Satu Data  telah di hapus.');
				redirect('Register');
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
								'data' => $this->Model_Register->edit_data($where,'subkontrak')->row()
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


				$this->Model_Register->update_data($where,$data,'subkontrak');

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
