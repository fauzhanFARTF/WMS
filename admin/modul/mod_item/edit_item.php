<?php

error_reporting(0);

include '../../../config/koneksi.php';

$noItem = $_GET['no_item'];

$edit    = "SELECT * FROM master_item WHERE no_item = '$noItem'";
$hasil   = mysqli_query($conn, $edit) or die(mysqli_error($conn));
$data    = mysqli_fetch_array($hasil);
?>

<div class="col-md-10">
    <h3>
        <div align="center">Edit Info Item</div>
    </h3>
    <br><br><br>
    <form class="form-horizontal" action="..\admin\modul\mod_item\update_item.php" method="POST">
        
        <div class="form-group">
            <label class="control-label col-sm-4" for="username">Kode Item :</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="no_item" value="<?= $noItem ?>" required readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="name">Nama Item :</label>
            <div class="col-sm-6">
                <textarea type="text" class="form-control" name="name_item"><?= $data['name_item']; ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="">Merk :</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="merk" value="<?= $data['merk']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="type">Type</label>
            <div class="col-sm-6">
                <select type="level" class="form-control" name="type" value="<?= $data['type']; ?>">
                    <option>Pakaian Anak</option>
                    <option>Pakaian Pria</option>
                    <option>Pakaian Wanita</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4">Harga Beli :</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name="price_buy" value="<?= $data['price_buy']; ?>" placeholder="Harga Beli">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4">Harga Jual :</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name="price_sell" value="<?= $data['price_sell']; ?>" placeholder="Harga Jual">
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