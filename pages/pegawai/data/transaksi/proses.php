<?php
include "../../../../koneksi/koneksi.php";

date_default_timezone_set('Asia/Jakarta');

//Proses Tambah
if(isset($_POST['tambah'])) {
    $time = date('ymdhis');
    $id   = rand(0,9);
    $no   = $time.$id;
    $tgl  = date("Y-m-d");
    $nip  = $_POST['nip'];
    $dok  = $_POST['dokumen'];
    $ss   = $_FILES['ss']['name'];
    $tmp  = $_FILES['ss']['tmp_name'];

    // Rename nama fotonya dengan menambahkan tanggal dan jam upload
    $ssbaru = date('dmYHis').$ss;

    // Set path folder tempat menyimpan fotonya
    $path = "../../../../images/transaksi/".$ssbaru;
    //-----------------------------------------------
    $imgExt = strtolower(pathinfo($ss,PATHINFO_EXTENSION)); // get image extension
		// valid image extensions
		$valid_extensions = array('pdf'); // valid extensions
		// allow valid image file formats
		if(in_array($imgExt, $valid_extensions)){
      // Jika syarat sudah terpenuhi
      if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
          // Proses simpan ke Database
          $query1 = "insert into transaksi values('". $no . "','" . $tgl . "','" . $nip . "','" . $dok . "','" . $ssbaru . "')";
          $sql1 = mysql_query($query1);
          if ($sql1) {
              header("Location: ../../index.php?hal=ttrs&tmb=success");
          }
      }else{
          // Jika gambar gagal diupload, Lakukan :
          mysql_error();
      }
	} else {
      header("Location: ../../index.php?hal=ttrs&tmb=fail");
  }
}
?>
