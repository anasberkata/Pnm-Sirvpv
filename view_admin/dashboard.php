<?php
session_start();
include "../templates/header.php";

$rv = query("SELECT * FROM rv");
$rv_amount = query("SELECT SUM(jumlah) AS amount FROM rv_detail")[0];

$pv = query("SELECT * FROM pv");
$pv_amount = query("SELECT SUM(jumlah) AS amount FROM pv_detail")[0];

$total_rv = count($rv);
$total_pv = count($pv);
?>

<main class="content">
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3">Dashboard</h1>

    <div class="row">
      <div class="col-xl-6 col-xxl-5 d-flex">
        <div class="w-100">
          <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col mt-0">
                      <h5 class="card-title">Receive Voucher</h5>
                    </div>

                    <div class="col-auto">
                      <div class="stat text-primary">
                        <i class="align-middle" data-feather="arrow-down"></i>
                      </div>
                    </div>
                  </div>
                  <h1 class="mt-1 mb-3">
                    <?= $total_rv ?>
                  </h1>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col mt-0">
                      <h5 class="card-title">Total Receive Voucher</h5>
                    </div>

                    <div class="col-auto">
                      <div class="stat text-primary">
                        <i class="align-middle" data-feather="dollar-sign"></i>
                      </div>
                    </div>
                  </div>
                  <h1 class="mt-1 mb-3">Rp.
                    <?= number_format($rv_amount["amount"], 2, ',', '.'); ?>
                  </h1>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col mt-0">
                      <h5 class="card-title">Payment Voucher</h5>
                    </div>

                    <div class="col-auto">
                      <div class="stat text-primary">
                        <i class="align-middle" data-feather="arrow-up"></i>
                      </div>
                    </div>
                  </div>
                  <h1 class="mt-1 mb-3">
                    <?= $total_pv ?>
                  </h1>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col mt-0">
                      <h5 class="card-title">Total Payment Voucher</h5>
                    </div>

                    <div class="col-auto">
                      <div class="stat text-primary">
                        <i class="align-middle" data-feather="shopping-cart"></i>
                      </div>
                    </div>
                  </div>
                  <h1 class="mt-1 mb-3">Rp.
                    <?= number_format($pv_amount["amount"], 2, ',', '.'); ?>
                  </h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-6 col-xxl-7">
        <div class="card flex-fill">
          <div class="card-header">
            <h5 class="card-title mb-0">Calendar</h5>
          </div>
          <div class="card-body d-flex">
            <div class="align-self-center w-100">
              <div class="chart">
                <div id="datetimepicker-dashboard"></div>
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