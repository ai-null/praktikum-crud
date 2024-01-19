<?php
session_start();
require 'config.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pengembalian Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="uts.css">
</head>
  <body>
    <div class="teks">
      <h1 align="center"> DATA PEMINJAMAN BUKU </h1>
    </div>
    <br>

    <table class="table">
        <thead>
          <tr class="table-primary" align="center">
            <th scope="col">No</th>
            <th scope="col">Nama Siswa</th>
            <th scope="col">Kelas</th>
            <th scope="col">Judul Buku</th>
            <th scope="col">Tanggal Pinjam</th>
            <th scope="col">Tanggal Kembali</th>
            <th scope="col">Status</th>
            <!-- <th scope="col">Tarif</th> -->
          </tr>
        <?php
          // persiapan menampilkan data
          $no = 1;
          $id_user = $_SESSION["id_user"];
          $tampil = mysqli_query($conn, "SELECT * FROM peminjam WHERE id_peminjam = $id_user");
          while($dataBuku = mysqli_fetch_array($tampil)):
          ?>
        </thead>
        <tbody>
          <tr>
            <td><?= $no++?></td>
            <td><?=$dataBuku["namasiswa"]?></td>
            <td><?=$dataBuku["kelas"]?></td>
            <td><?=$dataBuku["judulbuku"]?></td>
            <td><?=$dataBuku["tglpinjam"]?></td>
            <td><?=$dataBuku["tglkembali"]?></td>
            <td><?=$dataBuku["status"]?></td>
          </tr>
<?php endwhile;?>
      </table>
    <script>
        window.print();
    </script>
  </body>
</html>