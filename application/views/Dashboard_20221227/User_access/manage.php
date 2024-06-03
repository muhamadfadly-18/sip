
<div class="page-content padding-30 container-fluid">

<div class="page-header">
  <h1 class="page-title">Pengelolaan Kewenangan Pengguna</h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Beranda</a></li>
    <li><a href="<?php echo base_url('group');?>">Kewenangan Pengguna</a></li>
    <li class="active">Pengelolaan Kewenangan Pengguna</li>
  </ol>
  <div class="page-header-actions">
    <a href="<?php echo base_url('group');?>" class="btn btn-sm btn-danger  btn-round">
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
          <form class="form-horizontal" action="<?php echo base_url();?>group/update_manage/<?= $data_group->id_group;?>" method="post">
          <div class="table-responsive">
                <table class="table table-bordered" style="border-collapse: inherit;">
                  <thead>
                    <tr class="active">
                     <th width="500px" style="vertical-align:middle;">Nama Module</th>
                     <th width="50px" style="vertical-align:middle; text-align:center;">Akses</th>
                     <th width="50px" style="vertical-align:middle; text-align:center;">Tambah</th>
                     <th width="50px" style="vertical-align:middle; text-align:center;">Melihat</th>
                     <th width="50px" style="vertical-align:middle; text-align:center;">Edit</th>
                     <th width="50px" style="vertical-align:middle; text-align:center;">Hapus</th>
                     <th width="50px" style="vertical-align:middle; text-align:center;">Ex. Excel</th>
                     <th width="50px" style="vertical-align:middle; text-align:center;">Ex. Pdf</th> 
                    </tr>
                  </thead>
                  <tfoot>
                    <tr class="active">
                     <th width="500px" style="vertical-align:middle;">Nama Module</th>
                     <th width="50px" style="vertical-align:middle; text-align:center;">Akses</th>
                     <th width="50px" style="vertical-align:middle; text-align:center;">Tambah</th>
                     <th width="50px" style="vertical-align:middle; text-align:center;">Melihat</th>
                     <th width="50px" style="vertical-align:middle; text-align:center;">Edit</th>
                     <th width="50px" style="vertical-align:middle; text-align:center;">Hapus</th>
                     <th width="50px" style="vertical-align:middle; text-align:center;">Ex. Excel</th>
                     <th width="50px" style="vertical-align:middle; text-align:center;">Ex. Pdf</th> 
                    </tr>
                  </tfoot>
                  <tbody>
                  
                    <?php
                        $array = $data_user_access;
                        $parent_id = "0";
                        $parents = array();
                        echo $this->model_user_access->table_checkbox($array,$parent_id,$parents);
                      ?>
                    
                  </tbody>
                </table>
            </div>
            <div class="col-md-12">
                    <input class="btn btn-primary" type="submit" value="Update">
                  </div>
           </form>
          <!-- End Example Horizontal Form -->
        </div>
      </div>
    </div>
  </div>


</div>
