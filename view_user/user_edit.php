<?php
session_start();
include "../templates/header.php";

$id = $_GET["id"];
$u = query(
    "SELECT * FROM users
    INNER JOIN users_role ON users.role_id = users_role.id_role
    WHERE id_user = $id"
)[0];

$roles = query("SELECT * FROM users_role");

if (isset($_POST["edit_user"])) {
    if (user_edit($_POST) > 0) {
        echo "<script>
            alert('Pengguna berhasil diubah!');
            document.location.href = 'users.php';
          </script>";
    } else {
        echo "<script>
            alert('Pengguna gagal diubah!');
            document.location.href = 'users.php';
          </script>";
    }
}
?>

<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-6 col-lg-3">
                <h1 class="h3 mb-3">Ubah Pengguna</h1>
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
                        <h5 class="card-title mb-0">Ubah Data Pengguna</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <input type="hidden" value="<?= $u["id_user"] ?>" name="id">

                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control mb-3" value="<?= $u["nama"] ?>" name="nama">
                            <label>E-Mail</label>
                            <input type="email" class="form-control mb-3" value="<?= $u["email"] ?>" name="email">
                            <label>Username</label>
                            <input type="text" class="form-control mb-3" value="<?= $u["username"] ?>" name="username">
                            <label>Password</label>
                            <input type="password" class="form-control mb-3" value="<?= $u["password"] ?>"
                                name="password">
                            <label>Role</label>
                            <select class="form-select mb-3" name="role">
                                <option value="<?= $u["id_role"] ?>">
                                    <?= $u["role"] ?>
                                </option>
                                <?php foreach ($roles as $r): ?>
                                    <option value="<?= $r["id_role"] ?>"><?= $r["role"] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <button type="submit" class="btn btn-lg btn-primary" name="edit_user">
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