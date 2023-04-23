<?php
session_start();
include "../templates/header.php";

$id_rv = $_GET["id_rv"];

$rv = query(
    "SELECT * FROM rv
    WHERE id_rv = $id_rv"
)[0];

if (isset($_POST["add_rv_detail"])) {
    if (rv_detail_add($_POST) > 0) {
        echo "<script>
            alert('Data receive voucher berhasil ditambah!');
            document.location.href = 'rv_detail.php?id=' + $id_rv;
            </script>";
    } else {
        echo "<script>
            alert('Data receive voucher gagal ditambah!');
            document.location.href = 'rv_detail.php?id=' + $id_rv;
            </script>";
    }
}
?>

<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-8 col-lg-6">
                <h1 class="h3 mb-3">Tambah Data Receive Voucher</h1>
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
                        <h5 class="card-title mb-0">Input Data Receive Voucher tanggal :
                            <strong>
                                <?= date('d F Y', strtotime($rv["rv_date"])); ?>
                            </strong>
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <input type="hidden" value="<?= $id_rv; ?>" name="id_rv">

                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <select class="form-select mb-3" name="drcr" required>
                                        <option>Pilih DR/CR</option>
                                        <option value="DR">DR</option>
                                        <option value="CR">CR</option>
                                    </select>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <input type="text" class="form-control mb-3" placeholder="Nama Akun"
                                        name="nama_akun" required>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <input type="text" class="form-control mb-3" placeholder="No. Akun" name="no_akun">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <input type="number" class="form-control mb-3" placeholder="Jumlah" name="jumlah"
                                        required>
                                </div>
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-lg btn-primary mt-3" name="add_rv_detail">
                                        Tambah
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