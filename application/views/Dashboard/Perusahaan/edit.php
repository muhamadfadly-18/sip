<div class="page-content padding-30 container-fluid">

<div class="page-header">
  <div class="page-header-actions">
    <a href="<?php echo base_url('perusahaan');?>" class="btn btn-sm btn-danger">
      <i aria-hidden="true" class="icon wb-chevron-left-mini"></i>
      <span class="hidden-xs">Kembali</span>
    </a>
  </div>
</div>

<div class="panel">
    <div class="panel-body container-fluid">
      <div class="row row-lg">
        <div class="clearfix hidden-xs"></div>

        <div class="col-sm-6 col-md-6">
          <!-- Example Horizontal Form -->
          <div class="example-wrap">
            <div class="example">
              <form class="form-horizontal" action="<?php echo base_url();?>perusahaan/update/<?php echo $DataPerusahaan->id_perusahaan;?>" method="post" enctype="multipart/form-data">


                <div class="form-group">
                  <label class="col-sm-3 control-label"  style="text-align: left; font-weight: bold;">Nama Perusahaan</label>
                  <div class="col-sm-9">
                    <input type="text" autocomplete="off" required name="nama_perusahaan" value="<?php echo $DataPerusahaan->nama_perusahaan?>" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label"  style="text-align: left; font-weight: bold;">NPWP</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" data-plugin="formatter" name="npwp" class="form-control" data-pattern="[[99]].[[999]].[[999]]-[[9]]-[[999]].[[999]]" value="<?php echo $DataPerusahaan->npwp?>">
                    <p class="help-block">99.999.999.9-999.999</p>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label"  style="text-align: left; font-weight: bold;">No. Telp</label>
                  <div class="col-sm-9">
                    <input type="text" autocomplete="off" required name="no_telp" value="<?php echo $DataPerusahaan->no_telp?>" maxlength="15" class="form-control" onkeypress="return isNumber(event)">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label"  style="text-align: left; font-weight: bold;">Alamat</label>
                  <div class="col-sm-9">
                    <textarea name="alamat" style="height: 50px;" class="form-control"><?php echo $DataPerusahaan->alamat?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label"  style="text-align: left; font-weight: bold;">PIC</label>
                  <div class="col-sm-9">
                    <input type="text" autocomplete="off" required name="pic" value="<?php echo $DataPerusahaan->pic?>" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label"  style="text-align: left; font-weight: bold;">Keterangan</label>
                  <div class="col-sm-9">
                    <textarea name="keterangan" style="height: 50px;" class="form-control"><?php echo $DataPerusahaan->keterangan?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-4 col-sm-offset-3">
                    <input class="btn btn-primary" type="submit" value="update">
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
  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
  }
</script>