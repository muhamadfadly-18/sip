<div class="page-content padding-30 container-fluid">
  <div class="page-header">
    <h1 class="page-title">Mutasi Produksi</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Beranda</a></li>
      <li><a href="<?php echo base_url('MutasiHP');?>">Mutasi Produksi</a></li>
      <li class="active">Edit Data</li>
    </ol>
    <div class="page-header-actions">
      <a href="<?php echo base_url('MutasiHP');?>" class="btn btn-sm btn-danger  btn-round">
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
              <h4 class="example-title">Edit Data KBLI</h4>
              <p>
                **Isi kolom di bawah dengan benar.
              </p>
              <div class="example">
                <form class="form-horizontal" action="<?php echo base_url();?>MutasiHP/update/<?= $data->id_mutasi_produksi?>" method="post">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Po Number : </label>
                    <div class="col-sm-2">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="Po Number" value="<?= $data->po_number;?>" required name="po_number" class="form-control">
                    </div>                  
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Kode Barang : </label>
                    <div class="col-sm-10">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="Kode Barang" value="<?= $data->kode_barang;?>" required name="kode_barang" class="form-control">
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
                    <div class="col-sm-10">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="satuan" value="<?= $data->satuan;?>" required name="satuan" class="form-control">
                    </div>                   
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Saldo Awal : </label>
                    <div class="col-sm-10">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="saldo Awal" value="<?= $data->saldo_awal;?>" required name="saldo_awal" class="form-control">
                    </div>                   
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Pemasukan : </label>
                    <div class="col-sm-10">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="Pemasukan" value="<?= $data->pemasukan;?>" required name="pemasukan" class="form-control">
                    </div>                   
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Pengeluaran : </label>
                    <div class="col-sm-10">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="Pengeluaran" value="<?= $data->pengeluaran;?>" required name="pengeluaran" class="form-control">
                    </div>                   
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Saldo Akhir : </label>
                    <div class="col-sm-10">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="Saldo Akhir" value="<?= $data->saldo_akhir;?>" required name="saldo_akhir" class="form-control">
                    </div>                   
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Gudang : </label>
                    <div class="col-sm-10">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="Gudang" value="<?= $data->gudang;?>" required name="gudang" class="form-control">
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