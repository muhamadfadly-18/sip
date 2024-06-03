<style type="text/css">
  .fa-item {
    font-size: 12px;
    padding: 10px;
    margin: 1px;
    text-align: center;
    background-color: #263238;
  }
  .fa-item i {
    color: #FFFFFF;
    display: inline-block;
    font-size: 16px;
    width: 15px;
  }
  .overf{
    height: 200px;
    overflow-x: auto;
  }
</style>

<div class="page-content padding-30 container-fluid">
  <div class="page-header">
    <h1 class="page-title">Pengelolaan Modul</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Beranda</a></li>
      <li><a href="<?php echo base_url('module');?>">Pengelolaan Modul</a></li>
      <li class="active">Edit Modul</li>
    </ol>
    <div class="page-header-actions">
      <a href="<?php echo base_url('module');?>" class="btn btn-sm btn-danger  btn-round">
        <i aria-hidden="true" class="icon wb-chevron-left-mini"></i>
        <span class="hidden-xs">Kembali</span>
      </a>
    </div>
  </div>

  <div class="panel">
      <div class="panel-body container-fluid">
        <div class="row row-lg">
          <div class="clearfix hidden-xs"></div>

          <div class="col-sm-12 col-md-6">
            <!-- Example Horizontal Form -->
            <div class="example-wrap">
              <h4 class="example-title">Edit Data Modul</h4>
              <p>
                **Isi kolom di bawah dengan benar.
              </p>
              <div class="example">
                <form class="form-horizontal" action="<?php echo base_url();?>module/update/<?= $data_module->id_module?>" method="post">

                  <div class="form-group">
                    <label class="col-sm-4 control-label">Nama Modul : </label>
                    <div class="col-sm-8">
                      <input type="text" autocomplete="off" placeholder="Nama Module" required name="name_module" class="form-control" value="<?= $data_module->name_module;?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">Nama Controller : </label>
                    <div class="col-sm-8">
                      <input type="text" autocomplete="off" placeholder="Nama Controller" required name="name_controller" class="form-control" value="<?= $data_module->name_controller;?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">Ikon : </label>
                    <div class="col-sm-8">
                    
                    <ul class="ul-fa-item overf">
                        <?php 
                        $query = $this->db->query("SELECT * FROM ref_icon")->result();
                        foreach ($query as $v):?>
                            <li class="fa-item">
                            <input type="radio" required name="icon"
                            <?php echo ($v->name_icon == $data_module->icon)?'checked':''?>
                            value="<?=$v->name_icon;?>">
                                <i class="fa fa-<?=$v->name_icon;?>"></i>
                            </li>
                        <?php endforeach;?>
                    </ul>
                    
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">Urutan : </label>
                    <div class="col-sm-3">
                      <input type="number" autocomplete="off" placeholder="Urutan" required name="sort" class="form-control" value="<?= $data_module->sort;?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-4">
                      <input class="btn btn-primary" type="submit" value="Perbarui">
                      <button class="btn btn-default btn-outline" type="reset">Setel Ulang</button>
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
