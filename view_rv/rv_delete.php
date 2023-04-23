<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit;
}

require "../functions.php";

$id_rv = $_GET["id"];

if (rv_delete($id_rv) > 0) {
    echo "
		<script>
			alert('Receive voucher berhasil dihapus!');
			document.location.href = 'rv.php';
		</script>
	";
} else {
    echo "
		<script>
			alert('Receive voucher gagal dihapus!');
			document.location.href = rv.php';
		</script>

	";
}