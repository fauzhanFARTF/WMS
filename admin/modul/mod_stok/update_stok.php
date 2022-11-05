<?php
session_start();
include '../../../config/koneksi.php';
// $conn = mysqli_connect("localhost", "root", "", "kontrakan");



$kodeStock          = $_POST['id_stock'];
$noItem             = $_POST['no_item'];
$idLoc              = $_POST['id_loc'];
$qtyAwal           = $_POST['qty_awal'];
date_default_timezone_set('Asia/Jakarta');
$timestamp          = date('Y-m-d H:i:s'); 

$usercreate        = $_SESSION['username'];



    $query = "SELECT * FROM master_stock WHERE id_stock = '$kodeStock'";
    $select    = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $data = mysqli_fetch_array($select);
    $qtyIn = $data['qty_in'];
    $qtyOut = $data['qty_out'];

    $query2 = "SELECT * FROM master_stock WHERE no_item = '$noItem'";
    $koneksi2    = mysqli_query($conn, $query2) or die(mysqli_error($conn));
    $countItem = mysqli_num_rows($koneksi2);
    // echo ($data2);

    if  ($countItem > 1) {
        $_SESSION["status"] = 'error';
        $_SESSION["pesan"] = 'Data Item Telah Mempunyai Stock Awal dari Data Sebelumnya';
        echo '<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL=../../../admin/admin.php?halaman=manajemen_stok">';
    } else if ($qtyIn != 0 or $qtyOut != 0 ) {
        $_SESSION["status"] = 'error';
        $_SESSION["pesan"] = 'Data Telah Mempunyai Transaksi Hub System Administrator';
        echo '<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL=../../../admin/admin.php?halaman=manajemen_stok">';
    } else {
        $updatequery     = "UPDATE master_stock SET qty_awal = '$qtyAwal', qty_now = '$qtyAwal', username = '$usercreate', timestamp = '$timestamp' WHERE id_stock='$kodeStock'";
        $update    = mysqli_query($conn, $updatequery) or die(mysqli_error($conn));


        if ($update) {
            $_SESSION["status"] = 'success';
            $_SESSION["pesan"] = 'Data Stock Awal Berhasil Di Ubah';
            echo '<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL=../../../admin/admin.php?halaman=manajemen_stok">';
        } else {
            $_SESSION["status"] = 'error';
            $_SESSION["pesan"] = 'Data Stock Awal Gagal Diubah';
            echo '<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL=../../../admin/admin.php?halaman=manajemen_stok">';
        }
    }

