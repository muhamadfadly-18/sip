<style type="text/css">
  .home-label{
    background-color:#ECF0F1; border-radius:10px; padding-top:20px; padding-bottom: 20px;
  }
</style>
<div class="page-content padding-30 container-fluid">
  <div class="panel panel-bordered panel-danger">
    <div class="panel-heading" style="background-color: #62a8ea;">
      <h3 class="panel-title"><i class="fa fa-th-large" aria-hidden="true"></i> &nbsp;&nbsp;
       Sistem Informasi Persediaan (SIP)</h3>
    </div>
    <div class="panel-body">

      <div class="form-group home-label col-sm-12 col-md-12">
        <?php
          $id_group = $this->session->userdata('id_group');
          $name_group = $this->db->query("select name_group from ref_group where id_group = '$id_group'")->row();
        ?>
        <label class="col-sm-12 control-label">Selamat datang <b><?=$this->session->userdata('name_user');?></b>.</label>
        <label class="col-sm-12 control-label">Kamu masuk sebagai <b><?=$name_group->name_group;?></b> </label>

      </div>

    </div>
  </div>

  <div class="panel panel-bordered">
    <div class="panel-heading">
      <h3 class="panel-title">Products</h3>
    </div>
    <div class="panel-body">

      <div class="col-xlg-3 col-lg-12">
        <div class="widget widget-shadow widget-completed-options" style="box-shadow: 0px 0px 2px 2px rgb(0 0 0 / 10%);">
          <div class="widget-content padding-20">
            <div class="row">

              <div class="col-xs-6" align="center">
                <img src="<?php echo base_url('/assets/IconHome/box.png')?>" style="max-height: 60%; max-width: 60%;">
              </div>
              <div class="col-xs-6">
                <div class="counter text-left blue-grey-700">
                  <div class="counter-label margin-top-10">Tasks Completed
                  </div>
                  <div class="counter-number font-size-40 margin-top-10">
                    1,234
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div id="notif"></div>

</div>

<script>
  function loadXMLDoc_notif() {
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
     if (this.readyState == 4 && this.status == 200) {
       document.getElementById("notif").innerHTML =
       this.responseText;
     }
   };
   xhttp.open("GET",'<?php echo base_url('Dashboard/notif');?>', true);
   xhttp.send();
  }
  setInterval(function(){
   loadXMLDoc_notif();
   // 1sec
  },1000);
  window.onload = loadXMLDoc_notif;
</script>
