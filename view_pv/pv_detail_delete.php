<?php
session_start();

if (!isset($_SESSION['login'])) {
	header("Location: ../index.php");
	exit;
}

require "../functions.php";

$id_pv = $_GET["id_pv"];
$id_pvd = $_GET["id_pvd"];

if (pv_detail_delete($id_pvd) > 0) {
	echo "
		<script>
			alert('Payment voucher berhasil dihapus!');
			document.location.href = 'pv_detail.php?id=' + $id_pv;
		</script>
	";
} else {
	echo "
		<script>
			alert('Payment voucher gagal dihapus!');
			document.location.href = pv_detail.php?id=' + $id_pv;
		</script>

	";
}