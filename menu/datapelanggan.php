<?php  
include 'functions.php';

$customers = query("SELECT * FROM user WHERE level=3")

?>

<div class="container">
	<h2>Data Pelanggan</h2><br><br>
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
                <?php foreach ($customers as $customer) : ?>
                  <tr>
                    <td align="center"><?php echo "$i"; ?></td>
                    <td align="center"><?php echo $customer["username"]; ?></td>
                    <td align="center"><?php echo $customer["nama"]; ?></td>
                    <td align="center"><?php echo $customer["email"]; ?></td>
                    <td align="center"><?php echo $customer["nohp"]; ?></td>
                    <td align="center"><?php echo $customer["alamat"]; ?></td>
                    <td align="center"><?php echo $customer["instansi"]; ?></td>
                    <td width="5%" align="center">
                         <div class="btn-group">
                         	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         		Aksi <span class="caret"></span>
                         	</button>
                         	<ul class="dropdown-menu">
                         		<li><a href="?menu=editpelanggan&id=<?php echo $customer["id"]; ?>" class="btn btn-block btn-info btn-sm")">Edit</a></li>
                         		<li><a href="?menu=hapuspelanggan&id=<?php echo $customer["id"]; ?>" class="btn btn-block btn-danger btn-sm">Hapus</a></li>
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
