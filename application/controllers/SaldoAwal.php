<?php
class SaldoAwal extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Model_SaldoAwal');

	}


	function index(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_access() == 1){
				$data = array('contents' => 'Dashboard/SaldoAwal/index',
						  'data' => $this->Model_SaldoAwal->tampil_data()->result()
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


	public function show_NR(){
		$sub1 = $this->input->get("sub1");

		$where = array('no_rek' => $sub1);
		$hasil = $this->Model_SaldoAwal->edit_data($where,'rekening')->row();

		echo json_encode($hasil->nama_rek);
	}






	public function add(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_add() == 1){
				$data = array('contents' => 'Dashboard/SaldoAwal/add');
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
				$periode = addslashes($this->input->post('periode'));
				$no_rek = addslashes($this->input->post('no_rek'));
				$debet = addslashes($this->input->post('debet'));
				$kredit = addslashes($this->input->post('kredit'));
        $username = $this->session->userdata('username');
				$created_at = addslashes(date("Y-m-d"));

				$data = array(
							'periode' => $periode,
							'no_rek' => $no_rek,
							'debet' => $debet,
							'kredit' => $kredit,
              'tgl_insert' => $created_at,
              'username' => $username
							);



				$this->Model_SaldoAwal->input_data($data,'saldo_awal');

				$this->session->set_flashdata('succeed', 'Data pengguna baru telah di simpan.');
				redirect('SaldoAwal');
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
				$this->Model_SaldoAwal->hapus_data($where,'saldo_awal');

				$this->session->set_flashdata('succeed', 'Satu Data telah di hapus.');
				redirect('SaldoAwal');
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
				$where = array('kbli_id' => $id);
				$data = array( 	'contents' => 'Dashboard/Kbli_v/edit',
								'data_kbli' => $this->Model_SaldoAwal->edit_data($where,'ref_kbli')->row()
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

				$kode_kbli = addslashes($this->input->post('kode_kbli'));
				$judul_kbli = addslashes($this->input->post('judul_kbli'));
				$deskripsi_kbli = addslashes($this->input->post('deskripsi_kbli'));
				$jenis_kbli = addslashes($this->input->post('jenis_kbli'));

				$modified_at = addslashes(date("Y-m-d H:i:s"));

				$data = array(
								'kode' => $kode_kbli,
								'judul' => $judul_kbli,
								'deskripsi' => $deskripsi_kbli,
								'jenis_kbli' => $jenis_kbli,
								'modified_at' => $modified_at
								);

				$where = array(
								'kbli_id' => $id
							);


				$this->Model_SaldoAwal->update_data($where,$data,'ref_kbli');

				$this->session->set_flashdata('succeed', 'Satu data KBLI telah di perbarui.');
				redirect('kbli');
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

				$where = array('no_rek' => $id);
				$data = array( 	'contents' => 'Dashboard/User_access/manage',
								'data_user_access' => $this->model_user_access->edit_data($where,'ref_user_access')->result(),
								'data_group' =>  $this->Model_SaldoAwal->edit_data($where,'ref_group')->row()
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

	public function update_manage($no_rek){

		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_edit() == 1){


				$id_access = array('SaldoAwal' => $no_rek);
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
