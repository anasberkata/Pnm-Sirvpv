<?php
session_start();
include "../templates/header.php";

$receive_voucher = query(
  "SELECT * FROM rv
  INNER JOIN users ON users.id_user = rv.id_user"
);
?>

<main class="content">
  <div class="container-fluid p-0">

    <div class="row">
      <div class="col-6">
        <h1 class="h3 mb-3">Receive Voucher</h1>
      </div>
      <div class="col-6 text-end">
        <a href="rv_add.php" class="btn btn-info text-white"><i class="align-middle" data-feather="plus-circle"></i>
          Tambah</a>
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-lg-12 col-xxl-12 d-flex">
        <div class="card flex-fill">
          <div class="card-header">
            <h5 class="card-title mb-0">Data Receive Voucher</h5>
          </div>
          <table class="table table-responsive my-0">
            <thead>
              <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th class="d-none d-xl-table-cell">Deskripsi</th>
                <th class="d-none d-xl-table-cell">Penanggung Jawab</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($receive_voucher as $rv): ?>
                <tr>
                  <td>
                    <?= $i; ?>
                  </td>
                  <td>
                    <?= date('d F Y', strtotime($rv["rv_date"])); ?>
                  </td>
                  <td class="d-none d-xl-table-cell">
                    <?= $rv["deskripsi"]; ?>
                  </td>
                  <td class="d-none d-xl-table-cell">
                    <?= $rv["nama"]; ?>
                  </td>
                  <td>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                      <a href="rv_detail.php?id=<?= $rv["id_rv"]; ?>" class="btn btn-success text-white mt-1"><i
                          class="align-middle" data-feather="inbox"></i></a>
                      <a href="rv_edit.php?id=<?= $rv["id_rv"]; ?>" class="btn btn-info text-white mt-1"><i
                          class="align-middle" data-feather="edit"></i></a>
                      <a href="rv_delete.php?id=<?= $rv["id_rv"]; ?>" class="btn btn-danger text-white mt-1"
                        onclick="return confirm('Yakin ingin menghapus receive voucher tanggal <?= date('d F Y', strtotime($rv['rv_date'])); ?>?');"><i
                          class="align-middle" data-feather="trash"></i></a>
                    </div>
                  </td>
                </tr>
                <?php $i++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>

<?php
include "../templates/footer.php";
?>