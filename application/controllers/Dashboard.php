<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function __construct()
        {
                parent::__construct();
                $this->load->model('Model_notif');
        }



  public function index() {
    if($this->session->userdata('name_user') and $this->session->userdata('username')){
      /*$data = array('contents' => 'Layouts/home'
              );*/
          
              
          $whereget   = array('status' => 1);
          $dataget    = $this->Model_notif->edit_data($whereget,'ref_terminal')->row();
          $data_color = $this->Model_notif->getAll('ref_css')->result();
          $this->db->select('*');
          $this->db->from('ref_terminal_tank');
          $this->db->limit(10);
          $query      = $this->db->get();
          $data_tank  = $query->result();

          

      $data = array('contents' =>'Layouts/home',
              'data'        => $this->Model_notif->tampil_data()->result(),
              'dataget'     => $dataget,
              'data_color'  => $data_color,
              'data_tank'   => $data_tank
            );
      
      $this->load->view('Layouts/warper',$data);
    }else{
      $this->load->view('Layouts/login');
    }

  }


      public function notif_Discharging(){
          $dataDischarging  = $this->db->query("SELECT * FROM tr_notif where id_subactivity ='3' and status = '0' ")->result();
            $data = array(
              'dataDischarging' => $dataDischarging
              );
              $this->load->view('Dashboard/Notif/discharging',$data);
          }


      public function notif_Loading(){
          $dataLoading = $this->db->query("SELECT * FROM tr_notif where id_subactivity ='4' and status = '0' ")->result();
            $data = array(
              'dataLoading' => $dataLoading
              );
              $this->load->view('Dashboard/Notif/loading',$data);
          }

          public function notif_approve_barang_masuk(){
          $dataDischarging  = $this->db->query("SELECT * FROM barang_masuk_realisasi where status = '3' group by no_transaksi ")->result();
            $data = array(
              'dataDischarging' => $dataDischarging
              );
              $this->load->view('Dashboard/Notif/barang_masuk',$data);
          }


      public function notif_approve_barang_keluar(){
          $dataLoading = $this->db->query("SELECT * FROM barang_keluar_realisasi where status = '3' group by no_transaksi ")->result();
            $data = array(
              'dataLoading' => $dataLoading
              );
              $this->load->view('Dashboard/Notif/barang_keluar',$data);
          }


  public function index_dashboard(){
    if($this->session->userdata('name_user') and $this->session->userdata('username')){
      if($this->model_user_access->access_access() == 1){
        $data = array('contents' => 'Dashboard/Dashboard/index'
              );
        $this->load->view('Layouts/warper',$data);
      }else{
        $this->load->view('Layouts/error-404');
      }
    }else{
      $this->load->view('Layouts/login');
    }
  }

  public function get_login() {

    $username = addslashes($this->input->post('username'));
    $password = addslashes($this->input->post('password'));
    $passMD5 =  hash('sha256', $password);

    $query_data = $this->db->get_where('ref_user', array('username' => $username, 'password' => $passMD5));


    if($query_data->num_rows() > 0){
      $name_user = $query_data->row()->name_user;
      $username = $query_data->row()->username;
      $id_group = $query_data->row()->id_group;
      $id_perusahaan = $query_data->row()->id_perusahaan;
      $id_user = $query_data->row()->id_user;
      $ip = addslashes($this->input->ip_address());
      $created_at = addslashes(date("Y-m-d H:i:s"));

      /*$data = array(
          'id_user' => $id_user,
          'status' => 'Sign In',
          'ip_address' => $ip,
          'created_at' => $created_at
          );

      $this->db->insert('ref_log_access',$data);*/

      $this->session->set_userdata('name_user',$name_user);
      $this->session->set_userdata('username',$username);
      $this->session->set_userdata('id_group',$id_group);
      $this->session->set_userdata('id_perusahaan',$id_perusahaan);
      $this->session->set_userdata('id_user',$id_user);

      $query_user_access = $this->db->get_where('ref_user_access', array('id_group' => $id_group))->result();
      /*$data_user_access = array($query_user_access);*/
      $this->session->set_userdata('data_user_access',$query_user_access);

      $this->db->select('*');
      $this->db->from('ref_module');
      $this->db->join('ref_user_access', 'ref_user_access.id_module = ref_module.id_module');
      $this->db->where('id_group',$id_group);
      $this->db->order_by("sort", "asc");
      $query_menu = $this->db->get()->result();

      $this->session->set_userdata('query_menu',$query_menu);

      $data_contents = array('contents' => 'test');

      redirect('dashboard');;
    }else{
             $this->session->set_flashdata('failed', 'Username / Password Salah');
      redirect('login');
    }


  }

  public function get_menu(){
    /*$data = array('listMenu' => $this->model_menu->list_menu());
    print_r($data);
    exit();*/
    /*$this->load->view('test');*/
    /*$parent = "0";
    $hasil = "";
    echo $this->model_menu->menu($parent,$hasil);*/
    $array = $this->db->query("SELECT * from ref_module")->result();
    $parent_id = "0";
    $parents = array();
    echo $this->model_menu->bootstrap_menu($array,$parent_id,$parents);
    exit();


  }

  public function get_data(){
    print_r($this->session->userdata('query_menu'));
    exit();


  }

  public function get_logout() {
      $id_user = $this->session->userdata('id_user');
      $ip = addslashes($this->input->ip_address());
      $created_at = addslashes(date("Y-m-d H:i:s"));

      /*$data = array(
          'id_user' => $id_user,
          'status' => 'Sign Out',
          'ip_address' => $ip,
          'created_at' => $created_at
          );

      $this->db->insert('ref_log_access',$data);*/
     $this->session->sess_destroy();
     $this->session->unset_userdata('query_menu',$query_menu);
     redirect('dashboard');
  }

  public function get_android() {
     $this->session->sess_destroy();
     $this->session->unset_userdata('query_menu',$query_menu);
     redirect('dashboard');
  }

    public function teng(){
        $this->load->helper('dompdf');
        /*$data['ijazah'] = $this->db->query("SELECT * from ijasah_mahasiswa where id = '$id'")->row();
      $name_file = $this->db->query("SELECT * from ijasah_mahasiswa where id = '$id'")->row();*/
      $data['image'] = "<img src='http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=sd' width='71' height='71'>";

      $html = $this->load->view('pdf_output', $data, true);
      $filename = "d";
      $paper = 'A4';
      $orientation = 'landscape';
      pdf_create($html, $filename, $paper, $orientation);
    }

    public function pdf(){
        $this->load->helper('dompdf');
        /*$data['ijazah'] = $this->db->query("SELECT * from ijasah_mahasiswa where id = '$id'")->row();
      $name_file = $this->db->query("SELECT * from ijasah_mahasiswa where id = '$id'")->row();*/
      $data['image'] = "<img src='http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=sd' width='71' height='71'>";

      /*$this->load->view('pdf_transkip_nilai', $data);*/
      $html = $this->load->view('pdf_transkip_nilai', $data, true);
      $filename = "Transkip Nilai";
      $paper = 'A4';
      $orientation = 'potrait';
      pdf_create($html, $filename, $paper, $orientation);
    }



}
