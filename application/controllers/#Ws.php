<?php
class Ws  extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('Model_Ws');
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
					
					$data_real = $this->db->query("SELECT * FROM waste_scrap WHERE cast(activation_date as date) BETWEEN '$for_tgl_awal' AND '$for_tgl_akhir' ")->result();
					
				}else{

					$data_real	= $this->Model_Ws->tampil_data()->result();
				}

				$data = array('contents' => 'Dashboard/Ws/index',
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
 
	public function add(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_add() == 1){
				$data = array('contents' => 'Dashboard/Ws/add');
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
				$no_bc = addslashes($this->input->post('no_bc'));
				$tanggal_bc = addslashes($this->input->post('tanggal_bc'));
				
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
	                  		'po_number' 		=> $po_number,
							'no_bc' 			=> $no_bc,
							'tanggal_bc'  		=> $tanggal_bc,
							'kode_barang' 		=> $kode,
							'nama_barang' 		=> $keterangan,
							'satuan' 			=> $sat,
							'jumlah' 			=> $qty,
							'nilai' 			=> 0,
							'activation_date' 	=> $created_at,
							'status' 	 		=> 1

	                );
              		$this->model_global->input_data($data_limit_pk,'waste_scrap');

              		}

              		$assign_type= '';
					activity_log("Pemasukan -> WS", "Menambah data Scrap", $assign_type, $assign_type);

				$this->session->set_flashdata('succeed', 'Data baru telah di simpan.');
				redirect('Ws');
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
				$where = array('id_waste_scrap' => $id);
				$this->Model_Ws->hapus_data($where,'waste_scrap');

				$this->session->set_flashdata('succeed', 'Satu data telah di hapus.');
				redirect('Ws');
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
				$where = array('id_waste_scrap' => $id);
				$data = array( 	'contents' => 'Dashboard/Ws/edit',
								'data' => $this->Model_Ws->edit_data($where,'waste_scrap')->row()
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
				$no_bc = addslashes($this->input->post('no_bc'));
				$tanggal_bc = addslashes($this->input->post('tanggal_bc'));
				$kode_barang = addslashes($this->input->post('kode_barang'));
				$nama_barang = addslashes($this->input->post('nama_barang'));
				$satuan = addslashes($this->input->post('satuan'));
				$jumlah = addslashes($this->input->post('jumlah'));
				$nilai = addslashes($this->input->post('nilai'));
		 
				$data = array(
								'po_number' => $po_number,
								'no_bc' => $no_bc,
								'tanggal_bc' => $tanggal_bc,
								'kode_barang' => $kode_barang,
								'nama_barang' => $nama_barang,
								'satuan' => $satuan,
								'jumlah' => $jumlah,
								'nilai' => $nilai
								);


				$where = array(
								'id_waste_scrap' => $id
							);
			 
							
				$this->Model_Ws->update_data($where,$data,'waste_scrap');

				$this->session->set_flashdata('succeed', 'Satu data telah di perbarui.');
				redirect('Ws');
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
