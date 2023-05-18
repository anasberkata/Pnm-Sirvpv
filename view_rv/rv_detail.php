<?php
session_start();
include "../templates/header.php";

$id_rv = $_GET["id"];

$rv = query(
    "SELECT * FROM rv
    WHERE id_rv = $id_rv"
)[0];

$rv_detail = query(
    "SELECT * FROM rv_detail
    INNER JOIN rv ON rv.id_rv = rv_detail.id_rv
    WHERE rv_detail.id_rv = $id_rv"
);

$rv_amount = query(
    "SELECT SUM(jumlah) AS amount FROM rv_detail WHERE id_rv = $id_rv"
)[0];
?>

<main class="content">
    <div class="container-fluid p-0">

        <div class="row">
            <div class="col-6">
                <h1 class="h3 mb-3">Receive Voucher Detail</h1>
            </div>
            <div class="col-6 text-end">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <a href="rv.php" class="btn btn-info text-white"><i class="align-middle"
                            data-feather="arrow-left"></i>
                        Kembali</a>
                    <a href="rv_detail_add.php?id_rv=<?= $rv["id_rv"]; ?>" class="btn btn-info text-white"><i
                            class="align-middle" data-feather="plus-circle"></i>
                        Tambah</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-title mb-0 mt-3">
                                    Tanggal :
                                    <strong>
                                        <?= date('F Y', strtotime($rv["rv_date"])); ?>
                                    </strong>
                                </h5>
                                <p class="mt-3">
                                    Deskripsi :
                                    <?= $rv["deskripsi"]; ?>
                                </p>
                            </div>
                            <div class="col-6 text-end">
                                <a href="rv_detail_print.php?id_rv=<?= $rv["id_rv"]; ?>"
                                    class="btn btn-warning text-white" target="_blank"><i class="align-middle"
                                        data-feather="printer"></i>
                                    Print</a>
                            </div>
                        </div>

                    </div>
                    <table class="table table-responsive my-0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>DR/CR</th>
                                <th>Nama Akun</th>
                                <th class="d-none d-xl-table-cell">No. Akun</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($rv_detail as $rvd): ?>
                                <tr>
                                    <td>
                                        <?= $i; ?>
                                    </td>
                                    <td>
                                        <?= $rvd["drcr"]; ?>
                                    </td>
                                    <td>
                                        <?= $rvd["nama_akun"]; ?>
                                    </td>
                                    <td class="d-none d-xl-table-cell">
                                        <?= $rvd["no_akun"]; ?>
                                    </td>
                                    <td>
                                        Rp.
                                        <?= number_format($rvd["jumlah"], 2, ',', '.'); ?>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <a href="rv_detail_edit.php?id_rvd=<?= $rvd["id_rv_detail"]; ?>&id_rv=<?= $rv["id_rv"]; ?>"
                                                class="btn btn-info text-white mt-1"><i class="align-middle"
                                                    data-feather="edit"></i></a>
                                            <a href="rv_detail_delete.php?id_rvd=<?= $rvd["id_rv_detail"]; ?>&id_rv=<?= $rv["id_rv"]; ?>"
                                                class="btn btn-danger text-white mt-1"
                                                onclick="return confirm('Yakin ingin menghapus <?= $rvd['nama_akun']; ?>?');"><i
                                                    class="align-middle" data-feather="trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="4" class="text-center">TOTAL</td>
                                <td>
                                    Rp.
                                    <?= number_format($rv_amount["amount"], 2, ',', '.'); ?>
                                </td>
                            </tr>
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