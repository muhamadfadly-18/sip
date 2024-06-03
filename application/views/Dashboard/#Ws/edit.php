<div class="page-content padding-30 container-fluid">

  <div class="page-header">
    <h1 class="page-title">Waste Scrap</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Beranda</a></li>
      <li><a href="<?php echo base_url('Ws');?>">Waste Scrap</a></li>
      <li class="active">Tambah Data</li>
    </ol>
    <div class="page-header-actions">
      <a href="<?php echo base_url('Ws');?>" class="btn btn-sm btn-danger  btn-round">
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
              <h4 class="example-title">Edit Data Waste Scrap</h4>
              <p>
                **Isi kolom di bawah dengan benar.
              </p>
              <div class="example">
                <form class="form-horizontal" action="<?php echo base_url();?>Ws/update/<?= $data->id_waste_scrap?>" method="post">

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Po Number : </label>
                    <div class="col-sm-2">
                      <input type="text" autocomplete="off" placeholder="Po Number" value="<?= $data->po_number;?>" required name="po_number" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">No BC : </label>
                    <div class="col-sm-10">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="No Bc" value="<?= $data->no_bc;?>" required name="no_bc" class="form-control">
                    </div>                   
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Tanggal BC : </label>
                    <div class="col-sm-10">
                      <input type="hidden" name="id_group"> 
                      <input type="date" autocomplete="off" placeholder="Tanggal BC" required name="tanggal_bc" class="form-control" value="<?= $data->tanggal_bc;?>">
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
                      <input type="text" autocomplete="off" placeholder="Satuan" value="<?= $data->satuan;?>" required name="satuan" class="form-control">
                    </div>                   
                  </div>
                 
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Jumlah : </label>
                    <div class="col-sm-10">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="Jumlah" value="<?= $data->jumlah;?>" required name="jumlah" class="form-control">
                    </div>                   
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nilai : </label>
                    <div class="col-sm-10">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="Nilai" value="<?= $data->nilai;?>" required name="nilai" class="form-control">
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