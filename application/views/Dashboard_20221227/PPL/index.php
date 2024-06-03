
<div class="page-content padding-30 container-fluid">

	<div class="page-header">
	  <h1 class="page-title" style="text-transform: capitalize;">Data Pemasukan Produksi</h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo base_url();?>">Beranda</a></li>
	    <li class="active">Pemasukan Produksi</li>
	  </ol>
	  <!-- <div class="page-header-actions">
		  <a href="<?php echo base_url('PemasukanProduksi/add/');?>" class="btn btn-sm btn-default btn-block btn-primary btn-round">
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
			<form class="form-horizontal" id="IdForm" method="post">
	            <div class="panel-heading">
	            	<div class="row">
	            		<h3 class="panel-title">Daftar Data Pemasukan Produksi</h3>
	            	</div>
	            </div>


	            <div class="panel-body">

	            	<?php
	                	$current_date = date("m/d/Y");
                	?>

	                <!-- <div class="form-group">
	                  <label class="col-sm-1 control-label">Tanggal : </label>
	                  <div class="col-sm-4">
	                    <div class="input-daterange" data-plugin="datepicker">
		                    <div class="input-group">
		                      <span class="input-group-addon">
		                        <i class="icon wb-calendar" aria-hidden="true"></i>
		                      </span>
		                      <input type="text" class="form-control" name="tgl_awal" placeholder="Tanggal Awal">
		                    </div>
		                    <div class="input-group">
		                      <span class="input-group-addon"><i class="fa fa-arrows-h" aria-hidden="true"></i></span>
		                      <input type="text" class="form-control" name="tgl_akhir" placeholder="Tanggal Akhir" >
		                    </div>
	                  	</div>
	                  </div>
	                </div> -->

	                <div class="form-group">
	                    <label class="col-sm-1 control-label">Tanggal : </label>
	                    <div class="col-sm-4">
	                      <div class="input-daterange">
	                        <div class="input-group">
	                          <input type="date" class="form-control" name="tgl_awal" placeholder="Tanggal Awal" >
	                        </div>
	                        <div class="input-group">
	                          <span class="input-group-addon"><i class="fa fa-arrows-h" aria-hidden="true"></i></span>
	                          <input type="date" class="form-control" name="tgl_akhir" placeholder="Tanggal Akhir" >
	                        </div>
	                      </div>
	                    </div>
	                </div>

	                <div class="form-group">
	                  <div class="col-sm-11 col-sm-offset-1">
	                    <button type="button" class="btn btn-labeled btn-warning" onclick="subFilter();">
	        				<span class="btn-label"><i class="icon fa-filter" aria-hidden="true"></i></span>Filter
	        			</button>
	        			<button type="button" class="btn btn-labeled btn-success" onclick="subExcel();">
	        				<span class="btn-label"><i class="icon fa-file-excel-o" aria-hidden="true"></i></span>Ex. Excel
	        			</button>
	                  </div>
	                </div>
	                
	            	<table class="table table-hover dataTable table-striped width-full overf" data-plugin="dataTable">
				        <thead>
				          <tr>
						    <th>No</th>
							<th>Po Number</th>
							<th>NO Bukti Pengeluaran</th>
							<th>Tanggal Produksi</th>
							<th>HS Code</th>
							<th>Uraian Barang</th>
							<th>Satuan</th>
							<th>Jumlah Dari Produksi</th>
							<th>Jumlah Dari SubKontrak</th>
							<th>Gudang</th>
							
				          </tr>
				        </thead>
				        
				        <tbody>
				        <?php
				        	$no=1;
				        	foreach ($data as $value):
				        		 $purchase       = $this->db->query("select po_number from purchase where id_purchase = '$value->po_number' ")->row();
				        ?>
				          <tr>
				            <td><?= $no++;?></td>
				            <td><?= $purchase->po_number;?></td>
							<td><?= $value->bukti_pengeluaran_no;?></td>
							<td><?= $value->tanggal_production;?></td>
							<td><?= $value->kode_barang;?></td>							
				            <td><?= $value->nama_barang;?></td>
							<td><?= $value->satuan;?></td>
							<td><?= $value->digunakan;?></td>
							<td>-</td>
							<td>Asinusa</td>
				            
				          </tr>
				          <?php
				          	endforeach;
				          ?>
				        </tbody>
				     </table>
	            </div>
	        </form>
	    </div>
</div>
<script type="text/javascript">
	function subFilter(){
		document.getElementById("IdForm").action = "<?php echo base_url();?>PPL";
		document.getElementById("IdForm").submit();

		return true;
	}

	function subExcel(){
		document.getElementById("IdForm").action = "<?php echo base_url();?>PPL/export_excel";
		document.getElementById("IdForm").submit();

		return true;
	}
	
</script>