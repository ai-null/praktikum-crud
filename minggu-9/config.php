<?php

$conn = mysqli_connect("localhost", "root", "", "web_crud");

?>

<?php

// ambil data
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// tambah data
// error = 0
// success = 1
function tambahUser()
{
    global $conn;

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = 0;
    $check = query("SELECT * FROM user WHERE username = '$username'");
    if (count($check) == 0) { // no account with same username is found
        $query = "INSERT INTO user VALUES (null, '$username', '$password')";
        mysqli_query($conn, $query);
        
        $result = mysqli_affected_rows($conn);
    } else {
        $result = 0;
    }

    return $result;
}

// tambah data
function tambah()
{
    global $conn;

    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $kota = $_POST["kota"];
    $provinsi = $_POST["provinsi"];
    $kodePos = $_POST["kode_pos"];

    $query = "INSERT INTO member VALUES (null, '$firstName', '$lastName', '$kota', '$provinsi', '$kodePos')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// hapus data
function hapus($idMember)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM member WHERE id_member = $idMember");
    return mysqli_affected_rows($conn);
}

// ubah data
function ubah()
{
    global $conn;

    $idMember = $_POST["id_member"];
    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $kota = $_POST["kota"];
    $provinsi = $_POST["provinsi"];
    $kodePos = $_POST["kode_pos"];

    $query = "UPDATE member SET first_name = '$firstName', last_name = '$lastName', kota = '$kota', provinsi = '$provinsi', kode_pos = '$kodePos' WHERE id_member = $idMember";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
