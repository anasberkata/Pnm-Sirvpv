<?php
session_start();
include "../templates/header.php";

if (isset($_POST["add_rv"])) {
    if (rv_add($_POST) > 0) {
        echo "<script>
            alert('Receive voucher berhasil ditambah!');
            document.location.href = 'rv.php';
          </script>";
    } else {
        echo "<script>
            alert('Receive voucher gagal ditambah!');
            document.location.href = 'rv.php';
          </script>";
    }
}
?>

<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-8 col-lg-4">
                <h1 class="h3 mb-3">Tambah Receive Voucher</h1>
            </div>
            <div class="col-4 col-lg-4 text-end">
                <a href="rv.php" class="btn btn-info text-white"><i class="align-middle" data-feather="arrow-left"></i>
                    Kembali</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Input Tanggal Receive Voucher</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <input type="hidden" value="<?= $user["id_user"] ?>" name="id_user">

                            <input type="date" class="form-control mb-3" name="rv_date" required>
                            <textarea class="form-control mb-3 ckeditor" rows="2" placeholder="Deskripsi"
                                name="deskripsi" required></textarea>
                            <button type="submit" class="btn btn-lg btn-primary mt-3" name="add_rv">
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