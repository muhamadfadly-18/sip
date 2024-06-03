<div class="page-content padding-30 container-fluid">

    <div class="page-header">
        <h1 class="page-title" style="text-transform: capitalize;">Data Terminal Tank</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Beranda</a></li>
            <li><a href="<?php echo base_url('Terminal'); ?>">Terminal</a></li>
            <li class="active">Terminal Tank</li>
        </ol>
        <div class="page-header-actions">
            <a href="<?php echo base_url('Terminaltank/add/'.$id_terminal); ?>" class="btn btn-sm btn-default btn-block btn-primary btn-round">
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
                <h3 class="panel-title">Daftar Satuan</h3>
            </div>
        </div>


        <div class="panel-body">
            <table class="table table-hover dataTable table-striped width-full overf" data-plugin="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Terminal</th>
                        <th>Tank</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Terminal</th>
                        <th>Tank</th>
                        <th>Option</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php
                    $no = 1;
                    foreach ($data_terminal as $value) :
                        $select_terminal = $this->db->query("SELECT * FROM ref_terminal WHERE id_terminal = '$value->id_terminal'")->row();
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $select_terminal->terminal; ?></td>
                            <td><?= $value->tank; ?></td>

                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-warning dropdown-toggle" id="exampleIconDropdown1" data-toggle="dropdown" aria-expanded="false">
                                        <i class="icon wb-settings" aria-hidden="true"></i>
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" style="min-width:10px;" aria-labelledby="exampleIconDropdown1" role="menu">
                                        <li role="presentation">
                                            <a style="text-decoration:none; text-align:left;" class="btn btn-block btn-default" href="<?php echo base_url('Terminaltank/edit/' . $value->id_tank); ?>">
                                                <i class="icon wb-edit" aria-hidden="true"></i>
                                                Edit
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a style="text-decoration:none; text-align:left;" class="btn btn-block btn-default" href="<?php echo base_url('Terminaltank/delete/' . $value->id_tank.'/'.$value->id_terminal); ?>" onclick="return confirm('Apakah Anda yakin akan menghapus data ini ?')">
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