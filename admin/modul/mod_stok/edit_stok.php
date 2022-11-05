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
    <?php 
        // mengambil data barang dengan kode paling besar
            $query2 = mysqli_query($conn, "SELECT max(id_stock) as last, no_item FROM master_stock WHERE no_item = '$noItem'");
            $data2 = mysqli_fetch_array($query2);
            $kodeItem = $data2['no_item'];

            date_default_timezone_set('Asia/Jakarta');
            $timestamp  = date('Ym'); 
            
            $kodeStock = $timestamp.$kodeItem;
            
        ?>

        <div class="form-group">
            <label class="control-label col-sm-4" for="no_rek">Kode Stok :</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="id_stock" value="<?= $data['id_stock']; ?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="bank">Kode Item :</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="no_item" value="<?= $data['no_item']; ?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="atas_nama">Nama Item :</label>
            <div class="col-sm-6">
                <textarea name="name_item" id="nameItem" class="form-control" cols="1" rows="5" placeholder="Nama Item" required readonly><?= $data['name_item']; ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="atas_nama">Kode Rak :</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="id_loc" value="<?= $data['id_loc']; ?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="atas_nama">Stock Awal :</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="qty_awal" value="<?php echo $data['qty_awal']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4"></label>
            <div class="col-sm-3" align="right">
                <button class="btn btn-success">Update</button>
                <button class="btn btn-danger">Delete</button>
            </div>
        </div>
    </form>
</div>