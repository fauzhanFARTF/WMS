<?php
session_start();
include '../../../config/koneksi.php';
// $conn = mysqli_connect("localhost", "root", "", "unit");

$idLoc       = $_POST['id_loc'];
$nameLoc     = $_POST['name_loc'];
$detail      = $_POST['detail'];
$kapasitas   = $_POST['kapasitas'];
date_default_timezone_set('Asia/Jakarta');
$timestamp          = date('Y-m-d H:i:s'); 

$usercreate        = $_SESSION['username'];

$temp = $_FILES['pic']['tmp_name'];
$name = rand(0, 9999) . $_FILES['pic']['name'];
$size = $_FILES['pic']['size'];
$type = $_FILES['pic']['type'];
$folder = "../../../uploads/";


if (isset($_POST['submit'])) {

    if (empty($temp)) {

        $update     = "UPDATE master_location SET name_loc='$nameLoc', description='$detail', capacity='$kapasitas', username = '$usercreate', timestamp='$timestamp' WHERE id_loc='$idLoc'";
        $updatekolam    = mysqli_query($conn, $update) or die(mysqli_error($conn));
        if ($updatekolam) {
            $_SESSION["status"] = 'success';
            $_SESSION["pesan"] = 'Data Berhasil Di Ubah';
            echo '<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL=../../../admin/admin.php?halaman=manajemen_lokasi">';
        } else {
            $_SESSION["status"] = 'error';
            $_SESSION["pesan"] = 'Data Gagal Di Ubah';
            echo '<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL=../../../admin/admin.php?halaman=manajemen_lokasi">';
        }
    }
    //jika file/gamambar lbh besar 2mb
    elseif ($size < 2048000 and ($type == 'image/jpeg' or $type == 'image/png' or $type == "image/jpg")) {
        move_uploaded_file($temp, $folder . $name);
        $update     = "UPDATE master_location SET name_loc='$nameLoc', description='$detail', pic='$name', capacity='$kapasitas' WHERE id_loc='$idLoc'";
        $updatekolam    = mysqli_query($conn, $update) or die(mysqli_error($conn));

        if ($updatekolam) {
            $_SESSION["status"] = 'success';
            $_SESSION["pesan"] = 'Data Berhasil Di Ubah';
            echo '<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL=../../../admin/admin.php?halaman=manajemen_lokasi">';
        } else {
            $_SESSION["status"] = 'error';
            $_SESSION["pesan"] = 'Data Gagal Di Ubah';
            echo '<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL=../../../admin/admin.php?halaman=manajemen_lokasi">';
        }
    } else {
        $_SESSION["status"] = 'warning';
        $_SESSION["pesan"] = 'Gagal Upload Gambar';
        echo '<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL=../../../admin/admin.php?halaman=manajemen_kontrakan">';
    }
}
