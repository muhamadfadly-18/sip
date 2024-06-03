<style>
  div.container {
    overflow: auto;
    width: 100%;
  }
  .tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

</style>
<div class="page-content padding-30 container-fluid">

  <div class="page-header">
    <h1 class="page-title" style="text-transform: capitalize;">Data Pengeluaran Barang</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>">Beranda</a></li>
      <li class="active">Pengeluaran Barang</li>
    </ol>
    <div class="page-header-actions">
      <a href="<?php echo base_url('PengeluaranRBB/add/'); ?>" class="btn btn-sm btn-default btn-block btn-primary btn-round">
        <i aria-hidden="true" class="icon wb-plus"></i>
        <span class="hidden-xs">Tambah Data</span>
      </a>
    </div>
  </div>

  <?php
  if (!empty($this->session->flashdata('succeed'))) {
    $succeed = '<div class="alert dark alert-alt alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true"><i class="icon wb-close-mini" aria-hidden="true"></i></span>
            </button>
            ' . $this->session->flashdata('succeed') . '
            </div>';
    echo $succeed;
  }
  ?>

  <?php
  if (!empty($this->session->flashdata('failed'))) {
    $failed = '<div class="alert dark alert-alt alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="icon wb-close-mini" aria-hidden="true"></i></span>
          </button>
          ' . $this->session->flashdata('failed') . '
          </div>';

    echo $failed;
  }
  ?>


  <div class="panel panel-bordered panel-primary">
      <div class="tab">
          <button class="tablinks active" onclick="openCity(event, 'Estimasi')">Estimasi</button>
          <button class="tablinks" onclick="openCity(event, 'Realisasi')">Realisasi</button>
        </div>

        <div id="Estimasi" class="tabcontent">
            <form class="form-horizontal" id="IdForm" method="post">
              <div class="panel-heading">
                <div class="row">
                  <h3 class="panel-title"></h3>
                </div>
              </div>

              <div class="panel-body">

                <?php
                $current_date = date("m/d/Y");
                ?>

                <div class="form-group">
                  <label class="col-sm-1 control-label">Tanggal: </label>
                  <div class="col-sm-6">
                    <div class="input-daterange" data-plugin="datepicker">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="icon wb-calendar" aria-hidden="true"></i>
                        </span>
                        <input type="text" class="form-control" name="tgl_awal" placeholder="Tanggal Awal">
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-arrows-h" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="tgl_akhir" placeholder="Tanggal Akhir">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-11 col-sm-offset-1">
                    <button type="button" class="btn btn-labeled btn-warning" onclick="subFilter();">
                      <span class="btn-label"><i class="icon fa-filter" aria-hidden="true"></i></span>Filter
                    </button>
                  </div>
                </div>

                <div class="container">
                  <table id="example" class="table table-bordered table-hover nowrap" style="width:100%">
            <thead>
              <tr>
              <tr>
                <th rowspan="2" style="vertical-align:middle;">No.</th>
                <th rowspan="2" style="vertical-align:middle;">PO. Number</th>
                <th colspan="3" style="text-align: center;">Pabean</th>
                <th colspan="2" style="text-align: center;">Bukti Pengeluaran</th>
                <th colspan="6" style="text-align: center;">Barang</th>
                <th rowspan="2" style="vertical-align:middle;">Gudang</th>
                <th rowspan="2" style="vertical-align:middle;">Negara Tujuan</th>
                <th rowspan="2" style="vertical-align:middle;">Opsi</th>

              </tr>
              <tr>
                <th style="vertical-align:top" ;>Jenis</th>
                <th style="vertical-align:top" ;>Nomor</th>
                <th style="vertical-align:top" ;>Tanggal</th>


                <th style="vertical-align:top" ;>Nomor</th>
                <th style="vertical-align:top" ;>Pemasok</th>

                <th style="vertical-align:top" ;>Kode </th>
                <th style="vertical-align:top" ;>Nama </th>
                <th style="vertical-align:top" ;>Jumlah</th>
                <th style="vertical-align:top" ;>Satuan</th>

                <th style="vertical-align:top" ;>Mata Uang</th>
                <th style="vertical-align:top" ;>Nilai Barang</th>


              </tr>

              </tr>
            </thead>

            <tbody>
              <?php
              $no = 1;
              foreach ($data_estimasi as $value) :
                $data_uang = $this->db->query("select mata_uang from ref_kurs where id_kurs = '$value->id_mata_uang' ")->row();
                $data_client = $this->db->query("select company_name from ref_client where id_client = '$value->id_client' ")->row();
                $data_dokumen = $this->db->query("select dokumen from ref_dokumen where id_dokumen = '$value->jenis_doc' ")->row();
                $data_SUM_qty = $this->db->query("select SUM(jumlah) as total from barang_keluar_estimasi where no_transaksi = '$value->no_transaksi' ")->row();
                $data_SUM_nilai = $this->db->query("select SUM(nilai_barang) as total from barang_keluar_estimasi where no_transaksi = '$value->no_transaksi' ")->row();
                $no_po = $this->db->query("SELECT id_purchase,po_number FROM purchase WHERE id_purchase = '$value->po_number' ")->row();
                if (!empty($no_po)) {
                  $number = $no_po->po_number;
                } else {
                  $number = '-';
                }

                if($value->terminal_tank == "Tank 1.A"){
                    $nama_tank = "Orlando I 1.p";
                }elseif($value->terminal_tank == "Tank 1.B"){
                    $nama_tank = "Orlando I 1.s";
                }elseif($value->terminal_tank == "Tank 2.A"){
                    $nama_tank = "Orlando I 2.p";
                }elseif($value->terminal_tank == "Tank 2.B"){
                    $nama_tank = "Orlando I 2.s";
                }elseif($value->terminal_tank == "Tank 3.A"){
                    $nama_tank = "Orlando I 3.p";
                }elseif($value->terminal_tank == "Tank 3.B"){
                    $nama_tank = "Orlando I 3.s";
                }elseif($value->terminal_tank == "Tank 4.A"){
                    $nama_tank = "Orlando I 4.p";
                }elseif($value->terminal_tank == "Tank 4.B"){
                    $nama_tank = "Orlando I 4.s";
                }elseif($value->terminal_tank == "Tank 5.A"){
                    $nama_tank = "Tangki BBM 1";
                }elseif($value->terminal_tank == "Tank 5.B"){
                    $nama_tank = "Tangki BBM 2";
                }

              ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $value->po_number; ?></td>
                  <td><?= $data_dokumen->dokumen; ?></td>
                  <td><?= $value->no_dokumen_pabean; ?></td>
                  <td><?= date('d-m-Y', strtotime($value->tgl_dokumen_pabean)); ?></td>

                  <td><?= $value->no_bukti_pengeluaran; ?></td>
                  <td><?= $value->pembeli_penerima ?></td>
                  <td><?= $value->id_barang; ?></td>
                  <td><?= $value->nama_brg; ?></td>
                  <td><?= number_format($data_SUM_qty->total, 2, ',', '.'); ?></td>
                  <td><?= $value->id_satuan; ?></td>

                  <td><?= $data_uang->mata_uang; ?></td>
                  <td><?= number_format($data_SUM_nilai->total, 2, ',', '.'); ?></td>
                  <td><?= $nama_tank; ?></td>

                  <td><?= $value->negara_tujuan; ?></td>
                  <?php if($value->status == 1){ ?>
                              <td>
                                <div class="btn-group" role="group">
                                  <button type="button" class="btn btn-warning dropdown-toggle" id="exampleIconDropdown1" data-toggle="dropdown" aria-expanded="false">
                                    <i class="icon wb-settings" aria-hidden="true"></i>
                                    <span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu" style="min-width:10px;" aria-labelledby="exampleIconDropdown1" role="menu">
                                    <li role="presentation">
                                      <a style="text-decoration:none; text-align:left;" class="btn btn-block btn-default" href="<?php echo base_url('PengeluaranRBB/add_realisasi/' . $value->id_bk); ?>">
                                        <i class="icon wb-edit" aria-hidden="true"></i>
                                        Realisasi
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </td>
                  <?php }elseif($value->status == 2){ ?>  
                              <td>Data Telah Di Buat Realisasi</td>
                          <?php }elseif($value->status == 3){ ?>
                              <td>Menunggu Approval</td>
                          <?php }elseif($value->status == 4){ ?>
                              <td>Data Telah Di Approve</td>
                          <?php }else{?>
                              <td>Data Telah Di Reject</td>
                          <?php } ?>
                </tr>
              <?php
              endforeach;
              ?>
            </tbody>
          </table>
                </div>
              </div>
            </form>
        </div>

        <div id="Realisasi" class="tabcontent">
            <form class="form-horizontal" id="IdForm2" method="post">
              <div class="panel-heading">
                <div class="row">
                  <h3 class="panel-title"></h3>
                </div>
              </div>

                

              <div class="panel-body">

                <?php
                $current_date = date("m/d/Y");
                ?>

                <div class="form-group">
                  <label class="col-sm-1 control-label">Tanggal: </label>
                  <div class="col-sm-6">
                    <div class="input-daterange" data-plugin="datepicker">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="icon wb-calendar" aria-hidden="true"></i>
                        </span>
                        <input type="text" class="form-control" name="tgl_awal" placeholder="Tanggal Awal">
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-arrows-h" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="tgl_akhir" placeholder="Tanggal Akhir">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-11 col-sm-offset-1">
                    <button type="button" class="btn btn-labeled btn-warning" onclick="subFilter2();">
                      <span class="btn-label"><i class="icon fa-filter" aria-hidden="true"></i></span>Filter
                    </button>
                  </div>
                </div>

                <div class="container">
                  <table id="example2" class="table table-bordered table-hover nowrap" style="width:100%">
            <thead>
              <tr>
              <tr>
                <th rowspan="2" style="vertical-align:middle;">No.</th>
                <th rowspan="2" style="vertical-align:middle;">PO. Number</th>
                <th colspan="3" style="text-align: center;">Pabean</th>
                <th colspan="2" style="text-align: center;">Bukti Pengeluaran</th>
                <th colspan="6" style="text-align: center;">Barang</th>
                <th rowspan="2" style="vertical-align:middle;">Gudang</th>
                <th rowspan="2" style="vertical-align:middle;">Negara Tujuan</th>
                <th rowspan="2" style="vertical-align:middle;">Opsi</th>

              </tr>
              <tr>
                <th style="vertical-align:top" ;>Jenis</th>
                <th style="vertical-align:top" ;>Nomor</th>
                <th style="vertical-align:top" ;>Tanggal</th>


                <th style="vertical-align:top" ;>Nomor</th>
                <th style="vertical-align:top" ;>Pemasok</th>

                <th style="vertical-align:top" ;>Kode </th>
                <th style="vertical-align:top" ;>Nama </th>
                <th style="vertical-align:top" ;>Jumlah</th>
                <th style="vertical-align:top" ;>Satuan</th>

                <th style="vertical-align:top" ;>Mata Uang</th>
                <th style="vertical-align:top" ;>Nilai Barang</th>


              </tr>

              </tr>
            </thead>

            <tbody>
              <?php
              $no = 1;
              foreach ($data_realisasi as $value) :
                $data_uang = $this->db->query("select mata_uang from ref_kurs where id_kurs = '$value->id_mata_uang' ")->row();
                $data_client = $this->db->query("select company_name from ref_client where id_client = '$value->id_client' ")->row();
                $data_dokumen = $this->db->query("select dokumen from ref_dokumen where id_dokumen = '$value->jenis_doc' ")->row();
                $data_SUM_qty = $this->db->query("select SUM(jumlah) as total from barang_keluar_realisasi where no_transaksi = '$value->no_transaksi' ")->row();
                $data_SUM_nilai = $this->db->query("select SUM(nilai_barang) as total from barang_keluar_realisasi where no_transaksi = '$value->no_transaksi' ")->row();  
                $no_po = $this->db->query("SELECT id_purchase,po_number FROM purchase WHERE id_purchase = '$value->po_number' ")->row();
                if (!empty($no_po)) {
                  $number = $no_po->po_number;
                } else {
                  $number = '-';
                }

                if($value->terminal_tank == "Tank 1.A"){
                    $nama_tank = "Orlando I 1.p";
                }elseif($value->terminal_tank == "Tank 1.B"){
                    $nama_tank = "Orlando I 1.s";
                }elseif($value->terminal_tank == "Tank 2.A"){
                    $nama_tank = "Orlando I 2.p";
                }elseif($value->terminal_tank == "Tank 2.B"){
                    $nama_tank = "Orlando I 2.s";
                }elseif($value->terminal_tank == "Tank 3.A"){
                    $nama_tank = "Orlando I 3.p";
                }elseif($value->terminal_tank == "Tank 3.B"){
                    $nama_tank = "Orlando I 3.s";
                }elseif($value->terminal_tank == "Tank 4.A"){
                    $nama_tank = "Orlando I 4.p";
                }elseif($value->terminal_tank == "Tank 4.B"){
                    $nama_tank = "Orlando I 4.s";
                }elseif($value->terminal_tank == "Tank 5.A"){
                    $nama_tank = "Tangki BBM 1";
                }elseif($value->terminal_tank == "Tank 5.B"){
                    $nama_tank = "Tangki BBM 2";
                }
              ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $value->po_number; ?></td>
                  <td><?= $data_dokumen->dokumen; ?></td>
                  <td><?= $value->no_dokumen_pabean; ?></td>
                  <td><?= date('d-m-Y', strtotime($value->tgl_dokumen_pabean)); ?></td>

                  <td><?= $value->no_bukti_pengeluaran; ?></td>
                  <td><?= $value->pembeli_penerima ?></td>
                  <td><?= $value->id_barang; ?></td>
                  <td><?= $value->nama_brg; ?></td>
                  <td><?= number_format($data_SUM_qty->total, 2, ',', '.'); ?></td>
                  <td><?= $value->id_satuan; ?></td>

                  <td><?= $data_uang->mata_uang; ?></td>
                  <td><?= number_format($data_SUM_nilai->total, 2, ',', '.'); ?></td>
                  <td><?= $nama_tank; ?></td>

                  <td><?= $value->negara_tujuan; ?></td>

                  <?php if($value->status == 3){ ?>
                              <td>Menunggu Approval</td>
                          <?php }elseif($value->status == 4){ ?>
                              <td>Data Telah Di Approve</td>
                          <?php }else{?>
                              <td>Data Telah Di Reject</td>
                          <?php } ?>
                </tr>
              <?php
              endforeach;
              ?>
            </tbody>
          </table>
                </div>
              </div>
            </form>
        </div>
        <div id="defaulfirst">
          <form class="form-horizontal" id="IdForm2" method="post">
              <div class="panel-heading">
                <div class="row">
                  <h3 class="panel-title"></h3>
                </div>
              </div>

                

              <div class="panel-body">

                <?php
                $current_date = date("m/d/Y");
                ?>

                <div class="form-group">
                  <label class="col-sm-1 control-label">Tanggal: </label>
                  <div class="col-sm-6">
                    <div class="input-daterange" data-plugin="datepicker">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="icon wb-calendar" aria-hidden="true"></i>
                        </span>
                        <input type="text" class="form-control" name="tgl_awal" placeholder="Tanggal Awal">
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-arrows-h" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="tgl_akhir" placeholder="Tanggal Akhir">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-11 col-sm-offset-1">
                    <button type="button" class="btn btn-labeled btn-warning" onclick="subFilter2();">
                      <span class="btn-label"><i class="icon fa-filter" aria-hidden="true"></i></span>Filter
                    </button>
                  </div>
                </div>

                <div class="container">
                  <table id="example3" class="table table-bordered table-hover nowrap" style="width:100%">
            <thead>
              <tr>
              <tr>
                <th rowspan="2" style="vertical-align:middle;">No.</th>
                <th rowspan="2" style="vertical-align:middle;">PO. Number</th>
                <th colspan="3" style="text-align: center;">Pabean</th>
                <th colspan="2" style="text-align: center;">Bukti Pengeluaran</th>
                <th colspan="6" style="text-align: center;">Barang</th>
                <th rowspan="2" style="vertical-align:middle;">Gudang</th>
                <th rowspan="2" style="vertical-align:middle;">Negara Tujuan</th>
                <th rowspan="2" style="vertical-align:middle;">Opsi</th>

              </tr>
              <tr>
                <th style="vertical-align:top" ;>Jenis</th>
                <th style="vertical-align:top" ;>Nomor</th>
                <th style="vertical-align:top" ;>Tanggal</th>


                <th style="vertical-align:top" ;>Nomor</th>
                <th style="vertical-align:top" ;>Pemasok</th>

                <th style="vertical-align:top" ;>Kode </th>
                <th style="vertical-align:top" ;>Nama </th>
                <th style="vertical-align:top" ;>Jumlah</th>
                <th style="vertical-align:top" ;>Satuan</th>

                <th style="vertical-align:top" ;>Mata Uang</th>
                <th style="vertical-align:top" ;>Nilai Barang</th>


              </tr>

              </tr>
            </thead>

            <tbody>
              <?php
              $no = 1;
              foreach ($data_estimasi as $value) :
                $data_uang = $this->db->query("select mata_uang from ref_kurs where id_kurs = '$value->id_mata_uang' ")->row();
                $data_client = $this->db->query("select company_name from ref_client where id_client = '$value->id_client' ")->row();
                $data_dokumen = $this->db->query("select dokumen from ref_dokumen where id_dokumen = '$value->jenis_doc' ")->row();
                $data_SUM_qty = $this->db->query("select SUM(jumlah) as total from barang_keluar_estimasi where no_transaksi = '$value->no_transaksi' ")->row();
                $data_SUM_nilai = $this->db->query("select SUM(nilai_barang) as total from barang_keluar_estimasi where no_transaksi = '$value->no_transaksi' ")->row();
                $no_po = $this->db->query("SELECT id_purchase,po_number FROM purchase WHERE id_purchase = '$value->po_number' ")->row();
                if (!empty($no_po)) {
                  $number = $no_po->po_number;
                } else {
                  $number = '-';
                }

                if($value->terminal_tank == "Tank 1.A"){
                    $nama_tank = "Orlando I 1.p";
                }elseif($value->terminal_tank == "Tank 1.B"){
                    $nama_tank = "Orlando I 1.s";
                }elseif($value->terminal_tank == "Tank 2.A"){
                    $nama_tank = "Orlando I 2.p";
                }elseif($value->terminal_tank == "Tank 2.B"){
                    $nama_tank = "Orlando I 2.s";
                }elseif($value->terminal_tank == "Tank 3.A"){
                    $nama_tank = "Orlando I 3.p";
                }elseif($value->terminal_tank == "Tank 3.B"){
                    $nama_tank = "Orlando I 3.s";
                }elseif($value->terminal_tank == "Tank 4.A"){
                    $nama_tank = "Orlando I 4.p";
                }elseif($value->terminal_tank == "Tank 4.B"){
                    $nama_tank = "Orlando I 4.s";
                }elseif($value->terminal_tank == "Tank 5.A"){
                    $nama_tank = "Tangki BBM 1";
                }elseif($value->terminal_tank == "Tank 5.B"){
                    $nama_tank = "Tangki BBM 2";
                }
                
              ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $value->po_number; ?></td>
                  <td><?= $data_dokumen->dokumen; ?></td>
                  <td><?= $value->no_dokumen_pabean; ?></td>
                  <td><?= date('d-m-Y', strtotime($value->tgl_dokumen_pabean)); ?></td>

                  <td><?= $value->no_bukti_pengeluaran; ?></td>
                  <td><?= $value->pembeli_penerima ?></td>
                  <td><?= $value->id_barang; ?></td>
                  <td><?= $value->nama_brg; ?></td>
                  <td><?= number_format($data_SUM_qty->total, 2, ',', '.'); ?></td>
                  <td><?= $value->id_satuan; ?></td>

                  <td><?= $data_uang->mata_uang; ?></td>
                  <td><?= number_format($data_SUM_nilai->total, 2, ',', '.'); ?></td>
                  <td><?= $nama_tank; ?></td>

                  <td><?= $value->negara_tujuan; ?></td>

                  <?php if($value->status == 1){ ?>
                              <td>
                                <div class="btn-group" role="group">
                                  <button type="button" class="btn btn-warning dropdown-toggle" id="exampleIconDropdown1" data-toggle="dropdown" aria-expanded="false">
                                    <i class="icon wb-settings" aria-hidden="true"></i>
                                    <span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu" style="min-width:10px;" aria-labelledby="exampleIconDropdown1" role="menu">
                                    <li role="presentation">
                                      <a style="text-decoration:none; text-align:left;" class="btn btn-block btn-default" href="<?php echo base_url('PengeluaranRBB/add_realisasi/' . $value->id_bk); ?>">
                                        <i class="icon wb-edit" aria-hidden="true"></i>
                                        Realisasi
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </td>
                          <?php }elseif($value->status == 2){ ?>  
                              <td>Data Telah Di Buat Realisasi</td>
                          <?php }elseif($value->status == 3){ ?>
                              <td>Menunggu Approval</td>
                          <?php }elseif($value->status == 4){ ?>
                              <td>Data Telah Di Approve</td>
                          <?php }else{?>
                              <td>Data Telah Di Reject</td>
                          <?php } ?> 
                </tr>
              <?php
              endforeach;
              ?>
            </tbody>
          </table>
                </div>
              </div>
            </form>
        </div>
  </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript">
  function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";

    document.getElementById("defaulfirst").style.display = "none";

  }

  function subFilter() {
    document.getElementById("IdForm").action = "<?php echo base_url(); ?>PengeluaranRBB";
    document.getElementById("IdForm").submit();

    return true;
  }

  $(document).ready(function() {
        $('#example').DataTable( {
            "dom": 'Bfrtip',
        "searching": true,
        "paging": true,
        "info": true,
        buttons: [{
            extend: 'excelHtml5',
            className: 'btn btn-primary btn-sm',
            text: 'Export',
            autoFilter: true,
            attr: {id: 'exportButton'},
            sheetName: 'data',
            title: '',
            filename: function ( ) {
                return $('#exportButton').data('filename');
            }
        }]
        } );
    } );

    $(document).ready(function() {
        $('#example2').DataTable( {
            "dom": 'Bfrtip',
        "searching": true,
        "paging": true,
        "info": true,
        buttons: [{
            extend: 'excelHtml5',
            className: 'btn btn-primary btn-sm',
            text: 'Export',
            autoFilter: true,
            attr: {id: 'exportButton'},
            sheetName: 'data',
            title: '',
            filename: function ( ) {
                return $('#exportButton').data('filename');
            }
        }]
        } );
    } );

    $(document).ready(function() {
        $('#example3').DataTable( {
            "dom": 'Bfrtip',
        "searching": true,
        "paging": true,
        "info": true,
        buttons: [{
            extend: 'excelHtml5',
            className: 'btn btn-primary btn-sm',
            text: 'Export',
            autoFilter: true,
            attr: {id: 'exportButton'},
            sheetName: 'data',
            title: '',
            filename: function ( ) {
                return $('#exportButton').data('filename');
            }
        }]
        } );
    } );
</script> 