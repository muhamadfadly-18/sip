<div class="page-content padding-30 container-fluid">

	<div class="page-header">
		<h1 class="page-title" style="text-transform: capitalize;">Account Received</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>">Beranda</a></li>
			<li class="active">Account Received</li>
		</ol>
		<div class="page-header-actions">
			<a href="<?php echo base_url('AR/add/');?>" class="btn btn-sm btn-default btn-block btn-primary btn-round">
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
	    		<h3 class="panel-title">Daftar Data Account Received</h3>
	    	</div>
	    </div>

	    <div class="example">
			<form id="IdForm" class="form-horizontal" method="post">

				<div class="form-group">
					<label class="col-sm-2 control-label">Bulan : </label>
					<div class="col-sm-3">
						<div class="input-group">
							<select data-plugin="select2" name="Bulan" class="form-control">
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
							<select data-plugin="select2" name="Tahun" class="form-control">
								<option>-- Pilih --</option>
								<option value="2020">2020</option>
								<option value="2021">2021</option>
							</select>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-8 col-sm-offset-2">
						<button type="button" class="btn btn-labeled btn-primary" onclick="subSearch();">
							<span class="btn-label"><i class="icon wb-search" aria-hidden="true"></i></span>Submit
						</button>

						<button type="button" class="btn btn-labeled btn-danger" onclick="subPdf();">
							<span class="btn-label"><i class="icon fa-file-pdf-o" aria-hidden="true"></i></span>PDF
						</button>

						<button type="button" class="btn btn-labeled btn-success" onclick="subExcel();">
							<span class="btn-label"><i class="icon fa-file-excel-o" aria-hidden="true"></i></span>Excel
						</button>

						<button type="button" class="btn btn-labeled btn-warning" id="UploadFile" onclick="subUpload();">
							<span class="btn-label"><i class="icon fa fa-upload" aria-hidden="true"></i></span>Upload Data
						</button>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">&nbsp; </label>
					<div class="col-sm-3">
						<div class="input-group">
							<input type="file" name="" id="upload_file" style="display: none;">
						</div>
						<br>
						<button type="button" class="btn btn-labeled btn-warning" style="display: none;" id="UploadSave" onclick="subUploadSave();">
							<span class="btn-label"><i class="icon fa fa-upload" aria-hidden="true"></i></span>Upload
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
		            <th>PO Number</th>
		            <th>Invoice Number</th>
		            <th>PEB Number</th>
		            <th>Tanggal AR</th>
		            <th>Ammount</th>
		            <th>QTY</th>
		            <th>User Name</th>
		            <th>Time</th>
		            <th>Aksi</th>
		          </tr>
		        </thead>
		        <tfoot>
		          <tr>
		            <th>No</th>
		            <th>PO Number</th>
		            <th>Invoice Number</th>
		            <th>PEB Number</th>
		            <th>Tanggal AR</th>
		            <th>Ammount</th>
		            <th>QTY</th>
		            <th>User Name</th>
		            <th>Time</th>
		            <th>Aksi</th>
		          </tr>
		        </tfoot>
		     </table>
	    </div>
	</div>

</div>
<script src="<?php echo base_URL()?>jquery.js"></script>
<script type="text/javascript">
  function subSearch(){
    document.getElementById("IdForm").action = "<?php echo base_url();?>AR/to_param_filter";
    document.getElementById("IdForm").submit();

    return true;
  }

  function subPdf(){
    document.getElementById("IdForm").action = "<?php echo base_url();?>AR/to_param_pdf";
    document.getElementById("IdForm").submit();

    return true;
  }

  function subExcel(){
    document.getElementById("IdForm").action = "<?php echo base_url();?>AR/to_param_excel";
    document.getElementById("IdForm").submit();

    return true;
  }

	function subUpload() {
		document.getElementById("upload_file").style.display = "block";
		document.getElementById("upload_file").disabled = false;
		document.getElementById("UploadSave").style.display = "block";
		document.getElementById("UploadSave").disabled = false;
	}

	function subUploadSave(){
	    document.getElementById("IdForm").action = "<?php echo base_url();?>AR/to_param_upload";
	    document.getElementById("IdForm").submit();

	    return true;
	  }
  

</script>