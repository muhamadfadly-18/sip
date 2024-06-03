<div class="page-content padding-30 container-fluid">

  <div class="page-header">
    <h1 class="page-title" style="text-transform: capitalize;">Data Jenis Dokumen</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>">Beranda</a></li>
      <li class="active">Jenis Dokumen</li>
    </ol>
    <div class="page-header-actions">
      <a href="<?php echo base_url('Jenis_dokumen/add/'); ?>" class="btn btn-sm btn-default btn-block btn-primary btn-round">
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
    <div class="panel-heading">
      <div class="row">
        <h3 class="panel-title">Daftar Jenis Dokumen</h3>
      </div>
    </div>


    <div class="panel-body">
      <table id="example" class="table table-bordered table-hover nowrap" style="width:100%">
        <thead>
            <tr>
              <th>No</th>
              <th>Dokumen</th>
              <th>Status</th>
              <th>Keterangan</th>
              <th>Opsi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
              <th>No</th>
              <th>Dokumen</th>
              <th>Status</th>
              <th>Keterangan</th>
              <th>Opsi</th>
            </tr>
        </tfoot>
        <tbody>
          <?php
          $no = 1;
          foreach ($data as $value) :
            $num_char = 50;
          ?>
            <tr>
              <td><?= $no++;?></td>
              <td><?= $value->dokumen;?></td>
              <td><?= $value->status;?></td>              
              <td><?= substr($value->keterangan, 0, $num_char) . '...';?></td>

                    <td>
                      <div class="btn-group" role="group">
                            <button type="button" class="btn btn-warning dropdown-toggle" id="exampleIconDropdown1"
                            data-toggle="dropdown" aria-expanded="false">
                              <i class="icon wb-settings" aria-hidden="true"></i>
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" style="min-width:10px;" aria-labelledby="exampleIconDropdown1" role="menu">
                              <li role="presentation">
                                <a style="text-decoration:none; text-align:left;" class="btn btn-block btn-default" href="<?php echo base_url('Jenis_dokumen/edit/'.$value->id_dokumen);?>">
                                <i class="icon wb-edit" aria-hidden="true"></i>
                                Edit
                                </a>
                              </li>
                              <li role="presentation">
                                <a style="text-decoration:none; text-align:left;" class="btn btn-block btn-default" href="<?php echo base_url('Jenis_dokumen/delete/'.$value->id_dokumen);?>" onclick="return confirm('Apakah Anda yakin akan menghapus data ini ?')">
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
</div>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
 --><!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<!-- <script type="text/javascript">
  $(document).on('mousedown', '#exportButton', function(e) {
    swal("Export Jenis_dokumen :", {
        content: "input",
    }).then(function (value) {
        if (value.trim().length > 0)
            $('#exportButton').data('filename', value).trigger('click');
    });
})

  $(document).ready(function() {
    $('#example').DataTable({
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
    });
  });
</script> -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript">
  /*$(document).on('mousedown', '#exportButton', function(e) {
    swal("Export Jenis_dokumen :", {
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