<div class="page-content padding-30 container-fluid">

  <div class="page-header">
    <h1 class="page-title">Barang</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>">Beranda</a></li>
      <li><a href="<?php echo base_url('Barang'); ?>">Barang</a></li>
      <li class="active">Edit Data</li>
    </ol>
    <div class="page-header-actions">
      <a href="<?php echo base_url('Barang'); ?>" class="btn btn-sm btn-danger  btn-round">
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
            <h4 class="example-title">Edit Data Barang</h4>
            <p>
              **Isi kolom di bawah dengan benar.
            </p>
            <div class="example">
              <form class="form-horizontal" action="<?php echo base_url(); ?>Barang/update/<?= $data->id_barang ?>/<?= $data->pilih_tujuan ?>" method="post">

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tujuan Input : </label>
                  <div class="col-sm-4">
                    <select name='tujuan_input' id="tujuan_input" class="form-control" disabled="disabled">
                      <option value="0">Pilih Tujuan </option>
                      <option value="1" <?= ($data->pilih_tujuan == '1') ? 'selected' : ''; ?>>Barang </option>
                      <option value="2" <?= ($data->pilih_tujuan == '2') ? 'selected' : ''; ?>>Barang Produksi</option>
                      <option value="3" <?= ($data->pilih_tujuan == '3') ? 'selected' : ''; ?>>Barang Finish Good</option>
                    </select>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-2 control-label">HS Code : </label>
                  <div class="col-sm-3">
                    <input type="text" autocomplete="off" placeholder="HS Code/Kode Barang" readonly required name="kode_barang" class="form-control" value="<?= $data->id_barang ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Uraian Barang : </label>
                  <div class="col-sm-5">
                    <input type="text" autocomplete="off" placeholder="Uraian Barang" required name="nama_barangg" class="form-control" value="<?= $data->nama_brg ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jenis : </label>
                  <div class="col-sm-4">
                    <select name='jenis' id="jenis" class="form-control">
                      <option> Pilih Jenis </option>
                      <?php

                      foreach ($jenis as $value) {   ?>
                        <option value="<?= $value->id_jenis ?>" <?php if ($value->id_jenis == $data->id_jenis) {
                                                                  echo 'selected';
                                                                } ?>><?= $value->jenis  ?></option>
                      <?php }
                      ?>

                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Kategori : </label>
                  <div class="col-sm-4">
                    <select name='kategori' id="kategori" class="form-control">
                      <option> Pilih Kategori </option>
                      <?php

                      foreach ($kategori_barang as $value) {   ?>
                        <option value="<?= $value->id_kategori ?>" <?php if ($value->id_kategori == $data->id_kategori) {
                                                                      echo 'selected';
                                                                    } ?>><?= $value->kategori  ?></option>
                      <?php }
                      ?>

                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Satuan : </label>
                  <div class="col-sm-4">
                    <select name='satuan' id="satuan" class="form-control">
                      <option> Pilih Satuan </option>
                      <?php

                      foreach ($satuan as $value) {   ?>
                        <option value="<?= $value->uom ?>" <?php if ($value->uom == $data->uom) {
                                                              echo 'selected';
                                                            } ?>><?= $value->uom  ?> - <?= $value->keterangan  ?></option>
                      <?php }
                      ?>

                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Lokasi : </label>
                  <div class="col-sm-4">
                    <select name='lokasi' id="terminal" class="form-control">
                      <option> Pilih Lokasi </option>
                      <?php
                      foreach ($terminal as $value) {   ?>
                        <option value="<?= $value->terminal ?>" <?php if ($value->terminal == $data->terminal_terapung) {
                                                                  echo 'selected';
                                                                } ?>><?= $value->terminal  ?> </option>
                      <?php }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Spesifikasi: </label>
                  <div class="col-sm-5">
                    <textarea name="spesifikasi" class="form-control"><?= $data->spesifikasi ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Keterangan : </label>
                  <div class="col-sm-5">
                    <textarea name="keterangan" class="form-control"><?= $data->keterangan ?></textarea>
                  </div>
                </div>

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