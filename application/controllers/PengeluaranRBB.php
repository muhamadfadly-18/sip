<?php
class PengeluaranRBB  extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('model_global');
  }

  function index(){
    if($this->session->userdata('name_user') and $this->session->userdata('username')){
      if($this->model_user_access->access_access() == 1){

        $tgl_awal   = addslashes($this->input->post('tgl_awal'));
        $tgl_akhir  = addslashes($this->input->post('tgl_akhir'));
        $id_group   = $this->session->userdata('id_group');

        $for_tgl_awal = date('Y-m-d', strtotime($tgl_awal));
            $for_tgl_akhir = date('Y-m-d', strtotime($tgl_akhir));


        if(!empty($tgl_awal)){

            $data_real = $this->db->query("SELECT * FROM barang_keluar WHERE id_group = '$id_group' AND cast(created_at as date) BETWEEN '$for_tgl_awal' AND '$for_tgl_akhir' GROUP BY no_transaksi")->result();
            $data_estimasi = $this->db->query("SELECT * FROM barang_keluar_estimasi WHERE id_group = '$id_group' AND cast(created_at as date) BETWEEN '$for_tgl_awal' AND '$for_tgl_akhir' GROUP BY no_transaksi ")->result();
            $data_realisasi = $this->db->query("SELECT * FROM barang_masuk_realisasi WHERE id_group = '$id_group' AND cast(created_at as date) BETWEEN '$for_tgl_awal' AND '$for_tgl_akhir' GROUP BY no_transaksi ")->result();


        }else{

          $where      = array('id_group' => $id_group);
            $data_real = $this->db->query("SELECT * FROM barang_keluar WHERE id_group = '$id_group'  GROUP BY no_transaksi")->result();
            $data_estimasi = $this->db->query("SELECT * FROM barang_keluar_estimasi WHERE id_group GROUP BY no_transaksi")->result();
            $data_realisasi = $this->db->query("SELECT * FROM barang_keluar_realisasi WHERE id_group GROUP BY no_transaksi")->result();
          // $data_real  = $this->model_global->edit_data($where,'barang_keluar')->result();
        }


        $data = array('contents' => 'Dashboard/PengeluaranRBB/index',
              'data'     => $data_real,
                    'data_estimasi'     => $data_estimasi,
                    'data_realisasi'     => $data_realisasi
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

  function VlidasiTank(){
        $tank         = $this->input->post('tank');
        $jenis_keluar = $this->input->post('jenis_keluar');
        $id_barang    = $this->input->post('id_barang');

                if($jenis_keluar == 1){

                      if($tank == "Tank 1.A"){
                          $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$id_barang'  ")->row();
                      }elseif($tank == "Tank 1.B"){
                          $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$id_barang'  ")->row();
                      }elseif($tank == "Tank 2.A"){
                          $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$id_barang'  ")->row();
                      }elseif($tank == "Tank 2.B"){
                          $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$id_barang'  ")->row();       
                      }elseif($tank == "Tank 3.A"){
                          $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$id_barang'  ")->row();
                      }elseif($tank == "Tank 3.B"){
                          $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$id_barang'  ")->row();
                      }elseif($tank == "Tank 4.A"){
                          $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$id_barang'  ")->row();
                      }elseif($tank == "Tank 4.B"){
                          $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$id_barang'  ")->row();
                      }elseif($tank == "Tank 5.A"){
                          $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$id_barang'  ")->row();
                      }elseif($tank == "Tank 5.B"){
                          $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$id_barang'  ")->row();
                      }elseif($tank == "Tank 6.A"){
                          $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$id_barang'  ")->row();
                      }elseif($tank == "Tank 6.B"){
                          $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$id_barang'  ")->row();
                      }

                }else{
                    
                    if($tank == "Tank 1.A"){
                          $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang_fg where id_barang = '$id_barang' ")->row();
                    }elseif($tank == "Tank 1.B"){
                      $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang_fg where id_barang = '$id_barang' ")->row();
                    }elseif($tank == "Tank 2.A"){
                      $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang_fg where id_barang = '$id_barang' ")->row();
                    }elseif($tank == "Tank 2.B"){
                      $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang_fg where id_barang = '$id_barang' ")->row();
                    }elseif($tank == "Tank 3.A"){
                      $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang_fg where id_barang = '$id_barang' ")->row();
                    }elseif($tank == "Tank 3.B"){
                      $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang_fg where id_barang = '$id_barang' ")->row();
                    }elseif($tank == "Tank 4.A"){
                      $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang_fg where id_barang = '$id_barang' ")->row();
                    }elseif($tank == "Tank 4.B"){
                      $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang_fg where id_barang = '$id_barang' ")->row();
                    }elseif($tank == "Tank 5.A"){
                      $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang_fg where id_barang = '$id_barang' ")->row();
                    }elseif($tank == "Tank 5.B"){
                      $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang_fg where id_barang = '$id_barang' ")->row();
                    }elseif($tank == "Tank 6.A"){
                      $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang_fg where id_barang = '$id_barang' ")->row();
                    }elseif($tank == "Tank 6.B"){
                      $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_fg where id_barang = '$id_barang' ")->row();
                    }

                }
        
        $number_format = number_format($cektabel->hasil,0,',','');
        
        $feedback = array(
            'id_ponumber' => $number_format,
            // 'id_ponumber2' => $data_->vessel_barge,
                        );

        echo json_encode($feedback);
    }

  public function add(){
    if($this->session->userdata('name_user') and $this->session->userdata('username')){
      if($this->model_user_access->access_add() == 1){
        $this->load->library('auto_number');
        $id_group   = $this->session->userdata('id_group');
        $row = $this->model_global->id_terakhir_bk();

        if(empty($row->id_bk)){
                    $config['id'] = 0;
                }else{
                   $config['id'] = $row->id_bk;
                }

            
            $config['awalan'] = 'BK';
            $config['digit'] = 4;
        $this->auto_number->config($config);

        $where = array('jenis' => 'Supplier');
        $whereTer = array('id_group' => $id_group);

        $kategori_barang    = $this->model_global->getAll('ref_kategori')->result();
        $satuan             = $this->model_global->getAll('ref_satuan')->result();
      //  $dokumen            = $this->model_global->getAll('ref_dokumen')->result();
        $dokumen = $this->db->query("SELECT * FROM ref_dokumen where status ='Out'")->result();

        $purchase           = $this->model_global->getAll('purchase')->result();
        $jenis            = $this->model_global->getAll('ref_jenis')->result();
        $barang             = $this->model_global->getAll('barang')->result();
        $kurs             = $this->model_global->getAll('ref_kurs')->result();
        $client       = $this->model_global->edit_data($where,'ref_client')->result();
        $terminal     = $this->model_global->edit_data($whereTer,'ref_terminal')->result();
        $terminal2          = $this->model_global->getAll('ref_terminal')->row();
        $wheretank          = array('id_terminal' => $terminal2->id_terminal);
        $bendera            = $this->model_global->getAll('ref_negara_asal')->result();
        $tank2              = $this->model_global->edit_data($wheretank, 'ref_terminal_tank')->result();

        $data = array('contents' => 'Dashboard/PengeluaranRBB/add',
              'kategori_barang'   => $kategori_barang,
              'satuan'      => $satuan,
              'dokumen'       => $dokumen,
              'barang'      => $barang,
              'jenis'       => $jenis,
              'kurs'        => $kurs,
              'client'      => $client,
              'purchase'      => $purchase,
              'terminal'      => $terminal,
              'terminal2'         => $terminal2,
              'tank2'             => $tank2,
              'bendera'           => $bendera,
              'kodetrx'       => $this->auto_number->generate_id_bk()
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

  public function add_get($id_get){
    if($this->session->userdata('name_user') and $this->session->userdata('username')){
      if($this->model_user_access->access_add() == 1){

        $this->load->library('auto_number');
        $id_group   = $this->session->userdata('id_group');
        $row = $this->model_global->id_terakhir_bk();

            if(empty($row->id_bk)){
                $config['id'] = 0;
            }else{
                $config['id'] = $row->id_bk;
            }

            $config['awalan'] = 'BK';
            $config['digit'] = 4;

        $this->auto_number->config($config);

        $where      = array('jenis' => 'Supplier');
        $whereTer   = array('id_group' => $id_group);
        $wherenotif = array('id_bm' => $id_get);
        $whereGet   = array('id_bm' => $id_get);
        $whereJenis = array('id_jenis' => 3);

        $notif      = $this->model_global->edit_data($wherenotif, 'tr_notif')->row();
        $whereter2  = array('terminal' => $notif->terminal_terapung);
        $terminal2  = $this->model_global->edit_data($whereter2, 'ref_terminal')->row();
        $wheretank2 = array('id_terminal' => $terminal2->id_terminal);
        $tank2      = $this->model_global->edit_data($wheretank2, 'ref_terminal_tank')->result();
        $kategori_barang    = $this->model_global->getAll('ref_kategori')->result();
        $satuan             = $this->model_global->getAll('ref_satuan')->result();
        $dokumen            = $this->model_global->getAll('ref_dokumen')->result();
        $purchase           = $this->model_global->getAll('purchase')->result();
        $jenis              = $this->model_global->edit_data($whereJenis, 'ref_jenis')->result();
        $barang             = $this->model_global->getAll('barang')->result();
        $kurs               = $this->model_global->getAll('ref_kurs')->result();
        $client             = $this->model_global->edit_data($where,'ref_client')->result();
        $terminal           = $this->model_global->edit_data($whereTer,'ref_terminal')->row();
        $dataGet            = $this->model_global->edit_data($whereGet, 'tr_notif')->row();

        $data = array('contents' => 'Dashboard/PengeluaranRBB/add_get',
              'kategori_barang'   => $kategori_barang,
              'notif'       => $notif,
              'terminal2'   => $terminal2,
              'tank2'       => $tank2,
              'satuan'      => $satuan,
              'dokumen'     => $dokumen,
              'barang'      => $barang,
              'jenis'       => $jenis,
              'kurs'        => $kurs,
              'client'      => $client,
              'purchase'    => $purchase,
              'terminal'    => $terminal,
              'dataGet'     => $dataGet,
              'kodetrx'     => $this->auto_number->generate_id_bk()
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

  public function add_realisasi($id_get){
    if($this->session->userdata('name_user') and $this->session->userdata('username')){
      if($this->model_user_access->access_add() == 1){
        $this->load->library('auto_number');
        $id_group   = $this->session->userdata('id_group');
        

        $where      = array('jenis' => 'Supplier');
        $whereTer   = array('id_group' => $id_group);
        $wherenotif = array('id_bk' => $id_get);
        $whereGet   = array('id_bk' => $id_get);

        $notif          = $this->model_global->edit_data($wherenotif, 'barang_keluar_estimasi')->row();
        $whereter2      = array('terminal' => $notif->terminal_terapung);
        $terminal2      = $this->model_global->edit_data($whereter2, 'ref_terminal')->row();
        $wheretank2      = array('id_terminal' => $terminal2->id_terminal);
        $tank2         = $this->model_global->edit_data($wheretank2, 'ref_terminal_tank')->result();
        $kategori_barang    = $this->model_global->getAll('ref_kategori')->result();
        $satuan             = $this->model_global->getAll('ref_satuan')->result();
        $dokumen            = $this->model_global->getAll('ref_dokumen')->result();
        $purchase           = $this->model_global->getAll('purchase')->result();
        $jenis            = $this->model_global->getAll('ref_jenis')->result();
        $barang             = $this->model_global->getAll('barang')->result();
        $bendera            = $this->model_global->getAll('ref_negara_asal')->result();
        $kurs             = $this->model_global->getAll('ref_kurs')->result();
        $client       = $this->model_global->edit_data($where,'ref_client')->result();
        $terminal     = $this->model_global->edit_data($whereTer,'ref_terminal')->row();
        $dataGet      = $this->model_global->edit_data($whereGet, 'barang_keluar_estimasi')->row();
        $where_no_transaksi   = array('no_transaksi' => $dataGet->no_transaksi);
        $data_estimasi_result    = $this->model_global->edit_data($where_no_transaksi, 'barang_keluar_estimasi')->result();
        $count_real = count($data_estimasi_result);

        $data = array('contents'  => 'Dashboard/PengeluaranRBB/add_realisasi',
              'kategori_barang'     => $kategori_barang,
              'notif'           => $notif,
              'terminal2'       => $terminal2,
              'tank2'           => $tank2,
              'satuan'          => $satuan,
              'dokumen'         => $dokumen,
              'bendera'          => $bendera,
              'barang'          => $barang,
              'jenis'           => $jenis,
              'kurs'            => $kurs,
              'client'          => $client,
              'purchase'        => $purchase,
              'terminal'        => $terminal,
              'data_estimasi'       => $dataGet,
              'data_estimasi_result'     => $data_estimasi_result,
              'count_real'        => $count_real
              
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
      if($this->session->userdata('name_user') and $this->session->userdata('username')){
        if($this->model_user_access->access_add() == 1){
  
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
  
              $this->db->select_max('id_bk');
              $this->db->from('barang_keluar_estimasi');
              $query = $this->db->get();
              $r = $query->row();
              $total_id = empty($r->id_bk) ? 1 : $r->id_bk + 1;
  
              $onlymonth      = date("m");
              $onlyyears      = date("Y");
  
              $id_bm              = addslashes($this->input->post('id_bm'));
              $terminal           = 1;
              $sat_real           = addslashes($this->input->post('sat_real'));
              $po_number          = addslashes($this->input->post('po_number'));
              $no_transaksi       = "TRX".$onlyyears.$onlymonth.$total_id;
              $jenis_doc          = addslashes($this->input->post('jenis_doc'));
              $jenis_keluar       = addslashes($this->input->post('jenis_keluar'));
              $pengirim_barang_nama   = addslashes($this->input->post('pengirim_barang'));
              $pengeluaran_kargo_tgl       = addslashes($this->input->post('pengeluaran_kargo_tgl'));
              $pengeluaran_kargo_time      = addslashes($this->input->post('pengeluaran_kargo_time'));
              // echo $pengeluaran_kargo_tgl;
              // echo "---";
              // echo $pengeluaran_kargo_time;
              // die();
              // $hasil = explode("-",$pengirim_barang1);
  
              // $pengirim_barang =  $hasil[0];
              // $pengirim_barang_nama = $hasil[1];
  
              $no_dokumen_pabean    = addslashes($this->input->post('no_dokumen_pabean'));
              $no_bukti_penerimaan  = addslashes($this->input->post('no_bukti_penerimaan'));
              $tgl_dokumen_pabean   = addslashes($this->input->post('tgl_dokumen_pabean'));
              $negara_asal    = addslashes($this->input->post('countries'));
  
              $id_group     = $this->session->userdata('id_group');
              $username     = $this->session->userdata('username');
              $created_at   = addslashes(date("Y-m-d H:i:s"));
          
  
          // $keterangan2 = $keterangan2;
          // $qty        = addslashes($this->input->post('qty_real'));
          // $sat        = $sat_real;
          // $harga      = addslashes($this->input->post('harga_satuan_real'));
          // $total      = addslashes($this->input->post('hasil_real'));
          // $cur        = addslashes($this->input->post('kurs_real'));
          // $terminal2  = $terminal;
          // $tank       = addslashes($this->input->post('tank_real'));
  
          /*$data = array(
                'po_number'     => $po_number,
                'no_transaksi'    => $no_transaksi,
                'jenis_doc'       => $jenis_doc,
                'jenis_pemasukan'   => $jenis_pemasukan,
                'no_dokumen_pabean'   => $no_dokumen_pabean,
                'no_bukti_penerimaan'   => $no_bukti_penerimaan,
                'tgl_dokumen_pabean'  => $tgl_dokumen_pabean,
                'negara_asal'     => $negara_asal,
                'created_at'    => $created_at,
                'id_group'      => $id_group
                );*/
  
          // $limit_pk = addslashes($this->input->post('limit_pk'));
  
          /*print_r($data);
          echo "-------------";
          echo $limit_pk;
          die();*/
  
  
                  // $keterangan = addslashes($this->input->post('keterangan'));
                  // $qty = addslashes($this->input->post('qty'));
                  // $sat = addslashes($this->input->post('sat'));
                  // $harga = addslashes($this->input->post('harga'));
                  // $total = addslashes($this->input->post('total'));
                  // $terminal = addslashes($this->input->post('terminal'));
                  // $tank     = addslashes($this->input->post('tank'));
                  // $cur = addslashes($this->input->post('cur'));
                  $jenis_keluar   = addslashes($this->input->post('jenis_keluar'));
                  $limit_pk = addslashes($this->input->post('limit_pk'));
  
                  if($jenis_keluar == 3){
  
                        for ($i=0; $i < $limit_pk; $i++) {
  
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
  
                            $calculatebiayakurs      = addslashes($this->input->post('calculatebiayakurs' . $i));
                            $replacecalculatebiayakurskoma = str_replace(".","",$calculatebiayakurs);
                            $replacecalculatebiayakurskoma = str_replace(",",".",$replacecalculatebiayakurskoma);
                            
  
                            $where_awal = array('id_barang' => $keterangan);
                            $hasil_awal = $this->model_global->edit_data($where_awal,'barang')->row();
  
                            $where_terminal_asal = array('id_terminal' => $terminal2);
                            $hasil_terminal_asal = $this->model_global->edit_data($where_terminal_asal,'ref_terminal')->row();
  
                            $where_terminal_tujuan = array('id_terminal' => $terminal2);
                            $hasil_terminal_tujuan = $this->model_global->edit_data($where_terminal_tujuan,'ref_terminal')->row();
  
                             
  
                        if($terminal == "1" && $tank == "Tank 1.A"){
                            $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                        }elseif($terminal == "1" && $tank == "Tank 1.B"){
                            $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                        }elseif($terminal == "1" && $tank == "Tank 2.A"){
                            $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                        }elseif($terminal == "1" && $tank == "Tank 2.B"){
                            $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();       
                        }elseif($terminal == "1" && $tank == "Tank 3.A"){
                            $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                        }elseif($terminal == "1" && $tank == "Tank 3.B"){
                            $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                        }elseif($terminal == "1" && $tank == "Tank 4.A"){
                            $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                        }elseif($terminal == "1" && $tank == "Tank 4.B"){
                            $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                        }elseif($terminal == "1" && $tank == "Tank 5.A"){
                            $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                        }elseif($terminal == "1" && $tank == "Tank 5.B"){
                            $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                        }elseif($terminal == "1" && $tank == "Tank 6.A"){
                            $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                        }elseif($terminal == "1" && $tank == "Tank 6.B"){
                            $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                        }
  
                            $data_limit_mutasibahan = array(
                                    'po_number'     => $po_number,
                                    'kode_barang'   => $keterangan,
                                    'nama_barang'   => $hasil_awal->nama_brg,
                                    'satuan'        => $hasil_awal->uom,
                                    'saldo_awal'    => $cektabel->hasil,
                                    'pemasukan'     => 0,
                                    'pengeluaran'   => $qty,
                                    'saldo_akhir'   => 0,
                                    'username'          => $username,
                                    'activation_date'   => $created_at,
                                    'status'            => 1,
                                    'terminal_terapung' => $hasil_terminal_asal->terminal,
                                    'terminal_tank'     => $tank
  
                            );
                            $this->model_global->input_data($data_limit_mutasibahan,'mutasi_bahan_estimasi');
                            $id_mutasi_bahan = $this->db->insert_id();
  
                            $data_limit_pk = array(
                              'po_number'     => $po_number,
                              'no_transaksi'    => $no_transaksi,
                              'tgl_transaksi'    => $created_at,
                              'jenis_doc'       => $jenis_doc,
                              'jenis_keluar'    => $jenis_keluar,
                              'no_dokumen_pabean'   => $no_dokumen_pabean,
                              'no_bukti_pengeluaran'  => $no_bukti_penerimaan,
                              'tgl_dokumen_pabean'  => $tgl_dokumen_pabean,
                              'negara_tujuan'     => $negara_asal,
                              'created_at'        => $created_at,
                              'id_group'          => $id_group,
                              'id_client'         => $pengirim_barang,
                              'nama_brg'          => $hasil_awal->nama_brg,
                              'id_barang'         => $keterangan,
                              'jumlah'            => $qty,
                              'id_satuan'         => $hasil_awal->uom,
                              'nilai_barang'      => $total,
                              'id_mata_uang'      => $cur,
                              'pembeli_penerima'  => $pengirim_barang_nama,
                              'terminal_terapung' => $hasil_terminal_asal->terminal,
                              'terminal_tank'     => $tank,
                              'harga'             => $harga,
                              'file'              => $fileFoto,
                              'pengeluaran_kargo_tgl'        => $pengeluaran_kargo_tgl,
                              'pengeluaran_kargo_time'       => $pengeluaran_kargo_time,
                              'biaya_kurs'        => $replacekurskoma,
                              'total_calculate'   => $replacecalculatebiayakurskoma,
                              'status'            => 1
  
                            );
                            $this->model_global->input_data($data_limit_pk,'barang_keluar_estimasi');
                            
  
                            if($terminal == "1" && $tank == "Tank 1.A"){
                                $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                            }elseif($terminal == "1" && $tank == "Tank 1.B"){
                                $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                            }elseif($terminal == "1" && $tank == "Tank 2.A"){
                                $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                            }elseif($terminal == "1" && $tank == "Tank 2.B"){
                                $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();       
                            }elseif($terminal == "1" && $tank == "Tank 3.A"){
                                $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                            }elseif($terminal == "1" && $tank == "Tank 3.B"){
                                $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                            }elseif($terminal == "1" && $tank == "Tank 4.A"){
                                $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                            }elseif($terminal == "1" && $tank == "Tank 4.B"){
                                $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                            }elseif($terminal == "1" && $tank == "Tank 5.A"){
                                $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                            }elseif($terminal == "1" && $tank == "Tank 5.B"){
                                $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                            }elseif($terminal == "1" && $tank == "Tank 6.A"){
                                $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                            }elseif($terminal == "1" && $tank == "Tank 6.B"){
                                $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                            }
  
  
                            $data_mutasi = array(
                                        'saldo_akhir'    => $cektabel->hasil
                                    );
  
                            $where_mutasi = array(
                                        'id_mutasi_bahan'   => $id_mutasi_bahan
                                    );
                            $this->model_global->update_data($where_mutasi,$data_mutasi,'mutasi_bahan_estimasi');            
                            $data_update_notf = array(
                                  'status'       => 1
                            );
  
                            $where_update_notf = array(
                                  'id_bm'   => $id_bm
                            );
  
                            $this->model_global->update_data($where_update_notf, $data_update_notf, 'tr_notif');
                                
                            }
  
                  }else{
  
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
  
                      $calculatebiayakurs      = addslashes($this->input->post('calculatebiayakurs' . $i));
                      $replacecalculatebiayakurskoma  = str_replace(",","",$calculatebiayakurs);
  
                      $where_awal = array('id_barang' => $keterangan);
                      $hasil_awal = $this->model_global->edit_data($where_awal,'barang')->row();
  
                      $where_terminal = array('id_terminal' => $terminal);
                      $hasil_terminal = $this->model_global->edit_data($where_terminal,'ref_terminal')->row();
  
                      if($terminal == "1" && $tank == "Tank 1.A"){
                        $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 1.B"){
                        $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 2.A"){
                        $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 2.B"){
                        $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 3.A"){
                        $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 3.B"){
                        $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 4.A"){
                        $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 4.B"){
                        $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 5.A"){
                        $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 5.B"){
                        $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 6.A"){
                        $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 6.B"){
                        $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }
  
                        $data_limit_mutasi = array(
                            'po_number'   => $po_number,
                            'kode_barang'   => $keterangan,
                            'nama_barang'   => $hasil_awal->nama_brg,
                            'satuan'    => $hasil_awal->uom,
                            'saldo_awal'  => $cektabel->hasil,
                            'pemasukan'   => 0,
                            'pengeluaran'   => $qty,
                            'saldo_akhir'   => 0,
                            'username'      => $username,
                            'activation_date'    => $created_at,
                            'status'      => 1,
                            'asal_terminal_terapung' => $hasil_terminal->terminal,
                            'asal_terminal_tank'   => $tank
  
                        );
                        $this->model_global->input_data($data_limit_mutasi,'mutasi_fg_estimasi');
  
                        $id_mutasi_fg = $this->db->insert_id();
  
                        $data_limit_pk = array(
                              'po_number'     => $po_number,
                              'no_transaksi'    => $no_transaksi,
                              'jenis_doc'       => $jenis_doc,
                              'jenis_keluar'    => $jenis_keluar,
                              'no_dokumen_pabean'   => $no_dokumen_pabean,
                              'no_bukti_pengeluaran'  => $no_bukti_penerimaan,
                              'tgl_dokumen_pabean'  => $tgl_dokumen_pabean,
                              'negara_tujuan'     => $negara_asal,
                              'created_at'        => $created_at,
                              'id_group'          => $id_group,
                              'id_client'         => $pengirim_barang,
                              'nama_brg'          => $hasil_awal->nama_brg,
                              'id_barang'         => $keterangan,
                              'jumlah'            => $qty,
                              'id_satuan'         => $sat,
                              'nilai_barang'      => $total,
                              'id_mata_uang'      => $cur,
                              'no_transaksi'      => $no_transaksi,
                              'pembeli_penerima'  => $pengirim_barang_nama,
                              'terminal_terapung' => $hasil_terminal->terminal,
                              'terminal_tank'     => $tank,
                              'harga'             => $harga,
                              'file'              => $fileFoto,
                              'pengeluaran_kargo_tgl'        => $pengeluaran_kargo_tgl,
                              'pengeluaran_kargo_time'       => $pengeluaran_kargo_time,
                              'biaya_kurs'        => $replacekurskoma,
                              'total_calculate'   => $replacecalculatebiayakurskoma,
                              'status'            => 1
  
                        );
                        $this->model_global->input_data($data_limit_pk,'barang_keluar_estimasi');
  
                        if($terminal == "1" && $tank == "Tank 1.A"){
                          $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                        }elseif($terminal == "1" && $tank == "Tank 1.B"){
                          $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                        }elseif($terminal == "1" && $tank == "Tank 2.A"){
                          $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                        }elseif($terminal == "1" && $tank == "Tank 2.B"){
                          $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                        }elseif($terminal == "1" && $tank == "Tank 3.A"){
                          $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                        }elseif($terminal == "1" && $tank == "Tank 3.B"){
                          $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                        }elseif($terminal == "1" && $tank == "Tank 4.A"){
                          $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                        }elseif($terminal == "1" && $tank == "Tank 4.B"){
                          $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                        }elseif($terminal == "1" && $tank == "Tank 5.A"){
                          $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                        }elseif($terminal == "1" && $tank == "Tank 5.B"){
                          $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                        }elseif($terminal == "1" && $tank == "Tank 6.A"){
                          $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                        }elseif($terminal == "1" && $tank == "Tank 6.B"){
                          $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                        }
  
                        $where_akhir = array('id_barang' => $keterangan);
                        $hasil_akhir = $this->model_global->edit_data($where_akhir,'barang')->row();
  
                        $data_mutasi = array(
                            'saldo_akhir'     => $cektabel->hasil
                          );
  
                        $where_mutasi = array(
                            'id_mutasi_fg'  => $id_mutasi_fg
                          );
  
  
                        $this->model_global->update_data($where_mutasi,$data_mutasi,'mutasi_fg_estimasi');
  
                        $data_update_notf = array(
                              'status'       => 1
                        );
  
                        $where_update_notf = array(
                              'id_bm'   => $id_bm
                        );
  
                        $this->model_global->update_data($where_update_notf, $data_update_notf, 'tr_notif');
  
                    }    
  
                  }
  
          //log
  
          $assign_type= '';
          activity_log("Pengeluaran -> Pemasukan Bahan Baku", "Menambah data Pemasukan Bahan Baku", $id_group, $assign_type);
          $this->session->set_flashdata('succeed','Sukses, Satu data telah berhasil disimpan.');
          redirect('PengeluaranRBB');
        }else{
          $this->load->view('Layouts/error-404');
        }
      }else{
        session_destroy();
        redirect('dashboard');
      }
  }

  public function add_action_get(){
    if($this->session->userdata('name_user') and $this->session->userdata('username')){
      if($this->model_user_access->access_add() == 1){

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

            $this->db->select_max('id_bk');
            $this->db->from('barang_keluar_estimasi');
            $query = $this->db->get();
            $r = $query->row();
            $total_id = empty($r->id_bk) ? 1 : $r->id_bk + 1;

            $onlymonth      = date("m");
            $onlyyears      = date("Y");

            $id_bm              = addslashes($this->input->post('id_bm'));
            $keterangan        = addslashes($this->input->post('barang'));
            $terminal           = addslashes($this->input->post('terminal_real'));
            $sat_real           = addslashes($this->input->post('sat_real'));
            $po_number          = addslashes($this->input->post('po_number'));
            $no_transaksi       = "TRX".$onlyyears.$onlymonth.$total_id;
            $jenis_doc          = addslashes($this->input->post('jenis_doc'));
            $jenis_keluar       = addslashes($this->input->post('jenis_keluar'));
            $pengirim_barang_nama   = addslashes($this->input->post('pengirim_barang'));
            $pengeluaran_kargo_tgl       = addslashes($this->input->post('pengeluaran_kargo_tgl'));
            $pengeluaran_kargo_time      = addslashes($this->input->post('pengeluaran_kargo_time'));
            // echo $pengeluaran_kargo_tgl;
            // echo "---";
            // echo $pengeluaran_kargo_time;
            // die();
            // $hasil = explode("-",$pengirim_barang1);

            // $pengirim_barang =  $hasil[0];
            // $pengirim_barang_nama = $hasil[1];

            $no_dokumen_pabean    = addslashes($this->input->post('no_dokumen_pabean'));
            $no_bukti_penerimaan  = addslashes($this->input->post('no_bukti_penerimaan'));
            $tgl_dokumen_pabean   = addslashes($this->input->post('tgl_dokumen_pabean'));
            $negara_asal    = addslashes($this->input->post('negara_asal'));

            $id_group     = $this->session->userdata('id_group');
            $username     = $this->session->userdata('username');
            $created_at   = addslashes(date("Y-m-d H:i:s"));
        

        // $keterangan2 = $keterangan2;
        // $qty        = addslashes($this->input->post('qty_real'));
        // $sat        = $sat_real;
        // $harga      = addslashes($this->input->post('harga_satuan_real'));
        // $total      = addslashes($this->input->post('hasil_real'));
        // $cur        = addslashes($this->input->post('kurs_real'));
        // $terminal2  = $terminal;
        // $tank       = addslashes($this->input->post('tank_real'));

        /*$data = array(
              'po_number'     => $po_number,
              'no_transaksi'    => $no_transaksi,
              'jenis_doc'       => $jenis_doc,
              'jenis_pemasukan'   => $jenis_pemasukan,
              'no_dokumen_pabean'   => $no_dokumen_pabean,
              'no_bukti_penerimaan'   => $no_bukti_penerimaan,
              'tgl_dokumen_pabean'  => $tgl_dokumen_pabean,
              'negara_asal'     => $negara_asal,
              'created_at'    => $created_at,
              'id_group'      => $id_group
              );*/

        // $limit_pk = addslashes($this->input->post('limit_pk'));

        /*print_r($data);
        echo "-------------";
        echo $limit_pk;
        die();*/


                // $keterangan = addslashes($this->input->post('keterangan'));
                // $qty = addslashes($this->input->post('qty'));
                // $sat = addslashes($this->input->post('sat'));
                // $harga = addslashes($this->input->post('harga'));
                // $total = addslashes($this->input->post('total'));
                // $terminal = addslashes($this->input->post('terminal'));
                // $tank     = addslashes($this->input->post('tank'));
                // $cur = addslashes($this->input->post('cur'));
                $jenis_keluar   = addslashes($this->input->post('jenis_keluar'));
                $limit_pk = addslashes($this->input->post('limit_pk'));

                if($jenis_keluar == 3){

                      for ($i=0; $i < $limit_pk; $i++) {

                          $keterangan = $keterangan;
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

                          $calculatebiayakurs      = addslashes($this->input->post('calculatebiayakurs' . $i));
                          $replacecalculatebiayakurskoma = str_replace(".","",$calculatebiayakurs);
                          $replacecalculatebiayakurskoma = str_replace(",",".",$replacecalculatebiayakurskoma);
                          

                          $where_awal = array('id_barang' => $keterangan);
                          $hasil_awal = $this->model_global->edit_data($where_awal,'barang')->row();

                          $where_terminal_asal = array('id_terminal' => $terminal2);
                          $hasil_terminal_asal = $this->model_global->edit_data($where_terminal_asal,'ref_terminal')->row();

                          $where_terminal_tujuan = array('id_terminal' => $terminal2);
                          $hasil_terminal_tujuan = $this->model_global->edit_data($where_terminal_tujuan,'ref_terminal')->row();

                           

                      if($terminal == "1" && $tank == "Tank 1.A"){
                          $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 1.B"){
                          $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 2.A"){
                          $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 2.B"){
                          $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();       
                      }elseif($terminal == "1" && $tank == "Tank 3.A"){
                          $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 3.B"){
                          $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 4.A"){
                          $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 4.B"){
                          $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 5.A"){
                          $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 5.B"){
                          $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 6.A"){
                          $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 6.B"){
                          $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                      }

                          $data_limit_mutasibahan = array(
                                  'po_number'     => $po_number,
                                  'kode_barang'   => $keterangan,
                                  'nama_barang'   => $hasil_awal->nama_brg,
                                  'satuan'        => $hasil_awal->uom,
                                  'saldo_awal'    => $cektabel->hasil,
                                  'pemasukan'     => 0,
                                  'pengeluaran'   => $qty,
                                  'saldo_akhir'   => 0,
                                  'username'          => $username,
                                  'activation_date'   => $created_at,
                                  'status'            => 1,
                                  'terminal_terapung' => $hasil_terminal_asal->terminal,
                                  'terminal_tank'     => $tank

                          );
                          $this->model_global->input_data($data_limit_mutasibahan,'mutasi_bahan_estimasi');
                          $id_mutasi_bahan = $this->db->insert_id();

                          $data_limit_pk = array(
                            'po_number'     => $po_number,
                            'no_transaksi'    => $no_transaksi,
                            'tgl_transaksi'    => $created_at,
                            'jenis_doc'       => $jenis_doc,
                            'jenis_keluar'    => $jenis_keluar,
                            'no_dokumen_pabean'   => $no_dokumen_pabean,
                            'no_bukti_pengeluaran'  => $no_bukti_penerimaan,
                            'tgl_dokumen_pabean'  => $tgl_dokumen_pabean,
                            'negara_tujuan'     => $negara_asal,
                            'created_at'        => $created_at,
                            'id_group'          => $id_group,
                            'id_client'         => $pengirim_barang,
                            'nama_brg'          => $hasil_awal->nama_brg,
                            'id_barang'         => $keterangan,
                            'jumlah'            => $qty,
                            'id_satuan'         => $sat,
                            'nilai_barang'      => $total,
                            'id_mata_uang'      => $cur,
                            'pembeli_penerima'  => $pengirim_barang_nama,
                            'terminal_terapung' => $hasil_terminal_asal->terminal,
                            'terminal_tank'     => $tank,
                            'harga'             => $harga,
                            'file'              => $fileFoto,
                            'pengeluaran_kargo_tgl'        => $pengeluaran_kargo_tgl,
                            'pengeluaran_kargo_time'       => $pengeluaran_kargo_time,
                            'biaya_kurs'        => $replacekurskoma,
                            'total_calculate'   => $replacecalculatebiayakurskoma,
                            'status'            => 1

                          );
                          $this->model_global->input_data($data_limit_pk,'barang_keluar_estimasi');
                          

                          if($terminal == "1" && $tank == "Tank 1.A"){
                              $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($terminal == "1" && $tank == "Tank 1.B"){
                              $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($terminal == "1" && $tank == "Tank 2.A"){
                              $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($terminal == "1" && $tank == "Tank 2.B"){
                              $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();       
                          }elseif($terminal == "1" && $tank == "Tank 3.A"){
                              $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($terminal == "1" && $tank == "Tank 3.B"){
                              $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($terminal == "1" && $tank == "Tank 4.A"){
                              $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($terminal == "1" && $tank == "Tank 4.B"){
                              $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($terminal == "1" && $tank == "Tank 5.A"){
                              $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($terminal == "1" && $tank == "Tank 5.B"){
                              $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($terminal == "1" && $tank == "Tank 6.A"){
                              $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($terminal == "1" && $tank == "Tank 6.B"){
                              $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }


                          $data_mutasi = array(
                                      'saldo_akhir'    => $cektabel->hasil
                                  );

                          $where_mutasi = array(
                                      'id_mutasi_bahan'   => $id_mutasi_bahan
                                  );
                          $this->model_global->update_data($where_mutasi,$data_mutasi,'mutasi_bahan_estimasi');            
                          $data_update_notf = array(
                                'status'       => 1
                          );

                          $where_update_notf = array(
                                'id_bm'   => $id_bm
                          );

                          $this->model_global->update_data($where_update_notf, $data_update_notf, 'tr_notif');
                              
                          }

                }   {

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

                    $calculatebiayakurs      = addslashes($this->input->post('calculatebiayakurs' . $i));
                    $replacecalculatebiayakurskoma  = str_replace(",","",$calculatebiayakurs);

                    $where_awal = array('id_barang' => $keterangan);
                    $hasil_awal = $this->model_global->edit_data($where_awal,'barang')->row();

                    $where_terminal = array('id_terminal' => $terminal);
                    $hasil_terminal = $this->model_global->edit_data($where_terminal,'ref_terminal')->row();

                    if($terminal == "1" && $tank == "Tank 1.A"){
                          $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    }elseif($terminal == "1" && $tank == "Tank 1.B"){
                      $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    }elseif($terminal == "1" && $tank == "Tank 2.A"){
                      $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    }elseif($terminal == "1" && $tank == "Tank 2.B"){
                      $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    }elseif($terminal == "1" && $tank == "Tank 3.A"){
                      $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    }elseif($terminal == "1" && $tank == "Tank 3.B"){
                      $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    }elseif($terminal == "1" && $tank == "Tank 4.A"){
                      $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    }elseif($terminal == "1" && $tank == "Tank 4.B"){
                      $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    }elseif($terminal == "1" && $tank == "Tank 5.A"){
                      $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    }elseif($terminal == "1" && $tank == "Tank 5.B"){
                      $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    }elseif($terminal == "1" && $tank == "Tank 6.A"){
                      $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    }elseif($terminal == "1" && $tank == "Tank 6.B"){
                      $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                    }

                      $data_limit_mutasi = array(
                                    'po_number'   => $po_number,
                          'kode_barang'   => $keterangan,
                          'nama_barang'   => $hasil_awal->nama_brg,
                          'satuan'    => $sat,
                          'saldo_awal'  => $cektabel->hasil,
                          'pemasukan'   => 0,
                          'pengeluaran'   => $qty,
                          'saldo_akhir'   => 0,
                          'username'      => $username,
                          'activation_date'    => $created_at,
                          'status'      => 1,
                          'asal_terminal_terapung' => $hasil_terminal->terminal,
                          'asal_terminal_tank'   => $tank

                      );
                      $this->model_global->input_data($data_limit_mutasi,'mutasi_fg_estimasi');

                      $id_mutasi_fg = $this->db->insert_id();

                      $data_limit_pk = array(
                            'po_number'     => $po_number,
                            'no_transaksi'    => $no_transaksi,
                            'jenis_doc'       => $jenis_doc,
                            'jenis_keluar'    => $jenis_keluar,
                            'no_dokumen_pabean'   => $no_dokumen_pabean,
                            'no_bukti_pengeluaran'  => $no_bukti_penerimaan,
                            'tgl_dokumen_pabean'  => $tgl_dokumen_pabean,
                            'negara_tujuan'     => $negara_asal,
                            'created_at'        => $created_at,
                            'id_group'          => $id_group,
                            'id_client'         => $pengirim_barang,
                            'nama_brg'          => $hasil_awal->nama_brg,
                            'id_barang'         => $keterangan,
                            'jumlah'            => $qty,
                            'id_satuan'         => $sat,
                            'nilai_barang'      => $total,
                            'id_mata_uang'      => $cur,
                            'no_transaksi'      => $no_transaksi,
                            'pembeli_penerima'  => $pengirim_barang_nama,
                            'terminal_terapung' => $hasil_terminal->terminal,
                            'terminal_tank'     => $tank,
                            'harga'             => $harga,
                            'file'              => $fileFoto,
                            'pengeluaran_kargo_tgl'        => $pengeluaran_kargo_tgl,
                            'pengeluaran_kargo_time'       => $pengeluaran_kargo_time,
                            'biaya_kurs'        => $replacekurskoma,
                            'total_calculate'   => $replacecalculatebiayakurskoma,
                            'status'            => 1

                      );
                      $this->model_global->input_data($data_limit_pk,'barang_keluar_estimasi');

                      if($terminal == "1" && $tank == "Tank 1.A"){
                        $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 1.B"){
                        $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 2.A"){
                        $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 2.B"){
                        $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 3.A"){
                        $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 3.B"){
                        $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 4.A"){
                        $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 4.B"){
                        $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 5.A"){
                        $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 5.B"){
                        $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 6.A"){
                        $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 6.B"){
                        $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }

                      $where_akhir = array('id_barang' => $keterangan);
                      $hasil_akhir = $this->model_global->edit_data($where_akhir,'barang')->row();

                      $data_mutasi = array(
                          'saldo_akhir'     => $cektabel->hasil
                        );

                      $where_mutasi = array(
                          'id_mutasi_fg'  => $id_mutasi_fg
                        );


                      $this->model_global->update_data($where_mutasi,$data_mutasi,'mutasi_fg_estimasi');

                      $data_update_notf = array(
                            'status'       => 1
                      );

                      $where_update_notf = array(
                            'id_bm'   => $id_bm
                      );

                      $this->model_global->update_data($where_update_notf, $data_update_notf, 'tr_notif');

                  }    

                }

        //log

        $assign_type= '';
        activity_log("Pengeluaran -> Pemasukan Bahan Baku", "Menambah data Pemasukan Bahan Baku", $id_group, $assign_type);
        $this->session->set_flashdata('succeed','Sukses, Satu data telah berhasil disimpan.');
        redirect('PengeluaranRBB');
      }else{
        $this->load->view('Layouts/error-404');
      }
    }else{
      session_destroy();
      redirect('dashboard');
    }
  }

  public function add_action_realisasi(){
    if($this->session->userdata('name_user') and $this->session->userdata('username')){
      if($this->model_user_access->access_add() == 1){

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
                $po_number      = addslashes($this->input->post('po_number'));
                $no_transaksi     = addslashes($this->input->post('no_transaksi'));
                $tgl_transaksi    = addslashes($this->input->post('tgl_transaksi'));
                $jenis_doc      = addslashes($this->input->post('jenis_doc'));
                $jenis_keluar     = addslashes($this->input->post('jenis_keluar'));
                $pengeluaran_kargo_tgl  = addslashes($this->input->post('pengeluaran_kargo_tgl'));
                $pengeluaran_kargo_time = addslashes($this->input->post('pengeluaran_kargo_time'));
                $pengirim_barang_nama = addslashes($this->input->post('pengirim_barang'));

                $no_dokumen_pabean    = addslashes($this->input->post('no_dokumen_pabean'));
                $no_bukti_penerimaan  = addslashes($this->input->post('no_bukti_penerimaan'));
                $tgl_dokumen_pabean   = addslashes($this->input->post('tgl_dokumen_pabean'));
                $negara_asal    = addslashes($this->input->post('negara_asal'));

                $id_group     = $this->session->userdata('id_group');
                $username     = $this->session->userdata('username');
                $created_at     = addslashes(date("Y-m-d H:i:s"));

                $count_loop = addslashes($this->input->post('count_loop'));

                if($jenis_keluar == 3){

                      for ($i = 1; $i <= $count_loop; $i++) {

                          $keterangan2 = $keterangan2;
                          $qty        = addslashes($this->input->post('qty_real' . $i));
                          $sat        = $sat_real;
                          $harga      = addslashes($this->input->post('harga_satuan_real' . $i));
                          $total      = addslashes($this->input->post('hasil_real' . $i));
                          $cur        = addslashes($this->input->post('kurs_real' . $i));
                          $terminal2  = $terminal;
                          $tank       = addslashes($this->input->post('tank_real' . $i));
                          $biaya_kurs      = addslashes($this->input->post('biaya_kurs_real' . $i));
                          $replacekursdot  = str_replace(".","",$biaya_kurs);
                          $replacekurskoma = str_replace(",",".",$replacekursdot);

                          $calculatebiayakurs      = addslashes($this->input->post('total_calculate' . $i));
                          $replacecalculatedot  = str_replace(".","",$calculatebiayakurs);
                          $replacecalculatebiayakurskoma = str_replace(",",".",$replacecalculatedot);
                          
                          $where_awal = array('id_barang' => $keterangan);
                          $hasil_awal = $this->model_global->edit_data($where_awal,'barang')->row();

                          $where_terminal_asal = array('id_terminal' => $terminal2);
                          $hasil_terminal_asal = $this->model_global->edit_data($where_terminal_asal,'ref_terminal')->row();

                          $where_terminal_tujuan = array('id_terminal' => $terminal2);
                          $hasil_terminal_tujuan = $this->model_global->edit_data($where_terminal_tujuan,'ref_terminal')->row();

                          if($terminal == "1" && $tank == "Tank 1.A"){
                              $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($terminal == "1" && $tank == "Tank 1.B"){
                              $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($terminal == "1" && $tank == "Tank 2.A"){
                              $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($terminal == "1" && $tank == "Tank 2.B"){
                              $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();       
                          }elseif($terminal == "1" && $tank == "Tank 3.A"){
                              $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($terminal == "1" && $tank == "Tank 3.B"){
                              $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($terminal == "1" && $tank == "Tank 4.A"){
                              $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($terminal == "1" && $tank == "Tank 4.B"){
                              $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($terminal == "1" && $tank == "Tank 5.A"){
                              $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($terminal == "1" && $tank == "Tank 5.B"){
                              $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($terminal == "1" && $tank == "Tank 6.A"){
                              $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($terminal == "1" && $tank == "Tank 6.B"){
                              $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }

                          $data_limit_mutasibahan = array(
                                  'po_number'     => $po_number,
                                  'kode_barang'   => $keterangan,
                                  'nama_barang'   => $hasil_awal->nama_brg,
                                  'satuan'        => $hasil_awal->uom,
                                  'saldo_awal'    => $cektabel->hasil,
                                  'pemasukan'     => 0,
                                  'pengeluaran'   => $qty,
                                  'saldo_akhir'   => 0,
                                  'username'          => $username,
                                  'activation_date'   => $created_at,
                                  'status'            => 1,
                                  'terminal_terapung' => $hasil_terminal_asal->terminal,
                                  'terminal_tank'     => $tank

                          );
                          $this->model_global->input_data($data_limit_mutasibahan,'mutasi_bahan_realisasi');
                          $id_mutasi_bahan = $this->db->insert_id();

                          $data_limit_pk = array(
                            'po_number'     => $po_number,
                            'no_transaksi'    => $no_transaksi,
                            'jenis_doc'       => $jenis_doc,
                            'jenis_keluar'    => $jenis_keluar,
                            'no_dokumen_pabean'   => $no_dokumen_pabean,
                            'no_bukti_pengeluaran'  => $no_bukti_penerimaan,
                            'tgl_dokumen_pabean'  => $tgl_dokumen_pabean,
                            'negara_tujuan'     => $negara_asal,
                            'created_at'        => $created_at,
                            'id_group'          => $id_group,
                            'id_client'         => $pengirim_barang,
                            'nama_brg'          => $hasil_awal->nama_brg,
                            'id_barang'         => $keterangan,
                            'jumlah'            => $qty,
                            'id_satuan'         => $sat,
                            'nilai_barang'      => $total,
                            'id_mata_uang'      => $cur,
                            'no_transaksi'      => $no_transaksi,
                            'pembeli_penerima'  => $pengirim_barang_nama,
                            'terminal_terapung' => $hasil_terminal_asal->terminal,
                            'terminal_tank'     => $tank,
                            'harga'             => $harga,
                            'file'              => $file_real,
                            'pengeluaran_kargo_tgl'        => $pengeluaran_kargo_tgl,
                            'pengeluaran_kargo_time'       => $pengeluaran_kargo_time,
                            'biaya_kurs'        => $replacekurskoma,
                            'total_calculate'   => $replacecalculatebiayakurskoma,
                            'status'            => 3

                          );
                          $this->model_global->input_data($data_limit_pk,'barang_keluar_realisasi');
                          

                          if($terminal == "1" && $tank == "Tank 1.A"){
                              $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($terminal == "1" && $tank == "Tank 1.B"){
                              $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($terminal == "1" && $tank == "Tank 2.A"){
                              $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($terminal == "1" && $tank == "Tank 2.B"){
                              $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();       
                          }elseif($terminal == "1" && $tank == "Tank 3.A"){
                              $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($terminal == "1" && $tank == "Tank 3.B"){
                              $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($terminal == "1" && $tank == "Tank 4.A"){
                              $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($terminal == "1" && $tank == "Tank 4.B"){
                              $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($terminal == "1" && $tank == "Tank 5.A"){
                              $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($terminal == "1" && $tank == "Tank 5.B"){
                              $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($terminal == "1" && $tank == "Tank 6.A"){
                              $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }elseif($terminal == "1" && $tank == "Tank 6.B"){
                              $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal_asal->terminal' ")->row();
                          }


                          $data_mutasi = array(
                                      'saldo_akhir'    => $cektabel->hasil
                                  );

                          $where_mutasi = array(
                                      'id_mutasi_bahan'   => $id_mutasi_bahan
                                  );
                          $this->model_global->update_data($where_mutasi,$data_mutasi,'mutasi_bahan_realisasi');            
                          $data_update_notf = array(
                            'status'       => 2
                          );

                          $where_update_notf = array(
                              'no_transaksi'   => $no_transaksi
                          );

                          $this->model_global->update_data($where_update_notf, $data_update_notf, 'barang_keluar_estimasi');  
                              
                        }

                }else{

                    for ($i = 1; $i <= $count_loop; $i++) {
                    
                      $keterangan2 = $keterangan2;
                      $qty        = addslashes($this->input->post('qty_real' . $i));
                      $sat        = $sat_real;
                      $harga      = addslashes($this->input->post('harga_satuan_real' . $i));
                      $total      = addslashes($this->input->post('hasil_real' . $i));
                      $cur        = addslashes($this->input->post('kurs_real' . $i));
                      $terminal2  = $terminal;
                      $tank       = addslashes($this->input->post('tank_real' . $i));
                      $biaya_kurs      = addslashes($this->input->post('biaya_kurs_real' . $i));
                      $replacekursdot  = str_replace(".","",$biaya_kurs);
                      $replacekurskoma = str_replace(",",".",$replacekursdot);

                      $calculatebiayakurs      = addslashes($this->input->post('total_calculate' . $i));
                      $replacecalculatedot  = str_replace(".","",$calculatebiayakurs);
                      $replacecalculatebiayakurskoma = str_replace(",",".",$replacecalculatedot);
          

                      $where_awal = array('id_barang' => $keterangan);
                      $hasil_awal = $this->model_global->edit_data($where_awal,'barang')->row();

                      $where_terminal = array('id_terminal' => $terminal);
                      $hasil_terminal = $this->model_global->edit_data($where_terminal,'ref_terminal')->row();

                      if($terminal == "1" && $tank == "Tank 1.A"){
                            $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 1.B"){
                        $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 2.A"){
                        $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 2.B"){
                        $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 3.A"){
                        $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 3.B"){
                        $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 4.A"){
                        $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 4.B"){
                        $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 5.A"){
                        $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 5.B"){
                        $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 6.A"){
                        $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 6.B"){
                        $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }

                      $data_limit_mutasi = array(
                        'po_number'   => $po_number,
                        'kode_barang'   => $keterangan,
                        'nama_barang'   => $hasil_awal->nama_brg,
                        'satuan'    => $sat,
                        'saldo_awal'  => $cektabel->hasil,
                        'pemasukan'   => 0,
                        'pengeluaran'   => $qty,
                        'saldo_akhir'   => 0,
                        'username'      => $username,
                        'activation_date'    => $created_at,
                        'status'      => 1,
                        'asal_terminal_terapung' => $hasil_terminal->terminal,
                        'asal_terminal_tank'   => $tank

                      );
                        $this->model_global->input_data($data_limit_mutasi,'mutasi_fg_realisasi');

                        $id_mutasi_fg = $this->db->insert_id();

                      $data_limit_pk = array(
                        'po_number'     => $po_number,
                        'no_transaksi'    => $no_transaksi,
                        'jenis_doc'       => $jenis_doc,
                        'jenis_keluar'    => $jenis_keluar,
                        'no_dokumen_pabean'   => $no_dokumen_pabean,
                        'no_bukti_pengeluaran'  => $no_bukti_penerimaan,
                        'tgl_dokumen_pabean'  => $tgl_dokumen_pabean,
                        'negara_tujuan'     => $negara_asal,
                        'created_at'        => $created_at,
                        'id_group'          => $id_group,
                        'id_client'         => $pengirim_barang,
                        'nama_brg'          => $hasil_awal->nama_brg,
                        'id_barang'         => $keterangan,
                        'jumlah'            => $qty,
                        'id_satuan'         => $sat,
                        'nilai_barang'      => $total,
                        'id_mata_uang'      => $cur,
                        'no_transaksi'      => $no_transaksi,
                        'pembeli_penerima'  => $pengirim_barang_nama,
                        'terminal_terapung' => $hasil_terminal->terminal,
                        'terminal_tank'     => $tank,
                        'harga'             => $harga,
                        'file'              => $file_real,
                        'pengeluaran_kargo_tgl'        => $pengeluaran_kargo_tgl,
                        'pengeluaran_kargo_time'       => $pengeluaran_kargo_time,
                        'biaya_kurs'        => $replacekurskoma,
                        'total_calculate'   => $replacecalculatebiayakurskoma,
                        'status'            => 3
                      );
                      $this->model_global->input_data($data_limit_pk,'barang_keluar_realisasi');

                      if($terminal == "1" && $tank == "Tank 1.A"){
                        $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 1.B"){
                        $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 2.A"){
                        $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 2.B"){
                        $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 3.A"){
                        $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 3.B"){
                        $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 4.A"){
                        $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 4.B"){
                        $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 5.A"){
                        $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 5.B"){
                        $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 6.A"){
                        $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
                      }elseif($terminal == "1" && $tank == "Tank 6.B"){
                        $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();

                      }

                      $where_akhir = array('id_barang' => $keterangan);
                      $hasil_akhir = $this->model_global->edit_data($where_akhir,'barang')->row();

                      $data_mutasi = array(
                          'saldo_akhir'     => $cektabel->hasil
                        );

                      $where_mutasi = array(
                          'id_mutasi_fg'  => $id_mutasi_fg
                        );


                      $this->model_global->update_data($where_mutasi,$data_mutasi,'mutasi_fg_realisasi');

                      $data_update_notf = array(
                            'status'       => 2
                        );

                        $where_update_notf = array(
                            'no_transaksi'   => $no_transaksi
                        );

                      $this->model_global->update_data($where_update_notf, $data_update_notf, 'barang_keluar_estimasi');
                    }

                }  

                    



        //log

        $assign_type= '';
        activity_log("Pengeluaran -> Pemasukan Bahan Baku", "Menambah data Pemasukan Bahan Baku", $id_group, $assign_type);
        $this->session->set_flashdata('succeed','Sukses, Satu data telah berhasil disimpan.');
        redirect('PengeluaranRBB');
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
        $where = array('id_bk' => $id);
        $this->model_global->hapus_data($where,'barang_keluar');

        $this->session->set_flashdata('succeed', 'Satu Data  telah di hapus.');
        //log
        $id_group     = $this->session->userdata('id_group');
        $assign_type= '';
        activity_log("Master Data -> Pemasukan Bahan Baku", "Menghapus data Pemasukan Bahan Baku", $id, $id_group, $assign_type);
        $this->session->set_flashdata('succeed','Sukses, Satu data telah berhasil dihapus.');
        redirect('PengeluaranRBB');
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
      if($this->model_user_access->access_add() == 1){
        $this->load->library('auto_number');
        $id_group   = $this->session->userdata('id_group');
        $row = $this->model_global->id_terakhir_bk();

        if(empty($row->id_bk)){
                    $config['id'] = 0;
                }else{
                   $config['id'] = $row->id_bk;
                }

            
            $config['awalan'] = 'BK';
            $config['digit'] = 4;
        $this->auto_number->config($config);

        $where    = array('jenis' => 'Supplier');
        $whereTer = array('id_group' => $id_group);
        $where2    = array('id_bk'  => $id);

        $kategori_barang    = $this->model_global->getAll('ref_kategori')->result();
        $satuan             = $this->model_global->getAll('ref_satuan')->result();
      //  $dokumen            = $this->model_global->getAll('ref_dokumen')->result();
        $dokumen            = $this->db->query("SELECT * FROM ref_dokumen where status ='Out'")->result();
        
        $purchase           = $this->model_global->getAll('purchase')->result();
        $jenis              = $this->model_global->getAll('ref_jenis')->result();
        $barang             = $this->model_global->getAll('barang')->result();
        $kurs               = $this->model_global->getAll('ref_kurs')->result();
        $client             = $this->model_global->edit_data($where,'ref_client')->result();
        $terminal           = $this->model_global->edit_data($whereTer,'ref_terminal')->result();
        $terminal2          = $this->model_global->getAll('ref_terminal')->row();
        $wheretank          = array('id_terminal' => $terminal2->id_terminal);
        $tank2              = $this->model_global->edit_data($wheretank, 'ref_terminal_tank')->result();
        $data               = $this->model_global->edit_data($where2, 'barang_keluar')->row();
        $data_real          = $this->db->query("SELECT * FROM barang_keluar WHERE id_group = '$id_group' AND no_transaksi = '$data->no_transaksi' ")->result();
        
        $data = array(
              'contents'          => 'Dashboard/PengeluaranRBB/edit',
              'kategori_barang'   => $kategori_barang,
              'satuan'            => $satuan,
              'dokumen'           => $dokumen,
              'barang'            => $barang,
              'jenis'             => $jenis,
              'kurs'              => $kurs,
              'client'            => $client,
              'purchase'          => $purchase,
              'terminal'          => $terminal,
              'terminal2'         => $terminal2,
              'tank2'             => $tank2,
              'data'              => $data,
              'data_real'         => $data_real,
              'kodetrx'           => $this->auto_number->generate_id_bk()
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


  public function update($id){
    if($this->session->userdata('name_user') and $this->session->userdata('username')){
      if($this->model_user_access->access_add() == 1){
        $po_number          = addslashes($this->input->post('po_number'));
        $no_transaksi       = addslashes($this->input->post('no_transaksi'));
        $tgl_transaksi      = addslashes($this->input->post('tgl_transaksi'));
        $jenis_doc          = addslashes($this->input->post('jenis_doc'));
        $jenis_keluar       = addslashes($this->input->post('jenis_keluar'));
        $pengirim_barang   = addslashes($this->input->post('pengirim_barang'));
        // $pengirim_barang1   = addslashes($this->input->post('pengirim_barang'));
        $terminal           = addslashes($this->input->post('id_terminal'));


        // $hasil = explode("-",$pengirim_barang1);

        // $pengirim_barang =  $hasil[0];
        // $pengirim_barang_nama = $hasil[1];

        $no_dokumen_pabean    = addslashes($this->input->post('no_dokumen_pabean'));
        $no_bukti_penerimaan  = addslashes($this->input->post('no_bukti_penerimaan'));
        $tgl_dokumen_pabean   = addslashes($this->input->post('tgl_dokumen_pabean'));
        $negara_asal    = addslashes($this->input->post('negara_asal'));

        $id_group     = $this->session->userdata('id_group');
        $username     = $this->session->userdata('username');
        $created_at     = addslashes(date("Y-m-d H:i:s"));

        $data = array(
              'po_number'     => $po_number,
              'no_transaksi'    => $no_transaksi,
              'jenis_doc'       => $jenis_doc,
              'jenis_pemasukan'   => $jenis_pemasukan,
              'no_dokumen_pabean'   => $no_dokumen_pabean,
              'no_bukti_penerimaan'   => $no_bukti_penerimaan,
              'tgl_dokumen_pabean'  => $tgl_dokumen_pabean,
              'negara_asal'     => $negara_asal,
              'created_at'    => $created_at,
              'id_group'      => $id_group
              );

        $limit_pk = addslashes($this->input->post('limit_pk'));

        for ($i=0; $i < $limit_pk; $i++) {
          $keterangan = addslashes($this->input->post('keterangan'.$i));
          $qty = addslashes($this->input->post('qty'.$i));
          $sat = addslashes($this->input->post('sat'.$i));
          $harga = addslashes($this->input->post('harga'.$i));
          $total = addslashes($this->input->post('total'.$i));
          $terminal_name = addslashes($this->input->post('terminal'.$i));
          $tank     = addslashes($this->input->post('tank'.$i));
          $cur = addslashes($this->input->post('cur'.$i));

          $where_awal = array('id_barang' => $keterangan);
          $hasil_awal = $this->model_global->edit_data($where_awal,'barang')->row();

          $where_terminal = array('id_terminal' => $terminal);
          $hasil_terminal = $this->model_global->edit_data($where_terminal,'ref_terminal')->row();

          if($terminal == "1" && $tank == "Tank 1.A"){
            $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "1" && $tank == "Tank 1.B"){
            $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "1" && $tank == "Tank 2.A"){
            $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "1" && $tank == "Tank 2.B"){
            $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "1" && $tank == "Tank 3.A"){
            $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "1" && $tank == "Tank 3.B"){
            $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "1" && $tank == "Tank 4.A"){
            $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "1" && $tank == "Tank 4.B"){
            $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "1" && $tank == "Tank 5.A"){
            $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "1" && $tank == "Tank 5.B"){
            $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "1" && $tank == "Tank 6.A"){
            $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "1" && $tank == "Tank 6.B"){
            $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();

          }elseif($terminal == "2" && $tank == "Tank 1.A"){
            $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "2" && $tank == "Tank 1.B"){
            $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "2" && $tank == "Tank 2.A"){
            $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "2" && $tank == "Tank 2.B"){
            $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "2" && $tank == "Tank 3.A"){
            $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "2" && $tank == "Tank 3.B"){
            $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "2" && $tank == "Tank 4.A"){
            $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "2" && $tank == "Tank 4.B"){
            $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "2" && $tank == "Tank 5.A"){
            $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "2" && $tank == "Tank 5.B"){
            $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "2" && $tank == "Tank 6.A"){
            $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "2" && $tank == "Tank 6.B"){
            $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();


          }elseif($terminal == "3" && $tank == "Tank 1.A"){
            $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "3" && $tank == "Tank 1.B"){
            $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "3" && $tank == "Tank 2.A"){
            $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "3" && $tank == "Tank 2.B"){
            $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "3" && $tank == "Tank 3.A"){
            $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "3" && $tank == "Tank 3.B"){
            $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "3" && $tank == "Tank 4.A"){
            $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "3" && $tank == "Tank 4.B"){
            $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "3" && $tank == "Tank 5.A"){
            $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "3" && $tank == "Tank 5.B"){
            $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "3" && $tank == "Tank 6.A"){
            $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
          }elseif($terminal == "3" && $tank == "Tank 6.B"){
            $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();

          }

          $data = array(
              'po_number'   => $po_number,
              'kode_barang'   => $keterangan,
              'nama_barang'   => $hasil_awal->nama_brg,
              'satuan'    => $sat,
              'saldo_awal'  => $cektabel->hasil,
              'pemasukan'   => 0,
              'pengeluaran'   => $qty,
              'saldo_akhir'   => 0,
              'username'      => $username,
              'activation_date'    => $created_at,
              'status'      => 1,
              'asal_terminal_terapung' => $hasil_terminal->terminal,
              'asal_terminal_tank'   => $tank

          );

          $where = array(
            'id_mutasi_fg' => $id
          );

          $this->model_global->update_data($where,$data,'mutasi_fg');

          $id_mutasi_fg = $this->db->insert_id();

            $data = array(
                'po_number'     => $po_number,
                'no_transaksi'    => $no_transaksi,
                'jenis_doc'       => $jenis_doc,
                'jenis_keluar'    => $jenis_keluar,
                'no_dokumen_pabean'   => $no_dokumen_pabean,
                'no_bukti_pengeluaran'  => $no_bukti_penerimaan,
                'tgl_dokumen_pabean'  => $tgl_dokumen_pabean,
                'negara_tujuan'     => $negara_asal,
                'created_at'    => $created_at,
                'id_group'      => $id_group,
                // 'id_client'     => $pengirim_barang,
                'nama_brg'      => $hasil_awal->nama_brg,
                'id_barang'     => $keterangan,
                'jumlah'      => $qty,
                'nilai_barang'      => $harga,
                'id_satuan'     => $sat,
                'nilai_barang'    => $total,
                'id_mata_uang'    => $cur,
                'no_transaksi'    => $no_transaksi,
                'pembeli_penerima'  => $pengirim_barang,
                'terminal_terapung' => $hasil_terminal->terminal,
                'terminal_tank'   => $tank

            );

            $where= array(
              'id_bk'  => $id
            );

              $this->model_global->update_data($where,$data,'barang_keluar');

            if($terminal == "1" && $tank == "Tank 1.A"){
              $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "1" && $tank == "Tank 1.B"){
              $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "1" && $tank == "Tank 2.A"){
              $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "1" && $tank == "Tank 2.B"){
              $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "1" && $tank == "Tank 3.A"){
              $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "1" && $tank == "Tank 3.B"){
              $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "1" && $tank == "Tank 4.A"){
              $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "1" && $tank == "Tank 4.B"){
              $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "1" && $tank == "Tank 5.A"){
              $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "1" && $tank == "Tank 5.B"){
              $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "1" && $tank == "Tank 6.A"){
              $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "1" && $tank == "Tank 6.B"){
              $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();

            }elseif($terminal == "2" && $tank == "Tank 1.A"){
              $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "2" && $tank == "Tank 1.B"){
              $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "2" && $tank == "Tank 2.A"){
              $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "2" && $tank == "Tank 2.B"){
              $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "2" && $tank == "Tank 3.A"){
              $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "2" && $tank == "Tank 3.B"){
              $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "2" && $tank == "Tank 4.A"){
              $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "2" && $tank == "Tank 4.B"){
              $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "2" && $tank == "Tank 5.A"){
              $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "2" && $tank == "Tank 5.B"){
              $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "2" && $tank == "Tank 6.A"){
              $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "2" && $tank == "Tank 6.B"){
              $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();


            }elseif($terminal == "3" && $tank == "Tank 1.A"){
              $cektabel = $this->db->query("SELECT stok_tank1  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "3" && $tank == "Tank 1.B"){
              $cektabel = $this->db->query("SELECT stok_tank2  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "3" && $tank == "Tank 2.A"){
              $cektabel = $this->db->query("SELECT stok_tank3  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "3" && $tank == "Tank 2.B"){
              $cektabel = $this->db->query("SELECT stok_tank4  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "3" && $tank == "Tank 3.A"){
              $cektabel = $this->db->query("SELECT stok_tank5  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "3" && $tank == "Tank 3.B"){
              $cektabel = $this->db->query("SELECT stok_tank6  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "3" && $tank == "Tank 4.A"){
              $cektabel = $this->db->query("SELECT stok_tank7  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "3" && $tank == "Tank 4.B"){
              $cektabel = $this->db->query("SELECT stok_tank8  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "3" && $tank == "Tank 5.A"){
              $cektabel = $this->db->query("SELECT stok_tank9  as hasil FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "3" && $tank == "Tank 5.B"){
              $cektabel = $this->db->query("SELECT stok_tank10 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "3" && $tank == "Tank 6.A"){
              $cektabel = $this->db->query("SELECT stok_tank11 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();
            }elseif($terminal == "3" && $tank == "Tank 6.B"){
              $cektabel = $this->db->query("SELECT stok_tank12 as hasil  FROM barang_fg where id_barang = '$keterangan' and terminal_terapung = '$hasil_terminal->terminal' ")->row();

            }

              $where_akhir = array('id_barang' => $keterangan);
              $hasil_akhir = $this->model_global->edit_data($where_akhir,'barang')->row();

              $data_mutasi = array(
                    'saldo_akhir'     => $cektabel->hasil
                  );

              $where_mutasi = array(
                    'id_mutasi_fg'  => $id_mutasi_fg
            );


          $this->model_global->update_data($where_mutasi,$data_mutasi,'mutasi_fg');

          }

        //log

        $assign_type= '';
        activity_log("Pengeluaran -> Pemasukan Bahan Baku", "Menambah data Pemasukan Bahan Baku", $id_group, $assign_type);
        $this->session->set_flashdata('succeed','Sukses, Satu data telah berhasil diupdate.');
        redirect('PengeluaranRBB');
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
  