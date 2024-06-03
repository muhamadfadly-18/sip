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
            <h4 class="example-title">Tambah Data  Pemasukan / Penerimaan Barang</h4>
            <p>
              **Isi kolom di bawah dengan benar.
            </p>
            <div class="example">
              <form class="form-horizontal" action="<?php echo base_url(); ?>PemasukanRBB/add_action_realisasi" method="post" enctype="multipart/form-data">

                


                <div class="form-group">
                  <label class="col-sm-2 control-label">No PO : </label>
                  <div class="col-sm-4">
                    <!-- <input type="text" autocomplete="off" placeholder="No PO"  name="po_number" class="form-control"> -->
                    <input type="text" autocomplete="off" placeholder="No PO" name="po_number" class="form-control" value="<?= $data_estimasi->no_transaksi ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">No/Tgl. Transaksi : </label>
                  <div class="col-sm-2">
                    <input type="text" autocomplete="off" placeholder="No Transaksi" name="no_transaksi" class="form-control" value="<?= $data_estimasi->no_transaksi ?>" readonly>
                  </div>
                  <div class="col-sm-2">
                    <input type="date" name="tgl_transaksi" class="form-control" placeholder="Tanggal Transaksi" value="<?= date('Y-m-d', strtotime($data_estimasi->tgl_transaksi)); ?>">
                  </div>
                  <label class="col-sm-2 control-label">Jenis Dokumen Pabean : </label>
                  <div class="col-sm-4">
                    <select data-plugin="select2" name='jenis_doc' id="jenis_doc" class="form-control">
                      <!-- <option value=''>None</option>-->
                      <option value="0">-- Pilih Jenis Dokumen --</option>
                      <?php

                      foreach ($dokumen as $value) {   ?>
                        <option value="<?= $value->id_dokumen ?>" <?= ($data_estimasi->jenis_doc == $value->id_dokumen) ? 'selected' : '';?> ><?= $value->dokumen  ?></option>
                      <?php }
                      ?>

                    </select>
                    <span style="color: red;font-size: 10px;">* pilih Jenis Dokumen wajib di isi</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jenis Penerimaan : </label>
                  <div class="col-sm-4">
                    <select data-plugin="select2" name='jenis_pemasukan' id="jenis_pemasukan" class="form-control">
                      <option value="0">-- Pilih Jenis Penerimaan --</option>
                      <?php

                      foreach ($jenis as $value) {   ?>
                        <option value="<?= $value->id_jenis ?>" <?= ($data_estimasi->jenis_pemasukan == $value->id_jenis) ? 'selected' : '';?> ><?= $value->jenis  ?></option>
                      <?php }
                      ?>

                    </select>
                    <span style="color: red;font-size: 10px;">* pilih Jenis Pemasukan wajib di isi</span>
                  </div>
                  <label class="col-sm-2 control-label">No Dokumen : </label>
                  <div class="col-sm-4">
                    <input type="text" autocomplete="off" placeholder="No Dokumen Pabean" name="no_dokumen_pabean" class="form-control" value="<?= $dataGet->no_dokumen_pabean ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">No. Bukti Penerimaan / Delivery Order (DO) : </label>
                  <div class="col-sm-4">
                    <input type="text" autocomplete="off" placeholder="No. Bukti Penerimaan / Delivery Order (DO)" name="no_bukti_penerimaan" class="form-control" value="<?= $dataGet->no_bukti_penerimaan ?>">
                  </div>
                  <label class="col-sm-2 control-label">Tanggal Dokumen : </label>
                  <div class="col-sm-4">
                    <input type="date" name="tgl_dokumen_pabean" class="form-control" placeholder="Tanggal lahir" value="<?= $dataGet->tgl_dokumen_pabean ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Pengirim Barang : </label>
                  <div class="col-sm-4">
                    <input type="text" autocomplete="off" placeholder="Nama Pengirim Barang"  name="pengirim_barang" class="form-control" value="<?= $dataGet->id_client ?>">
                    <!-- <select data-plugin="select2" name='pengirim_barang' id="pengirim_barang" class="form-control">
                      <option value="0">-- Pilih pengirim --</option>
                      <?php

                      foreach ($client as $value) {   ?>
                        <option value="<?= $value->id_client ?>"><?= $value->company_name  ?></option>
                      <?php }
                      ?>

                    </select> -->
                    <span style="color: red;font-size: 10px;">* pilih Pengirim Barang wajib di isi</span>
                  </div>
                  <label class="col-sm-2 control-label">Negara Asal Barang : </label>
                  <div class="col-sm-4">
                   <select data-plugin="select2" name='countries' id="" class="form-control">
                                <option value="0">-- Pilih Negara Asal Barang --</option>
                                    <?php
                                        foreach($bendera  as $value)
                                    {   ?>
                                        <option value="<?= $value->id_negara_asal ?>" <?= ($data_estimasi->negara_asal == $value->id_negara_asal) ? 'selected' : '';?> ><?= $value->nama_negara  ?></option>
                                        <?php }
                                    ?>
                            </select>
                  </div>
                  
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">File : </label>
                  <div class="col-sm-4">
                    <input class="form-control" id="file" name="file" type="file">
                    <span style="color: red;font-size: 10px;">* Masukan Dokumen Pabean & lampirannya dalam Bentuk Format zip.</span>
                  </div>
                  <label class="col-sm-2 control-label">Nama Kapal : </label>
                  <div class="col-sm-4">
                    <input type="text" autocomplete="off" placeholder="Nama Kapal" name="nama_kapal" class="form-control" value="<?= $dataGet->nama_kapal ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">File Estimasi : </label>
                  <div class="col-sm-4">
                      <a href="https://app.asinusa.co.id/sip/uploads/<?= $dataGet->file ?>" class="btn btn-sm btn-primary" style="align:center;" target="_blank"><i class="fa fa-folder-open-o"></i>  Cek File</a>
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
                    <td class="JudulHeadr" style="padding-left: 5px; width: 17%; border-bottom: 1px solid black;">Qty</td>
                    <!-- <td class="JudulHeadr" style="padding-left: 5px; width: 14%; border-bottom: 1px solid black;">Satuan</td> -->
                    <!-- <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Lokasi Tujuan Terminal</td> -->
                    <td class="JudulHeadr" style="padding-left: 5px; width: 15%; border-bottom: 1px solid black;">Tank Penerimaan</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 15%; border-bottom: 1px solid black;">Mata Uang</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 17%; border-bottom: 1px solid black;">Harga Satuan Barang</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 17%; border-bottom: 1px solid black;">Total Nilai Barang</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 17%; border-bottom: 1px solid black;">Biaya Kurs</td>

                  </tr>

                </thead>
                <tbody id="myTablePK" >
                    <?php
                      $no = 1;
                      foreach ($data_estimasi_result as $value_result) :
                        ?>
                  <tr>
                      
                      <!-- <td><input type="text" autocomplete="off" name="" class="form-control" readonly="readonly" value="<?= $dataGet->id_barang ?>"></td> -->
                      <td><input type="text" readonly="readonly" onkeyup="myFunctionKeyup(<?= $no ?>)" autocomplete="off" id="qty_real<?= $no ?>" name="qty_real<?= $no ?>" class="form-control" value="<?= number_format($value_result->jumlah, 0, ".", ""); ?>" ></td>
                      <td>
                        <select id="tank_real<?= $no ?>" name="tank_real<?= $no ?>" class="form-control" style="width:100%;" disabled="disabled">
                          <option value="">Pilih</option>
                          <?php
                            foreach ($tank2 as $value) {
                          ?>
                            <option value="<?php echo $value->tank; ?>" <?= ($value_result->terminal_tank == $value->tank) ? 'selected' : '';?> ><?php echo $value->tank; ?></option>
                          <?php } ?>

                        </select>
                      </td>
                      <td>
                        <select id="kurs_real<?= $no ?>" name="kurs_real<?= $no ?>" class="form-control classCur" style="width:100%;" disabled="disabled">
                          <option value="">Pilih</option>
                          <?php
                            foreach ($kurs as $value) {
                          ?>
                            <option value="<?php echo $value->id_kurs; ?>" <?= ($value_result->id_mata_uang == $value->id_kurs) ? 'selected' : '';?> ><?php echo $value->mata_uang; ?></option>
                          <?php } ?>
                        </select>
                      </td>
                      <td><input type="text" id="harga_satuan_real<?= $no ?>" name="harga_satuan_real<?= $no ?>" class="form-control" onkeyup="myFunctionKeyup(<?= $no ?>)" value="<?= number_format($value_result->harga, 0, ".", ""); ?>" readonly="readonly"></td>
                      <td><input type="text" autocomplete="off" id="hasil_real_show<?= $no ?>" value="<?= number_format($value_result->nilai_barang, 2, ",", "."); ?>" name="hasil_real_show<?= $no ?>" class="form-control" readonly="readonly" ><input type="text" autocomplete="off" id="hasil_real<?= $no ?>" name="hasil_real<?= $no ?>" value="<?= $value_result->nilai_barang ?>" class="form-control" style="display: none;" value="" ></td>
                      <td><input type="text" id="harga_satuan_real<?= $no ?>" name="harga_satuan_real<?= $no ?>" class="form-control" onkeyup="myFunctionKeyup(<?= $no ?>)" value="<?= number_format($value_result->biaya_kurs, 2, ".", ""); ?>" readonly="readonly"></td>
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
                <h2>Data Relisasi</h2>
                <table width="100%" style="margin-top: 10px;" class="table table-hover table-bordered dataTable table-striped width-full overf">
                <thead>
                  <tr>
                    <!-- <td style="width: 1%; border-bottom: 1px solid black;">
                      <a  class="btn btn-primary addRowPK" onclick="addPK()"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </td> -->

                    <!-- <p>Qty Tidak Boleh Lebih Dari 50000</p> -->

                    <!-- <td class="JudulHeadr" style="padding-left: 5px; width: 19%; border-bottom: 1px solid black;">HS Code</td> -->
                    <td class="JudulHeadr" style="padding-left: 5px; width: 17%; border-bottom: 1px solid black;">Qty</td>
                    <!-- <td class="JudulHeadr" style="padding-left: 5px; width: 14%; border-bottom: 1px solid black;">Satuan</td> -->
                    <!-- <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Lokasi Tujuan Terminal</td> -->
                    <td class="JudulHeadr" style="padding-left: 5px; width: 15%; border-bottom: 1px solid black;">Tank Penerimaan</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 15%; border-bottom: 1px solid black;">Mata Uang</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 17%; border-bottom: 1px solid black;">Harga Satuan Barang</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 17%; border-bottom: 1px solid black;">Total Nilai Barang</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 17%; border-bottom: 1px solid black;">Biaya Kurs</td>
                  </tr>

                </thead>
                <tbody id="myTablePK" >
                    <?php
                      $no = 1;
                      foreach ($data_estimasi_result as $value_result) :
                        ?>
                  <tr>
                      
                      <!-- <td><input type="text" autocomplete="off" name="" class="form-control" readonly="readonly" value="<?= $dataGet->id_barang ?>"></td> -->
                      <td><input type="text" onkeyup="myFunctionKeyup(<?= $no ?>)" autocomplete="off" id="qty_real<?= $no ?>" name="qty_real<?= $no ?>" class="form-control" value="<?= number_format($value_result->jumlah, 0, ".", ""); ?>" ></td>
                      <td>
                        <select id="tank_real<?= $no ?>" name="tank_real<?= $no ?>" class="form-control" style="width:100%;">
                          <option value="">Pilih</option>
                          <?php
                            foreach ($tank2 as $value) {
                          ?>
                            <option value="<?php echo $value->tank; ?>" <?= ($value_result->terminal_tank == $value->tank) ? 'selected' : '';?> ><?php echo $value->tank; ?></option>
                          <?php } ?>

                        </select>
                      </td>
                      <td>
                        <select id="kurs_real<?= $no ?>" name="kurs_real<?= $no ?>" class="form-control classCur" style="width:100%;">
                          <option value="">Pilih</option>
                          <?php
                            foreach ($kurs as $value) {
                          ?>
                            <option value="<?php echo $value->id_kurs; ?>" <?= ($value_result->id_mata_uang == $value->id_kurs) ? 'selected' : '';?> ><?php echo $value->mata_uang; ?></option>
                          <?php } ?>
                        </select>
                      </td>
                      <td><input type="text" id="harga_satuan_real<?= $no ?>" name="harga_satuan_real<?= $no ?>" class="form-control" onkeyup="myFunctionKeyup(<?= $no ?>)" value="<?= number_format($value_result->harga, 0, ".", ""); ?>"></td>
                      <td><input type="text" autocomplete="off" id="hasil_real_show<?= $no ?>" value="<?= number_format($value_result->nilai_barang, 2, ",", "."); ?>" name="hasil_real_show<?= $no ?>" class="form-control" readonly="readonly" ><input type="text" autocomplete="off" id="hasil_real<?= $no ?>" name="hasil_real<?= $no ?>" value="<?= $value_result->nilai_barang ?>" class="form-control" style="display: none;" value="" ></td>
                      <td><input type="text" id="biaya_kurs_real<?= $no ?>" name="biaya_kurs_real<?= $no ?>" class="form-control" onkeyup="myFunctionKeyup(<?= $no ?>)" value="<?= number_format($value_result->biaya_kurs, 2, ".", ""); ?>"><a href="https://www.bi.go.id/id/statistik/informasi-kurs/transaksi-bi/default.aspx" target="_blank"> Cek Nilai Biaya Kurs</a></td>
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
              
                <!-- <div class="form-group">
                  <div class="col-sm-8">
                    <input class="btn btn-primary" type="submit" value="Simpan">
                    <button class="btn btn-default btn-outline" type="reset">Reset</button>
                  </div>
                </div> -->
                

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
    key = String.fromCharCode( key );
    var regex = /^[0-9.,]+$/;
    if( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
    }
  }

  function addPK() {
    var table         = document.getElementById("myTablePK");
    var row = table.insertRow(0);
    var getJml = document.getElementById("get_jml").value;

    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);
    var cell7 = row.insertCell(6);


    for(var a=0; a<=table.rows.length; a++) {
      $('#dataLimitPK').empty();
      $('<input type="hidden" name="limit_pk" value="'+ a +'" >').appendTo('#dataLimitPK');
    }

    j = a - 1;
    cell1.innerHTML = '<a href="javascript:void(0);" class="btn btn-sm btn-default" style="align:center;" onclick="deleteRowPK(this)"><i class="fa fa-remove"></i></a>';
    // cell1.innerHTML = '<input type="text" class="form-control classKeteranganBarang" style="width:100%;" class="form-control" value="<?= $data_estimasi->id_barang; ?> - <?= $data_estimasi->nama_brg; ?>" id="classKeteranganBarang"  readonly>';

    cell2.innerHTML = '<input type="text" class="form-control classQtyShow" style="width:100%;" class="form-control" id="qty_show'+ a +'" value="<?= number_format($dataGet->jumlah) ?>" ><input type="text" class="form-control classQty" class="form-control" id="qty'+ a +'" value="<?= number_format($dataGet->jumlah) ?>" style="width:100%;display:none">';
    cell3.innerHTML = '<select id="tank" class="form-control selectX classTank" style="width:100%;">'+
                      '<option value="">Pilih</option>'+
                      <?php
                        foreach ($tank2 as $value) {
                      ?>
                        '<option value="<?php echo $value->tank; ?>"><?php echo $value->tank; ?></option>'+
                      <?php } ?>

                      '</select>';
    cell4.innerHTML = '<select class="form-control selectX classCur" style="width:100%;">'+
                      '<option value="">Pilih</option>'+
                      <?php
                        foreach ($kurs as $value) {
                      ?>
                        '<option value="<?php echo $value->id_kurs; ?>"><?php echo $value->mata_uang; ?></option>'+
                      <?php } ?>
                      '</select>';
    cell5.innerHTML = '<input type="text" class="form-control classHarga" style="width:100%;" class="form-control" id="harga'+ a +'" ><input type="text" class="form-control classHarga" style="width:100%;display:none" class="form-control" id="urutan_diem" value="'+ j +'">';
    cell6.innerHTML = '<input type="text" class="form-control classTotal" style="width:100%;" class="form-control" id="total_show'+ a +'" readonly><input type="text" class="form-control classTotal" style="width:100%;display:none" class="form-control" id="total'+ a +'" >';
    cell7.innerHTML = '<input type="text" class="form-control classBiayaKurs" id="biayakurs'+ a +'" ><a href="https://www.bi.go.id/id/statistik/informasi-kurs/transaksi-bi/default.aspx" target="_blank"> Cek Nilai Biaya Kurs</a> ';

      var calculated_total_sum = 0;

      $("#myTablePK .classQty").each(function (){
        var get_textbox_value = $(this).val();
          if($.isNumeric(get_textbox_value)) {
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
            var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
            return s + (j ? i.substr(0, j) + ',' : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + ',') + (c ? '.' + Math.abs(n - i).toFixed(c).slice(2) : "");
        }

        $("#harga" + a).keyup(function(){
          var qty   = Number(document.getElementById("qty" + a).value);
          var harga = document.getElementById("harga" + a).value;
          

          var result_real   = qty * harga;
          let text          = result_real.toString();
          document.getElementById("total_show" + a).value = text.number_format();
          document.getElementById("total" + a).value = result_real;
        });

      // $(".selectX").select2({
      //   placeholder: "Select",
      //   allowClear: true
      // })


      $("#terminal").change(function (){
          var url = "<?php echo base_url('PemasukanRBB/add_ajax_tank');?>/"+$(this).val();
          $('#tank').load(url);
          return false;
      });

      for(var i=0;  i<=table.rows.length; i++) {
        document.getElementsByClassName("classQty")[i].name = "qty"+i;
        document.getElementsByClassName("classTank")[i].name = "tank"+i;
        document.getElementsByClassName("classHarga")[i].name = "harga"+i;
        document.getElementsByClassName("classCur")[i].name = "cur"+i;
        document.getElementsByClassName("classTotal")[i].name = "total"+i;
        document.getElementsByClassName("classBiayaKurs")[i].name = "biayakurs"+i;
      }



  }



  function deleteRowPK(btn) {
    var row = btn.parentNode.parentNode;
    var table = document.getElementById("myTablePK");
    var result = confirm("Are you sure to delete ?");
    if(row.parentNode.removeChild(row)){
      for(var a=0; a<=table.rows.length; a++) {
        $('#dataLimitPK').empty();
        $('<input type="hidden" name="limit_pk" value="'+ a +'" >').appendTo('#dataLimitPK');
      }
      for(var i=0; i<=table.rows.length; i++) {
        document.getElementsByClassName("classQty")[i].name = "qty"+i;
        document.getElementsByClassName("classTank")[i].name = "tank"+i;
        document.getElementsByClassName("classHarga")[i].name = "harga"+i;
        document.getElementsByClassName("classCur")[i].name = "cur"+i;
        document.getElementsByClassName("classTotal")[i].name = "total"+i;
        document.getElementsByClassName("classBiayaKurs")[i].name = "biayakurs"+i;
      }
    }
  }

  function convertRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
      split  = number_string.split(","),
      sisa   = split[0].length % 3,
      rupiah = split[0].substr(0, sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
      separator = sisa ? "." : "";
      rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? prefix + rupiah : "";
  }


function validasi(){
          var KeteranganBarang = $("#KeteranganBarang").val();
          $.ajax({
          type: 'POST',
          url: "<?php echo base_URL('PemasukanRBB/VlidasiData');?>",
          data: "KeteranganBarang="+KeteranganBarang,
          cache: false,
          success: function(data){
          var str    = data;
          var ckhsl  = str.replace('"', '');
          var rckhsl = ckhsl.replace('"', '');
          document.getElementById("sat").value = rckhsl;
              }
        });
      }

        String.prototype.number_format = function(d) {
            var n = this;
            var c = isNaN(d = Math.abs(d)) ? 2 : d;
            var s = n < 0 ? "-" : "";
            var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
            return s + (j ? i.substr(0, j) + ',' : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + ',') + (c ? '.' + Math.abs(n - i).toFixed(c).slice(2) : "");
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
        function myFunctionKeyup(rowid)
         { 
            String.prototype.number_format = function(d) {
            var n = this;
            var c = isNaN(d = Math.abs(d)) ? 2 : d;
            var s = n < 0 ? "-" : "";
            var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
            return s + (j ? i.substr(0, j) + ',' : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + ',') + (c ? '.' + Math.abs(n - i).toFixed(c).slice(2) : "");
            }
            
            var qty_real            = parseInt(document.getElementById("qty_real"+rowid).value);
            var harga_satuan_real   = parseInt(document.getElementById("harga_satuan_real"+rowid).value);
            var hasil_real          = document.getElementById("hasil_real"+rowid);
            var hasil_real_show     = document.getElementById("hasil_real_show"+rowid);
            var result_real         = qty_real * harga_satuan_real;
            let text                = result_real.toString();
            hasil_real.value        = result_real;
            hasil_real_show.value   = text.number_format();

         }

        
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
