<?php

include '../../../config/koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM master_user ORDER BY timestamp DESC") or die(mysqli_error($conn));

?>

<div class="row">
    <div class="col-md-12">
        <!--   Kitchen Sink -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Manajemen User
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
                                <th>ID User</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>No Telp</th>
                                <th>Status Akun</th>
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
                                    echo '<tr>';
                                    echo '<td>' . $no . '</td>';
                                    echo '<td>' . $data['id_user'] . '</td>';
                                    echo '<td>' . $data['name'] . '</td>';
                                    echo '<td>' . $data['username'] . '</td>';
                                    echo '<td>' . $data['level'] . '</td>';
                                    echo '<td>' . $data['no_telp'] . '</td>';
                                    echo '<td>' . $data['stat'] . '</td>';
                                    echo '<td><a href=admin.php?halaman=edit_user&&id_user=' . $data['id_user'] . '><span class="glyphicon glyphicon-edit"></a></td>'; ?>
                                    <!-- <td><a href="#" onclick="confirm_modal('../admin/modul/mod_user/delete_user.php?id_user= <?=$data['id_user']?>');"><span class="glyphicon glyphicon-trash"></span></a></td> -->
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
            $query = mysqli_query($conn, "SELECT max(id_user) as last FROM master_user");
            $data = mysqli_fetch_array($query);
            $kodeUser = $data['last'];
        
            // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
            // dan diubah ke integer dengan (int)
            $urutan = (int) substr($kodeUser, 2, 3);
        
            // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
            $urutan++;
        
            $huruf = "US";
            $kodeUser = $huruf . sprintf("%03s", $urutan);
        ?>

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" align="center">Tambahkan User</h4>
            </div>
            <div class="modal-body">
                <form action="..\admin\modul\mod_user\add_user.php" class="form-horizontal" method="POST">
                    <div class="form-group">
                        <label class="control-label col-sm-4">ID User :</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="id_user" placeholder="id_user" id="id_user" value="<?= $kodeUser ?>" required readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Username :</label>
                        <div class="col-sm-6">
                            <input type="username" class="form-control" name="username" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Password :</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Nama Lengkap :</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="nama_lengkap" placeholder="namalengkap">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">No.Telp :</label>
                        <div class="col-sm-6">
                            <input type="tel" class="form-control" name="no_telp" placeholder="No.telp">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Level :</label>
                        <div class="col-sm-6">
                            <select type="level" class="form-control" name="level">
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

<script type="text/javascript">
    function confirm_modal(delete_url) {
        $('#modal_delete').modal('show', {
            backdrop: 'static'
        });
        document.getElementById('delete_link').setAttribute('href', delete_url);
    }
</script>