<?php  
	include '../functions.php';

	if ($_POST) {
		$username = strtolower(stripcslashes($_POST["username"]));
		$password = mysqli_real_escape_string($conn, $_POST["password"]);
		$kpassword = mysqli_real_escape_string($conn, $_POST["kpassword"]);
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$nohp = $_POST['nohp'];
		$alamat = $_POST['alamat'];
		$instansi = $_POST['instansi'];

		$result = mysqli_query($conn, "SELECT username FROM user WHERE username='$username'");
		if (mysqli_fetch_assoc($result)) 
		{
			echo "
				<script>
					alert('Username sudah terdaftar');
					document.location.href = '../admin.php?menu=datapegawai';
				</script>";
			return false;
		}

		if ($password !== $kpassword) 
		{
			echo "
				<script>
					alert('konfirmasi password tidak sesuai');
					document.location.href = '../admin.php?menu=datapegawai';
				</script>";

			return false;
		}

		$password = password_hash($password, PASSWORD_DEFAULT);

		$tambah = mysqli_query($conn, "INSERT INTO user VALUES ('','$username','$password','2','$nama','$email','$nohp','$alamat','$instansi')");

		if ($tambah == true) {
			echo "
				<script>
					alert('Data Berhasil Ditambahkan');
					document.location.href = '../admin.php?menu=datapegawai';
				</script>";
		}else{
			echo "ERROR";
		}
	}

?>