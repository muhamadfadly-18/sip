<div class="page-content padding-30 container-fluid">

  <div class="page-header">
    <h1 class="page-title">Barang</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Beranda</a></li>
      <li><a href="<?php echo base_url('Barang');?>">Barang</a></li>
      <li class="active">Tambah Data</li>
    </ol>
    <div class="page-header-actions">
      <a href="<?php echo base_url('Barang');?>" class="btn btn-sm btn-danger  btn-round">
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
              <h4 class="example-title">Tambah Data Barang</h4>
              <p>
                **Isi kolom di bawah dengan benar.
              </p>
              <div class="example">
                <form class="form-horizontal" action="<?php echo base_url();?>Barang/add_action" method="post">

                <div class="form-group">
                    <label class="col-sm-2 control-label">Kode Barang : </label>
                    <div class="col-sm-3">
                      <input type="text" autocomplete="off" placeholder="Kode Barang" required name="kode_barang" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Barang : </label>
                    <div class="col-sm-5">
                      <input type="text" autocomplete="off" placeholder="Nama Barang" required name="nama_barangg" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Jenis : </label>
                    <div class="col-sm-4">
                      <select name='jenis' id="jenis" class="form-control">
                         <!-- <option value=''>None</option>-->
                        <option value='1'>1</option>
                        <option value='2'>2</option>

                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Kategori : </label>
                    <div class="col-sm-4">
                      <select name='kategori' id="kategori" class="form-control">
                        <option> Pilih Kategori </option>
                                    <?php

                                    foreach($kategori_barang as $value)
                                        {   ?>
                                         <option value="<?= $value->id_kategori ?>" ><?= $value->kategori  ?></option>
                                     <?php }
                                     ?>

                      </select>
                    </div>
                  </div><div class="form-group">
                    <label class="col-sm-2 control-label">Satuan : </label>
                    <div class="col-sm-4">
                      <select name='satuan' id="satuan" class="form-control">
                         <option> Pilih Satuan </option>
                                    <?php

                                    foreach($satuan as $value)
                                        {   ?>
                                         <option value="<?= $value->id_unit ?>" ><?= $value->uom  ?> - <?= $value->keterangan  ?></option>
                                     <?php }
                                     ?>

                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Spesifikasi: </label>
                    <div class="col-sm-5">
                      <textarea name="spesifikasi" class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">keterangan : </label>
                    <div class="col-sm-5">
                      <textarea name="keterangan" class="form-control"></textarea>
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
