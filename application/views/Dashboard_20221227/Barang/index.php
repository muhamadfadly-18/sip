<div class="page-content padding-30 container-fluid">

	<div class="page-header">
		<h1 class="page-title" style="text-transform: capitalize;">Data Barang</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>">Beranda</a></li>
			<li class="active">Barang</li>
		</ol>
		<div class="page-header-actions">
			<a href="<?php echo base_url('Barang/add/'); ?>" class="btn btn-sm btn-default btn-block btn-primary btn-round">
				<i aria-hidden="true" class="icon wb-plus"></i>
				<span class="hidden-xs">Tambah Data</span>
			</a>
		</div>
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


	<div class="panel panel-bordered panel-primary">
		<div class="panel-heading">
			<div class="row">
				<h3 class="panel-title">Daftar Barang</h3>
			</div>
		</div>


		<div class="panel-body">
			<table id="example" class="display" style="width:100%">
				<thead>
					<tr>
						<th>No</th>
						<th>HS Code</th>
						<th>Uraian Barang</th>

						<th>Kategori</th>
						<th>Satuan</th>
						<th>Saldo</th>
						<th>keterangan</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>No</th>
						<th>HS Code</th>
						<th>Uraian Barang</th>

						<th>Kategori</th>
						<th>Satuan</th>
						<th>Saldo</th>
						<th>keterangan</th>
						<th>Opsi</th>
					</tr>
				</tfoot>
				<tbody>
					<?php
					$no = 1;
					foreach ($data as $value) :
						$nama_ktg = $this->db->query("SELECT kategori FROM ref_kategori where id_kategori = '$value->id_kategori' ")->row();

					?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $value->id_barang; ?></td>
							<td><?= $value->nama_brg; ?></td>

							<td><?= $nama_ktg->kategori; ?></td>
							<td><?= $value->uom; ?></td>
							<td><?= $value->stok; ?></td>
							<td><?= $value->keterangan; ?></td>


							<td>
								<div class="btn-group" role="group">
									<button type="button" class="btn btn-warning dropdown-toggle" id="exampleIconDropdown1" data-toggle="dropdown" aria-expanded="false">
										<i class="icon wb-settings" aria-hidden="true"></i>
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu" style="min-width:10px;" aria-labelledby="exampleIconDropdown1" role="menu">
										<li role="presentation">
											<a style="text-decoration:none; text-align:left;" class="btn btn-block btn-default" href="<?php echo base_url('Barang/detail/' . $value->id_barang.'/'. $value->pilih_tujuan); ?>">
												<i class="icon wb-eye" aria-hidden="true"></i>
												Detail
											</a>
										</li>
										<li role="presentation">
											<a style="text-decoration:none; text-align:left;" class="btn btn-block btn-default" href="<?php echo base_url('Barang/edit/' . $value->id_barang.'/'. $value->pilih_tujuan); ?>">
												<i class="icon wb-edit" aria-hidden="true"></i>
												Edit
											</a>
										</li>
										<li role="presentation">
											<a style="text-decoration:none; text-align:left;" class="btn btn-block btn-default" href="<?php echo base_url('Barang/delete/' . $value->id_barang.'/'. $value->pilih_tujuan); ?>" onclick="return confirm('Apakah Anda yakin akan menghapus data ini ?')">
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


<div class="page-content padding-30 container-fluid">

	<div class="panel panel-bordered panel-primary">
		<div class="panel-heading">
			<div class="row">
				<h3 class="panel-title">Daftar Produksi</h3>
			</div>
		</div>


		<div class="panel-body">
			<table id="example2" class="display" style="width:100%">
				<thead>
					<tr>
						<th>No</th>
						<th>HS Code</th>
						<th>Uraian Barang</th>
						<th>Kategori</th>
						<th>Satuan</th>
						<th>Saldo</th>
						<th>keterangan</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>No</th>
						<th>HS Code</th>
						<th>Uraian Barang</th>
						<th>Kategori</th>
						<th>Satuan</th>
						<th>Saldo</th>
						<th>keterangan</th>
						<th>Opsi</th>
					</tr>
				</tfoot>
				<tbody>
					<?php
					$no = 1;
					foreach ($dataproduksi as $value) :
						$nama_ktg = $this->db->query("SELECT kategori FROM ref_kategori where id_kategori = '$value->id_kategori' ")->row();

					?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $value->id_barang; ?></td>
							<td><?= $value->nama_brg; ?></td>

							<td><?= $nama_ktg->kategori; ?></td>
							<td><?= $value->uom; ?></td>
							<td><?= $value->stok; ?></td>
							<td><?= $value->keterangan; ?></td>


							<td>
								<div class="btn-group" role="group">
									<button type="button" class="btn btn-warning dropdown-toggle" id="exampleIconDropdown1" data-toggle="dropdown" aria-expanded="false">
										<i class="icon wb-settings" aria-hidden="true"></i>
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu" style="min-width:10px;" aria-labelledby="exampleIconDropdown1" role="menu">
										<li role="presentation">
											<a style="text-decoration:none; text-align:left;" class="btn btn-block btn-default" href="<?php echo base_url('Barang/detail/' . $value->id_barang.'/'. $value->pilih_tujuan); ?>">
												<i class="icon wb-eye" aria-hidden="true"></i>
												Detail
											</a>
										</li>
										<li role="presentation">
											<a style="text-decoration:none; text-align:left;" class="btn btn-block btn-default" href="<?php echo base_url('Barang/edit/' . $value->id_barang.'/'. $value->pilih_tujuan); ?>">
												<i class="icon wb-edit" aria-hidden="true"></i>
												Edit
											</a>
										</li>
										<li role="presentation">
											<a style="text-decoration:none; text-align:left;" class="btn btn-block btn-default" href="<?php echo base_url('Barang/delete/' . $value->id_barang.'/'. $value->pilih_tujuan); ?>" onclick="return confirm('Apakah Anda yakin akan menghapus data ini ?')">
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

<div class="page-content padding-30 container-fluid">

	<div class="panel panel-bordered panel-primary">
		<div class="panel-heading">
			<div class="row">
				<h3 class="panel-title">Daftar Barang</h3>
			</div>
		</div>


		<div class="panel-body">
			<table id="example3" class="display" style="width:100%">
				<thead>
					<tr>
						<th>No</th>
						<th>HS Code</th>
						<th>Uraian Barang</th>

						<th>Kategori</th>
						<th>Satuan</th>
						<th>Saldo</th>
						<th>keterangan</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>No</th>
						<th>HS Code</th>
						<th>Uraian Barang</th>

						<th>Kategori</th>
						<th>Satuan</th>
						<th>Saldo</th>
						<th>keterangan</th>
						<th>Opsi</th>
					</tr>
				</tfoot>
				<tbody>
					<?php
					$no = 1;
					foreach ($datafg as $value) :
						$nama_ktg = $this->db->query("SELECT kategori FROM ref_kategori where id_kategori = '$value->id_kategori' ")->row();

					?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $value->id_barang; ?></td>
							<td><?= $value->nama_brg; ?></td>

							<td><?= $nama_ktg->kategori; ?></td>
							<td><?= $value->uom; ?></td>
							<td><?= $value->stok; ?></td>
							<td><?= $value->keterangan; ?></td>


							<td>
								<div class="btn-group" role="group">
									<button type="button" class="btn btn-warning dropdown-toggle" id="exampleIconDropdown1" data-toggle="dropdown" aria-expanded="false">
										<i class="icon wb-settings" aria-hidden="true"></i>
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu" style="min-width:10px;" aria-labelledby="exampleIconDropdown1" role="menu">
										<li role="presentation">
											<a style="text-decoration:none; text-align:left;" class="btn btn-block btn-default" href="<?php echo base_url('Barang/detail/' . $value->id_barang.'/'. $value->pilih_tujuan); ?>">
												<i class="icon wb-eye" aria-hidden="true"></i>
												Detail
											</a>
										</li>
										<li role="presentation">
											<a style="text-decoration:none; text-align:left;" class="btn btn-block btn-default" href="<?php echo base_url('Barang/edit/' . $value->id_barang.'/'. $value->pilih_tujuan); ?>">
												<i class="icon wb-edit" aria-hidden="true"></i>
												Edit
											</a>
										</li>
										<li role="presentation">
											<a style="text-decoration:none; text-align:left;" class="btn btn-block btn-default" href="<?php echo base_url('Barang/delete/' . $value->id_barang.'/'. $value->pilih_tujuan); ?>" onclick="return confirm('Apakah Anda yakin akan menghapus data ini ?')">
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

    $(document).ready(function() {
        $('#example2').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5'
            ]
        } );
    } );

    $(document).ready(function() {
        $('#example3').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5'
            ]
        } );
    } );
    </script>