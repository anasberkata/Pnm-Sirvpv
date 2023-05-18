<?php
session_start();
include "../templates/header.php";

if (!isset($_POST["date_search"])) {
  $payment_voucher = query(
    "SELECT * FROM pv
  INNER JOIN users ON users.id_user = pv.id_user"
  );
} else {
  $date_search = $_POST["date_search"];
  $payment_voucher = query(
    "SELECT * FROM pv
  INNER JOIN users ON users.id_user = pv.id_user
  WHERE pv_date = '$date_search'"
  );
}
?>

<main class="content">
  <div class="container-fluid p-0">

    <div class="row">
      <div class="col-6">
        <h1 class="h3 mb-3">Payment Voucher</h1>
      </div>
      <div class="col-6 text-end">
        <a href="pv_add.php" class="btn btn-info text-white"><i class="align-middle" data-feather="plus-circle"></i>
          Tambah</a>
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-lg-12 col-xxl-12 d-flex">
        <div class="card flex-fill">
          <div class="card-header">
            <div class="row">
              <div class="col-12 col-lg-8">
                <h5 class="card-title mb-0">Data Payment Voucher</h5>
              </div>
              <div class="col-12 col-lg-4">
                <form action="" method="POST">
                  <div class="input-group mb-3">
                    <input type="date" class="form-control" name="date_search">
                    <div class="input-group-prepend">
                      <button class="btn btn-primary" type="submit" name="cari"><i class="align-middle"
                          data-feather="search"></i></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <table class="table table-responsive my-0" id="data">
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
              <?php foreach ($payment_voucher as $pv): ?>
                <tr>
                  <td>
                    <?= $i; ?>
                  </td>
                  <td>
                    <?= date('F Y', strtotime($pv["pv_date"])); ?>
                  </td>
                  <td class="d-none d-xl-table-cell">
                    <?= $pv["deskripsi"]; ?>
                  </td>
                  <td class="d-none d-xl-table-cell">
                    <?= $pv["nama"]; ?>
                  </td>
                  <td>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                      <a href="pv_detail.php?id=<?= $pv["id_pv"]; ?>" class="btn btn-success text-white mt-1"><i
                          class="align-middle" data-feather="inbox"></i></a>
                      <a href="pv_edit.php?id=<?= $pv["id_pv"]; ?>" class="btn btn-info text-white mt-1"><i
                          class="align-middle" data-feather="edit"></i></a>
                      <a href="pv_delete.php?id=<?= $pv["id_pv"]; ?>" class="btn btn-danger text-white mt-1"
                        onclick="return confirm('Yakin ingin menghapus payment voucher tanggal <?= date('d F Y', strtotime($pv['pv_date'])); ?>?');"><i
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