<?php
class dashboard_v1  extends CI_Controller{

	// function __construct(){
	// 	parent::__construct();
	// 	$this->load->model('');

	// }



	function index(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_access() == 1){

				$db_obj = $this->load->database('uat', TRUE);

				$DataDashboard = $this->db->query("SELECT * FROM ref_dashboard")->result();         
				$DataCustomer = $db_obj->query("SELECT pemilik_kapal FROM view_register GROUP BY pemilik_kapal ")->result();
				$DataAgen = $db_obj->query("SELECT local_agen FROM view_register GROUP BY local_agen")->result();
				$DataActivity = $db_obj->query("SELECT tanggal_job_order,nama_activity FROM view_register GROUP BY tanggal_job_order, nama_activity")->result();
				$data = array('contents' => 'Dashboard/V_dashboard_v1/index',
								'DataDashboard' => $DataDashboard,
								'DataCustomer' => $DataCustomer,
								'DataAgen' => $DataAgen,
								'DataActivity' => $DataActivity,
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
