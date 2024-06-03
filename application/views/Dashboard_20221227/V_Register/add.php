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
  <h1 class="page-title">Register Vessel</h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Beranda</a></li>
    <li><a href="<?php echo base_url('Register');?>">Register Vessel</a></li>
    <li class="active">Tambah Data</li>
  </ol>
  <div class="page-header-actions">
    <a href="<?php echo base_url('Register');?>" class="btn btn-sm btn-danger  btn-round">
      <i aria-hidden="true" class="icon wb-chevron-left-mini"></i>
      <span class="hidden-xs">Kembali</span>
    </a>
  </div>
</div>

<form class="form-horizontal" action="<?php echo base_url();?>Register/add_action" method="post">

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
          <input type="text" class="form-control"  name="txt1" placeholder="Nomor Job Order"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Tanggal Job Order :</label>
          <input type="date" class="form-control" id="inputText" name="txt2" placeholder="Tanggal Job Order"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">No Surat Rencana Kedatangan (Sail In Plan) :</label>
          <input type="text" class="form-control" id="inputText" name="txt3" placeholder="No Surat Rencana Kedatangan (Sail In Plan)"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Tanggal Surat Rencana Kedatangan (Sail In Plan) :</label>
          <input type="date" class="form-control" id="inputText" name="txt4" placeholder="No & Tanggal Surat Rencana Kedatangan (Sail In Plan)"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Nomor Form 201 (Sail Out) :</label>
          <input type="text" class="form-control" id="inputText" name="txt5" placeholder="Nomor Form 201 (Sail Out)"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Tanggal (Sail Out) :</label>
          <input type="date" class="form-control" id="inputText" name="txt6" placeholder="Nomor Form 201 & Tanggal (Sail Out)"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Nama Kapal (Vessel Name) :</label>
          <input type="text" class="form-control" id="inputText" name="txt7" placeholder="Nama Kapal (Vessel Name)"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">IMO Vessel No :</label>
          <input type="text" class="form-control" id="inputText" name="txt8" placeholder="IMO Vessel No"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Type Vessel :</label>
          <select data-plugin="select2" name="txt9" data-plugin="select" class="form-control" id="vesel">
                      <option> - <option>
                      <?php

                        $RCP = $this->db->query("select id_tov,tov from ref_tov order by tov asc")->result();

                        foreach($RCP as $value)
                        {   ?>
                           <option value="<?= $value->id_tov ?>"><?= $value->tov ?></option>
                       <?php }
                      ?>
                    </select>
       </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Nahkoda/Jumlah Crew :</label>
          <input type="text" class="form-control" id="inputText" name="txt10" placeholder="Nahkoda/Jumlah Crew"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Gross Register Ton (GRT)/ Isi Kotor Kapal :</label>
          <input type="text" class="form-control" id="inputText" name="txt11" placeholder="Gross Register Ton (GRT)/ Isi Kotor Kapal"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Lenght Over All (LOA)/ Panjang Kapal :</label>
          <input type="text" class="form-control" id="inputText" name="txt12" placeholder="Lenght Over All (LOA)/ Panjang Kapal"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Actual Muatan Kapal (Cargo) :</label>
          <input type="text" class="form-control" id="inputText" name="txt13" placeholder="Actual Muatan Kapal (Cargo)"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Jenis Cargo (Cargo Type) :</label>
          <select data-plugin="select2" name="txt14" data-plugin="select" class="form-control" id="vesel">
                      <option> - <option>
                      <?php

                        $RCP = $this->db->query("select id_cargo_type,cargo_type from ref_cargo_type order by cargo_type asc")->result();

                        foreach($RCP as $value)
                        {   ?>
                           <option value="<?= $value->id_cargo_type ?>"><?= $value->cargo_type ?></option>
                       <?php }
                      ?>
                    </select>
           </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Cargo Type (Jenis Barang) :</label>
          <input type="text" class="form-control" id="inputText" name="txt15" placeholder="Cargo Type (Jenis Barang)"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Activity (STS/WO/Bunkering/Crew/Other) :</label>
          <select data-plugin="select2" name="txt16" data-plugin="select" class="form-control" id="vesel">
                      <option> - <option>
                      <?php

                        $RCP = $this->db->query("select id_vessel_activity,activity from ref_vessel_activity order by activity asc")->result();

                        foreach($RCP as $value)
                        {   ?>
                           <option value="<?= $value->id_vessel_activity ?>"><?= $value->activity ?></option>
                       <?php }
                      ?>
                    </select>
          </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">STS Operator/Provider Name :</label>
          <select data-plugin="select2" name="txt17" data-plugin="select" class="form-control" id="vesel">
                      <option> - <option>
                      <?php

                        $RCP = $this->db->query("select id_sts,sts from ref_sts order by sts asc")->result();

                        foreach($RCP as $value)
                        {   ?>
                           <option value="<?= $value->id_sts ?>"><?= $value->sts ?></option>
                       <?php }
                      ?>
                    </select>
          </div>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="panel">
      <div class="panel-body">

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Name Agen Marketing :</label>
          <input type="text" class="form-control" id="inputText" name="txt18" placeholder="Name Agen Marketing"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Name Local Agen (Local Agent Name) :</label>
          <input type="text" class="form-control" id="inputText" name="txt19" placeholder="Name Local Agen (Local Agent Name)"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Pemilik Kapal/Cargo/ Carter (ship/Cargo/Carter Owner) :</label>
          <input type="text" class="form-control" id="inputText" name="txt20" placeholder="Pemilik Kapal/Cargo/ Carter (ship/Cargo/Carter Owner)"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Bendera Kapal (Call Sign) :</label>
          <input type="text" class="form-control" id="inputText" name="txt21" placeholder="Bendera Kapal (Call Sign)"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Estimate Date of Arrival :</label>
          <input type="date" class="form-control" id="inputText" name="txt22" placeholder="Estimate Date of Arrival"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Estimate Time of Arrival :</label>
          <input type="time" class="form-control" id="inputText" name="txt23" placeholder="Estimate Time of Arrival"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Estimate Date of Depart :</label>
          <input type="date" class="form-control" id="inputText" name="txt24" placeholder="Estimate Date of Depart"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Estimate Time of Depart :</label>
          <input type="time" class="form-control" id="inputText" name="txt25" placeholder="Estimate Time of Depart"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Voyage/Maniferst Cargo no :</label>
          <input type="text" class="form-control" id="inputText" name="txt26" placeholder="Voyage/Maniferst Cargo no"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Next Port :</label>
          <input type="text" class="form-control" id="inputText" name="txt27" placeholder="Next Port"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Last port (Tiba Dari) :</label>
          <input type="text" class="form-control" id="inputText" name="txt28" placeholder="Last port (Tiba Dari)"\/>
        </div>

        <div class="form-group form-material">
          <label class="control-label" for="inputText" style="font-weight: bold;">Indiactive Fixed Rate For Sail In USD Rate Sails In Plan Date :</label>
          <input type="text" class="form-control" id="inputText" name="txt29" placeholder="Indiactive Fixed Rate For Sail In USD Rate Sails In Plan Date"\/>
        </div>

      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-12 col-sm-offset-4">
      <input class="btn btn-primary" type="submit" value="Simpan">
      <button class="btn btn-default btn-outline" type="reset">Reset</button>
    </div>
  </div>

</form>

</div>
