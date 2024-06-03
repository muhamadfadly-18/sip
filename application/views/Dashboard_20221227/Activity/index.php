
<div class="page-content padding-30 container-fluid">

<div class="page-header">
  <div class="page-header-actions">
	  <a href="<?php echo base_url('activity/add/');?>" class="btn btn-sm btn-default btn-block btn-primary">
		  <i aria-hidden="true" class="icon wb-plus"></i>
		  <span class="hidden-xs">Tambah Data</span>
		</a>
  </div>
</div>

<?php
	if(!empty($this->session->flashdata('succeed'))){
		$succeed = '<div class="alert dark alert-alt alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true"><i class="icon wb-close-mini" aria-hidden="true"></i></span>
					  </button>
					  '.$this->session->flashdata('succeed').'
					</div>';
		echo $succeed;
	}
?>

<?php
	if(!empty($this->session->flashdata('failed'))){
		$failed = '<div class="alert dark alert-alt alert-danger alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true"><i class="icon wb-close-mini" aria-hidden="true"></i></span>
				  </button>
				  '.$this->session->flashdata('failed').'
				</div>';

		echo $failed;
	}
?>


<div class="panel panel-bordered">
  <div class="panel-heading">
    <div class="row">
      <h3 class="panel-title">Activity</h3>
    </div>
  </div>
  <div class="panel-body">
    <table class="table table-hover dataTable table-striped width-full overf" data-plugin="dataTable">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Activity</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $no=1;
        foreach ($DataActivity as $value):
      ?>
        <tr>
        <td><?= $no++;?></td>
        <td><?= $value->nama_activity;?></td>
        <td>
            <div class="btn-group" role="group">
              <button type="button" class="btn btn-warning dropdown-toggle" id="exampleIconDropdown1"
              data-toggle="dropdown" aria-expanded="false">
                <i class="icon wb-settings" aria-hidden="true"></i>
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" style="min-width:10px;" aria-labelledby="exampleIconDropdown1" role="menu">
                <li role="presentation">
                  <a style="text-decoration:none; text-align:left;" class="btn btn-block btn-default" href="<?php echo base_url('activity/edit/'.$value->id_activity);?>">
                  <i class="icon wb-edit" aria-hidden="true"></i>
                  Edit
                  </a>
                </li>
                <li role="presentation">
                  <a style="text-decoration:none; text-align:left;" class="btn btn-block btn-default" href="<?php echo base_url('activity/delete/'.$value->id_activity);?>">
                  <i class="icon wb-close" aria-hidden="true"></i>
                  Delete
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
