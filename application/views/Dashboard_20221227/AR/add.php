<div class="page-content padding-30 container-fluid">

<div class="page-header">
  <h1 class="page-title">Account Received</h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Beranda</a></li>
    <li><a href="<?php echo base_url('AR');?>">Account Received</a></li>
    <li class="active">Tambah Data</li>
  </ol>
  <div class="page-header-actions">
    <a href="<?php echo base_url('AR');?>" class="btn btn-sm btn-danger  btn-round">
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
            <div class="example">
              <form class="form-horizontal" action="<?php echo base_url();?>AR/add_action" method="post">


                <div class="form-group">
                  <label class="col-sm-4 control-label">PO Number : </label>
                  <div class="col-sm-8">
                    <input type="text" autocomplete="off" placeholder="PO Number" required name="po_number" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">Invoice Number : </label>
                  <div class="col-sm-8">
                    <input type="text" autocomplete="off" placeholder="Invoice Number" required name="invoice_number" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">PEB Number : </label>
                  <div class="col-sm-8">
                    <input type="text" autocomplete="off" placeholder="PEB Number" required name="peb_number" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">PEB Number : </label>
                  <div class="col-sm-8">
                    <input type="text" autocomplete="off" placeholder="PEB Number" required name="peb_number" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">Tanggal AR : </label>
                  <div class="col-sm-8">
                    <input type="text" autocomplete="off" placeholder="Tanggal AR" required name="tanggal_ar" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">Ammount : </label>
                  <div class="col-sm-8">
                    <input type="text" autocomplete="off" placeholder="Ammount" required name="ammount" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">QTY : </label>
                  <div class="col-sm-8">
                    <input type="text" autocomplete="off" placeholder="QTY" required name="qty" class="form-control">
                  </div>
                </div>


                <div class="form-group">
                  <div class="col-sm-8 col-sm-offset-4">
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