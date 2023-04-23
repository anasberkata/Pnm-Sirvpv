<?php

// KONEKSI DATABASE =====================================================
$conn = mysqli_connect("localhost", "root", "", "db_sirvpv");


function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// USERS
function user_add($data)
{
    global $conn;

    $nama = $data["nama"];
    $email = $data["email"];
    $username = $data["username"];
    $password = $data["password"];
    $role = $data["role"];

    $image = "default.jpg";

    $date_created = date("Y-m-d");
    $is_active = 1;

    $cek_username = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    $cek_email = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");

    // Cek Username Mahasiswa Sudah Ada Atau Belum
    if (mysqli_fetch_assoc($cek_username)) {
        echo "<script>
            alert('Username Sudah Terdaftar!');
            document.location.href = 'pengguna_add.php';
            </script>";
    } else if (mysqli_fetch_assoc($cek_email)) {
        echo "<script>
            alert('Email Sudah Terdaftar!');
            document.location.href = 'pengguna_add.php';
            </script>";
    } else {
        $query = "INSERT INTO users
				VALUES
			(NULL, '$nama', '$username', '$email', '$password', '$image', '$role', '$date_created', '$is_active')
			";

        mysqli_query($conn, $query);
    }

    return mysqli_affected_rows($conn);
}

function user_edit($data)
{
    global $conn;

    $id = $data["id"];
    $nama = $data["nama"];
    $email = $data["email"];
    $username = $data["username"];
    $password = $data["password"];
    $role = $data["role"];

    $query = "UPDATE users SET
			nama = '$nama',
			email = '$email',
			username = '$username',
			password = '$password',
			role_id = '$role'

            WHERE id_user = $id
			";

    mysqli_query(
        $conn,
        $query
    );

    return mysqli_affected_rows($conn);
}

function user_delete($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM users WHERE id_user = $id");
    return mysqli_affected_rows($conn);
}

function profile_edit($data)
{
    global $conn;

    $id = $data["id"];
    $nama = $data["nama"];
    $email = $data["email"];
    $username = $data["username"];
    $password = $data["password"];
    $role = $data["role"];

    $query = "UPDATE users SET
			nama = '$nama',
			email = '$email',
			username = '$username',
			password = '$password',
			role_id = '$role'

            WHERE id_user = $id
			";

    mysqli_query(
        $conn,
        $query
    );

    return mysqli_affected_rows($conn);
}


// RECEIVE VOUCHER
function rv_add($data)
{
    global $conn;

    $rv_date = $data["rv_date"];
    $deskripsi = $data["deskripsi"];
    $id_user = $data["id_user"];

    $cek_rv = mysqli_query($conn, "SELECT rv_date FROM rv WHERE rv_date = '$rv_date'");

    // Cek Username Mahasiswa Sudah Ada Atau Belum
    if (mysqli_fetch_assoc($cek_rv)) {
        echo "<script>
            alert('Receive Voucher Sudah Ada!');
            document.location.href = 'rv_add.php';
            </script>";
    } else {
        $query = "INSERT INTO rv
				VALUES
			(NULL, '$rv_date', '$deskripsi', '$id_user')
			";

        mysqli_query($conn, $query);
    }

    return mysqli_affected_rows($conn);
}

function rv_edit($data)
{
    global $conn;

    $id_rv = $data["id_rv"];
    $rv_date = $data["rv_date"];
    $deskripsi = $data["deskripsi"];
    $id_user = $data["id_user"];

    $query = "UPDATE rv SET
			rv_date = '$rv_date',
			deskripsi = '$deskripsi',
			id_user = '$id_user'

            WHERE id_rv = $id_rv
			";

    mysqli_query(
        $conn,
        $query
    );

    return mysqli_affected_rows($conn);
}

function rv_delete($id_rv)
{
    global $conn;

    $rv_delete = mysqli_query($conn, "DELETE FROM rv WHERE id_rv = $id_rv");
    $rvd_delete = mysqli_query($conn, "DELETE FROM rv_detail WHERE id_rv = $id_rv");

    // rvd_delete($id_rv);

    return mysqli_affected_rows($conn);
}

function rvd_delete($id_rv)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM rv_detail WHERE id_rv = $id_rv");
    return mysqli_affected_rows($conn);
}

function rv_detail_add($data)
{
    global $conn;

    $id_rv = $data["id_rv"];
    $drcr = $data["drcr"];
    $nama_akun = $data["nama_akun"];
    $no_akun = $data["no_akun"];
    $jumlah = $data["jumlah"];

    $query = "INSERT INTO rv_detail
				VALUES
			(NULL, '$id_rv', '$drcr', '$nama_akun', '$no_akun', '$jumlah')
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function rv_detail_edit($data)
{
    global $conn;

    $id_rvd = $data["id_rvd"];
    $drcr = $data["drcr"];
    $nama_akun = $data["nama_akun"];
    $no_akun = $data["no_akun"];
    $jumlah = $data["jumlah"];

    $query = "UPDATE rv_detail SET
			drcr = '$drcr',
			nama_akun = '$nama_akun',
			no_akun = '$no_akun',
			jumlah = '$jumlah'

            WHERE id_rv_detail = $id_rvd
			";

    mysqli_query(
        $conn,
        $query
    );

    return mysqli_affected_rows($conn);
}

function rv_detail_delete($id_rvd)
{
    global $conn;

    $rvd_delete = mysqli_query($conn, "DELETE FROM rv_detail WHERE id_rv_detail = $id_rvd");

    return mysqli_affected_rows($conn);
}