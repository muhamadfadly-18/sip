<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation" style="background-color: white;">

<div class="navbar-header" style="background-color: white;">
  <button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided"
  data-toggle="menubar">
    <span class="sr-only">Toggle navigation</span>
    <span class="hamburger-bar"></span>
  </button>
  <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse"
  data-toggle="collapse">
    <i class="icon wb-more-horizontal" aria-hidden="true"></i>
  </button>
  <div align="center" class="" data-toggle="gridmenu">
    <span class="navbar-brand-text  hidden-xs">
      <img style="width: 100px; height: 60px; " class="brand-img" src="<?php echo base_url(); ?>assets/images/logo-asinusa.png" alt="...">
    </span>
  </div>
  <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-search"
  data-toggle="collapse">
    <span class="sr-only">Toggle Search</span>
    <i class="icon wb-search" aria-hidden="true"></i>
  </button>
</div>

<div class="navbar-container container-fluid">
  <!-- Navbar Collapse -->
  <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
    <!-- Navbar Toolbar -->
    <ul class="nav navbar-toolbar">
      <li class="hidden-float" id="toggleMenubar">
        <a data-toggle="menubar" href="#" role="button">
          <i class="icon hamburger hamburger-arrow-left">
              <span class="sr-only">Toggle menubar</span>
              <span class="hamburger-bar"></span>
            </i>
        </a>
      </li>
          <!--   <li class="hidden-float">
        <a class="icon wb-search" data-toggle="collapse" href="#" data-target="#site-navbar-search"
        role="button">
          <span class="sr-only">Toggle Search</span>
        </a>
      </li> -->
    </ul>
    <!-- End Navbar Toolbar -->

    <!-- Navbar Toolbar Right -->
    <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
      <li class="hidden-float">
        <a class="icon not-active wb-user-circle" href="#">
          <?php
            $id_group = $this->session->userdata('id_group');
            $name_user = $this->session->userdata('name_user');
            $name_group = $this->db->query("select name_group from ref_group where id_group = '$id_group'")->row();

          ?>
         <?php echo $name_group->name_group;?> - <?php echo $name_user;?>
          <span class="sr-only">Toggle Search</span>
        </a>
      </li>
      <li class="dropdown">
        <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
        data-animation="scale-up" role="button">
          <span class="avatar avatar-online">
            <img src="<?php echo base_url(); ?>assets/global/portraits/5.jpg" alt="...">
            <i></i>
          </span>
        </a>
        <ul class="dropdown-menu" role="menu">
          
          <li role="presentation">
            <a href="<?php echo base_url()?>dashboard/get_logout" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Keluar</a>
          </li>
        </ul>
      </li>
    </ul>
    <!-- End Navbar Toolbar Right -->
  </div>
  <!-- End Navbar Collapse -->

  <!-- Site Navbar Seach -->
  <div class="collapse navbar-search-overlap" id="site-navbar-search">
    <form role="search">
      <div class="form-group">
        <div class="input-search">
          <i class="input-search-icon wb-search" aria-hidden="true"></i>
          <input type="text" class="form-control" name="site-search" placeholder="Search...">
          <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
          data-toggle="collapse" aria-label="Close"></button>
        </div>
      </div>
    </form>
  </div>
  <!-- End Site Navbar Seach -->
</div>
</nav>