<?php
class PemasukanBB  extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Model_PemasukanBB');

	}



	function index(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_access() == 1){
				$data = array('contents' => 'Dashboard/PemasukanBB/index',
						  'data' => $this->Model_PemasukanBB->tampil_data()->result()
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

	public function to_param_filter(){
    if($this->session->userdata('name_user') and $this->session->userdata('username')){
      if($this->model_user_access->access_access() == 1){


        $tgl_awal = addslashes($this->input->post('tgl_awal'));
        $tgl_akhir = addslashes($this->input->post('tgl_akhir'));

        $for_tgl_awal = date('Y-m-d', strtotime($tgl_awal));
        $for_tgl_akhir = date('Y-m-d', strtotime($tgl_akhir));


        redirect('PemasukanBB/filter/'.$for_tgl_awal.'/'.$for_tgl_akhir);
      }else{
        $this->load->view('Layouts/error-404');
      }
    }else{
      session_destroy();
      redirect('dashboard');
    }
  }

  public function filter($tgl_awal,$tgl_akhir){
    if($this->session->userdata('name_user') and $this->session->userdata('username')){
      if($this->model_user_access->access_access() == 1){

        $for_tgl_awal = date('Y-m-d', strtotime($tgl_awal));
        $for_tgl_akhir = date('Y-m-d', strtotime($tgl_akhir));

        $for_tgl_awal_view = date('m/d/Y', strtotime($tgl_awal));
        $for_tgl_akhir_view = date('m/d/Y', strtotime($tgl_akhir));

        $data_import = $this->db->query("SELECT * FROM import WHERE cast(activation_date as date) BETWEEN '$tgl_awal' AND '$tgl_akhir' ")->result();
		
        $data = array(
                'contents'      => 'Dashboard/PemasukanBB/filter',
                'data_import'       => $data_import,
                'tgl_awal'      => $for_tgl_awal_view,
                'tgl_akhir'     => $for_tgl_akhir_view
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
				$data = array('contents' => 'Dashboard/PemasukanBB/add');
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
				$jenis_dokumen = addslashes($this->input->post('jenis_dokumen'));
				$no_dokumen_pabean = addslashes($this->input->post('no_dokumen_pabean'));
				$tanggal_dokumen_pabean = addslashes($this->input->post('tanggal_dokumen_pabean'));
        $no_seri_barang = addslashes($this->input->post('no_seri_barang'));
        $no_bukti_penerimaan_barang = addslashes($this->input->post('no_bukti_penerimaan_barang'));
        $tanggal_bukti_penerimaan_barang = addslashes($this->input->post('tanggal_bukti_penerimaan_barang'));
        $kode_barang = addslashes($this->input->post('kode_barang'));
        $nama_barang = addslashes($this->input->post('nama_barang'));
        $satuan = addslashes($this->input->post('satuan'));
        $jumlah = addslashes($this->input->post('jumlah'));
        $mata_uang = addslashes($this->input->post('mata_uang'));
        $nilai_barang = addslashes($this->input->post('nilai_barang'));
        $gudang = addslashes($this->input->post('gudang'));
        $penerima_subkontrak = addslashes($this->input->post('penerima_subkontrak'));
        $negara_asal_barang = addslashes($this->input->post('negara_asal_barang'));
        $adjustment = addslashes($this->input->post('adjustment'));
        $username = $this->session->userdata('username');
        $created_at = addslashes(date("Y-m-d H:i:s"));

				$data = array(
							'po_number' => $po_number,
							'jenis_doc' => $jenis_dokumen,
							'dokumen_pabean_no' => $no_dokumen_pabean,
							'tanggal_dokumen_pabean' => $tanggal_dokumen_pabean,
              'no_seri_barang' => $no_seri_barang,
              'no_bukti_penerimaan_barang' => $no_bukti_penerimaan_barang,
              'tanggal_bukti_penerimaan_barang' => $tanggal_bukti_penerimaan_barang,
              'kode_barang' => $kode_barang,
              'nama_barang' => $nama_barang,
              'satuan' => $satuan,
              'jumlah' => $jumlah,
              'mata_uang' => $mata_uang,
              'nilai_barang' => $nilai_barang,
              'gudang' => $gudang,
              'penerima_subkontrak' => $penerima_subkontrak,
              'negara_asal_barang' => $negara_asal_barang,
              'adjustment' => $adjustment,
              'username' => $username,
              'activation_date' => $created_at

							);



				$this->Model_PemasukanBB->input_data($data,'import');

				$this->session->set_flashdata('succeed', 'Data baru telah di simpan.');
				redirect('PemasukanBB');
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
				$where = array('id_import' => $id);
				$this->Model_PemasukanBB->hapus_data($where,'import');

				$this->session->set_flashdata('succeed', 'Satu data telah di hapus.');
				redirect('PemasukanBB');
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
				$where = array('id_import' => $id);
				$data = array( 	'contents' => 'Dashboard/PemasukanBB/edit',
								'data_kbli' => $this->Model_PemasukanBB->edit_data($where,'ref_kbli')->row()
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
				$jenis_dokumen = addslashes($this->input->post('jenis_dokumen'));
				$no_dokumen_pabean = addslashes($this->input->post('no_dokumen_pabean'));
				$tanggal_dokumen_pabean = addslashes($this->input->post('tanggal_dokumen_pabean'));
        $no_seri_barang = addslashes($this->input->post('no_seri_barang'));
        $no_bukti_penerimaan_barang = addslashes($this->input->post('no_bukti_penerimaan_barang'));
        $tanggal_bukti_penerimaan_barang = addslashes($this->input->post('tanggal_bukti_penerimaan_barang'));
        $kode_barang = addslashes($this->input->post('kode_barang'));
        $nama_barang = addslashes($this->input->post('nama_barang'));
        $satuan = addslashes($this->input->post('satuan'));
        $jumlah = addslashes($this->input->post('jumlah'));
        $mata_uang = addslashes($this->input->post('mata_uang'));
        $nilai_barang = addslashes($this->input->post('nilai_barang'));
        $gudang = addslashes($this->input->post('gudang'));
        $penerima_subkontrak = addslashes($this->input->post('penerima_subkontrak'));
        $negara_asal_barang = addslashes($this->input->post('negara_asal_barang'));
        $adjustment = addslashes($this->input->post('adjustment'));
        $username = $this->session->userdata('username');
        $created_at = addslashes(date("Y-m-d H:i:s"));

        $data = array(
              'po_number' => $po_number,
              'jenis_doc' => $jenis_dokumen,
              'dokumen_pabean_no' => $no_dokumen_pabean,
              'tanggal_dokumen_pabean' => $tanggal_dokumen_pabean,
              'no_seri_barang' => $no_seri_barang,
              'no_bukti_penerimaan_barang' => $no_bukti_penerimaan_barang,
              'tanggal_bukti_penerimaan_barang' => $tanggal_bukti_penerimaan_barang,
              'kode_barang' => $kode_barang,
              'nama_barang' => $nama_barang,
              'satuan' => $satuan,
              'jumlah' => $jumlah,
              'mata_uang' => $mata_uang,
              'nilai_barang' => $nilai_barang,
              'gudang' => $gudang,
              'penerima_subkontrak' => $penerima_subkontrak,
              'negara_asal_barang' => $negara_asal_barang,
              'adjustment' => $adjustment,
              'username' => $username,
              'activation_date' => $created_at

              );


				$where = array(
								'id_import' => $id
							);


				$this->Model_PemasukanBB->update_data($where,$data,'import');

				$this->session->set_flashdata('succeed', 'Satu data telah di perbarui.');
				redirect('PemasukanBB');
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
								'data_group' =>  $this->Model_PemasukanBB->edit_data($where,'ref_group')->row()
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
