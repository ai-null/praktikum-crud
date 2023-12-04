<?php

session_start();

require 'config.php';
if (isset($_POST["submit"])) {
    if (hapus($_POST['id_member']) > 0) {
        echo "true";
    } else {
        echo "false";
    }
}

?>