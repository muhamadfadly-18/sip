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
    <li><a href="<?php echo base_url('SailInAgen');?>">Sail In Agen</a></li>
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

    <form class="form-horizontal" action="<?php echo base_url();?>SailInAgen/add_action" method="post">

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

      <div style="padding-top: 1%;"></div>

      <table border="1" width="100%" style="border-collapse: collapse;">
        <tr>
          <th colspan="8" class="tabelheader">Request Service & Tariff</th>
        </tr>

        <tr>
          <th class="tabelheader">NO</th>
          <th class="tabelheader">Service</th>
          <th class="tabelheader">Menu <br> Description <br> <font style="color: red;">(Wajib Pilih & Click Opsi Sesuai Yang Diinginkan)</font></th>
          <th class="tabelheader">Tarif</th>
          <th colspan="2" class="tabelheader">EOM</th>
          <th class="tabelheader">Total Service Charges</th>
          <th class="tabelheader">Remarks</th>
        </tr>

        <tr>
          <th colspan="8" style="font-weight: bold;">Asinusa Port Tarif</th>
        </tr>

        <tr>
          <th colspan="2" style="font-weight: bold;">1. General Harbour Charges</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th style="background: #FFD079; font-weight: bold; text-align: center;">Duration</th>
          <th style="background: #FFD079; font-weight: bold; text-align: center;">Req/ Period/Etmal/ Unit</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
        </tr>

        <tr>
          <th>1.1</th>
          <th>Pilotage <br> Sail In &  Sail Out</th>
          <th>< 6,000 GT</th>
          <th>USD 200,00</th>
          <th rowspan="8" style="text-align: center;"> 4 Dyas <br> 12 Hours <br> 30 Minutes</th>
          <th>2</th>
          <th>USD 400,00</th>
          <th>Sail In &  Sail Out (2 Movement)</th>
        </tr>

        <tr>
          <th>1.2</th>
          <th>Port Supervision & Management Service <br> ISPS Code & Compliance</th>
          <th>< 10,000 GT</th>
          <th>USD 500,00</th>
          <th>&nbsp;</th>
          <th>USD 500,00</th>
          <th>Per Vessel Per Visit</th>
        </tr>

        <tr>
          <th colspan="3" style="font-weight: bold;">2. Harbour Charges - Waiting Order Services (Labuh Sementara)</th>
          <th>&nbsp;</th>
          <th style="border-top : 1px solid #FFFFFF;">&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
        </tr>

        <tr>
          <th>2.1</th>
          <th>Waiting Order (Labuh Sementara)</th>
          <th>First 24 Hours</th>
          <th>USD 0,0015</th>
          <th rowspan="2">1</th>
          <th>USD 892,50</th>
          <th>Per GT Per 24 Hours</th>
        </tr>

        <tr>
          <th>2.2</th>
          <th>Waiting Order (Labuh Sementara) <br> Additional Hours</th>
          <th>Max 12 Hours</th>
          <th>USD 0,0168</th>
          <th>USD 1.428,00</th>
          <th>Additional Waiting Hours Per GT Per 12 Hours</th>
        </tr>

        <tr>
          <th colspan="3" style="font-weight: bold;">3.1. Iarbour Charges - STS Services (Alih Muat Kapal Ke Kapal)</th>
          <th>&nbsp;</th>
          <th style="border-top : 1px solid #FFFFFF;">&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
        </tr>

        <tr>
          <th>3.1.1</th>
          <th>Ship to Ship - Harbour Charges</th>
          <th><u><</u> 7 Days</th>
          <th>USD 0,035</th>
          <th>1</th>
          <th>USD 2.975,00</th>
          <th>Per GT 7 Days</th>
        </tr>

        <tr>
          <th>3.1.2</th>
          <th>Ship to Ship - Harbour Charges</th>
          <th><u><</u> 14 Days</th>
          <th>USD 0,038</th>
          <th>1</th>
          <th>USD 3.230,00</th>
          <th>Per GT 14 Days</th>
        </tr>

        <tr>
          <th colspan="3" style="font-weight: bold;">3.2. Ship To Ship Activity (Alih Muat Kapal ke Kapal)</th>
          <th>&nbsp;</th>
          <th style="background: #FFD079; font-weight: bold; text-align: center;">Number of/Disc.</th>
          <th style="background: #FFD079; font-weight: bold; text-align: center;">Req/ Period/Etmal/ Unit</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
        </tr>

        <tr>
          <th>3.2.1</th>
          <th>GT Vessel Range, LOA, Type Vessel</th>
          <th><u><</u> 3,000 GT; LOA up to 130 M</th>
          <th>USD 13.000,00</th>
          <th>Number of STS</th>
          <th>1</th>
          <th>USD 13.000,00</th>
          <th>Duration 24 hours/STS Activity</th>
        </tr>

        <tr>
          <th>3.2.2</th>
          <th>Pilotage - <br> Movement for STS</th>
          <th><u><</u> 6,000 GT</th>
          <th>USD 200,00</th>
          <th>Number of movements</th>
          <th>1</th>
          <th>USD 200,00</th>
          <th>Per Movement, Per Block</th>
        </tr>

        <tr>
          <th>3.2.3</th>
          <th>Cargo Transfer</th>
          <th>Cargo Shipment</th>
          <th>USD 0,0150</th>
          <th>Cargo Loading (MT)</th>
          <th>98.000</th>
          <th>USD 1.470,00</th>
          <th>Per MT Cargo</th>
        </tr>

        <tr>
          <th>3.2.4</th>
          <th>Port Supervision & Management Services <br> OSR - STS Activity Oil Tanker (Liquid)</th>
          <th><u><</u> 20,000 GT</th>
          <th>USD 1.000,00</th>
          <th>40%</th>
          <th>1</th>
          <th>USD 600,00</th>
          <th>Per Vessel Per Operation</th>
        </tr>

        <tr>
          <th>3.2.5</th>
          <th>Port Supervision & Management Services <br> OSR - STS LGC - LPG - VLGC (GAS/LNG)</th>
          <th><u><</u> 35,000 GT</th>
          <th>USD 1.000,00</th>
          <th>20%</th>
          <th>1</th>
          <th>USD 800,00</th>
          <th>Per Vessel Per Operation <br> LPG Pressure Vessel - Large Gas Carrier (LGC)</th>
        </tr>

        <tr>
          <th>3.2.6</th>
          <th>Number of Tug Based ON LOA</th>
          <th>LOA 70-150M</th>
          <th>&nbsp;</th>
          <th>Number of Tug Boat</th>
          <th>1</th>
          <th>&nbsp;</th>
          <th>Tug Unit Required</th>
        </tr>

        <tr>
          <th colspan="2" style="font-weight: bold;">3.3. Additional Service</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th style="background: #FFD079; font-weight: bold; text-align: center;">Number of Unit</th>
          <th style="background: #FFD079; font-weight: bold; text-align: center;">Hours</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
        </tr>

        <tr>
          <th>3.3.1</th>
          <th>Additional Tug <br> (Per Unit Per Hour)</th>
          <th><u><</u> 2,000 GT</th>
          <th>USD 185,92</th>
          <th>1</th>
          <th>0,5</th>
          <th>USD 91,96</th>
          <th>Additional Tug Unit & Hours</th>
        </tr>

        <tr>
          <th>3.3.2</th>
          <th>Additional Charge <br> Due STS Delay Operation</th>
          <th>Per Hour</th>
          <th>USD 600,00</th>
          <th>&nbsp;</th>
          <th>0,5</th>
          <th>USD 300,00</th>
          <th>STS Delay Hours</th>
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
          <th>&nbsp;</th>
          <th colspan="7" style="color:red;">Jangan Ubah Format</th>
        </tr>

        <tr>
          <th colspan="5" style="text-align: right;">INDICATIVE SERVICE CHARGES</th>
          <th style="border-left: 1px solid #FFFFFF;">&nbsp;</th>
          <th>USD 26.088,46</th>
          <th>IDR 370.456.100</th>
        </tr>

        <tr>
          <th colspan="5" style="text-align: right;">UPER/UP FRONT FEE PAID (SAIL IN)</th>
          <th>30,00%</th>
          <th>USD 7.827,54</th>
          <th>IDR 370.456.100</th>
        </tr>

        <tr>
          <th colspan="5" style="text-align: right;">INDICATIVE REMAIN SERVICE CHARGES</th>
          <th style="border-left: 1px solid #FFFFFF;">&nbsp;</th>
          <th>USD 18.261,92</th>
          <th>IDR 259.319.270.00</th>
        </tr>

        <tr>
          <th colspan="5" style="text-align: right;">PINALTY LATE SAIL IN ENROLLMENT (Kurang Dari Lapor 1 X 24 Jam)</th>
          <th>5%</th>
          <th>USD 1.304,42</th>
          <th>IDR 18.522.805</th>
        </tr>

        <tr>
          <th colspan="8" style="border-left: 1px solid #FFFFFF; border-right: 1px solid #FFFFFF;">&nbsp;</th>
        </tr>

        <tr>
          <th colspan="5" style="text-align: right;">UPER/UP FRONT FEE SERVICE TO BE PAID</th>
          <th style="border-left: 1px solid #FFFFFF;">&nbsp;</th>
          <th>USD 9.130,96</th>
          <th>IDR 129.659.635</th>
        </tr>
      </table>

      <div style="padding-top: 5%;"></div>

      <table border="1" width="100%" style="border-collapse: collapse; text-align:;">
        <tr>
          <th class="ttd" style="width: 12%;">Dibuat Oleh (Agen):</th>
          <th class="ttd" style="width: 12%;">Diperiksa Oleh (Agen):</th>
          <th class="ttd" style="width: 12%;">Disetujui Oleh (Agen):</th>
          <th style="width:8%; border-top: 1px solid #FFFFFF; border-bottom: 1px solid #FFFFFF;">&nbsp;</th>
          <th class="ttd" style="width: 20%;">Diveriifkasi oleh (Asinusa):</th>
          <th class="ttd" style="width: 20%;">Divalidasi oleh (Asinusa)::</th>
          <th class="ttd" style="width: 20%;">Disetujui oleh (Asinusa)::</th>
        </tr>
        <tr>
          <th class="ttd" style="padding-top: 5%;"> (.........................................) </th>
          <th class="ttd" style="padding-top: 5%;"> (.........................................) </th>
          <th class="ttd" style="padding-top: 5%;"> (.........................................) </th>
          <th style="width:8%; border-top: 1px solid #FFFFFF; border-bottom: 1px solid #FFFFFF;">&nbsp;</th>
          <th class="ttd" style="padding-top: 5%;"> (.........................................) </th>
          <th class="ttd" style="padding-top: 5%;"> (.........................................) </th>
          <th class="ttd" style="padding-top: 5%;"> (.........................................) </th>
        </tr>
        <tr>
          <th class="ttd" style="padding-top: 1.5%;">&nbsp;</th>
          <th class="ttd" style="padding-top: 1.5%;">&nbsp;</th>
          <th class="ttd" style="padding-top: 1.5%;">&nbsp;</th>
          <th style="width:8%; border-top: 1px solid #FFFFFF; border-bottom: 1px solid #FFFFFF;">&nbsp;</th>
          <th class="ttd">Finance Admin</th>
          <th class="ttd">Kepala Keuangan</th>
          <th class="ttd">Kepala Gudang</th>
        </tr>
        <tr>
          <th class="ttd">Tanggal:</th>
          <th class="ttd">Tanggal:</th>
          <th class="ttd">Tanggal:</th>
          <th style="width:8%; border-top: 1px solid #FFFFFF; border-bottom: 1px solid #FFFFFF;">&nbsp;</th>
          <th class="ttd">Tanggal:</th>
          <th class="ttd">Tanggal:</th>
          <th class="ttd">Tanggal:</th>
        </tr>
      </table>

    </form>
  </div>
</div>

</div>