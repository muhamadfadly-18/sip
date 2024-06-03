	<?php
class PemasukanRBB  extends CI_Controller{

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
					
					$data_real = $this->db->query("SELECT * FROM barang_masuk WHERE id_group = '$id_group' AND cast(created_at as date) BETWEEN '$for_tgl_awal' AND '$for_tgl_akhir' ")->result();
					
				}else{

					$where      = array('id_group' => $id_group);
					$data_real	= $this->model_global->edit_data($where,'barang_masuk')->result();
				}


				$data = array('contents' => 'Dashboard/PemasukanRBB/index',
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

	function add_ajax_tank($id_terminal)
	{
		$query = $this->db->get_where('ref_terminal_tank',array('id_terminal'=>$id_terminal));
		$data = "<option value=''>- Pilih Terminal Tank -</option>";
		foreach ($query->result() as $value) {
			$data .= "<option value='".$value->tank."'>".$value->tank."</option>";
		}
		echo $data;
	}

	public function VlidasiData(){
		$KeteranganBarang = $_POST['KeteranganBarang'];

		$cektabel = $this->db->query("SELECT uom FROM barang where id_barang = '$KeteranganBarang' ")->row();

		

		echo json_encode($cektabel->uom);
    }


	public function add(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_add() == 1){

				$this->load->library('auto_number');

				$id_group 	= $this->session->userdata('id_group');

				
				$row = $this->model_global->id_terakhir();
				
		        $config['id'] = $row->id_bm;
		        $config['awalan'] = 'TRX';
		        $config['digit'] = 4;
				$this->auto_number->config($config);
		       /* echo $this->auto_number->generate_id();
		        die();*/

				$where 	  = array('jenis' => 'Supplier');
				$whereTer = array('id_group' => $id_group);

				/*$dariDB = $this->model_global->cekPemasukanRBB();
				contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
				$nourut = substr($dariDB, 2, 3);
				$kodeBarangSekarang = $nourut + 1;*/

				$kategori_barang    = $this->model_global->getAll('ref_kategori')->result();
				$satuan           	= $this->model_global->getAll('ref_satuan')->result();
				$dokumen           	= $this->model_global->getAll('ref_dokumen')->result();
				$purchase          	= $this->model_global->getAll('purchase')->result();
				$jenis           	= $this->model_global->getAll('ref_jenis')->result();
				$barang           	= $this->model_global->edit_data($whereTer,'barang')->result();
				$kurs           	= $this->model_global->getAll('ref_kurs')->result();
				$client				= $this->model_global->edit_data($where,'ref_client')->result();
				$terminal			= $this->model_global->edit_data($whereTer,'ref_terminal')->result();

				$data = array('contents' 		=> 'Dashboard/PemasukanRBB/add',
							'kategori_barang' 	=> $kategori_barang,
							'satuan' 			=> $satuan,
							'dokumen' 			=> $dokumen,
							'barang' 			=> $barang,
							'jenis' 			=> $jenis,
							'kurs' 				=> $kurs,
							'client' 			=> $client,
							'terminal' 			=> $terminal,
							'purchase' 			=> $purchase,
							'kodetrx' 			=> $this->auto_number->generate_id()
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

				$config['upload_path']          = './uploads/';
	            $config['allowed_types']        = 'gif|jpeg|jpg|png';
	            $config['max_size']             = '500000';
	            $config['overwrite']            = 'TRUE';
	            $fileFoto                       = $_FILES['foto']['name'];

	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            $this->upload->do_upload('file');

	            $gbr = $this->upload->data();

				$po_number 			= addslashes($this->input->post('po_number'));
				$no_transaksi 		= addslashes($this->input->post('no_transaksi'));
				$tgl_transaksi 		= addslashes($this->input->post('tgl_transaksi'));
				$jenis_doc 			= addslashes($this->input->post('jenis_doc'));
				$jenis_pemasukan 		= addslashes($this->input->post('jenis_pemasukan'));
				$pengirim_barang 		= addslashes($this->input->post('pengirim_barang'));
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
            		$qty 		= addslashes($this->input->post('qty'.$i));
            		$sat 		= addslashes($this->input->post('sat'.$i));
            		$harga 		= addslashes($this->input->post('harga'.$i));
            		$total 		= addslashes($this->input->post('total'.$i));
            		$cur 		= addslashes($this->input->post('cur'.$i));
            		$terminal	= addslashes($this->input->post('terminal'.$i));
            		$tank 		= addslashes($this->input->post('tank'.$i));


            		$where_awal = array('id_barang' => $keterangan);
					$hasil_awal = $this->model_global->edit_data($where_awal,'barang')->row();

					$where_terminal = array('id_terminal' => $terminal);
					$hasil_terminal = $this->model_global->edit_data($where_terminal,'ref_terminal')->row();

					if($terminal == "1" && $tank == "Tank 1.A"){
			$cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 1.B"){
			$cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 2.A"){
			$cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 2.B"){
			$cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();		
		}elseif($terminal == "1" && $tank == "Tank 3.A"){
			$cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 3.B"){
			$cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 4.A"){
			$cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 4.B"){
			$cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 5.A"){
			$cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 5.B"){
			$cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 6.A"){
			$cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 6.B"){
			$cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();

		}elseif($terminal == "2" && $tank == "Tank 1.A"){
			$cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 1.B"){
			$cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 2.A"){
			$cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 2.B"){
			$cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();		
		}elseif($terminal == "2" && $tank == "Tank 3.A"){
			$cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 3.B"){
			$cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 4.A"){
			$cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 4.B"){
			$cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 5.A"){
			$cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 5.B"){
			$cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 6.A"){
			$cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 6.B"){
			$cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();	

		
		}elseif($terminal == "3" && $tank == "Tank 1.A"){
			$cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 1.B"){
			$cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 2.A"){
			$cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 2.B"){
			$cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();		
		}elseif($terminal == "3" && $tank == "Tank 3.A"){
			$cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 3.B"){
			$cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 4.A"){
			$cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 4.B"){
			$cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 5.A"){
			$cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 5.B"){
			$cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 6.A"){
			$cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 6.B"){
			$cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();

		}

              		$data_limit_mutasi = array(
	                  		'po_number' 	=> $po_number,
							'kode_barang' 	=> $keterangan,
							'nama_barang'   => $hasil_awal->nama_brg,
							'satuan' 		=> $sat,
							'saldo_awal' 	=> $cektabel->hasil,
							'pemasukan' 	=> $qty,
							'pengeluaran' 	=> 0,
							'saldo_akhir' 	=> 0,
							'username' 	 		=> $username,
							'activation_date' 	=> $created_at,
							'status' 	 		=> 1,
							'terminal_terapung'	=> $hasil_terminal->terminal,
							'terminal_tank' 	=> $tank

	                );
              		$this->model_global->input_data($data_limit_mutasi,'mutasi_bahan');
              		$id_mutasi_bahan = $this->db->insert_id();

            		$data_limit_pk = array(
	                  		'po_number' 		=> $po_number,
							'no_transaksi' 	 	=> $no_transaksi,
							'jenis_doc'   		=> $jenis_doc,
							'jenis_pemasukan' 	=> $jenis_pemasukan,
							'no_dokumen_pabean' 	=> $no_dokumen_pabean,
							'no_bukti_penerimaan' 	=> $no_bukti_penerimaan,
							'tgl_dokumen_pabean' 	=> $tgl_dokumen_pabean,
							'negara_asal' 		=> $negara_asal,
							'created_at' 		=> $created_at,
							'id_group' 	 		=> $id_group,
							'id_client' 	 	=> $pengirim_barang,
							'nama_brg' 	 		=> $hasil_awal->nama_brg,
							'id_barang' 	 	=> $keterangan,
							'jumlah' 	 		=> $qty,
							'id_satuan' 	 	=> $sat,
							'nilai_barang' 	 	=> $total,
							'id_mata_uang' 	 	=> $cur,
							'tgl_transaksi' 	=> $tgl_transaksi,
							'terminal_terapung'	=> $hasil_terminal->terminal,
							'terminal_tank' 	=> $tank,
							'file' 	=> $$fileFoto
							
	                );
              		$this->model_global->input_data($data_limit_pk,'barang_masuk');

              		

              		

        if($terminal == "1" && $tank == "Tank 1.A"){
			$cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 1.B"){
			$cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 2.A"){
			$cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 2.B"){
			$cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();		
		}elseif($terminal == "1" && $tank == "Tank 3.A"){
			$cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 3.B"){
			$cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 4.A"){
			$cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 4.B"){
			$cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 5.A"){
			$cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 5.B"){
			$cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 6.A"){
			$cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 6.B"){
			$cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();

		}elseif($terminal == "2" && $tank == "Tank 1.A"){
			$cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 1.B"){
			$cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 2.A"){
			$cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 2.B"){
			$cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();		
		}elseif($terminal == "2" && $tank == "Tank 3.A"){
			$cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 3.B"){
			$cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 4.A"){
			$cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 4.B"){
			$cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 5.A"){
			$cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 5.B"){
			$cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 6.A"){
			$cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 6.B"){
			$cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();	

		
		}elseif($terminal == "3" && $tank == "Tank 1.A"){
			$cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 1.B"){
			$cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 2.A"){
			$cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 2.B"){
			$cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();		
		}elseif($terminal == "3" && $tank == "Tank 3.A"){
			$cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 3.B"){
			$cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 4.A"){
			$cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 4.B"){
			$cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 5.A"){
			$cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 5.B"){
			$cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 6.A"){
			$cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 6.B"){
			$cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();

		}

              		/*$where_akhir = array('id_barang' => $keterangan);
					$hasil_akhir = $this->model_global->edit_data($where_akhir,'barang')->row();*/

					$data_mutasi = array(
								'saldo_akhir' 	 	=> $cektabel->hasil
							);

					$where_mutasi = array(
								'id_mutasi_bahan' 	=> $id_mutasi_bahan
							);


					$this->model_global->update_data($where_mutasi,$data_mutasi,'mutasi_bahan');


            	}



				//log
			
				$assign_type= '';
				activity_log("Pemasukan -> Pemasukan Bahan Baku", "Menambah data Pemasukan Bahan Baku", $id_group, $assign_type);
		 		$this->session->set_flashdata('succeed','Sukses, Satu data telah berhasil disimpan.');
				redirect('PemasukanRBB');
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
				$where = array('id_bm' => $id);
				$this->model_global->hapus_data($where,'barang_masuk');

				$this->session->set_flashdata('succeed', 'Satu Data  telah di hapus.');
				//log
				$id_group 		= $this->session->userdata('id_group');
				$assign_type= '';
				activity_log("Master Data -> Pemasukan Bahan Baku", "Menghapus data Pemasukan Bahan Baku", $id, $id_group, $assign_type);
				$this->session->set_flashdata('succeed','Sukses, Satu data telah berhasil dihapus.');
				redirect('PemasukanRBB');
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
				$where = array('id_bm' => $id);
				$kategori_barang    = $this->model_global->getAll('ref_kategori')->result();
				$satuan           	= $this->model_global->getAll('ref_satuan')->result();
				$data = array( 	'contents' => 'Dashboard/PemasukanRBB/edit',
								'data' => $this->model_global->edit_data($where,'barang_masuk')->row(),
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
								'id_bm' => $id
							);


				$this->model_global->update_data($where,$data,'barang_masuk');
				$assign_type= '';
				activity_log("Master Data -> Pemasukan Bahan Baku", "Mengubah data Pemasukan Bahan Baku", $id_group, $assign_type);	
				$this->session->set_flashdata('succeed','Sukses, Satu data telah berhasil diperbaharui.');
				redirect('PemasukanRBB');
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
