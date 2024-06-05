<?php
class PemasukanRBB  extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_global');
    }



    function index(){
        if ($this->session->userdata('name_user') and $this->session->userdata('username')) {
            if ($this->model_user_access->access_access() == 1) {

                $tgl_awal   = addslashes($this->input->post('tgl_awal'));
                $tgl_akhir  = addslashes($this->input->post('tgl_akhir'));
                $id_group   = $this->session->userdata('id_group');

                $for_tgl_awal = date('Y-m-d', strtotime($tgl_awal));
                $for_tgl_akhir = date('Y-m-d', strtotime($tgl_akhir));


                if (!empty($tgl_awal)) {

                    $data_real = $this->db->query("SELECT * FROM barang_masuk WHERE id_group = '$id_group' AND cast(created_at as date) BETWEEN '$for_tgl_awal' AND '$for_tgl_akhir' GROUP BY no_transaksi ")->result();
                    $data_estimasi = $this->db->query("SELECT * FROM barang_masuk_estimasi WHERE id_group = '$id_group' AND cast(created_at as date) BETWEEN '$for_tgl_awal' AND '$for_tgl_akhir' GROUP BY no_transaksi ")->result();
                    $data_dokumen = $this->db->query("SELECT * FROM barang_masuk_estimasi WHERE id_group = '$id_group' AND cast(created_at as date) BETWEEN '$for_tgl_awal' AND '$for_tgl_akhir' GROUP BY no_transaksi ")->result();
                    $data_realisasi = $this->db->query("SELECT * FROM barang_masuk_realisasi WHERE id_group = '$id_group' AND cast(created_at as date) BETWEEN '$for_tgl_awal' AND '$for_tgl_akhir' GROUP BY no_transaksi ")->result();
                } else {

                    $where      = array('id_group' => $id_group);
                    // $data_real  = $this->model_global->edit_data($where, 'barang_masuk')->result();
                    $data_real = $this->db->query("SELECT * FROM barang_masuk WHERE id_group GROUP BY no_transaksi")->result();
                    $data_estimasi = $this->db->query("SELECT * FROM barang_masuk_estimasi WHERE id_group GROUP BY no_transaksi")->result();
                    $data_realisasi = $this->db->query("SELECT * FROM barang_masuk_realisasi WHERE id_group GROUP BY no_transaksi")->result();

                }


                $data = array(
                    'contents' => 'Dashboard/PemasukanRBB/index',
                    'data'     => $data_real,
                    'data_estimasi'     => $data_estimasi,
                    'data_realisasi'     => $data_realisasi
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

    function add_ajax_tank($id_terminal){
        $query = $this->db->get_where('ref_terminal_tank', array('id_terminal' => $id_terminal));
        $data = "<option value=''>- Pilih Terminal Tank -</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->tank . "'>" . $value->tank . "</option>";
        }
        echo $data;
    }

    public function VlidasiData(){
        $KeteranganBarang = $_POST['KeteranganBarang'];

        $cektabel = $this->db->query("SELECT uom FROM barang where id_barang = '$KeteranganBarang' ")->row();



        echo json_encode($cektabel->uom);
    }

    function fetch_state(){
        if ($this->input->post('country_id')) {
            echo $this->model_global->fetch_state($this->input->post('country_id'));
        }
    }

    function fetch_city(){
        if ($this->input->post('state_id')) {
            echo $this->model_global->fetch_city($this->input->post('state_id'));
        }
    }
 
    public function add(){
        if ($this->session->userdata('name_user') and $this->session->userdata('username')) {
            if ($this->model_user_access->access_add() == 1) {

                $this->load->library('auto_number');

                $id_group   = $this->session->userdata('id_group');


                $row = $this->model_global->id_terakhir();

                if(empty($row->id_bm)){
                    $config['id'] = 0;
                }else{
                    $config['id'] = $row->id_bm;
                }

                
                $config['awalan'] = 'TRX';
                $config['digit'] = 4;
                $this->auto_number->config($config);
                /* echo $this->auto_number->generate_id();
                die();*/

                $where    = array('jenis' => 'Supplier');
                $whereTer = array('id_group' => $id_group);
                $whereTer2 = array('id_group' => $id_group,
                                  'status' => 1);
                $whereDok = array('status' => 'In');

                $terminal2          = $this->model_global->getAll('ref_terminal')->row();
                $wheretank          = array('id_terminal' => $terminal2->id_terminal);
                $tank2              = $this->model_global->edit_data($wheretank, 'ref_terminal_tank')->result();

                $kategori_barang    = $this->model_global->getAll('ref_kategori')->result();
                $satuan             = $this->model_global->getAll('ref_satuan')->result();
                $purchase           = $this->model_global->getAll('purchase')->result();
                $bendera            = $this->model_global->getAll('ref_negara_asal')->result();
                $jenis              = $this->model_global->getAll('ref_jenis')->result();
                $barang             = $this->model_global->edit_data($whereTer, 'barang')->result();
                $kurs               = $this->model_global->getAll('ref_kurs')->result();
                $client             = $this->model_global->edit_data($where, 'ref_client')->result();
                $terminal           = $this->model_global->edit_data($whereTer2, 'ref_terminal')->result();
                $dokumen            = $this->model_global->edit_data($whereDok, 'ref_dokumen')->result();

                $data = array(
                    'contents'      => 'Dashboard/PemasukanRBB/add',
                    'kategori_barang'   => $kategori_barang,
                    'satuan'            => $satuan,
                    'dokumen'           => $dokumen,
                    'barang'            => $barang,
                    'jenis'             => $jenis,
                    'kurs'              => $kurs,
                    'client'            => $client,
                    'terminal'          => $terminal,
                    'terminal2'         => $terminal2,
                    'tank2'             => $tank2,
                    'purchase'          => $purchase,
                    'bendera'           => $bendera,
                    'kodetrx'           => $this->auto_number->generate_id()
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

    public function add_get($id_get){
        $wherenotif = array('id_bm' => $id_get);
        $notif          = $this->model_global->edit_data($wherenotif, 'tr_notif')->row();

        $this->load->library('auto_number');

        $id_group   = $this->session->userdata('id_group');


        $row = $this->model_global->id_terakhir();

        if(empty($row->id_bm)){
                    $config['id'] = 0;
                }else{
                    $config['id'] = $row->id_bm;
                }
                
        $config['awalan'] = 'TRX';
        $config['digit'] = 4;
        $this->auto_number->config($config);
        /* echo $this->auto_number->generate_id();
                die();*/

        $where    = array('jenis' => 'Supplier');
        
        $whereTer = array('id_group' => $id_group,
                          'terminal' => $notif->terminal_terapung,  
                        );
        $whereTerBar = array('id_group' => $id_group,
                          'id_barang' => $notif->id_barang,  
                        );
        $whereGet = array('id_bm' => $id_get);
        $wherejenis = array('id_jenis' => 1);

        
        $whereter2          = array('terminal' => $notif->terminal_terapung);
        $terminal2          = $this->model_global->edit_data($whereter2, 'ref_terminal')->row();
        $wheretank2         = array('id_terminal' => $terminal2->id_terminal);
        $tank2             = $this->model_global->edit_data($wheretank2, 'ref_terminal_tank')->result();
        $kategori_barang    = $this->model_global->getAll('ref_kategori')->result();
        $satuan             = $this->model_global->getAll('ref_satuan')->result();
    //  $dokumen            = $this->model_global->getAll('ref_dokumen')->result();
        $dokumen = $this->db->query("SELECT * FROM ref_dokumen where status ='In'")->result();
        $purchase           = $this->model_global->getAll('purchase')->result();
        $jenis              = $this->model_global->edit_data($wherejenis, 'ref_jenis')->result();
        $barang             = $this->model_global->edit_data($whereTerBar, 'barang')->result();
        $bendera            = $this->model_global->getAll('ref_negara_asal')->result();
        $kurs               = $this->model_global->getAll('ref_kurs')->result();
        $tank               = $this->model_global->getAll('ref_terminal_tank')->result();
        $client             = $this->model_global->edit_data($where, 'ref_client')->result();
        $terminal           = $this->model_global->edit_data($whereTer, 'ref_terminal')->row();
        $dataGet            = $this->model_global->edit_data($whereGet, 'tr_notif')->row();


        $data = array(
            'contents'      => 'Dashboard/PemasukanRBB/add_get',
            'notif'        => $notif,
            'terminal2'     => $terminal2,
            'tank2'     => $tank2,
            'kategori_barang'   => $kategori_barang,
            'satuan'            => $satuan,
            'dokumen'           => $dokumen,
            'barang'            => $barang,
            'jenis'             => $jenis,
            'kurs'              => $kurs,
            'tank'              => $tank,
            'client'            => $client,
            'terminal'          => $terminal,
            'purchase'          => $purchase,
            'bendera'           => $bendera,
            'dataGet'           => $dataGet,
            'kodetrx'           => $this->auto_number->generate_id()
        );

        $this->load->view('Layouts/warper', $data);
    }

    public function add_realisasi($id_get){
        $where_estimasi   = array('id_bm' => $id_get);
        $data_estimasi    = $this->model_global->edit_data($where_estimasi, 'barang_masuk_estimasi')->row();

        $where_no_transaksi   = array('no_transaksi' => $data_estimasi->no_transaksi);
        $data_estimasi_result    = $this->model_global->edit_data($where_no_transaksi, 'barang_masuk_estimasi')->result();

        $count_real = count($data_estimasi_result);


        $id_group   = $this->session->userdata('id_group');

        /* echo $this->auto_number->generate_id();
                die();*/

        $where    = array('jenis' => 'Supplier');
        
        $whereTer = array('id_group' => $id_group,
                          'terminal' => $data_estimasi->terminal_terapung,  
                        );
        $whereTerBar = array('id_group' => $id_group,
                          'id_barang'   => $data_estimasi->id_barang,  
                        );
        $whereGet = array('id_bm' => $id_get);


        
        $whereter2          = array('terminal' => $data_estimasi->terminal_terapung);
        $terminal2          = $this->model_global->edit_data($whereter2, 'ref_terminal')->row();
        $wheretank2         = array('id_terminal' => $terminal2->id_terminal);
        $tank2             = $this->model_global->edit_data($wheretank2, 'ref_terminal_tank')->result();
        $kategori_barang    = $this->model_global->getAll('ref_kategori')->result();
        $satuan             = $this->model_global->getAll('ref_satuan')->result();
    //  $dokumen            = $this->model_global->getAll('ref_dokumen')->result();
        $dokumen = $this->db->query("SELECT * FROM ref_dokumen where status ='In'")->result();

        $purchase           = $this->model_global->getAll('purchase')->result();
        $jenis              = $this->model_global->getAll('ref_jenis')->result();
        $barang             = $this->model_global->edit_data($whereTerBar, 'barang')->result();
        $bendera            = $this->model_global->getAll('ref_negara_asal')->result();
        $kurs               = $this->model_global->getAll('ref_kurs')->result();
        $tank               = $this->model_global->getAll('ref_terminal_tank')->result();
        $client             = $this->model_global->edit_data($where, 'ref_client')->result();
        $terminal           = $this->model_global->edit_data($whereTer, 'ref_terminal')->row();
        $dataGet            = $this->model_global->edit_data($whereGet, 'barang_masuk_estimasi')->row();


        $data = array(
            'contents'          => 'Dashboard/PemasukanRBB/add_realisasi',
            'data_estimasi'     => $data_estimasi,
            'data_estimasi_result'     => $data_estimasi_result,
            'terminal2'         => $terminal2,
            'tank2'             => $tank2,
            'kategori_barang'   => $kategori_barang,
            'satuan'            => $satuan,
            'dokumen'           => $dokumen,
            'barang'            => $barang,
            'jenis'             => $jenis,
            'kurs'              => $kurs,
            'tank'              => $tank,
            'client'            => $client,
            'terminal'          => $terminal,
            'purchase'          => $purchase,
            'bendera'           => $bendera,
            'dataGet'           => $dataGet,
            'count_real'        => $count_real
        );

        $this->load->view('Layouts/warper', $data);
    }

    public function cekKode(){
        $sub1 = $this->input->get("sub1");
        $datapengajuan = $this->db->query("SELECT id_barang FROM barang WHERE nama_brg = '$sub1' ")->row();

        $result = $datapengajuan->id_barang;

        echo json_encode($result);
    }

    public function cekSat(){
        $sub1 = $this->input->get("sub1");
        $datapengajuan = $this->db->query("SELECT uom FROM barang WHERE nama_brg = '$sub1' ")->row();

        $result = $datapengajuan->uom;

        echo json_encode($result);
    }

    public function add_action(){
        if ($this->session->userdata('name_user') and $this->session->userdata('username')) {
            if ($this->model_user_access->access_add() == 1) {

                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpeg|jpg|png|pdf';
                $config['max_size']             = '500000';
                $config['overwrite']            = 'TRUE';
                $fileFotoReplace                = $_FILES['file']['name'];
                $fileFoto                       = str_replace(" ","_", $fileFotoReplace);

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                $this->upload->do_upload('file');

                $gbr = $this->upload->data();

                $this->db->select_max('id_bm');
                $this->db->from('barang_masuk_estimasi');
                $query = $this->db->get();
                $r = $query->row();
                $total_id = empty($r->id_bm) ? 1 : $r->id_bm + 1;

                $onlymonth      = date("m");
                $onlyyears      = date("Y");

                $id_bm              = addslashes($this->input->post('id_bm'));
                $terminal           = 1;
                $po_number          = addslashes($this->input->post('po_number'));
                $po_number          = addslashes($this->input->post('po_number'));
                $no_transaksi       = "TRX".$onlyyears.$onlymonth.$total_id;
                $jenis_doc          = addslashes($this->input->post('jenis_doc'));
                $jenis_pemasukan        = addslashes($this->input->post('jenis_pemasukan'));
                $pengirim_barang        = addslashes($this->input->post('pengirim_barang'));
                $no_dokumen_pabean      = addslashes($this->input->post('no_dokumen_pabean'));
                $no_bukti_penerimaan    = addslashes($this->input->post('no_bukti_penerimaan'));
                $tgl_dokumen_pabean     = addslashes($this->input->post('tgl_dokumen_pabean'));
                $negara_asal        = addslashes($this->input->post('countries'));
                $nama_kapal         = addslashes($this->input->post('nama_kapal'));
                $penerimaan_kargo_tgl         = addslashes($this->input->post('penerimaan_kargo_tgl'));
                // $penerimaan_kargo_time        = addslashes($this->input->post('penerimaan_kargo_time'));

                $id_group       = $this->session->userdata('id_group');
                $username       = $this->session->userdata('username');
                $created_at     = addslashes(date("Y-m-d H:i:s"));

                /*$data = array(
                            'po_number'         => $po_number,
                            'no_transaksi'      => $no_transaksi,
                            'jenis_doc'         => $jenis_doc,
                            'jenis_pemasukan'   => $jenis_pemasukan,
                            'no_dokumen_pabean'     => $no_dokumen_pabean,
                            'no_bukti_penerimaan'   => $no_bukti_penerimaan,
                            'tgl_dokumen_pabean'    => $tgl_dokumen_pabean,
                            'negara_asal'       => $negara_asal,
                            'created_at'        => $created_at,
                            'id_group'          => $id_group
                            );*/

                $limit_pk = addslashes($this->input->post('limit_pk'));

                /*print_r($data);
                echo "-------------";
                echo $limit_pk;
                die();*/

                    for ($i = 0; $i < $limit_pk; $i++) {
                    
                    $keterangan = addslashes($this->input->post('barang' . $i));
                    $qty        = addslashes($this->input->post('qty' . $i));
                    $sat        = $sat_real;
                    $harga      = addslashes($this->input->post('harga' . $i));
                    $total      = addslashes($this->input->post('total' . $i));
                    $cur        = addslashes($this->input->post('cur' . $i));
                    $terminal2  = $terminal;
                    $tank       = addslashes($this->input->post('tank' . $i));
                    $biaya_kurs      = addslashes($this->input->post('biayakurs' . $i));
                    $replacekursdot  = str_replace(".","",$biaya_kurs);
                    $replacekurskoma = str_replace(",",".",$replacekursdot);

                    $calculatebiayakurs = addslashes($this->input->post('calculatebiayakurs' . $i));
                    $replacecalculatebiayakurskoma = str_replace(".","",$calculatebiayakurs);
                    $replacecalculatebiayakurskoma = str_replace(",",".",$replacecalculatebiayakurskoma);



                    $where_awal = array('id_barang' => $keterangan);
                    $hasil_awal = $this->model_global->edit_data($where_awal, 'barang')->row();

                    $where_terminal = array('id_terminal' => $terminal);
                    $hasil_terminal = $this->model_global->edit_data($where_terminal, 'ref_terminal')->row();


                      if ($terminal == "1" && $tank == "Tank 1.A") {
                          $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 1.B") {
                          $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 2.A") {
                          $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 2.B") {
                          $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 3.A") {
                          $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 3.B") {
                          $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 4.A") {
                          $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 4.B") {
                          $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 5.A") {
                          $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 5.B") {
                          $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 6.A") {
                          $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 6.B") {
                          $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 1.A") {
                          $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 1.B") {
                          $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 2.A") {
                          $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 2.B") {
                          $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 3.A") {
                          $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 3.B") {
                          $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 4.A") {
                          $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 4.B") {
                          $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 5.A") {
                          $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 5.B") {
                          $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 6.A") {
                          $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 6.B") {
                          $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 1.A") {
                          $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 1.B") {
                          $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 2.A") {
                          $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 2.B") {
                          $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 3.A") {
                          $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 3.B") {
                          $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 4.A") {
                          $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 4.B") {
                          $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 5.A") {
                          $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 5.B") {
                          $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 6.A") {
                          $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 6.B") {
                          $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }

                $data_limit_mutasi = array(
                    'po_number'     => $po_number,
                    'kode_barang'   => $keterangan,
                    'nama_barang'   => $hasil_awal->nama_brg,
                    'satuan'        => $hasil_awal->uom,
                    'saldo_awal'    => $cektabel->hasil,
                    'pemasukan'     => $qty,
                    'pengeluaran'   => 0,
                    'saldo_akhir'   => 0,
                    'username'          => $username,
                    'activation_date'   => $created_at,
                    'status'            => 1,
                    'terminal_terapung' => $hasil_terminal->terminal,
                    'terminal_tank'     => $tank

                );
                $this->model_global->input_data($data_limit_mutasi, 'mutasi_bahan_estimasi');
                $id_mutasi_bahan = $this->db->insert_id();

                $data_limit_pk = array(
                    'po_number'         => $po_number,
                    'no_transaksi'      => $no_transaksi,
                    'jenis_doc'         => $jenis_doc,
                    'jenis_pemasukan'   => $jenis_pemasukan,
                    'no_dokumen_pabean'     => $no_dokumen_pabean,
                    'no_bukti_penerimaan'   => $no_bukti_penerimaan,
                    'tgl_dokumen_pabean'    => $tgl_dokumen_pabean,
                    'negara_asal'       => $negara_asal,
                    'created_at'        => $created_at,
                    'id_group'          => $id_group,
                    'id_client'         => $pengirim_barang,
                    'nama_brg'          => $hasil_awal->nama_brg,
                    'id_barang'         => $keterangan,
                    'jumlah'            => $qty,
                    'id_satuan'         => $hasil_awal->uom,
                    'nilai_barang'      => $total,
                    'id_mata_uang'      => $cur,
                    'tgl_transaksi'     => $created_at,
                    'terminal_terapung' => $hasil_terminal->terminal,
                    'terminal_tank'     => $tank,
                    'nama_kapal'        => $nama_kapal,
                    'file'              => $fileFoto,
                    'harga'             => $harga,
                    'biaya_kurs'        => $replacekurskoma,
                    'total_calculate'   => $replacecalculatebiayakurskoma,
                    'penerimaan_kargo_tgl'   => $penerimaan_kargo_tgl,
                    // 'penerimaan_kargo_time'  => $penerimaan_kargo_time,
                    'status'            => 1

                );
                $this->model_global->input_data($data_limit_pk, 'barang_masuk_estimasi');





                if ($terminal == "1" && $tank == "Tank 1.A") {
                    $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 1.B") {
                    $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 2.A") {
                    $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 2.B") {
                    $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 3.A") {
                    $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 3.B") {
                    $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 4.A") {
                    $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 4.B") {
                    $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 5.A") {
                    $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 5.B") {
                    $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 6.A") {
                    $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 6.B") {
                    $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 1.A") {
                    $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 1.B") {
                    $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 2.A") {
                    $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 2.B") {
                    $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 3.A") {
                    $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 3.B") {
                    $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 4.A") {
                    $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 4.B") {
                    $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 5.A") {
                    $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 5.B") {
                    $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 6.A") {
                    $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 6.B") {
                    $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 1.A") {
                    $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 1.B") {
                    $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 2.A") {
                    $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 2.B") {
                    $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 3.A") {
                    $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 3.B") {
                    $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 4.A") {
                    $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 4.B") {
                    $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 5.A") {
                    $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 5.B") {
                    $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 6.A") {
                    $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 6.B") {
                    $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                }

                /*$where_akhir = array('id_barang' => $keterangan);
                    $hasil_akhir = $this->model_global->edit_data($where_akhir,'barang')->row();*/

                $data_mutasi = array(
                    'saldo_akhir'       => $cektabel->hasil
                );

                $where_mutasi = array(
                    'id_mutasi_bahan'   => $id_mutasi_bahan
                );

                $this->model_global->update_data($where_mutasi, $data_mutasi, 'mutasi_bahan_estimasi');

            

                $data_update_notf = array(
                    'status'       => 1
                );

                $where_update_notf = array(
                    'id_bm'   => $id_bm
                );

                $this->model_global->update_data($where_update_notf, $data_update_notf, 'tr_notif');

              }

                //log

                $assign_type = '';
                activity_log("Pemasukan -> Pemasukan Bahan Baku", "Menambah data Pemasukan Bahan Baku", $id_group, $assign_type);
                $this->session->set_flashdata('succeed', 'Sukses, Satu data telah berhasil disimpan.');
                redirect('PemasukanRBB');
            } else {
                $this->load->view('Layouts/error-404');
            }
        } else {
            session_destroy();
            redirect('dashboard');
        }
    }

    public function add_action_get(){
        if ($this->session->userdata('name_user') and $this->session->userdata('username')) {
            if ($this->model_user_access->access_add() == 1) {

                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpeg|jpg|png|pdf';
                $config['max_size']             = '500000';
                $config['overwrite']            = 'TRUE';
                $fileFotoReplace                = $_FILES['file']['name'];
                $fileFoto                       = str_replace(" ","_", $fileFotoReplace);

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                $this->upload->do_upload('file');

                $gbr = $this->upload->data();

                $this->db->select_max('id_bm');
                $this->db->from('barang_masuk_estimasi');
                $query = $this->db->get();
                $r = $query->row();
                $total_id = empty($r->id_bm) ? 1 : $r->id_bm + 1;

                $onlymonth      = date("m");
                $onlyyears      = date("Y");

                $id_bm              = addslashes($this->input->post('id_bm'));
                $keterangan         = addslashes($this->input->post('id_barang_real'));
                $keterangan2        = addslashes($this->input->post('keterangan2'));
                $terminal           = addslashes($this->input->post('terminal_real'));
                $sat_real           = addslashes($this->input->post('sat_real'));
                $po_number          = addslashes($this->input->post('po_number'));
                $no_transaksi       = "TRX".$onlyyears.$onlymonth.$total_id;
                $jenis_doc          = addslashes($this->input->post('jenis_doc'));
                $jenis_pemasukan        = addslashes($this->input->post('jenis_pemasukan'));
                $pengirim_barang        = addslashes($this->input->post('pengirim_barang'));
                $no_dokumen_pabean      = addslashes($this->input->post('no_dokumen_pabean'));
                $no_bukti_penerimaan    = addslashes($this->input->post('no_bukti_penerimaan'));
                $tgl_dokumen_pabean     = addslashes($this->input->post('tgl_dokumen_pabean'));
                $negara_asal        = addslashes($this->input->post('countries'));
                $nama_kapal         = addslashes($this->input->post('nama_kapal'));
                $penerimaan_kargo_tgl         = addslashes($this->input->post('penerimaan_kargo_tgl'));
                $penerimaan_kargo_time        = addslashes($this->input->post('penerimaan_kargo_time'));

                $id_group       = $this->session->userdata('id_group');
                $username       = $this->session->userdata('username');
                $created_at     = addslashes(date("Y-m-d H:i:s"));

                /*$data = array(
                            'po_number'         => $po_number,
                            'no_transaksi'      => $no_transaksi,
                            'jenis_doc'         => $jenis_doc,
                            'jenis_pemasukan'   => $jenis_pemasukan,
                            'no_dokumen_pabean'     => $no_dokumen_pabean,
                            'no_bukti_penerimaan'   => $no_bukti_penerimaan,
                            'tgl_dokumen_pabean'    => $tgl_dokumen_pabean,
                            'negara_asal'       => $negara_asal,
                            'created_at'        => $created_at,
                            'id_group'          => $id_group
                            );*/

                $limit_pk = addslashes($this->input->post('limit_pk'));

                /*print_r($data);
                echo "-------------";
                echo $limit_pk;
                die();*/

                    for ($i = 0; $i < $limit_pk; $i++) {
                    
                    $keterangan2 = $keterangan2;
                    $qty        = addslashes($this->input->post('qty' . $i));
                    $sat        = $sat_real;
                    $harga      = addslashes($this->input->post('harga' . $i));
                    $total      = addslashes($this->input->post('total' . $i));
                    $cur        = addslashes($this->input->post('cur' . $i));
                    $terminal2  = $terminal;
                    $tank       = addslashes($this->input->post('tank' . $i));
                    $biaya_kurs      = addslashes($this->input->post('biayakurs' . $i));
                    $replacekursdot  = str_replace(".","",$biaya_kurs);
                    $replacekurskoma = str_replace(",",".",$replacekursdot);

                    $calculatebiayakurs = addslashes($this->input->post('calculatebiayakurs' . $i));
                    $replacecalculatebiayakurskoma = str_replace(".","",$calculatebiayakurs);
                    $replacecalculatebiayakurskoma = str_replace(",",".",$replacecalculatebiayakurskoma);



                    $where_awal = array('id_barang' => $keterangan);
                    $hasil_awal = $this->model_global->edit_data($where_awal, 'barang')->row();

                    $where_terminal = array('id_terminal' => $terminal);
                    $hasil_terminal = $this->model_global->edit_data($where_terminal, 'ref_terminal')->row();


                      if ($terminal == "1" && $tank == "Tank 1.A") {
                          $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 1.B") {
                          $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 2.A") {
                          $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 2.B") {
                          $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 3.A") {
                          $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 3.B") {
                          $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 4.A") {
                          $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 4.B") {
                          $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 5.A") {
                          $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 5.B") {
                          $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 6.A") {
                          $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 6.B") {
                          $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 1.A") {
                          $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 1.B") {
                          $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 2.A") {
                          $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 2.B") {
                          $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 3.A") {
                          $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 3.B") {
                          $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 4.A") {
                          $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 4.B") {
                          $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 5.A") {
                          $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 5.B") {
                          $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 6.A") {
                          $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 6.B") {
                          $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 1.A") {
                          $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 1.B") {
                          $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 2.A") {
                          $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 2.B") {
                          $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 3.A") {
                          $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 3.B") {
                          $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 4.A") {
                          $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 4.B") {
                          $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 5.A") {
                          $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 5.B") {
                          $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 6.A") {
                          $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 6.B") {
                          $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }

                $data_limit_mutasi = array(
                    'po_number'     => $po_number,
                    'kode_barang'   => $keterangan,
                    'nama_barang'   => $hasil_awal->nama_brg,
                    'satuan'        => $sat,
                    'saldo_awal'    => $cektabel->hasil,
                    'pemasukan'     => $qty,
                    'pengeluaran'   => 0,
                    'saldo_akhir'   => 0,
                    'username'          => $username,
                    'activation_date'   => $created_at,
                    'status'            => 1,
                    'terminal_terapung' => $hasil_terminal->terminal,
                    'terminal_tank'     => $tank

                );
                $this->model_global->input_data($data_limit_mutasi, 'mutasi_bahan_estimasi');
                $id_mutasi_bahan = $this->db->insert_id();

                $data_limit_pk = array(
                    'po_number'         => $po_number,
                    'no_transaksi'      => $no_transaksi,
                    'jenis_doc'         => $jenis_doc,
                    'jenis_pemasukan'   => $jenis_pemasukan,
                    'no_dokumen_pabean'     => $no_dokumen_pabean,
                    'no_bukti_penerimaan'   => $no_bukti_penerimaan,
                    'tgl_dokumen_pabean'    => $tgl_dokumen_pabean,
                    'negara_asal'       => $negara_asal,
                    'created_at'        => $created_at,
                    'id_group'          => $id_group,
                    'id_client'         => $pengirim_barang,
                    'nama_brg'          => $hasil_awal->nama_brg,
                    'id_barang'         => $keterangan,
                    'jumlah'            => $qty,
                    'id_satuan'         => $sat,
                    'nilai_barang'      => $total,
                    'id_mata_uang'      => $cur,
                    'tgl_transaksi'     => $created_at,
                    'terminal_terapung' => $hasil_terminal->terminal,
                    'terminal_tank'     => $tank,
                    'nama_kapal'        => $nama_kapal,
                    'file'              => $fileFoto,
                    'harga'             => $harga,
                    'biaya_kurs'        => $replacekurskoma,
                    'total_calculate'   => $replacecalculatebiayakurskoma,
                    'penerimaan_kargo_tgl'   => $penerimaan_kargo_tgl,
                    'penerimaan_kargo_time'  => $penerimaan_kargo_time,
                    'status'            => 1

                );
                $this->model_global->input_data($data_limit_pk, 'barang_masuk_estimasi');





                if ($terminal == "1" && $tank == "Tank 1.A") {
                    $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 1.B") {
                    $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 2.A") {
                    $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 2.B") {
                    $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 3.A") {
                    $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 3.B") {
                    $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 4.A") {
                    $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 4.B") {
                    $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 5.A") {
                    $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 5.B") {
                    $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 6.A") {
                    $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 6.B") {
                    $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 1.A") {
                    $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 1.B") {
                    $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 2.A") {
                    $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 2.B") {
                    $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 3.A") {
                    $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 3.B") {
                    $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 4.A") {
                    $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 4.B") {
                    $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 5.A") {
                    $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 5.B") {
                    $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 6.A") {
                    $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 6.B") {
                    $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 1.A") {
                    $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 1.B") {
                    $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 2.A") {
                    $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 2.B") {
                    $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 3.A") {
                    $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 3.B") {
                    $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 4.A") {
                    $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 4.B") {
                    $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 5.A") {
                    $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 5.B") {
                    $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 6.A") {
                    $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 6.B") {
                    $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                }

                /*$where_akhir = array('id_barang' => $keterangan);
                    $hasil_akhir = $this->model_global->edit_data($where_akhir,'barang')->row();*/

                $data_mutasi = array(
                    'saldo_akhir'       => $cektabel->hasil
                );

                $where_mutasi = array(
                    'id_mutasi_bahan'   => $id_mutasi_bahan
                );

                $this->model_global->update_data($where_mutasi, $data_mutasi, 'mutasi_bahan_estimasi');

            

                $data_update_notf = array(
                    'status'       => 1
                );

                $where_update_notf = array(
                    'id_bm'   => $id_bm
                );

                $this->model_global->update_data($where_update_notf, $data_update_notf, 'tr_notif');

              }

                //log

                $assign_type = '';
                activity_log("Pemasukan -> Pemasukan Bahan Baku", "Menambah data Pemasukan Bahan Baku", $id_group, $assign_type);
                $this->session->set_flashdata('succeed', 'Sukses, Satu data telah berhasil disimpan.');
                redirect('PemasukanRBB');
            } else {
                $this->load->view('Layouts/error-404');
            }
        } else {
            session_destroy();
            redirect('dashboard');
        }
    }

    public function add_action_realisasi(){
        if ($this->session->userdata('name_user') and $this->session->userdata('username')) {
            if ($this->model_user_access->access_add() == 1) {

                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpeg|jpg|png|pdf';
                $config['max_size']             = '500000';
                $config['overwrite']            = 'TRUE';
                $fileFotoReplace                = $_FILES['file']['name'];
                $fileFoto                       = str_replace(" ","_", $fileFotoReplace);

                if(empty($fileFoto)){
                    $file_real      = addslashes($this->input->post('fileget'));
                }else{
                    $file_real      = $fileFoto;
                }

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                $this->upload->do_upload('file');

                $gbr = $this->upload->data();

                $id_bm              = addslashes($this->input->post('id_bm'));
                $keterangan         = addslashes($this->input->post('id_barang_real'));
                $keterangan2        = addslashes($this->input->post('keterangan2'));
                $terminal           = addslashes($this->input->post('terminal_real'));
                $sat_real           = addslashes($this->input->post('sat_real'));
                $po_number          = addslashes($this->input->post('po_number'));
                $no_transaksi       = addslashes($this->input->post('no_transaksi'));
                $tgl_transaksi      = addslashes($this->input->post('tgl_transaksi'));
                $jenis_doc          = addslashes($this->input->post('jenis_doc'));
                $jenis_pemasukan        = addslashes($this->input->post('jenis_pemasukan'));
                $pengirim_barang        = addslashes($this->input->post('pengirim_barang'));
                $no_dokumen_pabean      = addslashes($this->input->post('no_dokumen_pabean'));
                $no_bukti_penerimaan    = addslashes($this->input->post('no_bukti_penerimaan'));
                $tgl_dokumen_pabean     = addslashes($this->input->post('tgl_dokumen_pabean'));
                $negara_asal        = addslashes($this->input->post('countries'));
                $nama_kapal         = addslashes($this->input->post('nama_kapal'));
                $penerimaan_kargo_tgl         = addslashes($this->input->post('penerimaan_kargo_tgl'));
                $penerimaan_kargo_time        = addslashes($this->input->post('penerimaan_kargo_time'));

                $id_group       = $this->session->userdata('id_group');
                $username       = $this->session->userdata('username');
                $created_at     = addslashes(date("Y-m-d H:i:s"));

                /*$data = array(
                            'po_number'         => $po_number,
                            'no_transaksi'      => $no_transaksi,
                            'jenis_doc'         => $jenis_doc,
                            'jenis_pemasukan'   => $jenis_pemasukan,
                            'no_dokumen_pabean'     => $no_dokumen_pabean,
                            'no_bukti_penerimaan'   => $no_bukti_penerimaan,
                            'tgl_dokumen_pabean'    => $tgl_dokumen_pabean,
                            'negara_asal'       => $negara_asal,
                            'created_at'        => $created_at,
                            'id_group'          => $id_group
                            );*/

                $count_loop = addslashes($this->input->post('count_loop'));

                for ($i = 1; $i <= $count_loop; $i++) {
                    
                /*print_r($data);
                echo "-------------";
                echo $limit_pk;
                die();*/


                
                    $keterangan2 = $keterangan2;
                    $qty        = addslashes($this->input->post('qty_real' . $i));
                    $sat        = $sat_real;
                    $harga      = addslashes($this->input->post('harga_satuan_real' . $i));
                    $total      = addslashes($this->input->post('hasil_real' . $i));
                    $cur        = addslashes($this->input->post('kurs_real' . $i));
                    $terminal2  = $terminal;
                    $tank       = addslashes($this->input->post('tank_real' . $i));
                    $biaya_kurs = addslashes($this->input->post('biaya_kurs_real' . $i));
                    $replacekursdot  = str_replace(".","",$biaya_kurs);
                    $replacekurskoma = str_replace(",",".",$replacekursdot);
                    $calculatebiayakurs = addslashes($this->input->post('total_calculate' . $i));
                    $replacecalculatebiayakurskoma = str_replace(".","",$calculatebiayakurs);
                    $replacecalculatebiayakurskoma = str_replace(",",".",$replacecalculatebiayakurskoma);

                    $where_awal = array('id_barang' => $keterangan);
                    $hasil_awal = $this->model_global->edit_data($where_awal, 'barang')->row();

                    $where_terminal = array('id_terminal' => $terminal);
                    $hasil_terminal = $this->model_global->edit_data($where_terminal, 'ref_terminal')->row();


                      if ($terminal == "1" && $tank == "Tank 1.A") {
                          $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 1.B") {
                          $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 2.A") {
                          $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 2.B") {
                          $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 3.A") {
                          $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 3.B") {
                          $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 4.A") {
                          $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 4.B") {
                          $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 5.A") {
                          $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 5.B") {
                          $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 6.A") {
                          $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "1" && $tank == "Tank 6.B") {
                          $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 1.A") {
                          $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 1.B") {
                          $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 2.A") {
                          $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 2.B") {
                          $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 3.A") {
                          $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 3.B") {
                          $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 4.A") {
                          $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 4.B") {
                          $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 5.A") {
                          $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 5.B") {
                          $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 6.A") {
                          $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "2" && $tank == "Tank 6.B") {
                          $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 1.A") {
                          $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 1.B") {
                          $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 2.A") {
                          $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 2.B") {
                          $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 3.A") {
                          $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 3.B") {
                          $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 4.A") {
                          $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 4.B") {
                          $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 5.A") {
                          $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 5.B") {
                          $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 6.A") {
                          $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($terminal == "3" && $tank == "Tank 6.B") {
                          $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }

                $data_limit_mutasi = array(
                    'po_number'     => $po_number,
                    'kode_barang'   => $keterangan,
                    'nama_barang'   => $hasil_awal->nama_brg,
                    'satuan'        => $sat,
                    'saldo_awal'    => $cektabel->hasil,
                    'pemasukan'     => $qty,
                    'pengeluaran'   => 0,
                    'saldo_akhir'   => 0,
                    'username'          => $username,
                    'activation_date'   => $created_at,
                    'status'            => 3,
                    'terminal_terapung' => $hasil_terminal->terminal,
                    'terminal_tank'     => $tank

                );
                $this->model_global->input_data($data_limit_mutasi, 'mutasi_bahan_realisasi');
                $id_mutasi_bahan = $this->db->insert_id();

                $data_limit_pk = array(
                    'po_number'         => $po_number,
                    'no_transaksi'      => $no_transaksi,
                    'jenis_doc'         => $jenis_doc,
                    'jenis_pemasukan'   => $jenis_pemasukan,
                    'no_dokumen_pabean'     => $no_dokumen_pabean,
                    'no_bukti_penerimaan'   => $no_bukti_penerimaan,
                    'tgl_dokumen_pabean'    => $tgl_dokumen_pabean,
                    'negara_asal'       => $negara_asal,
                    'created_at'        => $created_at,
                    'id_group'          => $id_group,
                    'id_client'         => $pengirim_barang,
                    'nama_brg'          => $hasil_awal->nama_brg,
                    'id_barang'         => $keterangan,
                    'jumlah'            => $qty,
                    'id_satuan'         => $sat,
                    'nilai_barang'      => $total,
                    'id_mata_uang'      => $cur,
                    'tgl_transaksi'     => $tgl_transaksi,
                    'terminal_terapung' => $hasil_terminal->terminal,
                    'terminal_tank'     => $tank,
                    'nama_kapal'        => $nama_kapal,
                    'file'              => $file_real,
                    'harga'             => $harga,
                    'biaya_kurs'        => $replacekurskoma,
                    'total_calculate'   => $replacecalculatebiayakurskoma,
                    'penerimaan_kargo_tgl'   => $penerimaan_kargo_tgl,
                    'penerimaan_kargo_time'  => $penerimaan_kargo_time,
                    'status'            => 3

                );
                $this->model_global->input_data($data_limit_pk, 'barang_masuk_realisasi');





                if ($terminal == "1" && $tank == "Tank 1.A") {
                    $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 1.B") {
                    $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 2.A") {
                    $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 2.B") {
                    $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 3.A") {
                    $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 3.B") {
                    $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 4.A") {
                    $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 4.B") {
                    $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 5.A") {
                    $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 5.B") {
                    $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 6.A") {
                    $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "1" && $tank == "Tank 6.B") {
                    $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 1.A") {
                    $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 1.B") {
                    $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 2.A") {
                    $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 2.B") {
                    $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 3.A") {
                    $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 3.B") {
                    $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 4.A") {
                    $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 4.B") {
                    $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 5.A") {
                    $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 5.B") {
                    $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 6.A") {
                    $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "2" && $tank == "Tank 6.B") {
                    $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 1.A") {
                    $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 1.B") {
                    $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 2.A") {
                    $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 2.B") {
                    $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 3.A") {
                    $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 3.B") {
                    $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 4.A") {
                    $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 4.B") {
                    $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 5.A") {
                    $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 5.B") {
                    $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 6.A") {
                    $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                } elseif ($terminal == "3" && $tank == "Tank 6.B") {
                    $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                }

                /*$where_akhir = array('id_barang' => $keterangan);
                    $hasil_akhir = $this->model_global->edit_data($where_akhir,'barang')->row();*/

                $data_mutasi = array(
                    'saldo_akhir'       => $cektabel->hasil
                );

                $where_mutasi = array(
                    'id_mutasi_bahan'   => $id_mutasi_bahan
                );

                $this->model_global->update_data($where_mutasi, $data_mutasi, 'mutasi_bahan_realisasi');

            

                $data_update_notf = array(
                    'status'       => 2
                );

                $where_update_notf = array(
                    'no_transaksi'   => $no_transaksi
                );

                $this->model_global->update_data($where_update_notf, $data_update_notf, 'barang_masuk_estimasi');

            }

                //log

                $assign_type = '';
                activity_log("Pemasukan -> Pemasukan Bahan Baku", "Menambah data Pemasukan Bahan Baku", $id_group, $assign_type);
                $this->session->set_flashdata('succeed', 'Sukses, Satu data telah berhasil disimpan.');
                redirect('PemasukanRBB');
            } else {
                $this->load->view('Layouts/error-404');
            }
        } else {
            session_destroy();
            redirect('dashboard');
        }
    }

    public function delete($id){
        if ($this->session->userdata('name_user') and $this->session->userdata('username')) {
            if ($this->model_user_access->access_delete() == 1) {
                $where = array('id_bm' => $id);
                $this->model_global->hapus_data($where, 'barang_masuk');

                $this->session->set_flashdata('succeed', 'Satu Data  telah di hapus.');
                //log
                $id_group       = $this->session->userdata('id_group');
                $assign_type = '';
                activity_log("Master Data -> Pemasukan Bahan Baku", "Menghapus data Pemasukan Bahan Baku", $id, $id_group, $assign_type);
                $this->session->set_flashdata('succeed', 'Sukses, Satu data telah berhasil dihapus.');
                redirect('PemasukanRBB');
            } else {
                $this->load->view('Layouts/error-404');
            }
        } else {
            session_destroy();
            redirect('dashboard');
        }
    }

    public function edit($id){
        if ($this->session->userdata('name_user') and $this->session->userdata('username')) {
            if ($this->model_user_access->access_add() == 1) {

                $this->load->library('auto_number');

                $id_group   = $this->session->userdata('id_group');

                $row = $this->model_global->id_terakhir();

                if(empty($row->id_bm)){
                    $config['id'] = 0;
                }else{
                    $config['id'] = $row->id_bm;
                }

                $where2 = array('id_bm' => $id);

                
                $config['awalan'] = 'TRX';
                $config['digit'] = 4;
                $this->auto_number->config($config);

                $where    = array('jenis' => 'Supplier');
                $whereTer = array('id_group' => $id_group);
                $whereTer2 = array('id_group' => $id_group, 'status' => 1);
                $whereDok = array('status' => 'In');

                $terminal2          = $this->model_global->getAll('ref_terminal')->row();
                $wheretank          = array('id_terminal' => $terminal2->id_terminal);
                $tank2              = $this->model_global->edit_data($wheretank, 'ref_terminal_tank')->result();

                $kategori_barang    = $this->model_global->getAll('ref_kategori')->result();
                $satuan             = $this->model_global->getAll('ref_satuan')->result();
                $purchase           = $this->model_global->getAll('purchase')->result();
                $bendera            = $this->model_global->getAll('ref_negara_asal')->result();
                $jenis              = $this->model_global->getAll('ref_jenis')->result();
                $barang             = $this->model_global->edit_data($whereTer, 'barang')->result();
                $kurs               = $this->model_global->getAll('ref_kurs')->result();
                $client             = $this->model_global->edit_data($where, 'ref_client')->result();
                $terminal           = $this->model_global->edit_data($whereTer2, 'ref_terminal')->result();
                $dokumen            = $this->model_global->edit_data($whereDok, 'ref_dokumen')->result();
                $data               = $this->model_global->edit_data($where2,'barang_masuk')->row();
                $data_real          = $this->db->query("SELECT * FROM barang_masuk WHERE id_group = '$id_group' AND no_transaksi = '$data->no_transaksi' ")->result();


                $data = array(
                    'contents'      => 'Dashboard/PemasukanRBB/edit',
                    'kategori_barang'   => $kategori_barang,
                    'satuan'            => $satuan,
                    'dokumen'           => $dokumen,
                    'barang'            => $barang,
                    'jenis'             => $jenis,
                    'kurs'              => $kurs,
                    'client'            => $client,
                    'terminal'          => $terminal,
                    'terminal2'         => $terminal2,
                    'tank2'             => $tank2,
                    'purchase'          => $purchase,
                    'bendera'           => $bendera,
                    'data'              => $data, 
                    'data_real'         => $data_real, 
                    'kodetrx'           => $this->auto_number->generate_id()
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

    public function update($id){
        if ($this->session->userdata('name_user') and $this->session->userdata('username')) {
            if ($this->model_user_access->access_add() == 1) {

                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpeg|jpg|png';
                $config['max_size']             = '500000';
                $config['overwrite']            = 'TRUE';
                $fileFoto                       = $_FILES['file']['name'];

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                $this->upload->do_upload('file');

                $gbr = $this->upload->data();

                $po_number              = addslashes($this->input->post('po_number'));
                $no_transaksi           = addslashes($this->input->post('no_transaksi'));
                $tgl_transaksi          = addslashes($this->input->post('tgl_transaksi'));
                $jenis_doc              = addslashes($this->input->post('jenis_doc'));
                $jenis_pemasukan        = addslashes($this->input->post('jenis_pemasukan'));
                $pengirim_barang        = addslashes($this->input->post('pengirim_barang'));
                $nama_kapal             = addslashes($this->input->post('nama_kapal'));
                $no_dokumen_pabean      = addslashes($this->input->post('no_dokumen_pabean'));
                $no_bukti_penerimaan    = addslashes($this->input->post('no_bukti_penerimaan'));
                $tgl_dokumen_pabean     = addslashes($this->input->post('tgl_dokumen_pabean'));
                $negara_asal            = addslashes($this->input->post('countries'));
                $terminal               = addslashes($this->input->post('id_terminal'));    

                $id_group               = $this->session->userdata('id_group');
                $username               = $this->session->userdata('username');
                $created_at             = addslashes(date("Y-m-d H:i:s"));

                $limit_pk = addslashes($this->input->post('limit_pk'));


                for ($i = 0; $i < $limit_pk; $i++) {
                    $keterangan     = addslashes($this->input->post('keterangan' . $i));
                    $qty            = addslashes($this->input->post('qty' . $i));
                    $sat            = addslashes($this->input->post('sat' . $i));
                    $harga          = addslashes($this->input->post('harga' . $i));
                    $total          = addslashes($this->input->post('total' . $i));
                    $cur            = addslashes($this->input->post('cur' . $i));
                    $terminal2      = addslashes($this->input->post('terminal' . $i));
                    $tank           = addslashes($this->input->post('tank' . $i));


                    $where_awal     = array('id_barang' => $keterangan);
                    $hasil_awal     = $this->model_global->edit_data($where_awal, 'barang')->row();

                    $where_terminal = array('id_terminal' => $terminal);
                    $hasil_terminal = $this->model_global->edit_data($where_terminal, 'ref_terminal')->row();


                    if ($terminal == "1" && $tank == "Tank 1.A") {
                        $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "1" && $tank == "Tank 1.B") {
                        $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "1" && $tank == "Tank 2.A") {
                        $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "1" && $tank == "Tank 2.B") {
                        $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "1" && $tank == "Tank 3.A") {
                        $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "1" && $tank == "Tank 3.B") {
                        $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "1" && $tank == "Tank 4.A") {
                        $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "1" && $tank == "Tank 4.B") {
                        $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "1" && $tank == "Tank 5.A") {
                        $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "1" && $tank == "Tank 5.B") {
                        $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "1" && $tank == "Tank 6.A") {
                        $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "1" && $tank == "Tank 6.B") {
                        $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "2" && $tank == "Tank 1.A") {
                        $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "2" && $tank == "Tank 1.B") {
                        $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "2" && $tank == "Tank 2.A") {
                        $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "2" && $tank == "Tank 2.B") {
                        $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "2" && $tank == "Tank 3.A") {
                        $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "2" && $tank == "Tank 3.B") {
                        $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "2" && $tank == "Tank 4.A") {
                        $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "2" && $tank == "Tank 4.B") {
                        $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "2" && $tank == "Tank 5.A") {
                        $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "2" && $tank == "Tank 5.B") {
                        $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "2" && $tank == "Tank 6.A") {
                        $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "2" && $tank == "Tank 6.B") {
                        $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "3" && $tank == "Tank 1.A") {
                        $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "3" && $tank == "Tank 1.B") {
                        $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "3" && $tank == "Tank 2.A") {
                        $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "3" && $tank == "Tank 2.B") {
                        $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "3" && $tank == "Tank 3.A") {
                        $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "3" && $tank == "Tank 3.B") {
                        $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "3" && $tank == "Tank 4.A") {
                        $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "3" && $tank == "Tank 4.B") {
                        $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "3" && $tank == "Tank 5.A") {
                        $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "3" && $tank == "Tank 5.B") {
                        $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "3" && $tank == "Tank 6.A") {
                        $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "3" && $tank == "Tank 6.B") {
                        $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    }


                    $data = array(
                        'po_number'         => $po_number,
                        'kode_barang'       => $keterangan,
                        'nama_barang'       => $hasil_awal->nama_brg,
                        'satuan'            => $sat,
                        'saldo_awal'        => $cektabel->hasil,
                        'pemasukan'         => $qty,
                        'pengeluaran'       => 0,
                        'saldo_akhir'       => 0,
                        'username'          => $username,
                        'activation_date'   => $created_at,
                        'status'            => 1,
                        'terminal_terapung' => $hasil_terminal->terminal,
                        'terminal_tank'     => $tank

                    );

                    $where = array(
                        'id_mutasi_bahan' => $id
                    );
    

                    $this->model_global->update_data($where,$data, 'mutasi_bahan');
                    $id_mutasi_bahan = $this->db->insert_id();

                    $data = array(
                        'po_number'             => $po_number,
                        'no_transaksi'          => $no_transaksi,
                        'jenis_doc'             => $jenis_doc,
                        'jenis_pemasukan'       => $jenis_pemasukan,
                        'no_dokumen_pabean'     => $no_dokumen_pabean,
                        'no_bukti_penerimaan'   => $no_bukti_penerimaan,
                        'tgl_dokumen_pabean'    => $tgl_dokumen_pabean,
                        'negara_asal'           => $negara_asal,
                        'created_at'            => $created_at,
                        'id_group'              => $id_group,
                        'id_client'             => $pengirim_barang,
                        'nama_brg'              => $hasil_awal->nama_brg,
                        'id_barang'             => $keterangan,
                        'jumlah'                => $qty,
                        'id_satuan'             => $sat,
                        'nilai_barang'          => $total,
                        'id_mata_uang'          => $cur,
                        'harga'                 => $harga,
                        'tgl_transaksi'         => $tgl_transaksi,
                        'terminal_terapung'     => $hasil_terminal->terminal,
                        'terminal_tank'         => $tank,
                        'nama_kapal'            => $nama_kapal,
                        'file'                  => $$fileFoto

                    );

                    $where = array(
                        'id_bm' => $id
                    );
    
                    $this->model_global->update_data($where,$data, 'barang_masuk');


                    if ($terminal == "1" && $tank == "Tank 1.A") {
                        $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "1" && $tank == "Tank 1.B") {
                        $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "1" && $tank == "Tank 2.A") {
                        $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "1" && $tank == "Tank 2.B") {
                        $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "1" && $tank == "Tank 3.A") {
                        $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "1" && $tank == "Tank 3.B") {
                        $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "1" && $tank == "Tank 4.A") {
                        $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "1" && $tank == "Tank 4.B") {
                        $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "1" && $tank == "Tank 5.A") {
                        $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "1" && $tank == "Tank 5.B") {
                        $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "1" && $tank == "Tank 6.A") {
                        $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "1" && $tank == "Tank 6.B") {
                        $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "2" && $tank == "Tank 1.A") {
                        $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "2" && $tank == "Tank 1.B") {
                        $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "2" && $tank == "Tank 2.A") {
                        $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "2" && $tank == "Tank 2.B") {
                        $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "2" && $tank == "Tank 3.A") {
                        $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "2" && $tank == "Tank 3.B") {
                        $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "2" && $tank == "Tank 4.A") {
                        $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "2" && $tank == "Tank 4.B") {
                        $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "2" && $tank == "Tank 5.A") {
                        $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "2" && $tank == "Tank 5.B") {
                        $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "2" && $tank == "Tank 6.A") {
                        $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "2" && $tank == "Tank 6.B") {
                        $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "3" && $tank == "Tank 1.A") {
                        $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "3" && $tank == "Tank 1.B") {
                        $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "3" && $tank == "Tank 2.A") {
                        $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "3" && $tank == "Tank 2.B") {
                        $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "3" && $tank == "Tank 3.A") {
                        $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "3" && $tank == "Tank 3.B") {
                        $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "3" && $tank == "Tank 4.A") {
                        $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "3" && $tank == "Tank 4.B") {
                        $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "3" && $tank == "Tank 5.A") {
                        $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "3" && $tank == "Tank 5.B") {
                        $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "3" && $tank == "Tank 6.A") {
                        $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($terminal == "3" && $tank == "Tank 6.B") {
                        $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    }

                    $data = array(
                        'saldo_akhir'       => $cektabel->hasil
                    );

                    $where_mutasi = array(
                        'id_mutasi_bahan'   => $id_mutasi_bahan
                    );

                    $this->model_global->update_data($where_mutasi, $data, 'mutasi_bahan');
                }

                //log

                $assign_type = '';
                activity_log("Pemasukan -> Pemasukan Bahan Baku", "Menambah data Pemasukan Bahan Baku", $id_group, $assign_type);
                $this->session->set_flashdata('succeed', 'Sukses, Satu data telah berhasil disimpan.');
                redirect('PemasukanRBB');
            } else {
                $this->load->view('Layouts/error-404');
            }
        } else {
            session_destroy();
            redirect('dashboard');
        }
    }
    // public function update($id){

    //     if ($this->session->userdata('name_user') and $this->session->userdata('username')) {
    //         if ($this->model_user_access->access_edit() == 1) {

    //             $kode_barang    = addslashes($this->input->post('kode_barang'));
    //             $nama_barangg   = addslashes($this->input->post('nama_barangg'));
    //             $jenis          = addslashes($this->input->post('jenis'));
    //             $kategori       = addslashes($this->input->post('kategori'));
    //             $satuan         = addslashes($this->input->post('satuan'));
    //             $spesifikasi    = addslashes($this->input->post('spesifikasi'));
    //             $keterangan     = addslashes($this->input->post('keterangan'));
    //             $modified_at    = addslashes(date("Y-m-d H:i:s"));
    //             $id_group       = $this->session->userdata('id_group');

    //             $data = array(
    //                 'nama_brg'      => $nama_barangg,
    //                 'id_jenis'      => $jenis,
    //                 'id_kategori'   => $kategori,
    //                 'id_unit'       => $satuan,
    //                 'spesifikasi'   => $spesifikasi,
    //                 'keterangan'    => $keterangan,
    //                 'update_at' => $modified_at
    //             );

    //             $where = array(
    //                 'id_bm' => $id
    //             );


    //             $this->model_global->update_data($where, $data, 'barang_masuk');
    //             $assign_type = '';
    //             activity_log("Master Data -> Pemasukan Bahan Baku", "Mengubah data Pemasukan Bahan Baku", $id_group, $assign_type);
    //             $this->session->set_flashdata('succeed', 'Sukses, Satu data telah berhasil diperbaharui.');
    //             redirect('PemasukanRBB');
    //         } else {
    //             $this->load->view('Layouts/error-404');
    //         }
    //     } else {
    //         session_destroy();
    //         redirect('dashboard');
    //     }
    // }

    function get_ap(){


        $id_bm  = $_GET['id_bm'];


        $data  = $this->db->query("SELECT * from tr_notif where id_bm = '$id_bm' ")->result();
        $no = 0;
        foreach ($data as $value) {
            $no++;

            echo '<tr>
                <td style="display: none;">
                    <input type="hidden" name="tbl[]" value="">
                </td>
                <td>' . $value->id_barang . '-' . $value->nama_brg . '<input type="hidden" name="keterangan' . $no . '" id="keterangan' . $no . '" value="' . $value->id_barang . '" class="form-control"></td>
                <td>' . $value->jumlah . '<input type="hidden" name="qty' . $no . '" id="qty' . $no . '" value="' . $value->terminal_tank . '" class="form-control"></td>
                <td>' . $value->id_satuan . '<input type="hidden" name="sat' . $no . '" id="sat' . $no . '" value="' . $value->id_satuan . '" class="form-control"></td>
                <td>' . $value->terminal_terapung . '<input type="hidden" name="terminal' . $no . '" id="terminal' . $no . '" value="' . $value->terminal_terapung . '" class="form-control"></td>
                <td>' . $value->terminal_tank . '<input type="hidden" name="tank' . $no . '" id="tank' . $no . '" value="' . $value->terminal_tank . '" class="form-control"></td>
                <td><select data-plugin="select2" name="jenis_doc" id="jenis_doc" class="form-control">
                         option value="0">-- Pilih Jenis Dokumen --</option>

                      </select></td>
                <td><input type="text" id="no' . $no . '" name="no' . $no . '" ></td>
                <td><input type="text" id="no' . $no . '" name="no' . $no . '" ></td>
                </tr>';
        }
    }
}
