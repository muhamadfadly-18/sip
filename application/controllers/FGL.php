<?php
class FGL  extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('Model_PemasukanProduksi');
 		$this->load->model('model_global');
 		
	}

	function index(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_access() == 1){

				$tgl_awal 	= addslashes($this->input->post('tgl_awal'));
				$tgl_akhir 	= addslashes($this->input->post('tgl_akhir'));
				$id_group 	= $this->session->userdata('id_group');

				$for_tgl_awal = date('Y-m-d', strtotime($tgl_awal));
        		$for_tgl_akhir = date('Y-m-d', strtotime($tgl_akhir));

        		if(!empty($tgl_awal)){
					
					$data_real = $this->db->query("SELECT * FROM finish_goods WHERE cast(activation_date as date) BETWEEN '$for_tgl_awal' AND '$for_tgl_akhir' ")->result();
					
				}else{

					$data_real	= $this->Model_PemasukanProduksi->tampil_data()->result();
				}
				
				$data = array('contents' => 'Dashboard/FGL/index',
						  'data' => $data_real
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

	public function export_excel(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_access() == 1){

				$tgl_awal 	= addslashes($this->input->post('tgl_awal'));
				$tgl_akhir 	= addslashes($this->input->post('tgl_akhir'));
				$id_group 	= $this->session->userdata('id_group');

				$for_tgl_awal = date('Y-m-d', strtotime($tgl_awal));
        		$for_tgl_akhir = date('Y-m-d', strtotime($tgl_akhir));

        		if(!empty($tgl_awal)){
					
					$data_real = $this->db->query("SELECT * FROM finish_goods WHERE cast(activation_date as date) BETWEEN '$for_tgl_awal' AND '$for_tgl_akhir' ")->result();
					
				}else{

					$data_real	= $this->Model_PemasukanProduksi->tampil_data()->result();
				}
				
				$data = array('contents' => 'Dashboard/FGL/index',
						  'data' => $data_real
							);


					header("Content-type: application/octet-stream");
					header("Content-Disposition: attachment; filename=Rekap_Finish_Good.xls");
					header("Pragma: no-cache"); 
					header("Expires: 0");

					$this->load->view('Dashboard/FGL/excel', $data);

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
				$data = array('contents' => 'Dashboard/Finish_good/add');
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
				$po_number 				= addslashes($this->input->post('po_number'));
				$bukti_penerimaan_no 	= addslashes($this->input->post('bukti_penerimaan_no'));
				$tanggal_finish_goods 	= addslashes($this->input->post('tanggal_finish_goods'));
				
				$username 		= $this->session->userdata('username');
				$created_at     = addslashes(date("Y-m-d H:i:s"));
				
				$limit_pk = addslashes($this->input->post('limit_pk'));

				/*print_r($data);
				echo "-------------";
				echo $limit_pk;
				die();*/


            	for ($i=0; $i < $limit_pk; $i++) {
            		$keterangan = addslashes($this->input->post('keterangan'.$i));
            		$kode = addslashes($this->input->post('kode'.$i));
            		$qty = addslashes($this->input->post('qty'.$i));
            		$sat = addslashes($this->input->post('sat'.$i));

            		

            		$data_limit_pk = array(
	                  		'po_number' 			=> $po_number,
							'bukti_penerimaan_no' 	=> $bukti_penerimaan_no,
							'tanggal_finish_goods'  => $tanggal_finish_goods,
							'kode_barang' 			=> $kode,
							'nama_barang' 			=> $keterangan,
							'satuan' 				=> $sat,
							'jumlah_dari_produksi' 			=> $qty,
							'jumlah_dari_subkontrak' 		=> '-',
							'gudang' 				=> 'Asinusa',
							'username' 	 			=> $username,
							'activation_date' 	 	=> $created_at,
							'status' 	 			=> 1

	                );
              		$this->model_global->input_data($data_limit_pk,'finish_goods');

              		}

				$this->session->set_flashdata('succeed', 'Data baru telah di simpan.');
				redirect('Finish_good');
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
				$where = array('id_finish_goods' => $id);
				$this->Model_PemasukanProduksi->hapus_data($where,'finish_goods');

				$this->session->set_flashdata('succeed', 'Satu data telah di hapus.');
				redirect('Finish_good');
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
				$where = array('id_finish_goods' => $id);
				$data = array( 	'contents' => 'Dashboard/Finish_good/edit',
								'data' => $this->Model_PemasukanProduksi->edit_data($where,'finish_goods')->row()
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
				$bukti_penerimaan_no = addslashes($this->input->post('bukti_penerimaan_no'));
				$tanggal_finish_goods = addslashes($this->input->post('tanggal_finish_goods'));
				$kode_barang = addslashes($this->input->post('kode_barang'));
				$nama_barang = addslashes($this->input->post('nama_barang'));
				$satuan = addslashes($this->input->post('satuan'));
				$jumlah_dari_produksi = addslashes($this->input->post('jumlah_dari_produksi'));
				$jumlah_dari_subkontrak = addslashes($this->input->post('jumlah_dari_subkontrak'));
				$gudang = addslashes($this->input->post('gudang'));
				
		 
				$data = array(
							'po_number' => $po_number,
							'bukti_penerimaan_no' => $bukti_penerimaan_no,
							'tanggal_finish_goods' => $tanggal_finish_goods,
							'kode_barang' => $kode_barang,
							'nama_barang' => $nama_barang,
							'satuan' => $satuan,
							'jumlah_dari_produksi' => $jumlah_dari_produksi,
							'jumlah_dari_subkontrak' => $jumlah_dari_subkontrak,
							'gudang' => $gudang
							);

				$where = array(
								'id_finish_goods' => $id
							);
			 
							
				$this->Model_PemasukanProduksi->update_data($where,$data,'finish_goods');

				$this->session->set_flashdata('succeed', 'Satu data telah di perbarui.');
				redirect('Finish_good');
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
