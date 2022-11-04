<?php

session_start();
// error_reporting(0);

include '../../../config/koneksi.php';
$id_user            = $_POST["id_user"];
$username       = $_POST["username"];
$password       = $_POST["password"];
$namalengkap    = $_POST["nama_lengkap"];
$notelp         = $_POST["no_telp"];
$level          = $_POST["level"];
date_default_timezone_set('Asia/Jakarta');
$timestamp      = date('Y-m-d H:i:s'); 
$status         = $_POST["stat"];

$usercreate        = $_SESSION['username'];
$password_enc = password_hash($password,PASSWORD_DEFAULT);// $password --> password yang mau diacak, $PASSWORD_DEFAULT --> algoritmanya


$insert = "INSERT INTO master_user VALUES ('$id_user','$username','$password_enc', '$namalengkap', '$level', '$notelp', '$usercreate', '$timestamp', '$status')";

$simpan = mysqli_query($conn, $insert) or die(mysqli_error($conn));

if ($simpan) {
    $_SESSION["status"] = 'success';
    $_SESSION["pesan"] = 'Data Berhasil Ditambah';
    echo '<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=../../../admin/admin.php?halaman=manajemen_user">';
} else {
    $_SESSION["status"] = 'error';
    $_SESSION["pesan"] = 'Data Gagal Ditambah';
    echo '<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=../../../admin/admin.php?halaman=manajemen_user">';
}
