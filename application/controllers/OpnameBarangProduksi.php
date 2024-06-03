<?php
class OpnameBarangProduksi  extends CI_Controller
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
                $resultData = $this->db->query('SELECT * FROM tb_opname_barang_produksi')->result();

                $data = array(
                    'contents' => 'Dashboard/OpnameBarangProduksi/index',
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

    public function add_action()
    {
        if ($this->session->userdata('name_user') and $this->session->userdata('username')) {
            if ($this->model_user_access->access_add() == 1) {
                $limit_pk = addslashes($this->input->post('limit_pk'));

                for ($i = 0; $i < $limit_pk; $i++) {
                    $keterangan = addslashes($this->input->post('keterangan' . $i));
                    $id_barang = addslashes($this->input->post('id_barang' . $i));
                    $book = addslashes($this->input->post('book' . $i));
                    $real = addslashes($this->input->post('real' . $i));
                    $diff = addslashes($this->input->post('diff' . $i));
                    $deskripsi = addslashes($this->input->post('deskripsi' . $i));
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
                        'created_at' => $created_at,
                    );


                    $this->model_global->input_data($data, 'tb_opname_barang_produksi');
                }

                $this->session->set_flashdata('succeed', 'Data pengguna baru telah di Tambah.');
                redirect('OpnameBarangProduksi');
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

            $cektabel = $this->db->query("SELECT stok FROM tb_opname_barang_produksi where id_barang = '$OpnameBarang' ")->row();


            echo json_encode($cektabel->stok);
        }
    }
}
