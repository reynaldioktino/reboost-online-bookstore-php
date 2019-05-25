<?php  
include '../functions.php';

mysqli_query($conn, "DELETE FROM keranjang");
header("location: ../admin.php?menu=inputpenjualan");

?>