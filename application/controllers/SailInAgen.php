<?php
class SailInAgen  extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Model_SailInAgen');

	}


	function index(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_access() == 1){

				$data = array(
								'contents' => 'Dashboard/SailInAgen/index',
                'data' => $this->Model_SailInAgen->tampil_data()->result()


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

				$data = array(
							   'contents' => 'Dashboard/SailInAgen/add'
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

  public function view($id){
    if($this->session->userdata('name_user') and $this->session->userdata('username')){
      if($this->model_user_access->access_edit() == 1){
        $where = array('id_reg_vessel' => $id);
        $data = array( 	'contents' => 'Dashboard/SailInAgen/view',
                'data' => $this->Model_SailInAgen->edit_data($where,'ref_register_vessel')->row()
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
