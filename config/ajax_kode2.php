<?php
//include '../config/koneksi.php';

include 'koneksi.php';

$no_item = $_GET["no_item"];
$today=date("Ymd");

$query = "SELECT * FROM master_item WHERE no_item = '$no_item'";
$sql = mysqli_query($conn, $query) or die(mysqli_error($conn));
$row = mysqli_fetch_array($sql);

$noItem = $row['no_item'];
$nameItem = $row['name_item'];

echo $nameItem;


?>