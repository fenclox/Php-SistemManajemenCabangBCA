                        <h3 class="page-header">Tambah Dokumen</h3>
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
                                                    Data gagal ditambahkan.
                                                </div>
                                            <?php }
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post" action="data/dokumen/proses.php">
                                        <div class="form-group">
                                            <label>Kode</label>
                                            <input class="form-control" name="kode" placeholder="Kode terisi otomatis" readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Dokumen</label>
                                            <input type="text" class="form-control" name="nama" placeholder="Jenis dokumen" required="" autofocus="">
                                        </div>
                                        <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                                        <button type="reset" class="btn btn-default">Batal</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
                <!-- *************************************End Content************************************* -->
