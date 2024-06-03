<div class="page-content padding-30 container-fluid">

  <div class="page-header">
    <h1 class="page-title">Vessel Information</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Beranda</a></li>
      <li><a href="<?php echo base_url('VI');?>">Vessel Information</a></li>
      <li class="active">Tambah Data</li>
    </ol>
    <div class="page-header-actions">
      <a href="<?php echo base_url('VI');?>" class="btn btn-sm btn-danger  btn-round">
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
              <h4 class="example-title">Tambah Data Vessel Information</h4>
              <p>
                **Isi kolom di bawah dengan benar.
              </p>
              <div class="example">
                <form class="form-horizontal" action="<?php echo base_url();?>VI/add_action" method="post">

                <div class="form-group">
                    <label class="col-sm-2 control-label">Name of Vessel : </label>
                    <div class="col-sm-5">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="Name of Vessel" required name="txt1" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Flag (Call Sign) : </label>
                      <div class="col-sm-5">
                        <input type="hidden" name="id_group">
                        <input type="text" autocomplete="off" placeholder="Flag (Call Sign)" required name="txt1" class="form-control">
                      </div>
                    </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Ship Owner : </label>
                    <div class="col-sm-5">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="Ship Owner" required name="txt3" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Type Of Vessel: </label>
                    <div class="col-sm-5">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="Type Of Vessel " required name="txt4" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Port Of Register : </label>
                    <div class="col-sm-5">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="Port Of Register" required name="txt5" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Last Port Of Call : </label>
                    <div class="col-sm-5">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="Last Port Of Call" required name="txt6" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Next Port Of Call : </label>
                    <div class="col-sm-5">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="Next Port Of Call" required name="txt7" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">GRT : </label>
                    <div class="col-sm-5">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="GRT" required name="txt8" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">DWT: </label>
                    <div class="col-sm-5">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="DWT" required name="txt9" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">LOA : </label>
                    <div class="col-sm-5">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="LOA " required name="txt10" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Cargo Transfer MT : </label>
                    <div class="col-sm-5">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="Cargo Transfer MT " required name="txt11" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Cargo Type : </label>
                    <div class="col-sm-5">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="Cargo Type" required name="txt12" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Mother/ Feeder Vessel : </label>
                    <div class="col-sm-5">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="Mother/ Feeder Vessel " required name="txt13" class="form-control">
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
