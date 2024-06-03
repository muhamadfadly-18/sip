<div class="page-content padding-30 container-fluid">

  <div class="page-header">
    <h1 class="page-title">Pengeluaran Barang</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Beranda</a></li>
      <li><a href="<?php echo base_url('PengeluaranRBB');?>">Pengeluaran Barang</a></li>
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
                <form class="form-horizontal" action="<?php echo base_url();?>PengeluaranRBB/add_action_get" method="post">

                <div class="form-group">
                    <label class="col-sm-2 control-label">No PO : </label>
                    <div class="col-sm-4">
                      <!-- <input type="text" autocomplete="off" placeholder="No PO"  name="po_number" class="form-control"> -->
                      <select data-plugin="select2" name='po_number' id="po_number" class="form-control">
                         <!-- <option value=''>None</option>-->
                         <option value="0">-- Pilih Jenis NO PO --</option>
                                    <?php

                                    foreach($purchase  as $value)
                                        {   ?>
                                         <option value="<?= $value->id_purchase ?>" ><?= $value->po_number  ?></option>
                                     <?php }
                                     ?>

                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">No/Tgl. Transaksi : </label>
                    <div class="col-sm-2">
                      <input type="text" autocomplete="off" placeholder="No/Tgl. Transaksi"  name="no_transaksi" class="form-control" value="<?= $kodetrx ?>" readonly>
                    </div>
                    <div class="col-sm-2">
                      <input type="date" name="tgl_transaksi" class="form-control" placeholder="Tanggal Transaksi" value="<?= date('Y-m-d');?>" value="<?= date('Y-m-d');?>">
                    </div>
                    <label class="col-sm-2 control-label">Jenis Dokumen : </label>
                    <div class="col-sm-4">
                      <select data-plugin="select2" name='jenis_doc' id="jenis_doc" class="form-control">
                         <!-- <option value=''>None</option>-->
                         <option> Pilih Jenis Dokumen </option>
                                    <?php

                                    foreach($dokumen as $value)
                                        {   ?>
                                         <option value="<?= $value->id_dokumen ?>" ><?= $value->dokumen  ?></option>
                                     <?php }
                                     ?>

                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Jenis Keluar : </label>
                    <div class="col-sm-4">
                      <select data-plugin="select2" name='jenis_keluar' id="jenis_keluar" class="form-control">
                        <option> Pilih Jenis Keluar </option>
                                    <?php

                                    foreach($jenis as $value)
                                        {   ?>
                                         <option value="<?= $value->id_jenis ?>" ><?= $value->jenis  ?></option>
                                     <?php }
                                     ?>

                      </select>
                    </div>
                    <label class="col-sm-2 control-label">No Dokumen : </label>
                    <div class="col-sm-4">
                      <input type="text" autocomplete="off" placeholder="No Dokumen"  name="no_dokumen_pabean" class="form-control" value="<?= $dataGet->no_dokumen_pabean ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Bukti Pengeluaran : </label>
                    <div class="col-sm-4">
                      <input type="text" autocomplete="off" placeholder="Bukti Penerimaan"  name="no_bukti_penerimaan" class="form-control">
                    </div>
                    <label class="col-sm-2 control-label">Tanggal Dokumen : </label>
                    <div class="col-sm-4">
                      <input type="date" name="tgl_dokumen_pabean" class="form-control" placeholder="Tanggal lahir" value="<?= $dataGet->tgl_dokumen_pabean ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Penerima Barang : </label>
                    <div class="col-sm-4">
                      <select data-plugin="select2" name='pengirim_barang' id="pengirim_barang" class="form-control">
                        <option> Pilih pengirim </option>
                                    <?php

                                    foreach($client as $value)
                                        {   ?>
                                         <option value="<?= $value->id_client ?>-<?= $value->company_name  ?>" ><?= $value->company_name  ?></option>
                                     <?php }
                                     ?>

                      </select>
                    </div>
                    <label class="col-sm-2 control-label">Negara Asal : </label>
                    <div class="col-sm-4">
                      <input type="text" autocomplete="off" placeholder="Negara Asal"  name="negara_asal" class="form-control" value="<?= $dataGet->negara_asal ?>">
                    </div>
                  </div>
                 
                 <br>
                 <table width="100%" style="margin-top: 10px;" class="table table-striped">
                <thead>
                  <tr style="text-align: center;">
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">HS Code</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Qty</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Sat</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Terminal Terapung</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Tank</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Cur</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Harga</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Total</td>
                   <!--  <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Bulan</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Tahun</td> -->
                  </tr>
                </thead>
                <tbody >
                  <input type="text" name="keterangan" style="display: none;" value="<?= $notif->id_barang; ?>">
                          <input type="text" name="qty" style="display: none;" value="<?= $notif->id_satuan; ?>">
                          <input type="text" name="terminal" style="display: none;" value="<?= $terminal2->id_terminal; ?>">
                          <tr style="text-align: center;">
                            <td><?= $notif->id_barang ?> - <?= $notif->nama_brg ?></td>
                            <td><input name="qty" type="text" class="form-control" value="<?= $notif->jumlah; ?>" id="qty" readonly></td>
                            <td><input type="text" class="form-control" name="sat" value="<?= $notif->id_satuan; ?>" readonly></td>
                            <td><input type="text"  value="<?= $notif->terminal_terapung; ?>" class="form-control" readonly></td>
                            <td>
                              <select class="form-control" style="width:100%;" name="tank">
                                <option value="">Pilih</option>
                                <?php
                                foreach ($tank2 as $value) {
                                ?> <option value="<?php echo $value->tank; ?>" <?php if ($value->tank == $dataGet->terminal_tank) {
                                                                                  echo 'selected';
                                                                                } ?>><?php echo $value->tank; ?></option>
                                <?php } ?>
                            </td>
                            <td>
                              <select class="form-control selectX classCur" style="width:100%;" name="cur">
                                <option value="">Pilih</option>
                                <?php
                                foreach ($kurs as $value) {
                                ?> <option value="<?php echo $value->id_kurs; ?>"><?php echo $value->mata_uang; ?></option>
                                <?php } ?>
                            </td>
                            <td>
                              <input type="text" class="form-control classHarga" style="width:100%;" class="form-control" id="harga">
                            </td>
                            <td>
                              <input type="text" name="total" class="form-control classTotal" style="width:100%;" class="form-control" id="total">
                            </td>
                          </tr>
                </tbody>
                
              </table>

                  <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-4">
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

  $("#harga").keyup(function() {
    var qty = document.getElementById("qty").value;
    var harga = document.getElementById("harga").value;
    document.getElementById("total").value = qty * harga;
  });

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
    var table = document.getElementById("myTablePK");
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

    cell1.innerHTML = '<a href="javascript:void(0);" class="btn btn-sm btn-default" style="align:center;" onclick="deleteRowPK(this)"><i class="fa fa-remove"></i></a>';
    // cell2.innerHTML = '<input type="text" class="form-control classNPP" style="width:100%;" onkeyup="CariNamaNPP()" id="id_npp">';
    // cell3.innerHTML = '<input type="text" class="form-control classNama" style="width:100%;" class="form-control" id="nama" readonly>';
    
    cell2.innerHTML = '<select class="form-control selectX classKeteranganBarang" id="KeteranganBarang" onchange="validasi()" style="width:100%;">'+
                      '<option value="">Pilih</option>'+
                      <?php 
                        foreach ($barang as $value) {
                      ?>
                        '<option value="<?php echo $value->id_barang; ?>"><?php echo $value->id_barang; ?> - <?php echo $value->nama_brg; ?></option>'+
                      <?php } ?>
                      '</select>';
    
    cell3.innerHTML = '<input type="text" class="form-control classQty" style="width:100%;" class="form-control" id="qty">';
    cell4.innerHTML = '<input type="text" class="form-control classSat" style="width:100%;" class="form-control" id="sat">';
    cell5.innerHTML = '<select id="terminal" class="form-control selectX classTerminal" style="width:100%;">'+
                      '<option value="">Pilih</option>'+
                      <?php 
                        foreach ($terminal as $value) {
                      ?>
                        '<option value="<?php echo $value->id_terminal; ?>"><?php echo $value->terminal; ?></option>'+
                      <?php } ?>
                      '</select>';
    cell6.innerHTML = '<select id="tank" class="form-control selectX classTank" style="width:100%;">'+
                      '<option value="">Pilih</option>'+
                      
                      '</select>';                  
    cell7.innerHTML = '<select class="form-control selectX classCur" style="width:100%;">'+
                      '<option value="">Pilih</option>'+
                      <?php 
                        foreach ($kurs as $value) {
                      ?>
                        '<option value="<?php echo $value->id_kurs; ?>"><?php echo $value->mata_uang; ?></option>'+
                      <?php } ?>
                      '</select>';
    cell8.innerHTML = '<input type="text" class="form-control classHarga" style="width:100%;" class="form-control" id="harga">';
    cell9.innerHTML = '<input type="text" class="form-control classTotal" style="width:100%;" class="form-control" id="total">';
   

    $("#harga").keyup(function(){
          
              var qty   = document.getElementById("qty").value;
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
        document.getElementsByClassName("classCur")[i].name = "cur"+i;
        document.getElementsByClassName("classKeteranganBarang")[i].name = "keterangan"+i;
        document.getElementsByClassName("classQty")[i].name = "qty"+i;
        document.getElementsByClassName("classSat")[i].name = "sat"+i;
        document.getElementsByClassName("classTerminal")[i].name = "terminal"+i;
        document.getElementsByClassName("classTank")[i].name = "tank"+i;
        document.getElementsByClassName("classHarga")[i].name = "harga"+i;
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
        document.getElementsByClassName("classCur")[i].name = "cur"+i;
        document.getElementsByClassName("classKeteranganBarang")[i].name = "keterangan"+i;
        document.getElementsByClassName("classQty")[i].name = "qty"+i;
        document.getElementsByClassName("classSat")[i].name = "sat"+i;
        document.getElementsByClassName("classTerminal")[i].name = "terminal"+i;
        document.getElementsByClassName("classTank")[i].name = "tank"+i;
        document.getElementsByClassName("classHarga")[i].name = "harga"+i;
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