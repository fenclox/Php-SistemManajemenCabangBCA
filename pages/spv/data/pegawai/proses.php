<?php
include "../../../../koneksi/koneksi.php";

$cbg   = $_POST['cabang'];

//Autonumber Start
$query = "select MAX(RIGHT(nip,4)) as max_id from pegawai where kd_bank='$cbg' ORDER BY nip";
$sql = mysql_query($query);
$hasil = mysql_fetch_array($sql);
$maxid = 0;
$maxid = $hasil['max_id'];
$maxid++;
switch (strlen($maxid)) {
    case 1 :
        $idfix = "000" . $maxid;
        break;
    case 2 :
        $idfix = "00" . $maxid;
        break;
    case 3 :
        $idfix = "0" . $maxid;
        break;
    default :
        $idfix = $maxid;
        break;
};

//Proses Tambah
if(isset($_POST['tambah'])) {
    $nm         = $_POST['nama'];
    $jk         = $_POST['jk'];
    $tmp_lhr    = $_POST['tmp_lahir'];
    $tgl_lhr    = $_POST['tgl_lahir'];
    $agm        = $_POST['agama'];
    $alm        = $_POST['alamat'];
    $telp       = $_POST['telp'];
    $thn_msk    = $_POST['thn_masuk'];
    $bg         = $_POST['bagian'];
    $pass       = $tgl_lhr;
    $foto       = $_FILES['foto']['name'];
    $tmp        = $_FILES['foto']['tmp_name'];
    $lvl        = 2;
    $nip        = $cbg.$idfix;

    // Rename nama fotonya dengan menambahkan tanggal dan jam upload
    $fotobaru = date('dmYHis').$foto;

    // Set path folder tempat menyimpan fotonya
    $path = "../../../../images/foto/".$fotobaru;
    //-----------------------------------------------
    $imgExt = strtolower(pathinfo($foto,PATHINFO_EXTENSION)); // get image extension
		// valid image extensions
		$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
    // allow valid image file formats
    if(in_array($imgExt, $valid_extensions)){
      if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
          // Proses simpan ke Database
          $query = "insert into pegawai values('". $nip . "','" . $nm . "','" . $jk . "','" . $tmp_lhr . "','" . $tgl_lhr . "','" . $agm . "','" . $alm . "','" . $telp . "','" . $thn_msk . "','" . $bg . "','" . $cbg . "','" . $pass . "','" . $fotobaru . "','" . $lvl . "')";
          $sql1 = mysql_query($query); // Eksekusi/ Jalankan query dari variabel $query

          if($sql1){ // Cek jika proses simpan ke database sukses atau tidak
              // Jika Sukses, Lakukan :
              header("location: ../../index.php?hal=tpgw&tmb=success"); // Redirect ke halaman index.php
          }
      } else {
          // Jika gambar gagal diupload, Lakukan :
          mysql_error();
      }
    }else{
      // Jika Gagal, Lakukan :
      header("location: ../../index.php?hal=tpgw&tmb=fail");
    }
}
//Proses Ubah
else if(isset($_POST['ubah'])) {
    $nip        = $_POST['nip'];
    $nm         = $_POST['nama'];
    $jk         = $_POST['jk'];
    $tmp_lhr    = $_POST['tmp_lahir'];
    $tgl_lhr    = $_POST['tgl_lahir'];
    $agm        = $_POST['agama'];
    $alm        = $_POST['alamat'];
    $telp       = $_POST['telp'];
    $thn_msk    = $_POST['thn_masuk'];
    $bg         = $_POST['bagian'];
    $cbg        = $_POST['cabang'];
    $pass       = $_POST['password'];

    // Cek apakah user ingin mengubah fotonya atau tidak
    if(isset($_POST['ubah_foto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
        // Ambil data foto yang dipilih dari form
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];

        // Rename nama fotonya dengan menambahkan tanggal dan jam upload
        $fotobaru = date('dmYHis').$foto;

        // Set path folder tempat menyimpan fotonya
        $path = "../../../../images/foto/".$fotobaru;

        // Proses upload
        if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
            // Query untuk menampilkan data pegawai berdasarkan NIS yang dikirim
            $query = "SELECT a.*, b.* from bank a, pegawai b where nip='".$nip."'";
            $sql = mysql_query($query); // Eksekusi/Jalankan query dari variabel $query
            $data = mysql_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

            // Cek apakah file foto sebelumnya ada di folder foto
            if(file_exists("../../../../images/foto/".$data['foto'])){ // Jika foto ada
                unlink("../../../../images/foto/".$data['foto']); // Hapus file foto sebelumnya yang ada di folder foto
              }

            // Proses ubah data ke Database
            $query = "UPDATE pegawai SET nm_pegawai='".$nm."', jenis_kelamin='".$jk."', tempat_lahir='".$tmp_lhr."', tanggal_lahir='".$tgl_lhr."', agama='".$agm."',alamat='".$alm."', no_telp='".$telp."', tahun_masuk='".$thn_msk."', bagian='".$bg."', kd_bank='".$cbg."', password='".$pass."', foto='".$fotobaru."' WHERE nip='".$nip."'";
            $sql = mysql_query($query); // Eksekusi/ Jalankan query dari variabel $query

            if($sql){ // Cek jika proses simpan ke database sukses atau tidak
                // Jika Sukses, Lakukan :
                header("location: ../../index.php?hal=pgw&ubh=success"); // Redirect ke halaman
            }else{
                // Jika Gagal, Lakukan :
                //header("location: ../../index.php?hal=pgw&tmb=fail");
                die ("sql gagal");
            }
        }else{
            /*// Jika gambar gagal diupload, Lakukan :
            ?>
            <script >
                window.location=history.go(-1);
                document.write("Gagal upload gambar");
            </script>
            <?php*/
            die ('uploaded file false');
        }
    }else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
        // Proses ubah data ke Database
        $query1 = "UPDATE pegawai SET nm_pegawai='".$nm."', jenis_kelamin='".$jk."', tempat_lahir='".$tmp_lhr."', tanggal_lahir='".$tgl_lhr."', agama='".$agm."',alamat='".$alm."', no_telp='".$telp."', tahun_masuk='".$thn_msk."', bagian='".$bg."', kd_bank='".$cbg."', password='".$pass."' WHERE nip='".$nip."'";
        $sql = mysql_query($query1); // Eksekusi/ Jalankan query dari variabel $query

        if($sql){ // Cek jika proses simpan ke database sukses atau tidak
            // Jika Sukses, Lakukan :
            header("location: ../../index.php?hal=pgw&ubh=success"); // Redirect ke halaman
            // Jika Gagal, Lakukan :
            ?>
            <script >
                window.location=history.go(-1);
            </script>
            <?php
        }
    }

}

//Proses Hapus
else if(isset($_POST['hapus'])) {
    $kode = $_POST['kode'];

    //DELETE QUERY START
    $query1 = "delete from pegawai where nip='$kode'";
    $sql1 = mysql_query($query1);

        if ($sql1) {
            header("Location: ../../index.php?hal=pgw&hps=success");
        } else {
            header("Location: ../../index.php?hal=pgw&hps=fail");
        }
         exit;
}
?>
