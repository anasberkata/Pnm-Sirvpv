<?php
session_start();
include "../templates/header.php";

$id_pv = $_GET["id"];

$pv = query(
    "SELECT * FROM pv
    WHERE id_pv = $id_pv"
)[0];

$pv_detail = query(
    "SELECT * FROM pv_detail
    INNER JOIN pv ON pv.id_pv = pv_detail.id_pv
    WHERE pv_detail.id_pv = $id_pv"
);

$pv_amount = query(
    "SELECT SUM(jumlah) AS amount FROM pv_detail WHERE id_pv = $id_pv"
)[0];
?>

<main class="content">
    <div class="container-fluid p-0">

        <div class="row">
            <div class="col-6">
                <h1 class="h3 mb-3">Payment Voucher Detail</h1>
            </div>
            <div class="col-6 text-end">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <a href="pv.php" class="btn btn-info text-white"><i class="align-middle"
                            data-feather="arrow-left"></i>
                        Kembali</a>
                    <a href="pv_detail_add.php?id_pv=<?= $pv["id_pv"]; ?>" class="btn btn-info text-white"><i
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
                                        <?= date('F Y', strtotime($pv["pv_date"])); ?>
                                    </strong>
                                </h5>
                                <p class="mt-3">
                                    Nama Bank :
                                    <?= $pv["nama_bank"]; ?>
                                    <br>
                                    No Bank :
                                    <?= $pv["no_bank"]; ?>
                                    <br>
                                    Deskripsi :
                                    <?= $pv["deskripsi"]; ?>
                                    PNM Bilyet Giro / Cheque No. :
                                    <?= $pv["pnm_bilyet"]; ?>
                                    <br>
                                </p>
                            </div>
                            <div class="col-6 text-end">
                                <a href="pv_detail_print.php?id_pv=<?= $pv["id_pv"]; ?>"
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
                            <?php foreach ($pv_detail as $pvd): ?>
                                <tr>
                                    <td>
                                        <?= $i; ?>
                                    </td>
                                    <td>
                                        <?= $pvd["drcr"]; ?>
                                    </td>
                                    <td>
                                        <?= $pvd["nama_akun"]; ?>
                                    </td>
                                    <td class="d-none d-xl-table-cell">
                                        <?= $pvd["no_akun"]; ?>
                                    </td>
                                    <td>
                                        Rp.
                                        <?= number_format($pvd["jumlah"], 2, ',', '.'); ?>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <a href="pv_detail_edit.php?id_pvd=<?= $pvd["id_pv_detail"]; ?>&id_pv=<?= $pv["id_pv"]; ?>"
                                                class="btn btn-info text-white mt-1"><i class="align-middle"
                                                    data-feather="edit"></i></a>
                                            <a href="pv_detail_delete.php?id_pvd=<?= $pvd["id_pv_detail"]; ?>&id_pv=<?= $pv["id_pv"]; ?>"
                                                class="btn btn-danger text-white mt-1"
                                                onclick="return confirm('Yakin ingin menghapus <?= $pvd['nama_akun']; ?>?');"><i
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
                                    <?= number_format($pv_amount["amount"], 2, ',', '.'); ?>
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