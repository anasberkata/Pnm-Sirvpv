<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit;
}

require "../functions.php";

$id_rv = $_GET["id_rv"];
$id_rvd = $_GET["id_rvd"];

if (rv_detail_delete($id_rvd) > 0) {
    echo "
		<script>
			alert('Receive voucher berhasil dihapus!');
			document.location.href = 'rv_detail.php?id=' + $id_rv;
		</script>
	";
} else {
    echo "
		<script>
			alert('Receive voucher gagal dihapus!');
			document.location.href = rv_detail.php?id=' + $id_rv;
		</script>

	";
}