
<div class="page-content padding-30 container-fluid">

<div class="page-header">
  <h1 class="page-title" style="text-transform: capitalize;">Data Pengeluaran Produksi</h1>
  <ol class="breadcrumb">
	<li><a href="<?php echo base_url();?>">Beranda</a></li>
	<li class="active">Pengeluaran Produksi</li>
  </ol>
  <div class="page-header-actions">
	  <a href="<?php echo base_url('PengeluaranProduksi/add/');?>" class="btn btn-sm btn-default btn-block btn-primary btn-round">
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
		<form class="form-horizontal" id="IdForm" method="post">
			<div class="panel-heading">
				<div class="row">
					<h3 class="panel-title">Daftar Data Pengeluaran Produksi</h3>
				</div>
			</div>


			<div class="panel-body">

				<?php
	                	$current_date = date("m/d/Y");
                	?>

	                <div class="form-group">
	                  <label class="col-sm-1 control-label">Tanggal : </label>
	                  <div class="col-sm-4">
	                    <div class="input-daterange" data-plugin="datepicker">
		                    <div class="input-group">
		                      <span class="input-group-addon">
		                        <i class="icon wb-calendar" aria-hidden="true"></i>
		                      </span>
		                      <input type="text" class="form-control" name="tgl_awal" placeholder="Tanggal Awal" value="<?php echo $current_date; ?>" required>
		                    </div>
		                    <div class="input-group">
		                      <span class="input-group-addon"><i class="fa fa-arrows-h" aria-hidden="true"></i></span>
		                      <input type="text" class="form-control" name="tgl_akhir" placeholder="Tanggal Akhir" value="<?php echo $current_date; ?>" required>
		                    </div>
	                  	</div>
	                  </div>
	                </div>

	                <div class="form-group">
	                  <div class="col-sm-11 col-sm-offset-1">
	                    <button type="button" class="btn btn-labeled btn-warning" onclick="subFilter();">
	        				<span class="btn-label"><i class="icon fa-filter" aria-hidden="true"></i></span>Filter
	        			</button>
	                  </div>
	                </div>

				<table class="table table-hover dataTable table-striped width-full overf" data-plugin="dataTable">
					<thead>
					  <tr>
						<th>No</th>
						<th>Po Number</th>
						<th>PEB NO</th>
						<th>PEB Date</th>
						<th>Invoice No</th>
						<th>No Bukti Pengeluaran Barang</th>
						<th>Tanggal Bukti Pengeluaran Barang</th>
						<th>Pembeli/Penerima</th>
						<th>Negara Tujuan</th>
						<th>Kode Barang</th>
						<th>Nama Barang</th>
						<th>Satuan</th>
						<th>Jumlah</th>
						<th>Mata Uang</th>
						<th>Nilai Barang</th>
						<th>Opsi</th>
					  </tr>
					</thead>
					<tfoot>
					  <tr>
					    <th>No</th>
						<th>Po Number</th>
						<th>PEB NO</th>
						<th>PEB Date</th>
						<th>Invoice No</th>
						<th>No Bukti Pengeluaran Barang</th>
						<th>Tanggal Bukti Pengeluaran Barang</th>
						<th>Pembeli/Penerima</th>
						<th>Negara Tujuan</th>
						<th>Kode Barang</th>
						<th>Nama Barang</th>
						<th>Satuan</th>
						<th>Jumlah</th>
						<th>Mata Uang</th>
						<th>Nilai Barang</th>
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
						<td><?= $value->peb_number;?></td>
						<td><?= $value->peb_date;?></td>
						<td><?= $value->invoice_no;?></td>	
						<td><?= $value->no_bukti_pengeluaran_barang;?></td>
						<td><?= $value->tanggal_bukti_pengeluaran_barang;?></td>
						<td><?= $value->pembeli_penerima;?></td>
						<td><?= $value->negara_tujuan;?></td>
						<td><?= $value->kode_barang;?></td>	
						<td><?= $value->nama_barang;?></td>	
						<td><?= $value->satuan;?></td>	
						<td><?= $value->jumlah;?></td>	
						<td><?= $value->mata_uang;?></td>	
						<td><?= $value->nilai_barang;?></td>						
						
						<td>
							<div class="btn-group" role="group">
								<button type="button" class="btn btn-warning dropdown-toggle" id="exampleIconDropdown1"
								data-toggle="dropdown" aria-expanded="false">
								  <i class="icon wb-settings" aria-hidden="true"></i>
								  <span class="caret"></span>
								</button>
								<ul class="dropdown-menu" style="min-width:10px;" aria-labelledby="exampleIconDropdown1" role="menu">
								  <li role="presentation">
									  <a style="text-decoration:none; text-align:left;" class="btn btn-block btn-default" href="<?php echo base_url('PengeluaranProduksi/edit/'.$value->id_export);?>">
									  <i class="icon wb-edit" aria-hidden="true"></i>
									  Edit
									  </a>
								  </li>
								  <li role="presentation">
									  <a style="text-decoration:none; text-align:left;" class="btn btn-block btn-default" href="<?php echo base_url('PengeluaranProduksi/delete/'.$value->id_export);?>" onclick="return confirm('Apakah Anda yakin akan menghapus data ini ?')">
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
		</form>
	</div>
</div>
<script type="text/javascript">
	function subFilter(){
		document.getElementById("IdForm").action = "<?php echo base_url();?>PengeluaranProduksi/to_param_filter";
		document.getElementById("IdForm").submit();

		return true;
	}
</script>