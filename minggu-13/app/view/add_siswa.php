<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #fefefe;
        }

        .selectable-data {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="home"><?= $title ?></a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="tambah_siswa">Tambah Data Siswa</a>
                    </li>
                </ul>
            </div>
            <div class="nav-item">
                <a class="btn btn-danger" href="logout">Sign Out</a>
            </div>
        </div>
    </nav>
    <div class="container position-relative position-absolute top-50 start-50 translate-middle">
        <h3 id="heading" class="mb-4">Add new data to the row</h3>

        <div class="row">
            <div class="col">
                <form class="row g-3" method="post">
                    <input type="hidden" class="form-control" id="validationDefault00" name="id_member">
                    <div class="col-md-4">
                        <label for="validationDefault01" class="form-label">First name</label>
                        <input type="text" class="form-control" name="first_name" id="validationDefault01" placeholder="Mark" required>
                    </div>
                    <div class="col-md-4">
                        <label for="validationDefault02" class="form-label">Last name</label>
                        <input type="text" class="form-control" name="last_name" id="validationDefault02" placeholder="Otto" required>
                    </div>
                    <div class="col-md-4">
                        <label for="validationDefault06" class="form-label">Kelas</label>
                        <input type="number" class="form-control" name="kelas" id="validationDefault06" placeholder="1" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationDefault03" class="form-label">Kota</label>
                        <input type="text" class="form-control" name="kota" id="validationDefault03" required>
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault04" class="form-label">Provinsi</label>
                        <input type="text" class="form-control" name="provinsi" id="validationDefault04" required>
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault05" class="form-label">Kode Pos</label>
                        <input type="text" class="form-control" name="kode_pos" id="validationDefault05" required>
                    </div>
                    <div class="col-12">
                        <div class="d-flex">
                            <button class="p-2 btn btn-primary" name="submit" type="submit">Submit form</button>
                            <button class="p-2 ms-3 btn btn-danger" type="submit" name="is_delete" style="visibility: hidden;" id="btn-delete">Hapus</button>

                            <button class="ms-auto p-2 btn btn-warning" type="button" style="visibility: hidden;" id="btn-clear">Clear</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col">
                <table class="table table-success table-striped-columns">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">City</th>
                            <th scope="col">State</th>
                            <th scope="col">Postal Code</th>
                            <th scope="col">Kelas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $members = $controller->getMember();
                        foreach ($members as $member) {
                        ?>
                            <tr class="selectable-data">
                                <td scope="row"><?= $member["id_member"] ?></td>
                                <td><?= $member["first_name"] ?></td>
                                <td><?= $member["last_name"] ?></td>
                                <td><?= $member["kota"] ?></td>
                                <td><?= $member["provinsi"] ?></td>
                                <td><?= $member["kode_pos"] ?></td>
                                <td><?= $member["kelas"] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        var btnClear = document.getElementById("btn-clear")
        var btnDelete = document.getElementById("btn-delete")

        var heading = document.getElementById("heading")

        var els = document.getElementsByClassName("selectable-data")
        const listOfFields = [
            document.getElementById("validationDefault00"), // id 
            document.getElementById("validationDefault01"), // first name
            document.getElementById("validationDefault02"), // last name 
            document.getElementById("validationDefault03"), // kota
            document.getElementById("validationDefault04"), // provinsi
            document.getElementById("validationDefault05"), // kode pos
            document.getElementById("validationDefault06"), // kelas
        ]

        Array.prototype.forEach.call(els, function(el) {
            el.addEventListener("click", function() {
                doSomething(el)
            })
        });

        function doSomething(el) {
            btnClear.style.visibility = 'visible'
            btnDelete.style.visibility = 'visible'
            heading.innerText = 'Update data from the row'
            for (let index = 0; index < el.children.length; index++) {
                const element = el.children[index];
                listOfFields[index].value = el.children[index].innerText
            }
        }

        btnClear.addEventListener("click", function() {
            heading.innerText = 'Add new data to the row'
            btnDelete.style.visibility = 'hidden'
            btnClear.style.visibility = 'hidden'
            for (let index = 0; index < listOfFields.length; index++) {
                listOfFields[index].value = ''
            }
        })
    </script>
</body>

</html>