<?php
session_start();

if (isset($_SESSION['login'])) {
  header("Location: view_admin/dashboard.php");
  exit;
}

include "templates/auth_header.php";
?>

<div class="row vh-100">
  <div class="col-sm-10 col-md-8 col-lg-4 mx-auto d-table h-100">
    <div class="d-table-cell align-middle">
      <div class="text-center mt-4">
        <div class="text-center">
          <img src="assets/img/Logo Mekaar.png" alt="Charles Hall" class="img-fluid" width="200" />
        </div>
        <h1 class="h2 mt-3">SISTEM INFORMASI RVPV</h1>
        <p class="lead">PNM MEKAAR SYARIAH UNIT KADUDAMPIT</p>
      </div>

      <div class="card">
        <div class="card-body">
          <div class="m-sm-4">

            <?php if (isset($_GET["pesan"])): ?>
              <p class="alert alert-danger" style="font-style: italic; color: red; text-align: center;">
                <?= $_GET["pesan"]; ?>
              </p>
            <?php endif; ?>

            <form action="cek_login.php" method="POST">
              <div class="mb-3">
                <label class="form-label">Username</label>
                <input class="form-control form-control-lg" type="type" name="username"
                  placeholder="Masukan Username" />
              </div>
              <div class="mb-3">
                <label class="form-label">Password</label>
                <input class="form-control form-control-lg" type="password" name="password"
                  placeholder="Masukan Password" />
              </div>
              <div class="text-end mt-3">
                <button type="submit" class="btn btn-lg btn-primary">
                  Sign in
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include "templates/auth_footer.php";
?>