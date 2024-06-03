<div class="page-content padding-30 container-fluid">

  <div class="page-header">
    <h1 class="page-title">Waste Scrap</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Beranda</a></li>
      <li><a href="<?php echo base_url('Ws');?>">Waste Scrap</a></li>
      <li class="active">Tambah Data</li>
    </ol>
    <div class="page-header-actions">
      <a href="<?php echo base_url('Ws');?>" class="btn btn-sm btn-danger  btn-round">
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
              <h4 class="example-title">Tambah Data Waste Scrap</h4>
              <p>
                **Isi kolom di bawah dengan benar.
              </p>
              <div class="example">
                <form class="form-horizontal" action="<?php echo base_url();?>Ws/add_action" method="post">
               
                  <div class="form-group">
                    <label class="col-sm-2 control-label">PO Number : </label>
                    <div class="col-sm-3">
                      <select data-plugin="select2" name='po_number' id="po_number" class="form-control">
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
                    <label class="col-sm-2 control-label">No Pengeluaran : </label>
                    <div class="col-sm-3">
                      <input type="text" autocomplete="off" placeholder="No BC" required name="no_bc" class="form-control" value="<?= $no_bc ?>" readonly>
                    </div>                  
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Tanggal Waste : </label>
                    <div class="col-sm-3">
                      <input type="date" autocomplete="off" placeholder="Tanggal BC" required name="tanggal_bc" class="form-control" value="<?= date('Y-m-d');?>">
                    </div>                  
                  </div>

                  <table width="100%" style="margin-top: 10px;" class="table table-striped">
                <thead>
                  <tr>
                    <td style="width: 1%; border-bottom: 1px solid black;">
                      <a  class="btn btn-primary addRowPK" onclick="addPK()"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 8%; border-bottom: 1px solid black;">HS Code</td>
                    <td colspan="2" class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black; text-align: center">Asal Lokasi</td>
                    <td class="JudulHeadr" style="padding-left: 3px; width: 5%; border-bottom: 1px solid black;">Stok Tangki</td>
                    <td colspan="2" class="JudulHeadr" style="padding-left: 3px; width: 20%; border-bottom: 1px solid black;text-align: center;">Tujuan Lokasi</td>
                    <td class="JudulHeadr" style="padding-left: 3px; width: 5%; border-bottom: 1px solid black;">Qty</td>
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
    var row = table.insertRow(0);

    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);
    var cell7 = row.insertCell(6);
    var cell8 = row.insertCell(7);

    for(var a=0; a<=table.rows.length; a++) {
      $('#dataLimitPK').empty();
      $('<input type="hidden" name="limit_pk" value="'+ a +'" >').appendTo('#dataLimitPK');
    }

    cell1.innerHTML = '<a href="javascript:void(0);" class="btn btn-sm btn-default" style="align:center;" onclick="deleteRowPK(this)"><i class="fa fa-remove"></i></a>';
    cell2.innerHTML = '<select class="form-control selectX classKeteranganBarang" id="KeteranganBarang" style="width:100%;">'+
                      '<option value="">Pilih</option>'+
                      <?php 
                        foreach ($barang as $value) {
                      ?>
                        '<option value="<?php echo $value->id_barang; ?>"><?php echo $value->id_barang; ?> - <?php echo $value->nama_brg; ?> - <?php echo $value->uom; ?></option>'+
                      <?php } ?>
                      '</select>';
    
    cell3.innerHTML = '<select id="terminal" class="form-control selectX classTerminal" style="width:100%;">'+
                      '<option value="0">Pilih</option>'+
                      <?php 
                        foreach ($terminal as $value) {
                      ?>
                        '<option value="<?php echo $value->id_terminal; ?>"><?php echo $value->terminal; ?></option>'+
                      <?php } ?>
                      '</select>';
    cell4.innerHTML = '<select id="tank" class="form-control selectX classTank" style="width:100%;" onchange="validasi()">'+
                      '<option value="0">Pilih</option>'+
                      
                      '</select>';
    cell5.innerHTML = '<input type="text" class="form-control classStokTank" style="width:100%;" class="form-control" id="stoktank" readonly>';
    cell6.innerHTML = '<select id="terminal2" class="form-control selectX classTerminal2" style="width:100%;">'+
                      '<option value="">Pilih</option>'+
                      <?php 
                        foreach ($terminal as $value) {
                      ?>
                        '<option value="<?php echo $value->id_terminal; ?>"><?php echo $value->terminal; ?></option>'+
                      <?php } ?>
                      '</select>';
    cell7.innerHTML = '<select id="tank2" class="form-control selectX classTank2" style="width:100%;">'+
                      '<option value="">Pilih</option>'+
                      
                      '</select>';

    cell8.innerHTML = '<input type="text" class="form-control classQty" style="width:100%;" class="form-control" id="qty">';
   
    
    $("#keterangan").keyup(function(){
          
                var sub1 = $("#keterangan").val();
                $.ajax({
                  url: "<?php echo base_url('PemasukanRBB/cekKode')?>",
                  data: {"sub1":sub1},
                  cache: false,
                  success: function(data){
                    var json = JSON.parse(data)
                      document.getElementById("kode").value = json;
                    
                  }
                });
            });

    $("#terminal").change(function (){
          var url = "<?php echo base_url('Ws/add_ajax_tank');?>/"+$(this).val();
          $('#tank').load(url);
          return false;
      });

    $("#terminal2").change(function (){
          var url = "<?php echo base_url('Ws/add_ajax_tank2');?>/"+$(this).val();
          $('#tank2').load(url);
          return false;
      });


    for(var i=0;  i<=table.rows.length; i++) {
      document.getElementsByClassName("classKeteranganBarang")[i].name = "keterangan"+i;
      document.getElementsByClassName("classQty")[i].name = "qty"+i;
      document.getElementsByClassName("classTerminal")[i].name = "terminal"+i;
      document.getElementsByClassName("classTank")[i].name = "tank"+i;
      document.getElementsByClassName("classStokTank")[i].name = "stoktank"+i;
      document.getElementsByClassName("classTerminal2")[i].name = "terminal2"+i;
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
      document.getElementsByClassName("classKode")[i].name = "kode"+i;
      document.getElementsByClassName("classQty")[i].name = "qty"+i;
      document.getElementsByClassName("classSat")[i].name = "sat"+i;
      }
    }
  }

  function validasi(){
          var KeteranganBarang  = $("#KeteranganBarang").val();
          var terminal          = $("#terminal").val();
          var tank              = $("#tank").val();
          $.ajax({
          type: 'POST',
          url: "<?php echo base_URL('Ws/VlidasiData');?>",
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
