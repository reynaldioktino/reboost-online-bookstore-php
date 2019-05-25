<?php  
	include 'functions.php';

	$id = $_GET['id'];

	$book =query("SELECT * FROM buku WHERE id_buku = $id")[0];
	$result = query("SELECT * FROM kategori_buku");

	if (isset($_POST['edit'])) 
{
if (editbuku($_POST) > 0) 
{
echo "
	<script>
		alert('data berhasil diedit');
		document.location.href = '?menu=databuku';
	</script>
	";
}
else
{
echo "
	<script>
		alert('data gagal diedit');
		document.location.href = '?menu=databuku';
	</script>
	";
echo mysqli_error($conn);
}
}
?>
	<br>
	<div class="container">
	<h1 class="page-heading">Edit Data Buku</h1>
	<div class="row">
		<br>
	<div class="col-md-7">
		<div class="">
			<div class="card mb-3" >
				<div class="card-body">
					<form action="" method="post" enctype="multipart/form-data" class="">
							<input type="hidden" name="id" value="<?php echo $book["id_buku"]; ?>">
							<input type="hidden" name="gambarLama" value="<?php echo $book["cover"]; ?>">
					<div class="form-group row">
						<label for="isbn" class="col-sm-3 col-form-label">ISBN</label>
						<div class="col-sm-9">
							<input type="text" name="isbn" class="form-control" required="" id="isbn" value="<?php echo $book["isbn"]; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
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
							<input type="text" name="judul" class="form-control" required="" id="judul" value="<?php echo $book["judul"]; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="pengarang" class="col-sm-3 col-form-label">Pengarang</label>
						<div class="col-sm-9">
							<input type="text" name="pengarang" class="form-control" required="" id="pengarang" value="<?php echo $book["pengarang"]; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="tahun" class="col-sm-3 col-form-label">Tahun</label>
						<div class="col-sm-9">
							<input type="text" name="tahun" class="form-control" required="" id="tahun" value="<?php echo $book["tahun"]; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="harga" class="col-sm-3 col-form-label">Harga</label>
						<div class="col-sm-9">
							<input type="number" name="harga" class="form-control" required="" id="harga" value="<?php echo $book["harga"]; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="file" class="col-sm-3 col-form-label">Cover</label>
						<div class="col-sm-9">
							<img src="img/<?php echo $book["cover"]; ?>" width="10%">
							<label class="custom-file" id="cover">
								<input type="file" class="custom-file-input" name="cover" id="cover">
								<span class="custom-file-control form-control-file"></span>
							</label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-3"></div>
						<div class="col-sm-9">
							<input type="submit" name="edit" value="    Edit" class="btn btn-info">
							<a href="?menu=databuku" class="btn btn-danger" name="kembali">Kembali</a>
						</div>
					</div>
				</form>   
			</div>
		</div>
	</div>
</div>