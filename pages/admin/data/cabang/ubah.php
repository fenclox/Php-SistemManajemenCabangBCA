<?php
    include "../../../../koneksi/koneksi.php";

    $tampil = mysql_query("SELECT * FROM bank where kd_bank='".$_GET['q']."'");
    $r = mysql_fetch_array($tampil);
?>
<form role="form" method="post" action="data/cabang/proses.php">
    <div class="form-group">
        <label>Kode</label>
        <input class="form-control" name="kode" value="<?php echo $r['kd_bank'];?>" readonly="">
    </div>
    <div class="form-group">
        <label>Nama cabang</label>
        <input type="text" class="form-control" name="nama" placeholder="Nama cabang" value="<?php echo $r['nm_bank'];?>"  autofocus="" required="">
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <textarea class="form-control" name="alamat" placeholder="Alamat" rows="3"><?php echo $r['alamat_bank'];?></textarea>
    </div>
    <div class="form-group">
        <label>Nomor telepon</label>
        <input class="form-control" type="text" id="notelp" name="telp" placeholder="Nomor telepon" value="<?php echo $r['no_telp'];?>" onkeypress="return isNumberKey(event)" maxlength="15">
    </div>
    <div class="modal-footer">
        <input type="submit" name="ubah" value="Ubah" class="btn btn-primary">
    </div>
</form>
