<?php  
include '../functions.php';
$tgl = date('Y-m-d');
$jual = query("SELECT b.judul, b.harga, p.jumlah, p.jumlah_harga, p.tanggal FROM buku b INNER JOIN penjualan p on b.id_buku=p.id_buku WHERE p.tanggal = '$tgl' ORDER BY p.tanggal DESC");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laporan Penjualan</title>
</head>
<body onload="window.print()">
	<h2 align="center"><b><u>LAPORAN JUAL BUKU</u></b></h2>
	<h5 align="center">( <?php echo date('Y-m-d'); ?> )</h5>
	<table align="center" border="1" width="90%">
		<tr>
			<th>No.</th>
			<th>Judul</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Total Harga</th>
			<th>Tanggal</th>
		</tr>
		<?php if (mysqli_affected_rows($conn) > 0) {
        $i = 1; foreach ($jual as $j) { ?>
		<tr>
			<td align="center"><?php echo "$i"; ?></td>
			<td align="center"><?php echo $j['judul']; ?></td>
			<td align="center"><?php echo $j['harga']; ?></td>
			<td align="center"><?php echo $j['jumlah']; ?></td>
			<td align="center"><?php echo $j['jumlah_harga']; ?></td>
			<td align="center"><?php echo $j['tanggal']; ?></td>
		</tr>
		<?php $i++; }
		} else { ?>
			<tr>
				<td align="center" colspan="6"><br>Tidak ada penjualan hari ini</td>
			</tr>
       <?php } ?>
	</table>
</body>
</html>