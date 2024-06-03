<?php
class LapNS extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('model_LapNS');
 
	}

	
	function index(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_access() == 1){

				$bulan  = addslashes($this->input->post('bulan'));
          		$tahun  = addslashes($this->input->post('tahun'));

          		$data_ns = $this->db->query("SELECT * FROM jurnal_umum WHERE MONTH(tgl_insert) = '$bulan' AND YEAR(tgl_insert) = '$tahun' ")->result();

				$data = array(
								'contents' => 'Dashboard/LapNS/index',
								'data_ns'  => $data_ns
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
 
}
?>
