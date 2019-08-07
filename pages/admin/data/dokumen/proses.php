<?php
include "../../../../koneksi/koneksi.php";
//Autonumber Start
$q = mysql_query("SELECT * FROM jenis_dokumen ORDER BY kd_dokumen DESC LIMIT 1");
$jumlah = mysql_num_rows($q);
$data = mysql_fetch_array($q);
//Jika tidak ada data, maka nomor pertama adalah 1
 if($jumlah <= 0){
  $nomorbaru = 510;
 }
 //Jika ada data terakhir maka nomor urut akan ditambah 1
 else{
  $nomorbaru = $data[kd_dokumen] + 1;
 }

//Proses Tambah
if(isset($_POST['tambah'])) {
    $nama = $_POST['nama'];

    //INSERT QUERY START
    $query1 = "insert into jenis_dokumen values('". $nomorbaru . "','" . $nama . "')";
    $sql1 = mysql_query($query1);

    if ($sql1) {
        header("Location: ../../index.php?hal=tdok&tmb=success");
    } else {
        header("Location: ../../index.php?hal=tdok&tmb=fail");
    }
}
//Proses Ubah
else if(isset($_POST['ubah'])) {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];

    //UPDATE QUERY START
    $query1 = "update jenis_dokumen set nm_dokumen='$nama' where kd_dokumen='$kode'";
    $sql1 = mysql_query($query1);

    if ($sql1) {
        header("Location: ../../index.php?hal=dok&ubh=success");
    } else {
        header("Location: ../../index.php?hal=dok&ubh=fail");
    }
    //UPDATE QUERY END
}
//Proses Hapus
else if(isset($_POST['hapus'])) {
    $kode = $_POST['kode'];

    //DELETE QUERY START
    $query1 = "delete from jenis_dokumen where kd_dokumen='$kode'";
    $sql1 = mysql_query($query1);

        if ($sql1) {
            header("Location: ../../index.php?hal=dok&hps=success");
        } else {
            header("Location: ../../index.php?hal=dok&hps=fail");
        }
         exit;
}
?>
