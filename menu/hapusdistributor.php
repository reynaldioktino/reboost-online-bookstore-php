<?php  

include '../functions.php';

$id_distributor = $_GET['id_distributor'];

if (mysqli_query($conn, "DELETE FROM distributor WHERE id_distributor=$id_distributor")) {
	echo "
		<script>
			alert('data berhasil dihapus');
			document.location.href = '../admin.php?menu=datadistributor';
		</script>
		";
} else {
	echo mysqli_error($conn);
}

?>