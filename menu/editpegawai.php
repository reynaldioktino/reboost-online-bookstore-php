<?php  
include 'functions.php';

$id = $_GET['id'];

$employee =query("SELECT * FROM user WHERE id = $id")[0];

if (isset($_POST['edit'])) {
	$username = strtolower(stripcslashes($_POST["username"]));
		$password = mysqli_real_escape_string($conn, $_POST["password"]);
		$kpassword = mysqli_real_escape_string($conn, $_POST["kpassword"]);
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$nohp = $_POST['nohp'];
		$alamat = $_POST['alamat'];
		$instansi = $_POST['instansi'];

		if ($password !== $kpassword) 
		{
			echo "
				<script>
					alert('konfirmasi password tidak sesuai');
					document.location.href = 'admin.php?menu=datapegawai';
				</script>";

			return false;
		}

		$password = password_hash($password, PASSWORD_DEFAULT);

		$query = "UPDATE user SET username='$username', password='$password', nama='$nama', email='$email', nohp='$nohp', alamat='$alamat', instansi='$instansi' WHERE id=$id";

		$edit = mysqli_query($conn, $query);

		if ($edit == true) {
			echo "
				<script>
					alert('Data Berhasil Diedit');
					document.location.href = 'admin.php?menu=datapegawai';
				</script>";
		}else{
			echo "
				<script>
					alert('Data Gagal Diedit');
					document.location.href = 'admin.php?menu=datapegawai';
				</script>";
		}
}

?>
	<br>
	<div class="container">
	<h1 class="page-heading">Edit Pegawai</h1>
	<div class="row">
		<br>
	<div class="col-md-7">
		<div class="">
			<div class="card mb-3" >
				<div class="card-body">
					<form action="" method="post" enctype="multipart/form-data" class="">
							<input type="hidden" name="id" value="<?php echo $employee["id_buku"]; ?>">
					<div class="form-group row">
						<label for="username" class="col-sm-3 col-form-label">username</label>
						<div class="col-sm-9">
							<input type="text" name="username" readonly="" class="form-control" required="" id="username" value="<?php echo $employee["username"]; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="password" class="col-sm-3 col-form-label">password</label>
						<div class="col-sm-9">
							<input type="password" name="password" class="form-control" id="password">
						</div>
					</div>
					<div class="form-group row">
						<label for="kpassword" class="col-sm-3 col-form-label">konfirmasi password</label>
						<div class="col-sm-9">
							<input type="password" name="kpassword" class="form-control" id="kpassword">
						</div>
					</div>
					<div class="form-group row">
						<label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
						<div class="col-sm-9">
							<input type="text" name="nama" class="form-control" required="" id="nama" value="<?php echo $employee["nama"]; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-sm-3 col-form-label">email</label>
						<div class="col-sm-9">
							<input type="email" name="email" class="form-control" required="" id="email" value="<?php echo $employee["email"]; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="nohp" class="col-sm-3 col-form-label">nohp</label>
						<div class="col-sm-9">
							<input type="text" name="nohp" class="form-control" required="" id="nohp" value="<?php echo $employee["nohp"]; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="alamat" class="col-sm-3 col-form-label">alamat</label>
						<div class="col-sm-9">
							<input type="text" name="alamat" class="form-control" required="" id="alamat" value="<?php echo $employee["alamat"]; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="instansi" class="col-sm-3 col-form-label">instansi</label>
						<div class="col-sm-9">
							<input type="text" name="instansi" class="form-control" required="" id="instansi" value="<?php echo $employee["instansi"]; ?>">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-3"></div>
						<div class="col-sm-9">
							<input type="submit" name="edit" value="    Edit" class="btn btn-info">
							<a href="?menu=datapegawai" class="btn btn-danger" name="kembali">Kembali</a>
						</div>
					</div>
				</form>   
			</div>
		</div>
	</div>
</div>