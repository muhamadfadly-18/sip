<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<style type="text/css">

  .responsive-logo{background-size:cover; height:100%; width: 50%;}


  @media (min-width: 768px) and (max-width: 992px) {
     .responsive-logo{background-size:cover; height:100%; width: 35%;}
  }

  .text-container {
    display: inline-block;
    position: relative;
    overflow: hidden;
    color: black;
  }
  .spansss {
    position: absolute;
    top: 0;
    right: 15px;
    transition: right 0.2s;
    color: black;
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
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/css/skintools.min3f0d.css?v2.2.0">
  <script src="<?php echo base_url(); ?>assets/global/js/sections/skintools.min.js"></script> -->

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
    <div class="page-content vertical-align-middle">
      <div class="panel"  style="width: 100%;">
        <div class="panel-body">
          <div class="brand">
            <img src="http://www.asinusa.co.id/assets/logo-asinusa.png" alt="..." style="max-width: 200px;">
            <h1 style="font-size: 20px; text-align: left;">Estimate Asinusa Port Cost Calculator (Port Tariff & Port Dues to Government/PNBP)</h1>
          </div>
          <br>

          <form method="post" id="IdFormLogin">

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

            <div class="form-group form-material floating">
              <input type="text" class="form-control" name="vessel_name" value="<?php echo $vessel_name; ?>"/>
              <label class="floating-label" style="color: black; font-size: 13px; padding-bottom: 10%;">Vessel Name</label>
            </div>

            <div class="form-group form-material floating">
              <span class="spansss">(GRT)</span>
              <input type="text" class="form-control" name="gross_register" id="rupiah" value="<?php echo rupiah($gross_register); ?>"/>
              <label class="floating-label" style="color: black; font-size: 13px;">Gross Register Tonnase (GRT)</label>
            </div>

            <div class="form-group form-material floating">
              <span class="spansss">(NTR)</span>
              <input type="text" class="form-control" name="net_register" id="rupiah1" value="<?php echo rupiah($net_register); ?>"/>
              <label class="floating-label" style="color: black; font-size: 13px;">*Net Register Tonnase (NRT)</label>
            </div>

            <div class="form-group form-material floating">
              <span class="spansss">(DWT)</span>
              <input type="text" class="form-control" name="dead_weight" id="rupiah2" value="<?php echo rupiah($dead_weight); ?>"/>
              <label class="floating-label" style="color: black; font-size: 13px;">*Dead Weight Tonnase (DWT)</label>
            </div>

            <div class="form-group form-material floating">
              <span class="spansss">Meter</span>
              <input type="text" class="form-control" name="lenght_over" id="rupiah3" onkeypress="return isNumber(event)" value="<?php echo rupiah($lenght_over); ?>"/>
              <label class="floating-label" style="color: black; font-size: 13px;">Lenght Over All (LOA)</label>
            </div>

            <div class="form-material floating">
              <select name="vessel_type" class="form-control" required>
                <option value="1" <?php echo ($vessel_type == 1)?'selected':''?>>VLCC</option>
                <option value="2" <?php echo ($vessel_type == 2)?'selected':''?>>Suez</option>
                <option value="3" <?php echo ($vessel_type == 3)?'selected':''?>>LR 2</option>
                <option value="4" <?php echo ($vessel_type == 4)?'selected':''?>>LR 1</option>
                <option value="5" <?php echo ($vessel_type == 5)?'selected':''?>>MR</option>
                <option value="6" <?php echo ($vessel_type == 6)?'selected':''?>>Handy</option>
                <option value="7" <?php echo ($vessel_type == 7)?'selected':''?>>Barge</option>

              </select>
              <label class="floating-label" style="color: black; font-size: 13px;">Vessel Type</label>
            </div>

            <div class="form-group form-material floating">
              <input type="text" class="form-control" name="company_name" value="<?php echo $company_name; ?>"/>
              <label class="floating-label" style="color: black; font-size: 13px;">Company Name /Cargo Owner/ Agent</label>
            </div>

            <div class="form-material floating">
              <label class="floating-label" style="font-weight: bold; color: black; font-size: 15px;">Activity</label>
              &nbsp;
            </div>

            <div class="form-material floating">
               <div class="col-sm-6">
                 <select name="vessel_activity" class="form-control" required id="id_vessel_activity">
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
                 <select id="id_va_detail" name="va_detail" class="form-control" onchange="ShowHide()">
                   <option>--- Select ---</option>
                 </select>
               </div>
             </div>
           <br>
            <br>
            <br>


            <div class="form-group form-material floating" id="CargoMT">
              <span class="spansss">Matic Ton (MT)</span>
              <input type="text" class="form-control" name="cargo_mt" id="rupiah4" value="<?php echo $cargo_mt; ?>" onkeypress="return isNumber(event)"/>
              <label class="floating-label" style="color: black; font-size: 13px;">Cargo MT</label>
            </div>

            <div class="form-group form-material floating" id="CargoType">
              <select name="cargo_type" class="form-control" required>
                <option>--- Select ---</option>
                <option value="1">Oil/Chemical/Liquid</option>
                <option value="2">Gas/Condesate/LPG</option>
                <option value="3">Cargo Bulk</option>
              </select>
              <label class="floating-label" style="color: black; font-size: 13px;">Cargo Type</label>
            </div>

            <div class="form-group form-material floating" id="MFP">
              <input type="text" class="form-control" name="mfp" id="rupiah5" value="<?php echo $mfp; ?>"/>
              <label class="floating-label" style="color: black; font-size: 13px;">MFO/Oil Bunker MT</label>
            </div>

            <div class="form-material floating">
              <label class="floating-label" style="font-weight: bold; color: black; font-size: 15px;"> Estimate Date Time Arrival</label>
              &nbsp;
            </div>

            <div class="form-material floating">
              <div class="col-sm-6">
                <div class="form-group form-material floating">
                  <input type="date" class="form-control" name="arrival_date" value="<?php echo $arrival?>" />
                  <label class="floating-label" style="color: black; font-size: 13px;">Date</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group form-material floating">
                  <input type="time" class="form-control" name="arrival_time" value="<?php echo $arrival_time?>" />
                  <label class="floating-label" style="color: black; font-size: 13px;">Time</label>
                </div>
              </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="form-material floating">
              <label class="floating-label" style="font-weight: bold; color: black; font-size: 15px;"> Estimate Date Time Departure</label>
              &nbsp;
            </div>

            <div class="form-material floating">
              <div class="col-sm-6">
                <div class="form-group form-material floating">
                  <input type="date" class="form-control" name="departure_date" value="<?php echo $departure?>"/>
                  <label class="floating-label" style="color: black; font-size: 13px;">Date</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group form-material floating">
                  <input type="time" class="form-control" name="departure_time" value="<?php echo $departure_time?>"/>
                  <label class="floating-label" style="color: black; font-size: 13px;">Time</label>
                </div>
              </div>
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
  <script src="<?php echo base_URL()?>jquery.js"></script>
  <script>

  $("#id_vessel_activity").change(function (){
    var url = "<?php echo site_url('registrasi/DetailVessel');?>/"+$(this).val();
    $('#id_va_detail').load(url);
    return false;
  })

  $(document).ready(function(){
    $("#CargoMT").hide();
    $("#CargoType").hide();
    $("#MFP").hide();
  });

  function ShowHide(){
    var id_va_detail = $("#id_va_detail").val();

    if (id_va_detail == "1" || id_va_detail == "2" || id_va_detail == "3" || id_va_detail == "4" || id_va_detail == "7") {

      $("#CargoMT").show();
      $("#CargoType").show();
      $("#MFP").hide();

    }else if( id_va_detail == "5" ) {

      $("#CargoMT").hide();
      $("#CargoType").hide();
      $("#MFP").hide();


    }else if(id_va_detail == "6") {

      $("#CargoMT").hide();
      $("#CargoType").hide();
      $("#MFP").show();

    }

  }

  function isNumber(evt) {
      evt = (evt) ? evt : window.event;
      var charCode = (evt.which) ? evt.which : evt.keyCode;
      if (charCode > 31 && (charCode < 48 || charCode > 57)) {
          return false;
      }
      return true;
  }


  function subGenerate(){
    document.getElementById("IdFormLogin").action = "<?php echo base_url();?>registrasi/add_activity";
    document.getElementById("IdFormLogin").submit();

    return true;
  }




  var rupiah = document.getElementById('rupiah');
  rupiah.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah.value = formatRupiah(this.value, '');
  });

  /* Fungsi formatRupiah */
  function formatRupiah(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split       = number_string.split(','),
    sisa        = split[0].length % 3,
    rupiah        = split[0].substr(0, sisa),
    ribuan        = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
  }

  var rupiah1 = document.getElementById('rupiah1');
  rupiah1.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah1() untuk mengubah angka yang di ketik menjadi format angka
    rupiah1.value = formatRupiah1(this.value, '');
  });

  /* Fungsi formatRupiah1 */
  function formatRupiah1(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split       = number_string.split(','),
    sisa        = split[0].length % 3,
    rupiah1        = split[0].substr(0, sisa),
    ribuan        = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      rupiah1 += separator + ribuan.join('.');
    }

    rupiah1 = split[1] != undefined ? rupiah1 + ',' + split[1] : rupiah1;
    return prefix == undefined ? rupiah1 : (rupiah1 ? '' + rupiah1 : '');
  }

  var rupiah2 = document.getElementById('rupiah2');
  rupiah2.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah2() untuk mengubah angka yang di ketik menjadi format angka
    rupiah2.value = formatRupiah2(this.value, '');
  });

  /* Fungsi formatRupiah2 */
  function formatRupiah2(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split       = number_string.split(','),
    sisa        = split[0].length % 3,
    rupiah2        = split[0].substr(0, sisa),
    ribuan        = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      rupiah2 += separator + ribuan.join('.');
    }

    rupiah2 = split[1] != undefined ? rupiah2 + ',' + split[1] : rupiah2;
    return prefix == undefined ? rupiah2 : (rupiah2 ? '' + rupiah2 : '');
  }

  var rupiah3 = document.getElementById('rupiah3');
  rupiah3.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah3() untuk mengubah angka yang di ketik menjadi format angka
    rupiah3.value = formatRupiah3(this.value, '');
  });

  /* Fungsi formatRupiah3 */
  function formatRupiah3(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split       = number_string.split(','),
    sisa        = split[0].length % 3,
    rupiah3        = split[0].substr(0, sisa),
    ribuan        = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      rupiah3 += separator + ribuan.join('.');
    }

    rupiah3 = split[1] != undefined ? rupiah3 + ',' + split[1] : rupiah3;
    return prefix == undefined ? rupiah3 : (rupiah3 ? '' + rupiah3 : '');
  }

  var rupiah4 = document.getElementById('rupiah4');
  rupiah4.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah4() untuk mengubah angka yang di ketik menjadi format angka
    rupiah4.value = formatRupiah4(this.value, '');
  });
  /* Fungsi formatRupiah4 */
  function formatRupiah4(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split       = number_string.split(','),
    sisa        = split[0].length % 3,
    rupiah4        = split[0].substr(0, sisa),
    ribuan        = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      rupiah4 += separator + ribuan.join('.');
    }

    rupiah4 = split[1] != undefined ? rupiah4 + ',' + split[1] : rupiah4;
    return prefix == undefined ? rupiah4 : (rupiah4 ? '' + rupiah4 : '');
  }

  var rupiah5 = document.getElementById('rupiah5');
  rupiah4.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah4() untuk mengubah angka yang di ketik menjadi format angka
    rupiah4.value = formatRupiah5(this.value, '');
  });
  /* Fungsi formatRupiah4 */
  function formatRupiah5(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split       = number_string.split(','),
    sisa        = split[0].length % 3,
    rupiah5        = split[0].substr(0, sisa),
    ribuan        = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      rupiah5 += separator + ribuan.join('.');
    }

    rupiah5 = split[1] != undefined ? rupiah5 + ',' + split[1] : rupiah5;
    return prefix == undefined ? rupiah5 : (rupiah5 ? '' + rupiah5 : '');
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
