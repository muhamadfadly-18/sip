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
    .table-container {
      width: 100%;
      overflow-x: auto;
    }

    .modal-content {
      width: 1200px !important;
      max-width: 100%;
      margin: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    td,
    td {
      padding: 8px;
      text-align: center;
    }

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
    <h1 class="page-title">Pengeluaran Barang (PLAN)</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>">Beranda</a></li>
      <li><a href="<?php echo base_url('PengeluaranRBB'); ?>">Pengeluaran Barang (PLAN) </a></li>
      <li class="active">Tambah Data</li>
    </ol>
    <div class="page-header-actions">
      <a href="<?php echo base_url('PengeluaranRBB'); ?>" class="btn btn-sm btn-danger  btn-round">
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
              <form class="form-horizontal" action="<?php echo base_url(); ?>PengeluaranRBB/add_action" method="post" enctype="multipart/form-data">

                <input type="text" autocomplete="off" name="get_jml" id="get_jml" class="form-control" value="" style="display: none;">
                <input type="text" autocomplete="off" name="id_barang_real" id="id_barang_real" class="form-control" value="" style="display: none;">
                <input type="text" autocomplete="off" name="keterangan2" id="keterangan2" class="form-control" value="" style="display: none;">
                <input type="text" autocomplete="off" name="terminal_real" id="terminal_real" class="form-control" value="" style="display: none;">
                <input type="text" autocomplete="off" name="sat_real" id="sat_real" class="form-control" value="" style="display: none;">
                <input type="text" autocomplete="off" name="id_bm" id="id_bm" class="form-control" value="" style="display: none;">
                <input type="text" autocomplete="off" name="totalhasil2" id="totalhasil2" class="form-control" value="" style="display: none;">
                <input type="text" autocomplete="off" name="totalhasil" id="totalhasil" class="form-control" value="" style="display: none;">

                <div class="form-group">
                  <label class="col-sm-2 control-label" style="font-family: Arial;">No PO : </label>
                  <div class="col-sm-4">
                    <input type="text" autocomplete="off" placeholder="No PO" name="po_number" class="form-control box-shadow">
                  </div>
                  <label class="col-sm-2 control-label" style="font-family: Arial;">Pengeluaran Kargo : </label>
                  <div class="col-sm-4">
                    <input type="datetime-local" id="pengeluaran_kargo_tgl" autocomplete="off" placeholder="" name="pengeluaran_kargo_tgl" class="form-control box-shadow">
                  </div>

                  <script>
                  $(function() {
                    if (!Modernizr.inputtypes['datetime-local']) {
                      $('input[type=date]').datepicker({
                        dateFormat: "mm-dd-yy"
                      })
                    }
                  });
                </script>

                  <!-- <div class="col-sm-2">
                    <input type="time" name="pengeluaran_kargo_time" class="form-control" placeholder="" >
                  </div> -->
                </div>
                <div class="form-group">
                  <!-- <label class="col-sm-2 control-label">No/Tgl. Transaksi : </label>
                  <div class="col-sm-2">
                    <input type="text" autocomplete="off" placeholder="No/Tgl. Transaksi"  name="no_transaksi" class="form-control" value="<?= $kodetrx ?>" readonly>
                  </div>
                  <div class="col-sm-2">
                    <input type="date" name="tgl_transaksi" class="form-control" placeholder="Tanggal Transaksi" value="<?= date('Y-m-d'); ?>" value="<?= date('Y-m-d'); ?>">
                  </div> -->
                  <label class="col-sm-2 control-label" style="font-family: Arial;">Jenis Keluar : </label>
                  <div class="col-sm-4">
                    <select data-plugin="select2" name='jenis_keluar' id="jenis_keluar" class="form-control box-shadow">
                      <option> Pilih Jenis Keluar </option>
                      <?php

                      foreach ($jenis as $value) {   ?>
                        <option value="<?= $value->id_jenis ?>"><?= $value->jenis  ?></option>
                      <?php }
                      ?>

                    </select>
                  </div>
                  <label class="col-sm-2 control-label" style="font-family: Arial;">Jenis Dokumen : </label>
                  <div class="col-sm-4">
                    <select data-plugin="select2" name='jenis_doc' id="jenis_doc" class="form-control box-shadow">
                      <!-- <option value=''>None</option>-->
                      <option> Pilih Jenis Dokumen </option>
                      <?php

                      foreach ($dokumen as $value) {   ?>
                        <option value="<?= $value->id_dokumen ?>"><?= $value->dokumen  ?></option>
                      <?php }
                      ?>

                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" style="font-family: Arial;">Bukti Pengeluaran : </label>
                  <div class="col-sm-4">
                    <input type="text" autocomplete="off" placeholder="Bukti Penerimaan" name="no_bukti_penerimaan" class="form-control box-shadow">
                  </div>
                  <label class="col-sm-2 control-label" style="font-family: Arial;">No Dokumen : </label>
                  <div class="col-sm-4">
                    <input type="text" autocomplete="off" placeholder="No Dokumen" name="no_dokumen_pabean" class="form-control box-shadow" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" style="font-family: Arial;">Penerima Barang : </label>
                  <div class="col-sm-4">
                    <input type="text" autocomplete="off" placeholder="Nama Pengirim Barang" name="pengirim_barang" class="form-control box-shadow">
                    <!-- <select data-plugin="select2" name='pengirim_barang' id="pengirim_barang" class="form-control">
                      <option> Pilih pengirim </option>
                                  <?php

                                  foreach ($client as $value) {   ?>
                                       <option value="<?= $value->id_client ?>-<?= $value->company_name  ?>" ><?= $value->company_name  ?></option>
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
                  <label class="col-sm-2 control-label">File : </label>
                  <div class="col-sm-4">
                    <input class="form-control box-shadow" id="file" name="file" type="file">
                    <span style="color: red;font-size: 10px;">* Masukan Dokumen Pabean & lampirannya dalam Bentuk Format pdf / image.</span>
                  </div>
                  <label class="col-sm-2 control-label">Negara Asal Barang : </label>
                  <div class="col-sm-4">
                    <select data-plugin="select2" name='countries' id="" class="form-control box-shadow">
                      <option value="0">-- Pilih Negara Asal Barang --</option>
                      <?php
                      foreach ($bendera  as $value) {   ?>
                        <option value="<?= $value->id_negara_asal ?>"><?= $value->nama_negara  ?></option>
                      <?php }
                      ?>
                    </select>
                  </div>

                </div>
                <br>
                <div class="col-md-12 mb-3 table-container">
                  <table id="" class="table table-hover table-bordered dataTable table-striped width-full overf">
                    <thead>
                      <tr style="text-align: center;">
                        <td style=" border-bottom: 1px solid black;">
                          <a class="btn btn-primary addRowPK" onclick="addPK()"><i class="fa fa-plus" aria-hidden="true"></i></a>
                        </td>
                        <td class="JudulHeadr" style="padding-left: 5px; min-width: 150px; border-bottom: 1px solid black;">Barang</td>
                        <td class="JudulHeadr" style="padding-left: 5px; min-width: 150px; border-bottom: 1px solid black;">Tank</td>
                        <td class="JudulHeadr" style="padding-left: 5px; min-width: 150px; border-bottom: 1px solid black;">Qty</td>
                        <td class="JudulHeadr" style="padding-left: 5px; min-width: 150px; border-bottom: 1px solid black;">Mata Uang</td>
                        <td class="JudulHeadr" style="padding-left: 5px; min-width: 150px; border-bottom: 1px solid black;">Harga Satuan Barang (origin price)</td>
                        <td class="JudulHeadr" style="padding-left: 5px; min-width: 150px; border-bottom: 1px solid black;">Total Nilai Barang (origin price)</td>
                        <td class="JudulHeadr" style="padding-left: 5px; min-width: 150px; border-bottom: 1px solid black;">Biaya Kurs</td>
                        <td class="JudulHeadr" style="padding-left: 5px; min-width: 150px; border-bottom: 1px solid black;">Calculate Biaya Kurs (covertion price)</td>
                        <!--  <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Bulan</td>
                  <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Tahun</td> -->
                      </tr>
                    </thead>
                    <tbody id="myTablePK">
                      <!-- <input type="text" name="keterangan" style="display: none;" value="">
                        <input type="text" name="qty" style="display: none;" value="">
                        <input type="text" name="terminal" style="display: none;" value=""> -->
                      <!-- <tr style="text-align: center;">
                    <td><input type="text" autocomplete="off" name="" class="form-control" readonly="readonly" value=""><input type="text" autocomplete="off" id="qty_real" name="qty_real" class="form-control" readonly="readonly" value="" style="display: none;"></td>
                    <td>
                      <select data-plugin="select2" id="tank_real" name="tank_real" class="form-control" >
                        <option value="">Pilih</option>
                        <?php
                        foreach ($tank2 as $value) {
                        ?>
                          <option value="<?php echo $value->tank; ?>"><?php echo $value->tank; ?></option>
                        <?php } ?>

                      </select>
                    </td>
                    <td>
                      <select data-plugin="select2" id="kurs_real" name="kurs_real" class="form-control classCur" >
                        <option value="">Pilih</option>
                        <?php
                        foreach ($kurs as $value) {
                        ?>
                          <option value="<?php echo $value->id_kurs; ?>"><?php echo $value->mata_uang; ?></option>
                        <?php } ?>
                      </select>
                    </td>
                    <td><input type="text" id="harga_satuan_real" name="harga_satuan_real" class="form-control"></td>
                    <td><input type="text" autocomplete="off" id="hasil_real_show" name="hasil_real_show" class="form-control" readonly="readonly"><input type="text" autocomplete="off" id="hasil_real" name="hasil_real" class="form-control" style="display: none;"></td>
                 </tr> -->
                    </tbody>
                    <tfoot>
                      <tr style="text-align: center;">
                        <td class="JudulHeadr" style="padding-left: 5px;"></td>
                        <td class="JudulHeadr" style="padding-left: 5px; ">Total</td>
                        <td class="JudulHeadr" style="padding-left: 5px;"></td>
                        <td class="JudulHeadr" style="padding-left: 5px; "><input type="text" id="totalshowqty" class="form-control" value="0"></td>
                        <td class="JudulHeadr" style="padding-left: 5px; "></td>
                        <td class="JudulHeadr" style="padding-left: 5px; "><input type="text" id="totalshowharga" class="form-control" value="0"></td>
                        <td class="JudulHeadr" style="padding-left: 5px; "><input type="text" id="totalshowTH" class="form-control" value="0"></td>
                        <td class="JudulHeadr" style="padding-left: 5px; "><input type="text" id="totalshowBK" class="form-control" value="0"></td>
                        <td class="JudulHeadr" style="padding-left: 5px; "><input type="text" id="totalshowCBK" class="form-control" value="0"></td>
                        <!--  <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Bulan</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Tahun</td> -->
                      </tr>
                    </tfoot>
                    <div id="dataLimitPK"></div>
                    <input type="text" placeholder="Total Qty" id="totalhasil3" class="form-control" value="0" readonly style="display: none;">

                  </table>
                </div>

                <div class="form-group">
                  <div class="col-sm-8" style="margin-top:10px">
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
    var cell8 = row.insertCell(7);
    var cell9 = row.insertCell(8);


    for (var a = 0; a <= table.rows.length; a++) {
      $('#dataLimitPK').empty();
      $('<input type="hidden" name="limit_pk" value="' + a + '" >').appendTo('#dataLimitPK');
    }


    j = a - 1;
    cell1.innerHTML = '<a href="javascript:void(0);" class="btn btn-sm btn-default" style="align:center;" onclick="deleteRowPK(this)"><i class="fa fa-remove"></i></a>';
    cell2.innerHTML = '<input type="text" class="form-control classBarang" class="form-control" id="barang' + a + '"  >';
    cell3.innerHTML = '<select id="tank' + a + '" name="" class="form-control classTank" style="width:100%;" >' +
      '<option value="">Pilih</option>' +
      <?php
      foreach ($tank2 as $value) {
      ?> '<option value="<?php echo $value->tank; ?>"><?php echo $value->nama_tangki_alias; ?></option>' +
      <?php } ?>

    '</select>';
    cell4.innerHTML = '<input type="text" class="form-control classQty" id="qty' + a + '" value="0" name="">';

    cell5.innerHTML = '<select id="cur' + a + '" class="form-control classCur selectX2" style="width:100%;">' +
      '<option value="">Pilih</option>' +
      <?php
      foreach ($kurs as $value) {
      ?> '<option value="<?php echo $value->id_kurs; ?>"><?php echo $value->mata_uang; ?></option>' +
      <?php } ?> '</select>';
    cell6.innerHTML = '<input type="text" class="form-control classHarga" style="width:100%;" class="form-control" id="harga' + a + '"  value="0"><input type="text" class="form-control classHargaUrutan" style="width:100%;display:none" class="form-control" id="urutan_diem" value="' + j + '">';
    cell7.innerHTML = '<input type="text" class="form-control classTotalShow" style="width:100%;" class="form-control" id="total_show' + a + '" readonly><input type="text" class="form-control classTotal" style="width:100%;display:none" class="form-control" id="total' + a + '" >';
    cell8.innerHTML = '<input type="text" value="0" class="form-control classBiayaKurs" id="biayakurs' + a + '" ><a href="https://www.bi.go.id/id/statistik/informasi-kurs/transaksi-bi/default.aspx" target="_blank"> Cek Nilai Biaya Kurs</a> ';
    cell9.innerHTML = '<input type="text" class="form-control classCalculateBiayaKursShow" id="calculatebiayakursshow' + a + '" ><input type="text" class="form-control classCalculateBiayaKurs" id="calculatebiayakurs' + a + '" style="width:100%;display:none">';

    var calculated_total_sum = 0;

    $("#myTablePK .classQty").each(function() {
      var get_textbox_value = $(this).val();
      if ($.isNumeric(get_textbox_value)) {
        calculated_total_sum += parseFloat(get_textbox_value);
        document.getElementById("totalhasil3").value = calculated_total_sum;

      }
    });

    String.prototype.number_format = function(d) {
      var n = this;
      var c = isNaN(d = Math.abs(d)) ? 2 : d;
      var s = n < 0 ? "-" : "";
      var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
        j = (j = i.length) > 3 ? j % 3 : 0;
      return s + (j ? i.substr(0, j) + ',' : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + ',') + (c ? '.' + Math.abs(n - i).toFixed(c).slice(2) : "");
    }
    String.prototype.number_format2 = function(d) {
      var n = this;
      var c = isNaN(d = Math.abs(d)) ? 2 : d;
      var s = n < 0 ? "-" : "";
      var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
        j = (j = i.length) > 3 ? j % 3 : 0;
      return s + (j ? i.substr(0, j) + '.' : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + '.') + (c ? ',' + Math.abs(n - i).toFixed(c).slice(2) : "");
    }


    $("tank" + a).change(function() { //GET CHANGE CALL
      alert("a");



    })

    $("#qty" + a).keyup(function() {

      // var a = Number(document.getElementById("totalhasil").value);
      // var urutan_diem = document.getElementById("urutan_diem").value;
      var qty_show = Number(document.getElementById("qty" + a).value);
      var harga_show = Number(document.getElementById("harga" + a).value);
      var getqty = Number(document.getElementById("totalhasil3").value);
      var calculate = qty_show + getqty;

      var result_real = qty_show * harga_show;
      let text = result_real.toString();
      document.getElementById("total_show" + a).value = text.number_format2();
      document.getElementById("total" + a).value = result_real;

      var total = result_real;
      var biayakurs = document.getElementById("biayakurs" + a).value;
      console.log(biayakurs);
      var text3 = biayakurs.replace('.', '');
      var text4 = text3.replace(',', '.');
      var calculatebiayakurs = total * text4;
      let textstring = calculatebiayakurs.toString();
      document.getElementById("calculatebiayakursshow" + a).value = textstring.number_format2();
      document.getElementById("calculatebiayakurs" + a).value = calculatebiayakurs;

      var calculated_total_sum_qty = 0;
      $("#myTablePK .classQty").each(function() {
        var get_textbox_value = $(this).val().replace(",", "");
        calculated_total_sum_qty += parseFloat(get_textbox_value);
      });

      var calculated_total_sum_total_harga = 0;
      $("#myTablePK .classTotal").each(function() {
        var get_textbox_value = $(this).val().replace(".", "");
        var get_textbox_value = get_textbox_value.replace(".", "");
        var get_textbox_value = get_textbox_value.replace(".", "");
        var get_textbox_value = get_textbox_value.replace(",", ".");
        calculated_total_sum_total_harga += parseFloat(get_textbox_value);
      });

      document.getElementById("totalshowqty").value = calculated_total_sum_qty || 0;
      document.getElementById("totalshowTH").value = (calculated_total_sum_total_harga || 0).toString().number_format2();


    });





    $("#harga" + a).keyup(function() {
      var qty = Number(document.getElementById("qty" + a).value);
      var harga = document.getElementById("harga" + a).value;

      // Replace non-digit characters and format with dots
      var formatted_harga = harga.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      $(this).val(formatted_harga);

      var result_real = qty * parseFloat(harga.replace(/\D/g, '') || 0);
      let text = result_real.toString();
      document.getElementById("total_show" + a).value = text.number_format2();
      document.getElementById("total" + a).value = result_real;

      var calculated_total_sum_harga = 0;
      $("#myTablePK .classHarga").each(function() {
        var get_textbox_value = $(this).val().replace(/\D/g, '');
        calculated_total_sum_harga += parseFloat(get_textbox_value || 0);
      });

      var calculated_total_sum_total_harga = 0;
      $("#myTablePK .classTotal").each(function() {
        var get_textbox_value = $(this).val().replace(/\D/g, '');
        calculated_total_sum_total_harga += parseFloat(get_textbox_value || 0);
      });

      document.getElementById("totalshowTH").value = (calculated_total_sum_total_harga || 0).toString().number_format2();
      document.getElementById("totalshowharga").value = (calculated_total_sum_harga || 0).toString().number_format2();

    });

    String.prototype.number_format2 = function(d) {
      var n = this,
        c = isNaN(d = Math.abs(d)) ? 2 : d,
        s = n < 0 ? "-" : "",
        i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
        j = (j = i.length) > 3 ? j % 3 : 0;
      return s + (j ? i.substr(0, j) + '.' : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + '.') + (c ? ',' + Math.abs(n - i).toFixed(c).slice(2) : "");
    };



    // Fungsi untuk menghitung biaya kurs
    function calculateBiayaKurs(a) {
      // Mengambil nilai total dan biaya kurs dari input
      var total = Number(document.getElementById("total" + a).value);
      var biayakurs = document.getElementById("biayakurs" + a).value;

      // Menghilangkan tanda titik sebagai pemisah ribuan, dan mengganti koma menjadi titik sebagai pemisah desimal
      var text = biayakurs.replace(/\./g, '').replace(',', '.');

      // Menghitung biaya kurs
      var calculatebiayakurs = total * parseFloat(text);

      // Memformat hasil biaya kurs dengan 2 desimal
      let textstring = calculatebiayakurs.toFixed(2);

      // Menampilkan hasil biaya kurs di input yang ditunjukkan kepada pengguna
      document.getElementById("calculatebiayakursshow" + a).value = textstring.number_format2();

      // Menyimpan hasil biaya kurs dalam input yang tersembunyi untuk keperluan pengiriman data
      document.getElementById("calculatebiayakurs" + a).value = calculatebiayakurs;

      // Menghitung total biaya kurs dari semua input biaya kurs
      var calculated_total_sum_biaya_kurs = 0;
      $("#myTablePK .classBiayaKurs").each(function() {
        var get_textbox_value = $(this).val().replace(/\./g, '').replace(',', '.');
        calculated_total_sum_biaya_kurs += parseFloat(get_textbox_value) || 0;
      });

      // Menghitung total biaya kurs dari semua input hasil biaya kurs yang ditampilkan
      var calculated_total_sum_total_biaya_kurs = 0;
      $("#myTablePK .classCalculateBiayaKursShow").each(function() {
        var get_textbox_value = $(this).val().replace(/\./g, '').replace(',', '.');
        calculated_total_sum_total_biaya_kurs += parseFloat(get_textbox_value) || 0;
      });

      // Menampilkan total biaya kurs ke dalam input yang sesuai
      document.getElementById("totalshowBK").value = calculated_total_sum_biaya_kurs.toFixed(2).number_format2();
      document.getElementById("totalshowCBK").value = calculated_total_sum_total_biaya_kurs.toFixed(2).number_format2();
    }

    // Memasang event listener untuk setiap input harga yang dimulai dengan "harga"
    $(document).on('keyup', '[id^=harga]', function() {
      var id = $(this).attr('id').replace(/^\D+/g, ''); // Mengambil angka dari ID
      calculateBiayaKurs(id); // Memanggil fungsi calculateBiayaKurs dengan ID yang sesuai
    });

    // Memasang event listener untuk setiap input biaya kurs yang dimulai dengan "biayakurs"
    $(document).on('keyup', '[id^=biayakurs]', function() {
      var id = $(this).attr('id').replace(/^\D+/g, ''); // Mengambil angka dari ID
      calculateBiayaKurs(id); // Memanggil fungsi calculateBiayaKurs dengan ID yang sesuai
    });

    // $(".selectX").select2({
    //   placeholder: "Select",
    //   allowClear: true
    // })

    // $(".selectX2").select2({
    //   placeholder: "Select",
    //   allowClear: true
    // })



    for (var i = 0; i <= table.rows.length; i++) {
      document.getElementsByClassName("classBarang")[i].name = "barang" + i;
      document.getElementsByClassName("classQty")[i].name = "qty" + i;
      document.getElementsByClassName("classTank")[i].name = "tank" + i;
      document.getElementsByClassName("classHarga")[i].name = "harga" + i;
      document.getElementsByClassName("classCur")[i].name = "cur" + i;
      document.getElementsByClassName("classTotal")[i].name = "total" + i;
      document.getElementsByClassName("classBiayaKurs")[i].name = "biayakurs" + i;
      document.getElementsByClassName("classCalculateBiayaKurs")[i].name = "calculatebiayakurs" + i;
    }



  }



  function deleteRowPK(btn) {
    var row = btn.parentNode.parentNode;
    var table = document.getElementById("myTablePK");
    var result = confirm("Are you sure to delete ?");

    $("#myTablePK .classQty").each(function() {
      var get_textbox_value = $(this).val();
      if ($.isNumeric(get_textbox_value)) {
        var getqty = Number(document.getElementById("totalhasil3").value);
        var calculate = getqty - parseFloat(get_textbox_value);
        document.getElementById("totalhasil3").value = calculate;

      }
    });

    if (row.parentNode.removeChild(row)) {
      for (var a = 0; a <= table.rows.length; a++) {
        $('#dataLimitPK').empty();
        $('<input type="hidden" name="limit_pk" value="' + a + '" >').appendTo('#dataLimitPK');
      }
      // for(var i=0; i<=table.rows.length; i++) {
      //   document.getElementsByClassName("classQty")[i].name = "qty"+i;
      //   document.getElementsByClassName("classTank")[i].name = "tank"+i;
      //   document.getElementsByClassName("classHarga")[i].name = "harga"+i;
      //   document.getElementsByClassName("classCur")[i].name = "cur"+i;
      //   document.getElementsByClassName("classTotal")[i].name = "total"+i;
      // }
    }
  }

  String.prototype.number_format = function(d) {
    var n = this;
    var c = isNaN(d = Math.abs(d)) ? 2 : d;
    var s = n < 0 ? "-" : "";
    var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
      j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + ',' : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + ',') + (c ? '.' + Math.abs(n - i).toFixed(c).slice(2) : "");
  }

  var qty_real = document.getElementById('qty_real').value;
  var harga_satuan_real = document.getElementById('harga_satuan_real');
  var hasil_real = document.getElementById('hasil_real');
  var hasil_real_show = document.getElementById('hasil_real_show');
  harga_satuan_real.addEventListener('keyup', function(e) {

    var result_real = qty_real * this.value;
    let text = result_real.toString();
    hasil_real.value = result_real;
    hasil_real_show.value = text.number_format();
    // hasil_real.value = formatRupiah(result_real);
  });
</script>