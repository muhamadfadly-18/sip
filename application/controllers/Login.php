<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

/*	public function __construct()
        {
                parent::__construct();
                $this->load->model('model_menu');
        }
*/

	
	public function index() {
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			$data = array('contents' => 'Layouts/home'
							);
			$this->load->view('Layouts/warper',$data);
		}else{
			$this->load->view('Layouts/login');	
		}

	}

	
}