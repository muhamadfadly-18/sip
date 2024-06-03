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
                $limit_pk = addslashes($this->input->post('limit_pk'));
                for ($i = 0; $i < $limit_pk; $i++) {

                    $id_barang = addslashes($this->input->post('id_barang' . $i));
                    $book = addslashes($this->input->post('book' . $i));
                    $real = addslashes($this->input->post('real' . $i));
                    $diff = addslashes($this->input->post('diff' . $i));
                    $deskripsi = addslashes($this->input->post('deskripsi' . $i));
                    $created_at     = addslashes(date("Y-m-d H:i:s"));


                    $data = array(
                        'id_barang'   => $id_barang,
                        'book' => $book,
                        'real' => $real,
                        'diff' => $diff,
                        'deskripsi' => $deskripsi,
                        'id_group' => 1,
                        'created_at' => $created_at,

                    );

                    $this->model_global->input_data($data, 'tb_opname_barang');
                }

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
