<?php  
include 'functions.php';

$id_distributor = $_GET['id'];

$distributor = query("SELECT * FROM distributor WHERE id_distributor=$id_distributor")[0];

if (isset($_POST['edit'])) {
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$email = $_POST['email'];

	if (mysqli_query($conn, "UPDATE distributor SET nama='$nama', alamat='$alamat', email='$email' WHERE id_distributor=$id_distributor")) {
		echo "
			<script>
				alert('data berhasil diubah');
				document.location.href = '?menu=datadistributor';
			</script>
			";
	} else {
		echo "
			<script>
				alert('data gagal diubah');
				document.location.href = '?menu=datadistributor';
			</script>
			";
	}
}

?>

<div class="container">
	<h1 class="page-heading">Edit Data Distributor</h1>
	<div class="row">
		<br>
	<div class="col-md-7">
		<div class="">
			<div class="card mb-3" >
				<div class="card-body">
					<form action="" method="post" class="">
							<input type="hidden" name="id" value="<?php echo $distributor["id_distributor"]; ?>">
					<div class="form-group row">
						<label for="nama" class="col-sm-3 col-form-label">Nama</label>
						<div class="col-sm-9">
							<input type="text" name="nama" class="form-control" required="" id="nama" value="<?php echo $distributor["nama"]; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
						<div class="col-sm-9">
							<input type="text" name="alamat" class="form-control" required="" id="alamat" value="<?php echo $distributor["alamat"]; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-sm-3 col-form-label">Email</label>
						<div class="col-sm-9">
							<input type="email" name="email" class="form-control" required="" id="email" value="<?php echo $distributor["email"]; ?>">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-3"></div>
						<div class="col-sm-9">
							<input type="submit" name="edit" value="Edit" class="btn btn-info">
							<a href="?menu=datadistributor" class="btn btn-danger" name="kembali">Kembali</a>
						</div>
					</div>
				</form>   
			</div>
		</div>
	</div>
</div>