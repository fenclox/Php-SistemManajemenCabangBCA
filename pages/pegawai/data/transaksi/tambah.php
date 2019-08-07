<h3 class="page-header">Tambah Transaksi</h3>
</div>
<!-- /.col-lg-12 -->
</div>
<!-- *************************************Content************************************* -->
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-8">
                <?php
                if (isset($_GET['tmb'])) {
                if($_GET['tmb']=="success") {
                ?>
                <div class="alert alert-success">
                    Data berhasil ditambahkan.
                </div>
                <?php }else{ ?>
                <div class="alert alert-danger">
                    Maaf, hanya file pdf yang dapat digunakan.
                </div>
                <?php }
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <form role="form" method="post" enctype="multipart/form-data" action="data/transaksi/proses.php">
                    <div class="form-group">
                        <label>No.Transaksi</label>
                        <input class="form-control" name="kode" placeholder="Kode terisi otomatis" readonly="">
                    </div>
                    <!-- Hidden type -->
                    <input class="form-control" type="hidden" name="tgl">
                    <input class="form-control" type="hidden" name="nip" value='<?php echo $_SESSION['nip']; ?>'>
                    <!-- End Hidden type -->
                    <div class="form-group">
                        <label>Dokumen</label>
                        <?php
                        echo '<select class="form-control" name="dokumen" required="">';
                            $query=mysql_query("
                            SELECT *
                            FROM jenis_dokumen");
                            while($entry=mysql_fetch_array($query))
                            {
                            echo "<option";
                            echo " value='".$entry['kd_dokumen']."'>" . $entry['nm_dokumen'] . "</option>";
                            }
                        echo "</select>";
                        ?>
                    </div>
                    <div class="form-group">
                        <label>File</label>
                        <input type="file" name="ss" id="pdfInp" required=""> 
                        <button type="button" class="tombol1" style="float: left; margin: -24px 0 0 350px">Lihat | Tutup</button>
                    </div>
                    <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-default">Batal</button>
                </form>
            </div>
            <!-- /.col-lg-6 (nested) -->
        </div>
        <!-- /.row (nested) -->
                <div class="row">
                <div class="col-lg-12"><br>
                <p id="lihat" style="display:none">
                  <canvas id="the-canvas" style="border:1px solid black; width: 400"></canvas>
                </p>
                </div>
                </div>
    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>
<!-- *************************************End Content************************************* -->