                        <h3 class="page-header">Beranda</h3>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- *************************************Content************************************* -->
                <div class="row" >
                    <div class="col-lg-12">
                        <div class="alert alert-success">
                            <?php
                                $nip = $_SESSION['nip'];
                                include "../../koneksi/koneksi.php";
                                $sql = "select nip,nm_pegawai from pegawai where nip='".$nip."'";
                                $query = mysql_query($sql);
                                while($data = mysql_fetch_array($query)){
                                    echo "Selamat datang, <b> " . $data['nm_pegawai'] . " [" . $data['nip'] . "]</b>";
                                }
                            ?>
                        </div>
                    </div>
                    <!-- /.welcome -->
                </div>
                <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                    <img src="../../images/bg.jpg" alt="logo" class="img-responsive img-rounded" onmousedown="return false" oncontexmenu="return false" onselectstart="return false" />
                  </div>
                </div>
                <!-- *************************************End Content************************************* -->
