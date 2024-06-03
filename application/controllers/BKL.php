<?php
class BKL extends CI_Controller{

	function __construct(){
		parent::__construct();
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
					
					$data_real = $this->db->query("SELECT * FROM barang_keluar WHERE id_group = '$id_group' AND cast(created_at as date) BETWEEN '$for_tgl_awal' AND '$for_tgl_akhir' ")->result();
					
				}else{

					$where      = array('id_group' => $id_group);
					$data_real	= $this->model_global->edit_data($where,'barang_keluar')->result();
				}

       			$data = array('contents' => 'Dashboard/BKL/index',
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
					
					$data_real = $this->db->query("SELECT * FROM barang_keluar WHERE id_group = '$id_group' AND cast(created_at as date) BETWEEN '$for_tgl_awal' AND '$for_tgl_akhir' ")->result();
					
				}else{

					$where      = array('id_group' => $id_group);
					$data_real	= $this->model_global->edit_data($where,'barang_keluar')->result();
				}

       			$data = array('contents' => 'Dashboard/BKL/index',
						  'data' => $data_real
							);


					header("Content-type: application/octet-stream");
					header("Content-Disposition: attachment; filename=Rekap_Pengeluaran_Barang.xls");
					header("Pragma: no-cache"); 
					header("Expires: 0");

					$this->load->view('Dashboard/BKL/excel', $data);

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
				$where = array('jenis' => 'Supplier');

				$kategori_barang    = $this->model_global->getAll('ref_kategori')->result();
				$satuan           	= $this->model_global->getAll('ref_satuan')->result();
				$dokumen           	= $this->model_global->getAll('ref_dokumen')->result();
				$jenis           	= $this->model_global->getAll('ref_jenis')->result();
				$barang           	= $this->model_global->getAll('barang')->result();
				$kurs           	= $this->model_global->getAll('ref_kurs')->result();
				$client				= $this->model_global->edit_data($where,'ref_client')->result();

				$data = array('contents' => 'Dashboard/PengeluaranRBB/add',
							'kategori_barang' 	=> $kategori_barang,
							'satuan' 			=> $satuan,
							'dokumen' 			=> $dokumen,
							'barang' 			=> $barang,
							'jenis' 			=> $jenis,
							'kurs' 				=> $kurs,
							'client' 			=> $client
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

	public function cekKode(){
	    $sub1 = $this->input->get("sub1");
	    $datapengajuan = $this->db->query("SELECT id_barang FROM barang WHERE nama_brg = '$sub1' ")->row();

	     $result = $datapengajuan->id_barang;
	      
	    echo json_encode($result);
	  }

	  public function cekSat(){
	    $sub1 = $this->input->get("sub1");
	    $datapengajuan = $this->db->query("SELECT uom FROM barang WHERE nama_brg = '$sub1' ")->row();

	     $result = $datapengajuan->uom;
	      
	    echo json_encode($result);
	  }

	public function add_action(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_add() == 1){
				$po_number 			= addslashes($this->input->post('po_number'));
				$no_transaksi 		= addslashes($this->input->post('no_transaksi'));
				$tgl_transaksi 		= addslashes($this->input->post('tgl_transaksi'));
				$jenis_doc 			= addslashes($this->input->post('jenis_doc'));
				$jenis_keluar 		= addslashes($this->input->post('jenis_keluar'));
				$pengirim_barang1 	= addslashes($this->input->post('pengirim_barang'));

				$hasil = explode("-",$pengirim_barang1);

				$pengirim_barang =  $hasil[0];
				$pengirim_barang_nama = $hasil[1];

				$no_dokumen_pabean 		= addslashes($this->input->post('no_dokumen_pabean'));
				$no_bukti_penerimaan 	= addslashes($this->input->post('no_bukti_penerimaan'));
				$tgl_dokumen_pabean 	= addslashes($this->input->post('tgl_dokumen_pabean'));
				$negara_asal 		= addslashes($this->input->post('negara_asal'));

				$id_group 		= $this->session->userdata('id_group');
				$username 		= $this->session->userdata('username');
				$created_at     = addslashes(date("Y-m-d H:i:s"));

				/*$data = array(
							'po_number' 		=> $po_number,
							'no_transaksi' 	 	=> $no_transaksi,
							'jenis_doc'   		=> $jenis_doc,
							'jenis_pemasukan' 	=> $jenis_pemasukan,
							'no_dokumen_pabean' 	=> $no_dokumen_pabean,
							'no_bukti_penerimaan' 	=> $no_bukti_penerimaan,
							'tgl_dokumen_pabean' 	=> $tgl_dokumen_pabean,
							'negara_asal' 		=> $negara_asal,
							'created_at' 		=> $created_at,
							'id_group' 	 		=> $id_group
							);*/

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
            		$harga = addslashes($this->input->post('harga'.$i));
            		$total = addslashes($this->input->post('total'.$i));
            		/*$qty = str_replace("Rp. ","",$qty);
					$sat = str_replace(".","",$sat);*/
            		$cur = addslashes($this->input->post('cur'.$i));

            		$where_awal = array('id_barang' => $kode);
					$hasil_awal = $this->model_global->edit_data($where_awal,'barang')->row();

            		$data_limit_pk = array(
	                  		'po_number' 		=> $po_number,
							'no_transaksi' 	 	=> $no_transaksi,
							'jenis_doc'   		=> $jenis_doc,
							'jenis_keluar' 		=> $jenis_keluar,
							'no_dokumen_pabean' 	=> $no_dokumen_pabean,
							'no_bukti_pengeluaran' 	=> $no_bukti_penerimaan,
							'tgl_dokumen_pabean' 	=> $tgl_dokumen_pabean,
							'negara_tujuan' 		=> $negara_asal,
							'created_at' 		=> $created_at,
							'id_group' 	 		=> $id_group,
							'id_client' 	 	=> $pengirim_barang,
							'nama_brg' 	 		=> $keterangan,
							'id_barang' 	 	=> $kode,
							'jumlah' 	 		=> $qty,
							'id_satuan' 	 	=> $sat,
							'nilai_barang' 	 	=> $total,
							'id_mata_uang' 	 	=> $cur,
							'no_transaksi' 	 	=> $no_transaksi,
							'pembeli_penerima' 	=> $pengirim_barang_nama

	                );
              		$this->model_global->input_data($data_limit_pk,'barang_keluar');

              		$data_limit_mutasi = array(
	                  		'po_number' 	=> $po_number,
							'kode_barang' 	=> $kode,
							'nama_barang'   => $keterangan,
							'satuan' 		=> $sat,
							'saldo_awal' 	=> $hasil_awal->stok,
							'pemasukan' 	=> 0,
							'pengeluaran' 	=> $qty,
							'saldo_akhir' 	=> 0,
							'username' 	 		=> $username,
							'activation_date' 	 => $created_at,
							'status' 	 		=> 1

	                );
              		$this->model_global->input_data($data_limit_mutasi,'mutasi_bahan');

              		$id_mutasi_bahan = $this->db->insert_id();
              		$where_akhir = array('id_barang' => $kode);
					$hasil_akhir = $this->model_global->edit_data($where_akhir,'barang')->row();

					$data_mutasi = array(
								'saldo_akhir' 	 	=> $hasil_akhir->stok
							);

					$where_mutasi = array(
								'id_mutasi_bahan' 	=> $id_mutasi_bahan
							);


					$this->model_global->update_data($where_mutasi,$data_mutasi,'mutasi_bahan');

            	}

				//log
			
				$assign_type= '';
				activity_log("Master Data -> Pemasukan Bahan Baku", "Menambah data Pemasukan Bahan Baku", $id_group, $assign_type);
		 		$this->session->set_flashdata('succeed','Sukses, Satu data telah berhasil disimpan.');
				redirect('PengeluaranRBB');
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
				$where = array('id_bk' => $id);
				$this->model_global->hapus_data($where,'barang_keluar');

				$this->session->set_flashdata('succeed', 'Satu Data  telah di hapus.');
				//log
				$id_group 		= $this->session->userdata('id_group');
				$assign_type= '';
				activity_log("Master Data -> Pemasukan Bahan Baku", "Menghapus data Pemasukan Bahan Baku", $id, $id_group, $assign_type);
				$this->session->set_flashdata('succeed','Sukses, Satu data telah berhasil dihapus.');
				redirect('PengeluaranRBB');
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
				$where = array('id_bk' => $id);
				$kategori_barang    = $this->model_global->getAll('ref_kategori')->result();
				$satuan           	= $this->model_global->getAll('ref_satuan')->result();
				$data = array( 	'contents' => 'Dashboard/PengeluaranRBB/edit',
								'data' => $this->model_global->edit_data($where,'barang_keluar')->row(),
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
								'id_bk' => $id
							);


				$this->model_global->update_data($where,$data,'barang_keluar');
				$assign_type= '';
				activity_log("Master Data -> Pemasukan Bahan Baku", "Mengubah data Pemasukan Bahan Baku", $id_group, $assign_type);	
				$this->session->set_flashdata('succeed','Sukses, Satu data telah berhasil diperbaharui.');
				redirect('PengeluaranRBB');
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
