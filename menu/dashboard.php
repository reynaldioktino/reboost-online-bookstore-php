<?php 
session_start();
$ses_explode = explode(",", $_SESSION['login']); 
include 'functions.php';

?>

<h1>Halaman Dashboard</h1><br>
<?php if($ses_explode[2]==1) :  ?>
<div class="container">
    <div class="row">
	    <div class="col-md-4">
	    	<div class="card">
	            <div class="card-header bg-success text-white" style="height: 3rem">
	                <h6 class="text-center">Jumlah Kategori Buku</h6>
	            </div>
	            <div class="card-body">
	                <div class="bg-default">
	                    <h5 class="text-center">
	                    	<?php  
	                    		$qkat = mysqli_query($conn, "SELECT * FROM kategori_buku");
	                    		$jmlkat= mysqli_num_rows($qkat);
	                    		echo $jmlkat;
	                    	?>
	                    </h5>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="col-md-4">
	        <div class="card">
	            <div class="card-header bg-success text-white" style="height: 3rem">
	                <h6 class="text-center">Jumlah Buku</h6>
	            </div>
	            <div class="card-body">
	                <div class="bg-default">
	                    <h5 class="text-center">
	                    	<?php  
	                    		$qbuku = mysqli_query($conn, "SELECT * FROM buku");
	                    		$jmlbuku = mysqli_num_rows($qbuku);
	                    		echo $jmlbuku;
	                    	?>
	                    </h5>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="col-md-4">
	    	<div class="card">
	            <div class="card-header bg-success text-white" style="height: 3rem">
	                <h6 class="text-center">Jumlah Distributor</h6>
	            </div>
	            <div class="card-body">
	                <div class="bg-default">
	                    <h5 class="text-center">
	                    	<?php  
	                    		$qdis = mysqli_query($conn, "SELECT * FROM distributor");
	                    		$jmldis = mysqli_num_rows($qdis);
	                    		echo $jmldis;
	                    	?>
	                    </h5>
	                </div>
	            </div>
	        </div>
	    </div>
    </div>
    <br><br>
    <div class="row">
	    <div class="col-md-4">
	    	<div class="card">
	            <div class="card-header bg-info text-white" style="height: 3rem">
	                <h6 class="text-center">Jumlah Pegawai</h6>
	            </div>
	            <div class="card-body">
	                <div class="bg-default">
	                    <h5 class="text-center">
	                    	<?php  
	                    		$qpeg = mysqli_query($conn, "SELECT * FROM user WHERE level='2'");
	                    		$jmlpeg= mysqli_num_rows($qpeg);
	                    		echo $jmlpeg;
	                    	?>
	                    </h5>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="col-md-4">
	        <div class="card">
	            <div class="card-header bg-info text-white" style="height: 3rem">
	                <h6 class="text-center">Jumlah Pelanggan</h6>
	            </div>
	            <div class="card-body">
	                <div class="bg-default">
	                    <h5 class="text-center">
	                    	<?php  
	                    		$qpel = mysqli_query($conn, "SELECT * FROM user WHERE level='3'");
	                    		$jmlpel = mysqli_num_rows($qpel);
	                    		echo $jmlpel;
	                    	?>
	                    </h5>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="col-md-4">
	    	<div class="card">
	            <div class="card-header bg-info text-white" style="height: 3rem">
	                <h6 class="text-center">Total Penjualan</h6>
	            </div>
	            <div class="card-body">
	                <div class="bg-default">
	                    <h5 class="text-center">
	                    	<?php  
	                    		$qtotj = mysqli_query($conn, "SELECT * FROM penjualan");
	                    		$jmlqtotj = mysqli_num_rows($qtotj);
	                    		echo $jmlqtotj;
	                    	?>
	                    </h5>
	                </div>
	            </div>
	        </div>
	    </div>
    </div>
    <br><br>
    <div class="row">
	    <div class="col-md-4">
	    	<div class="card">
	            <div class="card-header bg-danger text-white" style="height: 3rem">
	                <h6 class="text-center">Total Riwayat Pasok</h6>
	            </div>
	            <div class="card-body">
	                <div class="bg-default">
	                    <h5 class="text-center">
	                    	<?php  
	                    		$qtotp = mysqli_query($conn, "SELECT * FROM pasok");
	                    		$jmlqtotp= mysqli_num_rows($qtotp);
	                    		echo $jmlqtotp;
	                    	?>
	                    </h5>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="col-md-4">
	        <div class="card">
	            <div class="card-header bg-danger text-white" style="height: 3rem">
	                <h6 class="text-center">Jumlah Penjualan Hari Ini</h6>
	            </div>
	            <div class="card-body">
	                <div class="bg-default">
	                    <h5 class="text-center">
	                    	<?php
	                    		$tglj = date('Y-m-d');
	                    		$qjual = mysqli_query($conn, "SELECT * FROM penjualan WHERE tanggal='$tglj'");
	                    		$jmljual = mysqli_num_rows($qjual);
	                    		echo $jmljual;
	                    	?>
	                    </h5>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="col-md-4">
	    	<div class="card">
	            <div class="card-header bg-danger text-white" style="height: 3rem">
	                <h6 class="text-center">Jumlah Pasok hari Ini</h6>
	            </div>
	            <div class="card-body">
	                <div class="bg-default">
	                    <h5 class="text-center">
	                    	<?php  
	                    		$tglp = date('Y-m-d');
	                    		$qpas = mysqli_query($conn, "SELECT * FROM pasok WHERE tanggal='$tglp'");
	                    		$jmlpas = mysqli_num_rows($qpas);
	                    		echo $jmlpas;
	                    	?>
	                    </h5>
	                </div>
	            </div>
	        </div>
	    </div>
    </div>
</div>
<?php endif; ?>