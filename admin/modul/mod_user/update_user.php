    <?php
    session_start();
    include '../../../config/koneksi.php';
    // $conn = mysqli_connect("localhost", "root", "", "kontrakan");

    $id_user          = $_POST['id_user'];
    $username     = $_POST['username'];
    $password     = $_POST['password'];
    $namalengkap  = $_POST['nama_lengkap'];
    $notelp       = $_POST['no_telp'];
    $level        = $_POST["level"];
    $status        = $_POST["stat"];
    date_default_timezone_set('Asia/Jakarta');
    $timestamp    = date('Y-m-d H:i:s'); 
    $usercreate   = $_SESSION['username'] ;
    // $password_enc = password_hash($password,PASSWORD_DEFAULT);// $password --> password yang mau diacak, $PASSWORD_DEFAULT --> algoritmanya

    $update     = "UPDATE master_user SET username='$username', name='$namalengkap', no_telp='$notelp', level='$level', timestamp = '$timestamp', id_create = '$usercreate' ,stat = '$status' WHERE id_user='$id_user'";
    $updateuser    = mysqli_query($conn, $update) or die(mysqli_error($conn));

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