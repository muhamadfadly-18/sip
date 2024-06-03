<div class="page-content padding-30 container-fluid">

  <div class="page-header">
    <h1 class="page-title">Purchase</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Beranda</a></li>
      <li><a href="<?php echo base_url('Satuan');?>">Purchase</a></li>
      <li class="active">Tambah Data</li>
    </ol>
    <div class="page-header-actions">
      <a href="<?php echo base_url('Purchase');?>" class="btn btn-sm btn-danger  btn-round">
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
              <h4 class="example-title">Tambah Data Purchase</h4>
              <p>
                **Isi kolom di bawah dengan benar.
              </p>
              <div class="example">
                <form class="form-horizontal" action="<?php echo base_url();?>Purchase/update/<?= $data->id_purchase ?>" method="post">

                <div class="form-group">
                    <label class="col-sm-2 control-label">PO Number</label>
                    <div class="col-sm-5">
                      <input type="text" autocomplete="off" placeholder="PO Number" required name="po_number" class="form-control" value="<?= $data->po_number ?>">
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Material</label>
                  <div class="col-sm-5">
                    <input type="text" autocomplete="off" placeholder="Material" required name="raw_material" class="form-control" value="<?= $data->raw_material ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Item</label>
                  <div class="col-sm-5">
                    <input type="text" autocomplete="off" placeholder="Item" required name="item" class="form-control" value="<?= $data->item ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Vendor</label>
                  <div class="col-sm-5">
                    <input type="text" autocomplete="off" placeholder="Vendor" required name="vendor" class="form-control" value="<?= $data->vendor ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Date</label>
                  <div class="col-sm-5">
                    <input type="date" autocomplete="off" placeholder="Date" required name="date" class="form-control" value="<?= $data->date ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Qty</label>
                  <div class="col-sm-5">
                    <input type="text" autocomplete="off" placeholder="Qty" required name="qty" class="form-control" value="<?= $data->qty ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Ammount</label>
                  <div class="col-sm-5">
                    <input type="text" autocomplete="off" placeholder="Ammount" required name="ammount" class="form-control" value="<?= $data->ammount ?>">
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
