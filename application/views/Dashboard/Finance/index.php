<div class="page-content padding-30 container-fluid">

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
				<h3 class="panel-title">Monitoring Finance</h3>
			</div>
		</div>
		<div class="panel-body">
			<table class="table table-hover dataTable table-striped width-full overf" data-plugin="dataTable">
				<thead>
				  <tr>
						<th>No</th>
						<th>No Job Order</th>
						<th>Vessel Name</th>
						<th>Tanggal Estimasi Masuk</th>
						<th>Tanggal Estimasi Keluar</th>
						<th>Activity</th>
						<th>Status</th>
						<th>Aksi</th>
				  </tr>
				</thead>
				<tbody>
				<?php
					$no=1;
					foreach ($DataResult as $value):
				?>
				  <tr>
					<td><?= $no++;?></td>
					<td><?= $value->no_job_order;?></td>
					<td><?= $value->kapalNama;?></td>
					<td><?= $value->estimate_date_of_arrival;?></td>
					<td><?= $value->estimate_date_of_depart;?></td>
					<td><?= $value->nama_activity;?></td>
					<td><?= $value->nama_status;?></td>
					<td>
					  <a style="text-decoration: none" href="<?php echo base_url('FinanceInward/view_approval/'.$value->no_job_order);?>" class="btn btn-icon btn-primary popover-success popover-rotate"><i class="icon wb-eye" aria-hidden="true"></i> View Data
					  </a>
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
