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
    <h1 class="page-title">Pengeluaran Barang (REALISASI)</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Beranda</a></li>
      <li><a href="<?php echo base_url('PengeluaranRBB');?>">Pengeluaran Barang (REALISASI) </a></li>
      <li class="active">Tambah Data</li>
    </ol>
    <div class="page-header-actions">
      <a href="<?php echo base_url('PengeluaranRBB');?>" class="btn btn-sm btn-danger  btn-round">
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
              <h4 class="example-title">Tambah Data Pengeluaran Barang</h4>
              <p>
                **Isi kolom di bawah dengan benar.
              </p>
              <div class="example">
                <form class="form-horizontal" action="<?php echo base_url();?>PengeluaranRBB/add_action_realisasi" method="post" enctype="multipart/form-data">

                <input type="text" autocomplete="off" name="get_jml" id="get_jml" class="form-control" value="<?= $data_estimasi->jumlah; ?>" style="display: none;">
                <input type="text" name="count_loop" id="count_loop" value="<?= $count_real ?>" class="form-control" style="display: none;">
                <input type="text" autocomplete="off" name="id_barang_real" id="id_barang_real" class="form-control" value="<?= $notif->id_barang; ?>" style="display: none;">
                <input type="text" autocomplete="off" name="keterangan2" id="keterangan2" class="form-control" value="<?= $data_estimasi->id_barang; ?> - <?= $data_estimasi->nama_brg; ?>" style="display: none;">
                <input type="text" name="fileget" id="fileget" class="form-control" value="<?= $data_estimasi->file; ?>" style="display: none;">
                <input type="text" autocomplete="off" name="tgl_transaksi" id="tgl_transaksi" class="form-control" value="<?= $data_estimasi->tgl_transaksi; ?>" style="display: none;">
                <input type="text" autocomplete="off" name="no_transaksi" id="no_transaksi" class="form-control" value="<?= $data_estimasi->no_transaksi; ?>" style="display: none;">
                <input type="text" autocomplete="off" name="terminal_real" id="terminal_real" class="form-control" value="<?= $terminal->id_terminal; ?>" style="display: none;">
                <input type="text" autocomplete="off" name="sat_real" id="sat_real" class="form-control" value="<?= $data_estimasi->id_satuan; ?>" style="display: none;">
                <input type="text" autocomplete="off" name="id_bm" id="id_bm" class="form-control" value="<?= $data_estimasi->id_bk ?>" style="display: none;">
                <input type="text" autocomplete="off" name="totalhasil2" id="totalhasil2" class="form-control" value="" style="display: none;">
                <input type="text" autocomplete="off" name="totalhasil" id="totalhasil" class="form-control" value="" style="display: none;">

                <div class="form-group">
                    <label class="col-sm-2 control-label"  style="font-family: Arial;">No PO : </label>
                    <div class="col-sm-4">
                      <input type="text" autocomplete="off" placeholder="No PO"  name="po_number" class="form-control box-shadow" value="<?= $data_estimasi->po_number ?>">
                    </div>
                    <label class="col-sm-2 control-label"  style="font-family: Arial;">Pengeluaran Kargo:</label>
                      <div class="col-sm-4">
                        <input type="datetime-local" autocomplete="off" placeholder="" name="pengeluaran_kargo_tgl" class="form-control box-shadow"  value="<?= $data_estimasi->pengeluaran_kargo_tgl ?>">
                      </div>
                      <!-- <div class="col-sm-2">
                        <input type="time" name="pengeluaran_kargo_time" class="form-control" placeholder="" value="<?= $data_estimasi->pengeluaran_kargo_time ?>">
                      </div>   -->
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"  style="font-family: Arial;">Jenis Keluar : </label>
                    <div class="col-sm-4">
                      <select data-plugin="select2" name='jenis_keluar' id="jenis_keluar" class="form-control box-shadow">
                        <option> Pilih Jenis Keluar </option>
                                    <?php

                                    foreach($jenis as $value)
                                        {   ?>
                                         <option value="<?= $value->id_jenis ?>" <?= ($data_estimasi->jenis_keluar == $value->id_jenis) ? 'selected' : '';?> ><?= $value->jenis  ?></option>
                                     <?php }
                                     ?>

                      </select>
                    </div>
                    <label class="col-sm-2 control-label"  style="font-family: Arial;">Jenis Dokumen : </label>
                    <div class="col-sm-4">
                      <select data-plugin="select2" name='jenis_doc' id="jenis_doc" class="form-control box-shadow">
                         <!-- <option value=''>None</option>-->
                         <option> Pilih Jenis Dokumen </option>
                                    <?php

                                    foreach($dokumen as $value)
                                        {   ?>
                                         <option value="<?= $value->id_dokumen ?>" <?= ($data_estimasi->jenis_doc == $value->id_dokumen) ? 'selected' : '';?> ><?= $value->dokumen  ?></option>
                                     <?php }
                                     ?>

                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"  style="font-family: Arial;">Bukti Pengeluaran : </label>
                    <div class="col-sm-4">
                      <input type="text" autocomplete="off" placeholder="Bukti Penerimaan"  name="no_bukti_penerimaan" class="form-control box-shadow" value="<?= $data_estimasi->no_bukti_pengeluaran ?>">
                    </div>
                    <label class="col-sm-2 control-label"  style="font-family: Arial;">No Dokumen : </label>
                    <div class="col-sm-4">
                      <input type="text" autocomplete="off" placeholder="No Dokumen"  name="no_dokumen_pabean" class="form-control box-shadow" value="<?= $data_estimasi->no_dokumen_pabean ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"  style="font-family: Arial;">Penerima Barang : </label>
                    <div class="col-sm-4">
                      <input type="text" autocomplete="off" placeholder="Nama Pengirim Barang"  name="pengirim_barang" class="form-control box-shadow" value="<?= $data_estimasi->pembeli_penerima ?>">
                      <!-- <select data-plugin="select2" name='pengirim_barang' id="pengirim_barang" class="form-control">
                        <option> Pilih pengirim </option>
                                    <?php

                                    foreach($client as $value)
                                        {   ?>
                                         <option value="<?= $value->id_client ?>-<?= $value->company_name  ?>" <?= ($data_estimasi->pembeli_penerima == $value->company_name) ? 'selected' : '';?> ><?= $value->company_name  ?></option>
                                     <?php }
                                     ?>

                      </select> -->
                    </div>
                    <label class="col-sm-2 control-label" style="font-family: Arial;">Tanggal Dokumen : </label>
                  <div class="col-sm-4">
                    <input type="date" id="tgl_dokumen_pabean" name="tgl_dokumen_pabean" class="form-control box-shadow" placeholder="Tanggal Dokumen" value="">
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
                    <label class="col-sm-2 control-label"  style="font-family: Arial;">File : </label>
                      <div class="col-sm-4">
                        <input class="form-control box-shadow" id="file" name="file" type="file">
                        <span style="color: red;font-size: 10px;">* Masukan Dokumen & lampirannya dalam Bentuk Format pdf / image.</span>
                      </div>
                      <label class="col-sm-2 control-label">Negara Asal Barang : </label>
                  <div class="col-sm-4">
                    <select data-plugin="select2" name='negara_asal' id="" class="form-control box-shadow">
                      <option value="0">-- Pilih Negara Asal Barang --</option>
                      <?php
                      foreach ($bendera  as $value) {   ?>
                        <option value="<?= $value->id_negara_asal ?>"><?= $value->nama_negara  ?></option>
                      <?php }
                      ?>
                    </select>
                  </div>
                  </div>
                  <?php if($data_estimasi->file != ""){ ?>
                        <div class="form-group">
                          <label class="col-sm-2 control-label"  style="font-family: Arial;">File Estimasi : </label>
                          <div class="col-sm-4">
                              <a href="https://app.asinusa.co.id/sip/uploads/<?= $data_estimasi->file ?>" class="btn btn-sm btn-primary" style="align:center;" target="_blank"><i class="fa fa-folder-open-o"></i>  Cek File</a>
                          </div>
                      </div>
                  <?php } ?>
                   <br>
                <h2>Data Estimasi</h2>
                <table width="100%" style="margin-top: 10px;" class="table table-hover table-bordered dataTable table-striped width-full overf">
                <thead>
                  <tr style="text-align: center;">
                    <td class="JudulHeadr" style="padding-left: 5px; width: 14%; border-bottom: 1px solid black;">Tank</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 14%; border-bottom: 1px solid black;">Qty</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 14%; border-bottom: 1px solid black;">Mata Uang</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 14%; border-bottom: 1px solid black;">Harga</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 14%; border-bottom: 1px solid black;">Total</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 14%; border-bottom: 1px solid black;">Biaya Kurs</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 14%; border-bottom: 1px solid black;">Calculate Biaya Kurs (covertion price)</td>
                   <!--  <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Bulan</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Tahun</td> -->
                  </tr>
                </thead>
                <tbody id="myTablePK" >
                    <?php
                      $no = 1;
                      foreach ($data_estimasi_result as $value_result) :
                        ?>
                  <!-- <input type="text" name="keterangan" style="display: none;" value="<?= $notif->id_barang; ?>">
                          <input type="text" name="qty" style="display: none;" value="<?= $notif->id_satuan; ?>">
                          <input type="text" name="terminal" style="display: none;" value="<?= $terminal2->id_terminal; ?>"> -->
                    <tr style="text-align: center;">
                      <td>
                        <select data-plugin="select2" id="tank_get<?= $no ?>" name="tank_get<?= $no ?>" class="form-control" disabled="disabled">
                          <option value="">Pilih</option>
                          <?php
                            foreach ($tank2 as $value) {
                          ?>
                            <option value="<?php echo $value->tank; ?>" <?= ($value_result->terminal_tank == $value->tank) ? 'selected' : '';?> ><?php echo $value->nama_tangki_alias; ?></option>
                          <?php } ?>

                        </select>
                      </td>
                      <td><input type="text" autocomplete="off" id="qty_get<?= $no ?>" name="qty_get<?= $no ?>" class="form-control" value="<?= number_format($value_result->jumlah, 0, ".", ""); ?>" readonly="readonly"></td>
                      <td>
                        <select data-plugin="select2" id="kurs_get<?= $no ?>" name="kurs_get<?= $no ?>" class="form-control classCur" disabled="disabled">
                          <option value="">Pilih</option>
                          <?php
                            foreach ($kurs as $value) {
                          ?>
                            <option value="<?php echo $value->id_kurs; ?>" <?= ($value_result->id_mata_uang == $value->id_kurs) ? 'selected' : '';?> ><?php echo $value->mata_uang; ?></option>
                          <?php } ?>
                        </select>
                      </td>
                      <td><input type="text" id="harga_satuan_get<?= $no ?>" name="harga_satuan_get<?= $no ?>" class="form-control" value="<?= number_format($value_result->harga, 0, ".", ""); ?>" disabled="disabled"></td>
                      <td><input type="text" autocomplete="off" id="hasil_get_show<?= $no ?>" value="<?= number_format($value_result->nilai_barang, 2, ",", "."); ?>" name="hasil_get_show<?= $no ?>" class="form-control" readonly="readonly" disabled="disabled"><input type="text" autocomplete="off" id="hasil_get<?= $no ?>" name="hasil_get<?= $no ?>" value="<?= $value_result->nilai_barang ?>" class="form-control" style="display: none;" value="" ></td>
                      <td><input type="text" autocomplete="off" id="hasil_get_show<?= $no ?>" value="<?= number_format($value_result->biaya_kurs, 2, ",", "."); ?>" name="hasil_get_show<?= $no ?>" class="form-control" readonly="readonly" disabled="disabled"><input type="text" autocomplete="off" id="hasil_get<?= $no ?>" name="hasil_get<?= $no ?>" value="<?= $value_result->nilai_barang ?>" class="form-control" style="display: none;" value="" ></td>
                      <td><input type="text" autocomplete="off" id="hasil_get_show<?= $no ?>" value="<?= number_format($value_result->total_calculate, 2, ",", "."); ?>" name="hasil_get_show<?= $no ?>" class="form-control" readonly="readonly" disabled="disabled"><input type="text" autocomplete="off" id="hasil_get<?= $no ?>" name="hasil_get<?= $no ?>" value="<?= $value_result->nilai_barang ?>" class="form-control" style="display: none;" value="" ></td>
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
                 <table width="100%" style="margin-top: 10px;" class="table table-striped">
                  <thead>
                    <tr style="text-align: center;">
                      <td class="JudulHeadr" style="padding-left: 5px; width: 14%; border-bottom: 1px solid black;">Tank</td>
                      <td class="JudulHeadr" style="padding-left: 5px; width: 14%; border-bottom: 1px solid black;">Qty</td>
                      <td class="JudulHeadr" style="padding-left: 5px; width: 14%; border-bottom: 1px solid black;">Mata Uang</td>
                      <td class="JudulHeadr" style="padding-left: 5px; width: 14%; border-bottom: 1px solid black;">Harga</td>
                      <td class="JudulHeadr" style="padding-left: 5px; width: 14%; border-bottom: 1px solid black;">Total</td>
                      <td class="JudulHeadr" style="padding-left: 5px; width: 14%; border-bottom: 1px solid black;">Biaya Kurs</td>
                      <td class="JudulHeadr" style="padding-left: 5px; width: 14%; border-bottom: 1px solid black;">Calculate Biaya Kurs (covertion price)</td>
                     <!--  <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Bulan</td>
                      <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Tahun</td> -->
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
                    <!-- <input type="text" name="keterangan" style="display: none;" value="<?= $notif->id_barang; ?>">
                            <input type="text" name="qty" style="display: none;" value="<?= $notif->id_satuan; ?>">
                            <input type="text" name="terminal" style="display: none;" value="<?= $terminal2->id_terminal; ?>"> -->
                      <tr style="text-align: center;">
                        <td>
                          <select data-plugin="select2" id="tank_real<?= $no ?>" name="tank_real<?= $no ?>" class="form-control" >
                            <option value="">Pilih</option>
                            <?php
                              foreach ($tank2 as $value) {
                            ?>
                              <option value="<?php echo $value->tank; ?>" <?= ($value_result->terminal_tank == $value->tank) ? 'selected' : '';?> ><?php echo $value->nama_tangki_alias; ?></option>
                            <?php } ?>

                          </select>
                        </td>
                        <td><input type="text" autocomplete="off" id="qty_real<?= $no ?>" name="qty_real<?= $no ?>" class="form-control classQty" value="<?= number_format($value_result->jumlah, 0, ".", ""); ?>" onkeyup="myFunctionKeyup(<?= $no ?>)"><span style="color:red;">Selisih qty :<p id="selisihqty<?= $no ?>">0</p> </span></td>
                        <td>
                          <select data-plugin="select2" id="kurs_real<?= $no ?>" name="kurs_real<?= $no ?>" class="form-control classCur" >
                            <option value="">Pilih</option>
                            <?php
                              foreach ($kurs as $value) {
                                
                            ?>
                              <option value="<?php echo $value->id_kurs; ?>" <?= ($value_result->id_mata_uang == $value->id_kurs) ? 'selected' : '';?> ><?php echo $value->mata_uang; ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td><input type="text" id="harga_satuan_real<?= $no ?>" name="harga_satuan_real<?= $no ?>" class="form-control classHarga" value="<?= number_format($value_result->harga, 0, ".", ""); ?>" onkeyup="myFunctionKeyup(<?= $no ?>)"></td>
                        <td><input type="text" autocomplete="off" id="hasil_real_show<?= $no ?>" value="<?= number_format($value_result->nilai_barang, 2, ",", "."); ?>" name="hasil_real_show<?= $no ?>" class="form-control classTotalHarga" readonly="readonly" ><input type="text" autocomplete="off" id="hasil_real<?= $no ?>" name="hasil_real<?= $no ?>" value="<?= $value_result->nilai_barang ?>" style="display: none;"></td>
                        <td><input type="text" autocomplete="off" id="biaya_kurs_real<?= $no ?>" value="<?= number_format($value_result->biaya_kurs, 2, ",", "."); ?>" name="biaya_kurs_real<?= $no ?>" class="form-control classBiayaKurs" onkeyup="myFunctionKeyupKurs(<?= $no ?>)"><a href="https://www.bi.go.id/id/statistik/informasi-kurs/transaksi-bi/default.aspx" target="_blank"> Cek Nilai Biaya Kurs</a></td>
                        <td><input type="text" autocomplete="off" id="total_calculate<?= $no ?>" value="<?= number_format($value_result->total_calculate, 2, ",", "."); ?>" name="total_calculate<?= $no ?>" class="form-control classTotalBiayaKurs" readonly="readonly" ><input type="text" autocomplete="off" id="hasil_get<?= $no ?>" name="hasil_get<?= $no ?>" value="<?= $value_result->nilai_barang ?>" class="form-control" style="display: none;" value="" ></td>
                     </tr>
                     <input style="display: none;" type="text" value="<?= $no++ ?>">
                     <?php

                        endforeach;
                        ?>
                  </tbody>
                  <tfoot>
                       <tr style="text-align: center;">
                        <td class="JudulHeadr" style="padding-left: 5px; width: 14%;">Total</td>
                        <td class="JudulHeadr" style="padding-left: 5px; width: 14%;"><input type="text" id="totalshowqty" class="form-control" value="<?= $sumTotalLoopQty ?>"></td>
                        <td class="JudulHeadr" style="padding-left: 5px; width: 14%;"></td>
                        <td class="JudulHeadr" style="padding-left: 5px; width: 14%;"><input type="text" id="totalshowharga" class="form-control" value="<?= number_format($sumTotalLoopHarga, 2, ",", "."); ?>"></td>
                        <td class="JudulHeadr" style="padding-left: 5px; width: 14%;"><input type="text" id="totalshowTH" class="form-control" value="<?= number_format($sumTotalLoopTH, 2, ",", "."); ?>"></td>
                        <td class="JudulHeadr" style="padding-left: 5px; width: 14%;"><input type="text" id="totalshowBK" class="form-control" value="<?= number_format($sumTotalLoopBK, 2, ",", "."); ?>"></td>
                        <td class="JudulHeadr" style="padding-left: 5px; width: 14%;"><input type="text" id="totalshowCBK" class="form-control" value="<?= number_format($sumTotalLoopCBK, 2, ",", "."); ?>"></td>
                       <!--  <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Bulan</td>
                        <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Tahun</td> -->
                    </tr>
                  </tfoot>
                </table>

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
<script src="<?php echo base_URL()?>jquery.js"></script>
<script type="text/javascript">

      $(function () {
          
      })

      String.prototype.number_format = function(d) {
            var n = this;
            var c = isNaN(d = Math.abs(d)) ? 2 : d;
            var s = n < 0 ? "-" : "";
            var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
            return s + (j ? i.substr(0, j) + ',' : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + ',') + (c ? '.' + Math.abs(n - i).toFixed(c).slice(2) : "");
        }

        String.prototype.number_format2 = function(d) {
            var n = this;
            var c = isNaN(d = Math.abs(d)) ? 2 : d;
            var s = n < 0 ? "-" : "";
            var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
            return s + (j ? i.substr(0, j) + '.' : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + '.') + (c ? ',' + Math.abs(n - i).toFixed(c).slice(2) : "");
        }

        var qty_real            = document.getElementById('qty_real').value;
        var harga_satuan_real   = document.getElementById('harga_satuan_real');
        var hasil_real          = document.getElementById('hasil_real');
        var hasil_real_show     = document.getElementById('hasil_real_show');
        harga_satuan_real.addEventListener('keyup', function(e)
        {
          
            var result_real      = qty_real * this.value;
            let text = result_real.toString();
            hasil_real.value = result_real;
            hasil_real_show.value = text.number_format();
            // hasil_real.value = formatRupiah(result_real);
        });

        function myFunctionKeyup(rowid)
         { 
            var table = document.getElementById("myTablePK");
              
            var qty_real            = parseInt(document.getElementById("qty_real"+rowid).value);
            var qty_get             = parseInt(document.getElementById("qty_get"+rowid).value);

            var harga_satuan_real   = parseInt(document.getElementById("harga_satuan_real"+rowid).value);
            var hasil_real          = document.getElementById("hasil_real"+rowid);
            var hasil_real_show     = document.getElementById("hasil_real_show"+rowid);
            var result_real         = qty_real * harga_satuan_real;
            var selisih             = qty_get - qty_real;
            
            let text                = result_real.toString();
            hasil_real.value        = result_real;
            hasil_real_show.value   = text.number_format2();

            var calculated_total_sum_qty = 0;
              $("#myTablePK .classQty").each(function (){
                  var get_textbox_value = $(this).val().replace(",", "");
                  calculated_total_sum_qty += parseFloat(get_textbox_value);    
              });
            
            var calculated_total_sum_harga = 0;
              $("#myTablePK .classHarga").each(function (){
                  var get_textbox_value = $(this).val().replace(".", "");
                  var get_textbox_value = get_textbox_value.replace(",", ".");
                  calculated_total_sum_harga += parseFloat(get_textbox_value);    
              });

            var calculated_total_sum_total_harga = 0;
              $("#myTablePK .classTotalHarga").each(function (){
                  var get_textbox_value = $(this).val().replace(".", "");
                  var get_textbox_value = get_textbox_value.replace(".", "");
                  var get_textbox_value = get_textbox_value.replace(".", "");
                  var get_textbox_value = get_textbox_value.replace(",", ".");
                  calculated_total_sum_total_harga += parseFloat(get_textbox_value);    
              });

            var calculated_total_sum_biaya_kurs = 0;
              $("#myTablePK .classBiayaKurs").each(function (){
                  var get_textbox_value = $(this).val().replace(".", "");
                  var get_textbox_value = get_textbox_value.replace(".", "");
                  var get_textbox_value = get_textbox_value.replace(".", "");
                  var get_textbox_value = get_textbox_value.replace(",", ".");
                  calculated_total_sum_biaya_kurs += parseFloat(get_textbox_value);    
              });

            var calculated_total_sum_total_biaya_kurs = 0;
              $("#myTablePK .classTotalBiayaKurs").each(function (){
                  var get_textbox_value = $(this).val().replace(".", "");
                  var get_textbox_value = get_textbox_value.replace(".", "");
                  var get_textbox_value = get_textbox_value.replace(".", "");
                  var get_textbox_value = get_textbox_value.replace(",", ".");
                  calculated_total_sum_total_biaya_kurs += parseFloat(get_textbox_value);    
              });      
            
            document.getElementById("selisihqty"+rowid).innerHTML = selisih;
            document.getElementById("totalshowqty").value = calculated_total_sum_qty;
            document.getElementById("totalshowharga").value = calculated_total_sum_harga.toString().number_format2();
            document.getElementById("totalshowTH").value = calculated_total_sum_total_harga.toString().number_format2();
            document.getElementById("totalshowBK").value = calculated_total_sum_biaya_kurs.toString().number_format2();
            document.getElementById("totalshowCBK").value = calculated_total_sum_total_biaya_kurs.toString().number_format2();
         }

        function myFunctionKeyupKurs(rowid)
         { 

            var hasil_real   = document.getElementById("hasil_real"+rowid).value;
            var biaya_kurs   = document.getElementById("biaya_kurs_real"+rowid).value;
            var get_textbox_valuer1 = biaya_kurs.replace(".", "");
            var get_textbox_valuer2 = get_textbox_valuer1.replace(",", ".");
            var calculate    = hasil_real * get_textbox_valuer2;
            var hasilcalculate = calculate.toString().number_format2();
            document.getElementById("total_calculate"+rowid).value = hasilcalculate;

            var table = document.getElementById("myTablePK");
            
            var calculated_total_sum_total_biaya_kurs = 0;
              $("#myTablePK .classTotalBiayaKurs").each(function (){
                  var get_textbox_value = $(this).val().replace(".", "");
                  var get_textbox_value = get_textbox_value.replace(".", "");
                  var get_textbox_value = get_textbox_value.replace(".", "");
                  var get_textbox_value = get_textbox_value.replace(",", ".");
                  calculated_total_sum_total_biaya_kurs += parseFloat(get_textbox_value);    
              });
            document.getElementById("totalshowCBK").value = calculated_total_sum_total_biaya_kurs.toString().number_format2();
         }


</script>