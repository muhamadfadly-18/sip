<div class="page-content padding-30 container-fluid">

  <div class="page-header">
    <h1 class="page-title">Type Of Vessel</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Beranda</a></li>
      <li><a href="<?php echo base_url('TOV');?>">Type Of Vessel</a></li>
      <li class="active">Tambah Data</li>
    </ol>
    <div class="page-header-actions">
      <a href="<?php echo base_url('TOV');?>" class="btn btn-sm btn-danger  btn-round">
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
              <h4 class="example-title">Tambah Data Type Of Vessel</h4>
              <p>
                **Isi kolom di bawah dengan benar.
              </p>
              <div class="example">
                <form class="form-horizontal" action="<?php echo base_url();?>TOV/add_action" method="post">

                <div class="form-group">
                    <label class="col-sm-2 control-label">Type Of Vessel: </label>
                    <div class="col-sm-5">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="Type Of Vessel" required name="txt1" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Status : </label>
                    <div class="col-sm-3">
                      <input type="hidden" name="id_group">
                      <select name='status' id="status" class="form-control">
                         <!-- <option value=''>None</option>-->
                        <option value='Active'>Active</option>
                        <option value='Non Active'>Non Active</option>

                        </select>
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
