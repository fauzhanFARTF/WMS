<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>window.alert('Untuk mengakses, Anda harus Login Sebagai Manager');
        window.location=('../manager/index.php')</script>";
}

$level = $_SESSION["level"];

if ($level != "manager") {
    echo "Anda tidak punya akses pada halaman manager";
    exit;
}
