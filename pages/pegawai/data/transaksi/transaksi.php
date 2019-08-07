        <h3 class="page-header">Data Transaksi</h3>
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- *************************************Content************************************* -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No.Transaksi</th>
                            <th>Tgl.Transaksi</th>
                            <th>Nama Pegawai</th>
                            <th>Dokumen</th>
                            <th>File</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- Data Transaksi -->
                    <?php
                    $nip = $_SESSION['nip'];
                    $query="SELECT a.*,b.*,c.* from jenis_dokumen a, pegawai b, transaksi c
                            where a.kd_dokumen=c.kd_dokumen and b.nip=c.nip and c.nip='$nip' order by no_transaksi desc";
                    $tampil = mysql_query($query);
                    $no = 1; // nomor baris
                    while ($r = mysql_fetch_array($tampil)) {
                        echo "
                            <tr>
                                <td>$no</td>
                                <td>$r[no_transaksi]</td>
                                <td>$r[tgl_transaksi]</td>
                                <td>$r[nm_pegawai]</td>
                                <td>$r[nm_dokumen]</td>
                                <td>"?>
                                  <a href="../../images/transaksi/<?php echo $r['file'];?>">Lihat</a>
                                </td>
                            </tr>
                        <?php
                        $no++;}
                    ?>
                    <!-- End Data Transaksi -->
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- *************************************End Content************************************* -->
