<?php  
	include 'functions.php';

	$emlployes = query("SELECT * FROM user WHERE level=2");
?>

<div class="container">
	<h1>Data Pegawai</h1>
	<br>
	<div class="row">
		<div class="col-md-3">
			<button type="submit" class="btn btn-sm btn-success" data-toggle="modal" data-target="#dataPegawai" id="addMemberModalBtn">+ Tambah Pegawai</button>
		</div>
		<div class="col-md-12">
			<br>
		<table class="table table-striped table-bordered dt-responsive nowrap" id="example">
			<thead>
				<tr>
					<td align="center"><b>No.</b></td>
					<td align="center"><b>Username</b></td>
					<td align="center"><b>Nama</b></td>
					<td align="center"><b>Email</b></td>
					<td align="center"><b>No. Hp</b></td>
					<td align="center"><b>Alamat</b></td>
					<td align="center"><b>Instansi</b></td>
					<td align="center"><b>Aksi</b></td>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1; ?>
                <?php foreach ($emlployes as $employee) : ?>
                  <tr>
                    <td align="center"><?php echo "$i"; ?></td>
                    <td align="center"><?php echo $employee["username"]; ?></td>
                    <td align="center"><?php echo $employee["nama"]; ?></td>
                    <td align="center"><?php echo $employee["email"]; ?></td>
                    <td align="center"><?php echo $employee["nohp"]; ?></td>
                    <td align="center"><?php echo $employee["alamat"]; ?></td>
                    <td align="center"><?php echo $employee["instansi"]; ?></td>
                    <td width="5%" align="center">
                         <div class="btn-group">
                         	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         		Aksi <span class="caret"></span>
                         	</button>
                         	<ul class="dropdown-menu">
                         		<li><a href="?menu=editpegawai&id=<?php echo $employee["id"]; ?>" class="btn btn-block btn-info btn-sm")">Edit</a></li>
                         		<li><a href="?menu=hapuspegawai&id=<?php echo $employee["id"]; ?>" class="btn btn-block btn-danger btn-sm">Hapus</a></li>
                         	</ul>
                         </div>
                    </td>
                  </tr>
                  <?php $i++; ?>
                <?php endforeach; ?>
			</tbody>
		</table>
	</div>
	</div>
</div>

<div class="modal fade" id="dataPegawai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header btn-success">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="menu/pegawaitambah.php" method="post" id="createMemberForm">
          <div class="form-group">
            <input type="text" class="form-control" required="" name="username" id="username" placeholder="Username">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" required="" id="Password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" required="" id="kpassword" name="kpassword" placeholder="Konfirmasi Password">
        </div>
          <div class="form-group">
            <input type="text" class="form-control" required="" name="nama" id="nama" placeholder="Nama Lengkap">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" required="" name="email" id="email" placeholder="Email">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" required="" name="nohp" id="nohp" placeholder="Nomor HP">
          </div>
          <div class="form-group">
            <textarea name="alamat" id="alamat" required="" cols="30" rows="3" class="form-control" placeholder="Alamat Lengkap"></textarea>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" required="" name="instansi" id="instansi" placeholder="Instansi">
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <input type="submit" name="tambahpeg" class="btn btn-primary" value="Tambah">
        </form>
      </div>
    </div>
  </div>
</div>