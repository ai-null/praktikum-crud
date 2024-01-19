<?php 
$dsn = "mysql:host=localhost;dbname=perpustakaan";
$username = "root";
$password = "";

$pdo = new PDO($dsn, $username, $password);

$id_user = $_GET["id"];
$stmt = $pdo->prepare("SELECT * FROM peminjam WHERE id_peminjam = '$id_user'");
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);