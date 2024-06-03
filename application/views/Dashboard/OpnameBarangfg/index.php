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
                                                        <th style="text-align: center; vertical-align: middle;">HS Code</th>
                                                        <th style="text-align: center; vertical-align: middle;">Book *Qty</th>
                                                        <th style="text-align: center; vertical-align: middle;">Real *Qty</th>
                                                        <th style="text-align: center; vertical-align: middle;">Diff *Qty</th>
                                                        <th style="text-align: center; vertical-align: middle;">Decription</th>
                                                        <th style="text-align: center; vertical-align: middle;">
                                                            <a class="btn btn-primary addRowPK" onclick="addPK()"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                                        </th>
                                                </thead>
                                                <tbody id="myTablePK">
                                                </tbody>
                                                <div id="dataLimitPK"></div>
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
    function addPK() {
        var table = document.getElementById("myTablePK");
        var row = table.insertRow(0);

        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);

        for (var a = 0; a <= table.rows.length; a++) {
            $('#dataLimitPK').empty();
            $('<input type="hidden" name="limit_pk" value="' + a + '" >').appendTo('#dataLimitPK');
        }

        cell1.innerHTML = '<select class="form-control ClassBarang" style="width:100%;" onchange="validasi()" id="OpnameBarang">' +
            '<option value="0">Pilih</option>' +
            <?php
            foreach ($resultData as $value) {
            ?> '<option value="<?php echo $value->id_barang; ?>"><?php echo $value->id_barang; ?> - <?php echo $value->nama_brg; ?></option>' +
            <?php } ?> '</select>';

        cell2.innerHTML = '<input type="text" style="width:100%;" class="form-control ClassBook" id="book' + a + '">';
        cell3.innerHTML = '<input type="text" style="width:100%;" class="form-control ClassReal" id="real' + a + '">';
        cell4.innerHTML = '<input type="text" style="width:100%;" class="form-control ClassDiff" id="diff' + a + '">';
        cell5.innerHTML = '<input type="text" placeholder="Deskripsi" style="width:100%;" class="form-control ClassDeskripsi">';
        cell6.innerHTML = '<a href="javascript:void(0);" class="btn btn-sm btn-default" style="align:center;" onclick="deleteRowPK(this)"><i class="fa fa-remove"></i></a>';

        $("#real" + a).keyup(function() {
            var book = document.getElementById("book" + a).value;
            var real = document.getElementById("real" + a).value;
            var hasil = book - real;
            if (hasil < 0) {
                document.getElementById("diff" + a).value = '';
            } else {
                document.getElementById("diff" + a).value = hasil;
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


        for (var i = 0; i <= table.rows.length; i++) {

            document.getElementsByClassName("ClassBarang")[i].name = "id_barang" + i;
            document.getElementsByClassName("ClassBook")[i].name = "book" + i;
            document.getElementsByClassName("ClassReal")[i].name = "real" + i;
            document.getElementsByClassName("ClassDiff")[i].name = "diff" + i;
            document.getElementsByClassName("ClassDeskripsi")[i].name = "deskripsi" + i;
        }
    }

    function deleteRowPK(btn) {
        var row = btn.parentNode.parentNode;
        var table = document.getElementById("myTablePK");
        var result = confirm("Are you sure to delete ?");
        if (row.parentNode.removeChild(row)) {
            for (var a = 0; a <= table.rows.length; a++) {
                $('#dataLimitPK').empty();
                $('<input type="hidden" name="limit_pk" value="' + a + '" >').appendTo('#dataLimitPK');
            }
            for (var i = 0; i <= table.rows.length; i++) {

                document.getElementsByClassName("ClassBarang")[i].name = "id_barang" + i;
                document.getElementsByClassName("ClassBook")[i].name = "book" + i;
                document.getElementsByClassName("ClassReal")[i].name = "real" + i;
                document.getElementsByClassName("ClassDiff")[i].name = "diff" + i;
                document.getElementsByClassName("ClassDeskripsi")[i].name = "deskripsi" + i;
            }
        }
    }
</script>