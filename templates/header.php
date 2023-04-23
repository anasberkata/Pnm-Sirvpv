<?php
if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit;
}

require "../functions.php";

$id = $_SESSION['id'];
$user = query(
    "SELECT * FROM users
    -- INNER JOIN jabatan ON users.jabatan = jabatan.id_jabatan
    INNER JOIN users_role ON users.role_id = users_role.id_role
    WHERE id_user = $id"
)[0];

ini_set('display_errors', 1); //Atauerror_reporting(E_ALL && ~E_NOTICE);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="PNM Mekaar" />
    <meta name="author" content="Neng Satira" />
    <meta name="keywords" content="PNM, Mekaar" />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="shortcut icon" href="../assets/img/Logo Mekaar.png" />

    <title>PNM Mekaar Syariah - Kadudampit</title>

    <link href="../assets/css/app.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <?php
        include "sidebar.php";
        include "topbar.php";
        ?>