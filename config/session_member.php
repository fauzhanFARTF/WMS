<?php
error_reporting(0);
session_start();

if (!isset($_SESSION['username'])) {
    // header('location:http://localhost/kontrakan/');
    echo '<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL='.$domain.'kontrakan/">';
}

$level = $_SESSION["level"];

if ($level != "member") {
    session_destroy();
    // header('location:http://localhost/kontrakan/');
    echo '<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL='.$domain.'kontrakan/">';
    // echo '<META HTTP-EQUIV="REFRESH" CONTENT="20; URL=http://localhost/kontrakan/">';
    // echo "<script>window.alert('Untuk mengakses, Anda harus Login');
    //    window.location=('page/loguot.php')</script>";
    // echo "maaf anda bukan member";
    // exit;
} elseif ($level == "member") {
}
