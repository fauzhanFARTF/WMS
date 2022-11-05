<?php
session_start();
include '../../../config/koneksi.php';
// $conn = mysqli_connect("localhost", "root", "", "kontrakan");

$kodeStock          = $_POST['id_stock'];
$kodeStock2         = $_POST['id_stock2'];
$noItem             = $_POST['no_item2'];
$idLoc              = $_POST['id_loc2'];
$qtyAwal2            = $_POST['qty_awal2'];
$currentStock       = $_POST['qty_now'];
$currentStock2       = $_POST['qty_now2'];
$qtyActual          = $_POST['qty_actual'];
date_default_timezone_set('Asia/Jakarta');
$timestamp          = date('Y-m-d H:i:s'); 

$usercreate        = $_SESSION['username'];

if ($currentStock != $qtyActual) {
    $_SESSION["status"] = 'error';
    $_SESSION["pesan"] = 'Data Current Stock dan Actual Berbeda';
    echo '<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL=../../../admin/admin.php?halaman=manajemen_stok">';
} else {
    $updatequery     = "UPDATE master_stock SET qty_actual = '$qtyActual',  status='off', username = '$usercreate', timestamp = '$timestamp' WHERE id_stock='$kodeStock'";
    $update    = mysqli_query($conn, $updatequery) or die(mysqli_error($conn));

    $insertquery = "INSERT INTO master_stock VALUES ('$kodeStock2', '$noItem','$idLoc', '$qtyAwal2', 0, 0, '$currentStock2', 0, 'on','$usercreate','$timestamp')";
    $insert    = mysqli_query($conn, $insertquery) or die(mysqli_error($conn));

    if ($update && $insert) {
        $_SESSION["status"] = 'success';
        $_SESSION["pesan"] = 'Data ';
        echo '<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL=../../../admin/admin.php?halaman=manajemen_stok">';
    } else {
        $_SESSION["status"] = 'error';
        $_SESSION["pesan"] = 'Data Gagal Di Uba';
        echo '<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL=../../../admin/admin.php?halaman=manajemen_stok">';
    }
}

