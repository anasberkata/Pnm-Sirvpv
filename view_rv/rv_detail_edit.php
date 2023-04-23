<?php
session_start();
include "../templates/header.php";

$id_rv = $_GET["id_rv"];
$id_rvd = $_GET["id_rvd"];

$rvd = query(
    "SELECT * FROM rv_detail
    INNER JOIN rv ON rv.id_rv = rv_detail.id_rv
    WHERE id_rv_detail = $id_rvd"
)[0];

if (isset($_POST["edit_rv_detail"])) {
    if (rv_detail_edit($_POST) > 0) {
        echo "<script>
            alert('Data receive voucher berhasil diubah!');
            document.location.href = 'rv_detail.php?id=' + $id_rv;
            </script>";
    } else {
        echo "<script>
            alert('Data receive voucher gagal diubah!');
            document.location.href = 'rv_detail.php?id=' + $id_rv;
            </script>";
    }
}
?>

<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-8 col-lg-6">
                <h1 class="h3 mb-3">Ubah Data Receive Voucher</h1>
            </div>
            <div class="col-4 col-lg-2 text-end">
                <a href="rv_detail.php?id=<?= $id_rv; ?>" class="btn btn-info text-white"><i class="align-middle"
                        data-feather="arrow-left"></i>
                    Kembali</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Ubah Data Receive Voucher tanggal :
                            <strong>
                                <?= date('d F Y', strtotime($rvd["rv_date"])); ?>
                            </strong>
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <input type="hidden" value="<?= $id_rvd; ?>" name="id_rvd">

                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <label>DR / CR</label>
                                    <select class="form-select mb-3" name="drcr">
                                        <option value="<?= $rvd["drcr"]; ?>"><?= $rvd["drcr"]; ?></option>
                                        <option value="DR">DR</option>
                                        <option value="CR">CR</option>
                                    </select>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <label>Nama Akun</label>
                                    <input type="text" class="form-control mb-3" value="<?= $rvd["nama_akun"]; ?>"
                                        name="nama_akun">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <label>No. Akun</label>
                                    <input type="text" class="form-control mb-3" value="<?= $rvd["no_akun"]; ?>"
                                        name="no_akun">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <label>Jumlah (Rp.)</label>
                                    <input type="number" class="form-control mb-3" value="<?= $rvd["jumlah"]; ?>"
                                        name="jumlah">
                                </div>
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-lg btn-primary mt-3" name="edit_rv_detail">
                                        Ubah
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
include "../templates/footer.php";
?>