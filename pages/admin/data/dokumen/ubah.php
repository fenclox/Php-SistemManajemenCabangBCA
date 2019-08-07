<?php
    include "../../../../koneksi/koneksi.php";

    $tampil = mysql_query("SELECT * FROM jenis_dokumen where kd_dokumen='".$_GET['q']."'");
    $r = mysql_fetch_array($tampil);
?>
<form role="form" method="post" action="data/dokumen/proses.php">
    <div class="form-group">
        <label>Kode</label>
        <input class="form-control" name="kode" value="<?php echo $r['kd_dokumen'];?>" readonly="">
    </div>
    <div class="form-group">
        <label>Jenis dokumen</label>
        <input type="text" class="form-control" name="nama" placeholder="Jenis dokumen" value="<?php echo $r['nm_dokumen'];?>"  autofocus="" required="">
    </div>
    <div class="modal-footer">
        <input type="submit" name="ubah" value="Ubah" class="btn btn-primary">
    </div>
</form>
