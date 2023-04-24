<?php
session_start();
include "../templates/header.php";

$id_pv = $_GET["id_pv"];
$id_pvd = $_GET["id_pvd"];

$pvd = query(
    "SELECT * FROM pv_detail
    INNER JOIN pv ON pv.id_pv = pv_detail.id_pv
    WHERE id_pv_detail = $id_pvd"
)[0];

if (isset($_POST["edit_pv_detail"])) {
    if (pv_detail_edit($_POST) > 0) {
        echo "<script>
            alert('Data payment voucher berhasil diubah!');
            document.location.href = 'pv_detail.php?id=' + $id_pv;
            </script>";
    } else {
        echo "<script>
            alert('Data payment voucher gagal diubah!');
            document.location.href = 'pv_detail.php?id=' + $id_pv;
            </script>";
    }
}
?>

<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-8 col-lg-6">
                <h1 class="h3 mb-3">Ubah Data Payment Voucher</h1>
            </div>
            <div class="col-4 col-lg-2 text-end">
                <a href="pv_detail.php?id=<?= $id_pv; ?>" class="btn btn-info text-white"><i class="align-middle"
                        data-feather="arrow-left"></i>
                    Kembali</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Ubah Data Payment Voucher tanggal :
                            <strong>
                                <?= date('d F Y', strtotime($pvd["pv_date"])); ?>
                            </strong>
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <input type="hidden" value="<?= $id_pvd; ?>" name="id_pvd">

                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <label>DR / CR</label>
                                    <select class="form-select mb-3" name="drcr">
                                        <option value="<?= $pvd["drcr"]; ?>"><?= $pvd["drcr"]; ?></option>
                                        <option value="DR">DR</option>
                                        <option value="CR">CR</option>
                                    </select>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <label>Nama Akun</label>
                                    <input type="text" class="form-control mb-3" value="<?= $pvd["nama_akun"]; ?>"
                                        name="nama_akun">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <label>No. Akun</label>
                                    <input type="text" class="form-control mb-3" value="<?= $pvd["no_akun"]; ?>"
                                        name="no_akun">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <label>Jumlah (Rp.)</label>
                                    <input type="number" class="form-control mb-3" value="<?= $pvd["jumlah"]; ?>"
                                        name="jumlah">
                                </div>
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-lg btn-primary mt-3" name="edit_pv_detail">
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