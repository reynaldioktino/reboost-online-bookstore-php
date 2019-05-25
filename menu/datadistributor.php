<?php  
include 'functions.php';

if (isset($_POST['tambah'])) {
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$email = $_POST['email'];

	if (mysqli_query($conn, "INSERT INTO distributor VALUES ('','$nama','$alamat','$email')")) {
		echo "
			<script>
				alert('data berhasil ditambahkan');
			</script>
			";	
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan');
			</script>
			";	
	}
}

$distributors = query("SELECT * FROM distributor");

?>

<div class="container">
	<h1>Data Distributor</h1>
	<div class="row">
		<div class="col-md-7">
		<div class="">
			<div class="card mb-3" >
				<div class="card-header bg-default"><button class="btn btn-success btn-sm" type="button" data-toggle="collapse" data-target="#tambahDistributor">
						+ Tambah Distributor
					</button></div>
				<div class="card-body collapse" id="tambahDistributor">
					<form action="" method="post" class="">
					<div class="form-group row">
						<label for="nama" class="col-sm-3 col-form-label">Nama</label>
						<div class="col-sm-9">
							<input type="text" name="nama" class="form-control" required="">
						</div>
					</div>
					<div class="form-group row">
						<label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
						<div class="col-sm-9">
							<textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-sm-3 col-form-label">Email</label>
						<div class="col-sm-9">
							<input type="email" name="email" class="form-control" required="">
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
		</div>
		</div>
			</div>
		<div class="col-md-12">
			<br>
			<table class="table table-striped table-bordered dt-responsive nowrap" id="example">
				<thead>
					<tr>
						<th align="center">No.</th>
						<th align="center">Distributor</th>
						<th align="center">Alamat</th>
						<th align="center">Email</th>
						<th align="center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; foreach ($distributors as $distributor) : ?>
					  <tr>
					    <td align="center"><?php echo "$i"; ?></td>
					    <td align="center"><?php echo $distributor["nama"]; ?></td>
					    <td align="center"><?php echo $distributor["alamat"]; ?></td>
					    <td align="center"><?php echo $distributor["email"]; ?></td>

					    <td width="5%" align="center">
					    	<div class="btn-group">
					         	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					         		Aksi <span class="caret"></span>
					         	</button>
					         	<ul class="dropdown-menu">
					         		<li><a class="btn btn-block btn-info btn-sm" href="?menu=editdistributor&id=<?php echo $distributor['id_distributor']; ?>">Edit</a></li>
					         		<li><a class="btn btn-block btn-danger btn-sm" href="menu/hapusdistributor.php?id_distributor=<?php echo $distributor['id_distributor']; ?>" >Hapus</a></li>
					         	</ul>
					        </div>
					    </td>
					  </tr>
					<?php $i++; endforeach; ?>
				</tbody>
			</table>
</div>