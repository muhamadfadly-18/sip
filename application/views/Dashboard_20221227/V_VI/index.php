
<div class="page-content padding-30 container-fluid">

	<div class="page-header">
	  <h1 class="page-title" style="text-transform: capitalize;">Vessel Information</h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo base_url();?>">Beranda</a></li>
	    <li class="active">Vessel Information</li>
	  </ol>
	  <div class="page-header-actions">
		  <a href="<?php echo base_url('VI/add/');?>" class="btn btn-sm btn-default btn-block btn-primary btn-round">
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
	            		<h3 class="panel-title">Daftar Data Vessel Information</h3>
	            	</div>
	            </div>


	            <div class="panel-body">
	            	<table class="table table-hover dataTable table-striped width-full overf" data-plugin="dataTable">
				        <thead>
				          <tr>
				            <th>No</th>
				            <th>Name of Vessel</th>
				            <th>Flag (Call Sign)</th>
				            <th>Ship Owner</th>
										<th>Type of Vessel</th>
										<th>Port of Register</th>
										<th>Last Port of Call</th>
										<th>Next Port Of Call</th>
										<th>GRT</th>
										<th>DWT</th>
										<th>LOA</th>
										<th>Cargo Transfer MT</th>
										<th>Cargo Type</th>
										<th>Mother/ Feeder Vessel</th>

				            <th>Opsi</th>
				          </tr>
				        </thead>
				        <tfoot>
				          <tr>
										<th>No</th>
 									 <th>Name of Vessel</th>
 									 <th>Flag (Call Sign)</th>
 									 <th>Ship Owner</th>
 									 <th>Type of Vessel</th>
 									 <th>Port of Register</th>
 									 <th>Last Port of Call</th>
 									 <th>Next Port Of Call</th>
 									 <th>GRT</th>
 									 <th>DWT</th>
 									 <th>LOA</th>
 									 <th>Cargo Transfer MT</th>
 									 <th>Cargo Type</th>
 									 <th>Mother/ Feeder Vessel</th>
 								 	 <th>Opsi</th>
				          </tr>
				        </tfoot>
				        <tbody>
				        <?php
				        	$no=1;
				        	foreach ($data as $value):
				        ?>
				          <tr>
				            <td><?= $no++;?></td>
				            <td><?= $value->po_number;?></td>
										<td><?= $value->bukti_pengeluaran_no;?></td>
										<td><?= $value->tanggal_subkontrak;?></td>
										<td><?= $value->kode_barang;?></td>
										<td><?= $value->nama_barang;?></td>
										<td><?= $value->satuan;?></td>
										<td><?= $value->disubkontrakkan;?></td>
										<td><?= $value->penerima_subkontrak;?></td>

				            <td>
				            	<div class="btn-group" role="group">
				                    <button type="button" class="btn btn-warning dropdown-toggle" id="exampleIconDropdown1"
				                    data-toggle="dropdown" aria-expanded="false">
				                      <i class="icon wb-settings" aria-hidden="true"></i>
				                      <span class="caret"></span>
				                    </button>
				                    <ul class="dropdown-menu" style="min-width:10px;" aria-labelledby="exampleIconDropdown1" role="menu">
				                      <li role="presentation">
				                      	<a style="text-decoration:none; text-align:left;" class="btn btn-block btn-default" href="<?php echo base_url('SubKontrak/edit/'.$value->id_subkontrak);?>">
				                      	<i class="icon wb-edit" aria-hidden="true"></i>
				                      	Edit
				                      	</a>
				                      </li>
				                      <li role="presentation">
				                      	<a style="text-decoration:none; text-align:left;" class="btn btn-block btn-default" href="<?php echo base_url('SubKontrak/delete/'.$value->id_subkontrak);?>" onclick="return confirm('Apakah Anda yakin akan menghapus data ini ?')">
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
