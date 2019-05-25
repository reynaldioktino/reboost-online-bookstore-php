<?php 
session_start();
$ses_explode = explode(",", $_SESSION['login']);

include 'functions.php';

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku='$id'");
$book = mysqli_fetch_array($result);

$array = query("SELECT id_buku FROM keranjang");
$idb = implode(",", $array);

 ?>

<div class="container">
	<h1>Input Penjualan</h1><br>
  <form action="" class="form-inline" method="POST">
    <a href="?menu=loadbuku" class="btn btn-info">Load Buku</a>&nbsp&nbsp
    <input type="text" placeholder="Pilih Buku" readonly="" required="" class="form-control" value="<?php echo $book['judul']; ?>">&nbsp&nbsp
    <input type="number" name="jumlah" class="form-control" required="" placeholder="Jumlah Beli Max <?php echo $book['stok']; ?>" max="<?php echo $book['stok']; ?>">&nbsp&nbsp
    <input type="submit" class="btn btn-primary" name="tambah" value="Tambah Ke Keranjang">
  </form>
  <?php  
    if (isset($_POST['tambah'])) :
      $jumlah = $_POST['jumlah'];
      $jumlah_harga = $book['harga'] * $jumlah;
      mysqli_query($conn, "INSERT INTO keranjang VALUES ('','$id','$jumlah','$jumlah_harga')");
      $updateStok = $book['stok'] - $jumlah;
      mysqli_query($conn, "UPDATE buku SET stok=$updateStok WHERE id_buku=$id");
    ?>
    <br>
    <div class="alert alert-success">
      Berhasil Tambah Keranjang!
    </div>
    <meta http-equiv="refresh" content="1; url='?menu=inputpenjualan'">
  <?php endif; ?>

  <hr>
  <h4>Keranjang Belanja</h4>
  <table class="table table-bordered">
    <tr>
      <th>No.</th>
      <th>Judul Buku</th>
      <th>Harga</th>
      <th>Jumlah Buku</th>
      <th>Jumlah Harga</th>
      <th>Aksi</th>
    </tr>
    <?php 
    $i=1;
    $result2 = mysqli_query($conn, "SELECT b.judul, b.harga, b.stok, k.id_buku, k.id_keranjang, k.jumlah, k.jumlah_harga FROM buku b INNER JOIN keranjang k ON b.id_buku=k.id_buku");
    while ($data = mysqli_fetch_array($result2)) : ?>
    <tr>
      <td><?php echo $i++; ?></td>
      <td><?php echo $data['judul']; ?></td>
      <td><?php echo $data['harga']; ?></td>
      <td><?php echo $data['jumlah']; ?></td>
      <td><?php echo "Rp ".number_format($data['jumlah_harga']) ?></td>
      <td><a class="btn btn-danger btn-sm" href="menu/hapusitemkr.php?id_keranjang=<?php echo $data['id_keranjang']; ?>&id_buku=<?php echo $data['id_buku']; ?>&jumlah=<?php echo $data['jumlah']; ?>">Hapus</a></td>
    </tr>
    <?php endwhile; ?>
    <tr>
      <th colspan="4" class="text-right">Total Harga</th>
      <th>
        <?php  
            $qtotal = mysqli_query($conn, "SELECT SUM(jumlah_harga) as total from keranjang");
            $total = mysqli_fetch_array($qtotal);
            echo "Rp ".number_format($total['total']);
        ?>
          
      </th>
    </tr>
  </table>
  <br>
  <hr>
  <br>
  <div class="row">
    <div class="col-md-4">
      <h1><small>Total Harga</small></h1>
      <h3><b>Rp. <?php echo number_format($total['total']); ?></b></h3>
      <form action="" class="form-inline" method="POST">
        <input type="number" name="uang" placeholder="Masukan Uang Pembeli" class="form-control w-60" min="<?php echo $total['total']; ?>">&nbsp&nbsp
        <input type="submit" class="btn btn-success" value="Proses" name="proses">
      </form>
    </div>
    <div class="col-md-4">
      <?php if (isset($_POST['proses'])) : 
        $uang = $_POST['uang'];
        $kembali = $uang - $total['total'];

        $tanggal = date('Y-m-d');
        mysqli_query($conn, "INSERT INTO penjualan (id_buku, jumlah, jumlah_harga, tanggal) select id_buku, jumlah, jumlah_harga, '$tanggal'  from keranjang");
      ?><br>
        <blockquote>
          <h3>
            <small>- Uang Pembeli</small>
            Rp. <?php echo number_format($uang); ?>
          </h3>
          <h3>
            <small>- Uang Kembali</small>
            Rp. <?php echo number_format($kembali); ?>
          </h3>
        </blockquote>
        </div>
        <div class="col-md-4">
          <br><br>
          <a href="menu/hapuskeranjang.php" class="btn btn-danger btn-sm">Bersihkan Keranjang</a>
        </div>
      <?php endif; ?>
  </div>
</div>