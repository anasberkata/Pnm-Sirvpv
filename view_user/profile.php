<?php
session_start();
include "../templates/header.php";
?>

<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-6 col-lg-3">
                <h1 class="h3 mb-3">Profile</h1>
            </div>
            <div class="col-6 col-lg-3 text-end">
                <a href="profile_edit.php" class="btn btn-info text-white"><i class="align-middle"
                        data-feather="edit"></i>
                    Ubah</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Data Profile</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">Nama</div>
                            <div class="col-9">
                                :
                                <?= $user["nama"] ?>
                            </div>

                            <div class="col-3">E-Mail</div>
                            <div class="col-9">
                                :
                                <?= $user["email"] ?>
                            </div>

                            <div class="col-3">Username</div>
                            <div class="col-9">
                                :
                                <?= $user["username"] ?>
                            </div>

                            <div class="col-3">Role</div>
                            <div class="col-9">
                                :
                                <?= $user["role"] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
include "../templates/footer.php";
?>