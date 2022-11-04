    <?php
    // error_reporting(0);
    session_start();
    include '../../../config/koneksi.php';

    $kd_transaksi       = $_POST['kd_transaksi'];
    $id_unit           = $_POST['id_unit'];
    $nik                = $_POST['nik'];
    date_default_timezone_set('Asia/Jakarta');
    $timestamp          = date('Y-m-d H:i:s'); 
    $date               = date('H:i:s');             // set date otomatis
    $tanggal            = strtotime($_POST['tanggal']);
    $tgl                = date('Y-m-d', $tanggal);
    $jml_org            = $_POST['jml_org'];
    $total_harga        = $_POST['total_harga'];
    $usercreate         = "member_".$_SESSION['username'];

// cek kontrakan/kapasitas kontrakan
$upque = "SELECT * FROM tm_unit WHERE id_unit = '$id_unit'";
$sql = mysqli_query($conn, $upque) or die(mysqli_error($conn));
$row = mysqli_fetch_array($sql);
$kapasitas = $row["kapasitas"] - $jml_org;

if($nama_lengkap = "" ){
     $_SESSION["status"] = 'error';
    $_SESSION["pesan"] = 'Data Gagal Ditambah';
    echo '<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL=../../../admin/admin.php?halaman=manajemen_pesanan">';
} else {
    if ($id_unit == 1) {
        if ($kapasitas <= 0) {
            $_SESSION["status"] = 'warning';
            $_SESSION["pesan"] = 'Gagal di tambahkan kapasitas penuh';
            echo '<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL=../../../admin/admin.php?halaman=manajemen_pesanan">';
            // echo "<script type='text/javascript'>alert('Gagal di tambahkan kapasitas penuh!');history.go(-1);</script>";

        } else {
            $kol = "UPDATE tm_unit SET kapasitas='$kapasitas' WHERE id_unit='$id_unit'";
            $sql2 = mysqli_query($conn, $kol) or die(mysqli_error($conn));
    
                $insert = "INSERT INTO td_pesanan VALUES ('$kd_transaksi','$id_unit', '$nik', '$jml_org', '$total_harga', '$tgl', 'Proses Pemesanan', '$timestamp','$usercreate')";
                $simpan = mysqli_query($conn, $insert) or die(mysqli_error($conn));
                if ($simpan) {
                    $_SESSION["status"] = 'success';
                    $_SESSION["pesan"] = 'Data Berhasil Ditambah';
                    echo '<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL=../../../admin/admin.php?halaman=manajemen_pesanan">';
                } else {
                    $_SESSION["status"] = 'error';
                    $_SESSION["pesan"] = 'Data Gagal Ditambah';
                    echo '<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL=../../../admin/admin.php?halaman=manajemen_pesanan">';
                }
        }
    } else {

        if ($kapasitas <= 0) {
            $_SESSION["status"] = 'warning';
            $_SESSION["pesan"] = 'Gagal di tambahkan kapasitas penuh';
            echo "<META HTTP-EQUIV='REFRESH' CONTENT ='0; URL=../../../admin/admin.php?halaman=manajemen_pesanan'>";
            // echo "<script type='text/javascript'>alert('Gagal di tambahkan kapasitas penuh!');history.go(-1);</script>";
        } else {
            $kol = "UPDATE tm_unit SET kapasitas='$kapasitas' WHERE id_unit='$id_unit'";
            $sql2 = mysqli_query($conn, $kol) or die(mysqli_error($conn));

                $insert = "INSERT INTO td_pesanan VALUES ('$kd_transaksi','$id_unit', '$nik', '$jml_org', '$total_harga', '$tgl', 'Proses Pemesanan', '$timestamp','$usercreate')";
                $simpan = mysqli_query($conn, $insert) or die(mysqli_error($conn));
                if ($simpan) {
                    $_SESSION["status"] = 'success';
                    $_SESSION["pesan"] = 'Data Berhasil Ditambah';
                    echo "<META HTTP-EQUIV='REFRESH' CONTENT ='0; URL=../../../admin/admin.php?halaman=manajemen_pesanan'>";
                } else {
                    $_SESSION["status"] = 'error';
                    $_SESSION["pesan"] = 'Data Gagal Ditambah';
                    echo "<META HTTP-EQUIV='REFRESH' CONTENT ='0; URL=../../../admin/admin.php?halaman=manajemen_pesanan'>";
                }
        }
    }
}