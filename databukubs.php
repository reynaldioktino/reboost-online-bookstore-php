<?php 
  session_start();
  $ses_explode = explode(",", $_SESSION['login']);

  if (!isset($_SESSION["login"])) 
  {
    header("Location: index.php");
  }

  include 'functions.php';

  if(isset($_POST['tambahstok']))
  {
    $id = $_POST['id'];
    $tmbstok = $_POST['tmbstok'];
    $stoklama = $_POST['stoklama'];
    $stok = $tmbstok+$stoklama;
    $query = "update buku set stok = $stok where id_buku=$id";
    $ret = mysqli_query($conn,$query);
  }

  $books = query("SELECT * FROM buku");

  if (isset($_POST["cari"])) 
  {
    $books = caribuku($_POST["keyword"]);   
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>DATA BUKU</title>
    <?php include 'tampilan.php'; ?>
  </head>

  <body class="bg-default">
        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
          <br>
          <h1>Data Buku</h1>
          <div class="row">
            <div class="col-md-8">
              <?php if($ses_explode[2]!=3) :  ?>
                <a href="tambahbuku.php"><button class="btn btn-success">+ Tambah Buku</button></a>
              <?php endif; ?>
            </div>
            <div class="col-md-3">
              <form class="navbar-form navbar-right" action="" method="POST">
                <input class="form-control mr-sm-2" type="text" placeholder="Masukkan Keyword Buku..." aria-label="Masukkan Keyword Buku..." name="keyword" size="40">
            </div>
            <div class="col-md-1">
                          <button class="btn btn-outline-success my-2 my-sm-0 btn-block" type="submit" name="cari">Cari</button>
              </form>
            </div>
          </div>
          <br>
          <?php //var_dump($ses_explode);
   ?>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <td align="center"><b>No.</b></td>
                  <td align="center"><b>Cover Buku</b></td>
                  <td align="center"><b>Kat</b></td>
                  <td align="center"><b>ISBN</b></td>
                  <td align="center"><b>Judul Buku</b></td>
                  <td align="center"><b>Pengarang</b></td>
                  <td align="center"><b>Halaman</b></td>
                  <td align="center"><b>Harga (Rp)</b></td>
                  <td align="center"><b>Stok</b></td>
                  <td align="center"><b>Aksi</b></td>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($books as $book) : ?>
                  <tr>
                    <td width="5%"><?php echo "$i"; ?></td>
                    <td width="15%" align="center"><img src="img/<?php echo $book["cover"]; ?>" width=50%></td>
                    <td width="5%" align="center"><?php echo $book["id_kat"]; ?></td>
                    <td width="15%" align="center"><?php echo $book["isbn"]; ?></td>
                    <td width="20%" align="center"><?php echo $book["judul"]; ?></td>
                    <td width="10%" align="center"><?php echo $book["pengarang"]; ?></td>
                    <td width="10%" align="center"><?php echo $book["halaman"]; ?></td>
                    <td width="10%" align="center"><?php echo $book["harga"]; ?></td>
                    <td width="5%" align="center"><?php echo $book["stok"]; ?></td>
                    <td width="5%" align="center">
                        <?php if($ses_explode[2]!=3) :  ?>
                          <button type="button" class="btn btn-warning btn-sm text-white btn-block" data-toggle="modal" data-target="#exampleModal" data-id="<?php echo $book['id_buku'] ?>" data-stok="<?php echo $book['stok'] ?>" data-judul="<?php echo $book['judul'] ?>">Stok</button>
                            <a href="editbuku.php?id=<?php echo $book["id_buku"]; ?>" class="btn btn-info btn-sm btn-block">Edit</a>
                            <a href="hapusbuku.php?id=<?php echo $book["id_buku"]; ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn btn-danger btn-sm btn-block">Hapus</a>
                        <?php endif; ?>
                    </td>
                  </tr>
                  <?php $i++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>
<!-- 
model -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header btn-warning">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Stok Buku</label>
            <input type="text" class="form-control" readonly="" name="stoklama" id="stokbuku">
            <input type="hidden" name="id" id="id">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Tambah Stok</label>
            <input type="number" name="tmbstok" class="form-control" min="0" id="tmbstok">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <input type="submit" name="tambahstok" class="btn btn-primary" value="Tambah">
        </form>
      </div>
    </div>
  </div>
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>
    $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var recipient = button.data('stok') 
  var judul = button.data('judul')
  var id = button.data('id')
  var modal = $(this)
  modal.find('.modal-title').text('Judul : ' + judul)
  modal.find('#stokbuku').val(recipient)
  modal.find('#id').val(id)
})
  </script>
  </body>
</html>