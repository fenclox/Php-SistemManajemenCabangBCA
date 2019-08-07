<?php
	session_start();
	ob_start();
	include('../../../../koneksi/koneksi.php');

	$tahun = $_POST['tahun'];
	$bulan = $_POST['bulan'];

	//Tgl Indonesia
	date_default_timezone_set('Asia/Jakarta');
	function tglIndonesia($str){
				$tr   = trim($str);
				$str    = str_replace(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'), array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'), $tr);
				return $str;
		}
	$tgl =  tglIndonesia(date('d F Y'));

	//Untuk ngambil nama dari nip
	$nip = $_SESSION['nip'];
	$kd = $_SESSION['kd_bank'];

	$sql = "select a.nip, a.nm_pegawai, b.kd_bank, b.nm_bank from pegawai a, bank b where a.nip='".$nip."' and b.kd_bank='".$kd."' ";
	$query = mysql_query($sql);
	while($data = mysql_fetch_array($query)){
		$nm = $data['nm_pegawai'];
		$cb = $data['nm_bank'];
	};

	//Report
	require ("../../../../html2pdf/html2pdf.class.php");
	$content = ob_get_clean();
	$content = "<img src='../../../../images/logo.png' width='120' height='50'>
				<hr width='100%'>
				<h2 align='center'>Laporan Transaksi $cb </h2>
				<h4  align='center'>Bulan ke: $bulan &nbsp;&nbsp;&nbsp;&nbsp; Tahun: $tahun</h4>
				<p align='center'>
				<table cellpadding='0' cellspacing='1' style='width: 210mm;' border=0.5>
					<tr bgcolor='#CCCCCC'>
						<th style='width: 20px;'>No</th>
						<th style='width: 180px;'>No.Transaksi</th>
						<th style='width: 180px;'>Tanggal</th>
						<th style='width: 180px'>Dokumen</th>
						<th style='width: 180px'>Nama Pegawai</th>
					</tr>";
					$cbg = $_SESSION['kd_bank'];
					$sql="SELECT a.*,b.*,c.*,d.* from jenis_dokumen a, pegawai b, transaksi c, bank d
									where a.kd_dokumen=c.kd_dokumen and b.nip=c.nip and b.kd_bank=d.kd_bank and YEAR(tgl_transaksi)=$tahun and MONTH(tgl_transaksi)=$bulan and d.kd_bank='$cbg'
									group by no_transaksi order by no_transaksi asc";

					$hasil=mysql_query($sql);
					$i=1;
					while($row=mysql_fetch_array($hasil))
						{
							$content.="<tr bgcolor='#FFFFFF'>
										<td>$i</td>
										<td style='text-transform: uppercase;'>$row[no_transaksi]</td>
										<td style='text-transform: capitalize;'>$row[tgl_transaksi]</td>
										<td>$row[nm_dokumen]</td>
										<td>$row[nm_pegawai]</td>
									</tr>";
							$i++;
						}
	$sql="SELECT a.*,b.*,c.*,d.* from jenis_dokumen a, pegawai b, transaksi c, bank d
				where a.kd_dokumen=c.kd_dokumen and b.nip=c.nip and b.kd_bank=d.kd_bank anYEAR(tgl_transaksi)=$tahun and MONTH(tgl_transaksi)=$bulan
				group by no_transaksi
				order by no_transaksi asc";
	$hasil=mysql_query($sql);
	$i=1;
	while($row=mysql_fetch_array($hasil))
		{
			$content.="<tr bgcolor='#FFFFFF'>
				<td>$i</td>
				<td style='text-transform: uppercase;'>$row[no_transaksi]</td>
				<td style='text-transform: capitalize;'>$row[tgl_transaksi]</td>
				<td>$row[kd_dokumen]</td>
				<td>$row[nip]</td>
				</tr>";
		$i++;
		}
	$content.="</table></p><br><br>";
/*
	//Untuk ngambil nama dari nip
	$nip = $_SESSION['nip'];
	$kd = $_SESSION['kd_bank'];
	include "../../koneksi/koneksi.php";
	$sql = "select a.nip, a.nm_pegawai, b.kd_bank, b.nm_bank from pegawai a, bank b where a.nip='".$nip."' and b.kd_bank='".$kd."' ";
	$query = mysql_query($sql);
	while($data = mysql_fetch_array($query)){
		$nm = $data['nm_pegawai'];
		$cb = $data['nm_bank'];
		$content.="
		<p align='right'>
			$cb, $tgl <br><br>
			<br><br><br><br><br>
			( $nm )
		</p>
		";
	}
	*/
	//Ttd
	$content.="
	<p align='right'>
		$tgl <br><br>
		<img src='../../../../images/ttd.png' height='57' width='70'> <br><br>
		( $nm )
	</p>
	";

	$filename="Transaksi-".$bulan."-".$tahun.".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya

	ob_end_clean();
	// conversion HTML => PDF
	try
	{
		$html2pdf = new HTML2PDF('P', 'A4','en', false, 'ISO-8859-15');
		$html2pdf->setDefaultFont('Arial');
		$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
		$html2pdf->pdf->IncludeJS('print(TRUE)');
		$html2pdf->Output($filename);
	}
	catch(HTML2PDF_exception $e) { echo $e; }
?>
