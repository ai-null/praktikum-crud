<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #fefefe;
        }

        .container {
            width: 600px;
        }

        .error-msg {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container position-relative position-absolute top-50 start-50 translate-middle">
        <a class="bi bi-arrow-left" style="font-size: 2rem; color: cornflowerblue;" href="<?= BASE_URL; ?>/login"></a>
        <h3 class="mt-2">Register page</h3>

        <form method="post" action="<?= BASE_URL; ?>/register">
            <div class="row">
                <div class="mb-3 col-md">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="mb-3 col-md">
                    <label for="kelas" class="form-label">Kelas</label>
                    <input type="number" class="form-control" name="kelas" id="kelas">
                </div>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username">
                <div class="form-text">Make a username with something you can remember!</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <?php if ($controller->error) echo "<h6 class='error-msg'>Sadly, something went wrong with our server.<h6>"; ?>
            <button type="submit" name="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</body>

</html>