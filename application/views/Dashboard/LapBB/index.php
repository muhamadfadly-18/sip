<div class="page-content padding-30 container-fluid">

	<div class="page-header">
		<h1 class="page-title" style="text-transform: capitalize;">Buku Besar</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>">Beranda</a></li>
			<li class="active">Buku Besar</li>
		</ol>
		<!-- <div class="page-header-actions">
			<a href="<?php echo base_url('AR/add/');?>" class="btn btn-sm btn-default btn-block btn-primary btn-round">
				<i aria-hidden="true" class="icon wb-plus"></i>
				<span class="hidden-xs">Tambah Data</span>
			</a>
		</div> -->
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
	    		<h3 class="panel-title">Daftar Data</h3>
	    	</div>
	    </div>

	    <div class="example">
			<form id="IdForm" class="form-horizontal" method="post" action="<?php echo base_url();?>LapBB">

				<div class="form-group">
					<label class="col-sm-2 control-label">Bulan : </label>
					<div class="col-sm-3">
						<div class="input-group">
							<select data-plugin="select2" name="bulan" class="form-control">
								<option>-- Pilih --</option>
								<option value="1">Januari</option>
								<option value="2">Febuari</option>
								<option value="3">Maret</option>
								<option value="4">April</option>
								<option value="5">Mei</option>
								<option value="6">Juni</option>
								<option value="7">Juli</option>
								<option value="8">Agustus</option>
								<option value="9">September</option>
								<option value="10">Oktober</option>
								<option value="11">November</option>
								<option value="12">Desember</option>
							</select>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Tahun : </label>
					<div class="col-sm-3">
						<div class="input-group">
							<select data-plugin="select2" name="tahun" class="form-control">
								<option>-- Pilih --</option>
								<option value="2020">2020</option>
								<option value="2021">2021</option>
							</select>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">No Rek : </label>
					<div class="col-sm-5">
						<div class="input-group">
							<select data-plugin="select2" name="no_rek" data-plugin="select" class="form-control" id="no_rek">
                          <option> Pilih Norek </option>
                          <?php
                            
                            $RCP = $this->db->query("select no_rek,nama_rek from rekening ")->result();
                            
                            foreach($RCP as $value)
                            {   ?>
                               <option value="<?= $value->no_rek ?>" ><?= $value->no_rek ?> - <?= $value->nama_rek ?></option>
                           <?php }
                          ?>
                        </select>

						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-8 col-sm-offset-2">
						<input class="btn btn-primary" type="submit" value="Submit">

						<button type="button" class="btn btn-labeled btn-danger" onclick="subPdf();">
							<span class="btn-label"><i class="icon fa-file-pdf-o" aria-hidden="true"></i></span>PDF
						</button>

						<button type="button" class="btn btn-labeled btn-success" onclick="subExcel();">
							<span class="btn-label"><i class="icon fa-file-excel-o" aria-hidden="true"></i></span>Excel
						</button>

					</div>
				</div>

			</form>
		</div>

	    <div class="panel-body">
	    	<table class="table table-hover dataTable table-striped width-full overf" data-plugin="dataTable">
		        <thead>
		          <tr>
		            <th>No</th>
		            <th>No Jurnal</th>
		            <th>Tanggal</th>
		            <th>No Bukti</th>
		            <th>Keterangan</th>
		            <th>No Rek</th>
		            <th>Nama Rek</th>
		            <th>Debet</th>
		            <th>Kredit</th>
		            <th>Saldo</th>
		          </tr>
		        </thead>
		        <tbody>
			        <?php
			        	$no=1;
			        	foreach ($data_bb as $value):
			        	$rek = $this->db->query("select nama_rek from rekening where no_rek = '$value->no_rek' ")->row();	

			        ?>
			          <tr>
			            <td><?= $no++;?></td>
			            <td><?= $value->no_jurnal;?></td>
			            <td><?= date('d-M-Y', strtotime($value->tgl_jurnal));?></td>
			            <td><?= $value->no_bukti;?></td>
			            <td><?= $value->ket;?></td>
			            <td><?= $value->no_rek;?></td>
			            <td><?= $rek->nama_rek;?></td>
			            <td><?= $value->debet;?></td>
			            <td><?= $value->kredit;?></td>
			            <td><?= $value->debet;?></td>
			          </tr>
			          <?php
			          	endforeach;
			          ?>
			        </tbody>
		     </table>
	    </div>
	</div>

</div>

<script type="text/javascript">

  

</script>