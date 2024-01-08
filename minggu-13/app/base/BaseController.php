<?php

class BaseController {

    private $baseUrl = "/web-crud/minggu-13/public";
    public function __construct(bool $isInAuth) {
        // if ($isInAuth) {
        //     // check login status
        //     $this->checkSession();
        // } else {
        //     if(!isset($_SESSION["login"])){
        //         $this->moveTo('login');
        //         exit;
        //     }
        // }
    }

    public function checkSession() {
        if(isset($_SESSION["login"])){
            $this->moveTo('home');
            exit;
        } else {
            
        }
    }

    public function moveTo($path) {
        header("Location: " . $this->baseUrl . "/$path");
    }

    public function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function insert($query) {
        try {
            global $conn;
            mysqli_query($conn, $query);
            return mysqli_affected_rows($conn);
        } catch (Exception $e) {
            return 0;
        }
    }

    public function showMessage(string $message, string $path) {
        echo "<script>
                alert('$message');
                document.location.href = '".BASE_URL.'/'.$path."';
            </script>";
    }
}

?>