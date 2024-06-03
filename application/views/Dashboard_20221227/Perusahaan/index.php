<div class="page-content padding-30 container-fluid">

<div class="page-header">
  <div class="page-header-actions">
	  <a href="<?php echo base_url('perusahaan/add/');?>" class="btn btn-sm btn-default btn-block btn-primary">
	      <i aria-hidden="true" class="icon wb-plus"></i>
	      <span class="hidden-xs">Tambah Data</span>
	    </a>
  </div>
</div>

<?php
	if(!empty($this->session->flashdata('success'))){
		$success = '<div class="alert dark alert-alt alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true"><i class="icon wb-close-mini" aria-hidden="true"></i></span>
					  </button>
					  '.$this->session->flashdata('success').'
					</div>';
		echo $success;
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
    		<h3 class="panel-title">Perusahaan</h3>
    	</div>
    </div>


    <div class="panel-body">
    	<table id="example" class="display" style="width:100%">
        <thead>
          <tr>
            <th>No</th>
            <th>NPWP</th>
            <th>Nama Perusahaan</th>
            <th>No. Telp</th>
            <th>Alamat</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        	<?php
        		$no = 1;
        		foreach ($DataPerusahaan as $value) {

        	?>
	        	<tr>
	        		<td><?php echo $no++;?></td>
              <td><?php echo $value->npwp;?></td>
              <td><?php echo $value->nama_perusahaan;?></td>
              <td><?php echo $value->no_telp;?></td>
              <td><?php echo $value->alamat;?></td>
	        		<td>
	        			<div class="btn-group" role="group">
                  <button type="button" class="btn btn-warning dropdown-toggle" id="exampleIconDropdown1"
                  data-toggle="dropdown" aria-expanded="false">
                    <i class="icon wb-settings" aria-hidden="true"></i>
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" style="min-width:10px;" aria-labelledby="exampleIconDropdown1" role="menu">
                    <li role="presentation">
                    	<a style="text-decoration:none; text-align:left;" class="btn btn-block btn-default" href="<?php echo base_url('perusahaan/edit/'.$value->id_perusahaan);?>">
                    	<i class="icon wb-edit" aria-hidden="true"></i>
                    	Edit
                    	</a>
                    </li>
                    <li role="presentation">
                    	<a style="text-decoration:none; text-align:left;" class="btn btn-block btn-default" href="<?php echo base_url('perusahaan/delete/'.$value->id_perusahaan);?>" onclick="return confirm('Apakah Anda yakin akan menghapus data ini ?')">
                    	<i class="icon wb-close" aria-hidden="true"></i>
                    	Hapus
                    	</a>
                    </li>
                  </ul>
              	</div>
	        		</td>
	        	</tr>
        	<?php }?>
        </tbody>
     </table>
    </div>
  </div>

</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5'
            ]
        } );
    } );
    </script>