<div class="page-content padding-30 container-fluid">

  <div class="page-header">
    <h1 class="page-title">Pemasukan Bahan Baku</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Beranda</a></li>
      <li><a href="<?php echo base_url('PemasukanBB');?>">Pemasukan Bahan Baku</a></li>
      <li class="active">Edit Data</li>
    </ol>
    <div class="page-header-actions">
      <a href="<?php echo base_url('PemasukanBB');?>" class="btn btn-sm btn-danger  btn-round">
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
              <h4 class="example-title">Edit Data Pemasukan Bahan Baku Baru</h4>
              <p>
                **Isi kolom di bawah dengan benar.
              </p>
              <div class="example">
                <form class="form-horizontal" action="<?php echo base_url();?>PemasukanBB/update/<?= $data->id_import?>" method="post">

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Po Number : </label>
                      <div class="col-sm-2">
                        <input type="hidden" name="id_group">
                        <input type="text" autocomplete="off" placeholder="Po Number" value="<?= $data->po_number;?>" required name="po_number" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Jenis Dokumen: </label>
                      <div class="col-sm-10">
                        <input type="hidden" name="id_group">
                        <input type="text" autocomplete="off" placeholder="Jenis Dokumen" value="<?= $data->jenis_dokumen;?>" required name="jenis_dokumen" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">No Dokumen Pabean: </label>
                      <div class="col-sm-10">
                        <input type="hidden" name="id_group">
                        <input type="text" autocomplete="off" placeholder="No Dokumen Pabean" value="<?= $data->no_dokumen_pabean;?>" required name="no_dokumen_pabean" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Tanggal Dokumen Pabean : </label>
                      <div class="col-sm-2">
                        <input type="hidden" name="id_group">
                        <input type="date" autocomplete="off" placeholder="Tanggal Dokumen Pabean" value="<?= $data->tanggal_dokumen_pabean;?>" required name="tanggal_dokumen_pabean" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">No Seri Barang : </label>
                      <div class="col-sm-10">
                        <input type="hidden" name="id_group">
                        <input type="text" autocomplete="off" placeholder="No Seri Barang " value="<?= $data->no_seri_barang;?>" required name="no_seri_barang" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">No Bukti Penerimaan Barang : </label>
                      <div class="col-sm-10">
                        <input type="hidden" name="id_group">
                        <input type="text" autocomplete="off" placeholder="No Bukti Penerimaan Barang" value="<?= $data->no_bukti_penerimaan_barang;?>" required name="no_bukti_penerimaan_barang" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Tanggal Bukti Penerimaan Barang : </label>
                      <div class="col-sm-2">
                        <input type="hidden" name="id_group">
                        <input type="date" autocomplete="off" placeholder="Tanggal Bukti Penerimaan Barang" value="<?= $data->tanggal_bukti_penerimaan_barang;?>" required name="tanggal_bukti_penerimaan_barang" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Kode Barang : </label>
                      <div class="col-sm-2">
                        <input type="hidden" name="id_group">
                        <input type="text" autocomplete="off" placeholder="Kode Barang" value="<?= $data->kode_barang;?>" required name="kode_barang" class="form-control">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Nama Barang : </label>
                      <div class="col-sm-2">
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
                      <label class="col-sm-2 control-label">Mata Uang : </label>
                      <div class="col-sm-10">
                        <input type="hidden" name="id_group">
                        <input type="text" autocomplete="off" placeholder="Mata Uang" value="<?= $data->mata_uang;?>" required name="mata_uang" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Nilai Barang : </label>
                      <div class="col-sm-10">
                        <input type="hidden" name="id_group">
                        <input type="text" autocomplete="off" placeholder="Nilai Barang" value="<?= $data->nilai_barang;?>" required name="nilai_barang" class="form-control">
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
                      <label class="col-sm-2 control-label">Penerima Subkontrak : </label>
                      <div class="col-sm-10">
                        <input type="hidden" name="id_group">
                        <input type="text" autocomplete="off" placeholder="Penerima Subkontrak" value="<?= $data->penerima_subkontrak;?>" required name="penerima_subkontrak" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Negara Asal Barang : </label>
                      <div class="col-sm-10">
                        <input type="hidden" name="id_group">
                        <input type="text" autocomplete="off" placeholder="Negara Asal Barang " value="<?= $data->negara_asal_barang;?>" required name="negara_asal_barang" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Adjustment : </label>
                      <div class="col-sm-10">
                        <input type="hidden" name="id_group">
                        <input type="text" autocomplete="off" placeholder="Adjustment" value="<?= $data->adjustment;?>" required name="adjustment" class="form-control">
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
