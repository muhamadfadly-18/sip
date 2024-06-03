<?php
class PemasukanProduksi  extends CI_Controller{
 
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
					
					$data_real = $this->db->query("SELECT * FROM production WHERE cast(activation_date as date) BETWEEN '$for_tgl_awal' AND '$for_tgl_akhir' ")->result();
					
				}else{

					$data_real	= $this->Model_PemasukanProduksi->tampil_data_prod()->result();
				}


				$data = array('contents' => 'Dashboard/PemasukanProduksi/index',
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
				$where = array('jenis' => 'Subcon');
				$client				= $this->model_global->edit_data($where,'ref_client')->result();

				$id_group 	= $this->session->userdata('id_group');
				$whereTer = array('id_group' => $id_group);

				$barang           	= $this->model_global->edit_data($whereTer,'barang_produksi')->result();
				$terminal			= $this->model_global->edit_data($whereTer,'ref_terminal')->result();

				$data = array('contents' 	=> 'Dashboard/PemasukanProduksi/add',
							  'client' 	 	=> $client,
							  'barang' 	 	=> $barang,
							  'terminal' 	=> $terminal
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

		}


		echo json_encode($cektabel->hasil);
    }

	public function add_action(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_add() == 1){
				$po_number 			= addslashes($this->input->post('po_number'));
				$no_pengeluaran 	= addslashes($this->input->post('no_pengeluaran'));
				$tanggal_production = addslashes($this->input->post('tanggal_production'));
				$id_subcon 		= addslashes($this->input->post('id_subcon'));
				$nama_subcon 	= addslashes($this->input->post('nama_subcon'));
				$username 		= $this->session->userdata('username');
				$created_at     = addslashes(date("Y-m-d H:i:s"));
				
				$limit_pk = addslashes($this->input->post('limit_pk'));

				/*print_r($data);
				echo "-------------";
				echo $limit_pk;
				die();*/


            	for ($i=0; $i < $limit_pk; $i++) {
            		$keterangan = addslashes($this->input->post('keterangan'.$i));
            		$qty = addslashes($this->input->post('qty'.$i));
            		$terminal = addslashes($this->input->post('terminal'.$i));
            		$tank = addslashes($this->input->post('tank'.$i));
            		$stoktank = addslashes($this->input->post('stoktank'.$i));
            		$terminal2 = addslashes($this->input->post('terminal2'.$i));
            		$tank2 = addslashes($this->input->post('tank2'.$i));

            		$where_awal = array('id_barang' => $keterangan);
					$hasil_awal = $this->model_global->edit_data($where_awal,'barang_produksi')->row();

					$where_terminal_asal = array('id_terminal' => $terminal);
					$hasil_terminal_asal = $this->model_global->edit_data($where_terminal_asal,'ref_terminal')->row();

					$where_terminal_tujuan = array('id_terminal' => $terminal2);
					$hasil_terminal_tujuan = $this->model_global->edit_data($where_terminal_tujuan,'ref_terminal')->row();
            		
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
			$cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();

		}

		if($terminal == "1" && $tank == "Tank 1.A"){
			$cektabel_brg = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 1.B"){
			$cektabel_brg = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 2.A"){
			$cektabel_brg = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 2.B"){
			$cektabel_brg = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();		
		}elseif($terminal == "1" && $tank == "Tank 3.A"){
			$cektabel_brg = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 3.B"){
			$cektabel_brg = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 4.A"){
			$cektabel_brg = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 4.B"){
			$cektabel_brg = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 5.A"){
			$cektabel_brg = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 5.B"){
			$cektabel_brg = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 6.A"){
			$cektabel_brg = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 6.B"){
			$cektabel_brg = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();

		}elseif($terminal == "2" && $tank == "Tank 1.A"){
			$cektabel_brg = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 1.B"){
			$cektabel_brg = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 2.A"){
			$cektabel_brg = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 2.B"){
			$cektabel_brg = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();		
		}elseif($terminal == "2" && $tank == "Tank 3.A"){
			$cektabel_brg = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 3.B"){
			$cektabel_brg = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 4.A"){
			$cektabel_brg = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 4.B"){
			$cektabel_brg = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 5.A"){
			$cektabel_brg = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 5.B"){
			$cektabel_brg = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 6.A"){
			$cektabel_brg = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 6.B"){
			$cektabel_brg = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();	

		
		}elseif($terminal == "3" && $tank == "Tank 1.A"){
			$cektabel_brg = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 1.B"){
			$cektabel_brg = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 2.A"){
			$cektabel_brg = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 2.B"){
			$cektabel_brg = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();		
		}elseif($terminal == "3" && $tank == "Tank 3.A"){
			$cektabel_brg = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 3.B"){
			$cektabel_brg = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 4.A"){
			$cektabel_brg = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 4.B"){
			$cektabel_brg = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 5.A"){
			$cektabel_brg = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 5.B"){
			$cektabel_brg = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 6.A"){
			$cektabel_brg = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 6.B"){
			$cektabel_brg = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();

		}

            		$data_limit_pk = array(
	                  		'po_number' 			=> $po_number,
							'bukti_pengeluaran_no' 	=> $no_pengeluaran,
							'tanggal_production'   	=> $tanggal_production,
							'kode_barang' 			=> $keterangan,
							'nama_barang' 			=> $hasil_awal->nama_brg,
							'satuan' 				=> $hasil_awal->uom,
							'digunakan' 			=> $qty,
							'disubkontrakkan' 		=> $nama_subcon,
							'penerima_subkontrak' 	=> '-',
							'username' 	 			=> $username,
							'activation_date' 	 	=> $created_at,
							'asal_terminal_terapung' 	 	=> $hasil_terminal_asal->terminal,
							'asal_terminal_tank' 	 		=> $tank,
							'info_stok' 	 				=> $stoktank,
							'tujuan_terminal_terapung' 	 	=> $hasil_terminal_tujuan->terminal,
							'tujuan_terminal_tank' 	 		=> $tank2,
							'status' 	 					=> 1

	                );
              		$this->model_global->input_data($data_limit_pk,'production');

              		

              		$data_limit_mutasi = array(
	                  		'po_number' 	=> $po_number,
							'kode_barang' 	=> $keterangan,
							'nama_barang'   => $hasil_awal->nama_brg,
							'satuan' 		=> $hasil_awal->uom,
							'saldo_awal' 	=> $cektabel->hasil,
							'pemasukan' 	=> $qty,
							'pengeluaran' 	=> 0,
							'saldo_akhir' 	=> 0,
							'username' 	 		=> $username,
							'activation_date' 	=> $created_at,
							'status' 	 		=> 1,
							'asal_terminal_terapung' 	 	=> $hasil_terminal_asal->terminal,
							'asal_terminal_tank' 	 		=> $tank,
							'info_stok' 	 				=> $stoktank,
							'tujuan_terminal_terapung' 	 	=> $hasil_terminal_tujuan->terminal,
							'tujuan_terminal_tank' 	 		=> $tank2

	                );
              		$this->model_global->input_data($data_limit_mutasi,'mutasi_produksi');

              		$data_limit_mutasibahan = array(
	                  		'po_number' 	=> $po_number,
							'kode_barang' 	=> $keterangan,
							'nama_barang'   => $hasil_awal->nama_brg,
							'satuan' 		=> $hasil_awal->uom,
							'saldo_awal' 	=> $cektabel_brg->hasil,
							'pemasukan' 	=> 0,
							'pengeluaran' 	=> $qty,
							'saldo_akhir' 	=> 0,
							'username' 	 		=> $username,
							'activation_date' 	=> $created_at,
							'status' 	 		=> 1,
							'terminal_terapung'	=> $hasil_terminal_asal->terminal,
							'terminal_tank' 	=> $tank

	                );
              		$this->model_global->input_data($data_limit_mutasibahan,'mutasi_bahan');

              		

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
			$cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_produksi where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();

		}

              		$data_mutasi = array(
								'saldo_akhir' 	 		=> $cektabel->hasil
							);

					$where_mutasi = array(
								'po_number' 	=> $po_number,
								'kode_barang' 	=> $keterangan
							);


					$this->model_global->update_data($where_mutasi,$data_mutasi,'mutasi_produksi');

		if($terminal == "1" && $tank == "Tank 1.A"){
			$cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 1.B"){
			$cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 2.A"){
			$cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 2.B"){
			$cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();		
		}elseif($terminal == "1" && $tank == "Tank 3.A"){
			$cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 3.B"){
			$cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 4.A"){
			$cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 4.B"){
			$cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 5.A"){
			$cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 5.B"){
			$cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 6.A"){
			$cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 6.B"){
			$cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();

		}elseif($terminal == "2" && $tank == "Tank 1.A"){
			$cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 1.B"){
			$cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 2.A"){
			$cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 2.B"){
			$cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();		
		}elseif($terminal == "2" && $tank == "Tank 3.A"){
			$cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 3.B"){
			$cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 4.A"){
			$cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 4.B"){
			$cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 5.A"){
			$cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 5.B"){
			$cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 6.A"){
			$cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 6.B"){
			$cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();	

		
		}elseif($terminal == "3" && $tank == "Tank 1.A"){
			$cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 1.B"){
			$cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 2.A"){
			$cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 2.B"){
			$cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();		
		}elseif($terminal == "3" && $tank == "Tank 3.A"){
			$cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 3.B"){
			$cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 4.A"){
			$cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 4.B"){
			$cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 5.A"){
			$cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 5.B"){
			$cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 6.A"){
			$cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 6.B"){
			$cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();

		}


					$data_mutasi = array(
								'saldo_akhir' 	 => $cektabel->hasil
							);

					$where_mutasi = array(
								'po_number' 	=> $po_number,
								'kode_barang' 	=> $keterangan
							);


					$this->model_global->update_data($where_mutasi,$data_mutasi,'mutasi_bahan');			

					/*if($terminal == "1" && $tank == "Tank 1.A"){
			$cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 1.B"){
			$cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 2.A"){
			$cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 2.B"){
			$cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();		
		}elseif($terminal == "1" && $tank == "Tank 3.A"){
			$cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 3.B"){
			$cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 4.A"){
			$cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 4.B"){
			$cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 5.A"){
			$cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 5.B"){
			$cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 6.A"){
			$cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 6.B"){
			$cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();

		}elseif($terminal == "2" && $tank == "Tank 1.A"){
			$cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 1.B"){
			$cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 2.A"){
			$cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 2.B"){
			$cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();		
		}elseif($terminal == "2" && $tank == "Tank 3.A"){
			$cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 3.B"){
			$cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 4.A"){
			$cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 4.B"){
			$cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 5.A"){
			$cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 5.B"){
			$cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 6.A"){
			$cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 6.B"){
			$cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();	

		
		}elseif($terminal == "3" && $tank == "Tank 1.A"){
			$cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 1.B"){
			$cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 2.A"){
			$cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 2.B"){
			$cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();		
		}elseif($terminal == "3" && $tank == "Tank 3.A"){
			$cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 3.B"){
			$cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 4.A"){
			$cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 4.B"){
			$cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 5.A"){
			$cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 5.B"){
			$cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 6.A"){
			$cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 6.B"){
			$cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();

		}

					$data_limit_mutasi = array(
	                  		'po_number' 	=> $po_number,
							'kode_barang' 	=> $keterangan,
							'nama_barang'   => $hasil_awal->nama_brg,
							'satuan' 		=> $hasil_awal->uom,
							'saldo_awal' 	=> $cektabel->hasil,
							'pemasukan' 	=> 0,
							'pengeluaran' 	=> $qty,
							'saldo_akhir' 	=> 0,
							'username' 	 		=> $username,
							'activation_date' 	=> $created_at,
							'status' 	 		=> 1,
							'terminal_terapung'	=> $hasil_terminal_asal->terminal,
							'terminal_tank' 	=> $tank

	                );
              		$this->model_global->input_data($data_limit_mutasi,'mutasi_bahan');


        			$id_mutasi_bahan = $this->db->insert_id();

        if($terminal == "1" && $tank == "Tank 1.A"){
			$cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 1.B"){
			$cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 2.A"){
			$cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 2.B"){
			$cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();		
		}elseif($terminal == "1" && $tank == "Tank 3.A"){
			$cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 3.B"){
			$cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 4.A"){
			$cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 4.B"){
			$cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 5.A"){
			$cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 5.B"){
			$cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 6.A"){
			$cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "1" && $tank == "Tank 6.B"){
			$cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();

		}elseif($terminal == "2" && $tank == "Tank 1.A"){
			$cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 1.B"){
			$cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 2.A"){
			$cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 2.B"){
			$cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();		
		}elseif($terminal == "2" && $tank == "Tank 3.A"){
			$cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 3.B"){
			$cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 4.A"){
			$cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 4.B"){
			$cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 5.A"){
			$cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 5.B"){
			$cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 6.A"){
			$cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "2" && $tank == "Tank 6.B"){
			$cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();	

		
		}elseif($terminal == "3" && $tank == "Tank 1.A"){
			$cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 1.B"){
			$cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 2.A"){
			$cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 2.B"){
			$cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();		
		}elseif($terminal == "3" && $tank == "Tank 3.A"){
			$cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 3.B"){
			$cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 4.A"){
			$cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 4.B"){
			$cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 5.A"){
			$cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 5.B"){
			$cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 6.A"){
			$cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
		}elseif($terminal == "3" && $tank == "Tank 6.B"){
			$cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();

		}


					$data_mutasi = array(
								'saldo_akhir' 	 	=> $cektabel->hasil
							);

					$where_mutasi = array(
								'id_mutasi_bahan' 	=> $id_mutasi_bahan
							);


					$this->model_global->update_data($where_mutasi,$data_mutasi,'mutasi_bahan');*/

        }

              		$assign_type= '';
				activity_log("Pemasukan -> Pemasukan Produksi", "Menambah data Pemasukan Produksi", $assign_type, $assign_type);

				$this->session->set_flashdata('succeed', 'Data baru telah di simpan.');
				redirect('PemasukanProduksi');
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
				redirect('PemasukanProduksi');
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
				$data = array( 	'contents' => 'Dashboard/PemasukanProduksi/edit',
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
				redirect('PemasukanProduksi');
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
