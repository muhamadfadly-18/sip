<?php
class Terminaltank  extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('model_global');
 
	}

	
	// function index(){
	// 	if($this->session->userdata('name_user') and $this->session->userdata('username')){
	// 		if($this->model_user_access->access_access() == 1){
	// 			$resultData = $this->db->query('SELECT * FROM ref_terminal_tank')->result();

	// 			$data = array(
    //                 'contents' => 'Dashboard/Terminaltank/index',
    //                 'data_terminal' => $this->model_global->tampil_data()->result(),
    //             );


    //             $this->load->view('Layouts/warper', $data);
    //         } else {
    //             $this->load->view('Layouts/error-404');
    //         }
    //     } else {
    //         session_destroy();
    //         redirect('dashboard');
    //     }
    // }


    public function add($id_terminal)
    {

                $data = array(
                    'contents' => 'Dashboard/Terminaltank/add',
                    'id_terminal' => $id_terminal,
                    'select_terminal' => $this->model_global->select_terminal()->result(),
                    'id' => $id_terminal
                );

                $this->load->view('Layouts/warper', $data);
            
    }

    public function add_action()
    {
                $tank = addslashes($this->input->post('tank'));
                $id_terminal = addslashes($this->input->post('id_terminal'));



                $data = array(
                    'tank' => $tank,
                    'id_terminal' => $id_terminal,
                    'status' => 1,
                    'id_group' => 1,
                );


                $this->model_global->input_data($data, 'ref_terminal_tank');

                $this->session->set_flashdata('succeed', 'Data pengguna baru Terminal Tank telah di simpan.');
                redirect('Terminal/detail/'.$id_terminal);
            
    }


    public function edit($id)
    {
        
                $where = array('id_tank' => $id);
                $data = array(
                    'contents' => 'Dashboard/Terminaltank/edit',
                    'data' => $this->model_global->edit_data($where, 'ref_terminal_tank')->row(),
                    'select_terminal' => $this->model_global->tampil_data()->result(),
                    'id' => $id


                );
                $this->load->view('Layouts/warper', $data);
            
    }

    public function update($id,$id_terminal)
    {
                $tank = addslashes($this->input->post('tank'));

                $data = array(
                    'tank' => $tank,
                );

                $where = array(
                    'id_tank' => $id,
                );

                $this->model_global->update_data($where, $data, 'ref_terminal_tank');

                $this->session->set_flashdata('succeed', 'Satu Data Terminal Tank telah di perbarui.');
                redirect('Terminal/detail/'.$id_terminal);
           
    }

    public function delete($id, $id_terminal)
    {
        $where = array('id_tank' => $id);
        $this->model_global->hapus_data($where, 'ref_terminal_tank');

        $this->session->set_flashdata('succeed', 'Satu Data Terminal Tank  telah di hapus.');
        redirect('Terminal/detail/'.$id_terminal);
    }
}