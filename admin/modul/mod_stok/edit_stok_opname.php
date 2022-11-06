<?php

error_reporting(0);

include '../../../config/koneksi.php';

$idStock = $_GET['id_stock'];
$edit    = "SELECT * FROM master_stock LEFT JOIN master_item ON master_stock.no_item = master_item.no_item WHERE master_stock.id_stock = '$idStock'";
$hasil   = mysqli_query($conn, $edit) or die(mysqli_error($conn));
$data    = mysqli_fetch_array($hasil);

$noItem = $data['no_item'];
?>

<div class="col-md-10">
    <h3>
        <div align="center">Manajemen Stok Opname</div>
    </h3>
    <br>
    <form class="form-horizontal" action="..\admin\modul\mod_stok\update_stok_opname.php" method="POST">
    <?php 
        // mengambil data barang dengan kode paling besar
            $query2 = mysqli_query($conn, "SELECT max(id_stock) as last, no_item FROM master_stock WHERE no_item = '$noItem'");
            $data2 = mysqli_fetch_array($query2);
            $kodeItem = $data2['no_item'];
            $kodeStock = $data2["last"];

            date_default_timezone_set('Asia/Jakarta');
            // $thblCurrent  = date('Ym'); 
            $thblLast = (int) substr($kodeStock, 0, 6);
            $blLast = (int) substr($kodeStock, 4, 6);
            $thLast = (int) substr($kodeStock, 0, 4);

            
            if ($blLast + 1 == 13){
                $blLast = '01';
                $thLast += 1;
                $thblNext = $thLast . $blLast;
                echo $thblNext;
            } else {
                $blLast+=1;
                $thblNext = $thLast . $blLast;
                echo $thblNext;
            };
            
        ?>

        <div class="form-group">
            <label class="control-label col-sm-4" for="no_rek">Kode Stok :</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="id_stock" value="<?= $data['id_stock']; ?>" readonly>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="id_stock2" value="<?= $thblNext . $kodeItem ?>" readonly>
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
                <input type="text" class="form-control" name="qty_actual" value="<?= $data['qty_actual']; ?>" required>
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