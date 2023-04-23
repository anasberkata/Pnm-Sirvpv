<?php
session_start();
include "../templates/header.php";

$roles = query("SELECT * FROM users_role");

if (isset($_POST["add_user"])) {
    if (user_add($_POST) > 0) {
        echo "<script>
            alert('Pengguna berhasil ditambah!');
            document.location.href = 'users.php';
          </script>";
    } else {
        echo "<script>
            alert('Pengguna gagal ditambah!');
            document.location.href = 'users.php';
          </script>";
    }
}
?>

<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-6 col-lg-3">
                <h1 class="h3 mb-3">Tambah Pengguna</h1>
            </div>
            <div class="col-6 col-lg-3 text-end">
                <a href="users.php" class="btn btn-info text-white"><i class="align-middle"
                        data-feather="arrow-left"></i>
                    Kembali</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Input Data Pengguna</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <input type="text" class="form-control mb-3" placeholder="Nama Lengkap" name="nama"
                                required>
                            <input type="email" class="form-control mb-3" placeholder="Email" name="email" required>
                            <input type="text" class="form-control mb-3" placeholder="Username" name="username"
                                required>
                            <input type="password" class="form-control mb-3" placeholder="password" name="password"
                                required>
                            <select class="form-select mb-3" name="role" required>
                                <option>Pilih Role</option>
                                <?php foreach ($roles as $r): ?>
                                    <option value="<?= $r["id_role"] ?>"><?= $r["role"] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <button type="submit" class="btn btn-lg btn-primary" name="add_user">
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