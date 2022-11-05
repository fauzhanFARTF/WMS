<?php
session_start();
error_reporting(0);

include '../../../config/koneksi.php';

$thbl       = $_POST["thbl"];
$noItem   = $_POST["no_item"];
$kodeStock = $_POST["thbl"] . $_POST["no_item"];
$idLoc = $_POST["id_loc"];
$qtyAwal = $_POST["qty_awal"];
$status = 'on';
date_default_timezone_set('Asia/Jakarta');
$timestamp          = date('Y-m-d H:i:s'); 

$usercreate        = $_SESSION['username'];

$insert = "INSERT INTO master_stock VALUES ('$kodeStock', '$noItem','$idLoc', '$qtyAwal', 0, 0, '$qtyAwal', null, 'on','$usercreate','$timestamp')";

$simpan = mysqli_query($conn, $insert) or die(mysqli_error($conn));

if ($simpan) {
    $_SESSION["status"] = 'success';
    $_SESSION["pesan"] = 'Data Berhasil Ditambah';
    echo '<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=../../../admin/admin.php?halaman=manajemen_stok">';
} else {
    $_SESSION["status"] = 'error';
    $_SESSION["pesan"] = 'Data Gagal Ditambah cek Ddata yang Ada';
    echo '<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=../../../admin/admin.php?halaman=manajemen_stok">';
}

?>

<!-- <META HTTP-EQUIV="REFRESH" CONTENT="0; URL=../../../admin/admin.php?halaman=manajemen_rekening"> -->