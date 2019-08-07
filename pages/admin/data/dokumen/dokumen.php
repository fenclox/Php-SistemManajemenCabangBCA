        <h3 class="page-header">Data Dokumen</h3>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- *************************************Content************************************* -->
<div class="row">
    <div class="col-lg-8">
        <?php
            if (isset($_GET['ubh'])) {
                if($_GET['ubh']=="success") {
                    ?>
                    <div class="alert alert-success">
                        Data berhasil diubah.
                    </div>
                <?php }else{ ?>
                    <div class="alert alert-danger">
                        Data gagal diubah.
                    </div>
                <?php }
            }
            else if (isset($_GET['hps'])) {
                    if($_GET['hps']=="success") {
                        ?>
                        <div class="alert alert-success">
                            Data berhasil dihapus.
                        </div>
                    <?php }else{ ?>
                        <div class="alert alert-danger">
                            Data gagal dihapus.
                        </div>
                    <?php }
            }
        ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Dokumen</th>
                            <th>Jenis Dokumen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- Data Dokumen -->
                    <?php
                    $query="SELECT * from jenis_dokumen order by kd_dokumen asc";
                    $tampil = mysql_query($query);
                    $no = 1; // nomor baris
                    while ($r = mysql_fetch_array($tampil)) {
                        echo "
                            <tr>
                                <td>$no</td>
                                <td>$r[kd_dokumen]</td>
                                <td>$r[nm_dokumen]</td>
                                <td> "; ?>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" value='<?php echo $r['kd_dokumen'];?>' onclick="ubahdata(this.value)" data-toggle="modal" data-target="#ubah">
                                            <i class="fa fa-edit"></i>
                                </button>&nbsp;
                                <button type="button" class="btn btn-danger" value='<?php echo $r['kd_dokumen'];?>' onclick="hapusdata(this.value)" data-toggle="modal" data-target="#hapus">
                                            <i class="fa fa-trash-o"></i>
                                </button>
                                </td>
                            </tr>
                        <?php
                        $no++;}
                    ?>
                    <!-- End Data Dokumen -->
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
            <!-- Modal Ubah-->
            <div class="modal fade" id="ubah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Ubah Dokumen</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Ubah Data -->
                            <span id="dub"></span>
                            <!-- End Ubah Data -->
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal ubah-->
            <!-- Modal Hapus-->
            <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
                        </div>
                        <div class="modal-body">
                            Yakin ingin menghapus data?
                        </div>
                        <div class="modal-footer">
                            <form method="post" action="data/Dokumen/proses.php">
                                <input type="hidden" id="dcbg" name="kode" value="">
                                <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog-->
            </div>
            <!-- /.modal hapus-->
        <script>
            function ubahdata(kd_dokumen){
                var ajaxbos = new XMLHttpRequest();
                
                    ajaxbos.onreadystatechange= function(){
                        if(ajaxbos.readyState==4 && ajaxbos.status==200){
                            document.getElementById("dub").innerHTML= ajaxbos.responseText;
                        }
                    };
                    ajaxbos.open("GET","data/dokumen/ubah.php?q="+kd_dokumen+"&s=#",true);
                    ajaxbos.send();
                }

            function hapusdata(kd_dokumen){
                document.getElementById('dcbg').value=kd_dokumen;
            }
        </script>             