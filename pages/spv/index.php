<?php include 'header.php' ?>
<?php
//cek session, kalo ga ada, lempar ke login.
if(isset($_GET['hal'])){
    switch($_GET['hal']){
        case 'beranda'  : include 'beranda.php'; break;

        case 'pfl'     : include 'data/spv/profil.php'; break;

        case 'pgw'     : include 'data/pegawai/pegawai.php'; break;
        case 'tpgw'    : include 'data/pegawai/tambah.php'; break;

        case 'lap'    : include 'data/laporan/laporan.php'; break;

        default : include '404-page.php';
    }
}else{
    include 'beranda.php';
}
?>
<?php include 'footer.php' ?>
