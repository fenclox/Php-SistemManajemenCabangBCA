                        <h3 class="page-header">Tambah Cabang</h3>
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
                                    <form role="form" method="post" action="data/cabang/proses.php">
                                        <div class="form-group">
                                            <label>Kode</label>
                                            <input class="form-control" type="text" name="kode" placeholder="Kode cabang" maxlength="4" onkeypress="return isNumberKey(event)" required=""  autofocus="">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama cabang</label>
                                            <input type="text" class="form-control" name="nama" placeholder="Nama cabang" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" name="alamat" placeholder="Alamat" rows="3" required=""></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor telepon</label>
                                            <input class="form-control" type="text" id="notelp" name="telp" placeholder="Nomor telepon" onkeypress="return isNumberKey(event)" maxlength="15" required="">
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
