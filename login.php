<?php 
session_start();
include 'functions.php';

//cek cookie
if (isset($_COOKIE['key']))
{
    $cook = explode(',', $_COOKIE['key']);
    $id = $cook[0];
    $kusername= $cook[1];
    $level = $cook[2];

    //ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id=$id");
    $row = mysqli_fetch_assoc($result);

    $_SESSION["login"] = $_COOKIE['key'];
}

if (isset($_SESSION["login"])) 
{
   header("location: admin.php");
}

if (isset($_POST["login"])) 
{
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    //cek username
    if (mysqli_num_rows($result) === 1) 
    {
        //cek password_verify
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"]))
        {
            //cek sessiom

            $array = array($row['id'], $row['username'],$row['level']);
            $cook = implode(",", $array);
            $_SESSION["login"] = $cook;

            //cek remember
            if (isset($_POST['remember'])) 
            {
                //buat cookie
                setcookie('key', $cook, time()+60*60*24);
            }

            $session = explode(",", $_SESSION['login']);
            if($session[2] == 1)
                header("location:admin.php");
            else if($session[2] == 2)
                header("location:kasir.php");
            else if ($session[2] == 3) {
                header("location:pelanggan.php");
            }
            exit;
        }
    }

    $error = true;
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
        <div class="col-md-4"></div>
        <div class="col-md-4" style="top:10rem;">
            <div class="card">
                <div class="card-header bg-dark text-white" style="height: 7rem">
                    <h4 class="text-center">REBOOST IND</h4>
                    <h5 class="text-center">Login System</h5>
                    <p class="text-center">Jln. Kesumba No. 19</p>
                </div>
                <div class="card-body">
                    <div class="bg-default">
                        <?php if(isset($error)) : ?>
                            <p style="color: red; font-style: italic;">Username atau password salah</p>
                        <?php endif; ?>
                    </div>
                        </tr>
                    <form action="" method="POST" class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon" id="addon1">U</span>
                            <input type="text" class="form-control" placeholder="Username" name="username" aria-describedby="addon1" required="">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon" id="addon1">P</span>
                            <input type="password" class="form-control" placeholder="Password" name="password" aria-describedby="addon1" required="">
                        </div>
                        <br>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="remember" class="form-check-input" value="true"><p>Remember me</p>
                            </label>
                        </div>
                        <input type="submit" class="btn btn-primary btn-block btn-sm" value="Login" name="login">
                    </form>
                    <a href="index.php" class="btn btn-danger btn-block btn-sm">Kembali</a>
                    <a href="registrasi.php" class="btn btn-default btn-sm btn-block" name="register">Don't have account? Sign Up Here</a>
            </div>
        </div>
        <div class="col-md-4"></div>
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