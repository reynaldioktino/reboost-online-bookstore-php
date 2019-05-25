<?php 
session_start();
$ses_explode = explode(",", $_SESSION['login']);


include 'functions.php';

if (isset($_POST['tambah_kat'])) {
	$id_kat = $_POST['id_kat'];
	$nama_kat = $_POST['nama_kat'];

	mysqli_query($conn, "INSERT INTO kategori_buku VALUES ('$id_kat','$nama_kat')");
}
$categories = query("SELECT * FROM kategori_buku");
$conn2 = new mysqli("localhost","root","","reboost");
$query = $conn2->query("select id_kat from kategori_buku order by id_kat desc limit 1");
$data = $query->fetch_assoc();
$last = $data["id_kat"];
$lastid = (int) substr($last,-3);
$incre = $lastid+1;
$newid = substr("000".$incre,-3);
$new = "K".$newid;
?>



<div class="container">
	<h1>Kategori Buku</h1><br>
	<div class="row">
            <div class="col-md-8">
            <?php if($ses_explode[2]==1) :  ?>
                <button type="button" class="btn btn-success text-white btn-sm" data-toggle="modal" data-target="#kategoribuku" data-id="<?php echo $book['id_kat'] ?>" data-judul="Tambah Kategori">+ Tambah Kategori</button>
              <?php endif; ?>
            </div>
            <div class="col-md-3">
              <form class="navbar-form navbar-right" action="" method="POST">
                <!-- <input class="form-control mr-sm-2" type="text" placeholder="Masukkan Keyword Pelanggan..." aria-label="Masukkan Keyword Pelanggan..." name="keyword" size="40"> -->
            </div>
            <div class="col-md-1">
                          <!-- <button class="btn btn-outline-success my-2 my-sm-0 btn-block" type="submit" name="cari">Cari</button> -->
              </form>
            </div>
          </div>
          <br>
          <div class="table-responsive">
            <table class="table table-striped table-bordered dt-responsive nowrap" id="example">
              <thead>
                <tr>
                  <td width="40%"><b>ID Kategori</b></td>
                  <td width="45%"><b>Nama Kategori</b></td>
                  <?php if($ses_explode[2]==1) :  ?>
                  <td align="center" width="15%"><b>Aksi</b></td>
                  <?php endif; ?>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($categories as $category) : ?>
                  <tr>
                    <td><?php echo $category["id_kat"]; ?></td>
                    <td><?php echo $category["nama_kat"]; ?></td>
                    <?php if($ses_explode[2]==1) :  ?>
                    <td align="center">
                            <a href="?menu=editkategori&id=<?php echo $category["id_kat"]; ?>" class="btn btn-info btn-sm">Edit</a>
                            <a href="menu/hapuskategori.php?id=<?php echo $category["id_kat"]; ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                    <?php endif; ?>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
</div>

 <div class="modal fade" id="kategoribuku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header btn-success">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">ID Kategori</label>
            <input type="text" class="form-control" readonly="" required="" name="id_kat" id="id_kat" value="<?php echo $new ?>">

          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Nama Kategori</label>
            <input type="text" name="nama_kat" required="" class="form-control" min="0" id="id_kat">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <input type="submit" name="tambah_kat" class="btn btn-primary" value="Tambah">
        </form>
      </div>
    </div>
  </div>
</div>