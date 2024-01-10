<?php 

class MainController extends BaseController {

    public $kelas = -1;
    public function __construct() {
        parent::__construct(false);
    }

    public function getMember() {
        $query = MemberModel::getSelectAllQuery();
        return $this->query($query);
    }

    public function getMemberFromKelas() {
        $query = MemberModel::getSelectOneQuery($this->kelas);
        return $this->query($query);
    }

    public function doOnDataSiswa() {
        if (isset($_POST["is_delete"])) {
            if ($this->hapus($_POST['id_member']) > 0) {
                echo "<script>
                    alert('data berhasil dihapus!');
                    document.location.href = '".BASE_URL."/home';
                  </script>";
            } else {
                echo "<script>
                alert('data gagal dihapu!');
                document.location.href = '".BASE_URL."/home';
              </script>";
            }
        } else if (isset($_POST["submit"])) {
            if ($_POST["id_member"] != '') {
                if ($this->ubah() > 0) {
                    echo "<script>
                        alert('data berhasil diubah!');
                        document.location.href = '".BASE_URL."/home';
                      </script>";
                } else {
                    echo "<script>
                        alert('data gagal diubah!');
                        // document.location.href = '".BASE_URL."/home';
                      </script>";
                }
            } else {
                if ($this->tambah() > 0) {
                    echo "<script>
                        alert('data berhasil ditambahkan!');
                        document.location.href = '".BASE_URL."/home';
                      </script>";
                } else {
                    echo "<script>
                        alert('data gagal ditambahkan!');
                        document.location.href = '".BASE_URL."/home';
                      </script>";
                }
            }
        }
    }

    public function doOnDataTabungan() {
        if (!isset($_POST['kelas'])) {
            $this->moveTo('home');
            return;
        }

        $this->kelas = isset($_POST['kelas']);

        if (isset($_POST["is_delete"])) {
            if ($this->hapus($_POST['id_member']) > 0) {
                echo "<script>
                    alert('data berhasil dihapus!');
                    document.location.href = '".BASE_URL."/tambah_siswa';
                  </script>";
            } else {
                echo "<script>
                alert('data gagal dihapu!');
                document.location.href = '".BASE_URL."/tambah_siswa';
              </script>";
            }
        } else if (isset($_POST["submit"])) {
            if ($_POST["id_member"] != '') {
                if ($this->ubah() > 0) {
                    echo "<script>
                        alert('data berhasil diubah!');
                        document.location.href = '".BASE_URL."/tambah_siswa';
                      </script>";
                } else {
                    echo "<script>
                        alert('data gagal diubah!');
                        document.location.href = '".BASE_URL."/tambah_siswa';
                      </script>";
                }
            } else {
                if ($this->tambah() > 0) {
                    echo "<script>
                        alert('data berhasil ditambahkan!');
                        document.location.href = '".BASE_URL."/tambah_siswa';
                      </script>";
                } else {
                    echo "<script>
                        alert('data gagal ditambahkan!');
                        document.location.href = '".BASE_URL."/tambah_siswa';
                      </script>";
                }
            }
        }
    }

    private function ubah()
    {
        global $conn;

        $idMember = $_POST["id_member"];
        $firstName = $_POST["first_name"];
        $lastName = $_POST["last_name"];
        $kota = $_POST["kota"];
        $provinsi = $_POST["provinsi"];
        $kodePos = $_POST["kode_pos"];
        $kelas = $_POST["kelas"];

        $query = "UPDATE member SET first_name = '$firstName', last_name = '$lastName', kota = '$kota', provinsi = '$provinsi', kode_pos = '$kodePos', kelas = '$kelas' WHERE id_member = '$idMember';";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function tambah()
    {
        global $conn;

        $firstName = $_POST["first_name"];
        $lastName = $_POST["last_name"];
        $kota = $_POST["kota"];
        $provinsi = $_POST["provinsi"];
        $kodePos = $_POST["kode_pos"];
        $kelas = $_POST["kelas"];

        $query = "INSERT INTO member VALUES (null, '$firstName', '$lastName', '$kota', '$provinsi', '$kodePos', '$kelas')";
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
}

?>