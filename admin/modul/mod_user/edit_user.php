<?php

error_reporting(0);

include '../../../config/koneksi.php';

$id_user = $_GET['id_user'];

$edit    = "SELECT * FROM master_user WHERE id_user = '$id_user'";
$hasil   = mysqli_query($conn, $edit) or die(mysqli_error($conn));
$data    = mysqli_fetch_array($hasil);
?>

<div class="col-md-10">
    <h3>
        <div align="center">Edit Info User</div>
    </h3>
    <br><br><br>
    <form class="form-horizontal" action="..\admin\modul\mod_user\update_user.php" method="POST">
        <input type="hidden" name="id_user" value="<?php echo $id_user ?>">
        <div class="form-group">
            <label class="control-label col-sm-4" for="username">Username :</label>
            <div class="col-sm-6">
                <input type="username" class="form-control" name="username" value="<?php echo $data['username']; ?>">
            </div>
        </div>
        <!-- <div class="form-group">
            <label class="control-label col-sm-4" for="password">Password :</label>
            <div class="col-sm-6">
                <input type="password" class="form-control" name="password" value="<?php echo $data['password']; ?>">
            </div>
        </div> -->
        <div class="form-group">
            <label class="control-label col-sm-4" for="nama_lengkap">Nama Lengkap :</label>
            <div class="col-sm-6">
                <textarea type="text" class="form-control" name="nama_lengkap"><?php echo $data['name']; ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="no_telp">No.Telp :</label>
            <div class="col-sm-6">
                <input type="tel" class="form-control" name="no_telp" value="<?php echo $data['no_telp']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="no_telp">Level</label>
            <div class="col-sm-6">
                <select type="level" class="form-control" name="level" value="<?php echo $data['level']; ?>">
                    <option>admin</option>
                    <option>picker</option>
                    <option>auditor</option>
                    <option>quality control</option>
                    <option>manager</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4">Status :</label>
            <div class="col-sm-6">
                <select type="level" class="form-control" name="stat">
                    <option>aktif</option>
                    <option>tidak aktif</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4"></label>
            <div class="col-sm-6" align="right">
                <button class="btn btn-danger">Update</button>
            </div>
        </div>
    </form>
</div>