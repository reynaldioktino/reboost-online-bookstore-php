<?php  
include 'functions.php';

$id_buku = $_GET['id'];

$result1 = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku=$id_buku");
$buku = mysqli_fetch_assoc($result1);
$distributor = query("SELECT * FROM distributor");

if (isset($_POST['pasok'])) {
	$id_distributor = $_POST['distributor'];
	$jumlah = $_POST['jumlah'];
	$tanggal = $_POST['tanggal'];
	$updateStok = $buku['stok'] + $jumlah;

	if (mysqli_query($conn, "INSERT INTO pasok VALUES('','$id_buku','$id_distributor','$jumlah','$tanggal')")) {
		mysqli_query($conn, "UPDATE buku SET stok=$updateStok WHERE id_buku=$id_buku");
	 	echo "
			<script>
				alert('stok berhasil diupdate');
				document.location.href = '?menu=databuku';
			</script>
			";
	 } else {
	 	echo mysqli_error($conn);
	 }
}

?>

<div class="container">
	<h1>Tambah Pasok Buku</h1><br>
	<div class="col-md-4">
		<form action="" method="POST">
		<input type="text" name="judul" class="form-control" readonly="" value="<?php echo $buku['judul']; ?>"><br>
		<select name="distributor" id="" required="" class="form-control">
			<option value="">=====PILIH DISTRIBUTOR=====</option>
			<?php foreach ($distributor as $d) { ?>
			<option value="<?php echo $d['id_distributor'] ?>"><?php echo $d['nama']; ?></option>
			<?php } ?>
		</select><br>
		<input type="number" name="jumlah" required="" class="form-control" placeholder="Jumlah Pasok" min="0"><br>
		<input type="date" name="tanggal" required="" class="form-control" placeholder="Tanggal Pasok"><br>
		<input type="submit" name="pasok" class="btn btn-info btn-block" value="Pasok"><br>
	</form>
	<a href="?menu=databuku" class="btn btn-warning btn-block">Kembali</a>
	</div>
</div>