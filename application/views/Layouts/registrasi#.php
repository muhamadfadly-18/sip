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

  <title>Register [Polosan]</title>

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
      <div class="panel"  style="width: 200%;">
        <div class="panel-body">
          <div class="brand">
            <img src="http://www.asinusa.co.id/assets/logo-asinusa.png" alt="..." style="max-width: 200px;">
            <h1 style="font-size: 20px; text-align: left;">Estimation Asinusa Port Cost Calculator</h1>
          </div>
          <br>

          <form method="post" id="IdFormLogin">

            <div class="form-group form-material floating">
              <input type="text" class="form-control" name=""/>
              <label class="floating-label" style="color: black; font-size: 13px;">Vessel Name</label>
            </div>

            <div class="form-group form-material floating">
              <input type="text" class="form-control" name="" onkeypress="return isNumberPhone(event)"/>
              <label class="floating-label" style="color: black; font-size: 13px;">Gross Register Ton (GTR)</label>
            </div>

            <div class="form-group form-material floating">
              <input type="text" class="form-control" name="" required onkeypress="return isNumberPhone(event)"/>
              <label class="floating-label" style="color: red; font-size: 13px;">*Net Register Tonnage (NTR)</label>
            </div>

            <div class="form-group form-material floating">
              <input type="text" class="form-control" name="" required onkeypress="return isNumberPhone(event)"/>
              <label class="floating-label" style="color: red; font-size: 13px;">*Dead Weight Tonnage (DWT)</label>
            </div>

            <div class="form-group form-material floating">
              <input type="text" class="form-control" name="" onkeypress="return isNumberPhone(event)"/>
              <label class="floating-label" style="color: black; font-size: 13px;">Lenght Over All (LOA)</label>
            </div>

            <div class="form-material floating">
              <select name="" class="form-control" required>
                <option>--- Select ---</option>
                <option value="1">VLCC</option>
                <option value="2">Suez</option>
                <option value="3">LR 2</option>
                <option value="4">LR 1</option>
                <option value="5">MR</option>
                <option value="6">Handy</option>
              </select>
              <label class="floating-label" style="color: black; font-size: 13px;">Vessel Type</label>
            </div>

            <div class="form-group form-material floating">
              <input type="text" class="form-control" name="" onkeypress="return isNumberPhone(event)"/>
              <label class="floating-label" style="color: black; font-size: 13px;">Company Name /Cargo Owner/ Agent</label>
            </div>

            <div class="form-material floating">
              <label class="floating-label" style="font-weight: bold; color: black; font-size: 15px;">Activity</label>
              &nbsp;
            </div>

            <div class="form-material floating">
              <div class="col-sm-6">
                <select name="id_vessel_activity" class="form-control" required>
                  <option>--- Select ---</option>
                  <?php
                    $DataVessel = $this->db->query("SELECT * FROM ref_vessel_activity ORDER BY id_vessel_activity ASC")->result();
                    foreach($DataVessel as $value){
                  ?>
                    <option value="<?php echo $value->id_vessel_activity; ?>"><?php echo $value->activity; ?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>
              <div class="col-sm-6">
                <select name="" class="form-control" required>
                  <option>--- Select ---</option>
                  <option value="1">Mother</option>
                  <option value="2">Feeder</option>
                </select>
              </div>
            </div>

            <br>
            <br>
            <br>
            <div class="form-group form-material floating">
              <input type="date" class="form-control" name=""/>
              <label class="floating-label" style="color: black; font-size: 13px;">Arrival Date & Time</label>
            </div>

            <div class="form-group form-material floating">
              <input type="date" class="form-control" name=""/>
              <label class="floating-label" style="color: black; font-size: 13px;">Departure Date & Time</label>
            </div>

          
            <div class="form-group">
              <div class="col-sm-4 col-sm-offset-8">
                <button class="btn btn-default btn-info" type="reset">Reset</button>
                <button type="button" class="btn btn-labeled btn-success" onclick="subGenerate();" style="width: 100px; height: 35px;">&nbsp;&nbsp;&nbsp;Generate</button>
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

  function subGenerate(){
    document.getElementById("IdFormLogin").action = "<?php echo base_url();?>registrasi/add_activity";
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
