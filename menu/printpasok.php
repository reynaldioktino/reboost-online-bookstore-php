<?php  
include '../functions.php';

$tgl = date('Y-m-d');
$pasok = query("SELECT p.id_pasok, p.jumlah, p.tanggal, b.judul, d.nama FROM pasok p inner join buku b on p.id_buku = b.id_buku inner join distributor d on p.id_distributor=d.id_distributor WHERE p.tanggal = '$tgl' ORDER BY p.tanggal DESC");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Data Pasok</title>
</head>
<body onload="window.print()">
	<h2 align="center"><b><u>LAPORAN PASOK BUKU</u></b></h2>
	<h5 align="center">( <?php echo date('Y-m-d'); ?> )</h5>
	<table align="center" border="1" width="90%">
		<tr>
			<th>No.</th>
			<th>Judul</th>
			<th>Distributor</th>
			<th>Jumlah</th>
			<th>Tanggal</th>
		</tr>
		<?php if (mysqli_affected_rows($conn) > 0) : ?>
	    <?php $i = 1; foreach ($pasok as $p) : ?>
		<tr>
			<td align="center"><?php echo "$i"; ?></td>
			<td align="center"><?php echo $p['judul']; ?></td>
			<td align="center"><?php echo $p['nama']; ?></td>
			<td align="center"><?php echo $p['jumlah']; ?></td>
			<td align="center"><?php echo $p['tanggal']; ?></td>
		</tr>
		<?php $i++; endforeach; ?>
	   <?php else : ?>
	   		<tr>
				<td align="center" colspan="6"><br>Tidak ada Re-Stok hari ini</td>
			</tr>
	   <?php endif; ?>
	</table>
</body>
</html>