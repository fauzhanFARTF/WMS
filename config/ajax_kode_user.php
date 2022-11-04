<?php
//include '../config/koneksi.php';

include 'koneksi.php';

$id_user = $_GET["id_user"];
date_default_timezone_set('Asia/Jakarta');
$today=date("Ymd");

$query = "SELECT * FROM master_user WHERE id_user = '$id_user'";
$sql = mysqli_query($conn, $query) or die(mysqli_error($conn));
$row = mysqli_fetch_array($sql);


    // $kdtransaksi = $row['kd_kolam'] . rand(0, 9999);
    $query1 = mysqli_query($conn,"SELECT max(id_user) AS last FROM master_user WHERE id_user = '$id_user'");
    $data = mysqli_fetch_array($query1);
    $lastnotransaksi = $data['last'];
    $lastnourut = substr($lastnotransaksi,2,3);
    $nextnourut = $lastnourut+1;
    // $kdtransaksi =  $row['kd_kolam'] .$today.sprintf('%04s',$nextnourut);
    $id_user =  'US'.sprintf('%04s',$nextnourut);


echo $id_user;
