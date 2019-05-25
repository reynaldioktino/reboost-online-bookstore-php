<?php 
session_start();
$ses_explode = explode(",", $_SESSION['login']);

include 'functions.php';

$books = query("SELECT * from buku");

if (isset($_POST["cari"])) 
  {
    $books = caribukupesan($_POST["keyword"]);   
  }

 ?>

<div class="container">
	<h1>Input Penjualan</h1><br>
	<div class="row">
 	<div class="col-sm-4">
 	<form class="navbar-form navbar-right" action="" method="POST">
    	<input class="form-control mr-sm-2" type="text" placeholder="Masukkan Keyword Buku..." aria-label="Masukkan Keyword Buku..." name="keyword" size="40">
    </div>
    <div class="col-md-1">
       <button class="btn btn-outline-success my-2 my-sm-0 btn-block" type="submit" name="cari">Cari</button><br>
    </form>
    </div>
 	 <div class="table-responsive">
 	<table class="table table-striped">
 		<thead>
 			<tr>
 				<td align="center"><b>Judul Buku</b></td>
 				<td align="center"><b>Harga</b></td>
 				<td align="center"><b>Stok</b></td>
 				<td align="center"><b>Aksi</b></td>
 			</tr>
 		</thead>
 		<tbody>
 		<?php $i = 1; ?>
        <?php foreach ($books as $book) : ?>
 			<tr>
 				<td width="20%" align="center"><?php echo $book["judul"]; ?></td>
 				<td width="20%" align="center"><?php echo $book["harga"]; ?></td>
 				<td width="20%" align="center"><?php echo $book["stok"]; ?></td>
 				<td width="20%" align="center"><a href="?menu=inputpenjualan&id=<?php echo $book["id_buku"]; ?>" class="btn btn-warning btn-sm">Pilih</a></td>
 			</tr>
 		<?php $i++; ?>
        <?php endforeach; ?>
 		</tbody>
 	</table>
 </div>
 </div>
</div>