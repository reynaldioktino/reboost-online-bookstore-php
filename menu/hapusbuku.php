<?php 
include 'functions.php';

$id = $_GET["id"];

if (hapusbuku($id) > 0) 
{
	echo "
		<script>
			alert('data berhasil dihapus');
			document.location.href = '?menu=databuku';
		</script>
		";
}
else
{
	echo "
		<script>
			alert('data gagal dihapus');
			document.location.href = '?menu=databuku';
		</script>
		";
	echo mysqli_error($conn);
}

?>