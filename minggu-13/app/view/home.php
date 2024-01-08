<div class="container position-relative position-absolute top-50 start-50 translate-middle">
    <h3 id="heading" class="mb-4">Pilih Kelas</h3>

    <style>
        .card {
            background-color: #fafafa;
            cursor: pointer;
        }

        .card-img-top {
            height: 300px;
            object-fit: cover;
        }

        a {
            text-decoration: none;
        }
    </style>

    <div class="row">
        <div class="col mx-2" style="width: 18rem;">
            <a href="<?= BASE_URL ?>/data_tabungan">
                <div class="card">
                    <img src="<?= BASE_URL ?>/img/kelas1.jpg" class="card-img-top" alt="kelas 1">
                    <div class="card-body">
                        <h5 class="card-title">Kelas 1</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col mx-2" style="width: 18rem;">
            <a href="<?= BASE_URL ?>/data_tabungan">
                <div class="card">
                    <img src="<?= BASE_URL ?>/img/kelas2.jpg" class="card-img-top" alt="kelas 1">
                    <div class="card-body">
                        <h5 class="card-title">Kelas 2</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col mx-2" style="width: 18rem;">
            <a href="<?= BASE_URL ?>/data_tabungan">
                <div class="card">
                    <img src="<?= BASE_URL ?>/img/kelas3.jpg" class="card-img-top" alt="kelas 1">
                    <div class="card-body">
                        <h5 class="card-title">Kelas 3</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>