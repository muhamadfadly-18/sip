<div class="page-content padding-30 container-fluid">

<div class="page-header">
  <h1 class="page-title">Terminal</h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Beranda</a></li>
    <li><a href="<?php echo base_url('Terminal');?>">Terminal</a></li>
    <li class="active">Tambah Data</li>
  </ol>
  <div class="page-header-actions">
    <a href="<?php echo base_url('Terminal');?>" class="btn btn-sm btn-danger">
      <i aria-hidden="true" class="icon wb-chevron-left-mini"></i>
      <span class="hidden-xs">Kembali</span>
    </a>
  </div>
</div>

<div class="panel">
    <div class="panel-body container-fluid">
      <div class="row row-lg">
        <div class="clearfix hidden-xs"></div>

        <div class="col-md-12">
          <!-- Example Horizontal Form -->
          <div class="example-wrap">
            <div class="example">
              <form class="form-horizontal" action="<?php echo base_url();?>Terminal/add_action" method="post">

                  <div class="form-group">
                    <label class="col-sm-2 control-label" style="text-align: left; font-weight: bold;">Terminal </label>
                    <div class="col-sm-4">
                      <input type="text" autocomplete="off" placeholder="Terminal" required name="terminal" class="form-control">
                    </div>
                  </div>


                <div class="form-group" style="padding-top: 10px;">
                  <div class="col-sm-2 col-sm-offset-10">
                    <input class="btn btn-primary" type="submit" value="Simpan">
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
<script src="<?php echo base_URL()?>jquery.js"></script>
