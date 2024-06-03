<div class="page-content padding-30 container-fluid">

  <div class="page-header">
    <h1 class="page-title">Data Penerimaan Barang Hasil Blending</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Beranda</a></li>
      <li><a href="<?php echo base_url('Finish_good');?>">Data Penerimaan Barang Hasil Blending</a></li>
      <li class="active">Tambah Data</li>
    </ol>
    <div class="page-header-actions">
      <a href="<?php echo base_url('Finish_good');?>" class="btn btn-sm btn-danger  btn-round">
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
              <h4 class="example-title">Tambah Data Data Penerimaan Barang Hasil Blending Baru</h4>
              <p>
                **Isi kolom di bawah dengan benar.
              </p>
              <div class="example">
                <form class="form-horizontal" action="<?php echo base_url();?>Finish_good/add_action" method="post">

                <input type="text" id="terminal" name="terminal" style="display:none;" value="<?= $terminal2->terminal; ?>">
                <input type="text" id="id_terminal" name="id_terminal" style="display:none;" value="<?= $terminal2->id_terminal; ?>">

                <div class="form-group">
                    <label class="col-sm-2 control-label">Po Number : </label>
                    <div class="col-sm-3">
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
                    <label class="col-sm-2 control-label">No Bukti Penerimaan: </label>
                    <div class="col-sm-3">
                      <input type="text" autocomplete="off" placeholder="NO Bukti Penerimaan" required name="bukti_penerimaan_no" class="form-control" value="<?= $kodetrx ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Tanggal Finish Goods : </label>
                    <div class="col-sm-3">
                      <input type="date" autocomplete="off" placeholder="Tanggal Finish Goods" required name="tanggal_finish_goods" class="form-control" value="<?= date('Y-m-d');?>">
                    </div>
                  </div>
                  <br>
                 <table width="100%" style="margin-top: 10px;" class="table table-striped">
                <thead>
                  <tr>
                    <td style="width: 1%; border-bottom: 1px solid black;">
                      <a  class="btn btn-primary addRowPK" onclick="addPK()"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </td>
                    <td class="JudulHeadr" style="padding-left: 3px; width: 10%; border-bottom: 1px solid black;">Kode Barang</td>

                    <td colspan="2" class="JudulHeadr" style="padding-left: 3px; width: 15%; border-bottom: 1px solid black;text-align: center;">Asal Lokasi</td>
                    <td class="JudulHeadr" style="padding-left: 3px; width: 10%; border-bottom: 1px solid black;">Stok Tangki</td>
                    <td class="JudulHeadr" style="padding-left: 3px; width: 15%; border-bottom: 1px solid black;text-align: center;">Tujuan Lokasi</td>
                    <td class="JudulHeadr" style="padding-left: 3px; width: 10%; border-bottom: 1px solid black;">Qty</td>
                   <!--  <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Bulan</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Tahun</td> -->
                  </tr>
                </thead>
                <tbody id="myTablePK" >
                </tbody>
                <div id="dataLimitPK"></div>
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


  function addPK() {
    var table = document.getElementById("myTablePK");
    var terminal = document.getElementById("terminal").value;
    var row = table.insertRow(0);

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

    cell1.innerHTML = '<a href="javascript:void(0);" class="btn btn-sm btn-default" style="align:center;" onclick="deleteRowPK(this)"><i class="fa fa-remove"></i></a>';
    // cell2.innerHTML = '<input type="text" class="form-control classNPP" style="width:100%;" onkeyup="CariNamaNPP()" id="id_npp">';
    // cell3.innerHTML = '<input type="text" class="form-control classNama" style="width:100%;" class="form-control" id="nama" readonly>';

     cell2.innerHTML = '<select class="form-control selectX classKeteranganBarang" id="KeteranganBarang" style="width:100%;">'+
                      '<option value="">Pilih</option>'+
                      <?php
                        foreach ($barang as $value) {
                      ?>
                        '<option value="<?php echo $value->id_barang; ?>"><?php echo $value->id_barang; ?> - <?php echo $value->nama_brg; ?> - <?php echo $value->uom; ?></option>'+
                      <?php } ?>
                      '</select>';

    cell3.innerHTML = '<input type="text" id="terminal2" class="form-control classTerminal" value="<?php echo $terminal2->terminal; ?>" readonly>'
    cell4.innerHTML = '<select id="tank" class="form-control selectX classTank" style="width:100%;" onchange="validasi()">'+
                        '<option>Pilih</option>'+
                        <?php
                                foreach ($tank2 as $value) {
                                ?> 
                                '<option value="<?php echo $value->tank; ?>"><?php echo $value->tank; ?></option>'+
                                <?php } ?>
                      '</select>';
    cell5.innerHTML = '<input type="text" class="form-control  classStokTank" style="width:100%;" id="stoktank" readonly>';  
    
    cell6.innerHTML = '<select id="tank2" class="form-control selectX classTank2" style="width:100%;">'+
                        '<option>Pilih</option>'+
                        <?php
                                foreach ($tank2 as $value) {
                                ?> 
                                '<option value="<?php echo $value->tank; ?>"><?php echo $value->tank; ?></option>'+
                                <?php } ?>
                      '</select>';

    cell7.innerHTML = '<input type="text" class="form-control classQty" style="width:100%;" class="form-control" id="qty">';


    
      $(".selectX").select2({
      placeholder: "Select",
      allowClear: true
    });



    for(var i=0;  i<=table.rows.length; i++) {
        document.getElementsByClassName("classKeteranganBarang")[i].name = "keterangan"+i;
        document.getElementsByClassName("classQty")[i].name = "qty"+i;
        document.getElementsByClassName("classTerminal")[i].name = "terminal"+i;
        document.getElementsByClassName("classTank")[i].name = "tank"+i;
        document.getElementsByClassName("classStokTank")[i].name = "stoktank"+i;
        document.getElementsByClassName("classTank2")[i].name = "tank2"+i;

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
        document.getElementsByClassName("classTerminal")[i].name = "terminal"+i;
        document.getElementsByClassName("classTank")[i].name = "tank"+i;
        document.getElementsByClassName("classStokTank")[i].name = "stoktank"+i;
        document.getElementsByClassName("classTank2")[i].name = "tank2"+i;
      }
    }
  }


  function validasi(){
          var KeteranganBarang  = $("#KeteranganBarang").val();
          var terminal = document.getElementById("id_terminal").value;
          var tank              = $("#tank").val();
          $.ajax({
          type: 'POST',
          url: "<?php echo base_URL('Finish_good/VlidasiData');?>",
          data: "KeteranganBarang="+KeteranganBarang + "&terminal="+terminal + "&tank="+tank,
          cache: false,
          success: function(data){
          var str    = data;
          var ckhsl  = str.replace('"', '');
          var rckhsl = ckhsl.replace('"', '');
          document.getElementById("stoktank").value = rckhsl;
              }
        });
      }


</script>
