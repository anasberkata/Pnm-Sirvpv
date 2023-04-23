<?php
session_start();
include "../templates/header.php";

$roles = query("SELECT * FROM users_role");

if (isset($_POST["edit_profile"])) {
    if (profile_edit($_POST) > 0) {
        echo "<script>
            alert('Profile berhasil diubah!');
            document.location.href = 'profile.php';
          </script>";
    } else {
        echo "<script>
            alert('Profile gagal diubah!');
            document.location.href = 'profile.php';
          </script>";
    }
}
?>

<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-6 col-lg-3">
                <h1 class="h3 mb-3">Ubah Profile</h1>
            </div>
            <div class="col-6 col-lg-3 text-end">
                <a href="profile.php" class="btn btn-info text-white"><i class="align-middle"
                        data-feather="arrow-left"></i>
                    Kembali</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Ubah Data Profile</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <input type="hidden" value="<?= $user["id_user"] ?>" name="id">

                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control mb-3" placeholder="Nama Lengkap" name="nama"
                                value="<?= $user["nama"] ?>">
                            <label>E-Mail</label>
                            <input type="email" class="form-control mb-3" placeholder="Email" name="email"
                                value="<?= $user["email"] ?>">
                            <label>Username</label>
                            <input type="text" class="form-control mb-3" placeholder="Username" name="username"
                                value="<?= $user["username"] ?>">
                            <label>Password <span class="small">(Abaikan jika tidak ingin diubah)</span></label>
                            <input type="password" class="form-control mb-3" placeholder="password" name="password"
                                value="<?= $user["password"] ?>">
                            <label>Role</label>
                            <select class="form-select mb-3" name="role" required>
                                <option value="<?= $user["id_role"] ?>"><?= $user["role"] ?></option>
                                <?php foreach ($roles as $r): ?>
                                    <option value="<?= $r["id_role"] ?>"><?= $r["role"] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <button type="submit" class="btn btn-lg btn-primary" name="edit_profile">
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