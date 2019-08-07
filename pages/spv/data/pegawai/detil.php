<?php
	include "../../../../koneksi/koneksi.php";

	$tampil = mysql_query("SELECT a.*, b.* from bank a, pegawai b where a.kd_bank=b.kd_bank and nip='".$_GET['q']."'");
	$r = mysql_fetch_array($tampil);
?>

<div class="tab-content">
    <div class="tab-pane active" id="horizontal-form">
            <table class="table">
				<thead>
					<td width="25%"></td>
					<td width="5%"></td>
					<td width="50%"></td>
					<td width="20%"></td>
				</thead>
				<tbody>
					<tr>
						<th>NIP</th>
						<th>:</th>
						<td><?php echo $r['nip'];?></td>
						<td rowspan="12"><img src="../../images/foto/<?php echo $r['foto'];?>" alt="foto-pegawai" width="150" height="150" onmousedown="return false" oncontexmenu="return false" onselectstart="return false"/></td>
					</tr>
					<tr>
						<th>Nama lengkap</th>
						<th>:</th>
						<td><?php echo $r['nm_pegawai'];?></td>
					</tr>
					<tr>
						<th>Jenis kelamin</th>
						<th>:</th>
						<td><?php echo $r['jenis_kelamin'];?></td>
					</tr>
					<tr>
						<th>Tempat lahir</th>
						<th>:</th>
						<td><?php echo $r['tempat_lahir'];?></td>
					</tr>
					<tr>
						<th>Tanggal lahir</th>
						<th>:</th>
						<td><?php echo $r['tanggal_lahir'];?></td>
					</tr>
					<tr>
						<th>Agama</th>
						<th>:</th>
						<td><?php echo $r['agama'];?></td>
					</tr>
					<tr>
						<th>Alamat</th>
						<th>:</th>
						<td><?php echo $r['alamat'];?></td>
					</tr>
					<tr>
						<th>Nomor telepon</th>
						<th>:</th>
						<td><?php echo $r['no_telp'];?></td>
					</tr>
					<tr>
						<th>Tahun masuk</td>
						<th>:</th>
						<td><?php echo $r['tahun_masuk'];?></td>
					</tr>
					<tr>
						<th>Bagian</th>
						<th>:</th>
						<td><?php echo $r['bagian'];?></td>
					</tr>
					<tr>
						<th>Cabang</th>
						<th>:</th>
						<td><?php echo $r['nm_bank'];?></td>
					</tr>
				</tbody>
			</table>
    </div>
</div>
<div class="modal-footer">
</div>
