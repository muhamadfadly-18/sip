<style type="text/css">
  .home-label{
    background-color:#ECF0F1; border-radius:10px; padding-top:20px; padding-bottom: 20px;
  }
</style>
<div class="page-content padding-30 container-fluid">
  <div class="panel panel-bordered panel-danger">
    <div class="panel-heading" >
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
        <label class="col-sm-12 control-label"><b> Ada berada dalam <?= $dataget->terminal ?> </b> </label>
      </div>



    </div>
  </div>

  <?php
  if (!empty($this->session->flashdata('succeed'))) {
    $succeed = '<div class="alert dark alert-alt alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="icon wb-close-mini" aria-hidden="true"></i></span>
              </button>
              ' . $this->session->flashdata('succeed') . '
            </div>';
    echo $succeed;
  }
  ?>

  <?php
  if (!empty($this->session->flashdata('failed'))) {
    $failed = '<div class="alert dark alert-alt alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true"><i class="icon wb-close-mini" aria-hidden="true"></i></span>
            </button>
            ' . $this->session->flashdata('failed') . '
          </div>';

    echo $failed;
  }
  ?>

  <!-- <div class="panel panel-bordered panel-danger">
    
    <div class="panel-body">
      <div id="chart-container">FusionCharts XT will load here!</div>
    </div>
  </div> -->

<!-- <div class="page-content container-fluid">
      <div class="row" data-plugin="matchHeight" data-by-row="true">
        
        <div class="col-lg-3 col-sm-6 col-xs-12 info-panel">
          <div class="widget widget-shadow">
            <div class="widget-content bg-white padding-20">
              <button type="button" class="btn btn-floating btn-sm btn-warning">
                <i class="icon wb-shopping-cart"></i>
              </button>
              <span class="margin-left-15 font-weight-400">Pemasukan Barang</span>
              <div class="content-text text-center margin-bottom-0">
                <i class="text-danger icon wb-triangle-up font-size-20">
                          </i>
                <span class="font-size-40 font-weight-100">399</span>
                <p class="blue-grey-400 font-weight-100 margin-0">+45% From previous month</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12 info-panel">
          <div class="widget widget-shadow">
            <div class="widget-content bg-white padding-20">
              <button type="button" class="btn btn-floating btn-sm btn-danger">
                <i class="icon fa-dollar"></i>
              </button>
              <span class="margin-left-15 font-weight-400">Blending Sederhana</span>
              <div class="content-text text-center margin-bottom-0">
                <i class="text-success icon wb-triangle-down font-size-20">
                          </i>
                <span class="font-size-40 font-weight-100">$18,628</span>
                <p class="blue-grey-400 font-weight-100 margin-0">+45% From previous month</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12 info-panel">
          <div class="widget widget-shadow">
            <div class="widget-content bg-white padding-20">
              <button type="button" class="btn btn-floating btn-sm btn-success">
                <i class="icon wb-eye"></i>
              </button>
              <span class="margin-left-15 font-weight-400">Pemasukan Scrap</span>
              <div class="content-text text-center margin-bottom-0">
                <i class="text-danger icon wb-triangle-up font-size-20">
                          </i>
                <span class="font-size-40 font-weight-100">23,456</span>
                <p class="blue-grey-400 font-weight-100 margin-0">+25% From previous month</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12 info-panel">
          <div class="widget widget-shadow">
            <div class="widget-content bg-white padding-20">
              <button type="button" class="btn btn-floating btn-sm btn-primary">
                <i class="icon wb-user"></i>
              </button>
              <span class="margin-left-15 font-weight-400">Penerimaan Blending</span>
              <div class="content-text text-center margin-bottom-0">
                <i class="text-danger icon wb-triangle-up font-size-20">
                          </i>
                <span class="font-size-40 font-weight-100">4,367</span>
                <p class="blue-grey-400 font-weight-100 margin-0">+25% From previous month</p>
              </div>
            </div>
          </div>
        </div>
        
        
        
      </div>
    </div> -->

    <div class="row">
      
    <!-- <div class="col-lg-8 col-sm-8">
      <div class="panel panel-bordered">
        <div class="panel-body">
          <div class="col-lg-12">



            <div class="col-lg-3 animate pop">

              <div class="widget widget-shadow widget-completed-options" style="box-shadow: 0px 0px 2px 2px rgb(0 0 0 / 10%); border-radius: 15px;">
                <div class="widget-content">
                  <div class="row">

                    <p style="text-align: center;">Pemasukan Barang</p>
                    <p style="text-align: center; vertical-align: bottom; font-size: 30px;">12</p>
                    <p style="text-align: center;">October</p>


                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-3 animate pop delay-1">
              <div class="widget widget-shadow widget-completed-options" style="box-shadow: 0px 0px 2px 2px rgb(0 0 0 / 10%);  border-radius: 15px;">
                <div class="widget-content">
                  <div class="row">

                    <p style="text-align: center;">Blending Sederhana</p>
                    <p style="text-align: center; vertical-align: bottom; font-size: 30px;">9</p>
                    <p style="text-align: center;">Mei</p>


                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 animate pop delay-2">
              <div class="widget widget-shadow widget-completed-options" style="box-shadow: 0px 0px 2px 2px rgb(0 0 0 / 10%); border-radius: 15px;">
                <div class="widget-content">
                  <div class="row">

                    <p style="text-align: center;">Pemasukan Scrap</p>
                    <p style="text-align: center; vertical-align: bottom; font-size: 30px;">10</p>
                    <p style="text-align: center;">Avg month 2022</p>


                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-3 animate pop delay-3">
              <div class="widget widget-shadow widget-completed-options" style="box-shadow: 0px 0px 2px 2px rgb(0 0 0 / 10%); border-radius: 15px;">
                <div class="widget-content">
                  <div class="row">

                    <p style="text-align: center;">Penerimaan Blending</p>
                    <p style="text-align: center; vertical-align: bottom; font-size: 30px;">11</p>
                    <p style="text-align: center;">Year 2022</p>


                  </div>
                </div>
              </div>
            </div>

          </div>


          <div class="col-lg-12">
            <div class="panel panel-bordered">
              <div class="panel-body">
                <canvas style="width: auto;" id="GrafikVesseldanGRT"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    <!-- <div class="col-lg-4 col-sm-4 ">
      <div class="panel panel-bordered">
        <div class="panel-body">
          <div id="countriesVistsWidget" class="widget widget-shadow animate pop delay-4">
            <div class="widget-header">
              <p class="font-size-14 blue-grey-700 margin-bottom-0">Filter 2022</p>
            </div>
            <div class="widget-content padding-horizontal-30">
              <div class="table-responsive">
                <table class="table table-analytics margin-bottom-0 text-nowrap">
                  <thead>
                    <tr>
                      <th class="bulan">Bulan</th>
                      <th class="total">Total</th>
                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <td>
                        <span>Januari</span>
                      </td>
                      <td>18</td>
                    </tr>
                    <tr>
                      <td>
                        <span>Februari</span>
                      </td>
                      <td>18</td>
                    </tr>
                    <tr>
                      <td>
                        <span>Maret</span>
                      </td>
                      <td>18</td>
                    </tr>
                    <tr>
                      <td>
                        <span>April</span>
                      </td>
                      <td>18</td>
                    </tr>
                    <tr>
                      <td>
                        <span>Mei</span>
                      </td>
                      <td>18</td>
                    </tr>
                    <tr>
                      <td>
                        <span>Juni</span>
                      </td>
                      <td>18</td>
                    </tr>
                    <tr>
                      <td>
                        <span>Juli</span>
                      </td>
                      <td>18</td>
                    </tr>
                    <tr>
                      <td>
                        <span>Agustus</span>
                      </td>
                      <td>18</td>
                    </tr>
                    <tr>
                      <td>
                        <span>September</span>
                      </td>
                      <td>18</td>
                    </tr>
                    <tr>
                      <td>
                        <span>Oktober</span>
                      </td>
                      <td>18</td>
                    </tr>
                    <tr>
                      <td>
                        <span>November</span>
                      </td>
                      <td>18</td>
                    </tr>
                    <tr>
                      <td>
                        <span>Desember</span>
                      </td>
                      <td>18</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->



  </div>

  <?php if($id_group == 1){ ?>
  <!-- <div class="panel panel-bordered">
    <div class="panel-body">
      <h3 class="panel-title" style="font-size:20px; font-weight: bold;">Products</h3>

      <div class="col-xlg-3 col-lg-12">
        <div class="widget widget-shadow widget-completed-options" style="box-shadow: 0px 0px 2px 2px rgb(0 0 0 / 10%);">
          <div class="widget-content padding-20">
            <div class="row">

              <div class="col-xs-5" align="center">
                <img src="<?php echo base_url('/assets/IconHome/box.png')?>" style="max-height: 65%; max-width: 65%;">
              </div>
              <div class="col-xs-7">
                <div class="counter text-left blue-grey-700">
                  <div class="counter-number font-size-40 margin-top-5">
                    0 Item
                  </div>
                  <div class="counter-label">Available Stock
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="col-xlg-3 col-lg-12">
        <div class="widget widget-shadow widget-completed-options" style="box-shadow: 0px 0px 2px 2px rgb(0 0 0 / 10%);">
          <div class="widget-content padding-20">
            <div class="row">

              <div class="col-xs-5" align="center">
                <img src="<?php echo base_url('/assets/IconHome/box.png')?>" style="max-height: 65%; max-width: 65%;">
              </div>
              <div class="col-xs-7">
                <div class="counter text-left blue-grey-700">
                  <div class="counter-number font-size-40 margin-top-5">
                    0 Item
                  </div>
                  <div class="counter-label">Low Stock
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="col-xlg-3 col-lg-12">
        <div class="widget widget-shadow widget-completed-options" style="box-shadow: 0px 0px 2px 2px rgb(0 0 0 / 10%);">
          <div class="widget-content padding-20">
            <div class="row">

              <div class="col-xs-5" align="center">
                <img src="<?php echo base_url('/assets/IconHome/box.png')?>" style="max-height: 65%; max-width: 65%;">
              </div>
              <div class="col-xs-7">
                <div class="counter text-left blue-grey-700">
                  <div class="counter-number font-size-40 margin-top-5">
                    0 Item
                  </div>
                  <div class="counter-label">Out Of Stock
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="col-xlg-3 col-lg-12">
        <div class="widget widget-shadow widget-completed-options" style="box-shadow: 0px 0px 2px 2px rgb(0 0 0 / 10%);">
          <div class="widget-content padding-20">
            <div class="row">

              <div class="col-xs-5" align="center">
                <img src="<?php echo base_url('/assets/IconHome/gudang.png')?>" style="max-height: 110%; max-width: 110%;">
              </div>
              <div class="col-xs-7">
                <div class="counter text-left blue-grey-700">
                  <div class="counter-number font-size-40 margin-top-5">
                    0 Item
                  </div>
                  <div class="counter-label">Available Stock
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

  </div> -->
  <div class="panel panel-bordered panel-danger">
    
    <div class="panel-body">

      <span>Keterangan:</span><br> 
	  <span>P : Portside (Sisi kiri kapal)</span><br>
	  <span>S : Starboard side (Sisi kanan kapal)</span>

      <canvas id="myChart" style="width:100%;"></canvas>

    </div>
  </div>
    
    <div id="notif_Discharging"></div>
  <div id="notif_Loading"></div>
  <?php }elseif($id_group == 11){ ?>
      <div id="notif_approve_barang_masuk"></div>
      <div id="notif_approve_barang_keluar"></div>
  <?php } ?>
    

  

</div>
<script src="<?php echo base_URL() ?>jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.1.0/chartjs-plugin-datalabels.min.js" integrity="sha512-Tfw6etYMUhL4RTki37niav99C6OHwMDB2iBT5S5piyHO+ltK2YX8Hjy9TXxhE1Gm/TmAV0uaykSpnHKFIAif/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>

<script>
  // GrafikVesseldanGRT
  const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
  let delayed;
  const datamixed = {
    labels: months,
    datasets: [{
      type: 'line',
      label: 'Total Vessel',
      backgroundColor: '#0039a6',
      borderColor: '#0a2351',
      tension: 0.4,
      yAxisID: 'y',
      options: {
        animation: {
          onComplete: () => {
            delayed = true;
          },
          delay: (context) => {
            let delay = 0;
            if (context.type === 'data' && context.mode === 'default' && !delayed) {
              delay = context.dataIndex * 300 + context.datasetIndex * 100;
            }
            return delay;
          },
        },
        scales: {
          x: {
            stacked: true,
          },
          y: {
            stacked: true,

          }
        }
      },
      data: [1, 2, 3, 4, 5, 6, 7],
      datalabels: {
        anchor: 'end',
        align: 'top',
        color: '#0039a6',
      }
    }, {
      type: 'bar',
      label: 'Total GRT',
      backgroundColor: '#318CE7',
      borderColor: '#0a2351',
      yAxisID: 'y1',
      options: {
        animation: {
          onComplete: () => {
            delayed = true;
          },
          delay: (context) => {
            let delay = 0;
            if (context.type === 'data' && context.mode === 'default' && !delayed) {
              delay = context.dataIndex * 300 + context.datasetIndex * 100;
            }
            return delay;
          },
        },
        scales: {
          x: {
            stacked: true,
          },
          y: {
            stacked: true,
            title: {
              display: true,
              text: 'satuan'
            }
          }
        }
      },
      data: [1, 2, 3, 4, 5, 6, 7],
      datalabels: {
        anchor: 'end',
        align: 'top',
        color: '#0a2351',
      }
    }]
  };

  //config
  const configmixed = {
    type: 'scatter',
    data: datamixed,
    plugins: [ChartDataLabels],
    options: {
      animation: {
        onComplete: () => {
          delayed = true;
        },
        delay: (context) => {
          let delay = 0;
          if (context.type === 'data' && context.mode === 'default' && !delayed) {
            delay = context.dataIndex * 300 + context.datasetIndex * 100;
          }
          return delay;
        },
      },
      plugins: {
        legend: {
          position: 'bottom'
        },
        title: {
          display: true,
          text: 'Total Pemasukan Barang',
          font: {
            size: 20
          }
        },
        subtitle: {
          display: true,
          text: '',
          fontSize: 50
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          type: 'linear',
          display: true,
          position: 'left',
          stacked: true,
          title: {
            display: true,
            text: 'satuan'
          }
        },
        y1: {
          beginAtZero: true,
          type: 'linear',
          display: true,
          position: 'right',
          stacked: true,
          title: {
            display: true,
            text: 'satuan'
          }
        }
      }
    }
  };

  const GrafikVesseldanGRT = new Chart(
    document.getElementById('GrafikVesseldanGRT'),
    configmixed
  );

  function notif_Discharging() {
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
     if (this.readyState == 4 && this.status == 200) {
       document.getElementById("notif_Discharging").innerHTML =
       this.responseText;
     }
   };
   xhttp.open("GET",'<?php echo base_url('Dashboard/notif_Discharging');?>', true);
   xhttp.send();
  }
  setInterval(function(){
   notif_Discharging();
   // 1sec
  },2000);
  window.onload = notif_Discharging;

  function notif_Loading() {
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
     if (this.readyState == 4 && this.status == 200) {
       document.getElementById("notif_Loading").innerHTML =
       this.responseText;
     }
   };
   xhttp.open("GET",'<?php echo base_url('Dashboard/notif_Loading');?>', true);
   xhttp.send();
  }
  setInterval(function(){
   notif_Loading();
   // 1sec
  },2000);
  window.onload = notif_Loading;

  function notif_approve_barang_masuk() {
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
     if (this.readyState == 4 && this.status == 200) {
       document.getElementById("notif_approve_barang_masuk").innerHTML =
       this.responseText;
     }
   };
   xhttp.open("GET",'<?php echo base_url('Dashboard/notif_approve_barang_masuk');?>', true);
   xhttp.send();
  }
  setInterval(function(){
   notif_approve_barang_masuk();
   // 1sec
  },2000);
  window.onload = notif_approve_barang_masuk;

  function notif_approve_barang_keluar() {
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
     if (this.readyState == 4 && this.status == 200) {
       document.getElementById("notif_approve_barang_keluar").innerHTML =
       this.responseText;
     }
   };
   xhttp.open("GET",'<?php echo base_url('Dashboard/notif_approve_barang_keluar');?>', true);
   xhttp.send();
  }
  setInterval(function(){
   notif_approve_barang_keluar();
   // 1sec
  },2000);
  window.onload = notif_approve_barang_keluar;

</script>
<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
    <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script type="text/javascript">
        FusionCharts.ready(function(){
            var chartObj = new FusionCharts({
    type: 'cylinder',
    dataFormat: 'json',
    renderAt: 'chart-container',
    width: '200',
    height: '350',
    dataSource: {
        "chart": {
            "theme": "fusion",
            "caption": "Tangki 1",
            "subcaption": "",
            "lowerLimit": "0",
            "upperLimit": "120",
            "lowerLimitDisplay": "0",
            "upperLimitDisplay": "1000",
            "numberSuffix": " ltrs",
            "showValue": "1",
            "cylFillColor": "#1aaf5d",
            "chartBottomMargin": "45",
            "showValue": "1"
        },
        "value": "910",
        

    }
}
);
            chartObj.render();
        });

        var xValues = [<?php foreach($data_tank as $value) {
                        $hasiljoin = $value->nama_tangki_alias . ' - ' . $value->nama_barang_alias;
                       echo '"' . $hasiljoin . '",';}?> ];
    var yValues = [<?php foreach($data_tank as $value) {
                    $value_tank = $this->db->query("select ".$value->alias." as total from barang where id_barang = ".$value->id_barang)->row();
                    if($value_tank->total < 1){
                    	$getcount = 0;
                    }else{
                    	$getcount = $value_tank->total;
                    }
                   ?>
                  
                  <?php echo '"' . $getcount . '",';}?>];
    var barColors = [<?php foreach($data_color as $value) {
                       echo '"' . $value->kode_css . '",';}?>];

    new Chart("myChart", {
      type: "bar",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {

        legend: {display: false},

        title: {
          display: true,
          text: "Data Tangki"
        }
      }
    });

    </script>
