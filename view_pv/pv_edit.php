<?php
session_start();
include "../templates/header.php";

$id_pv = $_GET["id"];

$pv = query(
    "SELECT * FROM pv
    WHERE id_pv = $id_pv"
)[0];

if (isset($_POST["edit_pv"])) {
    if (pv_edit($_POST) > 0) {
        echo "<script>
            alert('Payment voucher berhasil diubah!');
            document.location.href = 'pv.php';
          </script>";
    } else {
        echo "<script>
            alert('Payment voucher gagal diubahh!');
            document.location.href = 'pv.php';
          </script>";
    }
}
?>

<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-8 col-lg-4">
                <h1 class="h3 mb-3">Ubah Payment Voucher</h1>
            </div>
            <div class="col-4 col-lg-4 text-end">
                <a href="pv.php" class="btn btn-info text-white"><i class="align-middle" data-feather="arrow-left"></i>
                    Kembali</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Ubah Tanggal Payment Voucher</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <input type="hidden" value="<?= $user["id_user"] ?>" name="id_user">
                            <input type="hidden" value="<?= $pv["id_pv"] ?>" name="id_pv">

                            <label>Nama Bank</label>
                            <select class="form-select mb-3" name="nama_bank">
                                <option value="<?= $pv["nama_bank"] ?>"><?= $pv["nama_bank"] ?></option>
                                <option value="BCA">BCA</option>
                                <option value="BNI">BNI</option>
                                <option value="BRI">BRI</option>
                                <option value="MANDIRI">MANDIRI</option>
                                <option value="BTN">BTN</option>
                                <option value="BSI">BSI</option>
                                <option value="CIMB">CIMB</option>
                                <option value="OCBC">OCBC</option>
                            </select>
                            <label>No. Rekening Bank</label>
                            <input type="text" class="form-control mb-3" value="<?= $pv["no_bank"] ?>" name="no_bank">
                            <label>Tanggal</label>
                            <input type="date" class="form-control mb-3" value="<?= $pv["pv_date"]; ?>" name="pv_date">
                            <label>PNM Bilyet Giro / Cheque No.</label>
                            <input type="text" class="form-control mb-3" <?= $pv["pnm_bilyet"] ?> name="pnm_bilyet">
                            <label>Deskripsi</label>
                            <textarea class="form-control mb-3 ckeditor" rows="2"
                                name="deskripsi"><?= $pv["deskripsi"]; ?></textarea>
                            <button type="submit" class="btn btn-lg btn-primary mt-3" name="edit_pv">
                                Ubah
                            </button>
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