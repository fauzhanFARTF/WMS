<?php
session_start();
include '../../../config/koneksi.php';

$id_unit = $_GET['id_unit'];

$hapus      = "DELETE FROM tm_unit WHERE id_unit='$id_unit'";
$query     = mysqli_query($conn, $hapus);

if ($query) {
    $_SESSION["status"] = 'success';
    $_SESSION["pesan"] = 'Data Berhasil Dihapus';
    echo "<META HTTP-EQUIV='REFRESH' CONTENT ='0; URL=../../../admin/admin.php?halaman=manajemen_kontrakan'>";
} else {
    $_SESSION["status"] = 'error';
    $_SESSION["pesan"] = 'Data Gagal Dihapus';
    echo "<META HTTP-EQUIV='REFRESH' CONTENT ='0; URL=../../../admin/admin.php?halaman=manajemen_kontrakan'>";
}
