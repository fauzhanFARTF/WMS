<?php

include '../../../config/koneksi.php';

?>


<div class="row">
    <div class="col-md-12">
        <!--   Kitchen Sink -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Laporan Stock
            </div>
            <hr>
            &nbsp;&nbsp;&nbsp;
            <br>

            <form action="" method="post">
                <div class='pull-right'>
                    <!-- <div class="form-group">
                        <label class="control-label col-sm-4">Periode :</label>
                        <div class="col-md-12">
                            <input type="date" class="form-control" id="dari" name="dari">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Sampai :</label>
                        <div class="col-md-12">
                            <input type="date" class="form-control" id="ke" name="ke">
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label class="control-label col-sm-4">No. Item</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="item" name="item">
                        </div>
                    </div>
                    <div class='pull-right'>
                        &nbsp;
                        <div class="form-group">
                            <div class="col-md-12">
                                <input class="btn btn-primary btn-sm" type="submit" name="cari" value="Cari">
                            </div>
                        </div>
                        &nbsp;
                    </div>

                </div>
            </form>

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
                                <th>Actual Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            // if (isset($_POST["tampilkan"])) {
                            // $dt1 = $_POST["dari"];
                            // $dt2 = $_POST["ke"];
                            $item = $_POST["item"];



                            if (isset($_POST['cari'])) {

                                $query = mysqli_query($conn, "SELECT * FROM master_stock JOIN master_item on master_stock.no_item = master_item.no_item  WHERE master_stock.status ='off' AND master_stock.no_item = '".$item."'") or die(mysqli_error($conn));
                            } else {

                                $query = mysqli_query($conn, "SELECT * FROM master_stock JOIN master_item on master_stock.no_item = master_item.no_item  WHERE master_stock.status ='off'") or die(mysqli_error($conn));
                                // $query = mysqli_query($conn, "SELECT * FROM master_stock JOIN master_item on master_stock.no_item = master_item.no_item  WHERE master_stock.status ='off' AND master_stock.no_item = '".$item."'") or die(mysqli_error($conn));
                            }
                            $no = 1;
                            while ($data = mysqli_fetch_array($query)) {
                                $grand += $data['total_harga'];
                            ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $data['id_stock'] ?></td>
                                    <td><?php echo $data['no_item'] ?></td>
                                    <td><?php echo $data['name_item'] ?></td>
                                    <td><?php echo $data['id_loc'] ?></td>
                                    <td><?php echo $data['qty_awal'] ?></td>
                                    <td><?php echo $data['qty_in'] ?></td>
                                    <td><?php echo $data['qty_out'] ?></td>
                                    <td><?php echo $data['qty_now'] ?></td>
                                    <td><?php echo $data['qty_actual'] ?></td>
                                <?php
                                $no++;
                            }

                                ?>
                        </tbody>
                    </table>

                    <table class='table table-bordered table-invoice-full'>
                        <tbody>
                            <tr>
                                <td class='msg-invoice' width='85%'>
                                    <h4>Laporan Item Stock</h4>
                                    <!-- <?php $bank = mysqli_query($conn, "SELECT * FROM tm_rekening");
                                    $bnk = mysqli_fetch_array($bank);
                                    ?> -->
                                    <!-- <a href='#' title='Kasir'>Kasir</a> | <a href='#' title=''><?php echo "$bnk[bank] - ($bnk[no_rek]) $bnk[atas_nama]" ?> </a> -->
                                </td>
                                <td>
                                    <div class='pull-right'>
                                        <!-- <h4><span>GRAND TOTAL : Rp.<?php echo number_format($grand) ?></span></h4> -->
                                        <br>

                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <form action="..\admin\modul\mod_laporan\cetak_laporan.php" method="post">
                    <input type="hidden" name="dar" value="<?php echo $dt1; ?>">
                    <input type="hidden" name="ker" value="<?php echo $dt2; ?>">

                    <input type="submit" name="cetak" value="Cetak" class="btn btn-success bt-sm">
                </form>
                <!-- <a href="..\admin\modul\mod_laporan\cetak_laporan.php"><input type='button' class='btn btn-success' id="cetak" name="cetak">Cetak<span class='glyphicon glyphicon-print'></span></a> -->
            </div>
        </div>
    </div>
</div>
