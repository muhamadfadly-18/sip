<div class="page-content padding-30 container-fluid">

  <div class="page-header">
    <h1 class="page-title">Perusahaan</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Beranda</a></li>
      <li><a href="<?php echo base_url('Client');?>">Perusahaan</a></li>
      <li class="active">Edit Data</li>
    </ol>
    <div class="page-header-actions">
      <a href="<?php echo base_url('Client');?>" class="btn btn-sm btn-danger  btn-round">
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
              <h4 class="example-title">Edit Data Perusahaan</h4>
              <p>
                **Isi kolom di bawah dengan benar.
              </p>
              <div class="example">
                <form class="form-horizontal" action="<?php echo base_url();?>Client/update/<?= $data->id_client ?>" method="post">

                <div class="form-group">
                    <label class="col-sm-2 control-label">Jenis : </label>
                    <div class="col-sm-3">
                      <select name='jenis' id="jenis" class="form-control">
                         <!-- <option value=''>None</option>-->
                        <option value='Customer' <?= ($data->jenis == 'Customer') ? 'selected' : '';?> >Customer</option>
                        <option value='Supplier' <?= ($data->jenis == 'Supplier') ? 'selected' : '';?> >Supplier</option>
                        <option value='Subcon' <?= ($data->jenis == 'Subcon') ? 'selected' : '';?> >Subcon</option> 
                        </select>
                    </div>
                  </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Company Name: </label>
                    <div class="col-sm-5">
                      <input type="text" autocomplete="off" placeholder="Company Name" required name="txt1" class="form-control" value="<?= $data->company_name ?>">
                    </div>
                  </div>
              <div class="form-group">
                  <label class="col-sm-2 control-label">Address: </label>
                  <div class="col-sm-5">
                    <textarea name="txt2" class="form-control"><?= $data->address ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Phone: </label>
                    <div class="col-sm-5">
                      <input type="text" autocomplete="off" placeholder="Phone" required name="txt3" class="form-control" value="<?= $data->phone ?>">
                    </div>
                  </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Contact Name: </label>
                    <div class="col-sm-5">
                      <input type="text" autocomplete="off" placeholder="Contact Name" required name="txt4" class="form-control" value="<?= $data->contact_name ?>">
                    </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Contact Email: </label>
                      <div class="col-sm-5">
                        <input type="text" autocomplete="off" placeholder="Contact Email" required name="txt5" class="form-control" value="<?= $data->contact_email ?>">
                      </div>
                    </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Contact Phone: </label>
                      <div class="col-sm-5">
                        <input type="text" autocomplete="off" placeholder="Contact Phone" required name="txt6" class="form-control" value="<?= $data->contact_phone ?>">
                      </div>
                    </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Status : </label>
                    <div class="col-sm-3">
                      <select name='status' id="status" class="form-control">
                         <!-- <option value=''>None</option>-->
                        <option value='Active' <?= ($data->jenis == 'Active') ? 'selected' : '';?> >Active</option>
                        <option value='Non Active' <?= ($data->jenis == 'Non Active') ? 'selected' : '';?> >Non Active</option>

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
