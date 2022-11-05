    <?php
    // session_start();
    // $id_user = $_GET['id_user'];
    // include '../../../config/koneksi.php';

    // $hapus      = "DELETE FROM master_user WHERE id_user=$id_user";
    // $query     = mysqli_query($conn, $hapus);

    // if ($query) {
    //     $_SESSION["status"] = 'success';
    //     $_SESSION["pesan"] = 'Data Berhasil Dihapus';
    //     echo "<META HTTP-EQUIV='REFRESH' CONTENT ='0; URL=../../../admin/admin.php?halaman=manajemen_user'>";
    // } else {
    //     $_SESSION["status"] = 'error';
    //     $_SESSION["pesan"] = 'Data Gagal Dihapus';
    //     echo "<META HTTP-EQUIV='REFRESH' CONTENT ='0; URL=../../../admin/admin.php?halaman=manajemen_user'>";
    // }

    session_start();
    include '../../../config/koneksi.php';
    // $conn = mysqli_connect("localhost", "root", "", "kontrakan");

    $id_user          = $_GET['id_user'];
    echo $id_user;
    date_default_timezone_set('Asia/Jakarta');
    $timestamp    = date('Y-m-d H:i:s'); 
    $usercreate   = 'admin_'.$_SESSION['username'] ;
    $status = 'Resign';
    // $password_enc = password_hash($password,PASSWORD_DEFAULT);// $password --> password yang mau diacak, $PASSWORD_DEFAULT --> algoritmanya

    $update     = "UPDATE master_user SET timestamp = '$timestamp', id_create = '$usercreate', status = '$status' WHERE id_user='$id_user'";
    $updateuser = mysqli_query($conn, $update) or die(mysqli_error($conn));

    if ($updateuser) {
        $_SESSION["status"] = 'success';
        $_SESSION["pesan"] = 'Data Berhasil Di Ubah';
        echo '<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL=../../../admin/admin.php?halaman=manajemen_user">';
    } else {
        $_SESSION["status"] = 'error';
        $_SESSION["pesan"] = 'Data Gagal Di Ubah';
        echo '<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL=../../../admin/admin.php?halaman=manajemen_user">';
    }

    ?>