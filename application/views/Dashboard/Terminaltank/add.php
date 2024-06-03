<div class="page-content padding-30 container-fluid">

    <div class="page-header">
        <h1 class="page-title">Terminal Tank</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Beranda</a></li>
            <li><a href="<?php echo base_url('Terminal'); ?>">Terminal Tank</a></li>
            <li class="active">Tambah Data</li>
        </ol>
        <div class="page-header-actions">
            <a href="<?php echo base_url('Terminal/detail/'.$id); ?>" class="btn btn-sm btn-danger  btn-round">
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
                        <h4 class="example-title">Tambah Data Tank</h4>
                        <p>
                            **Isi kolom di bawah dengan benar.
                        </p>
                        <div class="example">
                            <form class="form-horizontal" action="<?php echo base_url(); ?>Terminaltank/add_action" method="post">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Parent Unit </label>
                                    <div class="col-sm-4">
                                        <select data-plugin="select2" name="id_terminal" class="form-control" required>
                                            <option></option>
                                            <?php
                                            foreach ($select_terminal as $row) {
                                            ?>
                                                <option value="<?php echo $row->id_terminal; ?>" <?php echo ($row->id_terminal == $id_terminal)?'selected':''?>><?php echo $row->terminal; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">TANK </label>
                                    <div class="col-sm-5">
                                        <input type="text" autocomplete="off" placeholder="Tank" required name="tank" class="form-control">
                                    </div>
                                </div>



                                <!-- <div class="form-group">
                                    <label class="col-sm-2 control-label">Keterangan: </label>
                                    <div class="col-sm-5">
                                        <textarea name="txt2" class="form-control"></textarea>
                                    </div>
                                </div> -->


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