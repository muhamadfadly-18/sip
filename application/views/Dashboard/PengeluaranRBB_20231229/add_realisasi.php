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
                <form class="form-horizontal" action="<?php echo base_url();?>PengeluaranRBB/add_action_realisasi" method="post" enctype="multipart/form-data">

                <input type="text" autocomplete="off" name="get_jml" id="get_jml" class="form-control" value="<?= $data_estimasi->jumlah; ?>" style="display: none;">
                <input type="text" name="count_loop" id="count_loop" value="<?= $count_real ?>" class="form-control" style="display: none;">
                <input type="text" autocomplete="off" name="id_barang_real" id="id_barang_real" class="form-control" value="<?= $notif->id_barang; ?>" style="display: none;">
                <input type="text" autocomplete="off" name="keterangan2" id="keterangan2" class="form-control" value="<?= $data_estimasi->id_barang; ?> - <?= $data_estimasi->nama_brg; ?>" style="display: none;">
                <input type="text" autocomplete="off" name="terminal_real" id="terminal_real" class="form-control" value="<?= $terminal->id_terminal; ?>" style="display: none;">
                <input type="text" autocomplete="off" name="sat_real" id="sat_real" class="form-control" value="<?= $data_estimasi->id_satuan; ?>" style="display: none;">
                <input type="text" autocomplete="off" name="id_bm" id="id_bm" class="form-control" value="<?= $data_estimasi->id_bk ?>" style="display: none;">
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

                                    foreach($purchase  as $value)
                                        {   ?>
                                         <option value="<?= $value->id_purchase ?>" <?= ($data_estimasi->po_number == $value->id_purchase) ? 'selected' : '';?> ><?= $value->po_number  ?></option>
                                     <?php }
                                     ?>

                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">No/Tgl. Transaksi : </label>
                    <div class="col-sm-2">
                      <input type="text" autocomplete="off" placeholder="No/Tgl. Transaksi"  name="no_transaksi" class="form-control" value="<?= $data_estimasi->no_transaksi ?>" readonly>
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
                                         <option value="<?= $value->id_dokumen ?>" <?= ($data_estimasi->jenis_doc == $value->id_dokumen) ? 'selected' : '';?> ><?= $value->dokumen  ?></option>
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
                                         <option value="<?= $value->id_jenis ?>" <?= ($data_estimasi->jenis_keluar == $value->id_jenis) ? 'selected' : '';?> ><?= $value->jenis  ?></option>
                                     <?php }
                                     ?>

                      </select>
                    </div>
                    <label class="col-sm-2 control-label">No Dokumen : </label>
                    <div class="col-sm-4">
                      <input type="text" autocomplete="off" placeholder="No Dokumen"  name="no_dokumen_pabean" class="form-control" value="<?= $data_estimasi->no_dokumen_pabean ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Bukti Pengeluaran : </label>
                    <div class="col-sm-4">
                      <input type="text" autocomplete="off" placeholder="Bukti Penerimaan"  name="no_bukti_penerimaan" class="form-control" value="<?= $data_estimasi->no_bukti_pengeluaran ?>">
                    </div>
                    <label class="col-sm-2 control-label">Tanggal Dokumen : </label>
                    <div class="col-sm-4">
                      <input type="date" name="tgl_dokumen_pabean" class="form-control" placeholder="Tanggal lahir" value="<?= $data_estimasi->tgl_dokumen_pabean ?>">
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
                                         <option value="<?= $value->id_client ?>-<?= $value->company_name  ?>" <?= ($data_estimasi->pembeli_penerima == $value->company_name) ? 'selected' : '';?> ><?= $value->company_name  ?></option>
                                     <?php }
                                     ?>

                      </select>
                    </div>
                    <label class="col-sm-2 control-label">Negara Tujuan : </label>
                    <div class="col-sm-4">
                      <input type="text" autocomplete="off" placeholder="Negara Asal"  name="negara_asal" class="form-control" value="<?= $data_estimasi->negara_tujuan ?>">
                    </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">File : </label>
                      <div class="col-sm-4">
                        <input class="form-control" id="file" name="file" type="file">
                        <span style="color: red;font-size: 10px;">* Masukan Dokumen & lampirannya dalam Bentuk Format zip.</span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">File Estimasi : </label>
                      <div class="col-sm-4">
                          <a href="https://app.asinusa.co.id/sip/uploads/<?= $data_estimasi->file ?>" class="btn btn-sm btn-primary" style="align:center;" target="_blank"><i class="fa fa-folder-open-o"></i>  Cek File</a>
                      </div>
                  </div>  
                 <br>
                 <table width="100%" style="margin-top: 10px;" class="table table-striped">
                <thead>
                  <tr style="text-align: center;">
                    <td class="JudulHeadr" style="padding-left: 5px; width: 20%; border-bottom: 1px solid black;">Tank</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 20%; border-bottom: 1px solid black;">Qty</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 20%; border-bottom: 1px solid black;">Mata Uang</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 20%; border-bottom: 1px solid black;">Harga</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 20%; border-bottom: 1px solid black;">Total</td>
                   <!--  <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Bulan</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 10%; border-bottom: 1px solid black;">Tahun</td> -->
                  </tr>
                </thead>
                <tbody >
                  <?php
                      $no = 1;
                      foreach ($data_estimasi_result as $value_result) :
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
                      <td><input type="text" autocomplete="off" id="qty_real<?= $no ?>" name="qty_real<?= $no ?>" class="form-control" value="<?= number_format($value_result->jumlah, 0, ".", ""); ?>" onkeyup="myFunctionKeyup(<?= $no ?>)"></td>
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
                      <td><input type="text" id="harga_satuan_real<?= $no ?>" name="harga_satuan_real<?= $no ?>" class="form-control" value="<?= number_format($value_result->harga, 0, ".", ""); ?>" onkeyup="myFunctionKeyup(<?= $no ?>)"></td>
                      <td><input type="text" autocomplete="off" id="hasil_real_show<?= $no ?>" value="<?= number_format($value_result->nilai_barang, 2, ",", "."); ?>" name="hasil_real_show<?= $no ?>" class="form-control" readonly="readonly" ><input type="text" autocomplete="off" id="hasil_real<?= $no ?>" name="hasil_real<?= $no ?>" value="<?= $value_result->nilai_barang ?>" class="form-control" style="display: none;" value="" ></td>
                   </tr>
                   <input style="display: none;" type="text" value="<?= $no++ ?>">
                   <?php

                      endforeach;
                      ?>
                </tbody>
                
              </table>

                  <div class="form-group">
                    <div class="col-sm-8">
                      <input class="btn btn-primary" type="submit" value="Simpan">
                      <button class="btn btn-default btn-outline" type="reset">Reset</button>
                    </div>
                  </div>
                  <br>
                <h2>Data Estimasi</h2>
                <table width="100%" style="margin-top: 10px;" class="table table-hover table-bordered dataTable table-striped width-full overf">
                <thead>
                  <tr style="text-align: center;">
                    <td class="JudulHeadr" style="padding-left: 5px; width: 20%; border-bottom: 1px solid black;">Tank</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 20%; border-bottom: 1px solid black;">Qty</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 20%; border-bottom: 1px solid black;">Mata Uang</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 20%; border-bottom: 1px solid black;">Harga</td>
                    <td class="JudulHeadr" style="padding-left: 5px; width: 20%; border-bottom: 1px solid black;">Total</td>
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
                      <td><input type="text" autocomplete="off" id="qty_get<?= $no ?>" name="qty_get<?= $no ?>" class="form-control" value="<?= number_format($value_result->jumlah, 0, ".", ""); ?>" onkeyup="myFunctionKeyup(<?= $no ?>)" disabled="disabled"></td>
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
                      <td><input type="text" id="harga_satuan_get<?= $no ?>" name="harga_satuan_get<?= $no ?>" class="form-control" value="<?= number_format($value_result->harga, 0, ".", ""); ?>" onkeyup="myFunctionKeyup(<?= $no ?>)" disabled="disabled"></td>
                      <td><input type="text" autocomplete="off" id="hasil_get_show<?= $no ?>" value="<?= number_format($value_result->nilai_barang, 2, ",", "."); ?>" name="hasil_get_show<?= $no ?>" class="form-control" readonly="readonly" disabled="disabled"><input type="text" autocomplete="off" id="hasil_get<?= $no ?>" name="hasil_get<?= $no ?>" value="<?= $value_result->nilai_barang ?>" class="form-control" style="display: none;" value="" ></td>
                   </tr>
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


</script>