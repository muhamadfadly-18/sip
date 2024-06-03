<div class="page-content padding-30 container-fluid">
	<div class="page-header">
		<div class="page-header-actions">
			<a href="<?php echo base_url('kategoripnbp');?>" class="btn btn-sm btn-danger">
			  <i aria-hidden="true" class="icon wb-chevron-left-mini"></i>
			  <span class="hidden-xs">Kembali</span>
			</a>
		</div>
	</div>

	<div class="panel panel-bordered">
        <div class="panel-heading">
        	<div class="row">
        		<h3 class="panel-title">Edit Data Kategori PNBP</h3>
        	</div>
        </div>


		<div class="example">
        	<div class="col-md-12">

				<form class="form-horizontal" action="<?php echo base_url();?>kategoripnbp/update/<?php echo $DataKategoripnbp->id_kategori_pnbp;?>" method="post" enctype="multipart/form-data">

					<div class="form-group">
						<label class="col-sm-2 control-label" style="text-align: left; font-weight: bold;">Judul</label>
						<div class="col-sm-6">
							<input type="text" autocomplete="off" required name="judul" value="<?php echo $DataKategoripnbp->judul?>" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-2 col-sm-offset-2">
							<input class="btn btn-primary" type="submit" value="Simpan">
							<button class="btn btn-default btn-outline" type="reset">Reset</button>
						</div>
					</div>

				</form>
			</div>
		</div>

    </div>
</div>