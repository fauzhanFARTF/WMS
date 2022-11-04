    <?php
    session_start();
    include '../../../config/koneksi.php';
    // $conn = mysqli_connect("localhost", "root", "", "kontrakan");

    $noItem            = $_POST["no_item"];
    $nameItem           = $_POST["name_item"];
    $merk               = $_POST["merk"];
    $type               = $_POST["type"];
    $priceBuy           = $_POST["price_buy"];
    $priceSell          = $_POST["price_sell"];
    // $unit               = $_POST["unit"];
    date_default_timezone_set('Asia/Jakarta');
    $timestamp    = date('Y-m-d H:i:s'); 

    $query_idUser    = "SELECT * FROM master_item WHERE no_item = '$noItem'";
    $hasil   = mysqli_query($conn, $query_idUser) or die(mysqli_error($conn));
    $data    = mysqli_fetch_array($hasil);
    $usercreate   = $_SESSION['username'] ;
    // $password_enc = password_hash($password,PASSWORD_DEFAULT);// $password --> password yang mau diacak, $PASSWORD_DEFAULT --> algoritmanya

    $update     = "UPDATE master_item SET  name_item='$nameItem', merk='$merk', type='$type', price_buy = '$priceBuy', price_sell = '$priceSell', username = '$usercreate' , timestamp = '$timestamp' WHERE no_item='$noItem'";
    $updateuser    = mysqli_query($conn, $update) or die(mysqli_error($conn));

    if ($updateuser) {
        $_SESSION["status"] = 'success';
        $_SESSION["pesan"] = 'Data Berhasil Di Ubah';
        echo '<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL=../../../admin/admin.php?halaman=manajemen_item">';
    } else {
        $_SESSION["status"] = 'error';
        $_SESSION["pesan"] = 'Data Gagal Di Ubah';
        echo '<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL=../../../admin/admin.php?halaman=manajemen_item">';
    }

    ?>