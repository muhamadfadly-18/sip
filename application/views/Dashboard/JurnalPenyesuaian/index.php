
<div class="page-content padding-30 container-fluid">

	<div class="page-header">
	  <h1 class="page-title" style="text-transform: capitalize;">Data Jurnal Penyesuaian</h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo base_url();?>">Beranda</a></li>
	    <li class="active">Jurnal Penyesuaian</li>
	  </ol>
	  <div class="page-header-actions">
		  <a href="<?php echo base_url('JurnalPenyesuaian/add/');?>" class="btn btn-sm btn-default btn-block btn-primary btn-round">
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
	            		<h3 class="panel-title">Daftar Data Jurnal Penyesuaian</h3>
	            	</div>
	            </div>


	            <div class="panel-body">
	            	<table class="table table-hover dataTable table-striped width-full overf" data-plugin="dataTable">
				        <thead>
				          <tr>
				            <th>No</th>
				            <th>No Jurnal</th>
				            <th>Tanggal</th>
										<th>No Rek</th>
										<th>Nama Rek</th>
										<th>Debet</th>
										<th>Kredit</th>
				            <th>Opsi</th>
				          </tr>
				        </thead>
				        <tfoot>
				          <tr>
						  	<th>No</th>
				            <th>No Jurnal</th>
				            <th>Tanggal</th>
										<th>No Rek</th>
										<th>Nama Rek</th>
										<th>Debet</th>
										<th>Kredit</th>
				            <th>Opsi</th>
				          </tr>
				        </tfoot>
				        <tbody>
				        <?php
				        	$no=1;
				        	foreach ($data as $value):

				        		$AmbilRek = $this->db->query("SELECT no_rek, nama_rek FROM rekening WHERE no_rek = '$value->no_rek' ")->row();
				        ?>
				          <tr>
				            <td><?= $no++;?></td>
				            <td><?= $value->no_jurnal;?></td>
										<td><?= $value->tgl_jurnal;?></td>
										<td><?= $value->no_rek;?></td>
										<td><?= $AmbilRek->nama_rek;?></td>
										<td><?= $value->debet;?></td>
										<td><?= $value->kredit;?></td>

				            <td>
				            	<!-- <div class="btn-group" role="group">
				                    <button type="button" class="btn btn-warning dropdown-toggle" id="exampleIconDropdown1"
				                    data-toggle="dropdown" aria-expanded="false">
				                      <i class="icon wb-settings" aria-hidden="true"></i>
				                      <span class="caret"></span>
				                    </button>
				                    <ul class="dropdown-menu" style="min-width:10px;" aria-labelledby="exampleIconDropdown1" role="menu">
				                      <li role="presentation">
				                      	<a style="text-decoration:none; text-align:left;" class="btn btn-block btn-default" href="<?php echo base_url('JurnalPenyesuaian/edit/'.$value->no_rek);?>">
				                      	<i class="icon wb-edit" aria-hidden="true"></i>
				                      	Edit
				                      	</a>
				                      </li>
				                      <li role="presentation">
				                      	<a style="text-decoration:none; text-align:left;" class="btn btn-block btn-default" href="<?php echo base_url('JurnalPenyesuaian/delete/'.$value->no_jurnal);?>" onclick="return confirm('Apakah Anda yakin akan menghapus data ini ?')">
				                      	<i class="icon wb-close" aria-hidden="true"></i>
				                      	Hapus
				                      	</a>
				                      </li>
				                    </ul>
				                </div> -->
				                <div class="btn-group btn-group-xs ">
	                         		<a href="<?php echo base_url('JurnalPenyesuaian/edit/'.$value->no_jurnal);?>" method="post" class="btn btn-success"><i class="icon wb-edit" aria-hidden="true"></i></a>
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
