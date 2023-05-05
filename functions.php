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
            document.location.href = 'user_add.php';
            </script>";
    } else if (mysqli_fetch_assoc($cek_email)) {
        echo "<script>
            alert('Email Sudah Terdaftar!');
            document.location.href = 'user_add.php';
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

    rvd_delete($id_rv);
    $rv_delete = mysqli_query($conn, "DELETE FROM rv WHERE id_rv = $id_rv");

    // rvd_delete($id_rv);

    return mysqli_affected_rows($conn);
}

function rvd_delete($id_rv)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM rv_detail WHERE id_rv = $id_rv");
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




// PAYMENT VOUCHER
function pv_add($data)
{
    global $conn;

    $pv_date = $data["pv_date"];
    $nama_bank = $data["nama_bank"];
    $no_bank = $data["no_bank"];
    $deskripsi = $data["deskripsi"];
    $pnm_bilyet = $data["pnm_bilyet"];
    $id_user = $data["id_user"];

    $cek_pv = mysqli_query($conn, "SELECT pv_date FROM pv WHERE pv_date = '$pv_date'");

    // Cek Username Mahasiswa Sudah Ada Atau Belum
    if (mysqli_fetch_assoc($cek_pv)) {
        echo "<script>
            alert('Payment Voucher Sudah Ada!');
            document.location.href = 'pv_add.php';
            </script>";
    } else {
        $query = "INSERT INTO pv
				VALUES
			(NULL, '$pv_date', '$nama_bank', '$no_bank', '$deskripsi', '$pnm_bilyet', '$id_user')
			";

        mysqli_query($conn, $query);
    }

    return mysqli_affected_rows($conn);
}

function pv_edit($data)
{
    global $conn;

    $id_pv = $data["id_pv"];
    $pv_date = $data["pv_date"];
    $nama_bank = $data["nama_bank"];
    $no_bank = $data["no_bank"];
    $deskripsi = $data["deskripsi"];
    $pnm_bilyet = $data["pnm_bilyet"];
    $id_user = $data["id_user"];

    $query = "UPDATE pv SET
			pv_date = '$pv_date',
			nama_bank = '$nama_bank',
			no_bank = '$no_bank',
			deskripsi = '$deskripsi',
			pnm_bilyet = '$pnm_bilyet',
			id_user = '$id_user'

            WHERE id_pv = $id_pv
			";

    mysqli_query(
        $conn,
        $query
    );

    return mysqli_affected_rows($conn);
}

function pv_delete($id_pv)
{
    global $conn;

    pvd_delete($id_pv);
    $pv_delete = mysqli_query($conn, "DELETE FROM pv WHERE id_pv = $id_pv");

    // pvd_delete($id_pv);

    return mysqli_affected_rows($conn);
}

function pvd_delete($id_pv)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM pv_detail WHERE id_pv = $id_pv");
}

function pv_detail_add($data)
{
    global $conn;

    $id_pv = $data["id_pv"];
    $drcr = $data["drcr"];
    $nama_akun = $data["nama_akun"];
    $no_akun = $data["no_akun"];
    $jumlah = $data["jumlah"];

    $query = "INSERT INTO pv_detail
				VALUES
			(NULL, '$id_pv', '$drcr', '$nama_akun', '$no_akun', '$jumlah')
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function pv_detail_edit($data)
{
    global $conn;

    $id_pvd = $data["id_pvd"];
    $drcr = $data["drcr"];
    $nama_akun = $data["nama_akun"];
    $no_akun = $data["no_akun"];
    $jumlah = $data["jumlah"];

    $query = "UPDATE pv_detail SET
			drcr = '$drcr',
			nama_akun = '$nama_akun',
			no_akun = '$no_akun',
			jumlah = '$jumlah'

            WHERE id_pv_detail = $id_pvd
			";

    mysqli_query(
        $conn,
        $query
    );

    return mysqli_affected_rows($conn);
}

function pv_detail_delete($id_pvd)
{
    global $conn;

    $pvd_delete = mysqli_query($conn, "DELETE FROM pv_detail WHERE id_pv_detail = $id_pvd");

    return mysqli_affected_rows($conn);
}