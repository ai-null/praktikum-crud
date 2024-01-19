<?php 
session_start();
 
// Cek apakah user sudah login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

require 'config.php';

$id_buku = $_GET["id"];

// ambil data 
if (kembalikan($id_buku) > 0){
  echo "<script>
          alert('buku berhasil dikembalikan!');
          document.location.href = 'pengembalian.php';
        </script>";
} else {
  echo "<script>
          alert('buku gagal dikembalikan!');
          document.location.href = 'pengembalian.php';
        </script>";
}
?>