                        <h3 class="page-header">Tambah Pegawai</h3>
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
                                                    Data gagal ditambahkan atau gunakan foto dengan format .jpeg, jpg, png, dan gif.
                                                </div>
                                            <?php }
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post" enctype="multipart/form-data" action="data/pegawai/proses.php">
                                        <div class="form-group">
                                            <label>NIP</label>
                                            <input class="form-control" type="text" placeholder="NIP terisi otomatis" readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama lengkap</label>
                                            <input class="form-control" type="text" name="nama" placeholder="Nama lengkap" autofocus="" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis kelamin</label>
                                            <div class="radio">
                                                <label class="radio-inline">
                                                    <input type="radio" name="jk" checked="" id="optionsRadiosInline1" value="Laki-laki" checked>Laki-laki
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="jk" id="optionsRadiosInline2" value="perempuan">Perempuan
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat lahir</label>
                                            <input class="form-control" type="text" name="tmp_lahir" placeholder="Tempat lahir" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal lahir</label>
                                            <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal lahir" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat" required=""></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Agama</label>
                                            <select class="form-control" name="agama" required="">
                                                <option value="Islam">Islam</option>
                                                <option value="Katholik">Katholik</option>
                                                <option value="Protestan">Protestan</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor telepon</label>
                                            <input class="form-control" type="text" name="telp" placeholder="Nomor telepon" onkeypress="return isNumberKey(event)" maxlength="15" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun masuk</label>
                                            <input class="form-control" type="text" name="thn_masuk" placeholder="Tahun masuk" onkeypress="return isNumberKey(event)" maxlength="4" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Bagian</label>
                                            <select class="form-control" name="bagian" required="">
                                                <option value="Teller">Teller</option>
                                                <option value="CSO">CSO</option>
                                                <option value="BO">BO</option>
                                            </select>
                                        </div>
                                        <?php $kd = $_SESSION['kd_bank']; ?>
                                        <input class="form-control" type="hidden" name="cabang" value="<?php echo $kd ?>" readonly="">
                                        <div class="form-group">
                                            <label>Kata sandi</label>
                                            <input class="form-control" type="password" name="password" placeholder="Kata sandi terisi otomatis" readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label>Foto</label>
                                            <input type="file" name="foto" required="">
                                        </div>
                                    </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div> <hr>
                            <!-- /.row (nested) -->
                            <div class="row">
                                <div class="col-lg-6">
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
