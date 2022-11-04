<?php

error_reporting(0);

include '../../../config/koneksi.php';

$kd_transaksi = $_GET['kd_transaksi'];

$edit    = "SELECT * FROM td_pesanan JOIN tm_user ON td_pesanan.nik = tm_user.nik JOIN tm_unit ON td_pesanan.id_unit = tm_unit.id_unit WHERE kd_transaksi = '$kd_transaksi'";
$hasil   = mysqli_query($conn, $edit) or die(mysqli_error($conn));
$data    = mysqli_fetch_array($hasil);
?>

<div class="col-md-10">
    <h3>
        <div align="center">Edit Info Pesanan</div>
    </h3>
    <br><br><br>
    <form class="form-horizontal" action="..\admin\modul\mod_pesanan\update_pesanan.php" method="POST">
        <input type="hidden" name="kd_transaksi" value="<?php echo $kd_transaksi ?>">
        <div class="form-group">
            <label class="control-label col-sm-4" for="unit">Pilih Kontrakan :</label>
            <div class="col-sm-6">
                <select class="form-control" name="id_unit" id="unit" readonly>
                    <option value="<?php echo $data['id_unit'] ?>"><?php echo $data["title"] ?></option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="kd_transaksi">Kode transaksi :</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="kd_transaksi" value="<?php echo $data['kd_transaksi']; ?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="Nama">NIK :</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="user" value="<?php echo $data['nik']; ?>"readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="alamat">Nama Pemesan :</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="namaLengkap" value="<?php echo $data['nama_lengkap']; ?>"readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4">Tanggal :</label>
            <div class="col-sm-6">
                <input type="date" class="form-control" value="<?php echo $data['tanggal'] ?>" name="tanggal"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4">Jml Pemesanan :</label>
            <div class="col-sm-6">
                <select class="form-control" name="jml_org"å id="jml_org" >
                    <option><?= $data['qty'] ?></option>
                    <?php $kapasitasawal = $data['qty'] ?>
                    <?php  
                        for($i=1; $i<=5; $i++){  
                            if ($i==$data['qty']){
                                continue; 
                            } else  {  ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                    <?php  } 
                        } 
                        ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4">Harga :</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" value="<?php echo $data['total_harga'] ?>" name="total_harga" id="total" readonly>
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

<script type="text/javascript" src="..\admin\assets\js\jquery-3.6.0.min.js"></script>

<script type="text/javascript">
    $("#unit").change(function() {
        var id_unit = $("#unit").val();
        console.log(id_unit);
        $.ajax({
            url: "../config/ajax_kode.php?id_unit=" + id_unit,
            success: function(result) {
                console.log(result);
                $("#kdtransaksi").val(result);
            }
        });
    });

    $("#jml_org").change(function() {
        var id_unit = $("#unit").val();
        var qty = $("#jml_org").val();
        console.log(qty);
        $.ajax({
            url: "../config/ajax_total.php?id_unit=" + id_unit + "&jml_org=" + qty,
            success: function(result) {
                console.log(result);
                $("#total").val(result);
            }
        });
    });
</script>