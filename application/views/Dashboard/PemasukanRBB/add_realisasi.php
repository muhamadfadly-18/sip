<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Datepicker Example</title>
  <!-- jQuery Library -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- jQuery UI Library -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <!-- jQuery DateTimePicker CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">
  <!-- jQuery DateTimePicker JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>

  <style>
    .box-shadow {
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      transition: box-shadow 0.3s ease;
    }

    .box-shadow:focus {
      box-shadow: 0 4px 8px rgba(0, 0, 255, 0.7);
    }

    .ui-datepicker-buttonpane .ui-datepicker-current {
      float: left;
    }
  </style>
</head>

<div class="page-content padding-30 container-fluid">

  <div class="page-header">
    <h1 class="page-title">Pemasukan / Penerimaan Barang (Realisasi)</h1>
    <ol class="breadcrumb">
      <li><a href="<?php

                    use FontLib\Table\Type\name;

                    echo base_url(); ?>">Beranda</a></li>
      <li><a href="<?php echo base_url('PemasukanRBB'); ?>">Pemasukan / Penerimaan Barang</a></li>
      <li class="active">Tambah Data</li>
    </ol>
    <div class="page-header-actions">
      <a href="<?php echo base_url('PemasukanRBB'); ?>" class="btn btn-sm btn-danger  btn-round">
        <i aria-hidden="true" class="icon wb-chevron-left-mini"></i>
        <span class="hidden-xs">Kembali</span>
      </a>
    </div>
  </div>

  <div class="panel">
    <div class="panel-body container-fluid">
      <div class="row row-lg">
        <div class="clearfix hidden-xs"></div>

        <div class="col-sm-12 col-md-12">
          <!-- Example Horizontal Form -->
          <div class="example-wrap">
            <h4 class="example-title">Tambah Data Pemasukan / Penerimaan Barang</h4>
            <p>
              **Isi kolom di bawah dengan benar.
            </p>
            <div class="example">
              <form class="form-horizontal" action="<?php echo base_url(); ?>PemasukanRBB/add_action_realisasi" method="post" enctype="multipart/form-data">

                <input type="text" autocomplete="off" name="get_jml" id="get_jml" class="form-control" value="<?= $dataGet->jumlah; ?>" style="display: none;">
                <input type="text" name="count_loop" id="count_loop" value="<?= $count_real ?>" class="form-control" style="display: none;">
                <input type="text" autocomplete="off" name="id_barang_real" id="id_barang_real" class="form-control" value="<?= $data_estimasi->id_barang; ?>" style="display: none;">
                <input type="text" autocomplete="off" name="no_transaksi" id="no_transaksi" class="form-control" value="<?= $data_estimasi->no_transaksi; ?>" style="display: none;">
                <input type="text" autocomplete="off" name="tgl_transaksi" id="tgl_transaksi" class="form-control" value="<?= $data_estimasi->tgl_transaksi; ?>" style="display: none;">
                <input type="text" autocomplete="off" name="keterangan2" id="keterangan2" class="form-control" value="<?= $dataGet->id_barang; ?> - <?= $dataGet->nama_brg; ?>" style="display: none;">
                <input type="text" autocomplete="off" name="terminal_real" id="terminal_real" class="form-control" value="<?= $terminal->id_terminal; ?>" style="display: none;">
                <input type="text" autocomplete="off" name="sat_real" id="sat_real" class="form-control" value="<?= $dataGet->id_satuan; ?>" style="display: none;">
                <input type="text" autocomplete="off" name="id_bm" id="id_bm" class="form-control" value="<?= $dataGet->id_bm ?>" style="display: none;">
                <input type="text" autocomplete="off" name="totalhasil2" id="totalhasil2" class="form-control" value="" style="display: none;">
                <input type="text" autocomplete="off" name="totalhasil" id="totalhasil" class="form-control" value="" style="display: none;">
                <input type="text" autocomplete="off" name="fileget" id="fileget" class="form-control" value="<?= $data_estimasi->file; ?>" style="display: none;">


                <div class="form-group">
                  <label class="col-sm-2 control-label" style="font-family: Arial;">No PO : </label>
                  <div class="col-sm-4">
                    <!-- <input type="text" autocomplete="off" placeholder="No PO"  name="po_number" class="form-control"> -->
                    <input type="text" autocomplete="off" placeholder="No PO" name="po_number" class="form-control box-shadow" value="<?= $data_estimasi->no_transaksi ?>">
                  </div>
                  <label class="col-sm-2 control-label" style="font-family: Arial;">Penerimaan Kargo: </label>
                  <div class="col-sm-4">
                    <input type="datetime-local" autocomplete="off" placeholder="" name="penerimaan_kargo_tgl" class="form-control box-shadow" value="<?= $data_estimasi->penerimaan_kargo_tgl . ' ' . $data_estimasi->penerimaan_kargo_time ?>">
                  </div>
                  <!-- <div class="col-sm-2">
                    <input type="time" name="penerimaan_kargo_time" class="form-control box-shadow" placeholder="" value="<?= $data_estimasi->penerimaan_kargo_time ?>">
                  </div> -->
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" style="font-family: Arial;">Jenis Penerimaan : </label>
                  <div class="col-sm-4">
                    <select data-plugin="select2" name='jenis_pemasukan' id="jenis_pemasukan" class="form-control box-shadow">
                      <option value="0">-- Pilih Jenis Penerimaan --</option>
                      <?php

                      foreach ($jenis as $value) {   ?>
                        <option value="<?= $value->id_jenis ?>" <?= ($data_estimasi->jenis_pemasukan == $value->id_jenis) ? 'selected' : ''; ?>><?= $value->jenis  ?></option>
                      <?php }
                      ?>

                    </select>
                    <span style="color: red;font-size: 10px;" style="font-family: Arial;">* pilih Jenis Pemasukan wajib di isi</span>
                  </div>
                  <label class="col-sm-2 control-label" style="font-family: Arial;">Jenis Dokumen Pabean : </label>
                  <div class="col-sm-4">
                    <select data-plugin="select2" name='jenis_doc' id="jenis_doc" class="form-control box-shadow">
                      <!-- <option value=''>None</option>-->
                      <option value="0">-- Pilih Jenis Dokumen --</option>
                      <?php

                      foreach ($dokumen as $value) {   ?>
                        <option value="<?= $value->id_dokumen ?>" <?= ($data_estimasi->jenis_doc == $value->id_dokumen) ? 'selected' : ''; ?>><?= $value->dokumen  ?></option>
                      <?php }
                      ?>

                    </select>
                    <span style="color: red;font-size: 10px;">* pilih Jenis Dokumen wajib di isi</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" style="font-family: Arial;">No. Bukti Penerimaan / Delivery Order (DO) : </label>
                  <div class="col-sm-4">
                    <input type="text" autocomplete="off" placeholder="No. Bukti Penerimaan / Delivery Order (DO)" name="no_bukti_penerimaan" class="form-control box-shadow" value="<?= $dataGet->no_bukti_penerimaan ?>">
                  </div>
                  <label class="col-sm-2 control-label" style="font-family: Arial;">No Dokumen : </label>
                  <div class="col-sm-4">
                    <input type="text" autocomplete="off" placeholder="No Dokumen Pabean" name="no_dokumen_pabean" class="form-control box-shadow" value="<?= $dataGet->no_dokumen_pabean ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" style="font-family: Arial;">Nama Pengirim Barang : </label>
                  <div class="col-sm-4">
                    <input type="text" autocomplete="off" placeholder="Nama Pengirim Barang" name="pengirim_barang" class="form-control box-shadow" value="<?= $dataGet->id_client ?>">
                    <span style="color: red;font-size: 10px;">* pilih Pengirim Barang wajib di isi</span>
                  </div>
                  <label class="col-sm-2 control-label" style="font-family: Arial;">Tanggal Dokumen : </label>
                  <div class="col-sm-4">
                    <input type="date" id="tgl_dokumen_pabean" name="tgl_dokumen_pabean" class="form-control box-shadow" value="<?= $dataGet->tgl_dokumen_pabean ?>">
                  </div>
                </div>

                <script>
                  $(function() {
                    if (!Modernizr.inputtypes['date']) {
                      $('input[type=date]').datepicker({
                        dateFormat: "mm-dd-yy"
                      })
                    }
                  });
                </script>

                <div class="form-group">
                  <label class="col-sm-2 control-label" style="font-family: Arial;">File : </label>
                  <div class="col-sm-4">
                    <input class="form-control box-shadow" id="file" name="file" type="file">
                    <span style="color: red;font-size: 10px;">* Masukan Dokumen Pabean & lampirannya dalam Bentuk Format zip.</span>
                  </div>
                  <label class="col-sm-2 control-label" style="font-family: Arial;">Negara Asal Barang : </label>
                  <div class="col-sm-4">
                    <select data-plugin="select2" name='countries' id="" class="form-control box-shadow">
                      <option value="0">-- Pilih Negara Asal Barang --</option>
                      <?php
                      foreach ($bendera  as $value) {   ?>
                        <option value="<?= $value->id_negara_asal ?>" <?= ($data_estimasi->negara_asal == $value->id_negara_asal) ? 'selected' : ''; ?>><?= $value->nama_negara  ?></option>
                      <?php }
                      ?>
                    </select>
                  </div>

                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" style="font-family: Arial;">File Estimasi : </label>
                  <div class="col-sm-4">
                    <a href="https://app.asinusa.co.id/sip/uploads/<?= $dataGet->file ?>" class="btn btn-sm btn-primary" style="align:center;" target="_blank"><i class="fa fa-folder-open-o"></i> Cek File</a>
                  </div>
                  <label class="col-sm-2 control-label" style="font-family: Arial;">Nama Kapal : </label>
                  <div class="col-sm-4">
                    <input type="text" autocomplete="off" placeholder="Nama Kapal" name="nama_kapal" class="form-control box-shadow" value="<?= $dataGet->nama_kapal ?>" readonly>
                  </div>
                </div>

                <br>
                <div class="form-group">
                  <label class="col-sm-12 control-label" style="color: red;text-align: left;">HS Code : <?= $dataGet->id_barang; ?> - <?= $dataGet->nama_brg; ?></label>
                </div>
                <br>
                <h2>Data Estimasi</h2>
                <table width="100%" style="margin-top: 10px;" class="table table-hover table-bordered dataTable table-striped width-full overf">
                  <thead>
                    <tr>
                      <!-- <td style="width: 1%; border-bottom: 1px solid black;">
                      <a  class="btn btn-primary addRowPK" onclick="addPK()"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </td> -->

                      <!-- <p>Qty Tidak Boleh Lebih Dari 50000</p> -->

                      <!-- <td class="JudulHeadr" style="padding-left: 5px; width: 19%; border-bottom: 1px solid black;">HS Code</td> -->
                      <td class="JudulHeadr" style="padding-left: 5px; width: 14%; border-bottom: 1px solid black;">Qty</td>
                      <!-- <td class="JudulHeadr" style="padding-left: 5px; width: 14%; border-bottom: 1px solid black;">Satuan</td> -->
                      <!-- <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Lokasi Tujuan Terminal</td> -->
                      <td class="JudulHeadr" style="padding-left: 5px; width: 14%; border-bottom: 1px solid black;">Tank Penerimaan</td>
                      <td class="JudulHeadr" style="padding-left: 5px; width: 14%; border-bottom: 1px solid black;">Mata Uang</td>
                      <td class="JudulHeadr" style="padding-left: 5px; width: 14%; border-bottom: 1px solid black;">Harga Satuan Barang</td>
                      <td class="JudulHeadr" style="padding-left: 5px; width: 14%; border-bottom: 1px solid black;">Total Nilai Barang</td>
                      <td class="JudulHeadr" style="padding-left: 5px; width: 14%; border-bottom: 1px solid black;">Biaya Kurs</td>
                      <td class="JudulHeadr" style="padding-left: 5px; width: 14%; border-bottom: 1px solid black;">Calculate Biaya Kurs (convertion price)</td>
                    </tr>

                  </thead>
                  <tbody id="myTablePK">
                    <?php
                    $no = 1;
                    foreach ($data_estimasi_result as $value_result) :

                    ?>
                      <tr>

                        <!-- <td><input type="text" autocomplete="off" name="" class="form-control" readonly="readonly" value="<?= $dataGet->id_barang ?>"></td> -->
                        <td><input type="text" readonly="readonly" autocomplete="off" id="qty_get<?= $no ?>" name="qty_get<?= $no ?>" class="form-control" value="<?= number_format($value_result->jumlah, 0, ".", ""); ?>"></td>
                        <td>
                          <select id="tank_real_showE<?= $no ?>" name="tank_real<?= $no ?>" class="form-control" style="width:100%;" disabled="disabled">
                            <option value="">Pilih</option>
                            <?php
                            foreach ($tank2 as $value) {
                            ?>
                              <option value="<?php echo $value->tank; ?>" <?= ($value_result->terminal_tank == $value->tank) ? 'selected' : ''; ?>><?php echo $value->nama_tangki_alias; ?></option>
                            <?php } ?>

                          </select>
                        </td>
                        <td>
                          <select id="kurs_real_showE<?= $no ?>" name="kurs_real<?= $no ?>" class="form-control classCur" style="width:100%;" disabled="disabled">
                            <option value="">Pilih</option>
                            <?php
                            foreach ($kurs as $value) {

                            ?>
                              <option value="<?php echo $value->id_kurs; ?>" <?= ($value_result->id_mata_uang == $value->id_kurs) ? 'selected' : ''; ?>><?php echo $value->mata_uang; ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td><input type="text" id="harga_satuan_real_showE<?= $no ?>" name="harga_satuan_real<?= $no ?>" class="form-control" value="<?= number_format($value_result->harga, 0, ".", ""); ?>" readonly="readonly"></td>
                        <td><input type="text" autocomplete="off" id="hasil_real_showE<?= $no ?>" value="<?= number_format($value_result->nilai_barang, 2, ",", "."); ?>" name="hasil_real_showE<?= $no ?>" class="form-control" readonly="readonly"></td>
                        <td><input type="text" id="harga_satuan_real_showE<?= $no ?>" name="harga_satuan_real<?= $no ?>" class="form-control" value="<?= number_format($value_result->biaya_kurs, 2, ",", "."); ?>" readonly="readonly"></td>
                        <td><input type="text" class="form-control classCalculateBiayaKurs" id="calculatebiayakurs_showE<?= $no ?>" value="<?= number_format($value_result->total_calculate, 2, ",", "."); ?>" readonly="readonly"></td>
                      </tr>
                      <input style="display: none;" type="text" value="<?= $no++ ?>">

                    <?php

                    endforeach;
                    ?>
                  </tbody>

                  <p id="demo"></p>
                  <!-- <div id="dataLimitPK"></div> -->
                  <!-- <tfoot>
                    <td></td>
                    <td></td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">
                    <input type="text" placeholder="Total Qty" id="totalhasil3" class="form-control" value="0" readonly>
                  </td>
                  </tfoot> -->
                </table>
                <br>
                <h2>Data Realisasi</h2>
                <table width="100%" style="margin-top: 10px;" class="table table-hover table-bordered dataTable table-striped width-full overf">
                  <thead>
                    <tr>
                      <!-- <td style="width: 1%; border-bottom: 1px solid black;">
                      <a  class="btn btn-primary addRowPK" onclick="addPK()"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </td> -->

                      <!-- <p>Qty Tidak Boleh Lebih Dari 50000</p> -->

                      <!-- <td class="JudulHeadr" style="padding-left: 5px; width: 19%; border-bottom: 1px solid black;">HS Code</td> -->
                      <td class="JudulHeadr" style="padding-left: 5px; width: 14%; border-bottom: 1px solid black;">Qty</td>
                      <!-- <td class="JudulHeadr" style="padding-left: 5px; width: 14%; border-bottom: 1px solid black;">Satuan</td> -->
                      <!-- <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Lokasi Tujuan Terminal</td> -->
                      <td class="JudulHeadr" style="padding-left: 5px; width: 16%; border-bottom: 1px solid black;">Tank Penerimaan</td>
                      <td class="JudulHeadr" style="padding-left: 5px; width: 11%; border-bottom: 1px solid black;">Mata Uang</td>
                      <td class="JudulHeadr" style="padding-left: 5px; width: 14%; border-bottom: 1px solid black;">Harga Satuan Barang</td>
                      <td class="JudulHeadr" style="padding-left: 5px; width: 14%; border-bottom: 1px solid black;">Total Nilai Barang</td>
                      <td class="JudulHeadr" style="padding-left: 5px; width: 14%; border-bottom: 1px solid black;">Biaya Kurs</td>
                      <td class="JudulHeadr" style="padding-left: 5px; width: 14%; border-bottom: 1px solid black;">Calculate Biaya Kurs (convertion price)</td>
                    </tr>

                  </thead>
                  <tbody id="myTablePK">
                    <?php
                    $no = 1;
                    $sumTotalLoopQty = 0;
                    $sumTotalLoopHarga = 0;
                    $sumTotalLoopTH = 0;
                    $sumTotalLoopBK = 0;
                    $sumTotalLoopCBK = 0;
                    foreach ($data_estimasi_result as $value_result) :
                      $sumTotalLoopQty += $value_result->jumlah;
                      $sumTotalLoopHarga += $value_result->harga;
                      $sumTotalLoopTH += $value_result->nilai_barang;
                      $sumTotalLoopBK += $value_result->biaya_kurs;
                      $sumTotalLoopCBK += $value_result->total_calculate;
                    ?>
                      <tr>

                        <!-- <td><input type="text" autocomplete="off" name="" class="form-control" readonly="readonly" value="<?= $dataGet->id_barang ?>"></td> -->
                        <td><input type="text" onkeyup="myFunctionKeyup(<?= $no ?>)" autocomplete="off" id="qty_real<?= $no ?>" name="qty_real<?= $no ?>" class="form-control classQty" value="<?= number_format($value_result->jumlah, 0, ".", ""); ?>"></td>
                        <td>
                          <select id="tank_real<?= $no ?>" name="tank_real<?= $no ?>" class="form-control" style="width:100%;">
                            <option value="">Pilih</option>
                            <?php
                            foreach ($tank2 as $value) {
                            ?>
                              <option value="<?php echo $value->tank; ?>" <?= ($value_result->terminal_tank == $value->tank) ? 'selected' : ''; ?>><?php echo $value->nama_tangki_alias; ?></option>
                            <?php } ?>

                          </select>
                        </td>
                        <td>
                          <select id="kurs_real<?= $no ?>" name="kurs_real<?= $no ?>" class="form-control classCur" style="width:100%;">
                            <option value="">Pilih</option>
                            <?php
                            foreach ($kurs as $value) {
                            ?>
                              <option value="<?php echo $value->id_kurs; ?>" <?= ($value_result->id_mata_uang == $value->id_kurs) ? 'selected' : ''; ?>><?php echo $value->mata_uang; ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td><input type="text" id="harga_satuan_real<?= $no ?>" name="harga_satuan_real<?= $no ?>" class="form-control classHarga" onkeyup="myFunctionKeyup(<?= $no ?>)" value="<?= number_format($value_result->harga, 0, ".", ""); ?>"></td>
                        <td><input type="text" autocomplete="off" id="hasil_real_show<?= $no ?>" value="<?= number_format($value_result->nilai_barang, 2, ",", "."); ?>" name="hasil_real_show<?= $no ?>" class="form-control classTotalHarga" readonly="readonly"><input type="text" autocomplete="off" id="hasil_real<?= $no ?>" value="<?= number_format($value_result->nilai_barang, 2, ",", "."); ?>" name="hasil_real<?= $no ?>" class="form-control" readonly="readonly" style="display: none;"></td>
                        <td><input type="text" id="biaya_kurs_real<?= $no ?>" name="biaya_kurs_real<?= $no ?>" class="form-control classBiayaKurs" onkeyup="myFunctionKeyupKurs(<?= $no ?>)" value="<?= number_format($value_result->biaya_kurs, 2, ",", "."); ?>"><a href="https://www.bi.go.id/id/statistik/informasi-kurs/transaksi-bi/default.aspx" target="_blank"> Cek Nilai Biaya Kurs</a></td>
                        <td><input type="text" class="form-control classTotalBiayaKurs" id="total_calculate<?= $no ?>" name="total_calculate<?= $no ?>" value="<?= number_format($value_result->total_calculate, 2, ",", "."); ?>" readonly="readonly"></< /td>
                      </tr>
                      <input style="display: none;" type="text" value="<?= $no++ ?>">

                    <?php

                    endforeach;
                    ?>
                  </tbody>
                  <tfoot>
                    <tr style="text-align: center;">
                      <td class="JudulHeadr" style="padding-left: 5px; width: 14%;"><input type="text" id="totalshowqty" class="form-control" value="<?= $sumTotalLoopQty ?>"></td>
                      <td class="JudulHeadr" style="padding-left: 5px;"></td>
                      <td class="JudulHeadr" style="padding-left: 5px; width: 14%;"></td>
                      <td class="JudulHeadr" style="padding-left: 5px; width: 14%;"><input type="text" id="totalshowharga" class="form-control" value="<?= number_format($sumTotalLoopHarga, 2, ",", "."); ?>"></td>
                      <td class="JudulHeadr" style="padding-left: 5px; width: 14%;"><input type="text" id="totalshowTH" class="form-control" value="<?= number_format($sumTotalLoopTH, 2, ",", "."); ?>"></td>
                      <td class="JudulHeadr" style="padding-left: 5px; width: 14%;"><input type="text" id="totalshowBK" class="form-control" value="<?= number_format($sumTotalLoopBK, 2, ",", "."); ?>"></td>
                      <td class="JudulHeadr" style="padding-left: 5px; width: 14%;"><input type="text" id="totalshowCBK" class="form-control" value="<?= number_format($sumTotalLoopCBK, 2, ",", "."); ?>"></td>
                    </tr>
                  </tfoot>
                  <p id="demo"></p>
                  <!-- <div id="dataLimitPK"></div> -->
                  <!-- <tfoot>
                    <td></td>
                    <td></td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">
                    <input type="text" placeholder="Total Qty" id="totalhasil3" class="form-control" value="0" readonly>
                  </td>
                  </tfoot> -->
                </table>
                <br>

                <div class="form-group">
                  <div class="col-sm-8">
                    <input class="btn btn-primary" type="submit" value="Simpan">
                    <button class="btn btn-default btn-outline" type="reset">Reset</button>
                  </div>
                </div>


              </form>
            </div>
          </div>
          <!-- End Example Horizontal Form -->

        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?php echo base_URL() ?>jquery.js"></script>

<script type="text/javascript">
  function isNumberKey(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);
    var regex = /^[0-9.,]+$/;
    if (!regex.test(key)) {
      theEvent.returnValue = false;
      if (theEvent.preventDefault) theEvent.preventDefault();
    }
  }

  function addPK() {
    var table = document.getElementById("myTablePK");
    var row = table.insertRow(0);
    var getJml = document.getElementById("get_jml").value;

    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);
    var cell7 = row.insertCell(6);
    var cell8 = row.insertCell(6);


    for (var a = 0; a <= table.rows.length; a++) {
      $('#dataLimitPK').empty();
      $('<input type="hidden" name="limit_pk" value="' + a + '" >').appendTo('#dataLimitPK');
    }

    j = a - 1;
    cell1.innerHTML = '<a href="javascript:void(0);" class="btn btn-sm btn-default" style="align:center;" onclick="deleteRowPK(this)"><i class="fa fa-remove"></i></a>';
    // cell1.innerHTML = '<input type="text" class="form-control classKeteranganBarang" style="width:100%;" class="form-control" value="<?= $data_estimasi->id_barang; ?> - <?= $data_estimasi->nama_brg; ?>" id="classKeteranganBarang"  readonly>';

    cell2.innerHTML = '<input type="text" class="form-control classQtyShow" style="width:100%;" class="form-control" id="qty_show' + a + '" value="<?= number_format($dataGet->jumlah) ?>" ><input type="text" class="form-control classQty" class="form-control" id="qty' + a + '" value="<?= number_format($dataGet->jumlah) ?>" style="width:100%;display:none">';
    cell3.innerHTML = '<select id="tank" class="form-control selectX classTank" style="width:100%;">' +
      '<option value="">Pilih</option>' +
      <?php
      foreach ($tank2 as $value) {
      ?> '<option value="<?php echo $value->tank; ?>"><?php echo $value->nama_tangki_alias; ?></option>' +
      <?php } ?>

    '</select>';
    cell4.innerHTML = '<select class="form-control selectX classCur" style="width:100%;">' +
      '<option value="">Pilih</option>' +
      <?php
      foreach ($kurs as $value) {
      ?> '<option value="<?php echo $value->id_kurs; ?>"><?php echo $value->mata_uang; ?></option>' +
      <?php } ?> '</select>';
    cell5.innerHTML = '<input type="text" class="form-control classHarga" style="width:100%;" class="form-control" id="harga' + a + '" ><input type="text" class="form-control classHarga" style="width:100%;display:none" class="form-control" id="urutan_diem" value="' + j + '">';
    cell6.innerHTML = '<input type="text" class="form-control classTotal" style="width:100%;" class="form-control" id="total_show' + a + '" readonly><input type="text" class="form-control classTotal" style="width:100%;display:none" class="form-control" id="total' + a + '" >';
    cell7.innerHTML = '<input type="text" class="form-control classBiayaKurs" id="biayakurs' + a + '" ><a href="https://www.bi.go.id/id/statistik/informasi-kurs/transaksi-bi/default.aspx" target="_blank"> Cek Nilai Biaya Kurs</a> ';
    cell8.innerHTML = '<input type="text" class="form-control classCalculateBiayaKursShow" id="calculatebiayakursshow' + a + '" ><input type="text" class="form-control classCalculateBiayaKurs" id="calculatebiayakurs' + a + '" style="width:100%;display:none">';

    var calculated_total_sum = 0;

    $("#myTablePK .classQty").each(function() {
      var get_textbox_value = $(this).val();
      if ($.isNumeric(get_textbox_value)) {
        calculated_total_sum += parseFloat(get_textbox_value);
      }
    });

    // $("#qty").keyup(function(){
    //         var a = Number(document.getElementById("totalhasil").value);
    //         var b = Number(document.getElementById("qty").value);
    //         var urutan_diem = document.getElementById("urutan_diem").value;

    //         var c = a+b;
    //         if(urutan_diem == 1){
    //           document.getElementById("totalhasil3").value = b;

    //         }else{
    //           document.getElementById("totalhasil3").value = c;
    //         }
    // });    

    String.prototype.number_format = function(d) {
      var n = this;
      var c = isNaN(d = Math.abs(d)) ? 2 : d;
      var s = n < 0 ? "-" : "";
      var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
        j = (j = i.length) > 3 ? j % 3 : 0;
      return s + (j ? i.substr(0, j) + ',' : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + ',') + (c ? '.' + Math.abs(n - i).toFixed(c).slice(2) : "");
    }




    // $("#qty"+ a).keyup(function(){

    //         // var a = Number(document.getElementById("totalhasil").value);
    //         // var urutan_diem = document.getElementById("urutan_diem").value;
    //         var qty_show = Number(document.getElementById("qty" + a).value);
    //         var harga_show = Number(document.getElementById("harga" + a).value);
    //         // var getqty = Number(document.getElementById("totalhasil3").value);
    //         // var calculate = qty_show + getqty;

    //         // if(calculate > <?= $dataGet->jumlah ?>){
    //         //     alert("Data tidak boleh melebihi Quantity");
    //         //     document.getElementById("qty" + a).value = "";
    //         // }else{
    //           var result_real   = qty_show * harga_show;
    //           let text          = result_real.toString();
    //           document.getElementById("total_show" + a).value = text.number_format2();
    //           document.getElementById("total" + a).value = result_real;

    //           var calculated_total_sum_qty = 0;
    //             $("#myTablePK .classQty").each(function (){
    //                 var get_textbox_value = $(this).val().replace(",", "");
    //                 calculated_total_sum_qty += parseFloat(get_textbox_value);    
    //             });

    //             var calculated_total_sum_total_harga = 0;
    //             $("#myTablePK .classTotal").each(function (){
    //                 var get_textbox_value = $(this).val().replace(".", "");
    //                 var get_textbox_value = get_textbox_value.replace(".", "");
    //                 var get_textbox_value = get_textbox_value.replace(".", "");
    //                 var get_textbox_value = get_textbox_value.replace(",", ".");
    //                 calculated_total_sum_total_harga += parseFloat(get_textbox_value);    
    //             });

    //             document.getElementById("totalshowqty").value = calculated_total_sum_qty;
    //             document.getElementById("totalshowTH").value = calculated_total_sum_total_harga.toString().number_format2();

    //         // }
    //         // var sum += $b;
    //         // var sum += qty_show2;
    //         // var sum += parseFloat(this.value);
    //         // if(urutan_diem == 1){
    //         //   document.getElementById("totalhasil3").value = b;
    //           // alert(sum);
    //         // }else{

    //                         // }

    // });    





    //   $("#harga" + a).keyup(function(){
    //     var qty   = Number(document.getElementById("qty" + a).value);
    //     var harga = document.getElementById("harga" + a).value;


    //     var result_real   = qty * harga;
    //     let text          = result_real.toString();
    //     document.getElementById("total_show" + a).value = text.number_format2();
    //     document.getElementById("total" + a).value = result_real;

    //     var calculated_total_sum_harga = 0;
    //         $("#myTablePK .classHarga").each(function (){
    //             var get_textbox_value = $(this).val().replace(".", "");
    //             var get_textbox_value = get_textbox_value.replace(",", ".");
    //             calculated_total_sum_harga += parseFloat(get_textbox_value);    
    //       });

    //       var calculated_total_sum_total_harga = 0;
    //             $("#myTablePK .classTotal").each(function (){
    //                 var get_textbox_value = $(this).val().replace(".", "");
    //                 var get_textbox_value = get_textbox_value.replace(".", "");
    //                 var get_textbox_value = get_textbox_value.replace(".", "");
    //                 var get_textbox_value = get_textbox_value.replace(",", ".");
    //                 calculated_total_sum_total_harga += parseFloat(get_textbox_value);    
    //       });

    //       document.getElementById("totalshowTH").value = calculated_total_sum_total_harga.toString().number_format2();
    //       document.getElementById("totalshowharga").value = calculated_total_sum_harga.toString().number_format2();

    //   });

    //   $("#biayakurs" + a).keyup(function(){

    //         var total       = Number(document.getElementById("total" + a).value);
    //         var biayakurs   = document.getElementById("biayakurs" + a).value;
    //         var text        = biayakurs.replace('.', '');
    //         var text2       = text.replace(',', '.');
    //         var calculatebiayakurs = total * text2;
    //         let textstring         = calculatebiayakurs.toString();
    //         document.getElementById("calculatebiayakursshow" + a).value = textstring.number_format2();
    //         document.getElementById("calculatebiayakurs" + a).value = calculatebiayakurs;

    //         var calculated_total_sum_biaya_kurs = 0;
    //         $("#myTablePK .classBiayaKurs").each(function (){
    //             var get_textbox_value = $(this).val().replace(".", "");
    //             var get_textbox_value = get_textbox_value.replace(".", "");
    //             var get_textbox_value = get_textbox_value.replace(".", "");
    //             var get_textbox_value = get_textbox_value.replace(",", ".");
    //             calculated_total_sum_biaya_kurs += parseFloat(get_textbox_value);    
    //         });

    //         var calculated_total_sum_total_biaya_kurs = 0;
    //         $("#myTablePK .classCalculateBiayaKursShow").each(function (){
    //             var get_textbox_value = $(this).val().replace(".", "");
    //             var get_textbox_value = get_textbox_value.replace(".", "");
    //             var get_textbox_value = get_textbox_value.replace(".", "");
    //             var get_textbox_value = get_textbox_value.replace(",", ".");
    //             calculated_total_sum_total_biaya_kurs += parseFloat(get_textbox_value);    
    //         });

    //         document.getElementById("totalshowBK").value = calculated_total_sum_biaya_kurs.toString().number_format2();
    //         document.getElementById("totalshowCBK").value = calculated_total_sum_total_biaya_kurs.toString().number_format2();
    // });

    // $(".selectX").select2({
    //   placeholder: "Select",
    //   allowClear: true
    // })


    $("#terminal").change(function() {
      var url = "<?php echo base_url('PemasukanRBB/add_ajax_tank'); ?>/" + $(this).val();
      $('#tank').load(url);
      return false;
    });

    for (var i = 0; i <= table.rows.length; i++) {
      document.getElementsByClassName("classQty")[i].name = "qty" + i;
      document.getElementsByClassName("classTank")[i].name = "tank" + i;
      document.getElementsByClassName("classHarga")[i].name = "harga" + i;
      document.getElementsByClassName("classCur")[i].name = "cur" + i;
      document.getElementsByClassName("classTotal")[i].name = "total" + i;
      document.getElementsByClassName("classBiayaKurs")[i].name = "biayakurs" + i;
    }



  }


  function validasi() {
    var KeteranganBarang = $("#KeteranganBarang").val();
    $.ajax({
      type: 'POST',
      url: "<?php echo base_URL('PemasukanRBB/VlidasiData'); ?>",
      data: "KeteranganBarang=" + KeteranganBarang,
      cache: false,
      success: function(data) {
        var str = data;
        var ckhsl = str.replace('"', '');
        var rckhsl = ckhsl.replace('"', '');
        document.getElementById("sat").value = rckhsl;
      }
    });
  }

  // String.prototype.number_format = function(d) {
  //     var n = this;
  //     var c = isNaN(d = Math.abs(d)) ? 2 : d;
  //     var s = n < 0 ? "-" : "";
  //     var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
  //     return s + (j ? i.substr(0, j) + ',' : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + ',') + (c ? '.' + Math.abs(n - i).toFixed(c).slice(2) : "");
  // }

  // var qty_real            = document.getElementById('qty_real').value;
  // var harga_satuan_real   = document.getElementById('harga_satuan_real');
  // var hasil_real          = document.getElementById('hasil_real');
  // var hasil_real_show     = document.getElementById('hasil_real_show');
  // harga_satuan_real.addEventListener('keyup', function(e)
  // {
  //     var result_real      = qty_real * this.value;
  //     let text = result_real.toString();
  //     hasil_real.value = result_real;
  //     hasil_real_show.value = text.number_format();
  //     // hasil_real.value = formatRupiah(result_real);
  // });

  String.prototype.number_format2 = function(d) {
    var n = this;
    var c = isNaN(d = Math.abs(d)) ? 2 : d;
    var s = n < 0 ? "-" : "";
    var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
      j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + '.' : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + '.') + (c ? ',' + Math.abs(n - i).toFixed(c).slice(2) : "");
  }

  //   String.prototype.number_format2 = function(d) {
  //     var n = this;
  //     var c = isNaN(d = Math.abs(d)) ? 2 : d;
  //     var s = n < 0 ? "-" : "";
  //     var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
  //     return s + (j ? i.substr(0, j) + '.' : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + '.') + (c ? ',' + Math.abs(n - i).toFixed(c).slice(2) : "");
  // }

  // var qty_real            = document.getElementById('qty_real').value;
  // var harga_satuan_real   = document.getElementById('harga_satuan_real');
  // var hasil_real          = document.getElementById('hasil_real');
  // var hasil_real_show     = document.getElementById('hasil_real_show');
  // harga_satuan_real.addEventListener('keyup', function(e)
  // {

  //     var result_real      = qty_real * this.value;
  //     let text = result_real.toString();
  //     hasil_real.value = result_real;
  //     hasil_real_show.value = text.number_format();
  //     // hasil_real.value = formatRupiah(result_real);
  // });

  // Event listener saat halaman dimuat
  document.addEventListener("DOMContentLoaded", function() {
    var hargaInputs = document.querySelectorAll('input[id^="harga_satuan_real"]');
    var biayaKursInputs = document.querySelectorAll('input[id^="biaya_kurs_real"]');

    hargaInputs.forEach(function(input) {
      input.addEventListener('keyup', function() {
        var value = this.value.replace(/\D/g, '');
        value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        this.value = value;
      });
    });

    biayaKursInputs.forEach(function(input) {
      input.addEventListener('keyup', function() {
        var value = this.value.replace(/\D/g, '');
        value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        this.value = value;
      });
    });
  });


  function myFunctionKeyup(rowid) {
  var table = document.getElementById("myTablePK");

  var qty_real = parseInt(document.getElementById("qty_real" + rowid).value);
  var qty_get = parseInt(document.getElementById("qty_get" + rowid).value);
  var harga_satuan_real = parseInt(document.getElementById("harga_satuan_real" + rowid).value.replace(/\D/g, ''));
  var hasil_real = document.getElementById("hasil_real" + rowid);
  var hasil_real_show = document.getElementById("hasil_real_show" + rowid);
  var result_real = qty_real * harga_satuan_real;
  var selisih = qty_get - qty_real;

  hasil_real.value = result_real;
  hasil_real_show.value = result_real.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

  var calculated_total_sum_qty = 0;
  $("#myTablePK .classQty").each(function() {
    var get_textbox_value = $(this).val().replace(/\D/g, '');
    calculated_total_sum_qty += parseFloat(get_textbox_value);
  });

  var calculated_total_sum_harga = 0;
  $("#myTablePK .classHarga").each(function() {
    var get_textbox_value = $(this).val().replace(/\D/g, '');
    calculated_total_sum_harga += parseFloat(get_textbox_value);
  });

  var calculated_total_sum_total_harga = 0;
  $("#myTablePK .classTotalHarga").each(function() {
    var get_textbox_value = $(this).val().replace(/\D/g, '');
    calculated_total_sum_total_harga += parseFloat(get_textbox_value);
  });

  var calculated_total_sum_biaya_kurs = 0;
  $("#myTablePK .classBiayaKurs").each(function() {
    var get_textbox_value = $(this).val().replace(/\D/g, '');
    calculated_total_sum_biaya_kurs += parseFloat(get_textbox_value);
  });

  var calculated_total_sum_total_biaya_kurs = 0;
  $("#myTablePK .classTotalBiayaKurs").each(function() {
    var get_textbox_value = $(this).val().replace(/\D/g, '');
    calculated_total_sum_total_biaya_kurs += parseFloat(get_textbox_value);
  });

  document.getElementById("totalshowqty").value = calculated_total_sum_qty.toLocaleString('en-US');
  document.getElementById("totalshowharga").value = calculated_total_sum_harga.toLocaleString('en-US');
  document.getElementById("totalshowTH").value = calculated_total_sum_total_harga.toLocaleString('en-US');
  document.getElementById("totalshowBK").value = calculated_total_sum_biaya_kurs.toLocaleString('en-US');
  document.getElementById("totalshowCBK").value = calculated_total_sum_total_biaya_kurs.toLocaleString('en-US');
}

// Fungsi saat input biaya kurs berubah
function myFunctionKeyupKurs(rowid) {
  var hasil_real = document.getElementById("hasil_real" + rowid).value;
  var biaya_kurs = document.getElementById("biaya_kurs_real" + rowid).value.replace(/\D/g, '');
  
  // Format angka biaya kurs
  var formatted_biaya_kurs = biaya_kurs.number_format();

  var calculate = hasil_real * biaya_kurs;
  
  // Format hasil perhitungan
  var hasilcalculate = calculate.toString().number_format2();
  
  document.getElementById("total_calculate" + rowid).value = hasilcalculate;

  var table = document.getElementById("myTablePK");

  var calculated_total_sum_biaya_kurs = 0;
  $("#myTablePK .classBiayaKurs").each(function() {
    var get_textbox_value = $(this).val().replace(/\D/g, '');
    calculated_total_sum_biaya_kurs += parseFloat(get_textbox_value);
  });

  var calculated_total_sum_total_biaya_kurs = 0;
  $("#myTablePK .classTotalBiayaKurs").each(function() {
    var get_textbox_value = $(this).val().replace(/\D/g, '');
    calculated_total_sum_total_biaya_kurs += parseFloat(get_textbox_value);
  });

  // Format angka total biaya kurs
  var formatted_total_biaya_kurs = calculated_total_sum_biaya_kurs.toString().number_format2();
  var formatted_total_biaya_kurs_total = calculated_total_sum_total_biaya_kurs.toString().number_format2();

  document.getElementById("totalshowBK").value = formatted_total_biaya_kurs;
  document.getElementById("totalshowCBK").value = formatted_total_biaya_kurs_total;
}


  /* Dengan Rupiah */
  // var dengan_rupiah = document.getElementById('dengan-rupiah');
  // dengan_rupiah.addEventListener('keyup', function(e)
  // {
  //     dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
  // });

  // /* Fungsi */
  // function formatRupiah(angka, prefix)
  // {
  //      var number_string = angka.replace(/[^,\d]/g, '').toString(),
  //          split    = number_string.split(','),
  //          sisa     = split[0].length % 3,
  //          rupiah     = split[0].substr(0, sisa),
  //          ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

  //      if (ribuan) {
  //          separator = sisa ? '.' : '';
  //          rupiah += separator + ribuan.join('.');
  //      }

  //      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
  //      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
  // }
  // function myFunctionKeyup(rowid)
  //  { 
  //     String.prototype.number_format = function(d) {
  //     var n = this;
  //     var c = isNaN(d = Math.abs(d)) ? 2 : d;
  //     var s = n < 0 ? "-" : "";
  //     var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
  //     return s + (j ? i.substr(0, j) + ',' : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + ',') + (c ? '.' + Math.abs(n - i).toFixed(c).slice(2) : "");
  //     }

  //     var qty_real            = parseInt(document.getElementById("qty_real"+rowid).value);
  //     var harga_satuan_real   = parseInt(document.getElementById("harga_satuan_real"+rowid).value);
  //     var hasil_real          = document.getElementById("hasil_real"+rowid);
  //     var hasil_real_show     = document.getElementById("hasil_real_show"+rowid);
  //     var result_real         = qty_real * harga_satuan_real;
  //     let text                = result_real.toString();
  //     hasil_real.value        = result_real;
  //     hasil_real_show.value   = text.number_format();

  //  }

  //  function myFunctionKeyupkurs(rowid)
  //  { 
  //     String.prototype.number_format = function(d) {
  //     var n = this;
  //     var c = isNaN(d = Math.abs(d)) ? 2 : d;
  //     var s = n < 0 ? "-" : "";
  //     var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
  //     return s + (j ? i.substr(0, j) + ',' : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + ',') + (c ? '.' + Math.abs(n - i).toFixed(c).slice(2) : "");
  //     }

  //     var qty_real            = parseInt(document.getElementById("qty_real"+rowid).value);
  //     var harga_satuan_real   = parseInt(document.getElementById("harga_satuan_real"+rowid).value);
  //     var hasil_real          = document.getElementById("hasil_real"+rowid);
  //     var hasil_real_show     = document.getElementById("hasil_real_show"+rowid);
  //     var result_real         = qty_real * harga_satuan_real;
  //     let text                = result_real.toString();
  //     hasil_real.value        = result_real;
  //     hasil_real_show.value   = text.number_format();

  //  }


  // function myFunctionKeyup() {
  //  var count_loop   = document.getElementById("count_loop").value;

  //    for (var i = 1; i <= count_loop; i++) {
  //      var qty_real = document.getElementById("qty_real" + i).value;
  //      alert(qty_real);
  //    }
  //  }

  // for (let i = 0; i < count; i++) {
  // $("#qty_real1").on( "keyup", function() {
  //   alert( "Handler for `keyup` called." );
  // } );
  //     $("#qty_real"+ i).keyup(function(){

  //       var qty_real = Number(document.getElementById("qty_real" + i).value);
  //       // var calculate = qty_show + getqty;

  //       // if(calculate > <?= $dataGet->jumlah ?>){
  //       //       alert("Data tidak boleh melebihi Quantity");
  //       //       document.getElementById("qty" + a).value = "";
  //       // }
  //       alert("a");

  // });  

  // text += cars[i] + "<br>";
  // }
</script>