<div class="page-content padding-30 container-fluid">
	<div class="page-header">
		<div class="page-header-actions">
			<a href="<?php echo base_url('FinanceInward');?>" class="btn btn-sm btn-danger">
			  <i aria-hidden="true" class="icon wb-chevron-left-mini"></i>
			  <span class="hidden-xs">Kembali</span>
			</a>
		</div>
	</div>

	<div class="example">
				<div class="col-md-12">

			<form class="form-horizontal" action="<?php echo base_url();?>FinanceInward/approve/<?=$data_ship->no_job_order?>" method="post" enctype="multipart/form-data">

				<div class="form-group">
					<label class="col-sm-6 control-label" style="text-align: left; font-weight: bold;">No Pemberitahuan Kedatangan Kapal (PKK) : <?php echo $data_ship->nomorPKK; ?></label>
					<input type="text" style="display: none;" class="form-control"  name="no_pkk" value="<?php echo $data_ship->nomorPKK; ?>" readonly>
				</div>

				<div class="form-group">
					<div class="col-md-12">
						<div style="width: 100%; border-bottom: 1px solid black;"></div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-sm-4 control-label" style="text-align: left; font-weight: bold;">Job Order</label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" required name="nomor_job_order" class="form-control" value="<?php echo $data_ship->no_job_order; ?>" readonly>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label" style="text-align: left; font-weight: bold;">Job Order Date</label>
							<div class="col-sm-6">
								<input type="date" autocomplete="off" required name="tanggal_job_order" class="form-control" value="<?php echo $data_ship->tanggal_job_order; ?>" readonly>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label" style="text-align: left; font-weight: bold;">No Letter</label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" required name="no_letter" class="form-control" value="<?php echo $data_ship->no_letter; ?>" readonly>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-sm-4 control-label" style="text-align: left; font-weight: bold;">Letter Date</label>
							<div class="col-sm-6">
								<input type="date" autocomplete="off" required name="tanggal_letter" class="form-control" value="<?php echo $data_ship->tanggal_letter; ?>" readonly>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label" style="text-align: left; font-weight: bold;">No Form 201</label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" required name="no_form_201" class="form-control" value="<?php echo $data_ship->no_form_201; ?>" readonly>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label" style="text-align: left; font-weight: bold;">Form 201 Date</label>
							<div class="col-sm-6">
								<input type="date" autocomplete="off" required name="form_201_date" class="form-control" value="<?php echo $data_ship->form_201_date; ?>" readonly>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-12">
						<div style="width: 100%; border-bottom: 1px solid black;"></div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-12">
						<div class="form-group">
							<label class="col-sm-3 control-label" style="text-align: left; font-weight: bold; font-size: 18px; padding-bottom: -10px;">Vessel Information</label>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-sm-4 control-label" style="text-align: left; font-weight: bold;">Activity</label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" required name="nama_activity" class="form-control" value="Spot STS" readonly>
								<input class="form-control" style="display: none;" name="id_activity" value="1" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label" style="text-align: left; font-weight: bold;">Vessel Name</label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off"  name="nama_vessel"  class="form-control" value="<?php echo $data_ship->kapalNama; ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label" style="text-align: left; font-weight: bold;">Gross Register Ton (GRT)</label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" required name="grt"  class="form-control" value="<?php echo $data_ship->grt; ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label" style="text-align: left; font-weight: bold;">Lenght Over All (LOA)</label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" required name="loa"  class="form-control" value="<?php echo $data_ship->loa; ?>" readonly >
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label" style="text-align: left; font-weight: bold;">DRT</label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" required name="drt"  class="form-control" value="<?php echo $data_ship->drt; ?>" readonly >
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label" style="text-align: left; font-weight: bold;">Jumlah Muat</label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" required name="drt"  class="form-control" value="<?php echo $data_ship->jumlahMuat; ?>" readonly >
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label" style="text-align: left; font-weight: bold;">Jumlah Bongkar</label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" required name="drt"  class="form-control" value="<?php echo $data_ship->jumlahBongkar; ?>" readonly >
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label class="col-sm-4 control-label" style="text-align: left; font-weight: bold;">IMO Vessel NO</label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" required name="imo"  class="form-control" value="<?php echo $data_ship->imoNumber; ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label" style="text-align: left; font-weight: bold;">Ship Master</label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" required name="nama_captain"  class="form-control" value="<?php echo $data_ship->nahkoda; ?>" readonly>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label" style="text-align: left; font-weight: bold;">Jenis Barang</label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" required name="jenis_barang"  class="form-control" value="<?php echo $data_ship->jenisBarang; ?>" readonly>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label" style="text-align: left; font-weight: bold;">Tipe Kapal</label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" required name="jenis_barang"  class="form-control" value="<?php echo $data_jenis_kapal->nama_tipe_kapal_indo; ?>" readonly>
								<input type="text" autocomplete="off" required name="jenis_barang"  class="form-control" value="<?php echo $data_jenis_kapal->nama_kapal_indo; ?>" readonly>
								<label class="col-sm-12 control-label" style="text-align: left; font-weight: bold;"><?php echo $data_jenis_kapal->keterangan; ?></label>
							</div>
						</div>

				</div>
</div>

					<div class="form-group">
						<div class="col-md-12">
							<div style="width: 100%; border-top: 1px solid black;"></div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-sm-5 control-label" style="text-align: left; font-weight: bold;">No Rencana Kerja Bongkar Muat (RKBM)</label>
								<div class="col-sm-6">
									<input type="text" autocomplete="off" required name="no_rkbm"  class="form-control" value="<?php echo $data_rkbm->nomorRkbm; ?>" readonly>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-5 control-label" style="text-align: left; font-weight: bold;">Ship Flag</label>
								<div class="col-sm-6">
									<input type="text" autocomplete="off" required name="flag" class="form-control" value="<?php echo $data_ship->bendera; ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-5 control-label" style="text-align: left; font-weight: bold;">Call Sign</label>
								<div class="col-sm-6">
									<input type="text" autocomplete="off" required name="call_sign"  class="form-control" value="<?php echo $data_ship->callSign; ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-5 control-label" style="text-align: left; font-weight: bold;">Estimate Date of Arrival</label>
								<div class="col-sm-6">
									<input type="text" autocomplete="off" required name="estimate_date_arrival" class="form-control"  value="<?php $date = strtotime($data_ship->tanggalEta); echo date('d-m-Y',$date) ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-5 control-label" style="text-align: left; font-weight: bold;">Estimate Time of Arrival</label>
								<div class="col-sm-6">
									<input type="text" autocomplete="off" required name="estimate_time_arrival" class="form-control" value="<?php $date = strtotime($data_ship->tanggalEta); echo date('H:i:s',$date) ?>" readonly>
								</div>
							</div>
						</div>
						<div class="col-md-6">

							<div class="form-group">
								<label class="col-sm-5 control-label" style="text-align: left; font-weight: bold;">Estimate Date of Depart</label>
								<div class="col-sm-6">
									<input type="text" autocomplete="off" required name="estimate_date_depart"  class="form-control" value="<?php $date = strtotime($data_ship->tanggalEtd); echo date('d-m-Y',$date) ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-5 control-label" style="text-align: left; font-weight: bold;">Estimate Time of Depart</label>
								<div class="col-sm-6">
									<input type="text" autocomplete="off" required name="estimate_time_depart"  class="form-control" value="<?php $date = strtotime($data_ship->tanggalEtd); echo date('H:i:s',$date) ?>" readonly>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-5 control-label" style="text-align: left; font-weight: bold;">Next Port</label>
								<div class="col-sm-6">
									<input type="text" autocomplete="off" required name="next_port"  class="form-control" value="<?php echo $data_ship->asalPelabuhan; ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-5 control-label" style="text-align: left; font-weight: bold;">Last port</label>
								<div class="col-sm-6">
									<input type="text" autocomplete="off" required name="last_port"  class="form-control" value="<?php echo $data_ship->tujuanPelabuhan; ?>" readonly>
								</div>
							</div>

						</div>
					</div>


					<div class="form-group">
						<div class="col-md-12">
							<div style="width: 100%; border-top: 1px solid black;"></div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-6">
							&nbsp;
						</div>
						<div class="col-md-6">
							<h5 class="card-title" style="font-weight: bold; font-size: 15px;">View Data Indicative</h5>
							<div class="card-body">
								<div class="col-md-12">
									<div class="col-md-12">
										<label class="col-sm-7 control-label" style="text-align: left; font-weight: bold;">Indicative Service Charges & Uper- Inward Plan</label>
										<div class="col-sm-5">
											<a target="_blank" href="#" class="btn btn-icon btn-warning popover-warning popover-rotate" ><i class="fas fa-eye pe-1"></i> View</a>
										</div>
									</div>
								</div>
								<br>
								<br>
								<div class="col-md-12">
									<div class="col-md-12">
										<label class="col-sm-7 control-label" style="text-align: left; font-weight: bold;">Indicative PNBP Inward Plan</label>
										<div class="col-sm-5">
											<a target="_blank" href="#" class="btn btn-icon btn-warning popover-warning popover-rotate" ><i class="fas fa-eye pe-1"></i> View</a>
										</div>
									</div>
								</div>
								<br>
								<br>
								<div class="col-md-12">
									<div class="col-md-12">
										<div class="col-sm-12">
											  <input class="btn btn-primary btn-block" type="submit" value="Approve Finance">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>


				</form>
        	</div>
        </div>

    </div>
</div>
