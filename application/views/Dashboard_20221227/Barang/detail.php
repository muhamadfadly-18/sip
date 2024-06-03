
<div class="page-content padding-30 container-fluid">

	<div class="page-header">
	  <h1 class="page-title" style="text-transform: capitalize;">Data Detail Barang</h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo base_url(); ?>">Beranda</a></li>
      <li><a href="<?php echo base_url('Barang'); ?>">Barang</a></li>
      <li class="active">Detail Barang</li>
	  </ol>
	  
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
	            		<h3 class="panel-title">Daftar Detail Barang</h3>
	            	</div>
	            </div>


	            <div class="panel-body">
	            	<table id="IdTabel1" class="table table-striped table-bordered table-sm" cellspacing="0" width="150%">
				        <thead>
				          <tr>
	                         <tr>
	                          
	                            <th rowspan="2" style="vertical-align:middle;">HS Code</th>
	                            <th rowspan="2" style="text-align: center;">Uraian Barang</th>
	                            <th rowspan="2" style="text-align: center;">Lokasi</th>
	                            <th colspan="14" style="text-align: center;">Tank</th>
	                            
	                        </tr> 
	                         <tr>
	                            <th style="vertical-align:top";>1.A</th>
	                            <th style="vertical-align:top";>1.B</th>
	                            <th style="vertical-align:top";>2.A</th>
								<th style="vertical-align:top";>2.B</th>
			                    <th style="vertical-align:top";>3.A</th>
			                    <th style="vertical-align:top";>3.B</th>
								<th style="vertical-align:top";>4.A</th>
			                    <th style="vertical-align:top";>4.B</th>
			                    <th style="vertical-align:top";>5.A</th>
			                    <th style="vertical-align:top";>5.B</th>
			                    <th style="vertical-align:top";>6.A</th>
			                    <th style="vertical-align:top";>6.B</th>
			                    <th style="vertical-align:top";>Total</th>
	         
	                        </tr>             
	 
	                  </tr>
				        </thead>
				        
				        <tbody>
				        <?php
				        	$no=1;
				        	foreach ($data as $value):
				        ?>
				          <tr>
										<td><?= $value->id_barang;?></td>
										<td><?= $value->nama_brg;?></td>
										<td><?= $value->terminal_terapung;?></td>
										<td><?= $value->stok_tank1;?></td>
										<td><?= $value->stok_tank2;?></td>
										<td><?= $value->stok_tank3;?></td>
										<td><?= $value->stok_tank4;?></td>
										<td><?= $value->stok_tank5;?></td>
										<td><?= $value->stok_tank6;?></td>
										<td><?= $value->stok_tank7;?></td>
										<td><?= $value->stok_tank8;?></td>
										<td><?= $value->stok_tank9;?></td>
										<td><?= $value->stok_tank10;?></td>
										<td><?= $value->stok_tank11;?></td>
										<td><?= $value->stok_tank12;?></td>
										<td><?= $value->stok;?></td>
				          </tr>
				          <?php
				          	endforeach;
				          ?>
				        </tbody>
				     </table>
	            </div>
	    </div>
</div>
<script src="<?php echo base_URL()?>jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
	  $('#IdTabel1').DataTable({
	    "scrollX": true,
	  });
	  $('.dataTables_length').addClass('bs-select');
	});

</script>