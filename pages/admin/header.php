<?php error_reporting(0); ?>
<?php include"../../koneksi/koneksi.php";
session_start();
if(!isset($_SESSION['username'])){
    ?>
    <script >
        alert("Anda harus masuk terlebih dahulu");
        document.location="../../admin/index.php";
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

    <title>Halaman Admin</title>

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script language="Javascript">
        function isNumberKey(evt)
        {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
            {
                return false;
            }
            else{
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
                            <a href="#"><i class="fa fa-users fa-fw"></i> Supervisor<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php?hal=spv">Data SPV</a>
                                </li>
                                <li>
                                    <a href="index.php?hal=tspv">Tambah SPV</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-building fa-fw"></i> Cabang BCA<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php?hal=cbg">Data Cabang</a>
                                </li>
                                <li>
                                    <a href="index.php?hal=tcbg">Tambah Cabang</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Jenis Dokumen<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php?hal=dok">Data Dokumen</a>
                                </li>
                                <li>
                                    <a href="index.php?hal=tdok">Tambah Dokumen</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="index.php?hal=trs"><i class="fa fa-tasks fa-fw"></i> Data Transaksi</a>
                        </li>
                        <li>
                            <a href="index.php?hal=lap"><i class="fa fa-list-alt fa-fw"></i> Laporan</a>
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
