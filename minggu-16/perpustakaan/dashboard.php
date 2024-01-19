<?php
session_start();
require 'config.php';

if (!isset($_SESSION["login"])) {
  header("Location: logout.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Perpustakaan</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.css" rel="stylesheet" />
  <style>
    * {
      box-sizing: border-box;
    }

    p {
      color: black;
    }

    a {
      color: black;
    }

    h5 {
      color: black;
    }

    body {
      margin: 0;
      padding: 0;
      background-color: #212529;
      color: white;
      box-sizing: content-box;
    }

    .navbar {
      background-color: #ffc300;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#">PERPUSTAKAAN SEKOLAH</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="dashboard.php">Home</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="pengembalian.php">pengembalian</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link btn btn-primary" style="color: white; font-weight: bold;" href="tambah.php">tambah buku</a>
        </li>
      </ul>
      <div class="form-inline my-2 my-lg-0">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" style="font-weight: bold; color: red;" href="logout.php" role="button">Logout</a>
          </li>
        </ul>

      </div>
    </div>
  </nav>

  <div class="mt-4">
    <h3 class="text-center" style="color: #e5b413">
      <b>selamat datang di perpustakaan</b>
      <small class="text-muted" style="color: #fafafa !important;">sekolah</small>
    </h3>

    <h3 class="text-center">Daftar buku</h3>

    <div class="container">
      <div class="row justify-content-center">
        <?php

        $result = mysqli_query($conn, "SELECT * FROM buku");
        foreach ($result as $data) { ?>
          <div class="col-sm-3 mt-5 card mr-3" style="width: 20rem">
            <img class="card-img-top" src="<?php echo $data["cover"] ?>" alt="Card image cap" />
            <div class="card-body">
              <h5 class="card-title"><?php echo $data["judulbuku"] ?></h5>
              <p class="card-text">
                pengarang : <?php echo $data["pengarang"] ?><br />
                penerbit : <?php echo $data["penerbit"] ?><br />
                tahun terbit : <?php echo $data["tahunterbit"] ?><br />
              </p>
              <form method="post" action="pinjam.php">
                <input type="hidden" name="judulbuku" value="<?php echo $data["judulbuku"] ?>" />
                <button type="submit" class="btn btn-warning">Pinjam</a>
              </form>
            </div>
          </div>

        <?php }; ?>
      </div>
    </div>
  </div>


</body>

</html>