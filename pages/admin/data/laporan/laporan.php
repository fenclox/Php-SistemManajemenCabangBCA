    <h3 class="page-header">Laporan Transaksi</h3>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- *************************************Content************************************* -->
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
    <div class="panel-body">
      <div class="row">
        <div class="col-lg-12">
          <form method="POST" action="data/laporan/report.php">
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="control-label">Bulan</label>
                  <div class="selectContainer">
                      <select class="form-control" name="bulan">
                          <option value="01">Januari</option>
                          <option value="02">Februari</option>
                          <option value="03">Maret</option>
                          <option value="04">April</option>
                          <option value="05">Mei</option>
                          <option value="06">Juni</option>
                          <option value="07">Juli</option>
                          <option value="08">Agustus</option>
                          <option value="09">September</option>
                          <option value="10">Oktober</option>
                          <option value="11">November</option>
                          <option value="12">Desember</option>
                      </select>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="control-label">Tahun</label>
                  <div class="selectContainer">
                          <?php
                              $now=date('Y');
                              echo "<select name='tahun' class='form-control'>";
                              for ($a=2010;$a<=$now;$a++)
                              {
                                   echo "<option value='$a' selected>$a</option>";
                              }
                              echo "</select>";
                          ?>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                    <label>Cabang</label>
                    <?php
                        echo '<select class="form-control" name="cabang" required="">';
                        $query=mysql_query("
                            SELECT *
                            FROM bank");
                        while($entry=mysql_fetch_array($query))
                            {
                            echo "<option";
                            if($entry['kd_bank']==fred){echo " selected=selected";}
                            echo " value='".$entry['kd_bank']."'>" . $entry['nm_bank'] . "</option>";
                            }
                        echo "</select>";
                    ?>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                  <input type="submit" value="Cetak" class="btn btn-primary">
                </div>
              </div>
            </div>
          </form>
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
