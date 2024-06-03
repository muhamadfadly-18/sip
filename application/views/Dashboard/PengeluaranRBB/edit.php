<div class="page-content padding-30 container-fluid">

  <div class="page-header">
    <h1 class="page-title">Pengeluaran Barang</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Beranda</a></li>
      <li><a href="<?php echo base_url('PengeluaranRBB');?>">Pengeluaran Barang</a></li>
      <li class="active">Edit Data</li>
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
              <h4 class="example-title">Edit Data Pengeluaran Barang</h4>
              <p>
                **Isi kolom di bawah dengan benar.
              </p>
              <div class="example">
                <form class="form-horizontal" action="<?php echo base_url();?>PengeluaranRBB/update/<?php echo $data->id_bk ?>" method="post">

                <input type="text" id="terminal" name="terminal" style="display:none;" value="<?= $terminal2->terminal; ?>">
                <input type="text" id="id_terminal" name="id_terminal" style="display:none;" value="<?= $terminal2->id_terminal; ?>">

                <div class="form-group">
                    <label class="col-sm-2 control-label">No PO : </label>
                    <div class="col-sm-4">
                      <select data-plugin="select2" name='po_number' id="po_number" class="form-control">
                         <option value="0">-- Pilih Jenis NO PO --</option>
                            <?php

                            foreach($purchase  as $value)
                                {   ?>
                                <option value="<?php echo $value->id_purchase; ?>" <?php echo ($value->id_purchase == $data->po_number)?'selected':''?>><?php echo $value->po_number; ?></option>

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
                      <input type="date" name="tgl_transaksi" class="form-control" placeholder="Tanggal Transaksi" value="<?= $data->tgl_transaksi;?>">
                    </div>
                    <label class="col-sm-2 control-label">Jenis Dokumen : </label>
                    <div class="col-sm-4">
                      <select data-plugin="select2" name='jenis_doc' id="jenis_doc" class="form-control">
                        <option> Pilih Jenis Dokumen </option>
                          <?php

                          foreach($dokumen as $value)
                              {   ?>
                                <option value="<?php echo $value->id_dokumen; ?>" <?php echo ($value->id_dokumen == $data->jenis_doc)?'selected':''?>><?php echo $value->dokumen; ?></option>
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
                                <option value="<?php echo $value->id_jenis; ?>" <?php echo ($value->id_jenis == $data->jenis_keluar)?'selected':''?>><?php echo $value->jenis; ?></option>
                            <?php }
                          ?>

                      </select>
                    </div>
                    <label class="col-sm-2 control-label">No Dokumen : </label>
                    <div class="col-sm-4">
                      <input type="text" autocomplete="off" placeholder="No Dokumen"  name="no_dokumen_pabean" class="form-control" value="<?= $data->no_dokumen_pabean ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Bukti Pengeluaran : </label>
                    <div class="col-sm-4">
                      <input type="text" autocomplete="off" placeholder="Bukti Penerimaan"  name="no_bukti_penerimaan" class="form-control" value="<?= $data->no_bukti_pengeluaran ?>">
                    </div>
                    <label class="col-sm-2 control-label">Tanggal Dokumen : </label>
                    <div class="col-sm-4">
                      <input type="date" name="tgl_dokumen_pabean" class="form-control" placeholder="Tanggal lahir" value="<?= $data->tgl_dokumen_pabean; ?>">
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
                                <option value="<?php echo $value->id_client; ?>" <?php echo ($value->id_client == $data->pembeli_penerima)?'selected':''?>><?php echo $value->company_name; ?></option>
                            <?php }
                            ?>

                      </select>
                    </div>
                    <label class="col-sm-2 control-label">Negara Asal : </label>
                    <div class="col-sm-4">
                      <!-- <input type="text" autocomplete="off" placeholder="Negara Asal"  name="negara_asal" class="form-control" value="<?= $data->negara_tujuan ?>"> -->
                      <select class="form-control" data-plugin="select2" name="negara_asal">
                        <option value="">Pilih</option>
                            <?php
                                $bendera = $this->db->query("select * from ref_negara_asal")->result();
                                foreach($bendera  as $value)
                            {   ?>
                                <option value="<?php echo $value->id_negara_asal; ?>"<?php echo ($value->id_negara_asal == $data->negara_tujuan)?'selected':''?>><?= $value->id_negara_asal  ?> - <?= $value->nama_negara  ?></option>

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
                <tbody id="myTablePK" >
                </tbody>
                <div id="dataLimitPK"></div>
                <?php
                    $no=0;

                    foreach($data_real as $value):

                      // $deleteRow_fc = "deleteRowPK".$value->id."()"; 
                 
                  ?>
              <!-- <div id="fc_<?php echo $value->id?>">
                <div class="form-group">
                    <input type="hidden" value="<?php echo $value->id; ?>" name="id_<?php echo $no ?>"> -->
                    <tr>
                      <td>
                                <button type="button" class="btn btn-sm btn-default" onclick="deleteRowPK(this)">
                                  <i class="fa fa-remove" aria-hidden="true"></i>
                              </td>
                      
                      <td>
                        <input type="text" autocomplete="off" name="" class="form-control" value="<?= $value->id_barang ?>"></td>
                        <td><input type="text" autocomplete="off"  name="" class="form-control" value="<?= $value->jumlah ?>"></td>
                        <td><input type="text" autocomplete="off"  name="" class="form-control" value="<?= $value->id_satuan ?>"></td>
                        <td><input type="text" autocomplete="off"  name="" class="form-control" value="<?= $value->terminal_terapung ?>"></td>
                        <td>
                          <input type="text" autocomplete="off"  name="" class="form-control" value="<?= $value->terminal_tank ?>">
                        </td>
                        <td><input type="text" autocomplete="off"  name="" class="form-control" value="<?= $value->id_mata_uang ?>"></td>
                        <td><input type="text" autocomplete="off"  name="" class="form-control" value="<?= $value->nilai_barang ?>"></td>
                        <td><input type="text" autocomplete="off"  name="" class="form-control" value=""></td>
                            
                          <!-- <td><input  type="text" id="nilai_ppa_mask4" autocomplete="off" name="nilai_ppa<?php echo $no ?>" class="form-control" value="<?php echo $value->nilai_ppa; ?>"></td>
                          <td><select name="alokasi_biaya<?php echo $no?>" class="form-control" >
                            <?php 
                              if($value->alokasi_biaya == 0){
                                $alokasi_ppa1 = 'selected';
                              }else{
                                $alokasi_ppa1 = '';
                              }

                              if($value->alokasi_biaya == 1){
                                $alokasi_ppa2 = 'selected';
                              }else{
                                $alokasi_ppa2 = '';
                              }

                              if($value->alokasi_biaya == 2){
                                $alokasi_ppa3 = 'selected';
                              }else{
                                $alokasi_ppa3 = '';
                              }

                              
                            ?>
                            <option value="1" <?php echo $alokasi_ppa1; ?>>-----</option>
                            <option value="1" <?php echo $alokasi_ppa2; ?>>Capex</option>
                            <option value="2" <?php echo $alokasi_ppa3; ?>>Opex</option>
                        </select></td>
                      
                        <td><input type="text" autocomplete="off"  name="no_ppa<?php echo $no?>" class="form-control" value="<?php echo $value->no_ppa; ?>"></td>
                        <td><input type="text" autocomplete="off"  name="kode_akun<?php echo $no?>" class="form-control" value="<?php echo $value->kode_akun; ?>"></td> -->
                        </tr> 

                        <!-- </div>

                        </div> -->

                        <?php $no++; endforeach; ?>
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
    var terminal = document.getElementById("terminal").value;
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
    cell5.innerHTML = '<input type="text" id="terminal2" class="form-control classTerminal" value="<?php echo $terminal2->terminal; ?>" disabled="disabled">';
    cell6.innerHTML = '<select id="tank" class="form-control selectX classTank" style="width:100%;" onchange="validasi()">'+
                        '<option>Pilih</option>'+
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
