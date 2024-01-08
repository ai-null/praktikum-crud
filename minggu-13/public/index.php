<?php

// init files
require_once "../app/init.php";
require_once "../app/controller/AuthController.php";
require_once "../app/controller/MainController.php";

$request_uri = $_SERVER['REQUEST_URI'];

// Get only the path part of the URL
$path = parse_url($request_uri, PHP_URL_PATH);

require_once "../app/config.php";

session_start();

// Router
switch ($path) {
    case BASE_URL . "/login":
        $controller = new AuthController();
        $controller->doLogin();
        require_once "../app/view/login.php";
        break;

    case BASE_URL . "/register":
        $controller = new AuthController();
        $controller->doRegister();
        require_once "../app/view/register.php";
        break;

    case BASE_URL . "/home":
        $controller = new MainController();
        $title = "Web Akuntansi";
        require_once "../app/view/components/navbar.php";
        require_once "../app/view/home.php";
        require_once "../app/view/components/footer.php";
        break;

    case BASE_URL . "/logout":
        $controller = new AuthController(false);
        $controller->doLogout();
        break;

    case BASE_URL . "/tambah_siswa":
        $controller = new MainController();
        $controller->doOnDataSiswa();
        $title = "Web Akuntansi";
        require_once "../app/view/add_siswa.php";
        break;

    case BASE_URL . "/data_tabungan":
        $controller = new MainController();
        $controller->doOnDataTabungan();
        $title = "Web Akuntansi";
        require_once "../app/view/components/navbar.php";
        require_once "../app/view/data_tabungan.php";
        require_once "../app/view/components/footer.php";
        break;
    
    default:
        echo "<h2><b>404 - Page not found</b></h2>";
        break;
}
?>