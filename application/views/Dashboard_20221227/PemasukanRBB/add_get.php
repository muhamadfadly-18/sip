<div class="page-content padding-30 container-fluid">

  <div class="page-header">
    <h1 class="page-title">Pemasukan / Penerimaan Barang</h1>
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
              <form class="form-horizontal" action="<?php echo base_url(); ?>PemasukanRBB/add_action_get" method="post" enctype="multipart/form-data">

                
                <input type="text" autocomplete="off" name="id_barang_real" id="id_barang_real" class="form-control" value="<?= $notif->id_barang; ?>" style="display: none;">
                <input type="text" autocomplete="off" name="terminal_real" id="terminal_real" class="form-control" value="<?= $terminal->id_terminal; ?>" style="display: none;">
                <input type="text" autocomplete="off" name="id_bm" id="id_bm" class="form-control" value="<?= $dataGet->id_bm ?>" style="display: none;">
                <input type="text" autocomplete="off" name="totalhasil2" id="totalhasil2" class="form-control" value="" style="display: none;">
                <input type="text" autocomplete="off" name="totalhasil" id="totalhasil" class="form-control" value="" style="display: none;">

                <div class="form-group">
                  <label class="col-sm-2 control-label">No PO : </label>
                  <div class="col-sm-4">
                    <!-- <input type="text" autocomplete="off" placeholder="No PO"  name="po_number" class="form-control"> -->
                    <select data-plugin="select2" name='po_number' id="po_number" class="form-control">
                      <!-- <option value=''>None</option>-->
                      <option value="0">-- Pilih Jenis NO PO --</option>
                      <?php

                      foreach ($purchase  as $value) {   ?>
                        <option value="<?= $value->id_purchase ?>"><?= $value->po_number  ?></option>
                      <?php }
                      ?>

                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">No/Tgl. Transaksi : </label>
                  <div class="col-sm-2">
                    <input type="text" autocomplete="off" placeholder="No Transaksi" name="no_transaksi" class="form-control" value="<?= $kodetrx ?>" readonly>
                  </div>
                  <div class="col-sm-2">
                    <input type="date" name="tgl_transaksi" class="form-control" placeholder="Tanggal Transaksi" value="<?= date('Y-m-d'); ?>">
                  </div>
                  <label class="col-sm-2 control-label">Jenis Dokumen Pabean : </label>
                  <div class="col-sm-4">
                    <select data-plugin="select2" name='jenis_doc' id="jenis_doc" class="form-control">
                      <!-- <option value=''>None</option>-->
                      <option value="0">-- Pilih Jenis Dokumen --</option>
                      <?php

                      foreach ($dokumen as $value) {   ?>
                        <option value="<?= $value->id_dokumen ?>"><?= $value->dokumen  ?></option>
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
                        <option value="<?= $value->id_jenis ?>"><?= $value->jenis  ?></option>
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
                    <input type="text" autocomplete="off" placeholder="No. Bukti Penerimaan / Delivery Order (DO)" name="no_bukti_penerimaan" class="form-control">
                  </div>
                  <label class="col-sm-2 control-label">Tanggal Dokumen : </label>
                  <div class="col-sm-4">
                    <input type="date" name="tgl_dokumen_pabean" class="form-control" placeholder="Tanggal lahir" value="<?= $dataGet->tgl_dokumen_pabean ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Pengirim Barang : </label>
                  <div class="col-sm-4">
                    <input type="text" autocomplete="off" placeholder="Nama Pengirim Barang"  name="pengirim_barang" class="form-control">
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
                                        <option value="<?= $value->id_negara_asal ?>" ><?= $value->nama_negara  ?></option>
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
                <br>

                <table width="100%" style="margin-top: 10px;" class="table table-hover table-bordered dataTable table-striped width-full overf">
                <thead>
                  <tr>
                    <td style="width: 1%; border-bottom: 1px solid black;">
                      <a  class="btn btn-primary addRowPK" onclick="addPK()"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </td>

                    <p>Qty Tidak Boleh Lebih Dari 50000</p>

                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">HS Code</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Qty</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Satuan</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Lokasi Tujuan Terminal</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Tank Penerimaan</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Mata Uang</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Harga Satuan Barang</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Total Nilai Barang</td>

                  </tr>

                </thead>
                <tbody id="myTablePK" >
                  </tbody>
                  <div id="dataLimitPK"></div>
                  <tfoot>
                    <td></td>
                    <td></td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">
                    <input type="text" placeholder="Total Qty" id="totalhasil3" class="form-control" value="0" readonly>
                  </td>
                  </tfoot>
              </table>
              <br>
              
                <div class="form-group">
                  <div class="col-sm-8 col-sm-offset-8">
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

    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);
    var cell7 = row.insertCell(6);
    var cell8 = row.insertCell(7);
    var cell9 = row.insertCell(8);


    for(var a=0; a<=table.rows.length; a++) {
      $('#dataLimitPK').empty();
      $('<input type="hidden" name="limit_pk" value="'+ a +'" >').appendTo('#dataLimitPK');
    }

    j = a - 1;
    cell1.innerHTML = '<a href="javascript:void(0);" class="btn btn-sm btn-default" style="align:center;" onclick="deleteRowPK(this)"><i class="fa fa-remove"></i></a>';
    // cell2.innerHTML = '<input type="text" class="form-control classNPP" style="width:100%;" onkeyup="CariNamaNPP()" id="id_npp">';
    // cell3.innerHTML = '<input type="text" class="form-control classNama" style="width:100%;" class="form-control" id="nama" readonly>';

    cell2.innerHTML = '<input type="text" class="form-control classKeteranganBarang" style="width:100%;" class="form-control" value="<?= $notif->id_barang; ?> - <?= $notif->nama_brg; ?>" readonly>';

    cell3.innerHTML = '<input type="text" class="form-control classQty" style="width:100%;" class="form-control" id="qty">';
    cell4.innerHTML = '<input type="text" class="form-control classSat" style="width:100%;" class="form-control" id="sat" value="<?= $notif->id_satuan; ?>" readonly>';
    cell5.innerHTML = '<input type="text" class="form-control classTerminal" style="width:100%;" class="form-control" id="terminal" value="<?= $terminal->terminal; ?>" readonly>';
    cell6.innerHTML = '<select id="tank" class="form-control selectX classTank" style="width:100%;">'+
                      '<option value="">Pilih</option>'+
                      <?php
                        foreach ($tank2 as $value) {
                      ?>
                        '<option value="<?php echo $value->tank; ?>"><?php echo $value->tank; ?></option>'+
                      <?php } ?>

                      '</select>';
    cell7.innerHTML = '<select class="form-control selectX classCur" style="width:100%;">'+
                      '<option value="">Pilih</option>'+
                      <?php
                        foreach ($kurs as $value) {
                      ?>
                        '<option value="<?php echo $value->id_kurs; ?>"><?php echo $value->mata_uang; ?></option>'+
                      <?php } ?>
                      '</select>';
    cell8.innerHTML = '<input type="text" class="form-control classHarga" style="width:100%;" class="form-control" id="harga" ><input type="text" class="form-control classHarga" style="width:100%;display:none" class="form-control" id="urutan_diem" value="'+ j +'">';
    cell9.innerHTML = '<input type="text" class="form-control classTotal" style="width:100%;" class="form-control" id="total" readonly>';

    // $("#qty").keyup(function() {
    //     var qty = document.getElementById("qty").value;
    //     // var qty = document.getElementById("qty").value;
    //     var hasil = parseInt(qty) + parseInt(qty);
    //     if (hasil > 50000) {
    //         document.getElementById("totalhasil").value = '';
    //         alert('Qty Tidak Boleh Lebih Dari 50000');
    //     } else {
    //         document.getElementById("totalhasil").value = hasil;
    //     }
    // });

    var calculated_total_sum = 0;

    $("#myTablePK .classQty").each(function (){
      var get_textbox_value = $(this).val();
        if($.isNumeric(get_textbox_value)) {
        calculated_total_sum += parseFloat(get_textbox_value);
      }                  
    });
    
    document.getElementById("totalhasil").value = calculated_total_sum;
      if (calculated_total_sum > 50000) {
            alert('Qty Tidak Boleh Lebih Dari 50000');
        } else {
            document.getElementById("totalhasil").value = calculated_total_sum;
        }

    $("#qty").keyup(function(){
              var a = Number(document.getElementById("totalhasil").value);
              var b = Number(document.getElementById("qty").value);
              var urutan_diem = document.getElementById("urutan_diem").value;

              var c = a+b;
              if(urutan_diem == 1){
                document.getElementById("totalhasil3").value = b;
                
              }else{
                document.getElementById("totalhasil3").value = c;
              }
              
             
              
            });    

    $("#harga").keyup(function(){
              
              var qty   = Number(document.getElementById("qty").value);
              var harga = document.getElementById("harga").value;
              document.getElementById("total").value = qty * harga;
              
              
            });

    $(".selectX").select2({
      placeholder: "Select",
      allowClear: true
    })


      $("#terminal").change(function (){
          var url = "<?php echo base_url('PemasukanRBB/add_ajax_tank');?>/"+$(this).val();
          $('#tank').load(url);
          return false;
      });

      for(var i=0;  i<=table.rows.length; i++) {

        document.getElementsByClassName("classKeteranganBarang")[i].name = "keterangan"+i;
        document.getElementsByClassName("classQty")[i].name = "qty"+i;
        document.getElementsByClassName("classSat")[i].name = "sat"+i;
        document.getElementsByClassName("classTerminal")[i].name = "terminal"+i;
        document.getElementsByClassName("classTank")[i].name = "tank"+i;
        document.getElementsByClassName("classHarga")[i].name = "harga"+i;
        document.getElementsByClassName("classCur")[i].name = "cur"+i;
        document.getElementsByClassName("classTotal")[i].name = "total"+i;
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

        document.getElementsByClassName("classKeteranganBarang")[i].name = "keterangan"+i;
        document.getElementsByClassName("classQty")[i].name = "qty"+i;
        document.getElementsByClassName("classSat")[i].name = "sat"+i;
        document.getElementsByClassName("classTerminal")[i].name = "terminal"+i;
        document.getElementsByClassName("classTank")[i].name = "tank"+i;
        document.getElementsByClassName("classHarga")[i].name = "harga"+i;
        document.getElementsByClassName("classCur")[i].name = "cur"+i;
        document.getElementsByClassName("classTotal")[i].name = "total"+i;
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

     


</script>
