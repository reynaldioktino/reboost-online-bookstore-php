<?php 
include 'functions.php';

$id = $_GET["id"];

if (hapususer($id) > 0) 
{
	echo "
		<script>
			alert('data berhasil dihapus');
			document.location.href = '?menu=datapegawai';
		</script>
		";
}
else
{
	echo "
		<script>
			alert('data gagal dihapus');
			document.location.href = '?menu=datapegawai';
		</script>
		";
	echo mysqli_error($conn);
}

?>