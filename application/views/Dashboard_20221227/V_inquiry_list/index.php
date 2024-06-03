<div class="page-content padding-30 container-fluid">

<div class="page-header">
  <h1 class="page-title" style="text-transform: capitalize;">Inquiry List</h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Home</a></li>
    <li class="active">Inquiry List</li>
  </ol>
</div>

  <div class="panel panel-bordered panel-primary">
    <div class="panel-heading">
      <div class="row">
        <h3 class="panel-title">List Data Inquiry List</h3>
      </div>
    </div>
    <div class="panel-body">
      <table class="table table-hover dataTable table-striped width-full overf" data-plugin="dataTable">
        <thead>
          <tr>
            <th>No</th>
            <th>Request Date</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile Phone</th>
            <th>Activity</th>
            <th>Sub Activity</th>
            <th>ETA</th>
            <th>ETD</th>
            <th>Total Port Cost</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $no=1;
          foreach($DataInquiry as $value):
            $DataVessel = $this->db->query("SELECT id_vessel_activity, activity FROM ref_vessel_activity WHERE id_vessel_activity = '$value->vessel_activity'")->row();
            $DetailVessel = $this->db->query("SELECT id, id_vessel_activity, nama FROM ref_vessel_detail WHERE id = '$value->va_detail'")->row();

            $strr = $value->no_wa;
            // First typecast to int and 
            // then to string
            $strr = (string)((int)($strr));


            if ($value->vessel_activity == "1" && $value->va_detail =="1") {
              $totalport = '$'.$value->total_sts_mother;
            }elseif($value->vessel_activity == "1" && $value->va_detail =="2"){
              $totalport = '$'.$value->total_sts_feeder_FSO;
            }elseif($value->vessel_activity == "2" && $value->va_detail =="3"){
              $totalport = '$'.$value->total_sts_feeder_FSO;
            }elseif($value->vessel_activity == "2" && $value->va_detail =="4"){
              $totalport = '$'.$value->total_sts_feeder_FSO;
            }elseif($value->vessel_activity == "3"){
              $totalport = '$'.$value->total_wo;
            }elseif($value->vessel_activity == "4"  && $value->va_detail =="6"){
              $totalport = "$0";
            }elseif($value->vessel_activity == "5"){
              $totalport = '$'.$value->total_barge_oil;
            }

        ?>
          <tr>
            <td><?= $no++;?></td>
            <td><?= $value->created_at;?></td>
            <td><?= $value->nama;?></td>
            <td><?= $value->email;?></td>
            <td><?= $value->kode_telepon;?> <?= $strr;?></td>
            <td><?= $DataVessel->activity;?></td>
            <td><?= $DetailVessel->nama;?></td>
            <td><?= $value->arrival;?> <?= $value->arrival_time;?></td>
            <td><?= $value->departure;?> <?= $value->departure_time;?></td>
            <td><?= $totalport;?></td>
            <td>
              <?php if ($value->vessel_activity == "1" && $value->va_detail =="1") { ?>
                <a href="<?php echo base_url();?>inquiry_list/view_1/<?php echo $value->id; ?>"  class="btn btn-icon btn-success popover-success popover-rotate"  data-trigger="hover"  data-toggle="popover" data-placement="left" tabindex="0" title="" ><i class="fa fa-eye" aria-hidden="true"> View</i></a>
              <?php }elseif($value->vessel_activity == "1" && $value->va_detail =="2"){ ?>
                <a href="<?php echo base_url();?>inquiry_list/view_2/<?php echo $value->id; ?>"  class="btn btn-icon btn-success popover-success popover-rotate"  data-trigger="hover"  data-toggle="popover" data-placement="left" tabindex="0" title="" ><i class="fa fa-eye" aria-hidden="true"> View</i></a>
              <?php }elseif($value->vessel_activity == "2" && $value->va_detail =="3"){ ?>
                <a href="<?php echo base_url();?>inquiry_list/view_sts_fso_disc/<?php echo $value->id; ?>"  class="btn btn-icon btn-success popover-success popover-rotate"  data-trigger="hover"  data-toggle="popover" data-placement="left" tabindex="0" title="" ><i class="fa fa-eye" aria-hidden="true"> View</i></a>
              <?php }elseif($value->vessel_activity == "2" && $value->va_detail =="4"){ ?>
                <a href="<?php echo base_url();?>inquiry_list/view_sts_fso_load/<?php echo $value->id; ?>"  class="btn btn-icon btn-success popover-success popover-rotate"  data-trigger="hover"  data-toggle="popover" data-placement="left" tabindex="0" title="" ><i class="fa fa-eye" aria-hidden="true"> View</i></a>
              <?php }elseif($value->vessel_activity == "3"){ ?>
                <a href="<?php echo base_url();?>inquiry_list/view_3/<?php echo $value->id; ?>"  class="btn btn-icon btn-success popover-success popover-rotate"  data-trigger="hover"  data-toggle="popover" data-placement="left" tabindex="0" title="" ><i class="fa fa-eye" aria-hidden="true"> View</i></a>
              <?php }elseif($value->vessel_activity == "4" && $value->va_detail =="6"){ ?>
                <a href="<?php echo base_url();?>inquiry_list/view_bunker_oil/<?php echo $value->id; ?>"  class="btn btn-icon btn-success popover-success popover-rotate"  data-trigger="hover"  data-toggle="popover" data-placement="left" tabindex="0" title="" ><i class="fa fa-eye" aria-hidden="true"> View</i></a>
              <?php }elseif($value->vessel_activity == "5"){ ?>
                <a href="<?php echo base_url();?>inquiry_list/view_5/<?php echo $value->id; ?>"  class="btn btn-icon btn-success popover-success popover-rotate"  data-trigger="hover"  data-toggle="popover" data-placement="left" tabindex="0" title="" ><i class="fa fa-eye" aria-hidden="true"> View</i></a>
              <?php } ?>
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