<style type="text/css">

  .tabelatas{
    text-align: center; /*background: #93CAFF;*/ font-weight: bold; color: black; font-size: 18px;
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

  .tabelheader{
    text-align: center; /*background: #93CAFF;*/ font-weight: bold; color: black; font-size: 18px;
    border: 1px solid #000000;
  }

  .ttd{
    text-align: center;
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

<form class="form-horizontal" action="<?php echo base_url();?>sail_in_agen/add_action" method="post">

  <div class="panel">
    <div class="panel-body">
      <table width="100%" style="border-collapse: collapse;">
        <tr>
          <th class="tabelatas">Informasi Kapal (Vessel Information)</th>
        </tr>
      </table>
    </div>
  </div>

  <div class="col-md-6">
    <div class="panel">
      <div class="panel-body">

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Nomor Job Order :</label>
          <input type="text" class="form-control" id="inputText" name="inputText" value="<?= $data->no_job_order;?>" disabled placeholder="Nomor Job Order"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Tanggal Job Order :</label>
          <input type="text" class="form-control" id="inputText" name="inputText" value="<?= $data->tanggal_job_order;?>" disabled placeholder="Tanggal Job Order"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">No & Tanggal Surat Rencana Kedatangan (Sail In Plan) :</label>
          <input type="text" class="form-control" id="inputText" name="inputText" value="<?= $data->no_sail_in_plan.' '.$data->tanggal_sail_in_plan?>" disabled placeholder="No & Tanggal Surat Rencana Kedatangan (Sail In Plan)"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Nomor Form 201 & Tanggal (Sail Out) :</label>
          <input type="text" class="form-control" id="inputText" name="inputText" value="<?= $data->no_sail_out_plan.' '.$data->tanggal_sail_out_plan?>" disabled placeholder="Nomor Form 201 & Tanggal (Sail Out)"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Nama Kapal (Vessel Name) :</label>
          <input type="text" class="form-control" id="inputText" name="inputText" value="<?= $data->nama_kapal;?>" disabled placeholder="Nama Kapal (Vessel Name)"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">IMO Vessel No :</label>
          <input type="text" class="form-control" id="inputText" name="inputText" value="<?= $data->no_imo_vessel;?>" disabled placeholder="Nama Kapal (Vessel Name)"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Type Vessel :</label>
          <input type="text" class="form-control" id="inputText" name="inputText" value="<?= $data->id_type_vessel;?>" disabled placeholder="Nama Kapal (Vessel Name)"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Nahkoda/Jumlah Crew :</label>
          <input type="text" class="form-control" id="inputText" name="inputText" value="<?= $data->jml_crew;?>" disabled placeholder="Nahkoda/Jumlah Crew"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Gross Register Ton (GRT)/ Isi Kotor Kapal :</label>
          <input type="text" class="form-control" id="inputText" name="inputText" value="<?= $data->grt;?>" disabled placeholder="Gross Register Ton (GRT)/ Isi Kotor Kapal"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Lenght Over All (LOA)/ Panjang Kapal :</label>
          <input type="text" class="form-control" id="inputText" name="inputText" value="<?= $data->loa;?>" disabled placeholder="Lenght Over All (LOA)/ Panjang Kapal"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Actual Muatan Kapal (Cargo) :</label>
          <input type="text" class="form-control" id="inputText" name="inputText" value="<?= $data->actual_muatan;?>" disabled placeholder="Actual Muatan Kapal (Cargo)"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Jenis Cargo (Cargo Type) :</label>
          <?php $qry_jenis_cargo = $this->db->query("SELECT * from ref_cargo_type where  id_cargo_type >= '$data->id_jenis_cargo'")->row(); ?>

          <input type="text" class="form-control" id="inputText" name="inputText" value="<?= $qry_jenis_cargo->cargo_type;?>" disabled placeholder="Jenis Cargo (Cargo Type)"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Cargo Type (Jenis Barang) :</label>
          <input type="text" class="form-control" id="inputText" name="inputText" value="<?= $data->cargo_type;?>" disabled placeholder="Cargo Type (Jenis Barang)"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Activity (STS/WO/Bunkering/Crew/Other) :</label>
          <?php $qry_vessel_activity = $this->db->query("SELECT * from ref_vessel_activity where  id_vessel_activity >= '$data->id_activity'")->row(); ?>

          <input type="text" class="form-control" id="inputText" name="inputText" value="<?= $qry_vessel_activity->activity;?>" disabled placeholder="Activity (STS/WO/Bunkering/Crew/Other)"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">STS Operator/Provider Name :</label>
          <?php $qry_sts = $this->db->query("SELECT * from ref_sts where  id_sts >= '$data->id_sts_operator'")->row(); ?>

          <input type="text" class="form-control" id="inputText" name="inputText" value="<?= $qry_sts->sts;?>" disabled placeholder="STS Operator/Provider Name"\/>
        </div>

      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="panel">
      <div class="panel-body">

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Name Agen Marketing :</label>
          <input type="text" class="form-control" id="inputText" name="inputText" value="<?= $data->nama_agen_marketing;?>" disabled placeholder="Name Agen Marketing"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Name Local Agen (Local Agent Name) :</label>
          <input type="text" class="form-control" id="inputText" name="inputText" value="<?= $data->local_agen;?>" disabled placeholder="Name Local Agen (Local Agent Name)"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Pemilik Kapal/Cargo/ Carter (ship/Cargo/Carter Owner) :</label>
          <input type="text" class="form-control" id="inputText" name="inputText" value="<?= $data->pemilik_vessel;?>" disabled placeholder="Pemilik Kapal/Cargo/ Carter (ship/Cargo/Carter Owner)"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Bendera Kapal (Call Sign) :</label>
          <input type="text" class="form-control" id="inputText" name="inputText" value="<?= $data->call_sign;?>" disabled placeholder="Bendera Kapal (Call Sign)"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Estimate Date of Arrival :</label>
          <input type="text" class="form-control" id="inputText" name="inputText" value="<?= $data->actual_date_of_arrival;?>" disabled placeholder="Estimate Date of Arrival"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Estimate Time of Arrival :</label>
          <input type="text" class="form-control" id="inputText" name="inputText" value="<?= $data->actual_time_of_arrival;?>" disabled placeholder="Estimate Time of Arrival"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Estimate Date of Depart :</label>
          <input type="text" class="form-control" id="inputText" name="inputText" value="<?= $data->estimate_date_of_depart;?>" disabled placeholder="Estimate Date of Depart"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Estimate Time of Depart :</label>
          <input type="text" class="form-control" id="inputText" name="inputText" value="<?= $data->estimate_time_of_depart;?>" disabled placeholder="Estimate Time of Depart"\/>
        </div>


        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Voyage/Maniferst Cargo no :</label>
          <input type="text" class="form-control" id="inputText" name="inputText" value="<?= $data->cargo_no;?>" disabled placeholder="Voyage/Maniferst Cargo no"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Next Port :</label>
          <input type="text" class="form-control" id="inputText" name="inputText" value="<?= $data->next_port;?>" disabled placeholder="Next Port"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Last port (Tiba Dari) :</label>
          <input type="text" class="form-control" id="inputText" name="inputText" value="<?= $data->last_port;?>" disabled placeholder="Last port (Tiba Dari)"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Indiactive Fixed Rate For Sail In USD Rate Sails In Plan Date :</label>
          <input type="text" class="form-control" id="inputText" name="inputText" value="<?= $data->id_kurs;?>" disabled placeholder="Indiactive Fixed Rate For Sail In USD Rate Sails In Plan Date"\/>
        </div>

      </div>
    </div>
  </div>
  <?php
  $qry_pilotage = $this->db->query("SELECT * from ref_tarif_pilotage where  nilai_akhir >= '$data->grt' order by id_tarif_pilotage ASC limit 1 ")->row();
  $qry_isps = $this->db->query("SELECT * from ref_tarif_isps_code_compliance where  nilai_akhir >= '$data->grt' order by id_tarif_isps_code_compliance ASC limit 1 ")->row();

   ?>
  <div class="col-md-12">
    <div class="panel">
      <div class="panel-body">

        <table border="1" width="100%" style="border-collapse: collapse;">
          <tr>
            <th colspan="8" class="tabelheader" style="">Request Service & Tariff</th>
          </tr>

          <tr>
            <th class="tabelheader" style="width: 4%; ">NO</th>
            <th class="tabelheader" style="width: 26%;">Service</th>
            <th class="tabelheader" style="width: 20%;">Menu <br> Description <br> <font style="color: red;">(Wajib Pilih & Click Opsi Sesuai Yang Diinginkan)</font></th>
            <th class="tabelheader" style="width: 10%;">Tarif</th>
            <th colspan="2" class="tabelheader" style="width: 13%;">EOM</th>
            <th class="tabelheader" style="width: 10%;">Total Service Charges</th>
            <th class="tabelheader" style="width: 17%;">Remarks</th>
          </tr>

          <tr>
            <th colspan="8" style="color: black; padding-left: 5px;">Asinusa Port Tarif</th>
          </tr>

          <tr>
            <th colspan="2" style="color: black; padding-left: 5px; font-size: 17px;">1. General Harbour Charges</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th style="background: #FFD079; font-weight: bold; text-align: center;">Duration</th>
            <th style="background: #FFD079; font-weight: bold; text-align: center;">Req/ Period/Etmal/ Unit</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </tr>

          <tr>
            <th style="text-align: center;">1.1</th>
            <th style="padding-left: 4px;">Pilotage <br> Sail In &  Sail Out</th>
            <th style="padding-left: 4px;"><?php echo $qry_pilotage->vessel; ?></th>
            <th style="padding-left: 4px;">USD <?php echo $qry_pilotage->tarif; ?></th>
            <th rowspan="8" style="text-align: center;"> 4 Dyas <br> 12 Hours <br> 30 Minutes</th>
            <th style="text-align: center;">2</th>
            <th style="padding-left: 4px;">USD 400,00</th>
            <th style="padding-left: 4px;"><?php echo $qry_pilotage->description; ?></th>
          </tr>

          <tr>
            <th style="text-align: center;">1.2</th>
            <th style="padding-left: 4px;">Port Supervision & Management Service <br> ISPS Code & Compliance</th>
            <th style="padding-left: 4px;"><u></u> <?php echo $qry_isps->description; ?></th>
            <th style="padding-left: 4px;">USD <?php echo $qry_isps->rate; ?></th>
            <th style="padding-left: 4px;">&nbsp;</th>
            <th style="padding-left: 4px;">USD 500,00</th>
            <th style="padding-left: 4px;"><?php echo $qry_isps->remarks; ?></th>
          </tr>

          <tr>
            <th colspan="3" style="color: black; padding-left: 5px; font-size: 17px;">2. Harbour Charges - Waiting Order Services (Labuh Sementara)</th>
            <th>&nbsp;</th>
            <th style="border-top : 1px solid #FFFFFF;">&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </tr>

          <tr>
            <th style="text-align: center;">2.1</th>
            <th style="padding-left: 4px;">Waiting Order (Labuh Sementara)</th>
            <th style="padding-left: 4px;">First 24 Hours</th>
            <th style="padding-left: 4px;">USD 0,0015</th>
            <th rowspan="2" style="text-align: center;">1</th>
            <th style="padding-left: 4px;">USD 892,50</th>
            <th style="padding-left: 4px;">Per GT Per 24 Hours</th>
          </tr>

          <tr>
            <th style="text-align: center;">2.2</th>
            <th style="padding-left: 4px;">Waiting Order (Labuh Sementara) <br> Additional Hours</th>
            <th style="padding-left: 4px;">Max 12 Hours</th>
            <th style="padding-left: 4px;">USD 0,0168</th>
            <th style="padding-left: 4px;">USD 1.428,00</th>
            <th style="padding-left: 4px;">Additional Waiting Hours Per GT Per 12 Hours</th>
          </tr>

          <tr>
            <th colspan="3" style="color: black; padding-left: 5px; font-size: 17px;">3.1. Iarbour Charges - STS Services (Alih Muat Kapal Ke Kapal)</th>
            <th>&nbsp;</th>
            <th style="border-top : 1px solid #FFFFFF;">&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </tr>

          <tr>
            <th style="text-align: center;">3.1.1</th>
            <th style="padding-left: 4px;">Ship to Ship - Harbour Charges</th>
            <th style="padding-left: 4px;"><u><</u> 7 Days</th>
            <th style="padding-left: 4px;">USD 0,035</th>
            <th style="text-align: center;">1</th>
            <th style="padding-left: 4px;">USD 2.975,00</th>
            <th style="padding-left: 4px;">Per GT 7 Days</th>
          </tr>

          <tr>
            <th style="text-align: center;">3.1.2</th>
            <th style="padding-left: 4px;">Ship to Ship - Harbour Charges</th>
            <th style="padding-left: 4px;"><u><</u> 14 Days</th>
            <th style="padding-left: 4px;">USD 0,038</th>
            <th style="text-align: center;">1</th>
            <th style="padding-left: 4px;">USD 3.230,00</th>
            <th style="padding-left: 4px;">Per GT 14 Days</th>
          </tr>

          <tr>
            <th colspan="3" style="color: black; padding-left: 5px; font-size: 17px;">3.2. Ship To Ship Activity (Alih Muat Kapal ke Kapal)</th>
            <th>&nbsp;</th>
            <th style="background: #FFD079; font-weight: bold; text-align: center;">Number of/Disc.</th>
            <th style="background: #FFD079; font-weight: bold; text-align: center;">Req/ Period/Etmal/ Unit</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </tr>

          <tr>
            <th style="text-align: center;">3.2.1</th>
            <th style="padding-left: 4px;">GT Vessel Range, LOA, Type Vessel</th>
            <th style="padding-left: 4px;"><u><</u> 3,000 GT; LOA up to 130 M</th>
            <th style="padding-left: 4px;">USD 13.000,00</th>
            <th style="padding-left: 4px;">Number of STS</th>
            <th style="text-align: center;">1</th>
            <th style="padding-left: 4px;">USD 13.000,00</th>
            <th style="padding-left: 4px;">Duration 24 hours/STS Activity</th>
          </tr>

          <tr>
            <th style="text-align: center;">3.2.2</th>
            <th style="padding-left: 4px;">Pilotage - <br> Movement for STS</th>
            <th style="padding-left: 4px;"><u><</u> 6,000 GT</th>
            <th style="padding-left: 4px;">USD 200,00</th>
            <th style="padding-left: 4px;">Number of movements</th>
            <th style="text-align: center;">1</th>
            <th style="padding-left: 4px;">USD 200,00</th>
            <th style="padding-left: 4px;">Per Movement, Per Block</th>
          </tr>

          <tr>
            <th style="text-align: center;">3.2.3</th>
            <th style="padding-left: 4px;">Cargo Transfer</th>
            <th style="padding-left: 4px;">Cargo Shipment</th>
            <th style="padding-left: 4px;">USD 0,0150</th>
            <th style="padding-left: 4px;">Cargo Loading (MT)</th>
            <th style="text-align: center;">98.000</th>
            <th style="padding-left: 4px;">USD 1.470,00</th>
            <th style="padding-left: 4px;">Per MT Cargo</th>
          </tr>

          <tr>
            <th style="text-align: center;">3.2.4</th>
            <th style="padding-left: 4px;">Port Supervision & Management Services <br> OSR - STS Activity Oil Tanker (Liquid)</th>
            <th style="padding-left: 4px;"><u><</u> 20,000 GT</th>
            <th style="padding-left: 4px;">USD 1.000,00</th>
            <th style="padding-left: 4px;">40%</th>
            <th style="text-align: center;">1</th>
            <th style="padding-left: 4px;">USD 600,00</th>
            <th style="padding-left: 4px;">Per Vessel Per Operation</th>
          </tr>

          <tr>
            <th style="text-align: center;">3.2.5</th>
            <th style="padding-left: 4px;">Port Supervision & Management Services <br> OSR - STS LGC - LPG - VLGC (GAS/LNG)</th>
            <th style="padding-left: 4px;"><u><</u> 35,000 GT</th>
            <th style="padding-left: 4px;">USD 1.000,00</th>
            <th style="padding-left: 4px;">20%</th>
            <th style="text-align: center;">1</th>
            <th style="padding-left: 4px;">USD 800,00</th>
            <th style="padding-left: 4px;">Per Vessel Per Operation <br> LPG Pressure Vessel - Large Gas Carrier (LGC)</th>
          </tr>

          <tr>
            <th style="text-align: center;">3.2.6</th>
            <th style="padding-left: 4px;">Number of Tug Based ON LOA</th>
            <th style="padding-left: 4px;">LOA 70-150M</th>
            <th style="padding-left: 4px;">&nbsp;</th>
            <th style="padding-left: 4px;">Number of Tug Boat</th>
            <th style="text-align: center;">1</th>
            <th style="padding-left: 4px;">&nbsp;</th>
            <th style="padding-left: 4px;">Tug Unit Required</th>
          </tr>

          <tr>
            <th colspan="2" style="color: black; padding-left: 5px; font-size: 17px;">3.3. Additional Service</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th style="background: #FFD079; font-weight: bold; text-align: center;">Number of Unit</th>
            <th style="background: #FFD079; font-weight: bold; text-align: center;">Hours</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </tr>

          <tr>
            <th style="text-align: center;">3.3.1</th>
            <th style="padding-left: 4px;">Additional Tug <br> (Per Unit Per Hour)</th>
            <th style="padding-left: 4px;"><u><</u> 2,000 GT</th>
            <th style="padding-left: 4px;">USD 185,92</th>
            <th style="text-align: center;">1</th>
            <th style="text-align: center;">0,5</th>
            <th style="padding-left: 4px;">USD 91,96</th>
            <th style="padding-left: 4px;">Additional Tug Unit & Hours</th>
          </tr>

          <tr>
            <th style="text-align: center;">3.3.2</th>
            <th style="padding-left: 4px;">Additional Charge <br> Due STS Delay Operation</th>
            <th style="padding-left: 4px;">Per Hour</th>
            <th style="padding-left: 4px;">USD 600,00</th>
            <th>&nbsp;</th>
            <th style="text-align: center;">0,5</th>
            <th style="padding-left: 4px;">USD 300,00</th>
            <th style="padding-left: 4px;">STS Delay Hours</th>
          </tr>

          <tr>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </tr>

          <tr>
            <th colspan="8" style="color:red; border-left: 1px solid #FFFFFF; border-right: 1px solid #FFFFFF; padding-left: 50px;">Jangan Ubah Format</th>
          </tr>

          <tr>
            <th colspan="5" style="text-align: right; color: black; padding-right: 4px;">INDICATIVE SERVICE CHARGES</th>
            <th style="border-left: 1px solid #FFFFFF;">&nbsp;</th>
            <th style="text-align: center; color: black;">USD 26.088,46</th>
            <th style="text-align: center; color: black;">IDR 370.456.100</th>
          </tr>

          <tr>
            <th colspan="5" style="text-align: right; color: black; padding-right: 4px;">UPER/UP FRONT FEE PAID (SAIL IN)</th>
            <th style="text-align: center; color: black;">30,00%</th>
            <th style="text-align: center; color: black;">USD 7.827,54</th>
            <th style="text-align: center; color: black;">IDR 370.456.100</th>
          </tr>

          <tr>
            <th colspan="5" style="text-align: right; color: black; padding-right: 4px;">INDICATIVE REMAIN SERVICE CHARGES</th>
            <th style="border-left: 1px solid #FFFFFF;">&nbsp;</th>
            <th style="text-align: center; color: black;">USD 18.261,92</th>
            <th style="text-align: center; color: black;">IDR 259.319.270.00</th>
          </tr>

          <tr>
            <th colspan="5" style="text-align: right; color: black; padding-right: 4px;">PINALTY LATE SAIL IN ENROLLMENT (Kurang Dari Lapor 1 X 24 Jam)</th>
            <th style="text-align: center; color: black;">5%</th>
            <th style="text-align: center; color: black;">USD 1.304,42</th>
            <th style="text-align: center; color: black;">IDR 18.522.805</th>
          </tr>

          <tr>
            <th colspan="8" style="border-left: 1px solid #FFFFFF; border-right: 1px solid #FFFFFF;">&nbsp;</th>
          </tr>

          <tr>
            <th colspan="5" style="text-align: right; color: black; padding-right: 4px;">UPER/UP FRONT FEE SERVICE TO BE PAID</th>
            <th style="border-left: 1px solid #FFFFFF;">&nbsp;</th>
            <th style="text-align: center; color: black;">USD 9.130,96</th>
            <th style="text-align: center; color: black;">IDR 129.659.635</th>
          </tr>
        </table>

        <div style="padding-top: 5%;"></div>


      </div>
    </div>
  </div>


</form>

</div>
