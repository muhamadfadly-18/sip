<?php
class StockOpname  extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_global');
    }


    function index()
    {
        if ($this->session->userdata('name_user') and $this->session->userdata('username')) {
            if ($this->model_user_access->access_access() == 1) {
                $resultData = $this->db->query('SELECT * FROM tb_opname_barang')->result();

                $data = array(
                    'contents' => 'Dashboard/StockOpname/index',
                    'resultData' => $resultData,
                );

                $this->load->view('Layouts/warper', $data);
            } else {
                $this->load->view('Layouts/error-404');
            }
        } else {
            session_destroy();
            redirect('dashboard');
        }
    }

    public function add()
    {
        if ($this->session->userdata('name_user') and $this->session->userdata('username')) {
            if ($this->model_user_access->access_add() == 1) {


                $data = array(
                    'contents' => 'Dashboard/V_Tarif_Excort/add',
                    // 'select_subactivity' => $this->model_global->select_subactivity()->result(),
                    // 'select_activity' => $this->model_global->select_activity()->result(),
                    'select_activity' => $this->model_global->fetch_activity(),

                );

                $this->load->view('Layouts/warper', $data);
            } else {
                $this->load->view('Layouts/error-404');
            }
        } else {
            session_destroy();
            redirect('dashboard');
        }
    }


    // public function select_subactivity()
    // {
    //     if ($this->input->post('id_activity')) {
    //         echo $this->Model_global->select_subactivity($this->input->post('id_activity'));
    //     }
    // }


    public function add_action()
    {
        if ($this->session->userdata('name_user') and $this->session->userdata('username')) {
            if ($this->model_user_access->access_add() == 1) {

                $id_barang = addslashes($this->input->post('keterangan'));
                // $id_barang = addslashes($this->input->post('id_barang'));
                $book = addslashes($this->input->post('book'));
                $real = addslashes($this->input->post('real'));
                $diff = addslashes($this->input->post('diff'));
                $deskripsi = addslashes($this->input->post('deskripsi'));
                // $id_group  = addslashes($this->input->post('id_group'));
                $created_at     = addslashes(date("Y-m-d H:i:s"));

                $where_awal = array('id_barang' => $keterangan);
                $hasil_awal = $this->model_global->edit_data($where_awal, 'barang')->row();

                $data = array(
                    'keterangan'  => $keterangan,
                    'id_barang'   => $id_barang,
                    'book' => $book,
                    'real' => $real,
                    'diff' => $diff,
                    'deskripsi' => $deskripsi,
                    'id_group' => 1,
                    'created_at' => $created_at,

                );


                $this->model_global->input_data($data, 'tb_opname_barang');

                $this->session->set_flashdata('succeed', 'Data pengguna baru telah di Tambah.');
                redirect('StockOpname');
            } else {
                $this->load->view('Layouts/error-404');
            }
        } else {
            session_destroy();
            redirect('dashboard');
        }
    }

    // public function edit($id)
    // {
    //     if ($this->session->userdata('name_user') and $this->session->userdata('username')) {
    //         if ($this->model_user_access->access_edit() == 1) {
    //             $where = array('id_tarif_ExcortGuardServices' => $id);
    //             $resultData = $this->model_global->edit_data($where, 'ref_tarif_excortguardservices')->row();
    //             $wheresub = array('id_subactivity' => $resultData->id_subactivity);

    //             $data = array(
    //                 'contents' =>
    //                 'Dashboard/V_Tarif_Excort/edit',
    //                 'resultData' => $resultData,
    //                 'select_activity' => $this->model_global->select_activity(),
    //                 'select_subactivity' => $this->model_global->edit_data($wheresub, 'ref_subactivity')->result(),
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

    // public function update($id)
    // {
    //     if ($this->session->userdata('name_user') and $this->session->userdata('username')) {
    //         if ($this->model_user_access->access_edit() == 1) {

    //             $id_activity = addslashes($this->input->post('id_activity'));
    //             $id_subactivity = addslashes($this->input->post('id_subactivity'));
    //             $judul = addslashes($this->input->post('judul'));
    //             $nilai = addslashes($this->input->post('nilai'));
    //             $tarif = addslashes($this->input->post('tarif'));
    //             $description = addslashes($this->input->post('description'));


    //             $data = array(
    //                 'id_activity' => $id_activity,
    //                 'id_subactivity' => $id_subactivity,
    //                 'judul' => $judul,
    //                 'nilai' => $nilai,
    //                 'tarif' => $tarif,
    //                 'description' => $description

    //             );


    //             $where = array(
    //                 'id_tarif_ExcortGuardServices' => $id
    //             );




    //             $this->model_global->update_data($where, $data, 'ref_tarif_excortguardservices');

    //             $this->session->set_flashdata('succeed', 'Data pengguna baru telah di simpan.');
    //             redirect('Excort');
    //         } else {
    //             $this->load->view('Layouts/error-404');
    //         }
    //     } else {
    //         session_destroy();
    //         redirect('dashboard');
    //     }
    // }


    // function detail($id){
    // 	if($this->session->userdata('name_user') and $this->session->userdata('username')){
    // 		if($this->model_user_access->access_access() == 1){

    // 			$where = array('id_terminal' => $id);
    // 			$data_terminal = $this->model_global->edit_data($where,'ref_terminal_tank')->result();

    // 			$data = array(
    //                 'contents' => 'Dashboard/Terminaltank/index',
    // 				'id_terminal' => $id,
    //                 'data_terminal' => $data_terminal
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


    // public function delete($id)
    // {
    //     if ($this->session->userdata('name_user') and $this->session->userdata('username')) {
    //         if ($this->model_user_access->access_delete() == 1) {
    //             $where = array('id_tarif_ExcortGuardServices' => $id);

    //             $this->model_global->hapus_data($where, 'ref_tarif_excortguardservices');

    //             $this->session->set_flashdata('succeed', 'Satu data pengguna telah di hapus.');
    //             redirect('Excort');
    //         } else {
    //             $this->load->view('Layouts/error-404');
    //         }
    //     } else {
    //         session_destroy();
    //         redirect('dashboard');
    //     }
    // }

    public function Validasibarang()
    {
        $OpnameBarang = $_POST['OpnameBarang'];

        if ($OpnameBarang == 0) {

            $cektabel = 0;


            echo json_encode($cektabel);
        } else {

            $cektabel = $this->db->query("SELECT stok FROM tb_opname_barang where id_barang = '$OpnameBarang' ")->row();


            echo json_encode($cektabel->stok);
        }
    }
}
