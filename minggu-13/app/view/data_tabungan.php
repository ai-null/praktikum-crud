<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Tabungan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nominal</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

<div class="container position-relative position-absolute top-50 start-50 translate-middle">
    <h3 id="heading" class="mb-4">Data tabungan siswa</h3>

    <table class="table table-success table-striped-columns">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">Nominal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $members = $controller->getMemberFromKelas();
            foreach ($members as $member) {
            ?>
                <tr class="selectable-data">
                    <td scope="row"><?= $member["id_member"] ?></td>
                    <td><?= $member["first_name"] ?></td>
                    <td><?= $member["kelas"] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
    </button>
</div>