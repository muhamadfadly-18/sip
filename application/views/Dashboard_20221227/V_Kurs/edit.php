<div class="page-content padding-30 container-fluid">

<div class="page-header">
    <h1 class="page-title">Pengelolaan Kurs</h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>">Beranda</a></li>
        <li><a href="<?php echo base_url('Kurs');?>">Data Kurs</a></li>
        <li class="active">Edit Kurs</li>
    </ol>
    <div class="page-header-actions">
        <a href="<?php echo base_url('Kurs');?>" class="btn btn-sm btn-danger  btn-round">
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
                <h4 class="example-title">Edit Kurs</h4>
                <div class="example">
                    <form class="form-horizontal" action="<?php echo base_url();?>Kurs/update/<?php echo $data->id_kurs;?>" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">kurs : </label>
                            <div class="col-sm-8">
                              <input type="text" autocomplete="off" placeholder="Kurs" required name="Kurs" class="form-control" value="<?= $data->kurs; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Mata Uang : </label>
                            <div class="col-sm-8">
                                <input type="text" autocomplete="off" placeholder="Mata Uang" required name="mata_uang" class="form-control" value="<?= $data->mata_uang; ?>">
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
