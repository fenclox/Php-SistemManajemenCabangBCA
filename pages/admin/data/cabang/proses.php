<?php
include "../../../../koneksi/koneksi.php";

//Proses Tambah
if(isset($_POST['tambah'])){
    $kd   = $_POST['kode'];
    $nama = $_POST['nama'];
    $alm  = $_POST['alamat'];
    $telp = $_POST['telp'];

    //INSERT QUERY START
    $query1 = "insert into bank values('".$kd."','".$nama."','".$alm."','".$telp."')";
    $sql1   = mysql_query($query1);
    if ($sql1) {
        header("Location: ../../index.php?hal=tcbg&tmb=success");
    } else {
        header("Location: ../../index.php?hal=tcbg&tmb=fail");
    }
}
//Proses Ubah
else if(isset($_POST['ubah'])) {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $alm = $_POST['alamat'];
    $telp = $_POST['telp'];

    //UPDATE QUERY START
    $query1 = "update bank set nm_bank='$nama',alamat_bank='$alm',no_telp='$telp' where kd_bank='$kode'";
    $sql1 = mysql_query($query1);

    if ($sql1) {
        header("Location: ../../index.php?hal=cbg&ubh=success");
    } else {
        header("Location: ../../index.php?hal=cbg&ubh=fail");
    }
    //UPDATE QUERY END
}
//Proses Hapus
else if(isset($_POST['hapus'])) {
    $kode = $_POST['kode'];

    //DELETE QUERY START
    $query1 = "delete from bank where kd_bank='$kode'";
    $sql1 = mysql_query($query1);

        if ($sql1) {
            header("Location: ../../index.php?hal=cbg&hps=success");
        } else {
            header("Location: ../../index.php?hal=cbg&hps=fail");
        }
         exit;
}
?>
