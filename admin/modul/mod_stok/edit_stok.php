<?php

error_reporting(0);

include '../../../config/koneksi.php';

$idStock = $_GET['id_stock'];
$edit    = "SELECT * FROM master_stock LEFT JOIN master_item ON master_stock.no_item = master_item.no_item WHERE master_stock.id_stock = '$idStock'";
$hasil   = mysqli_query($conn, $edit) or die(mysqli_error($conn));
$data    = mysqli_fetch_array($hasil);
?>

<div class="col-md-10">
    <h3>
        <div align="center">Manajemen Stok Opname</div>
    </h3>
    <br>
    <form class="form-horizontal" action="..\admin\modul\mod_stok\update_stok.php" method="POST">


        <div class="form-group">
            <label class="control-label col-sm-4" for="no_rek">Kode Stok :</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="id_stock" value="<?= $data['id_stock']; ?>" readonly>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="id_stock2" value="<?= $data['id_stock']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="bank">Kode Item :</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="no_item" value="<?= $data['no_item']; ?>" readonly>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="no_item2" value="<?= $data['no_item']; ?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="atas_nama">Nama Item :</label>
            <div class="col-sm-3">
                <textarea name="name_item" id="nameItem" class="form-control" cols="1" rows="5" placeholder="Nama Item" required readonly><?= $data['name_item']; ?></textarea>
            </div>
            <div class="col-sm-3">
                <textarea name="name_item2" id="nameItem2" class="form-control" cols="1" rows="5" placeholder="Nama Item" required readonly><?= $data['name_item']; ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="atas_nama">Kode Rak :</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="id_loc" value="<?= $data['id_loc']; ?>" readonly>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="id_loc2" value="<?= $data['id_loc']; ?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="atas_nama">Stock Awal :</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="qty_awal" value="<?php echo $data['qty_awal']; ?>" readonly>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="qty_awal2" value="<?= $data['qty_now']; ?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="atas_nama">Qty In :</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="qty_in" value="<?= $data['qty_in']; ?>" readonly>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="qty_in2" value="0" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="atas_nama">Qty Out :</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="qty_out" value="<?= $data['qty_out']; ?>" readonly>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="qty_out2" value="0" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="atas_nama">Current Stock :</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="qty_now" value="<?= $data['qty_now']; ?>" readonly>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="qty_now2" value="<?= $data['qty_now']; ?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="atas_nama">Qty Actual :</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="qty_actual" value="<?= $data['qty_actual']; ?>" readonly>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="qty_actual2" value="0" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4"></label>
            <div class="col-sm-6" align="right">
                <button class="btn btn-danger">Stock Opname</button>
            </div>
        </div>
    </form>
</div>