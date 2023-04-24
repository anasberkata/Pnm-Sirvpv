<?php
session_start();

if (!isset($_SESSION['login'])) {
	header("Location: ../index.php");
	exit;
}

require "../functions.php";

$id_pv = $_GET["id"];

if (pv_delete($id_pv) > 0) {
	echo "
		<script>
			alert('Payment voucher berhasil dihapus!');
			document.location.href = 'pv.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('Payment voucher gagal dihapus!');
			document.location.href = pv.php';
		</script>

	";
}