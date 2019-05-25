<?php 
	$conn = mysqli_connect("localhost","root","","reboost");

	function query($query)
	{
		global $conn;
		$result = mysqli_query($conn, $query);
		$rows = [];
		while ($row = mysqli_fetch_assoc($result)) 
		{
			$rows[] = $row;
		}
		return $rows;
	}

	function tambahbuku($data)
	{
		global $conn;
		
		$id_kat = htmlspecialchars($data["kategori"]);
		$isbn = htmlspecialchars($data["isbn"]);
		$judul = htmlspecialchars($data["judul"]);
		$pengarang = htmlspecialchars($data["pengarang"]);
		$tahun = htmlspecialchars($data["tahun"]);
		$harga =htmlspecialchars($data["harga"]);
		//upload gambar
		$cover = uploadcover();
		if (!$cover) 
		{
			return false;
		}

		$query = "INSERT INTO buku VALUES ('', '$id_kat', '$cover', '$isbn', '$judul', '$pengarang', '$tahun', $harga, '')";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

	function uploadcover()
	{
		$namaFile = $_FILES['cover']['name'];
		$ukuranFile = $_FILES['cover']['size'];
		$error = $_FILES['cover']['error'];
		$tmpName = $_FILES['cover']['tmp_name'];

		//cek apakah ada gambar di upload (error 4)
		if ($error === 4) 
		{
			echo "Tidak ada gambar yang di upload<br>";
			echo "Pilih Gambar Terlebih Dahulu";
			return false;
		}

		//cek apakah yang diupload gambar
		$ekstensiGambarValid = ['jpg','jpeg','png'];
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));
		if (!in_array($ekstensiGambar, $ekstensiGambarValid)) 
		{
		 	echo "Yang anda upload bukan gambar!";
		 	return false;
		}

		//cek ukuran gambar tidak melebihi 1MB
		if ($ukuranFile > 1000000) 
		{
			echo "Ukuran Gambar Melebihi 1MB";
			return false;
		}

		//lolos pengecekan, gambar siap upload ->

		//agar tidak  ada nama file sama ($namaFileBaru)
		$namaFileBaru = uniqid().'.'.$ekstensiGambar;

		move_uploaded_file($tmpName, 'img/'.$namaFileBaru);

		return $namaFileBaru;
	}

	function hapusbuku($id)
	{
		global $conn;
		mysqli_query($conn, "DELETE FROM buku WHERE id_buku = $id");
		return mysqli_affected_rows($conn);
	}

	function editbuku($data)
	{
		global $conn;

		$id = $data["id"];
		$id_kat = htmlspecialchars($data["kategori"]);
		$isbn = htmlspecialchars($data["isbn"]);
		$judul = htmlspecialchars($data["judul"]);
		$pengarang = htmlspecialchars($data["pengarang"]);
		$tahun = htmlspecialchars($data["tahun"]);
		$harga = htmlspecialchars($data["harga"]);
		$gambarLama = htmlspecialchars($data["gambarLama"]);

		//cek apakah user sudah pilih gambar atau belum
		if ($_FILES["cover"]["error"] === 4) 
		{
			$cover = $gambarLama;
		}
		else
		{
			$cover = uploadcover();
		}

		$query = "UPDATE buku SET
					id_kat = '$id_kat',
					cover = '$cover',
					isbn = '$isbn',
					judul = '$judul',
					pengarang = '$pengarang',
					tahun = '$tahun',
					harga = $harga
					WHERE id_buku = $id";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

	function caribuku($keyword)
	{
		global $conn;
		$query = "SELECT * FROM buku
					WHERE
					judul LIKE '%$keyword%' OR
					pengarang LIKE '%$keyword%' OR
					harga LIKE '%$keyword%'
					";
		//me-return fungsi query
		return query($query);
	}

	function caribukupesan($keyword)
	{
		global $conn;
		$query = "SELECT * FROM buku
					WHERE
					judul LIKE '%$keyword%'";
		//me-return fungsi query
		return query($query);
	}

	function registrasipelanggan($data)
	{
		global $conn;
		$username = strtolower(stripcslashes($data["username"]));
		$password = mysqli_real_escape_string($conn, $data["password"]);
		$password2 = mysqli_real_escape_string($conn, $data["password2"]);
		$nama = $data["nama"];
		$email = $data["email"];
		$nohp = $data["nohp"];
		$alamat = $data["alamat"];
		$instansi = $data["instansi"];

		//cek apakah username sudah terdaftar atau belum
		$result = mysqli_query($conn, "SELECT username FROM user WHERE username='$username'");
		if (mysqli_fetch_assoc($result)) 
		{
			echo "
				<script>
					alert('Username sudah terdaftar');
				</script>";
			return false;
		}

		//cek konfirmasi passwor
		if ($password !== $password2) 
		{
			echo "
				<script>
					alert('konfirmasi password tidak sesuai');
				</script>";

			return false;
		}

		//enkripsi password
		$password = password_hash($password, PASSWORD_DEFAULT);

		//tambahkan user ke database
		mysqli_query($conn, "INSERT INTO user VALUES ('','$username','$password','3','$nama','$email','$nohp','$alamat','$instansi')");

		return mysqli_affected_rows($conn);
	}

	function hapususer($id)
	{
		global $conn;
		mysqli_query($conn, "DELETE FROM user WHERE id = $id");
		return mysqli_affected_rows($conn);
	}

 ?>