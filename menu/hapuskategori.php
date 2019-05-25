<?php  

include '../functions.php';

$id_kat = $_GET['id'];

if (mysqli_query($conn, "DELETE FROM kategori_buku WHERE id_kat='$id_kat'")) {
	echo "
		<script>
			alert('data berhasil dihapus');
			document.location.href = '../admin.php?menu=kategoribuku';
		</script>
		";
} else {
	echo mysqli_error($conn);
}

?>