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

	function add_ajax_tank($id_terminal)
	{
		$query = $this->db->get_where('ref_terminal_tank',array('id_terminal'=>$id_terminal));
		$data = "<option value=''>- Pilih Terminal Tank -</option>";
		foreach ($query->result() as $value) {
			$data .= "<option value='".$value->tank."'>".$value->tank."</option>";
		}
		echo $data;
	}

	function add_ajax_tank2($id_terminal)
	{
		$query = $this->db->get_where('ref_terminal_tank',array('id_terminal'=>$id_terminal));
		$data = "<option value=''>- Pilih Terminal Tank -</option>";
		foreach ($query->result() as $value) {
			$data .= "<option value='".$value->tank."'>".$value->tank."</option>";
		}
		echo $data;
	}

	public function add(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_add() == 1){
				$this->load->library('auto_number');

				$id_group 	= $this->session->userdata('id_group');
				$whereTer = array('id_group' => $id_group);

				$row = $this->model_global->id_terakhir_waste();

				if(empty($row->id_waste_scrap)){
                    $config['id'] = 0;
                }else{
                   $config['id'] = $row->id_waste_scrap;
                }

                
                $config['awalan'] = 'WS';
                $config['digit'] = 4;
                $this->auto_number->config($config);

                $terminal2          = $this->model_global->getAll('ref_terminal')->row();
                $wheretank          = array('id_terminal' => $terminal2->id_terminal);
                $tank2              = $this->model_global->edit_data($wheretank, 'ref_terminal_tank')->result();

				$barang           	= $this->model_global->edit_data($whereTer,'barang_produksi')->result();
				$terminal			= $this->model_global->edit_data($whereTer,'ref_terminal')->result();
				$purchase          	= $this->model_global->getAll('purchase')->result();

                $data = array(
                    'contents' 	=> 'Dashboard/Ws/add',
					'barang' 	=> $barang,
					'terminal'	=> $terminal,
					'terminal2'	=> $terminal2,
					'tank2'		=> $tank2,
					'purchase' 	=> $purchase,
                    'no_bc' 	=> $this->auto_number->generate_id_WS(),
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

	public function add_action(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_add() == 1){
					$po_number 				= addslashes($this->input->post('po_number'));
					$no_bc 					= addslashes($this->input->post('no_bc'));
					$tanggal_bc 			= addslashes($this->input->post('tanggal_bc'));
					$terminal 				= addslashes($this->input->post('id_terminal'));
					$terminal2 				= addslashes($this->input->post('id_terminal'));
					
					$username 		= $this->session->userdata('username');
					$created_at     = addslashes(date("Y-m-d H:i:s"));
					
					$limit_pk = addslashes($this->input->post('limit_pk'));

            	for ($i=0; $i < $limit_pk; $i++) {
            		$keterangan = addslashes($this->input->post('keterangan'.$i));
            		$qty 		= addslashes($this->input->post('qty'.$i));
            		$terminal_name = addslashes($this->input->post('terminal'.$i));
            		$tank 		= addslashes($this->input->post('tank'.$i));
            		$stoktank 	= addslashes($this->input->post('stoktank'.$i));
            		$tank2 		= addslashes($this->input->post('tank2'.$i));

            		$where_awal = array('id_barang' => $keterangan);
					$hasil_awal = $this->model_global->edit_data($where_awal,'barang_produksi')->row();

					$where_terminal_asal = array('id_terminal' => $terminal);
					$hasil_terminal_asal = $this->model_global->edit_data($where_terminal_asal,'ref_terminal')->row();

					$where_terminal_tujuan = array('id_terminal' => $terminal2);
					$hasil_terminal_tujuan = $this->model_global->edit_data($where_terminal_tujuan,'ref_terminal')->row();

					if($terminal == "1" && $tank == "Tank 1.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank1  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 1.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank2  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 2.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank3  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 2.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank4  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();		
					}elseif($terminal == "1" && $tank == "Tank 3.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank5  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 3.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank6  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 4.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank7  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 4.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank8  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 5.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank9  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 5.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank10 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 6.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank11 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 6.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();

					}elseif($terminal == "2" && $tank == "Tank 1.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank1  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 1.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank2  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 2.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank3  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 2.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank4  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();		
					}elseif($terminal == "2" && $tank == "Tank 3.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank5  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 3.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank6  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 4.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank7  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 4.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank8  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 5.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank9  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 5.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank10 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 6.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank11 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 6.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();	

					
					}elseif($terminal == "3" && $tank == "Tank 1.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank1  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 1.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank2  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 2.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank3  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 2.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank4  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();		
					}elseif($terminal == "3" && $tank == "Tank 3.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank5  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 3.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank6  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 4.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank7  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 4.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank8  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 5.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank9  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 5.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank10 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 6.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank11 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 6.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_produksi  where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();

					}

					
            		$data_limit_pk = array(
	                  		'po_number' 			=> $po_number,
							'no_bc' 				=> $no_bc,
							'tanggal_bc'  			=> $tanggal_bc,
							'kode_barang' 			=> $keterangan,
							'nama_barang' 			=> $hasil_awal->nama_brg,
							'satuan' 				=> $hasil_awal->uom,
							'Jumlah' 					=> $qty,
							'Nilai' 	=> '-',
							'activation_date' 	 	=> $created_at,
							'status' 	 			=> 1,
							'asal_terminal_terapung' 	 	=> $hasil_terminal_asal->terminal,
							'asal_terminal_tank' 	 		=> $tank,
							'info_stok' 	 				=> $stoktank,
							'tujuan_terminal_terapung' 	 	=> $hasil_terminal_tujuan->terminal,
							'tujuan_terminal_tank' 	 		=> $tank2

	                );
              		$this->model_global->input_data($data_limit_pk,'waste_scrap');

              		$data_limit_mutasi = array(
	                  		'po_number' 	=> $po_number,
							'kode_barang' 	=> $keterangan,
							'nama_barang'   => $hasil_awal->nama_brg,
							'satuan' 		=> $hasil_awal->uom,
							'saldo_awal' 	=> $cektabel_prdi->hasil,
							'pemasukan' 	=> 0,
							'pengeluaran' 	=> $qty,
							'saldo_akhir' 	=> 0,
							'username'          => $username,
							'activation_date' 	=> $created_at,
							'status' 	 		=> 1,
							'asal_terminal_terapung' 	 	=> $hasil_terminal_asal->terminal,
							'asal_terminal_tank' 	 		=> $tank,
							'info_stok' 	 				=> $stoktank,
							'tujuan_terminal_terapung' 	 	=> $hasil_terminal_tujuan->terminal,
							'tujuan_terminal_tank' 	 		=> $tank2

	                );
              		$this->model_global->input_data($data_limit_mutasi,'mutasi_produksi');
              		$id_mutasi_produksi = $this->db->insert_id();

              		if($terminal == "1" && $tank == "Tank 1.A"){
						$cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 1.B"){
						$cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 2.A"){
						$cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 2.B"){
						$cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();		
					}elseif($terminal == "1" && $tank == "Tank 3.A"){
						$cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 3.B"){
						$cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 4.A"){
						$cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 4.B"){
						$cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 5.A"){
						$cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 5.B"){
						$cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 6.A"){
						$cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 6.B"){
						$cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();

					}elseif($terminal == "2" && $tank == "Tank 1.A"){
						$cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 1.B"){
						$cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 2.A"){
						$cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 2.B"){
						$cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();		
					}elseif($terminal == "2" && $tank == "Tank 3.A"){
						$cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 3.B"){
						$cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 4.A"){
						$cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 4.B"){
						$cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 5.A"){
						$cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 5.B"){
						$cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 6.A"){
						$cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 6.B"){
						$cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();	

					
					}elseif($terminal == "3" && $tank == "Tank 1.A"){
						$cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 1.B"){
						$cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 2.A"){
						$cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 2.B"){
						$cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();		
					}elseif($terminal == "3" && $tank == "Tank 3.A"){
						$cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 3.B"){
						$cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 4.A"){
						$cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 4.B"){
						$cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 5.A"){
						$cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 5.B"){
						$cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 6.A"){
						$cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 6.B"){
						$cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_produksi  where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();

					}

              		$data_mutasi = array(
								'saldo_akhir' 	 		=> $cektabel->hasil
							);

					$where_mutasi = array(
								'id_mutasi_produksi' 	=> $id_mutasi_produksi
							);


					$this->model_global->update_data($where_mutasi,$data_mutasi,'mutasi_produksi');

              		}

              		$assign_type= '';
				activity_log("Pemasukan -> waste_scrap", "Menambah data waste_scrap", $assign_type, $assign_type);

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
				$this->load->library('auto_number');
				
				$id_group 	= $this->session->userdata('id_group');
				$whereTer = array('id_group' => $id_group);
				$where2 = array('id_waste_scrap' => $id);

				$row = $this->model_global->id_terakhir_waste();

				if(empty($row->id_waste_scrap)){
                    $config['id'] = 0;
                }else{
					$config['id'] = $row->id_waste_scrap;
                }
                
                $config['awalan'] = 'WS';
                $config['digit'] = 4;
                $this->auto_number->config($config);

                $terminal2          = $this->model_global->getAll('ref_terminal')->row();
                $wheretank          = array('id_terminal' => $terminal2->id_terminal);
                $tank2              = $this->model_global->edit_data($wheretank, 'ref_terminal_tank')->result();

				$barang           	= $this->model_global->edit_data($whereTer,'barang_produksi')->result();
				$terminal			= $this->model_global->edit_data($whereTer,'ref_terminal')->result();
                $purchase           = $this->model_global->getAll('purchase')->result();
                $data               = $this->model_global->edit_data($where2,'waste_scrap')->row();

                $data = array(
                    'contents' 	=> 'Dashboard/Ws/edit',
					'barang' 	=> $barang,
					'terminal'	=> $terminal,
					'terminal2'	=> $terminal2,
					'tank2'		=> $tank2,
					'purchase' 	=> $purchase,
					'data'      => $data, 
                    'no_bc' 	=> $this->auto_number->generate_id_WS(),
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
			if($this->model_user_access->access_add() == 1){
					$po_number 				= addslashes($this->input->post('po_number'));
					$no_bc 					= addslashes($this->input->post('no_bc'));
					$tanggal_bc 			= addslashes($this->input->post('tanggal_bc'));
					$terminal 				= addslashes($this->input->post('id_terminal'));
					$terminal2 				= addslashes($this->input->post('id_terminal'));
					
					$username 		= $this->session->userdata('username');
					$created_at     = addslashes(date("Y-m-d H:i:s"));
					
					$limit_pk = addslashes($this->input->post('limit_pk'));

            	for ($i=0; $i < $limit_pk; $i++) {
            		$keterangan = addslashes($this->input->post('keterangan'.$i));
            		$qty 		= addslashes($this->input->post('qty'.$i));
            		$terminal_name = addslashes($this->input->post('terminal'.$i));
            		$tank 		= addslashes($this->input->post('tank'.$i));
            		$stoktank 	= addslashes($this->input->post('stoktank'.$i));
            		$tank2 		= addslashes($this->input->post('tank2'.$i));

            		$where_awal = array('id_barang' => $keterangan);
					$hasil_awal = $this->model_global->edit_data($where_awal,'barang_produksi')->row();

					$where_terminal_asal = array('id_terminal' => $terminal);
					$hasil_terminal_asal = $this->model_global->edit_data($where_terminal_asal,'ref_terminal')->row();

					$where_terminal_tujuan = array('id_terminal' => $terminal2);
					$hasil_terminal_tujuan = $this->model_global->edit_data($where_terminal_tujuan,'ref_terminal')->row();

					if($terminal == "1" && $tank == "Tank 1.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank1  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 1.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank2  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 2.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank3  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 2.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank4  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();		
					}elseif($terminal == "1" && $tank == "Tank 3.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank5  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 3.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank6  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 4.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank7  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 4.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank8  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 5.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank9  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 5.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank10 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 6.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank11 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 6.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();

					}elseif($terminal == "2" && $tank == "Tank 1.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank1  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 1.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank2  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 2.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank3  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 2.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank4  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();		
					}elseif($terminal == "2" && $tank == "Tank 3.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank5  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 3.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank6  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 4.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank7  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 4.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank8  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 5.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank9  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 5.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank10 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 6.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank11 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 6.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();	

					
					}elseif($terminal == "3" && $tank == "Tank 1.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank1  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 1.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank2  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 2.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank3  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 2.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank4  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();		
					}elseif($terminal == "3" && $tank == "Tank 3.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank5  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 3.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank6  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 4.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank7  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 4.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank8  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 5.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank9  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 5.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank10 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 6.A"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank11 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 6.B"){
						$cektabel_prdi = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_produksi  where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();

					}

					
            		$data = array(
	                  		'po_number' 					=> $po_number,
							'no_bc' 						=> $no_bc,
							'tanggal_bc'  					=> $tanggal_bc,
							'kode_barang' 					=> $keterangan,
							'nama_barang' 					=> $hasil_awal->nama_brg,
							'satuan' 						=> $hasil_awal->uom,
							'Jumlah' 						=> $qty,
							'Nilai' 						=> '-',
							'activation_date' 	 			=> $created_at,
							'status' 	 					=> 1,
							'asal_terminal_terapung' 	 	=> $hasil_terminal_asal->terminal,
							'asal_terminal_tank' 	 		=> $tank,
							'info_stok' 	 				=> $stoktank,
							'tujuan_terminal_terapung' 	 	=> $hasil_terminal_tujuan->terminal,
							'tujuan_terminal_tank' 	 		=> $tank2

	                );

					$where = array(
							'id_waste_scrap' 	=> $id
					);

              		$this->model_global->update_data($where,$data,'waste_scrap');

              		$data = array(
	                  		'po_number' 					=> $po_number,
							'kode_barang' 					=> $keterangan,
							'nama_barang'   				=> $hasil_awal->nama_brg,
							'satuan' 						=> $hasil_awal->uom,
							'saldo_awal' 					=> $cektabel_prdi->hasil,
							'pemasukan' 					=> 0,
							'pengeluaran' 					=> $qty,
							'saldo_akhir' 					=> 0,
							'username'          			=> $username,
							'activation_date' 				=> $created_at,
							'status' 	 					=> 1,
							'asal_terminal_terapung' 	 	=> $hasil_terminal_asal->terminal,
							'asal_terminal_tank' 	 		=> $tank,
							'info_stok' 	 				=> $stoktank,
							'tujuan_terminal_terapung' 	 	=> $hasil_terminal_tujuan->terminal,
							'tujuan_terminal_tank' 	 		=> $tank2
	                );

					$where = array(
							'id_mutasi_produksi'			=> $id
					);

              		$this->model_global->update_data($where,$data,'mutasi_produksi');
              		$id_mutasi_produksi = $this->db->insert_id();

              		if($terminal == "1" && $tank == "Tank 1.A"){
						$cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 1.B"){
						$cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 2.A"){
						$cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 2.B"){
						$cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();		
					}elseif($terminal == "1" && $tank == "Tank 3.A"){
						$cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 3.B"){
						$cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 4.A"){
						$cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 4.B"){
						$cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 5.A"){
						$cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 5.B"){
						$cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 6.A"){
						$cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "1" && $tank == "Tank 6.B"){
						$cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();

					}elseif($terminal == "2" && $tank == "Tank 1.A"){
						$cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 1.B"){
						$cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 2.A"){
						$cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 2.B"){
						$cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();		
					}elseif($terminal == "2" && $tank == "Tank 3.A"){
						$cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 3.B"){
						$cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 4.A"){
						$cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 4.B"){
						$cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 5.A"){
						$cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 5.B"){
						$cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 6.A"){
						$cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "2" && $tank == "Tank 6.B"){
						$cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();	

					
					}elseif($terminal == "3" && $tank == "Tank 1.A"){
						$cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 1.B"){
						$cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 2.A"){
						$cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 2.B"){
						$cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();		
					}elseif($terminal == "3" && $tank == "Tank 3.A"){
						$cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 3.B"){
						$cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 4.A"){
						$cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 4.B"){
						$cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 5.A"){
						$cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 5.B"){
						$cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 6.A"){
						$cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
					}elseif($terminal == "3" && $tank == "Tank 6.B"){
						$cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_produksi  where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();

					}

              		$data_mutasi = array(
								'saldo_akhir' 	 		=> $cektabel->hasil
							);

					$where_mutasi = array(
								'id_mutasi_produksi' 	=> $id_mutasi_produksi
							);


					$this->model_global->update_data($where_mutasi,$data_mutasi,'mutasi_produksi');

              		}

              		$assign_type= '';
				activity_log("Pemasukan -> waste_scrap", "Menambah data waste_scrap", $assign_type, $assign_type);

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

	public function VlidasiData(){
		$KeteranganBarang 	= $_POST['KeteranganBarang'];
		$terminal 			= $_POST['terminal'];
		$tank 				= $_POST['tank'];

		$where_terminal = array('id_terminal' => $terminal);
		$hasil_terminal = $this->model_global->edit_data($where_terminal,'ref_terminal')->row();

		if($terminal == "1" && $tank == "Tank 1.A"){
			$cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 1.B"){
			$cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 2.A"){
			$cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 2.B"){
			$cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();		
		}elseif($terminal == "1" && $tank == "Tank 3.A"){
			$cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 3.B"){
			$cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 4.A"){
			$cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 4.B"){
			$cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 5.A"){
			$cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 5.B"){
			$cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 6.A"){
			$cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 6.B"){
			$cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();

		}elseif($terminal == "2" && $tank == "Tank 1.A"){
			$cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 1.B"){
			$cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 2.A"){
			$cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 2.B"){
			$cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();		
		}elseif($terminal == "2" && $tank == "Tank 3.A"){
			$cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 3.B"){
			$cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 4.A"){
			$cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 4.B"){
			$cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 5.A"){
			$cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 5.B"){
			$cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 6.A"){
			$cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 6.B"){
			$cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();	

		
		}elseif($terminal == "3" && $tank == "Tank 1.A"){
			$cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 1.B"){
			$cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 2.A"){
			$cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 2.B"){
			$cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();		
		}elseif($terminal == "3" && $tank == "Tank 3.A"){
			$cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 3.B"){
			$cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 4.A"){
			$cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 4.B"){
			$cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 5.A"){
			$cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 5.B"){
			$cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 6.A"){
			$cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 6.B"){
			$cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_produksi where id_barang = '$KeteranganBarang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();

		}elseif($terminal == "0" && $tank == "0"){
			$cektabel = 0;

		}


		echo json_encode($cektabel->hasil);
    }


}
?>
