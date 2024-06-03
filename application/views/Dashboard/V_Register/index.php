<div class="page-content padding-30 container-fluid">

<div class="page-header">
  <h1 class="page-title" style="text-transform: capitalize;">Register Vessel</h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Beranda</a></li>
    <li class="active">Register Vessel</li>
  </ol>
  <div class="page-header-actions">
	  <a href="<?php echo base_url('Register/add/');?>" class="btn btn-sm btn-default btn-block btn-primary btn-round">
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


	<div class="panel panel-bordered panel-primary">
    <div class="panel-heading">
    	<div class="row">
    		<h3 class="panel-title">Daftar Data Register Vessel</h3>
    	</div>
    </div>
    <div class="panel-body">

    </div>
  </div>

</div>
