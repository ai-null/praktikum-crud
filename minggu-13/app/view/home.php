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
            <form method="post" action="<?= BASE_URL ?>/data_tabungan">
                <input type="hidden" name="kelas" value="1" />
                <button class="card" type="submit">
                    <img src="<?= BASE_URL ?>/img/kelas1.jpg" class="card-img-top" alt="kelas 1">
                    <div class="card-body">
                        <h5 class="card-title">Kelas 1</h5>
                    </div>
                </button>
            </form>
        </div>

        <div class="col mx-2" style="width: 18rem;">
        <form method="post" action="<?= BASE_URL ?>/data_tabungan">
                <input type="hidden" name="kelas" value="2" />
                <button class="card" type="submit">
                    <img src="<?= BASE_URL ?>/img/kelas2.jpg" class="card-img-top" alt="kelas 2">
                    <div class="card-body">
                        <h5 class="card-title">Kelas 2</h5>
                    </div>
                </button>
            </form>
        </div>

        <div class="col mx-2" style="width: 18rem;">
        <form method="post" action="<?= BASE_URL ?>/data_tabungan">
                <input type="hidden" name="kelas" value="3" />
                <button class="card" type="submit">
                    <img src="<?= BASE_URL ?>/img/kelas3.jpg" class="card-img-top" alt="kelas 3">
                    <div class="card-body">
                        <h5 class="card-title">Kelas 3</h5>
                    </div>
                </button>
            </form>
        </div>
    </div>
</div>