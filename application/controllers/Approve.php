<?php
class Approve  extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('model_global'); 
    }



    function index(){
        if($this->session->userdata('name_user') and $this->session->userdata('username')){
            
                $this->load->view('Layouts/error-404');
            
        }else{
            session_destroy();
            redirect('dashboard');
        }
    }

    public function review($id_get){
        $where_estimasi   = array('id_bm' => $id_get);
        $data_estimasi    = $this->model_global->edit_data($where_estimasi, 'barang_masuk_realisasi')->row();

        $where_no_transaksi   = array('no_transaksi' => $data_estimasi->no_transaksi);
        $data_estimasi_result    = $this->model_global->edit_data($where_no_transaksi, 'barang_masuk_realisasi')->result();

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
        $dataGet            = $this->model_global->edit_data($whereGet, 'barang_masuk_realisasi')->row();


        $data = array(
            'contents'          => 'Dashboard/Notif/review',
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

    public function review_bk($id_get){
        $where_estimasi   = array('id_bk' => $id_get);
        $data_estimasi    = $this->model_global->edit_data($where_estimasi, 'barang_keluar_realisasi')->row();

        $where_no_transaksi   = array('no_transaksi' => $data_estimasi->no_transaksi);
        $data_estimasi_result    = $this->model_global->edit_data($where_no_transaksi, 'barang_keluar_realisasi')->result();

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
        $whereGet = array('id_bk' => $id_get);


        
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
        $dataGet            = $this->model_global->edit_data($whereGet, 'barang_keluar_realisasi')->row();


        $data = array(
            'contents'          => 'Dashboard/Notif/review_bk',
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

    public function approve_barang_masuk($no_transaksi){
        if($this->session->userdata('name_user') and $this->session->userdata('username')){
            

                $data_update_notf = array(
                    'status'       => 4
                );

                $where_update_notf = array(
                    'no_transaksi'   => $no_transaksi
                );

                $this->model_global->update_data($where_update_notf, $data_update_notf, 'barang_masuk_realisasi');


                // insert real barang

                

                $where_master          = array('no_transaksi' => $no_transaksi);
                $data_master    = $this->model_global->edit_data($where_master,'barang_masuk_realisasi')->result();

                foreach ($data_master as $value_master){
                        $id_group       = $this->session->userdata('id_group');
                        $username       = $this->session->userdata('username');
                        $created_at     = addslashes(date("Y-m-d H:i:s"));

                        $where_awal = array('id_barang' => $value_master->id_barang);
                        $hasil_awal = $this->model_global->edit_data($where_awal, 'barang')->row();

                        $where_terminal = array('terminal' => $value_master->terminal_terapung);
                        $hasil_terminal = $this->model_global->edit_data($where_terminal, 'ref_terminal')->row();


                      if ($value_master->terminal_tank == "Tank 1.A") {
                          $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($value_master->terminal_tank == "Tank 1.B") {
                          $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($value_master->terminal_tank == "Tank 2.A") {
                          $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($value_master->terminal_tank == "Tank 2.B") {
                          $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($value_master->terminal_tank == "Tank 3.A") {
                          $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($value_master->terminal_tank == "Tank 3.B") {
                          $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($value_master->terminal_tank == "Tank 4.A") {
                          $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($value_master->terminal_tank == "Tank 4.B") {
                          $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($value_master->terminal_tank == "Tank 5.A") {
                          $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($value_master->terminal_tank == "Tank 5.B") {
                          $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($value_master->terminal_tank == "Tank 6.A") {
                          $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      } elseif ($value_master->terminal_tank == "Tank 6.B") {
                          $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }

                        $data_limit_mutasi = array(
                            'po_number'     => $value_master->po_number,
                            'kode_barang'   => $value_master->id_barang,
                            'nama_barang'   => $hasil_awal->nama_brg,
                            'satuan'        => $value_master->id_satuan,
                            'saldo_awal'    => $cektabel->hasil,
                            'pemasukan'     => $value_master->jumlah,
                            'pengeluaran'   => 0,
                            'saldo_akhir'   => 0,
                            'username'          => $username,
                            'activation_date'   => $created_at,
                            'status'            => 3,
                            'terminal_terapung' => $hasil_terminal->terminal,
                            'terminal_tank'     => $value_master->terminal_tank

                        );
                        $this->model_global->input_data($data_limit_mutasi, 'mutasi_bahan');
                        $id_mutasi_bahan = $this->db->insert_id();

                        $data_limit_pk = array(
                        'po_number'         => $value_master->po_number,
                        'no_transaksi'      => $value_master->no_transaksi,
                        'jenis_doc'         => $value_master->jenis_doc,
                        'jenis_pemasukan'   => $value_master->jenis_pemasukan,
                        'no_dokumen_pabean'     => $value_master->no_dokumen_pabean,
                        'no_bukti_penerimaan'   => $value_master->no_bukti_penerimaan,
                        'tgl_dokumen_pabean'    => $value_master->tgl_dokumen_pabean,
                        'negara_asal'       => $value_master->negara_asal,
                        'created_at'        => $value_master->created_at,
                        'id_group'          => $value_master->id_group,
                        'id_client'         => $value_master->id_client,
                        'nama_brg'          => $value_master->nama_brg,
                        'id_barang'         => $value_master->id_barang,
                        'jumlah'            => $value_master->jumlah,
                        'id_satuan'         => $value_master->id_satuan,
                        'nilai_barang'      => $value_master->nilai_barang,
                        'id_mata_uang'      => $value_master->id_mata_uang,
                        'tgl_transaksi'     => $value_master->tgl_transaksi,
                        'terminal_terapung' => $value_master->terminal_terapung,
                        'terminal_tank'     => $value_master->terminal_tank,
                        'nama_kapal'        => $value_master->nama_kapal,
                        'file'              => $value_master->file,
                        'harga'             => $value_master->harga,
                        'penerimaan_kargo_tgl'   => $value_master->penerimaan_kargo_tgl,
                        'penerimaan_kargo_time'  => $value_master->penerimaan_kargo_time,
                        'biaya_kurs'             => $value_master->biaya_kurs,
                        'total_calculate'        => $value_master->total_calculate,
                        'status'             => 3

                );
                $this->model_global->input_data($data_limit_pk, 'barang_masuk');

                    if ($value_master->terminal_tank == "Tank 1.A") {
                        $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($value_master->terminal_tank == "Tank 1.B") {
                        $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($value_master->terminal_tank == "Tank 2.A") {
                        $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($value_master->terminal_tank == "Tank 2.B") {
                        $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($value_master->terminal_tank == "Tank 3.A") {
                        $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($value_master->terminal_tank == "Tank 3.B") {
                        $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($value_master->terminal_tank == "Tank 4.A") {
                        $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($value_master->terminal_tank == "Tank 4.B") {
                        $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($value_master->terminal_tank == "Tank 5.A") {
                        $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($value_master->terminal_tank == "Tank 5.B") {
                        $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($value_master->terminal_tank == "Tank 6.A") {
                        $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    } elseif ($value_master->terminal_tank == "Tank 6.B") {
                        $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    }


                    $data_mutasi = array(
                        'saldo_akhir'       => $cektabel->hasil
                    );

                    $where_mutasi = array(
                        'id_mutasi_bahan'   => $id_mutasi_bahan
                    );

                    $this->model_global->update_data($where_mutasi, $data_mutasi, 'mutasi_bahan');



                }


                // end insert real barang




              $this->session->set_flashdata('succeed','Sukses, Satu data telah berhasil di approve.');
              redirect('dashboard');

            
        }else{
            session_destroy();
            redirect('dashboard');
        }
    }

    public function reject_barang_masuk($no_transaksi){
        if($this->session->userdata('name_user') and $this->session->userdata('username')){
            
                $data_update_notf = array(
                    'status'       => 4
                );

                $where_update_notf = array(
                    'no_transaksi'   => $no_transaksi
                );

                $this->model_global->update_data($where_update_notf, $data_update_notf, 'barang_masuk_realisasi');

                $this->session->set_flashdata('succeed','Sukses, Satu data telah berhasil di reject.');
                redirect('dashboard');

            
        }else{
            session_destroy();
            redirect('dashboard');
        }
    }

    public function revisi_barang_masuk($no_transaksi){
        if($this->session->userdata('name_user') and $this->session->userdata('username')){
                
                $this->db->query("insert barang_masuk_realisasi_log select * from barang_masuk_realisasi where no_transaksi = '$no_transaksi' ");

                $where = array('no_transaksi' => $no_transaksi);
                $this->model_global->hapus_data($where,'barang_masuk_realisasi');

                $data_update_notf = array(
                    'status'       => 1
                );

                $where_update_notf = array(
                    'no_transaksi'   => $no_transaksi
                );

                $this->model_global->update_data($where_update_notf, $data_update_notf, 'barang_masuk_estimasi');

                $this->session->set_flashdata('succeed','Sukses, Satu data telah berhasil di revisi.');
                redirect('dashboard');
        }else{
            session_destroy();
            redirect('dashboard');
        }
    }

    public function revisi_barang_keluar($no_transaksi){
        if($this->session->userdata('name_user') and $this->session->userdata('username')){
                
                $this->db->query("insert barang_keluar_realisasi_log select * from barang_keluar_realisasi where no_transaksi = '$no_transaksi' ");

                $where = array('no_transaksi' => $no_transaksi);
                $this->model_global->hapus_data($where,'barang_keluar_realisasi');

                $data_update_notf = array(
                    'status'       => 1
                );

                $where_update_notf = array(
                    'no_transaksi'   => $no_transaksi
                );

                $this->model_global->update_data($where_update_notf, $data_update_notf, 'barang_keluar_estimasi');

                $this->session->set_flashdata('succeed','Sukses, Satu data telah berhasil di revisi.');
                redirect('dashboard');
        }else{
            session_destroy();
            redirect('dashboard');
        }
    }

    public function approve_barang_keluar($no_transaksi,$jenis_keluar){
        if($this->session->userdata('name_user') and $this->session->userdata('username')){
            

                $data_update_notf = array(
                    'status'       => 4
                );

                $where_update_notf = array(
                    'no_transaksi'   => $no_transaksi
                );

                $this->model_global->update_data($where_update_notf, $data_update_notf, 'barang_keluar_realisasi');

                $where_master          = array('no_transaksi' => $no_transaksi);
                $data_master    = $this->model_global->edit_data($where_master,'barang_keluar_realisasi')->result();

                    $id_group       = $this->session->userdata('id_group');
                    $username       = $this->session->userdata('username');
                    $created_at     = addslashes(date("Y-m-d H:i:s"));

                if($jenis_keluar == 3){

                    foreach ($data_master as $value_master){

                          $where_awal = array('id_barang' => $value_master->id_barang);
                          $hasil_awal = $this->model_global->edit_data($where_awal,'barang')->row();

                          $where_terminal_asal = array('terminal' => $value_master->terminal_terapung);
                          $hasil_terminal_asal = $this->model_global->edit_data($where_terminal_asal,'ref_terminal')->row();

                          $where_terminal_tujuan = array('terminal' => $value_master->terminal_terapung);
                          $hasil_terminal_tujuan = $this->model_global->edit_data($where_terminal_tujuan,'ref_terminal')->row();

                          if($value_master->terminal_tank == "Tank 1.A"){
                              $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($value_master->terminal_tank == "Tank 1.B"){
                              $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($value_master->terminal_tank == "Tank 2.A"){
                              $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($value_master->terminal_tank == "Tank 2.B"){
                              $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();       
                          }elseif($value_master->terminal_tank == "Tank 3.A"){
                              $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($value_master->terminal_tank == "Tank 3.B"){
                              $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($value_master->terminal_tank == "Tank 4.A"){
                              $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($value_master->terminal_tank == "Tank 4.B"){
                              $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($value_master->terminal_tank == "Tank 5.A"){
                              $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($value_master->terminal_tank == "Tank 5.B"){
                              $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($value_master->terminal_tank == "Tank 6.A"){
                              $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($value_master->terminal_tank == "Tank 6.B"){
                              $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }

                          $data_limit_mutasibahan = array(
                                  'po_number'     => $value_master->po_number,
                                  'kode_barang'   => $value_master->id_barang,
                                  'nama_barang'   => $hasil_awal->nama_brg,
                                  'satuan'        => $value_master->id_satuan,
                                  'saldo_awal'    => $cektabel->hasil,
                                  'pemasukan'     => 0,
                                  'pengeluaran'   => $value_master->jumlah,
                                  'saldo_akhir'   => 0,
                                  'username'          => $username,
                                  'activation_date'   => $created_at,
                                  'status'            => 1,
                                  'terminal_terapung' => $hasil_terminal_asal->terminal,
                                  'terminal_tank'     => $value_master->terminal_tank

                          );
                          $this->model_global->input_data($data_limit_mutasibahan,'mutasi_bahan');
                          $id_mutasi_bahan = $this->db->insert_id();

                          $data_limit_pk = array(
                            'po_number'     => $value_master->po_number,
                            'no_transaksi'    => $value_master->no_transaksi,
                            'jenis_doc'       => $value_master->jenis_doc,
                            'jenis_keluar'    => $value_master->jenis_keluar,
                            'no_dokumen_pabean'   => $value_master->no_dokumen_pabean,
                            'no_bukti_pengeluaran'  => $value_master->no_bukti_pengeluaran,
                            'tgl_dokumen_pabean'  => $value_master->tgl_dokumen_pabean,
                            'negara_tujuan'     => $value_master->negara_tujuan,
                            'created_at'        => $value_master->created_at,
                            'id_group'          => $value_master->id_group,
                            'id_client'         => $value_master->id_client,
                            'nama_brg'          => $hasil_awal->nama_brg,
                            'id_barang'         => $value_master->id_barang,
                            'jumlah'            => $value_master->jumlah,
                            'id_satuan'         => $value_master->id_satuan,
                            'nilai_barang'      => $value_master->nilai_barang,
                            'id_mata_uang'      => $value_master->id_mata_uang,
                            'no_transaksi'      => $value_master->no_transaksi,
                            'pembeli_penerima'  => $value_master->pembeli_penerima,
                            'terminal_terapung' => $value_master->terminal_terapung,
                            'terminal_tank'     => $value_master->terminal_tank,
                            'harga'             => $value_master->harga,
                            'file'              => $value_master->file,
                            'pengeluaran_kargo_tgl'     => $value_master->pengeluaran_kargo_tgl,
                            'pengeluaran_kargo_time'    => $value_master->pengeluaran_kargo_time,
                            'biaya_kurs'                => $value_master->biaya_kurs,
                            'total_calculate'           => $value_master->total_calculate,
                            'status'            => 3

                          );
                          $this->model_global->input_data($data_limit_pk,'barang_keluar');
                          

                          if($value_master->terminal_tank == "Tank 1.A"){
                              $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($value_master->terminal_tank == "Tank 1.B"){
                              $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($value_master->terminal_tank == "Tank 2.A"){
                              $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($value_master->terminal_tank == "Tank 2.B"){
                              $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();       
                          }elseif($value_master->terminal_tank == "Tank 3.A"){
                              $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($value_master->terminal_tank == "Tank 3.B"){
                              $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($value_master->terminal_tank == "Tank 4.A"){
                              $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($value_master->terminal_tank == "Tank 4.B"){
                              $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($value_master->terminal_tank == "Tank 5.A"){
                              $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($value_master->terminal_tank == "Tank 5.B"){
                              $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($value_master->terminal_tank == "Tank 6.A"){
                              $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($value_master->terminal_tank == "Tank 6.B"){
                              $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }


                          $data_mutasi = array(
                                      'saldo_akhir'    => $cektabel->hasil
                                  );

                          $where_mutasi = array(
                                      'id_mutasi_bahan'   => $id_mutasi_bahan
                                  );
                          $this->model_global->update_data($where_mutasi,$data_mutasi,'mutasi_bahan');              
                              
                        }
                
                }else{

                    foreach ($data_master as $value_master){
                        

                            $where_awal = array('id_barang' => $value_master->id_barang);
                            $hasil_awal = $this->model_global->edit_data($where_awal, 'barang')->row();

                            $where_terminal = array('terminal' => $value_master->terminal_terapung);
                            $hasil_terminal = $this->model_global->edit_data($where_terminal, 'ref_terminal')->row();

                            if($value_master->terminal_tank == "Tank 1.A"){
                                  $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang_fg where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                            }elseif($value_master->terminal_tank == "Tank 1.B"){
                              $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang_fg where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                            }elseif($value_master->terminal_tank == "Tank 2.A"){
                              $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang_fg where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                            }elseif($value_master->terminal_tank == "Tank 2.B"){
                              $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang_fg where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                            }elseif($value_master->terminal_tank == "Tank 3.A"){
                              $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang_fg where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                            }elseif($value_master->terminal_tank == "Tank 3.B"){
                              $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang_fg where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                            }elseif($value_master->terminal_tank == "Tank 4.A"){
                              $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang_fg where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                            }elseif($value_master->terminal_tank == "Tank 4.B"){
                              $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang_fg where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                            }elseif($value_master->terminal_tank == "Tank 5.A"){
                              $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang_fg where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                            }elseif($value_master->terminal_tank == "Tank 5.B"){
                              $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang_fg where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                            }elseif($value_master->terminal_tank == "Tank 6.A"){
                              $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang_fg where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                            }elseif($value_master->terminal_tank == "Tank 6.B"){
                              $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_fg where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();

                            }

                              $data_limit_mutasi = array(
                                  'po_number'       => $value_master->po_number,
                                  'kode_barang'     => $value_master->id_barang,
                                  'nama_barang'     => $hasil_awal->nama_brg,
                                  'satuan'          => $value_master->id_satuan,
                                  'saldo_awal'      => $cektabel->hasil,
                                  'pemasukan'       => 0,
                                  'pengeluaran'     => $value_master->jumlah,
                                  'saldo_akhir'     => 0,
                                  'username'        => $username,
                                  'activation_date'    => $created_at,
                                  'status'          => 1,
                                  'asal_terminal_terapung' => $hasil_terminal->terminal,
                                  'asal_terminal_tank'   => $value_master->terminal_tank

                              );
                              $this->model_global->input_data($data_limit_mutasi,'mutasi_fg');

                                $id_mutasi_fg = $this->db->insert_id();

                                $data_limit_pk = array(
                                  'po_number'     => $value_master->po_number,
                                  'no_transaksi'    => $value_master->no_transaksi,
                                  'jenis_doc'       => $value_master->jenis_doc,
                                  'jenis_keluar'    => $value_master->jenis_keluar,
                                  'no_dokumen_pabean'   => $value_master->no_dokumen_pabean,
                                  'no_bukti_pengeluaran'  => $value_master->no_bukti_pengeluaran,
                                  'tgl_dokumen_pabean'  => $value_master->tgl_dokumen_pabean,
                                  'negara_tujuan'     => $value_master->negara_tujuan,
                                  'created_at'        => $value_master->created_at,
                                  'id_group'          => $value_master->id_group,
                                  'id_client'         => $value_master->id_client,
                                  'nama_brg'          => $hasil_awal->nama_brg,
                                  'id_barang'         => $value_master->id_barang,
                                  'jumlah'            => $value_master->jumlah,
                                  'id_satuan'         => $value_master->id_satuan,
                                  'nilai_barang'      => $value_master->nilai_barang,
                                  'id_mata_uang'      => $value_master->id_mata_uang,
                                  'no_transaksi'      => $value_master->no_transaksi,
                                  'pembeli_penerima'  => $value_master->pembeli_penerima,
                                  'terminal_terapung' => $hasil_terminal->terminal,
                                  'terminal_tank'     => $value_master->terminal_tank,
                                  'harga'             => $value_master->harga,
                                  'file'              => $value_master->file,
                                  'pengeluaran_kargo_tgl'     => $value_master->pengeluaran_kargo_tgl,
                                  'pengeluaran_kargo_time'    => $value_master->pengeluaran_kargo_timebiaya_kurs,
                                  'biaya_kurs'                => $value_master->biaya_kurs,
                                  'total_calculate'           => $value_master->total_calculate,
                                  'pengeluaran_kargo_tgl'     => $value_master->pengeluaran_kargo_tgl,
                                  'pengeluaran_kargo_time'    => $value_master->pengeluaran_kargo_timebiaya_kurs,
                                  'biaya_kurs'                => $value_master->biaya_kurs,
                                  'total_calculate'           => $value_master->total_calculate,
                                  'status'            => 3

                                );
                              $this->model_global->input_data($data_limit_pk,'barang_keluar');

                            if($value_master->terminal_tank == "Tank 1.A"){
                              $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang_fg where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                            }elseif($value_master->terminal_tank == "Tank 1.B"){
                              $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang_fg where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                            }elseif($value_master->terminal_tank == "Tank 2.A"){
                              $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang_fg where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                            }elseif($value_master->terminal_tank == "Tank 2.B"){
                              $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang_fg where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                            }elseif($value_master->terminal_tank == "Tank 3.A"){
                              $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang_fg where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                            }elseif($value_master->terminal_tank == "Tank 3.B"){
                              $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang_fg where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                            }elseif($value_master->terminal_tank == "Tank 4.A"){
                              $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang_fg where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                            }elseif($value_master->terminal_tank == "Tank 4.B"){
                              $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang_fg where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                            }elseif($value_master->terminal_tank == "Tank 5.A"){
                              $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang_fg where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                            }elseif($value_master->terminal_tank == "Tank 5.B"){
                              $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang_fg where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                            }elseif($value_master->terminal_tank == "Tank 6.A"){
                              $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang_fg where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                            }elseif($value_master->terminal_tank == "Tank 6.B"){
                              $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_fg where id_barang = '$value_master->id_barang' and terminal_terapung = '$hasil_terminal->terminal' ")->row();

                            }

                            

                            $data_mutasi = array(
                                'saldo_akhir'     => $cektabel->hasil
                            );

                            $where_mutasi = array(
                                 'id_mutasi_fg'  => $id_mutasi_fg
                            );


                            $this->model_global->update_data($where_mutasi,$data_mutasi,'mutasi_fg');

                        }

                }


                $this->session->set_flashdata('succeed','Sukses, Satu data telah berhasil di approve.');
                redirect('dashboard');

            
        }else{
            session_destroy();
            redirect('dashboard');
        }
    }

    public function reject_barang_keluar($id_bk){
        if($this->session->userdata('name_user') and $this->session->userdata('username')){
            
                
                $data_update_notf = array(
                    'status'       => 5
                );

                $where_update_notf = array(
                    'id_bk'   => $id_bk
                );

                $this->model_global->update_data($where_update_notf, $data_update_notf, 'barang_keluar_realisasi');

                $this->session->set_flashdata('succeed','Sukses, Satu data telah berhasil di reject.');
                redirect('dashboard');

            
        }else{
            session_destroy();
            redirect('dashboard');
        }
    }


}
?>
