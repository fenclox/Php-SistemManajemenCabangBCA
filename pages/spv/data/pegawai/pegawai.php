        <h3 class="page-header">Data Pegawai</h3>
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
                            <th>NIP</th>
                            <th>Nama Lengkap</th>
                            <th>Bagian</th>
                            <th>Cabang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- Data Cabang -->
                    <?php

                    $kd=$_SESSION["kd_bank"];

                    $query="SELECT bank.*, pegawai.* from pegawai, bank where bank.kd_bank=pegawai.kd_bank and level=2 and pegawai.kd_bank='$kd' order by nip asc"; //Belum responsive
                    $tampil = mysql_query($query);
                    $no = 1; // nomor baris
                    while ($r = mysql_fetch_array($tampil)) {
                        echo "
                            <tr>
                                <td>$no</td>
                                <td>$r[nip]</td>
                                <td>$r[nm_pegawai]</td>
                                <td>$r[bagian]</td>
                                <td>$r[nm_bank]</td>
                                <td> "; ?>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning" value='<?php echo $r['nip'];?>' onclick="lihatdata(this.value)" data-toggle="modal" data-target="#detil">
                                            <i class="fa fa-eye"></i>
                                </button>&nbsp;
                                <button type="button" class="btn btn-primary" value='<?php echo $r['nip'];?>' onclick="ubahdata(this.value)" data-toggle="modal" data-target="#ubah">
                                            <i class="fa fa-edit"></i>
                                </button>&nbsp;
                                <button type="button" class="btn btn-danger" value='<?php echo $r['nip'];?>' onclick="hapusdata(this.value)" data-toggle="modal" data-target="#hapus">
                                            <i class="fa fa-trash-o"></i>
                                </button>
                                </td>
                            </tr>
                        <?php
                        $no++;}
                    ?>
                    <!-- End Data Cabang -->
                  </tbody>
                </table>
                <!-- /.table-responsive --><??>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- *************************************End Content************************************* -->
            <!-- Modal Detil-->
            <div class="modal fade bs-example-modal-lg" id="detil" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Profil Pegawai</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Detil Data -->
                            <span id="dpro"></span>
                            <!-- End detil Data -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Ubah-->
            <div class="modal fade" id="ubah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Ubah Pegawai</h4>
                        </div>
                        <div class="modal-body">
                        <form method="post" data-toggle="modal" enctype="multipart/form-data" action="data/pegawai/proses.php">
                            <!-- Ubah Data ******************************************************************************-->
                                <span id="dub"></span>
                            <!-- End Ubah Data *****************************************************************************-->
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
                        </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal ubah-->
            <!-- Modal Hapus-->
            <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
                        </div>
                        <div class="modal-body">
                            Yakin ingin menghapus data?
                        </div>
                        <div class="modal-footer">
                            <form method="post" action="data/pegawai/proses.php">
                                <input type="hidden" id="dpgw" name="kode" value="">
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
            function lihatdata(nip){
                var ajaxbos = new XMLHttpRequest();

                    ajaxbos.onreadystatechange= function(){
                        if(ajaxbos.readyState==4 && ajaxbos.status==200){
                            document.getElementById("dpro").innerHTML= ajaxbos.responseText;
                        }
                    };
                    ajaxbos.open("GET","data/pegawai/detil.php?q="+nip+"&s=#",true);
                    ajaxbos.send();
            }

            function ubahdata(nip){
                var ajaxbos = new XMLHttpRequest();

                    ajaxbos.onreadystatechange= function(){
                        if(ajaxbos.readyState==4 && ajaxbos.status==200){
                            document.getElementById("dub").innerHTML= ajaxbos.responseText;
                        }
                    };
                    ajaxbos.open("GET","data/pegawai/ubah.php?q="+nip+"&s=#",true);
                    ajaxbos.send();
            }

            function hapusdata(nip){
                document.getElementById('dpgw').value=nip;
            }
        </script>
