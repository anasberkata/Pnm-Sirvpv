<?php
session_start();
include "../templates/header.php";

if (isset($_POST["add_pv"])) {
    if (pv_add($_POST) > 0) {
        echo "<script>
            alert('Payment voucher berhasil ditambah!');
            document.location.href = 'pv.php';
          </script>";
    } else {
        echo "<script>
            alert('Payment voucher gagal ditambah!');
            document.location.href = 'pv.php';
          </script>";
    }
}
?>

<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-8 col-lg-4">
                <h1 class="h3 mb-3">Tambah Payment Voucher</h1>
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
                        <h5 class="card-title mb-0">Input Tanggal Payment Voucher</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <input type="hidden" value="<?= $user["id_user"] ?>" name="id_user">

                            <select class="form-select mb-3" name="nama_bank">
                                <option>Pilih Bank</option>
                                <option value="BCA">BCA</option>
                                <option value="BNI">BNI</option>
                                <option value="BRI">BRI</option>
                                <option value="MANDIRI">MANDIRI</option>
                                <option value="BTN">BTN</option>
                                <option value="BSI">BSI</option>
                                <option value="CIMB">CIMB</option>
                                <option value="OCBC">OCBC</option>
                            </select>
                            <input type="text" class="form-control mb-3" placeholder="No. Rekening Bank" name="no_bank">
                            <input type="date" class="form-control mb-3" name="pv_date" required>
                            <input type="text" class="form-control mb-3" placeholder="PNM Bilyet Giro / Cheque No."
                                name="pnm_bilyet">
                            <textarea class="form-control mb-3 ckeditor" rows="2" placeholder="Deskripsi"
                                name="deskripsi" required></textarea>
                            <button type="submit" class="btn btn-lg btn-primary mt-3" name="add_pv">
                                Tambah
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