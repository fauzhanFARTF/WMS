<?php
// include '../config/koneksi.php';
include 'koneksi.php';
$kd_transaksi = $_GET['kd_transaksi'];
$query = "SELECT * FROM td_pesanan JOIN tm_user ON td_pesanan.nik = tm_user.nik JOIN tm_unit ON td_pesanan.id_unit = tm_unit.id_unit WHERE td_pesanan.kd_transaksi = '$kd_transaksi' AND td_pesanan.status = 'Proses Pemesanan' ";
$sql = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($sql)) {
    $data[] = $row;
}

echo json_encode($data);
