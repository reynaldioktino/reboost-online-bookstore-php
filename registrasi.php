<?php 

include 'functions.php';
if (isset($_POST['register'])) 
{
	if (registrasipelanggan($_POST) > 0) 
	{
		echo "
			<script>
				alert('Anda Berhasil Registrasi');
			</script>";
	}
	else
	{
		echo mysqli_error($conn);
	}
}

 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>LOGIN</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
  </head>
  <body>
    <div class="container">
        <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10" style="top:10rem;">
            <div class="card">
                <div class="card-header bg-dark text-white" style="height: 5rem">
                	<h5 class="text-center">Registrasi Pelanggan</h5>
                    <h5 class="text-center">REBOOST IND</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST" class="form-group">
                    	<div class="row">
                    		<div class="col-md-6">
                    			<div class="input-group">
		                            <input type="text" class="form-control" placeholder="Username" name="username" required="">
		                        </div>
		                        <br>
		                        <div class="input-group">
		                            <input type="password" class="form-control" placeholder="Password" name="password" required="">
		                        </div>
		                        <br>
		                        <div class="input-group">
		                            <input type="password" class="form-control" placeholder="Konfirmasi Password" name="password2" required="">
		                        </div>
		                        <br>
		                        <div class="input-group">
		                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" required="">
		                        </div>
		                        <br>
		                        <div class="input-group">
		                            <input type="email" class="form-control" placeholder="Email" name="email" required="">
		                        </div>
		                        <br>
		                    </div>
                    		<div class="col-md-6">
	                			<div class="input-group">
		                            <input type="text" class="form-control" placeholder="Nomor Hp" name="nohp" required="">
		                        </div>
		                        <br>
		                        <div class="input-group">
		                            <textarea name="alamat" id="" cols="30" class="form-control" rows="4" placeholder="Alamat"></textarea>
		                        </div>
		                        <br>
		                        <div class="input-group">
		                            <input type="text" class="form-control" placeholder="Instansi" name="instansi" required="">
		                        </div>
		                        <br>
		                        <input type="submit" class="btn btn-info btn-block btn-sm" value="Register" name="register">
                    		</div>
                    	</div>
                    </form>
                    <a href="login.php" class="btn btn-default btn-sm btn-block" name="login">Kembali</a>
            </div>
        </div>
        <div class="col-md-1"></div>
        </div>
    </div>

    <form action="">    
    </form>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/jquery/jquery.min.js"></script>
  </body>
</html>