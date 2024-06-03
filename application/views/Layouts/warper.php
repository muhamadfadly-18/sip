
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<!-- Mirrored from getbootstrapadmin.com/remark/base/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Aug 2016 03:40:44 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">

  <title>Dashboard | Inventory</title>


  
  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/css/bootstrap.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/css/bootstrap-extend.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/assets/css/site.min3f0d.css?v2.2.0">
  <link href="<?php echo base_url(); ?>assets/global/vendor/bootstrap-table/bootstrap-table.min3f0d.css?v2.2.0" rel="stylesheet">

  <!-- Skin tools (demo site only) -->
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/css/skintools.min3f0d.css?v2.2.0">
  <script src="<?php echo base_url(); ?>assets/global/assets/js/sections/skintools.min.js"></script> -->

  <!-- Plugins -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/bootstrap-datepicker/bootstrap-datepicker.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/select2/select2.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?php echo base_URL()?>assets/dualist/src/bootstrap-duallistbox.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/alertify-js/alertify.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/assets/examples/css/advanced/alertify.min3f0d.css?v2.2.0">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/animsition/animsition.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/asscrollable/asScrollable.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/switchery/switchery.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/intro-js/introjs.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/slidepanel/slidePanel.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/flag-icon-css/flag-icon.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/magnific-popup/magnific-popup.min3f0d.css?v2.2.0">

  <!-- Page -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/global/assets/examples/css/pages/profile.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/global/assets/examples/css/pages/gallery.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/assets/examples/css/dashboard/v1.min3f0d.css?v2.2.0">

  <!-- Fonts -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/fonts/web-icons/web-icons.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/fonts/brand-icons/brand-icons.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/fonts/font-awesome/font-awesome.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/fonts/glyphicons/glyphicons.min3f0d.css?v2.2.0">
 <!--  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'> -->

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/fonts/weather-icons/weather-icons.min3f0d.css?v2.2.0">
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet"> -->
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css"> -->
 <!--  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/datatables-bootstrap/dataTables.bootstrap.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?php echo base_url() ; ?>assets/global/vendor/datatables-fixedheader/dataTables.fixedHeader.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?php echo base_url() ; ?>assets/global/vendor/datatables-responsive/dataTables.responsive.min3f0d.css?v2.2.0"> -->

  <!-- Scripts -->
  <script src="<?php echo base_url(); ?>assets/global/vendor/modernizr/modernizr.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/vendor/breakpoints/breakpoints.min.js"></script>

  <script>
    Breakpoints();
  </script>


</head><!--
 site-menubar-fold site-menubar-keep -->
<body>
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

 <!-- HEADER -->
<?php require_once('header.php'); ?>

  <!-- LEFT MENU -->
<?php require_once('left-menu.php');?>

  <!-- Page -->
  <div class="page animsition">
    <!-- KONTENT -->
    <?php require_once('content.php');?>
  </div>
  <!-- End Page -->


  <!-- Footer -->
  <?php require_once('footer.php');?>


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
  <script src="<?php echo base_url(); ?>assets/global/vendor/bootstrap-table/bootstrap-table.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/vendor/bootstrap-table/extensions/mobile/bootstrap-table-mobile.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Plugins DATATABLES -->
  <!-- <script src="<?php echo base_url(); ?>assets/global/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/vendor/datatables-fixedheader/dataTables.fixedHeader.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/vendor/datatables-bootstrap/dataTables.bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/vendor/datatables-responsive/dataTables.responsive.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/vendor/datatables-tabletools/dataTables.tableTools.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/vendor/asrange/jquery-asRange.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/vendor/bootbox/bootbox.js"></script> -->
    
    <!-- <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script> -->

<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <!-- Plugins DATATABLES -->


  <!-- Scripts -->
  <script src="<?php echo base_url(); ?>assets/global/js/core.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/assets/js/site.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/assets/examples/js/pages/gallery.min.js"></script>

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

  <script src="<?php echo base_url(); ?>assets/global/js/components/matchheight.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/js/components/jvectormap.min.js"></script>


  <script src="<?php echo base_url(); ?>assets/global/assets/examples/js/dashboard/v1.min.js"></script>
  <!-- <script src="<?php echo base_url(); ?>assets/global/js/components/datatables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/assets/examples/js/tables/datatable.min.js"></script> -->

  <script src="<?php echo base_url(); ?>assets/global/vendor/select2/select2.full.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/js/components/select2.min.js"></script>

  <script src="<?php echo base_URL()?>assets/dualist/src/jquery.bootstrap-duallistbox.js"></script>

  <script src="<?php echo base_url(); ?>assets/global/vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/js/components/bootstrap-datepicker.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/global/vendor/formatter-js/jquery.formatter.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/global/js/components/formatter-js.min.js"></script>



 <script>
    var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox();
    $("#demoform").submit(function() {
      alert($('[name="duallistbox_demo1[]"]').val());
      return false;
    });


  </script>

  <script>
    /*
  INPUT JURNAL UMUM
    DataTable ditaro disini,
  karena jika ditaro di views/../add.php tidak jalan*/
  // tambah ke detail
  // tanda [] untuk mengosongkan data array
  var _arr_ju_detail = [];
  // untuk edit data
  if (_jsonju.length > 0) {
    $.each(_jsonju, function(i, value) {
      var _arr_tambah = new Array();
      _arr_tambah['no'] = i + 1;
      _arr_tambah['no_rek'] = _jsonju[i].no_rek;
      _arr_tambah['nama_rek'] = _jsonju[i].nama_rek;
      _arr_tambah['kurs'] = _jsonju[i].kurs;
      _arr_tambah['nilai'] = _jsonju[i].nilai;
      _arr_tambah['rate'] = _jsonju[i].rate;
      _arr_tambah['debet'] = _jsonju[i].debet;
      _arr_tambah['kredit'] = _jsonju[i].kredit;
      _arr_tambah['opsi'] = '<button type="button" class="btn btn-danger" onclick="javascript:hapusDetail(&quot;'+_jsonju[i].no_rek+'&quot;);"><i class="fa fa-close"></i></button>';
      _arr_ju_detail.push(_arr_tambah);
    });
  }

    var _dtjudetail;
  $('#tbl-ju-detail').DataTable({
    //"responsive": true,
    "destroy": true,
    //"processing": true,
    "jQueryUI": false,
    "autoWidth": false,
    "lengthChange": false,
    "searching": false,
    "paging": false,
    //"sort": false,
    //"info": false,
    //"scrollX": true,
    //"scrollY": "300px",
    //"scrollCollapse": true,
    "data": _arr_ju_detail,
    "columns": [
      {"data": "no","width": "3%"},
      {"data": "no_rek"},
      {"data": "nama_rek"},
      {"data": "kurs"},
      {"data": "nilai"},
      {"data": "rate"},
      {"data": "debet"},
      {"data": "kredit"},
      {"data": "opsi"}
    ],
    "info": false
  });

  function tambahJUDetail() {
    var _no_jurnal = $('input[name=no_jurnal]').val();
    var _tgl_jurnal = $('input[name=tgl_jurnal]').val();
    var _no_bukti = $('input[name=no_bukti]').val();
    var _ket = $('input[name=ket]').val();
    var _kurs = $('select[name=kurs]').val();
    var _rate = $('input[name=rate]').val();
    var _nilai = $('input[name=nilai]').val();
    var _no_rek = $('select[name=no_rek]').val();
    var _nama_rek = $('input[name=nama_rek]').val();
    var _debet = $('input[name=debet]').val();
    var _kredit = $('input[name=kredit]').val();

    //alert(_no_jurnal+' || '+_tgl_jurnal+' || '+_no_bukti+' || '+_kurs+' || '+_rate+' || '+_nilai+' || '+_no_rek+' || '+_nama_rek+' || '+_debet+' || '+_kredit);
    //return;
    if (_no_jurnal == '' || _tgl_jurnal == '' || _no_bukti == '' || _kurs == '' || _no_rek == '' || _debet == '' || _kredit == '') {
      alert("Mohon Lengkapi Data");
      return;
    }
    // cek jika sudah ada skip
    var _cek = $.grep(_arr_ju_detail, function (element, index)  {
      return element.no_rek == _no_rek;
    });

    if(_cek.length > 0) {
      alert("No Rekening tersebut sudah diinput");
      return;
    }

    // ambil no urut terakhir dari tabel detail honor
    var _maxno = Math.max.apply(Math, _arr_ju_detail.map(function(o) { return o.no; }));
    _maxno = (_maxno < 0 ? 0 : _maxno);

    var _arr_tambah = new Array();
    _arr_tambah['no'] = _maxno + 1;
    _arr_tambah['no_rek'] = _no_rek;
    _arr_tambah['nama_rek'] = _nama_rek;
    _arr_tambah['kurs'] = _kurs;
    _arr_tambah['nilai'] = _nilai;
    _arr_tambah['rate'] = _rate;
    _arr_tambah['debet'] = _debet;
    _arr_tambah['kredit'] = _kredit;
    _arr_tambah['opsi'] = '<button type="button" class="btn btn-danger" onclick="javascript:hapusDetail(&quot;'+_no_rek+'&quot;);"><i class="fa fa-close"></i></button>';

    _arr_ju_detail.push(_arr_tambah);
    //alert(_arr_ju_detail.length);
    $('#tbl-ju-detail').DataTable().clear();
    $('#tbl-ju-detail').DataTable().rows.add(_arr_ju_detail);
    $('#tbl-ju-detail').DataTable().draw();
  }
  // fungsi untuk menyimpan jurnal umum
  function simpanJU() {
    var _no_jurnal = $('input[name=no_jurnal]').val();
    var _tgl_jurnal = $('input[name=tgl_jurnal]').val();
    var _no_bukti = $('input[name=no_bukti]').val();
    var _ket = $('input[name=ket]').val();

    if (_no_jurnal == '' || _tgl_jurnal == '' || _no_bukti == '') {
      alert("Mohon Lengkapi Data");
      return;
    }

    if (_arr_ju_detail.length < 1) {
      alert("Mohon Lengkapi Detail");
      return;
    }

    //detail jurnal umum
    var _jsonstr = '[';

    $.each(_arr_ju_detail, function(i, value) {
      _jsonstr = _jsonstr + '{';
      _jsonstr = _jsonstr + '"no":"'+_arr_ju_detail[i]['no']+'",';
      _jsonstr = _jsonstr + '"no_rek":"'+_arr_ju_detail[i]['no_rek']+'",';
      _jsonstr = _jsonstr + '"nama_rek":"'+_arr_ju_detail[i]['nama_rek']+'",';
      _jsonstr = _jsonstr + '"kurs":"'+_arr_ju_detail[i]['kurs']+'",';
      _jsonstr = _jsonstr + '"nilai":"'+_arr_ju_detail[i]['nilai']+'",';
      _jsonstr = _jsonstr + '"rate":"'+_arr_ju_detail[i]['rate']+'",';
      _jsonstr = _jsonstr + '"debet":"'+_arr_ju_detail[i]['debet']+'",';
      _jsonstr = _jsonstr + '"kredit":"'+_arr_ju_detail[i]['kredit']+'"';
      _jsonstr = _jsonstr + '}';

      if (i < (_arr_ju_detail.length - 1)) {
        _jsonstr = _jsonstr + ',';
      }
    });

    _jsonstr = _jsonstr + ']';

    var _data = {
      no_jurnal:_no_jurnal,
      tgl_jurnal:_tgl_jurnal,
      no_bukti:_no_bukti,
      ket:_ket,
      detail_ju: _jsonstr
    };

    var _url = $('#form-jurnal-umum').attr('action');

    $.ajax({
      type: "POST",
      url: _url,
      data: _data,
      //contentType: 'application/json',
      success: function(result){
        alert(result);
        window.location.href = '<?=base_url()?>JurnalUmum';
      },
      error: function(jqXHR, textStatus, errorThrown){
        //alert('Data gagal disimpan.');
        alert('status code: ' + jqXHR.status + ' errorThrown: ' + errorThrown + ' responseText: ' + jqXHR.responseText);
      }
    });
  }

  function hapusDetail(_norek) {
    if (confirm("Yakin mau dihapus rekening " + _norek + "?")) {
      // hapus detail
      _arr_ju_detail = $.grep(_arr_ju_detail, function(_jud) {
                return (_jud.no_rek).indexOf(_norek) == -1;
            });

      var _len = _arr_ju_detail.length;

            if (_len > 0) {
                //update no urut
                for (i = 0; i < _len; i++) {
                    _arr_ju_detail[i]['no'] = i + 1;
                }
            }

      $('#tbl-ju-detail').DataTable().clear();
      $('#tbl-ju-detail').DataTable().rows.add(_arr_ju_detail);
      $('#tbl-ju-detail').DataTable().draw();
    }
  }
  /*=================================================================================================
  BATAS AKHIR INPUT JURNAL UMUM
  =================================================================================================*/
  </script>
</body>


<!-- Mirrored from getbootstrapadmin.com/remark/base/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Aug 2016 03:52:00 GMT -->
</html>
