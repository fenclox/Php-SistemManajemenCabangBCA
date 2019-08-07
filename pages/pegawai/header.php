<?php error_reporting(0); ?>
<?php include"../../koneksi/koneksi.php";
session_start();
if(!isset($_SESSION['nip'])){
?>
<script >
alert("Anda harus masuk terlebih dahulu");
document.location="../../login/login-pegawai.php";
</script>
<?php
}
?>
<?php
date_default_timezone_set('Asia/Jakarta');
function tglIndonesia($str){
$tr   = trim($str);
$str    = str_replace(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'), array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'), $tr);
return $str;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Halaman Pegawai</title>
    <!-- Bootstrap Core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="../../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="../../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- PDF Preview -->
    <script src="../../pdfjs-1.7.225-dist/build/pdf.js"></script>
    <script src="../../vendor/jquery/jquery-2.2.3.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- PDF Show & Hide -->
    <script type="text/javascript">
    $(document).ready(function () {
    $("#pdfInp").change(function () {
    if (this.files && this.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
    showInCanvas(e.target.result);
    }
    reader.readAsDataURL(this.files[0]);
    }
    });
    function convertDataURIToBinary(dataURI) {
    var BASE64_MARKER = ';base64,';
    var base64Index = dataURI.indexOf(BASE64_MARKER) + BASE64_MARKER.length;
    var base64 = dataURI.substring(base64Index);
    var raw = window.atob(base64);
    var rawLength = raw.length;
    var array = new Uint8Array(new ArrayBuffer(rawLength));
    for (i = 0; i < rawLength; i++) {
    array[i] = raw.charCodeAt(i);
    }
    return array;
    }
    function showInCanvas(url) {
    // See README for overview
    'use strict';
    // Fetch the PDF document from the URL using promises
    var pdfAsArray = convertDataURIToBinary(url);
    PDFJS.getDocument(pdfAsArray).then(function (pdf) {
    // Using promise to fetch the page
    pdf.getPage(1).then(function (page) {
    var scale = 1.5;
    var viewport = page.getViewport(scale);
    // Prepare canvas using PDF page dimensions
    var canvas = document.getElementById('the-canvas');
    var context = canvas.getContext('2d');
    canvas.height = viewport.height;
    canvas.width = viewport.width;
    // Render PDF page into canvas context
    var renderContext = {
    canvasContext: context,
    viewport: viewport
    };
    page.render(renderContext);
    });
    });
    }
    });
    </script>
    <script type="text/javascript">
    $(document).ready (function() {
    $(".tombol1").click (function() {
    $("#lihat").toggle(1000);
    });
    });
    </script>
    <!-- Text Number -->
    <script language="Javascript">
    function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    return false;
    }
    else {
    return true;
    }
    }
    </script>
  </head>
  <body>
    <div id="wrapper">
      <!-- Navigation -->
      <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Bank Central Asia</a>
        </div>
        <!-- /.navbar-header -->
        <ul class="nav navbar-top-links navbar-right">
          <li class="dropdown">
            <p class="navbar-brand" style="font-size:15px" href="index.php">
              <?php echo tglIndonesia(date('D, d F Y')); ?>
            </p>
          </li>
        </ul>
        <!-- /.navbar-top-links -->
        <div class="navbar-default sidebar" role="navigation">
          <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
              <li class="sidebar-search">
                <div class="input-group custom-search-form">
                  <img src="../../images/logo.png" alt="logo" class="img-responsive" onmousedown="return false" oncontexmenu="return false" onselectstart="return false" />
                </div>
                <!-- /input-group -->
              </li>
              <li>
                <a href="index.php?hal=beranda"><i class="fa fa-home fa-fw"></i> Beranda</a>
              </li>
              <li>
                <a href="index.php?hal=pfl"><i class="fa fa-user fa-fw"></i> Profil</a>
              </li>
              <li>
                <a href="#"><i class="fa fa-tasks fa-fw"></i> Transaksi<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li>
                    <a href="index.php?hal=trs">Data Transaksi</a>
                  </li>
                  <li>
                    <a href="index.php?hal=ttrs">Tambah Transaksi</a>
                  </li>
                </ul>
                <!-- /.nav-second-level -->
              </li>
              <li>
                <a href="logout.php"><i class="fa fa-power-off fa-fw"></i> Keluar</a>
              </li>
            </ul>
          </div>
          <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
      </nav>
      <!-- Page Content -->
      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">