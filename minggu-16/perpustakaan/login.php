<?php
session_start();
require 'config.php';

if(isset($_POST["submit"])){
  ob_start();
  $username = $_POST['usernama'];
  $password = $_POST['password'];

  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  $result = mysqli_query($conn, "SELECT * FROM user WHERE usernama = '$username' AND password = '$password'");

  if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $_SESSION["login"] = true;
      $_SESSION["id_user"] = $row["id_user"];
      session_regenerate_id(true);
      header("Location: dashboard.php");
      exit;
  } else {
      $error = true;
  }
}

if(isset($_SESSION["login"])==true){
  header("Location: dashboard.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <title>Perpustakaan Login</title>
    <style>
      body {
        background-color: #212529;
        color: white;
        box-sizing: content-box;
        margin: 0;
        padding: 0;
      }

      .cover-login {
        height: 100vh;
        width: 100%;
        object-fit: fill;
      }

      .form form {
        padding-top: 25%;
        padding-left: 10%;
        padding-right: 10%;
      }
    </style>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <img
            src="cover.jpg"
            alt="perpustakaan"
            class="cover-login"
          />
        </div>
        <div class="col form">
          <form method="post">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input
                placeholder="username.."
                type="text"
                name="usernama"
                class="form-control"
                id="username"
              />
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input
                placeholder="password.."
                type="password"
                name="password"
                class="form-control"
              />
            </div>
            <?php if (isset($error)) : ?>
                <br>
                <span style="color: red; font-style: italic;">Username atau password salah</span>
            <?php endif; ?>
            <button type="submit" name="submit" class="btn btn-primary">Login</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
