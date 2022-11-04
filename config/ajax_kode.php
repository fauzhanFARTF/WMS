<?php
//include '../config/koneksi.php';

include 'koneksi.php';

$id_unit = $_GET["id_unit"];
date_default_timezone_set('Asia/Jakarta');
$today=date("Ymd");

$query = "SELECT * FROM tm_unit WHERE id_unit = '$id_unit'";
$sql = mysqli_query($conn, $query) or die(mysqli_error($conn));
$row = mysqli_fetch_array($sql);

if ($id_unit == 1) {
    // $kdtransaksi = $row['kd_kolam'] . rand(0, 9999);
    $query1 = mysqli_query($conn,"SELECT max(kd_transaksi) AS last FROM td_pesanan WHERE kd_transaksi LIKE '$today%'");
    $data = mysqli_fetch_array($query1);
    $lastnotransaksi = $data['last'];
    $lastnourut = substr($lastnotransaksi,8,4);
    $nextnourut = $lastnourut+1;
    // $kdtransaksi =  $row['kd_kolam'] .$today.sprintf('%04s',$nextnourut);
    $kdtransaksi =  $today.sprintf('%04s',$nextnourut);
} else {
    // $kdtransaksi = $row['kd_kolam'] . rand(0, 9999);
        $query1 = mysqli_query($conn,"SELECT max(kd_transaksi) AS last FROM td_pesanan WHERE kd_transaksi LIKE '$today%'");
        $data = mysqli_fetch_array($query1);
        $lastnotransaksi = $data['last'];
        $lastnourut = substr($lastnotransaksi,8,4);
        $nextnourut = $lastnourut+1;
        // $kdtransaksi = $row['kd_kolam']. $today.sprintf('%04s',$nextnourut);
        $kdtransaksi =  $today.sprintf('%04s',$nextnourut);
}

echo $kdtransaksi;
