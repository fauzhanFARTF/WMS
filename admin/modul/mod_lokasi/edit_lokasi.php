<?php

error_reporting(0);

include '../../../config/koneksi.php';

$idLoc = $_GET['id_loc'];

$edit    = "SELECT * FROM master_location WHERE id_loc = '$idLoc'";
$hasil   = mysqli_query($conn, $edit) or die(mysqli_error($conn));
$data    = mysqli_fetch_array($hasil);
?>

<div class="col-md-10">
    <h3>
        <div align="center">Edit Info Rak</div>
    </h3>
    <br><br><br>
    <form enctype="multipart/form-data" class="form-horizontal" action="..\admin\modul\mod_lokasi\update_lokasi.php" method="POST">
        
        <div class="form-group">
            <label class="control-label col-sm-4" for="title">Kode Rak :</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="id_loc" value="<?= $idLoc ?>" readonly required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="title">Nama Rak :</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="name_loc" value="<?= $data['name_loc']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="detail">Detail :</label>
            <div class="col-sm-6">
                <textarea rows='3' type="text" class="form-control" name="detail" value=""><?php echo $data['description']; ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="pic">Picture :</label>
            <div class="col-sm-6">
                <img src="../uploads/<?php echo $data['pic']; ?>" class="img-thumbnail" alt="Cinque Terre"><br><br>
                <p3>Pilih Gambar :</p3><br><br>
                <input type="file" class="form-control" name="pic" id="pic">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="kapasitas">Kapasitas :</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name="kapasitas" value="<?php echo $data['capacity']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4"></label>
            <div class="col-sm-6" align="right">
                <button class="btn btn-danger" name="submit">Update</button>
            </div>
        </div>
    </form>
</div>