<?php include 'header.php' ?>
<?php
//cek session, kalo ga ada, lempar ke login.
if(isset($_GET['hal'])){
    switch($_GET['hal']){
        case 'beranda'  : include 'beranda.php'; break;

        case 'tcbg'     : include 'data/cabang/tambah.php'; break;
        case 'cbg'      : include 'data/cabang/cabang.php'; break;

        case 'tdok'     : include 'data/dokumen/tambah.php'; break;
        case 'dok'      : include 'data/dokumen/dokumen.php'; break;

        case 'tspv'     : include 'data/spv/tambah.php'; break;
        case 'spv'      : include 'data/spv/spv.php'; break;

        case 'trs'      : include 'data/transaksi/transaksi.php'; break;

        case 'lap'      : include 'data/laporan/laporan.php'; break;

        default : include '404-page.php';
    }
}else{
    include 'beranda.php';
}
?>
<?php include 'footer.php' ?>
