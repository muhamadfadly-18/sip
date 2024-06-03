<div class="page-content padding-30 container-fluid">

    <div class="page-header">
        <h1 class="page-title">Stock Opname Barang FG</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Beranda</a></li>
            <li><a href="<?php echo base_url('OpnameBarangfg'); ?>">Opname Barang FG</a></li>
            <li class="active">Create Stock Opname Barang FG</li>
        </ol>
        <div class="page-header-actions">
            <a href="<?php echo base_url('OpnameBarangfg'); ?>" class="btn btn-sm btn-danger  btn-round">
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
                        <h4 class="example-title">Tambah Stock Opname</h4>
                        <p>
                            **Isi kolom di bawah dengan benar.
                        </p>
                        <div class="example">
                            <form class="form-horizontal" action="<?php echo base_url(); ?>OpnameBarangfg/add_action" method="post">

                                <div class="form-group">
                                    <div class="col-sm-12 col-sm-offset-0">
                                        <div class="table-responsive">
                                            <input type="text" id="idTotalPpn" name="totalPN" style="display: none;">

                                            <table id="show_table_ap" class="table table-hover table-bordered dataTable table-striped width-full overf">
                                                <thead>
                                                    <tr>
                                                        <th>HS Code</th>
                                                        <th>Book *Qty</th>
                                                        <th>Real *Qty</th>
                                                        <th>Diff *Qty</th>
                                                        <th>Decription</th>

                                                </thead>

                                                <tbody id="tbodyid">
                                                    <tr>
                                                        <td>
                                                            <select class="form-control" style="width:100%;" onchange="validasi()" name="keterangan" id="OpnameBarang">
                                                                <option value="0">Pilih</option>
                                                                <?php
                                                                foreach ($resultData as $value) {
                                                                ?>
                                                                    <option value="<?php echo $value->id_barang; ?>"><?php echo $value->id_barang; ?> - <?php echo $value->nama_brg; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="book" class="form-control" id="book">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="real" class="form-control" id="real">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="diff" class="form-control" id="diff">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="deskripsi" placeholder="Deskripsi" class="form-control">
                                                        </td>
                                                        <td style="width: 1%; border-bottom: 1px solid black;">
                                                            <a class="btn btn-primary addRowPK" onclick="addPK()"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-8 ">
                                        <input class="btn btn-primary" type="submit" value="Create">
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
<script src="<?php echo base_URL() ?>jquery.js"></script>
<script type="text/javascript">
    $("#real").keyup(function() {
        var book = document.getElementById("book").value;
        var real = document.getElementById("real").value;
        var hasil = book - real;
        if (hasil < 0) {
            document.getElementById("diff").value = '';
        } else {
            document.getElementById("diff").value = hasil;
        }

    });

    $(".selectX").select2({
        placeholder: "Select",
        allowClear: true
    });

    function validasi() {
        var OpnameBarang = $("#OpnameBarang").val();
        $.ajax({
            type: 'POST',
            url: "<?php echo base_URL('OpnameBarangfg/Validasibarang'); ?>",
            data: "OpnameBarang=" + OpnameBarang,
            cache: false,
            success: function(data) {
                var str = data;
                var ckhsl = str.replace('"', '');
                var rckhsl = ckhsl.replace('"', '');
                document.getElementById("book").value = rckhsl;
            }
        });
    }
</script>