<div class="page-content padding-30 container-fluid">

  <div class="page-header">
    <h1 class="page-title">Saldo Awal</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Beranda</a></li>
      <li><a href="<?php echo base_url('SaldoAwal');?>">Saldo Awal</a></li>
      <li class="active">Tambah Data</li>
    </ol>
    <div class="page-header-actions">
      <a href="<?php echo base_url('SaldoAwal');?>" class="btn btn-sm btn-danger  btn-round">
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
              <h4 class="example-title">Tambah Data Saldo Awal Baru</h4>
              <p>
                **Isi kolom di bawah dengan benar.
              </p>
              <div class="form-group">
                <form class="form-horizontal" action="<?php echo base_url();?>SaldoAwal/add_action" method="post">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Periode : </label>
                    <div class="col-sm-10">
                    <select name="periode" data-plugin="select" class="form-control" id="periode">
                    <?php
                        if(empty($periode)){
                        ?>
                        <option value="">-PILIH-</option>
                        <?php
                        }
                        $year_awal = date('Y')-1;
                        $year_akhir = date('Y');
                        for($i=$year_awal;$i<=$year_akhir;$i++){
                          if($periode==$i){
                        ?>
                          <option value="<?php echo $i;?>" selected="selected"><?php echo $i;?></option>
                        <?php }else{ ?>
                          <option value="<?php echo $i;?>"><?php echo $i;?></option>   
                        <?php }
                        } ?>
                        </select>
                    </div> 
                    </div>
                 <div class="form-group">
                  <label class="col-sm-2 control-label">No Rek : </label>
                  <div class="col-sm-10">
                   <select name="no_rek" data-plugin="select" class="form-control" id="no_rek" onchange="myFunction()">
                          <option> Pilih Norek </option>
                          <?php
                            
                            $RCP = $this->db->query("select no_rek from rekening ")->result();
                            
                            foreach($RCP as $value)
                            {   ?>
                               <option value="<?= $value->no_rek ?>" ><?= $value->no_rek ?></option>
                           <?php }
                          ?>
                        </select>
                  </div>
                </div>


                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Rekening : </label>
                    <div class="col-sm-10">
                      <input type="hidden" name="nama_rek">
                      <input type="text" autocomplete="off" placeholder="" required name="nama_rek" id="nama_rek" class="form-control" readonly="readonly">
                    </div>                   
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Debet : </label>
                    <div class="col-sm-10">
                      <input type="hidden" name="debet">
                      
                      <input cols="30" rows="10"  class="form-control" name="debet"></input>
                    </div>                   
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Kredit : </label>
                    <div class="col-sm-10">
                      <input type="hidden" name="kredit">
                      
                      <input cols="30" rows="10"  class="form-control" name="kredit"></input>
                    </div>                   
                  </div>
 </div>                   
                  </div>
                  <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-4">
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


<script type="text/javascript">
  function myFunction() {
      var sub1 = $("#no_rek").val();
      $.ajax({
        url: "<?php echo base_url('SaldoAwal/show_NR')?>",
        data: {"sub1":sub1},
        cache: false,
        success: function(data){
          var json = JSON.parse(data)
          document.getElementById("nama_rek").value = json;
        }
      });
    }
  </script>