<?php  
include 'functions.php';

$pasok = query("SELECT p.id_pasok, p.jumlah, p.tanggal, b.judul, d.nama FROM pasok p inner join buku b on p.id_buku = b.id_buku inner join distributor d on p.id_distributor=d.id_distributor");

?>

<div class="container">
	<h2>Laporan Pasok Buku</h2><br>
	<div class="col-md-12">
		<a href="menu/printpasok.php" class="btn btn-success">Print Re-Stok Hari Ini</a>
	</div>
	<div class="col-md-12">
		<br>
		<table class="table table-striped table-bordered dt-responsive nowrap" id="example">
			<thead>
				<tr>
					<td align="center"><b>No.</b></td>
					<td align="center"><b>Judul</b></td>
					<td align="center"><b>Distributor</b></td>
					<td align="center"><b>Jumlah</b></td>
					<td align="center"><b>Tanggal</b></td>
				</tr>
			</thead>
			<tbody>
		        <?php $i = 1; foreach ($pasok as $p) : ?>
				<tr>
					<td align="center"><?php echo "$i"; ?></td>
					<td align="center"><?php echo $p['judul']; ?></td>
					<td align="center"><?php echo $p['nama']; ?></td>
					<td align="center"><?php echo $p['jumlah']; ?></td>
					<td align="center"><?php echo $p['tanggal']; ?></td>
				</tr>
				<?php $i++; endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
