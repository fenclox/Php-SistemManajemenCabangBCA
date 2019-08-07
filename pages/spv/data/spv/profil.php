<?php
	$nip = $_SESSION['nip'];
	$sql = "select a.*, b.* from bank a, pegawai b where nip='$nip'";
	$query = mysql_query($sql);

	$tampil = mysql_query("select a.*, b.*  from bank a, pegawai b where nip='".$nip."' and a.kd_bank=b.kd_bank");
	$r = mysql_fetch_array($tampil);
?>
        <h3 class="page-header">Profil</h3>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- *************************************Content************************************* -->
<div class="row">
	<div class="col-lg-8">
			<?php if (isset($_GET['er'])){
			  switch($_GET['er']){
			    case '0' : ?>
			      <div class="alert alert-danger">
			        Gagal, kata sandi baru tidak sesuai.
			      </div> <?php break;
			    case '1' : ?>
			      <div class="alert alert-danger">
			        Gagal, kata sandi yang dimasukan salah.
			      </div>  <?php break;
			    case 's' : ?>
			      <div class="alert alert-success">
			        Berhasil ubah password.
			      </div>  <?php break;
			  }
			}
			?>
	</div>
</div>
<div class="row" >
    <div class="col-lg-12">
    	<div class="panel panel-primary">
    	  	<div class="panel-body">
    	  	<div class="col-lg-10">
    	  	<div class="row">
    			<div class="col-lg-5">
			    	<dl class="dl">
			    	  <dt>Nama lengkap</dt>
			    	  <dd><?php echo $r['nm_pegawai']?> - <?php echo $r['nip']?></dd><br>
			    	  <dt>Bagian</dt>
			    	  <dd><?php echo $r['bagian']?></dd><br>
			    	</dl>
			    	<hr>
	    	  	</div>
	    	  	<div class="col-lg-5">
			    	<dl class="dl">
			    	  <dt>Cabang</dt>
			    	  <dd><?php echo $r['nm_bank']?></dd><br>
			    	  <dt>Alamat cabang</dt>
			    	  <dd><?php echo $r['alamat_bank']?></dd><br>
			    	</dl>
			    	<hr>
	    	  	</div>
	    	  	<div class="col-lg-5">
			    	<dl class="dl">
			    	  <dt>Jenis kelamin</dt>
			    	  <dd><?php echo $r['jenis_kelamin']?></dd><br>
			    	  <dt>Nomor telepon</dt>
			    	  <dd><?php echo $r['no_telp']?></dd><br>
			    	  <dt>Alamat</dt>
			    	  <dd><?php echo $r['alamat']?></dd><br>
			    	</dl>
			    	<hr>
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#ubah">
							Ubah kata sandi
						</button>
	    	  	</div>
	    	  	<div class="col-lg-5">
			    	<dl class="dl">
			    	  <dt>Agama</dt>
			    	  <dd><?php echo $r['agama']?></dd><br>
			    	  <dt>Tempat Lahir</dt>
			    	  <dd><?php echo $r['tempat_lahir']?></dd><br>
			    	  <dt>Tanggal Lahir</dt>
			    	  <dd><?php echo $r['tanggal_lahir']?></dd><br>
			    	</dl>
			    	<hr>
	    	  	</div>
	    	</div>
	    	</div>
	    	<div class="col-md-2">
	    	<div class="row">
	    		<div class="col-lg-2">
	    			<img src="../../images/foto/<?php echo $r['foto'];?>" alt="foto-pegawai" width="150" height="200"  class="img-rounded" onmousedown="return false" oncontexmenu="return false" onselectstart="return false"/>
	    		</div>
	    	</div>
	    	</div>
	    </div>
    </div>
</div>
<!-- *************************************End Content************************************* -->
<!-- Modal Ubah-->
<div class="modal fade" id="ubah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
				<div class="modal-content">
						<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Ubah kata sandi</h4>
						</div>
						<div class="modal-body">
								<!-- Ubah Data -->
								<form role="form" method="post" action="data/spv/proses.php">
								    <div class="form-group">
								        <label>Kata sandi lama</label>
								        <input class="form-control" type="password" name="lama" placeholder="Kata sandi lama" required="">
								    </div>
										<div class="form-group">
								        <label>Kata sandi baru</label>
								        <input class="form-control" type="password" name="baru" placeholder="Kata sandi baru" required="">
								    </div>
										<div class="form-group">
								        <label>Ulangi kata sandi baru</label>
								        <input class="form-control" type="password" name="baru1" placeholder="Ulangi kata sandi baru" required="">
								    </div>
								    <div class="modal-footer">
								        <input type="submit" name="ubah" value="Ubah" class="btn btn-primary">
								    </div>
								</form>
								<!-- End Ubah Data -->
						</div>
				</div>
				<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
</div>
<!-- /.modal ubah-->
