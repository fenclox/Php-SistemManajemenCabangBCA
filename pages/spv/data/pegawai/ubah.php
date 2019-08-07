<?php
    include "../../../../koneksi/koneksi.php";

    $tampil = mysql_query("SELECT a.*, b.* from bank a, pegawai b where a.kd_bank=b.kd_bank and nip='".$_GET['q']."'");
    $r = mysql_fetch_array($tampil);

    //Fungsi Cek\
    class selected{
        function cek($val,$sel,$tipe){
            if($val==$sel){
                switch($tipe){
                    case 'select' :echo "selected"; break;
                    case 'radio' :echo "checked"; break;
                }
            }else{
                echo "";
            }
        }
    }
    $ob = new selected();
?>
    <div class="tab-content">
        <div class="row">
            <div class="col-lg-6">

                    <div class="form-group">
                        <label>NIP</label>
                        <input class="form-control" name="nip" type="text" value="<?php echo $r['nip'];?>" readonly="">
                    </div>
                    <div class="form-group">
                        <label>Nama lengkap</label>
                        <input class="form-control" type="text" value="<?php echo $r['nm_pegawai'];?>" name="nama" placeholder="Nama lengkap" autofocus="" required="">
                    </div>
                    <div class="form-group">
                        <label>Jenis kelamin</label>
                        <div class="radio">
                            <label class="radio-inline">
                                <input type="radio" name="jk" id="optionsRadiosInline1" value="Laki-laki" <?php $ob->cek("Laki-laki",$r['jenis_kelamin'],"radio") ?>>Laki-laki
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="jk" id="optionsRadiosInline2" value="perempuan" <?php $ob->cek("Perempuan",$r['jenis_kelamin'],"radio") ?>>Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tempat lahir</label>
                        <input class="form-control" type="text" value="<?php echo $r['tempat_lahir'];?>" name="tmp_lahir" placeholder="Tempat lahir" required="">
                    </div>
                    <div class="form-group">
                        <label>Tanggal lahir</label>
                        <input type="date" name="tgl_lahir" value="<?php echo $r['tanggal_lahir'];?>" class="form-control" placeholder="Tanggal lahir" required="">
                    </div>
                    <div class="form-group">
                        <label>Agama</label>
                        <select class="form-control" name="agama" required="">
                            <option <?php $ob->cek("Islam",$r['agama'],"select") ?> value="Islam">Islam</option>
                            <option <?php $ob->cek("Kristen",$r['agama'],"select") ?> value="Kristen">Kristen</option>
                            <option <?php $ob->cek("Katholik",$r['agama'],"select") ?> value="Katholik">Katholik</option>
                            <option <?php $ob->cek("Protestan",$r['agama'],"select") ?> value="Protestan">Protestan</option>
                            <option <?php $ob->cek("Hindu",$r['agama'],"select") ?> value="Hindu">Hindu</option>
                            <option <?php $ob->cek("Budha",$r['agama'],"select") ?> value="Budha">Budha</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat" required=""><?php echo $r['alamat'];?></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Nomor telepon</label>
                        <input class="form-control" type="text" value="<?php echo $r['no_telp'];?>" name="telp" onkeypress="return isNumberKey(event)" maxlength="15" placeholder="Nomor telepon" required="">
                    </div>
                    <div class="form-group">
                        <label>Tahun masuk</label>
                        <input class="form-control" type="text" value="<?php echo $r['tahun_masuk'];?>" name="thn_masuk" placeholder="Tahun masuk" onkeypress="return isNumberKey(event)" maxlength="4" required="">
                    </div>
                    <div class="form-group">
                        <label>Bagian</label>
                        <select class="form-control" name="bagian" required="">
                            <option <?php $ob->cek("Teller",$r['bagian'],"select") ?> value="Teller">Teller</option>
                            <option <?php $ob->cek("CSO",$r['bagian'],"select") ?> value="CSO">CSO</option>
                            <option <?php $ob->cek("BO",$r['bagian'],"select") ?> value="BO">BO</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Cabang</label>
                        <?php
                            echo '<select class="form-control" name="cabang" required="">';

                            $query=mysql_query("
                                SELECT *
                                FROM bank");
                            while($entry1=mysql_fetch_array($query))
                                {
                                echo "<option";
                                if($entry1['kd_bank']==$r['kd_bank']){echo " selected=selected";}
                                echo " value='".$entry1['kd_bank']."'>" . $entry1['nm_bank'] . "</option>";
                                }
                            echo "</select>";
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Kata sandi</label>
                        <input class="form-control" type="password" value="<?php echo $r['password']?>" name="password" placeholder="Kata sandi">
                    </div>
                    <div class="form-group">
                      <label>Foto</label>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br>
    			                  <input type="file" name="foto">
                          </label>
                        </div>
		                </div>
                </div>
            <!-- /.col-lg-6 (nested) -->
        </div>
        <!-- /.row (nested) -->

    </div>
