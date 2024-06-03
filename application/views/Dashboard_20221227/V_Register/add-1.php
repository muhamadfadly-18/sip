<style type="text/css">
  
  .tabelatas{
    text-align: center; background: #93CAFF; font-weight: bold; color: black; font-size: 18px;
    border: 1px solid #000000;
  }

  .tabelgariskiri{
    padding-top: 4px;
    padding-bottom: 4px;
    border-left: 1px solid #000000;
  }

  .tabelgariskanan{
    padding-top: 4px;
    padding-bottom: 4px;
    border-right: 1px solid #000000;
  }

</style>
<div class="page-content padding-30 container-fluid">

<div class="page-header">
  <h1 class="page-title">Indicative Service Charges & Uper (Up Front Charges)</h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Beranda</a></li>
    <li><a href="<?php echo base_url('sail_in_agen');?>">Sail In Agen</a></li>
    <li class="active">Tambah Data</li>
  </ol>
  <div class="page-header-actions">
    <a href="<?php echo base_url('sail_in_agen');?>" class="btn btn-sm btn-danger  btn-round">
      <i aria-hidden="true" class="icon wb-chevron-left-mini"></i>
      <span class="hidden-xs">Kembali</span>
    </a>
  </div>
</div>

<div class="panel">
  <div class="panel-body">

    <form class="form-horizontal" action="<?php echo base_url();?>sail_in_agen/add_action" method="post">

      <table width="100%" style="border-collapse: collapse;">
        <tr>
          <th colspan="5" class="tabelatas">Informasi Kapal (Vessel Information)</th>
        </tr>
        <tr>
          <th width="22%" class="tabelgariskiri" style="text-align: right; padding-right: 5px;">Nomor Job Order :</th>
          <th width="20%" class="tabelgariskanan" colspan="2" style="padding-right: 5px;"><input type="text" name="" class="form-control" autocomplete="off" placeholder="Nomor Job Order"></th>

          <th width="22%" class="tabelgariskiri" style="text-align: right; padding-right: 5px;">Name Agen Marketing :</th>
          <th width="20%" class="tabelgariskanan" style="padding-right: 5px;"><input type="text" name="" class="form-control" autocomplete="off" placeholder="Name Agen Marketing"></th>
        </tr>

        <tr>
          <th width="22%" class="tabelgariskiri" style="text-align: right; padding-right: 5px;">Tanggal Job Order :</th>
          <th width="20%" class="tabelgariskanan" colspan="2" style="padding-right: 5px;"><input type="text" name="" class="form-control" autocomplete="off" placeholder="Tanggal Job Order"></th>

          <th width="22%" class="tabelgariskiri" style="text-align: right; padding-right: 5px;">Name Local Agen (Local Agent Name) :</th>
          <th width="20%" class="tabelgariskanan" style="padding-right: 5px;"><input type="text" name="" class="form-control" autocomplete="off" placeholder="Name Local Agen (Local Agent Name)"></th>
        </tr>

        <tr>
          <th width="22%" class="tabelgariskiri" style="text-align: right; padding-right: 5px;">No & Tanggal Surat Rencana Kedatangan (Sail In Plan) :</th>
          <th style="padding-right: 5px;"><input type="text" name="" class="form-control" autocomplete="off" placeholder="No"> </th>
          <th style="padding-right: 5px;"><input type="text" name="" class="form-control" autocomplete="off" placeholder="Tanggal Surat Rencana Kedatangan (Sail In Plan)"> </th>

          <th width="22%" class="tabelgariskiri" style="text-align: right; padding-right: 5px;">Pemilik Kapal/Cargo/ Carter (ship/Cargo/Carter Owner) :</th>
          <th width="20%" class="tabelgariskanan" style="padding-right: 5px;"><input type="text" name="" class="form-control" autocomplete="off" placeholder="Pemilik Kapal/Cargo/ Carter (ship/Cargo/Carter Owner)"></th>
        </tr>

        <tr>
          <th width="22%" class="tabelgariskiri" style="text-align: right; padding-right: 5px;">Nomor Form 201 & Tanggal (Sail Out) :</th>
          <th style="padding-right: 5px;"><input type="text" name="" class="form-control" autocomplete="off" placeholder="Nomor Form 201"> </th>
          <th style="padding-right: 5px;"><input type="text" name="" class="form-control" autocomplete="off" placeholder="Tanggal (Sail Out)"> </th>

          <th width="22%" class="tabelgariskiri" style="text-align: right; padding-right: 5px;">Bendera Kapal (Call Sign) :</th>
          <th width="20%" class="tabelgariskanan" style="padding-right: 5px;"><input type="text" name="" class="form-control" autocomplete="off" placeholder="Bendera Kapal (Call Sign)"></th>
        </tr>

        <tr>
          <th width="22%" class="tabelgariskiri" style="text-align: right; padding-right: 5px;">Nama Kapal (Vessel Name) :</th>
          <th><input type="text" name="" class="form-control" autocomplete="off" placeholder="Nama Kapal (Vessel Name)"></th>
          <th style="padding-left: 5px;"><label style="font-weight: bold;">Feeder Vessel</label></th>

          <th width="22%" class="tabelgariskiri" style="text-align: right; padding-right: 5px;">Estimate Date of Arrival :</th>
          <th width="20%" class="tabelgariskanan" style="padding-right: 5px;"><input type="text" name="" class="form-control" autocomplete="off" placeholder="Estimate Date of Arrival"></th>
        </tr>

        <tr>
          <th width="22%" class="tabelgariskiri" style="text-align: right; padding-right: 5px;">Nahkoda/Jumlah Crew :</th>
          <th width="20%" class="tabelgariskanan" colspan="2" style="padding-right: 5px;"><input type="text" name="" class="form-control" autocomplete="off" placeholder="Nahkoda/Jumlah Crew"></th>

          <th width="22%" class="tabelgariskiri" style="text-align: right; padding-right: 5px;">Estimate Time of Arrival :</th>
          <th width="20%" class="tabelgariskanan" style="padding-right: 5px;"><input type="text" name="" class="form-control" autocomplete="off" placeholder="Estimate Time of Arrival"></th>
        </tr>

        <tr>
          <th width="22%" class="tabelgariskiri" style="text-align: right; padding-right: 5px;">Gross Register Ton (GRT)/ Isi Kotor Kapal :</th>
          <th><input type="text" name="" class="form-control" autocomplete="off" placeholder="Gross Register Ton (GRT)/ Isi Kotor Kapal"></th>
          <th style="padding-left: 5px;"><label style="font-weight: bold;">Gross Tonage (GT)</label></th>

          <th width="22%" class="tabelgariskiri" style="text-align: right; padding-right: 5px;">Estimate Date of Depart :</th>
          <th width="20%" class="tabelgariskanan" style="padding-right: 5px;"><input type="text" name="" class="form-control" autocomplete="off" placeholder="Estimate Date of Depart"></th>
        </tr>

        <tr>
          <th width="22%" class="tabelgariskiri" style="text-align: right; padding-right: 5px;">Lenght Over All (LOA)/ Panjang Kapal :</th>
          <th><input type="text" name="" class="form-control" autocomplete="off" placeholder="Lenght Over All (LOA)/ Panjang Kapal"></th>
          <th style="padding-left: 5px;"><label style="font-weight: bold;">Meter</label></th>

          <th width="22%" class="tabelgariskiri" style="text-align: right; padding-right: 5px;">Estimate Time of Depart :</th>
          <th width="20%" class="tabelgariskanan" style="padding-right: 5px;"><input type="text" name="" class="form-control" autocomplete="off" placeholder="Estimate Time of Depart"></th>
        </tr>

        <tr>
          <th width="22%" class="tabelgariskiri" style="text-align: right; padding-right: 5px;">Actual Muatan Kapal (Cargo) :</th>
          <th><input type="text" name="" class="form-control" autocomplete="off" placeholder="Actual Muatan Kapal (Cargo)"></th>
          <th style="padding-left: 5px;"><label style="font-weight: bold;">Metric Ton (MT)</label></th>

          <th width="22%" class="tabelgariskiri" style="text-align: right; padding-right: 5px;">Estimate Time of Depart :</th>
          <th width="20%" class="tabelgariskanan" style="padding-right: 5px;"><input type="text" name="" class="form-control" autocomplete="off" placeholder="Estimate Time of Depart"></th>
        </tr>

        <tr>
          <th width="22%" class="tabelgariskiri" style="text-align: right; padding-right: 5px;">Jenis Cargo (Cargo Type) :</th>
          <th width="20%" class="tabelgariskanan" colspan="2" style="padding-right: 5px;"><input type="text" name="" class="form-control" autocomplete="off" placeholder="Jenis Cargo (Cargo Type)"></th>

          <th width="22%" class="tabelgariskiri" style="text-align: right; padding-right: 5px;">Voyage/Maniferst Cargo no :</th>
          <th width="20%" class="tabelgariskanan" style="padding-right: 5px;"><input type="text" name="" class="form-control" autocomplete="off" placeholder="Voyage/Maniferst Cargo no"></th>
        </tr>

        <tr>
          <th width="22%" class="tabelgariskiri" style="text-align: right; padding-right: 5px;">Cargo Type (Jenis Barang) :</th>
          <th width="20%" class="tabelgariskanan" colspan="2" style="padding-right: 5px;"><input type="text" name="" class="form-control" autocomplete="off" placeholder="Cargo Type (Jenis Barang)"></th>

          <th width="22%" class="tabelgariskiri" style="text-align: right; padding-right: 5px;">Next Port :</th>
          <th width="20%" class="tabelgariskanan" style="padding-right: 5px;"><input type="text" name="" class="form-control" autocomplete="off" placeholder="Next Port"></th>
        </tr>

        <tr>
          <th width="22%" class="tabelgariskiri" style="text-align: right; padding-right: 5px;">Activity (STS/WO/Bunkering/Crew/Other) :</th>
          <th width="20%" class="tabelgariskanan" colspan="2" style="padding-right: 5px;"><input type="text" name="" class="form-control" autocomplete="off" placeholder="Activity (STS/WO/Bunkering/Crew/Other)"></th>

          <th width="22%" class="tabelgariskiri" style="text-align: right; padding-right: 5px;">Last port (Tiba Dari) :</th>
          <th width="20%" class="tabelgariskanan" style="padding-right: 5px;"><input type="text" name="" class="form-control" autocomplete="off" placeholder="Last port (Tiba Dari)"></th>
        </tr>


        <tr>
          <th width="22%" class="tabelgariskiri" style="text-align: right; padding-right: 5px; border-bottom: 1px solid #000000;">STS Operator/Provider Name :</th>
          <th width="20%" class="tabelgariskanan" colspan="2" style="padding-right: 5px; border-bottom: 1px solid #000000;"><input type="text" name="" class="form-control" autocomplete="off" placeholder="STS Operator/Provider Name"></th>

          <th width="22%" class="tabelgariskiri" style="text-align: right; padding-right: 5px; border-bottom: 1px solid #000000;">Indiactive Fixed Rate For Sail In USD Rate Sails In Plan Date :</th>
          <th width="20%" class="tabelgariskanan" style="padding-right: 5px; border-bottom: 1px solid #000000;"><input type="text" name="" class="form-control" autocomplete="off" placeholder="Indiactive Fixed Rate For Sail In USD Rate Sails In Plan Date"></th>
        </tr>

      </table>

    </form>

  </div>
</div>

</div>