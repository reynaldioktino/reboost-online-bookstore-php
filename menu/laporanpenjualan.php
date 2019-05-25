<?php  
include 'functions.php';

$jual = query("SELECT b.judul, b.harga, p.jumlah, p.jumlah_harga, p.tanggal FROM buku b INNER JOIN penjualan p on b.id_buku=p.id_buku ORDER BY p.tanggal DESC")

?>

<div class="container">
	<h2>Laporan Penjualan</h2><br>
	<div class="col-md-12">
		<a href="menu/printjual.php" class="btn btn-success">Print Penjualan Hari Ini</a>
	</div>
	<div class="col-md-12">
		<br>
		<table class="table table-striped table-bordered" id="example">
			<thead>
				<tr>
					<td align="center"><b>No.</b></td>
					<td align="center"><b>Judul</b></td>
					<td align="center"><b>Harga</b></td>
					<td align="center"><b>Jumlah</b></td>
					<td align="center"><b>Total Harga</b></td>
					<td align="center"><b>Tanggal</b></td>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1; ?>
		        <?php foreach ($jual as $j) : ?>
				<tr>
					<td align="center"><?php echo "$i"; ?></td>
					<td align="center"><?php echo $j['judul']; ?></td>
					<td align="center"><?php echo $j['harga']; ?></td>
					<td align="center"><?php echo $j['jumlah']; ?></td>
					<td align="center"><?php echo $j['jumlah_harga']; ?></td>
					<td align="center"><?php echo $j['tanggal']; ?></td>
				</tr>
				<?php $i++; ?>
		       <?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>