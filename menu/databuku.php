<?php 
session_start();
$ses_explode = explode(",", $_SESSION['login']);
include 'functions.php';

if (isset($_POST['tambah'])) {
	if (tambahbuku($_POST) > 0) 
	{
		echo "
			<script>
				alert('data berhasil ditambahkan');
			</script>
			";
	}
	else
	{
		echo "Data Gagal Ditambahkan<br>";
		echo mysqli_error($conn);
	}
}

$books = query("SELECT * FROM buku");
$result = query("SELECT * FROM kategori_buku");
 ?>

<div class="container">
	<h1 class="page-heading">Data Buku</h1>
	<div class="row">
		<br>
			<div class="col-md-7">
			<div class="">
			<?php if($ses_explode[2]==1) :  ?>
			<div class="card mb-3" >
				<div class="card-header bg-default"><button class="btn btn-success btn-sm" type="button" data-toggle="collapse" data-target="#tambahKaryawan">
						+ Tambah Buku
					</button></div>
				<div class="card-body collapse" id="tambahKaryawan">
					<form action="" method="post" enctype="multipart/form-data" class="">
					<div class="form-group row">
						<label for="isbn" class="col-sm-3 col-form-label">ISBN</label>
						<div class="col-sm-9">
							<input type="text" name="isbn" class="form-control" required="" id="isbn">
						</div>
					</div>
					<div class="form-group row">
						<label for="alamat" class="col-sm-3 col-form-label">Kategori</label>
						<div class="col-sm-9">
							<select name="kategori" class="form-control">
								<?php foreach ($result as $row) : ?>
									<option value="<?php echo $row['id_kat']; ?>"><?php echo $row['nama_kat']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="judul" class="col-sm-3 col-form-label">Judul Buku</label>
						<div class="col-sm-9">
							<input type="text" name="judul" class="form-control" required="" id="judul">
						</div>
					</div>
					<div class="form-group row">
						<label for="pengarang" class="col-sm-3 col-form-label">Pengarang</label>
						<div class="col-sm-9">
							<input type="text" name="pengarang" class="form-control" required="" id="pengarang">
						</div>
					</div>
					<div class="form-group row">
						<label for="tahun" class="col-sm-3 col-form-label">Tahun</label>
						<div class="col-sm-9">
							<input type="text" name="tahun" class="form-control" required="" id="tahun">
						</div>
					</div>
					<div class="form-group row">
						<label for="harga" class="col-sm-3 col-form-label">Harga</label>
						<div class="col-sm-9">
							<input type="number" name="harga" class="form-control" required="" id="harga">
						</div>
					</div>
					<div class="form-group row">
						<label for="file" class="col-sm-3 col-form-label">Cover</label>
						<div class="col-sm-9">
							<label class="custom-file" id="cover">
								<input type="file" required="" class="custom-file-input" name="cover" id="cover">
								<span class="custom-file-control form-control-file"></span>
							</label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-3"></div>
						<div class="col-sm-9">
							<input type="submit" name="tambah" value="Tambah" class="btn btn-info">
						</div>
					</div>
				</form>   
			</div>
		<?php endif; ?>
		</div>
	</div>

	<div class="col-md-12">
		<table class="table table-striped table-bordered dt-responsive nowrap" id="example">
			<thead>
				<tr>
				  <td align="center" data-priority="1"><b>No.</b></td>
	              <td align="center" data-priority="8"><b>Cover Buku</b></td>
	              <td align="center"><b>Kat</b></td>
	              <td align="center" data-priority="3"><b>ISBN</b></td>
	              <td align="center" data-priority="2"><b>Judul Buku</b></td>
	              <td align="center" data-priority="4"><b>Pengarang</b></td>
	              <td align="center"><b>Tahun</b></td>
	              <td align="center" data-priority="5"><b>Harga (Rp)</b></td>
	              <td align="center" data-priority="6"><b>Stok</b></td>
	              <?php if($ses_explode[2]==1) :  ?>
	              <td align="center" data-priority="7"><b>Aksi</b></td>
	          	  <?php endif; ?>
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
	                <td width="10%" align="center"><?php echo $book["tahun"]; ?></td>
	                <td width="10%" align="center"><?php echo $book["harga"]; ?></td>
	                <td width="5%" align="center"><?php echo $book["stok"]; ?></td>
	                <?php if($ses_explode[2]==1) :  ?>
	                <td width="5%" align="center">
	                      <a name="pasok" href="?menu=pasok&id=<?php echo $book["id_buku"]; ?>" class="btn btn-warning btn-sm btn-block">Pasok</a>
	                      <a name="edit" href="?menu=editbuku&id=<?php echo $book["id_buku"]; ?>" class="btn btn-info btn-sm btn-block">Edit</a>
	                       <a name="hapus" onclick="return confirm('Yakin Ingin Menghapus Data?')" href="?menu=hapusbuku&id=<?php echo $book["id_buku"]; ?>" class="btn btn-danger btn-sm btn-block">Hapus</a>
	                </td>
	                <?php endif; ?>
	              </tr>
	              <?php $i++; ?>
	            <?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
</div>