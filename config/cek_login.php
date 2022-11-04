<?php
include '../index.php';
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

if ($level == 'Admin') {

    $login = mysqli_query($conn, "SELECT * FROM master_user WHERE username='$username' and stat = 'aktif'");
    $cek = mysqli_num_rows($login);
    $data = mysqli_fetch_assoc($login);

        if ($cek > 0) {
            if(password_verify($password, $data["password"])) {  // cek sebuah string sama gak dengan hash nya
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['level'] = $data['level'];

                $_SESSION["status"] = 'success';
                $_SESSION["pesan"] = 'Selamat datang '. $username;

                echo '<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL='.$domain.'wms/admin/admin.php?halaman=awal">';
                // echo '<script language="javascript">alert("Anda berhasil Login Admin!"); document.location="../admin/admin.php?halaman=awal";</script>';
                // header("location:../admin/admin.php?halaman=awal");
            }
        } else {

            echo "<script>window.alert('Username atau Password anda salah.');</script>";
            echo '<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL='.$domain.'wms/admin/">';
            // echo '<script language="javascript">alert("Username atau Password anda salah."); document.location="../admin/admin.php?halaman=awal";</script>';
            // header("location:../admin/admin.php?halaman=awal");
        }
    }

if ($level == 'Manager') {

    $login = mysqli_query($conn, "SELECT * FROM tm_user WHERE username='$username'");
    $cek = mysqli_num_rows($login);
    $data = mysqli_fetch_assoc($login);

        if ($cek > 0) {
            if(password_verify($password, $data["password"])) {  // cek sebuah string sama gak dengan hash nya
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['level'] = $data['level'];

                $_SESSION["status"] = 'success';
                $_SESSION["pesan"] = 'Selamat datang '. $username;

                echo '<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL='.$domain.'wms/manager/manager.php?halaman=awal">';
                // echo '<script language="javascript">alert("Anda berhasil Login Admin!"); document.location="../admin/admin.php?halaman=awal";</script>';
                // header("location:../admin/admin.php?halaman=awal");
            }
        } else {

            echo "<script>window.alert('Username atau Password anda salah.');</script>";
            echo '<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL='.$domain.'wms/manager/">';
            // echo '<script language="javascript">alert("Username atau Password anda salah."); document.location="../admin/admin.php?halaman=awal";</script>';
            // header("location:../admin/admin.php?halaman=awal");
        }
    }

if ($level == 'member') {

    $login = mysqli_query($conn, "SELECT * FROM tm_user WHERE username='$username'");
    $cek = mysqli_num_rows($login);
    $data = mysqli_fetch_assoc($login);


        if ($cek > 0) {
            if(password_verify($password, $data["password"])) {  // cek sebuah string sama gak dengan hash nya
                session_start();
                $_SESSION['nik'] = $data['nik'];
                $_SESSION['username'] = $username;
                $_SESSION['namalengkap'] = $data['nama_lengkap'];
                $_SESSION['alamat'] = $data['alamat'];
                $_SESSION['notelp'] = $data['no_telp'];
                $_SESSION['level'] = $data['level'];

                $_SESSION["status"] = 'success';
                $_SESSION["pesan"] = 'Selamat datang '. $username .' !';
                echo '<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL='.$domain.'wms/page/member.php">';
                // echo '<script language="javascript">alert("Selamat datang member!"); document.location="http://localhost/wms/page/member.php";</script>';
                // header("location:http://localhost/wms/");
            }
        } else {

            echo "<script>window.alert('Username atau Password anda salah.');</script>";
            echo '<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL='.$domain.'wms/page/member.php">';
        }
}

