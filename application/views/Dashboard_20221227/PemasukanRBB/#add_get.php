<div class="page-content padding-30 container-fluid">

  <div class="page-header">
    <h1 class="page-title">Pemasukan Bahan Baku</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Beranda</a></li>
      <li><a href="<?php echo base_url('PemasukanRBB');?>">Pemasukan Bahan Baku</a></li>
      <li class="active">Tambah Data</li>
    </ol>
    <div class="page-header-actions">
      <a href="<?php echo base_url('PemasukanRBB');?>" class="btn btn-sm btn-danger  btn-round">
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
              <h4 class="example-title">Tambah Data Pemasukan Bahan Baku</h4>
              <p>
                **Isi kolom di bawah dengan benar.
              </p>
              <div class="example">
                <form class="form-horizontal" action="<?php echo base_url();?>PemasukanRBB/add_action" method="post" enctype="multipart/form-data">
                  
                  <input type="text" autocomplete="off" name="id_bm" id="id_bm" class="form-control" value="<?= $dataGet->id_bm ?>">

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
                      <input type="text" autocomplete="off" placeholder="No Transaksi"  name="no_transaksi" class="form-control" value="<?= $kodetrx ?>" readonly>
                    </div>
                    <div class="col-sm-2">
                      <input type="date" name="tgl_transaksi" class="form-control" placeholder="Tanggal Transaksi" value="<?= date('Y-m-d');?>">
                    </div>
                    <label class="col-sm-2 control-label">Jenis Dokumen : </label>
                    <div class="col-sm-4">
                      <select data-plugin="select2" name='jenis_doc' id="jenis_doc" class="form-control">
                         <!-- <option value=''>None</option>-->
                         <option value="0">-- Pilih Jenis Dokumen --</option>
                                    <?php

                                    foreach($dokumen as $value)
                                        {   ?>
                                         <option value="<?= $value->id_dokumen ?>" ><?= $value->dokumen  ?></option>
                                     <?php }
                                     ?>

                      </select>
                      <span style="color: red;font-size: 10px;">* pilih Jenis Dokumen wajib di isi</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Jenis Pemasukan : </label>
                    <div class="col-sm-4">
                      <select data-plugin="select2" name='jenis_pemasukan' id="jenis_pemasukan" class="form-control">
                        <option value="0">-- Pilih Jenis Pemasukan --</option>
                                    <?php

                                    foreach($jenis as $value)
                                        {   ?>
                                         <option value="<?= $value->id_jenis ?>" ><?= $value->jenis  ?></option>
                                     <?php }
                                     ?>

                      </select>
                      <span style="color: red;font-size: 10px;">* pilih Jenis Pemasukan wajib di isi</span>
                    </div>
                    <label class="col-sm-2 control-label">No Dokumen : </label>
                    <div class="col-sm-4">
                      <input type="text" autocomplete="off" placeholder="No Dokumen Pabean"  name="no_dokumen_pabean" class="form-control" value="<?= $dataGet->no_dokumen_pabean ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Bukti Penerimaan : </label>
                    <div class="col-sm-4">
                      <input type="text" autocomplete="off" placeholder="Bukti Penerimaan"  name="no_bukti_penerimaan" class="form-control">
                    </div>
                    <label class="col-sm-2 control-label">Tanggal Dokumen : </label>
                    <div class="col-sm-4">
                      <input type="date" name="tgl_dokumen_pabean" class="form-control" placeholder="Tanggal lahir" value="<?= $dataGet->tgl_dokumen_pabean ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Pengirim Barang : </label>
                    <div class="col-sm-4">
                      <select data-plugin="select2" name='pengirim_barang' id="pengirim_barang" class="form-control">
                        <option value="0">-- Pilih pengirim --</option>
                                    <?php

                                    foreach($client as $value)
                                        {   ?>
                                         <option value="<?= $value->id_client ?>" ><?= $value->company_name  ?></option>
                                     <?php }
                                     ?>

                      </select>
                      <span style="color: red;font-size: 10px;">* pilih Pengirim Barang wajib di isi</span>
                    </div>
                    <label class="col-sm-2 control-label">Negara Asal Supplier : </label>
                    <div class="col-sm-4">
                      <input type="text" autocomplete="off" placeholder="Negara Asal Supplier"  name="negara_asal" class="form-control" value="<?= $dataGet->negara_asal ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">File : </label>
                    <div class="col-sm-6">
                          <input class="form-control" id="file" name="file" type="file" >
                    </div>
                  </div>  
                 <br>
                  <div class="form-group">
                  <div class="col-sm-12 col-sm-offset-0">
                    <div class="table-responsive">
                          <input type="text" id="idTotalPpn" name="totalPN" style="display: none;">
                          
                          <table id="show_table_ap" class="table table-hover table-bordered dataTable table-striped width-full overf">
                            <thead>
                              <tr>
                                <th>HS Code</th>
                                <th>Qty</th>
                                <th>Satuan</th>
                                <th>Lokasi</th>
                                <th>Tank</th>
                                <th>Mata Uang</th>
                                <th>Harga</th>
                                <th>Total</th>
                              </tr>
                            </thead>

                            <tbody id="tbodyid">
                              
                            </tbody>
                          </table>
                        </div>
                  </div>
                </div>
                 <!-- <table width="100%" style="margin-top: 10px;" class="table table-striped">
                <thead>
                  <tr>
                    <td style="width: 1%; border-bottom: 1px solid black;">
                      <a  class="btn btn-primary addRowPK" onclick="addPK()"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </td>
                    
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Kode Barang</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Qty</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Satuan</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Lokasi</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Tank</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Mata Uang</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Harga</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Total</td>
                    
                   
                  </tr>
                </thead>
                <tbody id="myTablePK" >
                </tbody>
                <div id="dataLimitPK"></div>
              </table> -->

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
      
      var id_bm   = $("#id_bm").val();
        $.ajax({
            url: "<?php echo base_URL()?>PemasukanRBB/get_ap",
            data: "id_bm="+id_bm,
            cache: false,
            success: function(msg){
                
                $("#tbodyid").html(msg);
                var rowCount = $('#tbodyid tr').length;

            }
        });  


</script>