
<style type="text/css">
  * {
    box-sizing: border-box;
  }
  .col {
    float: left;
    padding: 0;
  }
  #left {
    text-align: left;
    width: 100%;
    padding: 0;
  }
  #center {
    width: 100%;
    padding: 0;
  }
  #right {
    text-align: left;
    width: 100%;
    padding:0;
  }
  .anychart-credits {
     display: none;
  }
</style>
<div class="page-content padding-15 container-fluid">
  <div id="left" class="col">
    <div class="col-lg-8">
      <div class="col-sm-4">
        <div class="panel">
          <div class="panel panel-bordered">
            <div class="panel-heading">
              <h3 class="panel-title">GRT Target</h3>
            </div>
            <div style="height: 150px;">
              <div id="GRTTarget" style="width: 100%; height: 100%; margin: 0 auto"></div>
            </div>
          </div>
        </div>
        <div class="panel">
          <div class="panel panel-bordered">
            <div class="panel-heading">
              <h3 class="panel-title">GRT Realisasi</h3>
            </div>
            <div style="height: 150px;">
              <div id="GRTRealisasi" style="width: 100%; height: 100%; margin: 0 auto"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-8">
        <div class="panel panel-bordered">
          <div class="panel-heading">
            <h3 class="panel-title">Customer</h3>
          </div>
          <div class="panel-body" style="height: 391px;">
            <div id="Customer" style="width: 100%; height: 100%; margin: 0 auto"></div>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="panel panel-bordered">
          <div class="panel-heading">
            <h3 class="panel-title">Activity</h3>
          </div>
          <div class="panel-body" style="height: 250px;">
            <div id="Activity" style="width: 100%; height: 100%; margin: 0 auto"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="panel panel-bordered">
        <div class="panel-heading">
          <h3 class="panel-title">Agen</h3>
        </div>
        <div style="height: 390px;">
          <div id="Agen" style="width: 100%; height: 100%; margin: 0 auto"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-2">
      <div class="panel panel-bordered">
        <div class="panel-heading">
          <h3 class="panel-title">Sail In</h3>
        </div>
        <div class="counter counter-lg" style="height: 78px;">
          <span class="counter-number">74</span>
        </div>
      </div>
      <div class="panel panel-bordered">
        <div class="panel-heading">
          <h3 class="panel-title">Sail Out</h3>
        </div>
        <div class="counter counter-lg" style="height: 78px;">
          <span class="counter-number">50</span>
        </div>
      </div>
    </div>
    <div class="col-lg-2">
      <div class="panel panel-bordered">
        <div class="panel-heading">
          <h3 class="panel-title">Bunker Open</h3>
        </div>
        <div class="counter counter-lg" style="height: 78px;">
          <span class="counter-number">34</span>
        </div>
      </div>
      <div class="panel panel-bordered">
        <div class="panel-heading">
          <h3 class="panel-title">Bunker Close</h3>
        </div>
        <div class="counter counter-lg" style="height: 78px;">
          <span class="counter-number">20</span>
        </div>
      </div>
    </div>

    <div class="col-lg-12">
      <div class="col-sm-6">
        <div class="panel panel-bordered">
          <div class="panel-heading">
            <h3 class="panel-title">Cash Flow</h3>
          </div>
          <div style="height: 200px;">
            <div id="CashFlow"></div>
          </div>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="panel panel-bordered">
          <div class="panel-heading">
            <h3 class="panel-title">Pendapatan</h3>
          </div>
          <div style="height: 200px;">
            <div id="Pendapatan" style="width: 100%; height: 100%; margin: 0 auto"></div>
          </div>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="panel panel-bordered">
          <div class="panel-heading">
            <h3 class="panel-title">Biaya</h3>
          </div>
          <div style="height: 200px;">
            <div id="Biaya" style="width: 100%; height: 100%; margin: 0 auto"></div>
          </div>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="panel panel-bordered">
          <div class="panel-heading">
            <h3 class="panel-title">Laba / Rugi</h3>
          </div>
          <div style="height: 200px;">
            <div id="LabaRugi" style="width: 100%; height: 100%; margin: 0 auto"></div>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>
<?php
  foreach($DataCustomer as $result){
      $nama_customer[] =  $result->pemilik_kapal;
  }

  foreach($DataAgen as $result){
      $nama_agen[] =  $result->local_agen;
  }

  foreach($DataActivity as $result){
      $nama_activity1[] =  $result->nama_activity;
  }
?>
<script src="<?php echo base_URL()?>jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.anychart.com/releases/8.10.0/js/anychart-core.min.js"></script>
<script src="https://cdn.anychart.com/releases/8.10.0/js/anychart-pyramid-funnel.min.js"></script>
<script src="//www.amcharts.com/lib/4/core.js"></script>
<script src="//www.amcharts.com/lib/4/charts.js"></script>
<script src="//www.amcharts.com/lib/4/themes/animated.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">
  am4core.useTheme(am4themes_animated);
  am4core.addLicense("ch-custom-attribution");

  // create chart
  var chart = am4core.create("GRTTarget", am4charts.GaugeChart);
  chart.innerRadius = -15;

  var axis = chart.xAxes.push(new am4charts.ValueAxis());
  axis.min = 0;
  axis.max = 100;
  axis.strictMinMax = true;

  var colorSet = new am4core.ColorSet();

  var range0 = axis.axisRanges.create();
  range0.value = 0;
  range0.endValue = 50;
  range0.axisFill.fillOpacity = 1;
  range0.axisFill.fill = colorSet.getIndex(0);
  range0.axisFill.zIndex = -1;

  var range1 = axis.axisRanges.create();
  range1.value = 50;
  range1.endValue = 80;
  range1.axisFill.fillOpacity = 1;
  range1.axisFill.fill = colorSet.getIndex(2);
  range1.axisFill.zIndex =-1;

  var range2 = axis.axisRanges.create();
  range2.value = 80;
  range2.endValue = 100;
  range2.axisFill.fillOpacity = 1;
  range2.axisFill.fill = colorSet.getIndex(4);
  range2.axisFill.zIndex =-1;

  var hand = chart.hands.push(new am4charts.ClockHand());

  setInterval(function () {
    hand.showValue(Math.random() * 100, 1000, am4core.ease.cubicOut);
  }, 2000);

  // Add chart title
  var title = chart.titles.create();
  title.text = "";
  title.fontSize = 25;
  title.marginBottom = 30;

  // Add bottom label
  var label = chart.chartContainer.createChild(am4core.Label);
  label.text = "GRT";
  label.align = "center";


  // create chart
  var chart = am4core.create("GRTRealisasi", am4charts.GaugeChart);
  chart.innerRadius = -15;

  var axis = chart.xAxes.push(new am4charts.ValueAxis());
  axis.min = 0;
  axis.max = 100;
  axis.strictMinMax = true;

  var colorSet = new am4core.ColorSet();

  var range0 = axis.axisRanges.create();
  range0.value = 0;
  range0.endValue = 50;
  range0.axisFill.fillOpacity = 1;
  range0.axisFill.fill = colorSet.getIndex(0);
  range0.axisFill.zIndex = -1;

  var range1 = axis.axisRanges.create();
  range1.value = 50;
  range1.endValue = 80;
  range1.axisFill.fillOpacity = 1;
  range1.axisFill.fill = colorSet.getIndex(2);
  range1.axisFill.zIndex =-1;

  var range2 = axis.axisRanges.create();
  range2.value = 80;
  range2.endValue = 100;
  range2.axisFill.fillOpacity = 1;
  range2.axisFill.fill = colorSet.getIndex(4);
  range2.axisFill.zIndex =-1;

  var hand = chart.hands.push(new am4charts.ClockHand());

  setInterval(function () {
    hand.showValue(Math.random() * 100, 1000, am4core.ease.cubicOut);
  }, 2000);

  // Add chart title
  var title = chart.titles.create();
  title.text = "";
  title.fontSize = 25;
  title.marginBottom = 30;

  // Add bottom label
  var label = chart.chartContainer.createChild(am4core.Label);
  label.text = "GRT";
  label.align = "center";

  var options = {
    series: [{
    data: [
          <?php foreach ($nama_customer as $value1) {
            $db_obj = $this->load->database('uat', TRUE);
            $CountCustomer = $db_obj->query("SELECT COUNT(pemilik_kapal) AS TOTAL FROM view_register WHERE pemilik_kapal = '$value1' ")->row();
          ?>
            <?php echo (float) $CountCustomer->TOTAL; ?>,
          <?php } ?>
    ]
  }],
  chart: {
    height: 350,
    type: 'bar',
    zoom: {
      enabled: false
    },
    toolbar: {
      show: true,
      tools: {
        download: false
      }
    }
  },
  plotOptions: {
    bar: {
      borderRadius: 5,
      columnWidth: '50%',
      distributed: true
    }
  },
  dataLabels: {
    enabled: false,
  },
  stroke: {
    width: 2
  },
  grid: {
    row: {
      colors: ['#fff']
    }
  },
  xaxis: {
    labels: {
      show: false,
      rotate: -45
    },
    categories: <?php echo json_encode($nama_customer);?>,
  },
  yaxis: {
    title: {
      text: '',
    },
  }
  };

  var chart = new ApexCharts(document.querySelector("#Customer"), options);
  chart.render();



  // var options = {
  //   series: [{
  //     <?php foreach ($nama_activity1 as $value1) {
  //     ?>
  //       name: "s",
  //       data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10],
  //     <?php } ?>
      
  //   }
  // ],
  var options = {
          series: [
          <?php foreach ($nama_activity1 as $value1) {

          ?> 
            {
              name: <?php echo json_encode($value1);?>,
              data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
            },
          <?php } ?>
        ],
    chart: {
    height: 200,
    type: 'line',
    zoom: {
      enabled: false
    },
    toolbar: {
      show: true,
      tools: {
        download: false
      }
    }
  },
  dataLabels: {
    enabled: false
  },
  // stroke: {
  //   width: [5, 7, 5],
  //   curve: 'straight',
  //   dashArray: [0, 8, 5]
  // },
  title: {
    text: '',
    align: 'left'
  },
  legend: {
    tooltipHoverFormatter: function(val, opts) {
      return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
    }
  },
  markers: {
    size: 0,
    hover: {
      sizeOffset: 6
    }
  },
  xaxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
  },
  tooltip: {
    y: [
      {
        title: {
          formatter: function (val) {
            return val + " (mins)"
          }
        }
      },
      {
        title: {
          formatter: function (val) {
            return val + " per session"
          }
        }
      },
      {
        title: {
          formatter: function (val) {
            return val;
          }
        }
      }
    ]
  },
  grid: {
    borderColor: '#f1f1f1',
  }
  };

  var chart = new ApexCharts(document.querySelector("#Activity"), options);
  chart.render();

  var data = [
    <?php foreach ($nama_agen as $value1) {
      $db_obj = $this->load->database('uat', TRUE);
      $CountAgen = $db_obj->query("SELECT COUNT(local_agen) AS TOTAL FROM view_register WHERE local_agen = '$value1' ")->row();

    ?>
      [<?php echo json_encode($value1); ?>, <?php echo (float) $CountAgen->TOTAL; ?>],
    <?php } ?>
  ];

  chart = anychart.funnel(data);

  // set the container id
  chart.container("Agen");

  // initiate drawing the chart
  chart.draw();

  var options = {
    series: [{
    name: 'Cash Flow',
    data: [2.3, 3.1, 4.0, 10.1, 4.0, 3.6, 3.2, 2.3, 1.4, 0.8],
  }],
    chart: {
      height: 190,
      type: 'bar',
      zoom: {
        enabled: false
      },
      toolbar: {
        show: true,
        tools: {
          download: false
        }
      }
    },
  plotOptions: {
    bar: {
      borderRadius: 5,
      dataLabels: {
        position: 'top', // top, center, bottom
      },
    }
  },
  dataLabels: {
    enabled: true,
    formatter: function (val) {
      return val + "%";
    },
    offsetY: -20,
    style: {
      fontSize: '12px',
      colors: ["#304758"]
    }
  },
  
  xaxis: {
    categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct"],
    position: 'bottom',
    axisBorder: {
      show: false
    },
    axisTicks: {
      show: false
    },
    crosshairs: {
      fill: {
        type: 'gradient',
        gradient: {
          colorFrom: '#D8E3F0',
          colorTo: '#BED1E6',
          stops: [0, 100],
          opacityFrom: 0.4,
          opacityTo: 0.5,
        }
      }
    },
    tooltip: {
      enabled: true,
    }
  },
  yaxis: {
    axisBorder: {
      show: false
    },
    axisTicks: {
      show: false,
    },
    labels: {
      show: false,
      formatter: function (val) {
        return val + "%";
      }
    }
  
  },
  title: {
    text: '',
    floating: true,
    offsetY: 330,
    align: 'center',
    style: {
      color: '#444'
    }
  }
  };

  var chart = new ApexCharts(document.querySelector("#CashFlow"), options);
  chart.render();

  Highcharts.chart('Pendapatan', {

    chart: {
      type: 'gauge',
      plotBackgroundColor: null,
      plotBackgroundImage: null,
      plotBorderWidth: 0,
      plotShadow: false
    },

    title: {
      text: ''
    },

    pane: {
      startAngle: -150,
      endAngle: 150,
      background: [{
        backgroundColor: {
          linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
          stops: [
            [0, '#FFF'],
            [1, '#333']
          ]
        },
        borderWidth: 0,
        outerRadius: '109%'
      }, {
        backgroundColor: {
          linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
          stops: [
            [0, '#333'],
            [1, '#FFF']
          ]
        },
        borderWidth: 1,
        outerRadius: '107%'
      }, {
        // default background
      }, {
        backgroundColor: '#DDD',
        borderWidth: 0,
        outerRadius: '105%',
        innerRadius: '103%'
      }]
    },

    // the value axis
    yAxis: {
      min: 0,
      max: 200,

      minorTickInterval: 'auto',
      minorTickWidth: 1,
      minorTickLength: 10,
      minorTickPosition: 'inside',
      minorTickColor: '#666',

      tickPixelInterval: 30,
      tickWidth: 2,
      tickPosition: 'inside',
      tickLength: 10,
      tickColor: '#666',
      labels: {
        step: 2,
        rotation: 'auto'
      },
      title: {
        text: '%'
      },
      plotBands: [{
        from: 0,
        to: 120,
        color: '#55BF3B' // green
      }, {
        from: 120,
        to: 160,
        color: '#DDDF0D' // yellow
      }, {
        from: 160,
        to: 200,
        color: '#DF5353' // red
      }]
    },
    credits: {
      enabled: false
    },
    series: [{
      name: 'Speed',
      data: [80],
      tooltip: {
        valueSuffix: ' %'
      }
    }]

  },
  // Add some life
  function (chart) {
    if (!chart.renderer.forExport) {
      setInterval(function () {
        var point = chart.series[0].points[0],
          newVal,
          inc = Math.round((Math.random() - 0.5) * 20);

        newVal = point.y + inc;
        if (newVal < 0 || newVal > 200) {
          newVal = point.y - inc;
        }

        point.update(newVal);

      }, 3000);
    }
  });

  Highcharts.chart('Biaya', {

    chart: {
      type: 'gauge',
      plotBackgroundColor: null,
      plotBackgroundImage: null,
      plotBorderWidth: 0,
      plotShadow: false
    },

    title: {
      text: ''
    },

    pane: {
      startAngle: -150,
      endAngle: 150,
      background: [{
        backgroundColor: {
          linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
          stops: [
            [0, '#FFF'],
            [1, '#333']
          ]
        },
        borderWidth: 0,
        outerRadius: '109%'
      }, {
        backgroundColor: {
          linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
          stops: [
            [0, '#333'],
            [1, '#FFF']
          ]
        },
        borderWidth: 1,
        outerRadius: '107%'
      }, {
        // default background
      }, {
        backgroundColor: '#DDD',
        borderWidth: 0,
        outerRadius: '105%',
        innerRadius: '103%'
      }]
    },

    // the value axis
    yAxis: {
      min: 0,
      max: 200,

      minorTickInterval: 'auto',
      minorTickWidth: 1,
      minorTickLength: 10,
      minorTickPosition: 'inside',
      minorTickColor: '#666',

      tickPixelInterval: 30,
      tickWidth: 2,
      tickPosition: 'inside',
      tickLength: 10,
      tickColor: '#666',
      labels: {
        step: 2,
        rotation: 'auto'
      },
      title: {
        text: '%'
      },
      plotBands: [{
        from: 0,
        to: 120,
        color: '#55BF3B' // green
      }, {
        from: 120,
        to: 160,
        color: '#DDDF0D' // yellow
      }, {
        from: 160,
        to: 200,
        color: '#DF5353' // red
      }]
    },
    credits: {
      enabled: false
    },
    series: [{
      name: 'Speed',
      data: [80],
      tooltip: {
        valueSuffix: ' %'
      }
    }]

  },
  // Add some life
  function (chart) {
    if (!chart.renderer.forExport) {
      setInterval(function () {
        var point = chart.series[0].points[0],
          newVal,
          inc = Math.round((Math.random() - 0.5) * 20);

        newVal = point.y + inc;
        if (newVal < 0 || newVal > 200) {
          newVal = point.y - inc;
        }

        point.update(newVal);

      }, 3000);
    }
  });

  Highcharts.chart('LabaRugi', {

    chart: {
      type: 'gauge',
      plotBackgroundColor: null,
      plotBackgroundImage: null,
      plotBorderWidth: 0,
      plotShadow: false
    },

    title: {
      text: ''
    },

    pane: {
      startAngle: -150,
      endAngle: 150,
      background: [{
        backgroundColor: {
          linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
          stops: [
            [0, '#FFF'],
            [1, '#333']
          ]
        },
        borderWidth: 0,
        outerRadius: '109%'
      }, {
        backgroundColor: {
          linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
          stops: [
            [0, '#333'],
            [1, '#FFF']
          ]
        },
        borderWidth: 1,
        outerRadius: '107%'
      }, {
        // default background
      }, {
        backgroundColor: '#DDD',
        borderWidth: 0,
        outerRadius: '105%',
        innerRadius: '103%'
      }]
    },

    // the value axis
    yAxis: {
      min: 0,
      max: 200,

      minorTickInterval: 'auto',
      minorTickWidth: 1,
      minorTickLength: 10,
      minorTickPosition: 'inside',
      minorTickColor: '#666',

      tickPixelInterval: 30,
      tickWidth: 2,
      tickPosition: 'inside',
      tickLength: 10,
      tickColor: '#666',
      labels: {
        step: 2,
        rotation: 'auto'
      },
      title: {
        text: '%'
      },
      plotBands: [{
        from: 0,
        to: 120,
        color: '#55BF3B' // green
      }, {
        from: 120,
        to: 160,
        color: '#DDDF0D' // yellow
      }, {
        from: 160,
        to: 200,
        color: '#DF5353' // red
      }]
    },
    credits: {
      enabled: false
    },
    series: [{
      name: 'Speed',
      data: [80],
      tooltip: {
        valueSuffix: ' %'
      }
    }]

  },
  // Add some life
  function (chart) {
    if (!chart.renderer.forExport) {
      setInterval(function () {
        var point = chart.series[0].points[0],
          newVal,
          inc = Math.round((Math.random() - 0.5) * 20);

        newVal = point.y + inc;
        if (newVal < 0 || newVal > 200) {
          newVal = point.y - inc;
        }

        point.update(newVal);

      }, 3000);
    }
  });
</script>