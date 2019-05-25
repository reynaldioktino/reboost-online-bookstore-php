<?php  
include '../functions.php';

$id = $_POST['id_distributor'];
if (mysqli_query($conn, "DELETE FROM distributor WHERE id_distributor='$id'")) {
	echo "Berhasil Dihapus";
}
?>