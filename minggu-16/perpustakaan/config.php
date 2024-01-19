<?php

$conn = mysqli_connect("localhost", "root","","perpustakaan");

// ambil data
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}   

// tambah data
function ubah($judulbuku) {
    global $conn;
    $id_peminjam = $_SESSION["id_user"];
    
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id_user = $id_peminjam");
    $row = mysqli_fetch_array($result);

    $nama = $row["nama"];
    $nama = $row["nama"];
    $kelas = $row["kelas"];
    $date = date("Y-m-d H:i");

    $query = "INSERT INTO peminjam VALUES (null, '$id_peminjam', '$nama', '$kelas', '$judulbuku', 'Dipinjam', '$date', '-')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function kembalikan($idpinjaman) {
    global $conn;

    $date = date("Y-m-d H:i");
    $query = "UPDATE peminjam SET tglkembali = '$date', status = 'dikembalikan' WHERE id = $idpinjaman";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// hapus data
function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM peminjam WHERE id = $id");
    return mysqli_affected_rows($conn);
}

// ubah data
function tambah($data) {
    global $conn;
    $judulbuku = $_POST["judulbuku"];
    $nama = $_POST["pengarang"];
    $penerbit = $_POST["penerbit"];
    $tahunterbit = $_POST["tahunterbit"];
    $cover = $_FILES["cover"]["name"];

    $m ="uploads/".$_FILES['cover']['name'];

    move_uploaded_file($_FILES['cover']['tmp_name'], $_FILES['cover']['name']);
    
    $query = "INSERT INTO buku VALUES (null,'$judulbuku', '$nama', '$penerbit', '$tahunterbit', '$cover')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>