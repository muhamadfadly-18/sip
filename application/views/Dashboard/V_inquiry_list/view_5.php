<div class="page-content padding-30 container-fluid">

  <div class="page-header">
    <div class="page-header-actions">
      <a href="<?php echo base_url('inquiry_list');?>" class="btn btn-sm btn-danger btn-round">
        <i aria-hidden="true" class="icon wb-chevron-left-mini"></i>
        <span class="hidden-xs">Kembali</span>
      </a>
    </div>
  </div>
  <div class="panel panel-bordered panel-primary">
    <div class="panel-heading">
      <div class="row">
        <h3 class="panel-title">Detail Inquiry List</h3>
      </div>
    </div>
    <?php
      $strr = $DataInquiry->no_wa;
      $strr = (string)((int)($strr));

      if ($DataInquiry->vessel_type == '1') {
        $v_vessel_type = 'VLCC';
      }elseif($DataInquiry->vessel_type == '2'){
        $v_vessel_type = 'Suez';
      }elseif($DataInquiry->vessel_type == '3'){
        $v_vessel_type = 'LR 2';
      }elseif($DataInquiry->vessel_type == '4'){
        $v_vessel_type = 'LR 1';
      }elseif($DataInquiry->vessel_type == '5'){
        $v_vessel_type = 'MR';
      }elseif($DataInquiry->vessel_type == '6'){
        $v_vessel_type = 'Handy';
      }

      $v_Vessel = $this->db->query("SELECT id_vessel_activity, activity FROM ref_vessel_activity WHERE id_vessel_activity = '$DataInquiry->vessel_activity'")->row();
      $v_DetailVessel = $this->db->query("SELECT id, id_vessel_activity, nama FROM ref_vessel_detail WHERE id = '$DataInquiry->va_detail'")->row();

      if ($DataInquiry->cargo_type == '1') {
        $v_cargo_type = 'Oil/Chemical/Liquid';
      }elseif($DataInquiry->cargo_type == '2'){
        $v_cargo_type = 'Gas/Condesate/LPG';
      }elseif($DataInquiry->cargo_type == '3'){
        $v_cargo_type = 'Cargo Bulk';
      }
    ?>
    <div class="panel-body">
      <div class="col-sm-12 col-md-12">

        <form class="form-horizontal" action="#" method="post">

          <div class="form-group">
            <label class="col-sm-12 control-label" style="font-size: 15px; font-weight: bold; text-align: left;">Data Diri</label>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" style="text-align: left;">Name</label>
            <div class="col-sm-10">
              <label class="control-labe" style="width: 20px; font-weight: bold;">:</label>
              <label class="control-labe" style="font-weight: bold;"><?php echo $DataInquiry->nama; ?></label>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" style="text-align: left;">Email</label>
            <div class="col-sm-10">
              <label class="control-labe" style="width: 20px; font-weight: bold;">:</label>
              <label class="control-labe" style="font-weight: bold;"><?php echo $DataInquiry->email; ?></label>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" style="text-align: left;">Mobile Phone</label>
            <div class="col-sm-10">
              <label class="control-labe" style="width: 20px; font-weight: bold;">:</label>
              <label class="control-labe" style="font-weight: bold;"><?php echo $DataInquiry->kode_telepon; ?> <?php echo $strr; ?></label>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-12 control-label" style="font-size: 15px; font-weight: bold; text-align: left;">Vessel</label>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" style="text-align: left;">Vessel Type</label>
            <div class="col-sm-10">
              <label class="control-labe" style="width: 20px; font-weight: bold;">:</label>
              <label class="control-labe" style="font-weight: bold;"><?php echo $DataInquiry->vessel_name; ?></label>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" style="text-align: left;">Gross Register Ton (GTR)</label>
            <div class="col-sm-10">
              <label class="control-labe" style="width: 20px; font-weight: bold;">:</label>
              <label class="control-labe" style="font-weight: bold;"><?php echo $DataInquiry->gross_register; ?></label>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" style="text-align: left;">Net Register Tonnage (NTR)</label>
            <div class="col-sm-10">
              <label class="control-labe" style="width: 20px; font-weight: bold;">:</label>
              <label class="control-labe" style="font-weight: bold;"><?php echo $DataInquiry->net_register; ?></label>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" style="text-align: left;">Dead Weight Tonnage (DWT)</label>
            <div class="col-sm-10">
              <label class="control-labe" style="width: 20px; font-weight: bold;">:</label>
              <label class="control-labe" style="font-weight: bold;"><?php echo $DataInquiry->dead_weight; ?></label>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" style="text-align: left;">Lenght Over All (LOA)</label>
            <div class="col-sm-10">
              <label class="control-labe" style="width: 20px; font-weight: bold;">:</label>
              <label class="control-labe" style="font-weight: bold;"><?php echo $DataInquiry->lenght_over; ?></label>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" style="text-align: left;">Vessel Type</label>
            <div class="col-sm-10">
              <label class="control-labe" style="width: 20px; font-weight: bold;">:</label>
              <label class="control-labe" style="font-weight: bold;"><?php echo $v_vessel_type; ?></label>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" style="text-align: left;">Company Name (Shipping Company/Ship Charterer/Cargo Owner/Agent)</label>
            <div class="col-sm-10">
              <label class="control-labe" style="width: 20px; font-weight: bold;">:</label>
              <label class="control-labe" style="font-weight: bold;"><?php echo $DataInquiry->company_name; ?></label>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" style="text-align: left;">Activity</label>
            <div class="col-sm-3">
              <label class="control-labe" style="width: 20px; font-weight: bold;">:</label>
              <label class="control-labe" style="font-weight: bold;"><?php echo $v_Vessel->activity; ?></label>
            </div>
            <div class="col-sm-7">
              <label class="control-labe" style="font-weight: bold;"><?php echo $v_DetailVessel->nama; ?></label>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" style="text-align: left;">Arrival Date & Time</label>
            <div class="col-sm-10">
              <label class="control-labe" style="width: 20px; font-weight: bold;">:</label>
              <label class="control-labe" style="font-weight: bold;"><?= date('d-M-Y', strtotime($DataInquiry->arrival));?> <?= $DataInquiry->arrival_time;?></label>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" style="text-align: left;">Departure Date & Time</label>
            <div class="col-sm-10">
              <label class="control-labe" style="width: 20px; font-weight: bold;">:</label>
              <label class="control-labe" style="font-weight: bold;"><?= date('d-M-Y', strtotime($DataInquiry->departure));?> <?= $DataInquiry->departure_time;?></label>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" style="text-align: left;">Activity Days</label>
            <div class="col-sm-10">
              <label class="control-labe" style="width: 20px; font-weight: bold;">:</label>
              <label class="control-labe" style="font-weight: bold;"><?php echo $DataInquiry->jarak; ?></label>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" style="text-align: left;">Total Port Cost</label>
            <div class="col-sm-10">
              <label class="control-labe" style="width: 20px; font-weight: bold;">:</label>
              <label class="control-labe" style="font-weight: bold;">USD $<?php echo $DataInquiry->total_barge_oil; ?></label>
            </div>
          </div>

        </form>
      </div>
    </div>

  </div>
</div>