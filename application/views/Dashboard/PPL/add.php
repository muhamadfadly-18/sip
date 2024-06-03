<div class="page-content padding-30 container-fluid">

  <div class="page-header">
    <h1 class="page-title">Pemasukan Produksi</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Beranda</a></li>
      <li><a href="<?php echo base_url('PemasukanProduksi');?>">Pemasukan Produksi</a></li>
      <li class="active">Tambah Data</li>
    </ol>
    <div class="page-header-actions">
      <a href="<?php echo base_url('PemasukanProduksi');?>" class="btn btn-sm btn-danger  btn-round">
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
              <h4 class="example-title">Tambah Data Pemasukan Produksi Baru</h4>
              <p>
                **Isi kolom di bawah dengan benar.
              </p>
              <div class="example">
                <form class="form-horizontal" action="<?php echo base_url();?>PemasukanProduksi/add_action" method="post">
               
                <div class="form-group">
                    <label class="col-sm-2 control-label">Po Number : </label>
                    <div class="col-sm-3">
                      <input type="text" autocomplete="off" placeholder="Po Number" required name="po_number" class="form-control">
                    </div>                  
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">No Pengeluaran : </label>
                    <div class="col-sm-10">
                      <input type="text" autocomplete="off" placeholder="No Pengeluaran" required name="no_pengeluaran" class="form-control">
                    </div>                   
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Tanggal Produksi : </label>
                    <div class="col-sm-3">
                      <input type="date" autocomplete="off" placeholder="Tanggal Produksi" required name="tanggal_production" class="form-control">
                    </div>                   
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Sub Kontrak : </label>
                    <div class="col-sm-2">
                     <input type="checkbox" id="id_subcon" name="id_subcon" value="1" >
                    </div>                   
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Sub Kontrak : </label>
                    <div class="col-sm-4">
                      <select name='nama_subcon' id="nama_subcon" class="form-control">
                        <option> Pilih pengirim </option>
                                    <?php

                                    foreach($client as $value)
                                        {   ?>
                                         <option value="<?= $value->company_name ?>" ><?= $value->company_name  ?></option>
                                     <?php }
                                     ?>

                      </select>
                    </div>                  
                  </div>
                  <br>
                 <table width="100%" style="margin-top: 10px;" class="table table-striped">
                <thead>
                  <tr>
                    <td style="width: 1%; border-bottom: 1px solid black;">
                      <a  class="btn btn-primary addRowPK" onclick="addPK()"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Kode Barang</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Nama Barang</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Qty</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Satuan</td>
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
    var row = table.insertRow(0);

    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);

    for(var a=0; a<=table.rows.length; a++) {
      $('#dataLimitPK').empty();
      $('<input type="hidden" name="limit_pk" value="'+ a +'" >').appendTo('#dataLimitPK');
    }

    cell1.innerHTML = '<a href="javascript:void(0);" class="btn btn-sm btn-default" style="align:center;" onclick="deleteRowPK(this)"><i class="fa fa-remove"></i></a>';
    // cell2.innerHTML = '<input type="text" class="form-control classNPP" style="width:100%;" onkeyup="CariNamaNPP()" id="id_npp">';
    // cell3.innerHTML = '<input type="text" class="form-control classNama" style="width:100%;" class="form-control" id="nama" readonly>';
    
    cell2.innerHTML = '<input type="text" class="form-control classKode" style="width:100%;" class="form-control" id="kode">';
    cell3.innerHTML = '<input type="text" class="form-control classKeteranganBarang" style="width:100%;" class="form-control" id="keterangan">';
    cell4.innerHTML = '<input type="text" class="form-control classQty" style="width:100%;" class="form-control" id="qty">';
    cell5.innerHTML = '<input type="text" class="form-control classSat" style="width:100%;" class="form-control" id="sat">';
   
    
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

    $("#keterangan").keyup(function(){
          
                var sub1 = $("#keterangan").val();
                $.ajax({
                  url: "<?php echo base_url('PemasukanRBB/cekSat')?>",
                  data: {"sub1":sub1},
                  cache: false,
                  success: function(data){
                    var json = JSON.parse(data)
                      document.getElementById("sat").value = json;
                    
                  }
                });
            });

      $("#keterangan").keydown(function(){
                      document.getElementById("kode").value = "";
                      document.getElementById("sat").value = "";
                  
            });


    
        
        



    for(var i=0;  i<=table.rows.length; i++) {
      document.getElementsByClassName("classKeteranganBarang")[i].name = "keterangan"+i;
      document.getElementsByClassName("classKode")[i].name = "kode"+i;
      document.getElementsByClassName("classQty")[i].name = "qty"+i;
      document.getElementsByClassName("classSat")[i].name = "sat"+i;

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

 



</script>
