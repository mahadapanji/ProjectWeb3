<?php


session_start();
if(empty($_SESSION['username']) or empty($_SESSION['id_user']))
{
    echo "<script>
    alert('Login Terlebih dahulu');
    document.location='index.php';
    </script>";
}
$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_user where id_user= '$_SESSION[id_user]' ");
$data = mysqli_fetch_array($tampil);
if ($data) {
    $vadmin = $_SESSION['username'];

}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>e - arsip</title>
     <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
         <div class="container" >
            <a class="navbar-brand" href="#">E - Arsip</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="?">Beranda<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?halaman=departemen">Data Departemen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?halaman=data_pengirim">Data Pengirim Surat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?halaman=arsip">Data Arsip Surat</a>
                </li>
                </ul>
                <h6 class="text-white">Welcome Admin : <?=$vadmin?></h6>
            </div>
          </div>
        </nav>

  </head>
  <body>