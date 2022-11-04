<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>window.alert('Untuk mengakses, Anda harus Login Sebagai Admin');
        window.location=('../admin/index.php')</script>";
}

$level = $_SESSION["level"];

if ($level != "admin") {
    echo "Anda tidak punya akses pada halaman admin";
    exit;
}
