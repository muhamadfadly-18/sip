<style>
	div.container {
		overflow: auto;
		width: 100%;
	}
</style>
<div class="page-content padding-30 container-fluid">

	<div class="page-header">
		<h1 class="page-title" style="text-transform: capitalize;">Data Mutasi Hasil Produksi</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>">Beranda</a></li>
			<li class="active">Mutasi Hasil Produksi</li>
		</ol>
		<!-- <div class="page-header-actions">
		  <a href="<?php echo base_url('MutasiHP/add/'); ?>" class="btn btn-sm btn-default btn-block btn-primary btn-round">
		      <i aria-hidden="true" class="icon wb-plus"></i>
		      <span class="hidden-xs">Tambah Data</span>
		    </a>
	  </div> -->
	</div>

	<?php
	if (!empty($this->session->flashdata('succeed'))) {
		$succeed = '<div class="alert dark alert-alt alert-success alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true"><i class="icon wb-close-mini" aria-hidden="true"></i></span>
						  </button>
						  ' . $this->session->flashdata('succeed') . '
						</div>';
		echo $succeed;
	}
	?>

	<?php
	if (!empty($this->session->flashdata('failed'))) {
		$failed = '<div class="alert dark alert-alt alert-danger alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true"><i class="icon wb-close-mini" aria-hidden="true"></i></span>
					  </button>
					  ' . $this->session->flashdata('failed') . '
					</div>';

		echo $failed;
	}
	?>


	<div class="panel panel-bordered">
		<form class="form-horizontal" id="IdForm" method="post">
			<div class="panel-heading">
				<div class="row">
					<h3 class="panel-title"></h3>
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
				<div class="col-sm-6">
					<div class="input-daterange">
						<div class="input-group">
							<input type="date" class="form-control" name="tgl_awal" placeholder="Tanggal Awal">
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-arrows-h" aria-hidden="true"></i></span>
							<input type="date" class="form-control" name="tgl_akhir" placeholder="Tanggal Akhir">
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

			<div class="container">
				<table id="example" class="table table-bordered table-hover nowrap" style="width:100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Po Number</th>
							<th>HS Code</th>
							<th>Uraian Barang</th>
							<th>Satuan</th>
							<th>Saldo Awal</th>
							<th>Pemasukan</th>
							<th>Pengeluaran</th>
							<th>Saldo Akhir</th>
							<th>Gudang</th>

						</tr>
					</thead>

					<tbody>
						<?php
						$no = 1;
						foreach ($data as $value) :
							$purchase       = $this->db->query("select po_number from purchase where id_purchase = '$value->po_number' ")->row();
						?>
							<tr>
								<td><?= $no++; ?></td>
								<td><?= $purchase->po_number; ?></td>
								<td><?= $value->kode_barang; ?></td>
								<td><?= $value->nama_barang; ?></td>
								<td><?= $value->satuan; ?></td>
								<td><?= $value->saldo_awal; ?></td>
								<td><?= $value->pemasukan; ?></td>
								<td><?= $value->pengeluaran; ?></td>
								<td><?= $value->saldo_akhir; ?></td>
								<td><?= $value->gudang; ?></td>

							</tr>
						<?php
						endforeach;
						?>
					</tbody>
				</table>
			</div>
		</div>
		</form>
	</div>
</div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript">
	function subFilter() {
		document.getElementById("IdForm").action = "<?php echo base_url(); ?>MutasiHP";
		document.getElementById("IdForm").submit();

		return true;
	}

	$(document).ready(function() {
        $('#example').DataTable( {
            "dom": 'Bfrtip',
        "searching": true,
        "paging": true,
        "info": true,
        buttons: [{
            extend: 'excelHtml5',
            className: 'btn btn-primary btn-sm icon fa-file-excel-o',
            text: ' Export Excel',
            autoFilter: true,
            attr: {id: 'exportButton'},
            sheetName: 'data',
            title: '',
            filename: function ( ) {
                return $('#exportButton').data('filename');
            }
        }]
        } );
    } );
</script>