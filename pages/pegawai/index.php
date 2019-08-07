<?php include 'header.php' ?>
<?php
//cek session, kalo ga ada, lempar ke login.
if(isset($_GET['hal'])){
    switch($_GET['hal']){
        case 'beranda'  : include 'beranda.php'; break;

        case 'pfl'     : include 'data/pegawai/profil.php'; break;

        case 'trs'     : include 'data/transaksi/transaksi.php'; break;
        case 'ttrs'     : include 'data/transaksi/tambah.php'; break;
        
        default : include '404-page.php';
    }
}else{
    include 'beranda.php';
}
?>
<?php include 'footer.php' ?>

