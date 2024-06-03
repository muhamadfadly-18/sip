<div class="page-content padding-30 container-fluid">

  <div class="page-header">
    <h1 class="page-title">Saldo Awal</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Beranda</a></li>
      <li><a href="<?php echo base_url('kbli');?>">Saldo Awal</a></li>
      <li class="active">Tambah Data</li>
    </ol>
    <div class="page-header-actions">
      <a href="<?php echo base_url('SaldoAwal');?>" class="btn btn-sm btn-danger  btn-round">
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
              <h4 class="example-title">Tambah Data Saldo Awal Baru</h4>
              <p>
                **Isi kolom di bawah dengan benar.
              </p>

              <div class="example">
              <form class="form-horizontal" action="<?php echo base_url();?>SaldoAwal/add_action" method="post">
                <div class="form-group">
                  <label class="col-sm-2 control-label">No Rek : </label>
                  <div class="col-sm-10">
                    <select data-plugin="select2" data-placeholder="Pilih Satu" name="no_rek" class="form-control" required>
                      <option></option>
                      <?php
                        $selectrek = $this->db->query("SELECT * FROM rekening")->result();
                        foreach($selectrek as $value){
                      ?>
                        <option value="<?php echo $value->no_rek; ?>"><?php echo $value->nama_rek; ?></option>
                      <?php
                        }
                      ?>
                    </select>
                  </div>
                </div>
                  <tr>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">No Account : </label>
                    <div class="col-sm-10">
                      <input type="hidden" name="no_rek">
                      <input type="text" autocomplete="off" placeholder="" required name="no_rek" class="form-control">
                    </div>                   
                  </div>
                   <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Account : </label>
                    <div class="col-sm-10">
                      <input type="hidden" name="nama_rek">
                      <input type="text" autocomplete="off" placeholder="" required name="nama_rek" class="form-control">
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

