<?php
class PengeluaranProduksi  extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('Model_PengeluaranProduksi');
 
	}

	function index(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_access() == 1){
				$data = array('contents' => 'Dashboard/PengeluaranProduksi/index',
						  'data' => $this->Model_PengeluaranProduksi->tampil_data()->result()
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
				$data = array('contents' => 'Dashboard/PengeluaranProduksi/add');
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
				$peb_number = addslashes($this->input->post('peb_number'));
				$peb_date = addslashes($this->input->post('peb_date'));
				$invoice_no = addslashes($this->input->post('invoice_no'));
				$no_bukti_pb = addslashes($this->input->post('no_bukti_pb'));
				$tgl_bukti_pb = addslashes($this->input->post('tgl_bukti_pb'));
				$pembeli_penerima = addslashes($this->input->post('pembeli_penerima'));
				$negara_tujuan = addslashes($this->input->post('negara_tujuan'));
				$kode_barang = addslashes($this->input->post('kode_barang'));
				$nama_barang = addslashes($this->input->post('nama_barang'));
				$satuan = addslashes($this->input->post('satuan'));
				$jumlah = addslashes($this->input->post('jumlah'));
				$mata_uang = addslashes($this->input->post('mata_uang'));
				$nilai_barang = addslashes($this->input->post('nilai_barang'));
		 
		 
				$data = array(
							'po_number' => $po_number,
							'peb_number' => $peb_number,
							'peb_date' => $peb_date,
							'invoice_no' => $invoice_no,
							'no_bukti_pengeluaran_barang' => $no_bukti_pb,
							'tanggal_bukti_pengeluaran_barang' => $tgl_bukti_pb,
							'pembeli_penerima' => $pembeli_penerima,
							'negara_tujuan' => $negara_tujuan,
							'kode_barang' => $kode_barang,
							'nama_barang' => $nama_barang,
							'satuan' => $satuan,
							'jumlah' => $jumlah,
							'mata_uang' => $mata_uang,
							'nilai_barang' => $nilai_barang
							);

							
							
				$this->Model_PengeluaranProduksi->input_data($data,'export');

				$this->session->set_flashdata('succeed', 'Data baru telah di simpan.');
				redirect('PengeluaranProduksi');
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
				$where = array('id_export' => $id);
				$this->Model_PengeluaranProduksi->hapus_data($where,'export');

				$this->session->set_flashdata('succeed', 'Satu data KBLI telah di hapus.');
				redirect('PengeluaranProduksi');
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
				$where = array('id_export' => $id);
				$data = array( 	'contents' => 'Dashboard/PengeluaranProduksi/edit',
								'data' => $this->Model_PengeluaranProduksi->edit_data($where,'export')->row()
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
				$peb_number = addslashes($this->input->post('peb_number'));
				$peb_date = addslashes($this->input->post('peb_date'));
				$invoice_no = addslashes($this->input->post('invoice_no'));
				$no_bukti_pb = addslashes($this->input->post('no_bukti_pb'));
				$tgl_bukti_pb = addslashes($this->input->post('tgl_bukti_pb'));
				$pembeli_penerima = addslashes($this->input->post('pembeli_penerima'));
				$negara_tujuan = addslashes($this->input->post('negara_tujuan'));
				$kode_barang = addslashes($this->input->post('kode_barang'));
				$nama_barang = addslashes($this->input->post('nama_barang'));
				$satuan = addslashes($this->input->post('satuan'));
				$jumlah = addslashes($this->input->post('jumlah'));
				$mata_uang = addslashes($this->input->post('mata_uang'));
				$nilai_barang = addslashes($this->input->post('nilai_barang'));
		 
		 
				$data = array(
							'po_number' => $po_number,
							'peb_number' => $peb_number,
							'peb_date' => $peb_date,
							'invoice_no' => $invoice_no,
							'no_bukti_pengeluaran_barang' => $no_bukti_pb,
							'tanggal_bukti_pengeluaran_barang' => $tgl_bukti_pb,
							'pembeli_penerima' => $pembeli_penerima,
							'negara_tujuan' => $negara_tujuan,
							'kode_barang' => $kode_barang,
							'nama_barang' => $nama_barang,
							'satuan' => $satuan,
							'jumlah' => $jumlah,
							'mata_uang' => $mata_uang,
							'nilai_barang' => $nilai_barang
							);

				$where = array(
					'id_export' => $id
				);
							
				$this->Model_PengeluaranProduksi->update_data($where,$data,'export');

				$this->session->set_flashdata('succeed', 'Satu Data telah di perbarui.');
				redirect('PengeluaranProduksi');
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
