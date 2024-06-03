

<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<style type="text/css">

  .responsive-logo{background-size:cover; height:100%; width: 50%;}


  @media (min-width: 768px) and (max-width: 992px) {
     .responsive-logo{background-size:cover; height:100%; width: 35%;}
  }

</style>

 <meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">

  <title>Asinusa Port Cost Calculator</title>

  <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/global/images/wk.png">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/global/assets/images/wk.png">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/css/bootstrap.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/css/bootstrap-extend.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/assets/css/site.min3f0d.css?v2.2.0">

  <!-- Skin tools (demo site only) -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/css/skintools.min3f0d.css?v2.2.0">
  <script src="<?php echo base_url(); ?>assets/global/js/sections/skintools.min.js"></script>

  <!-- Plugins -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/animsition/animsition.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/asscrollable/asScrollable.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/switchery/switchery.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/intro-js/introjs.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/slidepanel/slidePanel.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/flag-icon-css/flag-icon.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/select2/select2.min3f0d.css?v2.2.0">

  <!-- Page -->
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/assets/examples/css/pages/login-v2.min3f0d.css?v2.2.0"> -->
   <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/assets/examples/css/pages/login.min3f0d.css?v2.2.0"> -->

  <!-- Fonts -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/fonts/web-icons/web-icons.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/fonts/brand-icons/brand-icons.min3f0d.css?v2.2.0">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>


  <!--[if lt IE 9]>
    <script src="../../global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->

  <!--[if lt IE 10]>
    <script src="../../global/vendor/media-match/media.match.min.js"></script>
    <script src="../../global/vendor/respond/respond.min.js"></script>
    <![endif]-->

  <!-- Scripts -->
  <script src="<?php echo base_url(); ?>assets/global/vendor/modernizr/modernizr.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/vendor/breakpoints/breakpoints.min.js"></script>
  <script>
    Breakpoints();
  </script>
</head>
<body class="page-login layout-full page-dark">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


  <!-- Page -->
  <div class="page animsition vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content vertical-align-middle" style="padding-right: 20%;">
      <div class="panel"  style="width: 165%;">
        <div class="panel-body">
          <div class="brand">
            <img src="http://www.asinusa.co.id/assets/logo-asinusa.png" alt="..." style="max-width: 200px;">
            <h1 style="font-size: 20px; text-align: left;">Estimated Asinusa Port Cost Calculator  </h1>
          </div>
          <br>

          <form class="form-horizontal" method="post" id="IdFormLogin">

            <!-- <div class="form-group">
              <label class="col-sm-12 control-label" style="color: black; font-size: 15px; font-weight: bold;  text-align: left;">Data Diri</label>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" style="color: black; font-size: 15px;">Nama : </label>
              <div class="col-sm-9">
                <input type="text" autocomplete="off" placeholder="Nama" name="nama" value="<?php echo $nama; ?>" class="form-control" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" style="color: black; font-size: 15px;">Email : </label>
              <div class="col-sm-9">
                <input type="text" autocomplete="off" placeholder="Email" name="email" value="<?php echo $email; ?>" class="form-control" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" style="color: black; font-size: 15px;">No Wa : </label>
              <div class="col-sm-9">
                <input type="text" autocomplete="off" placeholder="No Wa" name="no_wa" value="<?php echo $no_wa; ?>" class="form-control" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-12 control-label" style="color: black; font-size: 15px; font-weight: bold;  text-align: left;">Vessel</label>
            </div> -->
            
            <div class="form-group">
              <label class="col-sm-3 control-label" style="color: black; font-size: 15px;">Vessel Type : </label>
              <div class="col-sm-9">
                <input type="text" autocomplete="off" placeholder="Vessel Type" name="vessel_name" value="<?php echo $vessel_name; ?>" class="form-control" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" style="color: black; font-size: 15px;">Gross Register Ton (GTR) : </label>
              <div class="col-sm-9">
                <input type="text" autocomplete="off" placeholder="Gross Register Ton (GTR)" name="gross_register" value="<?php echo rupiah($gross_register); ?>" class="form-control" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" style="color: black; font-size: 15px;">Net Register Tonnage (NTR) : </label>
              <div class="col-sm-9">
                <input type="text" autocomplete="off" placeholder="Net Register Tonnage (NTR)" name="net_register" value="<?php echo rupiah($net_register); ?>" class="form-control" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" style="color: black; font-size: 15px;">Dead Weight Tonnage (DWT) : </label>
              <div class="col-sm-9">
                <input type="text" autocomplete="off" placeholder="Dead Weight Tonnage (DWT)" name="dead_weight" value="<?php echo rupiah($dead_weight); ?>" class="form-control" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" style="color: black; font-size: 15px;">Lenght Over All (LOA) : </label>
              <div class="col-sm-9">
                <input type="text" autocomplete="off" placeholder="Lenght Over All (LOA)" name="lenght_over" value="<?php echo rupiah($lenght_over); ?>" class="form-control" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" style="color: black; font-size: 15px;">Vessel Type : </label>
              <div class="col-sm-9">
                <select name="vessel_type" class="form-control" readonly>
                  <option value="1" <?php echo ($vessel_type == 1)?'selected':''?>>VLCC</option>
                  <option value="2" <?php echo ($vessel_type == 2)?'selected':''?>>Suez</option>
                  <option value="3" <?php echo ($vessel_type == 3)?'selected':''?>>LR 2</option>
                  <option value="4" <?php echo ($vessel_type == 4)?'selected':''?>>LR 1</option>
                  <option value="5" <?php echo ($vessel_type == 5)?'selected':''?>>MR</option>
                  <option value="6" <?php echo ($vessel_type == 6)?'selected':''?>>Handy</option>
                  <option value="7" <?php echo ($vessel_type == 7)?'selected':''?>>Barge</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" style="color: black; font-size: 15px;">Company Name (Shipping Company/Ship Charterer/Cargo Owner/Agent) : </label>
              <div class="col-sm-9">
                <input type="text" autocomplete="off" placeholder="Company Name (Shipping Company/Ship Charterer/Cargo Owner/Agent)" name="company_name" value="<?php echo $company_name; ?>" class="form-control" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" style="color: black; font-size: 15px;">Activity : </label>
              <?php
                $Data = $this->db->query("SELECT * FROM ref_vessel_activity WHERE id_vessel_activity = '$vessel_activity' ")->row();
              ?>
              <div class="col-sm-5">
                <select name="vessel_activity" class="form-control" readonly>
                  <option value="<?php echo $Data->id_vessel_activity?>"><?php echo $Data->activity;?></option>
              </select>
                </div>
              <?php
                $DataDetail = $this->db->query("SELECT * FROM ref_vessel_detail WHERE id = '$va_detail' ")->row();
              ?>
              <div class="col-sm-4">
                <select name="va_detail" class="form-control" readonly>
                  <option value="<?php echo $DataDetail->id?>"><?php echo $DataDetail->nama;?></option>
                </select>
              </div>
            </div>

            <?php if ($vessel_activity == 1 || $vessel_activity == 2) { ?>
              <div class="form-group">
                <label class="col-sm-3 control-label" style="color: black; font-size: 15px;">Cargo MT : </label>
                <div class="col-sm-9">
                  <input type="text" autocomplete="off" placeholder="Cargo MT" name="cargo_mt" value="<?php echo rupiah($cargo_mt); ?>" class="form-control" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" style="color: black; font-size: 15px;">Cargo Type : </label>
                <div class="col-sm-9">
                  <select name="cargo_mt" class="form-control" readonly>
                    <option value="1" <?php echo ($cargo_type == 1)?'selected':''?>>Oil/Chemical/Liquid</option>
                    <option value="2" <?php echo ($cargo_type == 2)?'selected':''?>>Gas/Condesate/LPG</option>
                    <option value="3" <?php echo ($cargo_type == 3)?'selected':''?>>Cargo Bulk</option>
                  </select>
                </div>
              </div>
            <?php }elseif($vessel_activity == 3 || $vessel_activity == 4 || $vessel_activity == 5){ ?>
              <div class="form-group">
                <label class="col-sm-3 control-label" style="color: black; font-size: 15px;">MFP/Oil Bunker MT : </label>
                <div class="col-sm-9">
                  <input type="text" autocomplete="off" placeholder="MFP/Oil Bunker MT" name="mfp" value="<?php echo $mfp; ?>" class="form-control" readonly>
                </div>
              </div>
            <?php } ?>

            <div class="form-group">
              <label class="col-sm-3 control-label" style="color: black; font-size: 15px;">Arrival Date & Time : </label>
              <div class="col-sm-9">
                <input type="text" autocomplete="off" placeholder="Arrival Date & Time" name="" value="<?php echo date('d-M-Y', strtotime($arrival)).' '.($arrival_time); ?>" class="form-control" readonly>
                <input type="text" name="arrival_date" value="<?php echo $arrival?>" style="display: none;">
                <input type="text" name="arrival_time" value="<?php echo $arrival_time?>" style="display: none;">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" style="color: black; font-size: 15px;">Departure Date & Time : </label>
              <div class="col-sm-9">
                <input type="text" autocomplete="off" placeholder="Departure Date & Time" name="" value="<?php echo date('d-M-Y', strtotime($departure)).' '.($departure_time); ?>" class="form-control" readonly>
                <input type="text" name="departure_date" value="<?php echo $departure?>" style="display: none;">
                <input type="text" name="departure_time" value="<?php echo $departure_time?>" style="display: none;">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" style="color: black; font-size: 15px;">Activity Days : </label>
              <div class="col-sm-9">
                <input type="text" autocomplete="off" placeholder="Departure Date & Time" name="" value="<?php echo $jarak; ?> Days" class="form-control" readonly>
              </div>
            </div>

            <br><hr>
<!-- 
            <div class="form-group">
              <label class="col-sm-3 control-label" style="color: black; font-size: 15px;">Pilotage : </label>
              <div class="col-sm-9">
                <input type="text" autocomplete="off"  name="" value="<?php echo ($result_pilotage); ?>" class="form-control" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" style="color: black; font-size: 15px;">ISPS : </label>
              <div class="col-sm-9">
                <input type="text" autocomplete="off"  name="" value="<?php echo $result_isps; ?>" class="form-control" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" style="color: black; font-size: 15px;">STS : </label>
              <div class="col-sm-9">
                <input type="text" autocomplete="off"  name="" value="<?php echo $result_sts; ?>" class="form-control" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" style="color: black; font-size: 15px;">STS ALM : </label>
              <div class="col-sm-9">
                <input type="text" autocomplete="off"  name="" value="<?php echo $result_sts_alm; ?>" class="form-control" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" style="color: black; font-size: 15px;">Cargo Transfer : </label>
              <div class="col-sm-9">
                <input type="text" autocomplete="off"  name="" value="<?php echo $result_cargo_transfer; ?>" class="form-control" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" style="color: black; font-size: 15px;">Port OSR : </label>
              <div class="col-sm-9">
                <input type="text" autocomplete="off"  name="" value="<?php echo $result_osr; ?>" class="form-control" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" style="color: black; font-size: 15px;">Labuh : </label>
              <div class="col-sm-9">
                <input type="text" autocomplete="off"  name="" value="<?php echo round($result_labuh) ?>" class="form-control" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" style="color: black; font-size: 15px;">Rambu : </label>
              <div class="col-sm-9">
                <input type="text" autocomplete="off"  name="" value="<?php echo round($result_rambu) ?>" class="form-control" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" style="color: black; font-size: 15px;">VTS : </label>
              <div class="col-sm-9">
                <input type="text" autocomplete="off"  name="" value="<?php echo round($result_vts) ?>" class="form-control" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" style="color: black; font-size: 15px;">PUP DC : </label>
              <div class="col-sm-9">
                <input type="text" autocomplete="off"  name="" value="<?php echo round($result_pup) ?>" class="form-control" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" style="color: black; font-size: 15px;">Cargo Transfer : </label>
              <div class="col-sm-9">
                <input type="text" autocomplete="off"  name="" value="<?php echo round($result_cargo_transfer_pnbp) ?>" class="form-control" readonly>
              </div>
            </div> -->


            <h2>Total Port Cost : USD <?php echo  rupiah($total_sts_feeder_FSO); ?>
            <hr>
            <div class="form-group">
              <div class="col-sm-2 col-sm-offset-10">
                <button type="button" class="btn btn-labeled btn-danger" onclick="subKembali();" style="width: 100px; height: 35px;"><i aria-hidden="true" class="icon wb-chevron-left-mini"></i><span class="hidden-xs">Back</span></button>
              </div>
            </div>

          </form>
        </div>
      </div>

      <!-- <footer class="page-copyright page-copyright-inverse">
        <p>WEBSITE BY POLOSAN</p>
        <p>© 2018. All RIGHT RESERVED.</p>
      </footer> -->
    </div>
  </div>
  <!-- End Page -->

  <script>
  function isNumberPhone(evt) {
      evt = (evt) ? evt : window.event;
      var charCode = (evt.which) ? evt.which : evt.keyCode;
      if (charCode > 31 && (charCode < 48 || charCode > 57)) {
          return false;
      }
      return true;
  }
  </script>

  <script type="text/javascript">

  function subKembali(){
    document.getElementById("IdFormLogin").action = "<?php echo base_url();?>registrasi/view";
    document.getElementById("IdFormLogin").submit();

    return true;
  }

</script>


  <!-- Core  -->
  <script src="<?php echo base_url(); ?>assets/global/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/vendor/animsition/animsition.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/vendor/asscroll/jquery-asScroll.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/vendor/mousewheel/jquery.mousewheel.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/vendor/asscrollable/jquery.asScrollable.all.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/vendor/ashoverscroll/jquery-asHoverScroll.min.js"></script>

  <!-- Plugins -->
  <script src="<?php echo base_url(); ?>assets/global/vendor/switchery/switchery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/vendor/intro-js/intro.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/vendor/screenfull/screenfull.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/vendor/slidepanel/jquery-slidePanel.min.js"></script>

  <!-- Plugins For This Page -->
  <script src="<?php echo base_url(); ?>assets/global/vendor/jquery-placeholder/jquery.placeholder.min.js"></script>

  <!-- Scripts -->
  <script src="<?php echo base_url(); ?>assets/global/js/core.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/assets/js/site.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/vendor/select2/select2.full.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/js/components/select2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/assets/js/sections/menu.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/assets/js/sections/menubar.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/assets/js/sections/gridmenu.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/assets/js/sections/sidebar.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/global//js/configs/config-colors.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/assets/js/configs/config-tour.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/global/js/components/asscrollable.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/js/components/animsition.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/js/components/slidepanel.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/js/components/switchery.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/global/js/components/jquery-placeholder.min.js"></script>

  <script>
    (function(document, window, $) {
      'use strict';

      var Site = window.Site;
      $(document).ready(function() {
        Site.run();
      });
    })(document, window, jQuery);
  </script>

</body>



</html>
