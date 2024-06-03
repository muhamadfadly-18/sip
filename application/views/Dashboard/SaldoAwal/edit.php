<div class="page-content padding-30 container-fluid">
  <div class="page-header">
    <h1 class="page-title">KBLI</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Beranda</a></li>
      <li><a href="<?php echo base_url('group');?>">KBLI</a></li>
      <li class="active">Edit Data</li>
    </ol>
    <div class="page-header-actions">
      <a href="<?php echo base_url('kbli');?>" class="btn btn-sm btn-danger  btn-round">
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
              <h4 class="example-title">Edit Data KBLI</h4>
              <p>
                **Isi kolom di bawah dengan benar.
              </p>
              <div class="example">
                <form class="form-horizontal" action="<?php echo base_url();?>kbli/update/<?= $data_kbli->kbli_id?>" method="post">

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Kode : </label>
                    <div class="col-sm-2">
                      <input type="text" autocomplete="off" placeholder="Kode KBLI" value="<?= $data_kbli->kode;?>" required name="kode_kbli" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Judul : </label>
                    <div class="col-sm-10">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="Judul" value="<?= $data_kbli->judul;?>" required name="judul_kbli" class="form-control">
                    </div>                   
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Deskripsi : </label>
                    <div class="col-sm-10">
                      <input type="hidden" name="id_group">
                      
                      <textarea cols="30" rows="10" class="form-control" name="deskripsi_kbli"><?= $data_kbli->deskripsi;?></textarea>
                    </div>                   
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Jenis : </label>
                    <div class="col-sm-2">
                   
                    <select data-plugin="selectpicker" name="jenis_kbli" class="form-control" required>   
                    
                        <option value="">-- Select --</option>
                        <option value="Aktivitas" <?php echo ($data_kbli->jenis_kbli == 'Aktivitas')?'selected':''?>>Aktivitas</option>
                        <option value="Perdangan" <?php echo ($data_kbli->jenis_kbli == 'Perdangan')?'selected':''?>>Perdangan</option>
                      </select>

                    </div>                   
                  </div>

                  <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                      <input class="btn btn-primary" type="submit" value="Perbarui">
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
</div>