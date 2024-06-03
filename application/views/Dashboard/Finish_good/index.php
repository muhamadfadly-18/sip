<style>
  div.container {
    overflow: auto;
    width: 100%;
  }
</style>
<div class="page-content padding-30 container-fluid">

  <div class="page-header">
    <h1 class="page-title" style="text-transform: capitalize;">Data Penerimaan Barang Hasil Blending</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>">Beranda</a></li>
      <li class="active">Data Penerimaan Barang Hasil Blending</li>
    </ol>
    <div class="page-header-actions">
      <a href="<?php echo base_url('Finish_good/add/'); ?>" class="btn btn-sm btn-default btn-block btn-primary btn-round">
        <i aria-hidden="true" class="icon wb-plus"></i>
        <span class="hidden-xs">Tambah Data</span>
      </a>
    </div>
  </div>

  <?php
  if (!empty($this->session->flashdata('succeed'))) {
    $succeed = '<div class="alert dark alert-alt alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="icon wb-close-mini" aria-hidden="true"></i></span>
              </button>
              ' . $this->session->flashdata('succeed') . '
            </div>';
    echo $succeed;
  }
  ?>

  <?php
  if (!empty($this->session->flashdata('failed'))) {
    $failed = '<div class="alert dark alert-alt alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true"><i class="icon wb-close-mini" aria-hidden="true"></i></span>
            </button>
            ' . $this->session->flashdata('failed') . '
          </div>';

    echo $failed;
  }
  ?>


  <div class="panel panel-bordered panel-primary">
    <form class="form-horizontal" id="IdForm" method="post">
      <div class="panel-heading">
        <div class="row">
          <h3 class="panel-title"></h3>
        </div>
      </div>


      <div class="panel-body">

        <?php
        $current_date = date("m/d/Y");
        ?>

        <div class="form-group">
          <label class="col-sm-1 control-label">Tanggal: </label>
          <div class="col-sm-6">
            <div class="input-daterange" data-plugin="datepicker">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="icon wb-calendar" aria-hidden="true"></i>
                </span>
                <input type="text" class="form-control" name="tgl_awal" placeholder="Tanggal Awal">
              </div>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-arrows-h" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="tgl_akhir" placeholder="Tanggal Akhir">
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-11 col-sm-offset-1">
            <button type="button" class="btn btn-labeled btn-warning" onclick="subFilter();">
              <span class="btn-label"><i class="icon fa-filter" aria-hidden="true"></i></span>Filter
            </button>
          </div>
        </div>

        <div class="container">
          <table id="example" class="table table-bordered table-hover nowrap" style="width:100%">
            <thead>
              <tr>
              <th>No</th>
              <th>Po Number</th>
              <th>NO Bukti Penerima</th>
              <th>Tanggal Finish Goods</th>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>Satuan</th>
              <th>Jumlah Dari Produksi</th>
              <th>Jumlah Dari SubKontrak</th>
              <th>Gudang</th>
              <th>Opsi</th>
            </tr>
            </thead>

            <tbody>
              <?php
            $no = 1;
            foreach ($data as $value) :
              $no_po = $this->db->query("SELECT id_purchase,po_number FROM purchase WHERE id_purchase = '$value->po_number' ")->row();
              if (!empty($no_po)) {
                $number = $no_po->po_number;
              } else {
                $number = '-';
              }
            ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $number; ?></td>
                <td><?= $value->bukti_penerimaan_no; ?></td>
                <td><?= $value->tanggal_finish_goods; ?></td>
                <td><?= $value->kode_barang; ?></td>
                <td><?= $value->nama_barang; ?></td>
                <td><?= $value->satuan; ?></td>
                <td><?= $value->jumlah_dari_produksi; ?></td>
                <td><?= $value->jumlah_dari_subkontrak; ?></td>
                <td>Asinusa</td>
                <td>
                  <div class="btn-group" role="group">
                    <button type="button" class="btn btn-warning dropdown-toggle" id="exampleIconDropdown1" data-toggle="dropdown" aria-expanded="false">
                      <i class="icon wb-settings" aria-hidden="true"></i>
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" style="min-width:10px;" aria-labelledby="exampleIconDropdown1" role="menu">
                      <li role="presentation">
                        <a style="text-decoration:none; text-align:left;" class="btn btn-block btn-default" href="<?php echo base_url('Finish_good/edit/' . $value->id_finish_goods); ?>">
                          <i class="icon wb-edit" aria-hidden="true"></i>
                          Edit
                        </a>
                      </li>
                      <li role="presentation">
                        <a style="text-decoration:none; text-align:left;" class="btn btn-block btn-default" href="<?php echo base_url('Finish_good/delete/' . $value->id_finish_goods); ?>" onclick="return confirm('Apakah Anda yakin akan menghapus data ini ?')">
                          <i class="icon wb-close" aria-hidden="true"></i>
                          Hapus
                        </a>
                      </li>
                    </ul>
                  </div>

                </td>
              </tr>
            <?php
            endforeach;
            ?>
            </tbody>
          </table>
        </div>
      </div>
    </form>
  </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript">
  function subFilter() {
    document.getElementById("IdForm").action = "<?php echo base_url(); ?>Finish_good";
    document.getElementById("IdForm").submit();

    return true;
  }
  /*$(document).on('mousedown', '#exportButton', function(e) {
    swal("Export Terminal :", {
        content: "input",
    }).then(function (value) {
        if (value.trim().length > 0)
            $('#exportButton').data('filename', value).trigger('click');
    
})*/
    $(document).ready(function() {
        $('#example').DataTable( {
            "dom": 'Bfrtip',
        "searching": true,
        "paging": true,
        "info": true,
        buttons: [{
            extend: 'excelHtml5',
            className: 'btn btn-primary btn-sm',
            text: 'Export',
            autoFilter: true,
            attr: {id: 'exportButton'},
            sheetName: 'data',
            title: '',
            filename: function ( ) {
                return $('#exportButton').data('filename');
            }
        }]
        } );
    } );

    
    </script>