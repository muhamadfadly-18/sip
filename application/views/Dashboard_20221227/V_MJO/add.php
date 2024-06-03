<div class="page-content padding-30 container-fluid">

  <div class="page-header">
    <h1 class="page-title">Maritive Job Order</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Beranda</a></li>
      <li><a href="<?php echo base_url('MJO');?>">Maritive Job Order</a></li>
      <li class="active">Tambah Data</li>
    </ol>
    <div class="page-header-actions">
      <a href="<?php echo base_url('MJO');?>" class="btn btn-sm btn-danger  btn-round">
        <i aria-hidden="true" class="icon wb-chevron-left-mini"></i>
        <span class="hidden-xs">Kembali</span>
      </a>
    </div>
  </div>

  <div class="panel">
      <div class="panel-body container-fluid">
        <div class="row row-lg">
          <div class="clearfix hidden-xs"></div>

          <div class="col-sm-12 col-md-12">
            <!-- Example Horizontal Form -->
            <div class="example-wrap">
              <h4 class="example-title"> Maritive Job Order</h4>
              <div class="example">
                <form class="form-horizontal" action="<?php echo base_url();?>MJO/add_action" method="post">

                <div class="form-group">
                    <label class="col-sm-2 control-label">Surat Pemberitahuan Kapal : </label>
                    <div class="col-sm-5">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="Surat Pemberitahuan Kapal" required name="txt1" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Date : </label>
                    <div class="col-sm-5">
                      <input type="hidden" name="id_group">
                      <input type="date" autocomplete="off" placeholder="Date" required name="txt2" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">PPKB  (FORM 201) : </label>
                    <div class="col-sm-5">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="PPKB  (FORM 201)" required name="txt3" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">PPKB DATE (FORM 201) : </label>
                    <div class="col-sm-5">
                      <input type="hidden" name="id_group">
                      <input type="date" autocomplete="off" placeholder="Date" required name="txt4" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Ref Job Order : </label>
                    <div class="col-sm-5">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="Ref Job Order" required name="txt5" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">MSO Date : </label>
                    <div class="col-sm-5">
                      <input type="hidden" name="id_group">
                      <input type="date" autocomplete="off" placeholder="MSO Date" required name="txt6" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">LOCAL AGENT : </label>
                    <div class="col-sm-5">
                      <div class="input-group">
          							<select data-plugin="select2" name="txt7" data-plugin="select" class="form-control" id="local_agent">
                                    <option> - <option>
                                    <?php

                                      $RCP = $this->db->query("select id_local_agent,local_agent from ref_local_agent ")->result();

                                      foreach($RCP as $value)
                                      {   ?>
                                         <option value="<?= $value->id_local_agent ?>"><?= $value->local_agent ?></option>
                                     <?php }
                                    ?>
                                  </select>

          						</div>

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">BROKER/ AGENT (KEAGENAN) : </label>
                    <div class="col-sm-5">
                      <div class="input-group">
                        <select data-plugin="select2" name="txt8" data-plugin="select" class="form-control" id="broker">
                                    <option> - <option>
                                    <?php

                                      $RCP = $this->db->query("select id_broker,broker from ref_broker ")->result();

                                      foreach($RCP as $value)
                                      {   ?>
                                         <option value="<?= $value->id_broker ?>"><?= $value->broker ?></option>
                                     <?php }
                                    ?>
                                  </select>

                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">STS OPERATOR : </label>
                    <div class="col-sm-5">
                      <div class="input-group">
                        <select data-plugin="select2" name="txt9" data-plugin="select" class="form-control" id="sts">
                                    <option> - <option>
                                    <?php

                                      $RCP = $this->db->query("select id_sts,sts from ref_sts ")->result();

                                      foreach($RCP as $value)
                                      {   ?>
                                         <option value="<?= $value->id_sts ?>"><?= $value->sts ?></option>
                                     <?php }
                                    ?>
                                  </select>

                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">VESSEL ACTIVITY : </label>
                    <div class="col-sm-5">
                      <select data-plugin="select2" name="txt10" data-plugin="select" class="form-control" id="vesel">
                                  <option> - <option>
                                  <?php

                                    $RCP = $this->db->query("select id_vessel,vessel from ref_vessel ")->result();

                                    foreach($RCP as $value)
                                    {   ?>
                                       <option value="<?= $value->id_vessel ?>"><?= $value->vessel ?></option>
                                   <?php }
                                  ?>
                                </select>

                    </div>
                  </div>

  <h4 class="example-title"> Vessel Information</h4>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label class="col-sm-3 control-label">Name of Vessel : </label>
      <div class="col-sm-8">
        <input type="hidden" name="id_group">
        <input type="text" autocomplete="off" placeholder="Name of Vessel" required name="txt_vi1" class="form-control">
      </div>
    </div>

  </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label class="col-sm-3 control-label">Flag (Call Sign) : </label>
          <div class="col-sm-8">
            <input type="hidden" name="id_group">
            <input type="text" autocomplete="off" placeholder="Flag (Call Sign)" required name="txt_vi2" class="form-control">
          </div>
        </div>
        <div class="form-group col-md-6">
          <label class="col-sm-3 control-label">GRT : </label>
          <div class="col-sm-8">
            <input type="hidden" name="id_group">
            <input type="text" autocomplete="off" placeholder=".0.00" required name="txt_vi3" class="form-control">
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label class="col-sm-3 control-label">Ship Owner : </label>
          <div class="col-sm-8">
            <input type="hidden" name="id_group">
            <input type="text" autocomplete="off" placeholder="Ship Owner" required name="txt_vi4" class="form-control">
          </div>
        </div>
        <div class="form-group col-md-6">
          <label class="col-sm-3 control-label">DWT : </label>
          <div class="col-sm-8">
            <input type="hidden" name="id_group">
            <input type="text" autocomplete="off" placeholder="0.00" required name="txt_vi5" class="form-control">
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label class="col-sm-3 control-label">Type of Vessel : </label>
          <div class="col-sm-8">
            <input type="hidden" name="id_group">
              <select data-plugin="select2" name="txt_vi6" data-plugin="select" class="form-control" id="vesel">
                          <option> - <option>
                          <?php

                            $RCP = $this->db->query("select id_tov,tov from ref_tov ")->result();

                            foreach($RCP as $value)
                            {   ?>
                               <option value="<?= $value->id_tov ?>"><?= $value->tov ?></option>
                           <?php }
                          ?>
                        </select>

             </div>
        </div>
        <div class="form-group col-md-6">
          <label class="col-sm-3 control-label">LOA : </label>
          <div class="col-sm-8">
            <input type="hidden" name="id_group">
            <input type="text" autocomplete="off" placeholder="0.00" required name="txt_vi7" class="form-control">
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label class="col-sm-3 control-label">Port of Register : </label>
          <div class="col-sm-8">
            <input type="hidden" name="id_group">
            <input type="text" autocomplete="off" placeholder="Port of Register" required name="txt_vi8" class="form-control">
          </div>
        </div>
        <div class="form-group col-md-6">
          <label class="col-sm-3 control-label">Cargo Transfer MT : </label>
          <div class="col-sm-8">
            <input type="hidden" name="id_group">
              <select data-plugin="select2" name="txt_vi9" data-plugin="select" class="form-control" id="vesel">
                          <option> - <option>
                          <?php

                            $RCP = $this->db->query("select id_mfv,mfv from ref_mfv ")->result();

                            foreach($RCP as $value)
                            {   ?>
                               <option value="<?= $value->id_mfv ?>"><?= $value->mfv ?></option>
                           <?php }
                          ?>
                        </select>
  </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label class="col-sm-3 control-label">Last Port of Call : </label>
          <div class="col-sm-8">
            <input type="hidden" name="id_group">
            <input type="text" autocomplete="off" placeholder="Last Port of Call" required name="txt_vi10" class="form-control">
          </div>
        </div>
        <div class="form-group col-md-6">
          <label class="col-sm-3 control-label">Cargo Type : </label>
          <div class="col-sm-8">
            <input type="hidden" name="id_group">
              <select data-plugin="select2" name="txt_vi11" data-plugin="select" class="form-control" id="vesel">
                          <option> - <option>
                          <?php

                            $RCP = $this->db->query("select id_cargo_type,cargo_type from ref_cargo_type ")->result();

                            foreach($RCP as $value)
                            {   ?>
                               <option value="<?= $value->id_cargo_type ?>"><?= $value->cargo_type ?></option>
                           <?php }
                          ?>
                        </select>
    </div>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label class="col-sm-3 control-label">Next Port of Call : </label>
          <div class="col-sm-8">
            <input type="hidden" name="id_group">
            <input type="text" autocomplete="off" placeholder="Next Port of Call" required name="txt_vi12" class="form-control">
          </div>
        </div>
        <div class="form-group col-md-6">
          <label class="col-sm-3 control-label">Mother / feeder Vessel : </label>
          <div class="col-sm-8">
            <input type="hidden" name="id_group">
              <select data-plugin="select2" name="txt_vi13" data-plugin="select" class="form-control" id="vesel">
                          <option> - <option>
                          <?php

                            $RCP = $this->db->query("select id_mfv,mfv from ref_mfv ")->result();

                            foreach($RCP as $value)
                            {   ?>
                               <option value="<?= $value->id_mfv ?>"><?= $value->mfv ?></option>
                           <?php }
                          ?>
                        </select>

             </div>
           </div>
        </div>
      </div>


  </div>


                  <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-8">
                      <input class="btn btn-primary" type="submit" value="Simpan">
                      <button class="btn btn-default btn-outline" type="reset">Reset</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
            <!-- End Example Horizontal Form -->


          </div>
        </div>
      </div>
    </div>
</div>
