<?php

include '../../../config/koneksi.php';

$query = mysqli_query($conn, 
                "SELECT  
                    master_location.* , 
                    SUM(master_stock.qty_now) as qty_now, 
                    master_stock.status FROM master_location 
                LEFT JOIN master_stock 
                ON master_location.id_loc = master_stock.id_loc 
                WHERE master_stock.status = 'on' OR master_stock.status IS NULL 
                GROUP BY master_location.id_loc") 
            or die(mysqli_error($conn));

?>


<div class="row">
    <div class="col-md-12">
        <!--   Kitchen Sink -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Manajemen Rak Penyimpanan
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
                                <th>Kode Rak</th>
                                <th>Nama Rak</th>
                                <th>Detail</th>
                                <th>Pic</th>
                                <th>Kapasitas Total</th>
                                <th>Qty Terpakai</th>
                                <th>Qty Sisa</th>
                                <th colspan="2">
                                    <center>Action</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if (mysqli_num_rows($query) == 0) {
                                echo '<tr><td colspan="4" align="center">Tidak ada data!</td></tr>';
                            } else {
                                $no = 1;
                                while ($data = mysqli_fetch_array($query)) {
                            ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $data['id_loc'] ?></td>
                                        <td> <?php echo $data['name_loc'] ?> </td>
                                        <td> <?php echo $data['description'] ?></td>

                                        <td><img src="../uploads/<?php echo $data['pic']; ?>" width="120" height="155"></td>
                                        <td> <?php echo $data['capacity'] ?></td>
                                        <td> 
                                            <?php 
                                            if($data['qty_now']!= NULL ){
                                                echo $data['qty_now'] ;
                                                $result = $data['qty_now'];
                                            } else {
                                                echo 0;
                                                $result = 0;
                                            }
                                            ?>
                                        </td>
                                        <td> <?php echo $data['capacity'] -$result ?></td>
                                        <?php
                                        echo '<td><a href=admin.php?halaman=edit_lokasi&&id_loc=' . $data['id_loc'] . '><span class="glyphicon glyphicon-edit"></a></td>'; ?>
                                        <!-- <td><a href="#" onclick="confirm_modal('../admin/modul/mod_unit/delete_unit.php?id_unit=<?= $data['id_unit']; ?> ');"><span class="glyphicon glyphicon-trash"></span></a></td> -->
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
            $query = mysqli_query($conn, "SELECT max(id_loc) as last FROM master_location");
            $data = mysqli_fetch_array($query);
            $kodeRak = $data['last'];
        
            $urutan = (int) substr($kodeRak, 2, 3);
        

            $urutan++;
        
            $huruf = "RA";
            $kodeRak = $huruf . sprintf("%03s", $urutan);
        ?>

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" align="center">Tambahkan Data Rak</h4>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="..\admin\modul\mod_lokasi\add_lokasi.php" class="form-horizontal" method="POST">
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="kd_unit">Kode Rak :</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="id_loc" value="<?= $kodeRak; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="title">Nama Rak :</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="name_loc">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="detail">Detail :</label>
                        <div class="col-sm-6">
                            <textarea rows='3' type="text" class="form-control" name="detail" value=""></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="pic">Picture :</label>
                        <div class="col-sm-6">
                            <p3>Pilih Gambar :</p3><br><br>
                            <input type="file" class="form-control" name="pic" id="pic">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="kapasitas">Kapasitas :</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" name="kapasitas">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4"></label>
                        <div class="col-sm-6" align="right">
                            <button class="btn btn-danger" name="submit">Simpan</button>
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
                <h4 class="modal-title" style="text-align:center;">Anda yakin akan menghapus data ini.. ?</h4>
            </div>

            <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>
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
    }
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