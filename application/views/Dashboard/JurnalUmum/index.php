
<div class="page-content padding-30 container-fluid">

	<div class="page-header">
	  <h1 class="page-title" style="text-transform: capitalize;">Data Jurnal Umum</h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo base_url();?>">Beranda</a></li>
	    <li class="active">Jurnal Umum</li>
	  </ol>
	  <div class="page-header-actions">
		  <p><a href="<?php echo base_url('JurnalUmum/add/');?>" class="btn btn-sm btn-default btn-block btn-primary btn-round">
		    <i aria-hidden="true" class="icon wb-plus"></i>
		    <span class="hidden-xs"> Tambah Data</span>
		   <!-- <a href="<?php echo base_url('JurnalUmum/add/');?>" class="btn btn-sm btn-default btn-block btn-primary btn-round">
		    <i aria-hidden="true" class="icon wb-plus"></i>
		    <span class="hidden-xs"> Tambah Data Kurs</span>-->
	    </a></p>
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
	            		<h3 class="panel-title">Daftar Data Jurnal Umum</h3>
	            	</div>
	            </div>


	            <div class="panel-body">
	            	<table class="table table-hover dataTable table-striped width-full overf" data-plugin="dataTable">
				        <thead>
				          <tr>
				            <th>No</th>
				            <th>No Jurnal</th>
				            <th>Tanggal</th>
				            <th>No Bukti</th>
				            <th>No Rek</th>
							<th>Nama Rek</th>
							<th>Keterangan</th>
							<th>Debet</th>
							<th>Kredit</th>
							<th>Opsi</th>
				          </tr>
				        </thead>
				        <tbody>
				        <?php
						$no=1;
						$total_debet = 0;
						$total_kredit = 0;
						foreach ($data as $value):
							$total_debet += $value->debet;
							$total_kredit += $value->kredit;
							$AmbilRek = $this->db->query("SELECT * FROM rekening WHERE no_rek = '$value->no_rek' ")->row();
					?>
				          <tr>
				            <td><?= $no++;?></td>
				            <td><?= $value->no_jurnal;?></td>
							<td><?= $value->tgl_jurnal;?></td>
							<td><?= $value->no_bukti;?></td>
							<td><?= $value->no_rek;?></td>	
							<td><?= $AmbilRek->nama_rek;?></td>
							<td><?= $value->ket;?></td>	
							<!--<td><?= $value->debet;?></td>
							<td><?= $value->kredit;?></td>			

							<td><?= $value->kurs;?></td>
							<td><?= $value->rate;?></td>
							<td><?= $value->nilai;?></td>-->
							<td><?=number_format($value->debet, 2, ',', '.');?></td>
				            <td><?=number_format($value->kredit, 2, ',', '.');?></td>
				            <td>
				            	<div class="btn-group" role="group">
				                    <button type="button" class="btn btn-warning dropdown-toggle" id="exampleIconDropdown1"
				                    data-toggle="dropdown" aria-expanded="false">
				                      <i class="icon wb-settings" aria-hidden="true"></i>
				                      <span class="caret"></span>
				                    </button>
				                    <ul class="dropdown-menu" style="min-width:10px;" aria-labelledby="exampleIconDropdown1" role="menu">
				                      <li role="presentation">
				                      	<a style="text-decoration:none; text-align:left;" class="btn btn-block btn-default" href="<?php echo base_url('JurnalUmum/edit/'.$value->no_jurnal);?>">
				                      	<i class="icon wb-edit" aria-hidden="true"></i>
				                      	Edit
				                      	</a>
				                      </li>
				                      <li role="presentation">
				                      	<a style="text-decoration:none; text-align:left;" class="btn btn-block btn-default" href="<?php echo base_url('JurnalUmum/delete/'.$value->no_jurnal);?>" onclick="return confirm('Apakah Anda yakin akan menghapus data ini ?')">
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
						<tfoot>
				          <tr>
							<th colspan="7" style="text-align: center;">Jumlah</th>
				            <!--<th><?=$total_debet?></th>-->
				            <td><?=number_format($total_debet, 2, ',', '.');?></td>
							<td><?=number_format($total_kredit, 2, ',', '.');?></td>
							<th>&nbsp;</th>
				          </tr>
				        </tfoot>
				     </table>
	            </div>
	    </div>
</div>