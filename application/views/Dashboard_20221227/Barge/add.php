<div class="page-content padding-30 container-fluid">
	<div class="page-header">
		<div class="page-header-actions">
			<a href="<?php echo base_url('barge');?>" class="btn btn-sm btn-danger">
			  <i aria-hidden="true" class="icon wb-chevron-left-mini"></i>
			  <span class="hidden-xs">Kembali</span>
			</a>
		</div>
	</div>

	<div class="panel panel-bordered">
        <div class="panel-heading">
        	<div class="row">
        		<h3 class="panel-title">Tambah Data Barge</h3>
        	</div>
        </div>


		<div class="example">
        	<div class="col-md-12">

				<form class="form-horizontal" action="<?php echo base_url();?>barge/add_action" method="post" enctype="multipart/form-data">

					<div class="form-group">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-sm-3 control-label" style="text-align: left; font-weight: bold;">Cargo Name</label>
								<div class="col-sm-6">
									<select data-plugin="select2" name="id_pt" class="form-control" required>
				                      <?php
				                        foreach($select_pt as $value){
				                      ?>
				                        <option value="<?php echo $value->id_pt; ?>"><?php echo $value->nama_pt; ?></option>
				                      <?php
				                        }
				                      ?>
				                    </select>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-sm-3 control-label" style="text-align: left; font-weight: bold;">Barge Vessel</label>
								<div class="col-sm-6">
									<input type="text" autocomplete="off" required name="nama_barge_vessel" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" style="text-align: left; font-weight: bold;">LOA</label>
								<div class="col-sm-6">
									<input type="text" autocomplete="off" required name="loa" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" style="text-align: left; font-weight: bold;">Flag</label>
								<div class="col-sm-6">
									<input type="text" autocomplete="off" required name="flag" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" style="text-align: left; font-weight: bold;">IMO</label>
								<div class="col-sm-6">
									<input type="text" autocomplete="off" required name="imo" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" style="text-align: left; font-weight: bold;">Operator</label>
								<div class="col-sm-6">
									<input type="text" autocomplete="off" required name="operator" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" style="text-align: left; font-weight: bold;">N R T</label>
								<div class="col-sm-6">
									<input type="text" autocomplete="off" required name="nrt" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" style="text-align: left; font-weight: bold;">Summer Draft</label>
								<div class="col-sm-6">
									<input type="text" autocomplete="off" required name="summer_draft" class="form-control">
								</div>
							</div>
						</div>
						
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-sm-3 control-label" style="text-align: left; font-weight: bold;">Gross Tonnage</label>
								<div class="col-sm-6">
									<input type="text" autocomplete="off" required name="gt" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" style="text-align: left; font-weight: bold;">Cargo Tank</label>
								<div class="col-sm-6">
									<input type="text" autocomplete="off" required name="cargo_tank" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" style="text-align: left; font-weight: bold;">Call Sign</label>
								<div class="col-sm-6">
									<input type="text" autocomplete="off" required name="call_sign" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" style="text-align: left; font-weight: bold;">Owner</label>
								<div class="col-sm-6">
									<input type="text" autocomplete="off" required name="owner" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" style="text-align: left; font-weight: bold;">Port of Registry</label>
								<div class="col-sm-6">
									<input type="text" autocomplete="off" required name="port" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" style="text-align: left; font-weight: bold;">Dead-Weight (Summer)</label>
								<div class="col-sm-6">
									<input type="text" autocomplete="off" required name="dead_weight" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" style="text-align: left; font-weight: bold;">File Particular</label>
								<div class="col-sm-6">
									<input type="file" autocomplete="off" required name="file" class="form-control">
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-6">
							<div class="col-sm-3 col-sm-offset-3">
								<input class="btn btn-primary" type="submit" value="Simpan">
								<button class="btn btn-default btn-outline" type="reset">Reset</button>
							</div>
						</div>
					</div>

				</form>
			</div>
		</div>

    </div>
</div>