<div class="page-content padding-30 container-fluid">

  <div class="page-header">
    <h1 class="page-title">Jurnal Penyesuaian</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Beranda</a></li>
      <li><a href="<?php echo base_url('JurnalPenyesuaian');?>">Jurnal Penyesuaian</a></li>
      <li class="active">Tambah Data</li>
    </ol>
    <div class="page-header-actions">
      <a href="<?php echo base_url('JurnalPenyesuaian');?>" class="btn btn-sm btn-danger  btn-round">
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
              <h4 class="example-title">Tambah Data Jurnal Penyesuaian Baru</h4>
              <p>
                **Isi kolom di bawah dengan benar.
              </p>
              <div class="example">
                <form class="form-horizontal" action="<?php echo base_url();?>JurnalPenyesuaian/add_action" method="post">

                  <?php

                    $m = date('m');
                    $y = date('y');
                    $ambil = $this->db->query("SELECT COUNT(DISTINCT(no_jurnal)) AS no_jurnal FROM jurnal_penyesuaian ORDER BY no_jurnal DESC")->row();
                    $jml = $ambil->no_jurnal + 1;
                    if($jml < 10){
                      $kiw = "0000".$jml;
                    }elseif($jml < 100){
                      $kiw = "000".$jml;
                    }elseif($jml < 1000){
                      $kiw = "00".$jml;
                    }elseif($jml < 10000){
                      $kiw = "0".$jml;
                    }else{
                      $kiw = $jml;
                    }

                    $kode = $m.$y.$kiw;

                  ?>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">No Jurnal : </label>
                    <div class="col-sm-4">
                      <input type="text" autocomplete="off" placeholder="No Jurnal" required id="id_no_jurnal" name="no_jurnal" value="<?php echo $kode?>" class="form-control" readonly>
                    </div>
                  </div>

                  <?php
                    $current_date = date("m/d/Y");
                  ?>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Tanggal : </label>
                    <div class="col-sm-5">
                      <div class="input-daterange" data-plugin="datepicker">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="icon wb-calendar" aria-hidden="true"></i>
                          </span>
                          <input type="text" class="form-control" name="tgl_jurnal" id="id_tgl_jurnal" value="<?php echo $current_date; ?>" required>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">No Rek : </label>
                    <div class="col-sm-4">
                      <div class="input-group">
                        <select data-plugin="select2" name="no_rek" class="form-control" id="no_rek" onchange="myFunction()">
                          <option value="">-- Pilih --</option>
                            <?php
                              $Select_rek = $this->db->query("select * from rekening")->result();
                              foreach($Select_rek as $value){
                            ?>
                              <option id-no_rek="<?php echo $value->no_rek; ?>" data-nama_rek="<?php echo $value->nama_rek; ?>" value="<?php echo $value->no_rek; ?>"><?php echo $value->no_rek; ?> | <?php echo $value->nama_rek; ?></option>
                            <?php
                              }
                            ?>
                        </select>
                      </div>
                    </div>

                    <label class="col-sm-1 control-label">Nama Rek : </label>
                    <div class="col-sm-4">
                      <input type="text" autocomplete="off" placeholder="Nama Rek" required name="nama_rek" id="nama_rek" class="form-control" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Debet : </label>
                    <div class="col-sm-4">
                      <input type="number" autocomplete="off" placeholder="Debet" id="id_debet" required name="debet" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Kredit : </label>
                    <div class="col-sm-4">
                      <input type="number" autocomplete="off" placeholder="Kredit" id="id_kredit" required name="kredit" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-3 col-sm-offset-2">
                      <input class="btn btn-warning" type="button" value="Tambah" id="btn1" onclick="addJurnal()">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="table-responsive col-md-12">
                      <table  class="table table-hover dataTable table-striped width-full overf table-bordered">
                        <thead style="background-color: #f6fafb;">
                          <tr>
                            <th width="10%">No Jurnal</th>
                            <th width="15%">#Rek</th>
                            <th width="45%">Nama Rek</th>
                            <th width="10%">Debet</th>
                            <th width="10%">Kredit</th>
                            <th width="10%">Action</th>
                          </tr>
                        </thead>

                        <tbody id="myTable">
                        </tbody>

                        <div id="dataLimit"></div>
                      </table>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-3 col-sm-offset-2">
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
<script src="<?php echo base_URL()?>jquery.js"></script>
<script type="text/javascript">
  function myFunction() {
    var sub1 = $("#no_rek").val();
    $.ajax({
      url: "<?php echo base_url('JurnalPenyesuaian/show_NR')?>",
      data: {"sub1":sub1},
      cache: false,
      success: function(data){
        var json = JSON.parse(data)
        document.getElementById("nama_rek").value = json;
      }
    });
  }

  function addJurnal(){

    var DataNoJurnal = document.getElementById("id_no_jurnal").value;
    var DataTglJurnal = document.getElementById("id_tgl_jurnal").value;

    var id_no_rek = document.getElementById('no_rek');
    var id_No_rek = id_no_rek.options[id_no_rek.selectedIndex];
    var dataIdNoRek = id_No_rek.getAttribute('id-no_rek');
    var dataNamaRek = id_No_rek.getAttribute('data-nama_rek');

    var DataDebet = document.getElementById("id_debet").value;
    var DataKredit = document.getElementById("id_kredit").value;

    // if (document.getElementById("id_no_jurnal").value = DataNoJurnal ){

    var table = document.getElementById("myTable");
    var row = table.insertRow(0);

    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);



    for(var a=0; a<=table.rows.length; a++) {
        $('#dataLimit').empty();
        $('<input type="hidden" name="data_limit" value="'+ a +'" >').appendTo('#dataLimit');
    }

    cell1.innerHTML = DataNoJurnal +"<input type='hidden' class='classNoJurnal' name='no_jurnal' value='"+ DataNoJurnal +"'/> <input type='hidden' class='classTglJurnal' name='tgl_jurnal' value='"+ DataTglJurnal +"'/>";
    //cell2.innerHTML = DataTglJurnal + "<input type='hidden' class='classTglJurnal' name='tgl_jurnal' value='"+ DataTglJurnal +"'/>";
    cell2.innerHTML = dataIdNoRek + "<input type='hidden' class='classNoRek' name='no_rek' value='"+ dataIdNoRek +"'/>" + " | " + dataNamaRek + "<input type='hidden' class='classNamaRek' name='nama_rek' value='"+ dataNamaRek +"'/>";
    cell3.innerHTML = dataNamaRek + "<input type='hidden' class='classNamaRek' name='nama_rek' value='"+ dataNamaRek +"'/>";
    cell4.innerHTML = DataDebet + "<input type='hidden' class='classDebet' name='debet' value='"+ DataDebet +"'/>";
    cell5.innerHTML = DataKredit + "<input type='hidden' class='classKredit' name='kredit' value='"+ DataKredit +"'/>";
    cell6.innerHTML = '<button type="button" class="btn btn-labeled social-google-plus" onclick="deleteJurnal(this)">'+
                            '<span class="btn-label"><i class="icon fa-trash-o" aria-hidden="true"></i></span>Delete'+
                          '</button>';

    for(var i=0;  i<=table.rows.length; i++) {
      document.getElementsByClassName("classNoJurnal")[i].name = "no_jurnal_"+i;
      document.getElementsByClassName("classTglJurnal")[i].name = "tgl_jurnal_"+i;
      document.getElementsByClassName("classNoRek")[i].name = "no_rek_"+i;
      document.getElementsByClassName("classNamaRek")[i].name = "nama_rek_"+i;
      document.getElementsByClassName("classDebet")[i].name = "debet_"+i;
      document.getElementsByClassName("classKredit")[i].name = "kredit_"+i;
    }

    // }else{

    // }

  }




  function deleteJurnal(btn) {
    var row = btn.parentNode.parentNode;
    var table = document.getElementById("myTable");

    if(row.parentNode.removeChild(row)){
      for(var a=0; a<=table.rows.length; a++) {
        $('#dataLimit').empty();
        $('<input type="hidden" name="data_limit" value="'+ a +'" >').appendTo('#dataLimit');
      }

      for(var i=0; i<=table.rows.length; i++) {
        document.getElementsByClassName("classNoJurnal")[i].name = "id_no_jurnal_"+i;
        //document.getElementsByClassName("classTglJurnal")[i].name = "id_tgl_jurnal_"+i;
        document.getElementsByClassName("classNoRek")[i].name = "no_rek_"+i;
        document.getElementsByClassName("classNamaRek")[i].name = "nama_rek_"+i;
        document.getElementsByClassName("classDebet")[i].name = "debet_"+i;
        document.getElementsByClassName("classKredit")[i].name = "kredit_"+i;
      }
    }
  }

</script>
