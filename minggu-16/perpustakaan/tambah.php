<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

require 'config.php';

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "<script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'dashboard.php';
          </script>";
    } else {
        echo "<script>
            alert('data gagal ditambahkan!');
            document.location.href = 'dashboard.php';
          </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tambah Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                    <a class="nav-link btn btn-primary" style="color: white; font-weight: bold;"
                        href="tambah.php">tambah buku</a>
                </li>
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" style="font-weight: bold; color: red;" href="logout.php"
                            role="button">Logout</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <center>
        <h3>TAMBAH DATA BUKU</h3>
    </center>

    <div class="container">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Judul Buku</label>
                <input type="text" class="form-control" name="judulbuku" required />
            </div>

            <div class="mb-3">
                <label class="form-label">Pengarang</label>
                <input type="text" class="form-control" name="pengarang" required />
            </div>

            <div class="mb-3">
                <label class="form-label">Penerbit</label>
                <input type="text" class="form-control" name="penerbit" required />
            </div>

            <div class="mb-3">
                <label class="form-label">Tahun Terbit</label>
                <input type="text" class="form-control" name="tahunterbit" required />
            </div>

            <div class="mb-3">
                <label class="form-label" for="cover">cover</label>
                <input type="file" class="form-control" name="cover" required />
            </div>
    </div>

    </div>

    <div class="mb-3">
        <button type="submit" id="submit" name="submit" class="btn btn-primary">
            Tambah Data
        </button>
    </div>
    </form>
    </div>
</body>

</html>