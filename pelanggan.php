<?php 
  session_start();
  $ses_explode = explode(",", $_SESSION['login']);

  if (!isset($_SESSION["login"])) 
  {
    header("Location: ../reboost/login.php");
  }
  if ($ses_explode[2] == 1) {
    header("Location: ../reboost/admin.php");
  }
  if ($ses_explode[2] == 2) {
    header("Location: ../reboost/kasir.php");
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

    <title>PELANGGAN</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  </head>

  <body>
    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="?menu=default">REBOOST IND</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item d-lg-none active">
              <a class="nav-link" href="?menu=default">Dashboard</a>
            </li>
            <li class="nav-item d-lg-none">
              <a class="nav-link text-white" href="?menu=kategoribuku">Kategori Buku</a>
            </li>
            <li class="nav-item d-lg-none">
              <a class="nav-link text-white" href="?menu=databuku">Data Buku</a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="nav-item active">
              <a class="nav-link" href="#">PELANGGAN  -</a>
            </li>
            <li>
              <a href="menu/logout.php" class="btn btn-danger">Logout</a>
            </li>
          </ul>
          
        </div>
      </nav>
    </header>

    <div class="container-fluid" style="margin-top:50px;">
      <div class="row">
        <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-secondary sidebar" style="position: fixed;height:780px">
          <ul class="nav nav-pills flex-column">
            <br>
            <li class="nav-item">
              <div class="nav-link active bg-dark">Menu</div>
            </li>
            <li class="nav-item active">
              <a class="nav-link text-white" href="?menu=default">Dashboard</a>
            </li>
            <li class="nav-item">
              <div class="nav-link active bg-dark">Buku</div>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="?menu=kategoribuku">Kategori Buku</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="?menu=databuku">Data Buku</a>
            </li>
        </nav>

        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
          <!-- menu aplikasi -->
          <?php
            error_reporting(0);
            switch ($_GET['menu']) {
              case 'kategoribuku':
                include 'menu/kategoribuku.php';
                break;
              case 'databuku':
                include 'menu/databuku.php';
                break;
              case 'editbuku':
                include 'menu/editbuku.php';
                break;
              case 'hapusbuku':
                include 'menu/hapusbuku.php';
                break;
              case 'datapemasukan':
                include 'menu/datapemasukan.php';
                break;
              case 'inputpenjualan':
                include 'menu/inputpenjualan.php';
                break;
              case 'laporanpenjualan':
                include 'menu/laporanpenjualan.php';
                break;
              case 'datapegawai':
                include 'menu/datapegawai.php';
                break;
              case 'hapuspegawai':
                include 'menu/hapususer.php';
                break;
              case 'editpegawai':
                include 'menu/editpegawai.php';
                break;
              case 'datapelanggan':
                include 'menu/datapelanggan.php';
                break;
              case 'datadistributor':
                include 'menu/datadistributor.php';
                break;
              case 'about':
                include 'menu/about.php';
                break;
              case 'help':
                include 'menu/help.php';
                break;
              case 'editprofil':
                include 'menu/editprofil.php';
                break;
              case 'jual':
                include 'menu/jual.php';
                break;
              case 'loadbuku':
                include 'menu/loadbuku.php';
                break;
              default:
                include 'menu/dashboard.php';
                break;
            }
          ?>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap4.min.js"></script>
    <script src="js/index.js"></script>
    <script>
      $('#btn').click(function() {
        $(this).toggleClass('active');
        });
    </script>
  </body>
</html>
