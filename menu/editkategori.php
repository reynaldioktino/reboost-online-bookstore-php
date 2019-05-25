<?php  

include 'functions.php';

$id_kat = $_GET['id'];

$kategori = query("SELECT * FROM kategori_buku WHERE id_kat='$id_kat'")[0];

if (isset($_POST['edit'])) {
	$nama = $_POST['nama'];

	if (mysqli_query($conn, "UPDATE kategori_buku SET nama_kat='$nama' WHERE id_kat='$id_kat'")) {
		echo "
			<script>
				alert('data berhasil diubah');
				document.location.href = '?menu=kategoribuku';
			</script>
			";
	} else {
		echo "
			<script>
				alert('data gagal diubah');
				document.location.href = '?menu=kategoribuku';
			</script>
			";
	}
}

?>

<div class="container">
	<h1 class="page-heading">Edit Kategori Buku</h1>
	<div class="row">
		<br>
	<div class="col-md-7">
		<div class="">
			<div class="card mb-3" >
				<div class="card-body">
					<form action="" method="post" enctype="multipart/form-data" class="">
					<div class="form-group row">
						<label for="id_kat" class="col-sm-3 col-form-label">ID Kategori</label>
						<div class="col-sm-9">
							<input type="text" name="id_kat" class="form-control" required="" id="id_kat" value="<?php echo $kategori["id_kat"]; ?>" readonly="">
						</div>
					</div>
					<div class="form-group row">
						<label for="nama" class="col-sm-3 col-form-label">Nama Kategori</label>
						<div class="col-sm-9">
							<input type="text" name="nama" class="form-control" required="" id="nama" value="<?php echo $kategori["nama_kat"]; ?>">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-3"></div>
						<div class="col-sm-9">
							<input type="submit" name="edit" value="Edit" class="btn btn-info">
							<a href="?menu=kategoribuku" class="btn btn-danger" name="kembali">Kembali</a>
						</div>
					</div>
				</form>   
			</div>
		</div>
	</div>
</div>