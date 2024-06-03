<div class="page-content padding-30 container-fluid">

<div class="page-header">
  <h1 class="page-title">Pengelolaan Pengguna</h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Beranda</a></li>
    <li><a href="<?php echo base_url('user');?>">Pengelolaan Pengguna</a></li>
    <li class="active">Tambah Data</li>
  </ol>
  <div class="page-header-actions">
    <a href="<?php echo base_url('user');?>" class="btn btn-sm btn-danger  btn-round">
      <i aria-hidden="true" class="icon wb-chevron-left-mini"></i>
      <span class="hidden-xs">Kembali</span>
    </a>
  </div>
</div>

<div class="panel">
    <div class="panel-body container-fluid">
      <div class="row row-lg">
        <div class="clearfix hidden-xs"></div>

        <div class="col-sm-12 col-md-6">
          <!-- Example Horizontal Form -->
          <div class="example-wrap">
            <h4 class="example-title">Tambah Pengguna Baru</h4>
            <p>
              **Isi kolom di bawah dengan benar.
            </p>
            <div class="example">
              <form class="form-horizontal" action="<?php echo base_url();?>user/add_action" method="post">

                <div class="form-group">
                  <label class="col-sm-4 control-label">Kewenangan : </label>
                  <div class="col-sm-8">
                    <select data-plugin="select2" data-placeholder="Pilih Satu" name="id_group" class="form-control" required>
                      <option></option>
                      <?php
                        foreach($select_group as $value){
                      ?>
                        <option value="<?php echo $value->id_group; ?>"><?php echo $value->name_group; ?></option>
                      <?php
                        }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">Client : </label>
                  <div class="col-sm-8">
                    <select data-plugin="select2" data-placeholder="Pilih Perusahaan" name="client" class="form-control" required>
                      <option></option>
                      <?php
                        foreach($select_client as $value){
                      ?>
                        <option value="<?php echo $value->id_client; ?>"><?php echo $value->company_name; ?></option>
                      <?php
                        }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">Nama Pengguna : </label>
                  <div class="col-sm-8">
                    <input type="text" autocomplete="off" placeholder="Nama Pengguna" required name="name_user" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">Username : </label>
                  <div class="col-sm-6">
                    <input type="email" autocomplete="off" placeholder="Username" required name="username" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">Kata sandi : </label>
                  <div class="col-sm-6">
                    <input type="password" autocomplete="off" placeholder="Kata sandi" required name="password" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-8 col-sm-offset-4">
                    <input class="btn btn-primary" type="submit" value="Simpan">
                    <button class="btn btn-default btn-outline" type="reset">Setel Ulang</button>
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
<!-- <script>
    document.getElementById('cek1').onclick = function() {
        // access properties using this keyword
        if (this.checked) {
            // if checked ...
            document.getElementById("cek2").checked = true;
            document.getElementById("cek2").disabled = false;
        } else {
            // if not checked ...
             document.getElementById("cek2").checked = false;
            document.getElementById("cek2").disabled = true;
        }
    };
</script> -->
