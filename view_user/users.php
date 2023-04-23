<?php
session_start();
include "../templates/header.php";

$users = query(
    "SELECT * FROM users
    INNER JOIN users_role ON users.role_id = users_role.id_role"
);
?>

<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-6">
                <h1 class="h3 mb-3">Pengguna</h1>
            </div>
            <div class="col-6 text-end">
                <a href="user_add.php" class="btn btn-info text-white"><i class="align-middle"
                        data-feather="user-plus"></i>
                    Tambah</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Pengguna</h5>
                    </div>
                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th class="d-none d-xl-table-cell">Username</th>
                                <th class="d-none d-xl-table-cell">Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($users as $u): ?>
                                <tr>
                                    <td>
                                        <?= $i; ?>
                                    </td>
                                    <td>
                                        <?= $u["nama"] ?>
                                    </td>
                                    <td class="d-none d-xl-table-cell">
                                        <?= $u["username"] ?>
                                    </td>
                                    <td class="d-none d-xl-table-cell">
                                        <?= $u["email"] ?>
                                    </td>
                                    <td><span class="badge bg-success">
                                            <?= $u["role"] ?>
                                        </span></td>
                                    <td>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <a href="user_edit.php?id=<?= $u["id_user"] ?>"
                                                class="btn btn-info text-white mt-1"><i class="align-middle"
                                                    data-feather="edit"></i></a>
                                            <a href="user_delete.php?id=<?= $u["id_user"] ?>"
                                                class="btn btn-danger text-white mt-1"
                                                onclick="return confirm('Yakin ingin menghapus <?= $u['nama']; ?>?');"><i
                                                    class="align-middle" data-feather="trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
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