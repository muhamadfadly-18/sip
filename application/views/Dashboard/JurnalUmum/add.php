<?php
# untuk mendapatkan no jurnal baru
$no_jurnal_baru = $this->db->query("SELECT CONCAT(LPAD(MONTH(NOW()), 2, '0'), RIGHT(YEAR(NOW()),2), LPAD(IFNULL(MAX(RIGHT(no_jurnal, 5)), 0) + 1, 5, '0')) AS no_jurnal FROM jurnal_umum")->row()->no_jurnal;
?>

<div class="page-content padding-30 container-fluid">

  <div class="page-header">
    <h1 class="page-title">Jurnal Umum</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Beranda</a></li>
      <li><a href="<?php echo base_url('JurnalUmum');?>">Jurnal Umum</a></li>
      <li class="active">Tambah Data</li>
    </ol>
    <div class="page-header-actions">
      <a href="<?php echo base_url('JurnalUmum');?>" class="btn btn-sm btn-danger  btn-round">
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
              <h4 class="example-title">Tambah Data Jurnal Umum Baru</h4>
              <p>
                **Isi kolom di bawah dengan benar.
              </p>
               <div class="form-group">
                <form id ="form-jurnal-umum" class="form-horizontal" action="<?php echo base_url();?>JurnalUmum/save/add" method="post">
				  <div class="form-group">
                    <label class="col-sm-2 control-label">No Jurnal : </label>
                    <div class="col-sm-2">

                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="" required name="no_jurnal" class="form-control" value="<?=$no_jurnal_baru?>" readonly="readonly">
                    </div>
                  </div>
              <div class="form-group">
					                     <label class="col-sm-2 control-label">Tanggal Jurnal : </label>
                    <div class="col-sm-3">
                      <input type="hidden" name="id_group">
                      <input type="date" autocomplete="off" placeholder="" required name="tgl_jurnal" class="form-control">
                    </div>
                  </div>
	              <div class="form-group">
                    <label class="col-sm-2 control-label">No Bukti : </label>
                    <div class="col-sm-2">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="" required name="no_bukti" class="form-control" >
                    </div>
                  </div>
				  <div class="form-group">
                    <label class="col-sm-2 control-label">Keterangan : </label>
                    <div class="col-sm-5">
                    <textarea cols="30" rows="3"  class="form-control" name="ket"></textarea>
                    </div>
                  </div>
				  <div class="form-group">
                    <label class="col-sm-2 control-label">Kurs : </label>
                    <div class="col-sm-2">
                      <input type="hidden" name="id_group">
                      <select name='kurs' id="kurs" class="form-control">
            					   <!-- <option value=''>None</option>-->
            					   <option value='IDR'>IDR</option>
            						<option value='USD'>USD</option>
            						<option value='JPY'>JPY</option>
            						<option value='AUD'>AUD</option>
            						<option value='EUR'>EUR</option>
            					  </select>

                    </div>
                    <label class="col-sm-1 control-label">Rate : </label>
                    <div class="col-sm-2">
                      <input type="hidden" name="id_group">
                      <input type="text" id="rate" name="rate" class="form-control" autocomplete="off" placeholder="" value="0" disabled>
                    </div>
					<label class="col-sm-1 control-label">Nilai : </label>
                    <div class="col-sm-2">
                      <input type="hidden" name="id_group">
                      <input type="text" id="nilai" name="nilai" class="form-control" autocomplete="off" placeholder="" value="0" disabled>
                    </div>
                  </div>
				  <div class="form-group">
				  <label class="col-sm-2 control-label">No Rek : </label>
				  <div class="col-sm-2">
				   <select name="no_rek" data-plugin="select" class="form-control" id="no_rek" onchange="myFunction()">
						  <option value=""> Pilih </option>
						  <?php

							$RCP = $this->db->query("select no_rek, nama_rek from rekening ")->result();

							foreach($RCP as $value)
							{   ?>
							   <option value="<?= $value->no_rek ?>" ><?= $value->no_rek?></option>
						   <?php }
						  ?>
						</select>
				  </div>
				  <label class="col-sm-2 control-label">Nama Rekening : </label>
                    <div class="col-sm-4">
                      <input type="hidden" name="id_group">
                      <input type="text" autocomplete="off" placeholder="" required name="nama_rek" id="nama_rek" class="form-control" readonly="readonly">
                    </div>
                </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Debet : </label>
                    <div class="col-sm-2">
                      <input type="hidden" name="id_group">

                      <input type="text" id="debet" autocomplete="off" placeholder="" required name="debet" class="form-control">
                    </div>
                    <label class="col-sm-2 control-label">Kredit : </label>
                    <div class="col-sm-2">
						<input type="text" id="kredit" autocomplete="off" placeholder="" required name="kredit" class="form-control">

                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-4">
                      <button type="button" class="btn btn-success" onclick="javascript:tambahJUDetail();">Tambah</button>
                    </div>
                  </div>

				  <div class="panel panel-bordered panel-primary" style="overflow: auto;">
						<div class="panel-heading">
							<div class="row">
								<h3 class="panel-title">Detail</h3>
							</div>
						</div>
						<div class="panel-body">
							<table id="tbl-ju-detail" class="table table-hover dataTable table-striped width-full overf">
								<thead>
								  <tr>
									<th>No</th>
									<th>No Rek</th>
									<th>Nama Rek</th>
									<th>Kurs</th>
									<th>Nilai</th>
									<th>Rate</th>
									<th>Debet</th>
									<th>Kredit</th>
									<th>Opsi</th>
								  </tr>
								</thead>
								<tbody>

								</tbody>

							 </table>
						</div>
				  </div>

                  <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-4">
                      <!--<input class="btn btn-primary" type="submit" value="Simpan">-->
					  <button class="btn btn-primary" type="button" onclick="javascript: simpanJU();">Simpan</button>
                      <button class="btn btn-default btn-outline" type="reset">Reset</button>
                    </div>
                  </div>

                </form>

            </div>
            <!-- End Example Horizontal Form -->


          </div>
        </div>
      </div>
    </div>
</div>
<script type="text/javascript">
  var _jsonju = [];
  function myFunction() {
      var sub1 = $("#no_rek").val();
      $.ajax({
        url: "<?php echo base_url('JurnalUmum/show_NR')?>",
        data: {"sub1":sub1},
        cache: false,
        success: function(data){
          var json = JSON.parse(data)
          document.getElementById("nama_rek").value = json;
        }

      });
    }

	//hitung kurs
	/*$('#kurs').on('change', function() {
		alert($(this).val());
		if ($(this).val() == '') {
			$('#rate').val('0');
			$('#nilai').val('0');
		} else {
			$('#rate').val('1');
			$('#nilai').val('1');
		}
	});*/

	kurs.addEventListener('change', function() {
		if (this.value == '') {
			document.getElementById("rate").value = 0;
			document.getElementById("nilai").value = 0;
			document.getElementById("rate").disabled = true;
			document.getElementById("nilai").disabled = true;
		} else {
			document.getElementById("rate").disabled = false;
			document.getElementById("nilai").disabled = false;
		}
	});

	nilai.addEventListener('change', function() {
		if (document.getElementById("nilai").value < 0)
		{
			kredit.value = Math.abs(document.getElementById("nilai").value * document.getElementById("rate").value);
			debet.value = 0;
		} else {
			debet.value = document.getElementById("nilai").value * document.getElementById("rate").value;
			kredit.value = 0;
		}
	});

  </script>
