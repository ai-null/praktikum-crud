<?php 
session_start();
 
// Cek apakah user sudah login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

require 'config.php';

echo $_POST["judulbuku"];

// ambil data 
if(isset($_POST["judulbuku"])) {
  if (ubah($_POST["judulbuku"]) > 0){
    echo "<script>
            alert('buku berhasil dipinjam!');
            document.location.href = 'dashboard.php';
          </script>";
  } else {
    echo "<script>
            alert('buku gagal dipinjam!');
            document.location.href = 'dashboard.php';
          </script>";
  }
}