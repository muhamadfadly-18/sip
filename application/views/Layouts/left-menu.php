
<div class="site-menubar " >
    <div class="site-menubar-body ">
      <div>
        <div>
          <?php $terminal_data = $this->db->query("select terminal from ref_terminal ")->row(); ?>
          <ul class="site-menu" >
              <li class="site-menu-category">SIP <?= $terminal_data->terminal  ?></li>
                <li class="site-menu-item ">
                  <a class="animsition-link" href="<?php echo base_url();?>">
                    <i class="site-menu-icon fa fa-home" aria-hidden="true"></i>
                    <span class="site-menu-title">Beranda</span>
                  </a>
                </li>

                <li class="site-menu-category">Navigasi</li>
                <?php
                  $array = $this->session->userdata('query_menu');
                  $parent_id = "0";
                  $parents = array();
                  echo $this->model_menu->bootstrap_menu($array,$parent_id,$parents);
                ?>
            </ul>

        </div>
      </div>
    </div>
</div>