<?php
error_reporting(0);

session_start();
session_destroy();

include "../index.php";
echo '<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL='.$domain.'wms/admin">';
// header("location:http://localhost/kontrakan/");
