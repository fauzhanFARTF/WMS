<?php

session_start();
// error_reporting(0);

include '../../../config/koneksi.php';
$noItem            = $_POST["no_item"];
$nameItem           = $_POST["name_item"];
$merk               = $_POST["merk"];
$type               = $_POST["type"];
$priceBuy           = $_POST["price_buy"];
$priceSell          = $_POST["price_sell"];
$unit               = $_POST["unit"];
date_default_timezone_set('Asia/Jakarta');
$timestamp          = date('Y-m-d H:i:s'); 

$usercreate        = $_SESSION['username'];
$password_enc = password_hash($password,PASSWORD_DEFAULT);// $password --> password yang mau diacak, $PASSWORD_DEFAULT --> algoritmanya


$insert = "INSERT INTO master_item VALUES ('$noItem','$nameItem','$merk', '$type', '$priceBuy', '$priceSell', '$unit', '$usercreate', '$timestamp')";

$simpan = mysqli_query($conn, $insert) or die(mysqli_error($conn));

if ($simpan) {
    $_SESSION["status"] = 'success';
    $_SESSION["pesan"] = 'Data Berhasil Ditambah';
    echo '<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=../../../admin/admin.php?halaman=manajemen_item">';
} else {
    $_SESSION["status"] = 'error';
    $_SESSION["pesan"] = 'Data Gagal Ditambah';
    echo '<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=../../../admin/admin.php?halaman=manajemen_item">';
}
