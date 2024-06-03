<?php
class User  extends CI_Controller{
 
  function __construct(){
    parent::__construct();    
    $this->load->model('model_user');
 
  }

  
  function index(){
    if($this->session->userdata('name_user') and $this->session->userdata('username')){
      if($this->model_user_access->access_access() == 1){
        $data = array(
                'contents' => 'Dashboard/Users/index',
                  'data_user' => $this->model_user->tampil_data()->result()
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
                $select_client            = $this->db->query("SELECT * FROM ref_client")->result();

        $data = array(
              'contents' => 'Dashboard/Users/add',
              'select_group' => $this->model_user->select_group()->result(),
              'select_client' => $select_client
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
        $id_group = addslashes($this->input->post('id_group'));
        $name_user = addslashes($this->input->post('name_user'));
        $client = addslashes($this->input->post('client'));
        $username = addslashes($this->input->post('username'));
        $password = hash('sha256', $this->input->post('password'));
        $created_at = addslashes(date("Y-m-d H:i:s"));
     
        $data = array(
              'id_group' => $id_group,
              'name_user' => $name_user,
              'username' => $username,
              'id_perusahaan' => $client,
              'password' => $password,
              'created_at' => $created_at
              );
              
        $this->model_user->input_data($data,'ref_user');

        $this->session->set_flashdata('succeed', 'Data pengguna baru telah di simpan.');
        redirect('user');
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
        $where = array('id_user' => $id);
        $this->model_user->hapus_data($where,'ref_user');

        $this->session->set_flashdata('succeed', 'Satu data pengguna telah di hapus.');
        redirect('user');
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
        $where = array('id_user' => $id);
                $select_client            = $this->db->query("SELECT * FROM ref_client")->result();

        $data = array(  'contents' => 'Dashboard/Users/edit',
                'data_user' => $this->model_user->edit_data($where,'ref_user')->row(),
                'select_group' => $this->model_user->select_group()->result(),
                'select_client' => $select_client
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

  public function update($id_user){
    if($this->session->userdata('name_user') and $this->session->userdata('username')){
      if($this->model_user_access->access_edit() == 1){
        
        if(!empty($this->input->post('password'))){
          $id_group = addslashes($this->input->post('id_group'));
          $name_user = addslashes($this->input->post('name_user'));
          $client = addslashes($this->input->post('client'));
          $username = addslashes($this->input->post('username'));
          $password = hash('sha256', $this->input->post('password'));
          $modified_at = addslashes(date("Y-m-d H:i:s"));

          $data = array(
                'id_group' => $id_group,
                'name_user' => $name_user,
                'username' => $username,
                'id_perusahaan' => $client,
                'password' => $password,
                'modified_at' => $modified_at
                );

          $where = array(
                  'id_user' => $id_user
                );
         
          $this->model_user->update_data($where,$data,'ref_user');

          $this->session->set_flashdata('succeed', 'Satu data pengguna telah di perbarui.');
          redirect('user');
        }else{
          $id_group = addslashes($this->input->post('id_group'));
          $name_user = addslashes($this->input->post('name_user'));
          $username = addslashes($this->input->post('username'));
          $modified_at = addslashes(date("Y-m-d H:i:s"));

          $data = array(
                'id_group' => $id_group,
                'name_user' => $name_user,
                'username' => $username,
                'modified_at' => $modified_at
                );

          $where = array(
                  'id_user' => $id_user
                );
         
          $this->model_user->update_data($where,$data,'ref_user');

          $this->session->set_flashdata('succeed', 'Satu data pengguna telah di perbarui.');
          redirect('user');
        }
        
     
        
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
