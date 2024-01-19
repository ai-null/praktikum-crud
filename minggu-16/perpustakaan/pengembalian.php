<?php
session_start();
require 'config.php';

if (isset($_POST["submit"])) {
}

if (!isset($_SESSION["login"])) {
    header("Location: logout.php");
    exit;
}

$id_user = $_SESSION["id_user"];
$databuku = query("SELECT * FROM peminjam WHERE id_peminjam='$id_user'");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengembalian</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" href="DataTables/datatables.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="DataTables/datatables.js"></script>
    <style>
        * {
            box-sizing: border-box;
            color: white;
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
            background-color: #212529;
            color: white;
            box-sizing: content-box;
        }

        .navbar {
            background-color: #ffc300;
        }

        .table-primary {
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


    <div class="container">
        <!-- content -->
        <section class="mt-5">
            <div class="content position-relative">
                <div class="row">
                    <h2 class="text-center">
                        <span>
                            DATA PEMINJAMAN BUKU
                        </span>
                    </h2>
                </div>
            </div>
        </section>
        <!-- end content -->

        <!-- searching -->
        <br>
        <div class="container-sm">
            <div class="row">
                <div class="col-6">
                    <a class="btn btn-primary" href="cetak.php" role="button">Cetak laporan</a>
                </div>
            </div>
            <!-- end searching -->

            <!-- table -->
            <h5 class="card-title"> </h5>
            <p class="card-text">
            <table id="example" class="display" style="text-align: center;">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Tgl Pinjam</th>
                        <th scope="col">Tgl Pengembalian</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- membuat nomor -->
                    <?php $i = 1; ?>
                    <!-- menampilkan isi database -->
                    <?php foreach ($databuku as $dataBuku) : ?>
                        <tr>
                            <td scope="col">
                                <?= $i; ?>
                            </td>
                            <td scope="col">
                                <?= $dataBuku["namasiswa"]; ?>
                            </td>
                            <td scope="col">
                                <?= $dataBuku["judulbuku"]; ?>
                            </td>
                            <td scope="col">
                                <?= $dataBuku["tglpinjam"]; ?>
                            </td>
                            <td scope="col">
                                <?= $dataBuku["tglkembali"]; ?>
                            </td>
                            <td scope="col">
                                <?= $dataBuku["status"]; ?>
                            </td>
                            <td scope="col">
                                <a href="hapus.php?id=<?= $dataBuku['id']; ?>" type="button" class="btn btn-danger  btn-sm" style="width: 100px; height: 30px; border-radius: 12px; background-color: #FF5E5E;">Hapus</a>
                                <a href="kembali.php?id=<?= $dataBuku['id']; ?>" type="button" class="btn btn-primary  btn-sm" style="width: 100px; height: 30px; border-radius: 12px; background-color: #87A9FF;">Kembalikan</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        new DataTable('#example');
    </script>
</body>

</html>