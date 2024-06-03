<div class="page-content padding-30 container-fluid">

  <div class="page-header">
    <h1 class="page-title">Sub Kontrak</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Beranda</a></li>
      <li><a href="<?php echo base_url('SubKontrak');?>">Sub Kontrak</a></li>
      <li class="active">Edit Data</li>
    </ol>
    <div class="page-header-actions">
      <a href="<?php echo base_url('SubKontrak');?>" class="btn btn-sm btn-danger  btn-round">
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
              <h4 class="example-title">Edit Data Sub Kontrak</h4>
              <p>
                **Isi kolom di bawah dengan benar.
              </p>
              <div class="example">
                <form class="form-horizontal" action="<?php echo base_url();?>SubKontrak/update/<?= $data->id_subkontrak?>" method="post">

                <div class="form-group">
                    <label class="col-sm-2 control-label">Po Number : </label>
                    <div class="col-sm-2">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="Po Number"  value="<?= $data->po_number;?>" required name="po_number" class="form-control">
                    </div>                  
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">No Bukti Pengeluaran: </label>
                    <div class="col-sm-10">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="NO Bukti Pengeluaran" value="<?= $data->bukti_pengeluaran_no;?>" required name="bukti_pengeluaran_no" class="form-control">
                    </div>                   
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Tanggal Subkontrak : </label>
                    <div class="col-sm-2">
                      <input type="hidden" name="id_group">
                      <input type="date" autocomplete="off" placeholder="Tanggal Subkontrak" value="<?= $data->tanggal_subkontrak;?>" required name="tanggal_subkontrak" class="form-control">
                    </div>                   
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Kode Barang : </label>
                    <div class="col-sm-10">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="Kode barang" value="<?= $data->kode_barang;?>" required name="kode_barang" class="form-control">
                    </div>                   
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Barang : </label>
                    <div class="col-sm-10">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="Nama Barang" value="<?= $data->nama_barang;?>" required name="nama_barang" class="form-control">
                    </div>                   
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Satuan : </label>
                    <div class="col-sm-2">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="Satuan" value="<?= $data->satuan;?>" required name="satuan" class="form-control">
                    </div>                   
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Disubkontrakkan : </label>
                    <div class="col-sm-10">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="Disubkontrakkan" value="<?= $data->disubkontrakkan;?>" required name="disubkontrakkan" class="form-control">
                    </div>                   
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Penerima Subkontrak : </label>
                    <div class="col-sm-10">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="Penerima Subkontrak" value="<?= $data->penerima_subkontrak;?>" required name="penerima_subkontrak" class="form-control">
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