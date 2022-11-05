<?php

include '../../../config/koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM master_stock JOIN master_item on master_stock.no_item = master_item.no_item JOIN master_location ON master_stock.id_loc = master_location.id_loc WHERE master_stock.status='on'") or die(mysqli_error($conn));

?>


<div class="row">
    <div class="col-md-12">
        <!--   Kitchen Sink -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Manajemen Data Stock Opname
            </div>
            <hr>
            &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span>Tambah</button>
            <br>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Stock</th>
                                <th>Kode Item</th>
                                <th>Nama Item</th>
                                <th>No.Rak</th>
                                <th>Stock Awal</th>
                                <th>Qty In</th>
                                <th>Qty Out</th>
                                <th>Current Stock</th>
                                <th colspan="2">
                                    <center>Action</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if (mysqli_num_rows($query) == 0) {
                                echo '<tr><td colspan="10" align="center">Tidak ada data!</td></tr>';
                            } else {
                                $no = 1;
                                while ($data = mysqli_fetch_array($query)) {
                                    echo '<tr>';
                                    echo '<td>' . $no . '</td>';
                                    echo '<td>' . $data['id_stock'] . '</td>';
                                    echo '<td>' . $data['no_item'] . '</td>';
                                    echo '<td>' . $data['name_item'] . '</td>';
                                    echo '<td>' . $data['id_loc'] . '</td>';
                                    echo '<td>' . $data['qty_awal'] . '</td>';
                                    echo '<td>' . $data['qty_in'] . '</td>';
                                    echo '<td>' . $data['qty_out'] . '</td>';
                                    echo '<td>' . $data['qty_now'] . '</td>';
                                    echo '<td><a href=admin.php?halaman=edit_stok&&id_stock=' . $data['id_stock'] . '><span class="glyphicon glyphicon-edit"></a></td>'; 
                                    // echo '<td><a href=admin.php?halaman=edit_stok_opname&&id_stock=' . $data['id_stock'] . '><span class="glyphicon glyphicon-off"></a></td>'; 
                                    
                                    ?>
                                    <td><a href="#" onclick="confirm_modal('admin.php?halaman=edit_stok&&id_stock=<?= $data['id_stock'] ?>');"><span class="glyphicon glyphicon-off"></span></a></td>
                            <?php
                                    echo '</tr>';
                                    $no++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End  Kitchen Sink -->
    </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <?php 
        // mengambil data barang dengan kode paling besar
            $query = mysqli_query($conn, "SELECT max(id_stock) as last, no_item FROM master_stock");
            $data = mysqli_fetch_array($query);
            $kodeStock = $data['last'];
            // $kodeItem = $data['no_item'];
        
            // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
            // dan diubah ke integer dengan (int)
            $urutan = (int) substr($kodeStock, 6, 3);
        
            // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
            $urutan++;
            date_default_timezone_set('Asia/Jakarta');
            $timestamp  = date('Ym'); 
            
            $huruf = "IS";
            $kodeStock = $huruf. sprintf("%03s", $urutan);
        ?>
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" align="center">Tambah Data Stock</h4>
            </div>
            <div class="modal-body">
                <?php
                    $uery = mysqli_query($conn, "SELECT * FROM master_location");
                // $kd_kol = mysqli_fetch_array($uery);
                // $kd_trans = $kd_kol['kd_kolam'] .  rand(0, 9999);
                ?>
                <form action="..\admin\modul\mod_stok\add_stok.php" class="form-horizontal" method="POST" >
                    <div class="form-group">
                        <label class="control-label col-sm-4">Kode Stok :</label>
                        <!-- <div class="col-sm-3">
                            <input type="text" class="form-control" id="id_stock" name="id_stock" placeholder="Kode Stock" value = <?= $kodeStock ?> required readonly>
                        </div> -->
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="thbl" name="thbl" placeholder="Kode Stock" value = <?= $timestamp ?> required readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Kode Item :</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="noItem" name="no_item" placeholder="Kode Item" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Nama Item :</label>
                        <div class="col-sm-6">
                            <textarea name="name_item" id="nameItem" class="form-control" cols="1" rows="5" placeholder="Nama Item" required readonly></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Kode Rak :</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="id_loc" id="idLoc" placeholder="Kode Rak">
                                <option value="pilih">--Pilih Rak--</option>
                                <?php while ($kol = mysqli_fetch_array($uery)) { ?>
                                    <option value="<?php echo $kol['id_loc'] ?>"><?php echo $kol["id_loc"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Stok Awal :</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" name="qty_awal" placeholder="Stok Awal" value="0" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4"></label>
                        <div class="col-sm-6" align="right">
                            <button class="btn btn-danger">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_delete">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="text-align:center;">Anda akan memasuki mode Stock Opname</h4>
            </div>

            <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-danger btn-sm" id="delete_link">Yes</a>
            </div>
        </div>
    </div>
</div>

<script src="../admin/assets/js/jquery-1.10.2.js"></script>
<script src="../admin/assets/js/sweetalert2.min.js"></script>

<script type="text/javascript">
    function confirm_modal(delete_url) {
        $('#modal_delete').modal('show', {
            backdrop: 'static'
        });
        document.getElementById('delete_link').setAttribute('href', delete_url);
    };
</script>
<script type="text/javascript">
    $("#noItem").change(function() {
        var no_item = $("#noItem").val();
        console.log(no_item);
        $.ajax({
            url: "../config/ajax_kode2.php?no_item=" + no_item,
            success: function(result) {
                console.log(result);
                $("#nameItem").val(result);
            }
        });
    });
</script>

<?php
session_start();
if (isset($_SESSION['pesan'])) { ?>
    <script>
        Swal.fire({
            title: "Info",
            text: "<?php echo $_SESSION['pesan']; ?>",
            type: "<?php echo $_SESSION['status']; ?>",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
<?php unset($_SESSION['pesan']);
} ?>