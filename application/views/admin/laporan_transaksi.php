
                <!-- edit -->
                <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   Laporan Transaksi
                </h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                       </br>
                        <div class="body">
                            <h2 class="card-inside-title" align="center">Transaksi</h2>
                            <br/>
                            <form class action="<?= base_url() ?>admin/c_transaksi/laporan_transaksi" method="post">
                                <div class="row clearfix">
                                    <div class="col-md-8">
                                        <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                            <div class="form-line">
                                                <input type="text" name="tgl_mulai" class="form-control" autocomplete="off" placeholder="Date start...">
                                            </div>
                                            <span class="input-group-addon">to</span>
                                            <div class="form-line">
                                                <input type="text" name="tgl_selesai" class="form-control" autocomplete="off" placeholder="Date end...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="btn btn-primary" type="submit" name="cari" value="Cari">
                                        <a class="btn btn-warning" href="<?= base_url() ?>admin/c_transaksi/laporan_transaksi">Reset</a>
                                        <a class="btn btn-success" href="<?= base_url() ?>admin/c_transaksi/print_laporan?<?= (@$mulai ? "mulai=$mulai&selesai=$selesai" : '') ?>">Print</a>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover">
                                                    <thead>     
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Id Order</th>
                                                            <th>Nama User</th>
                                                            <th>Tanggal</th>
                                                            <th>Total Bayar</th>
                                                            <th>Jumlah</th>
                                                            <th>Kembalian</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $b=1;$total = 0;
                                                        foreach ($transaksi as $tampil):
                                                        $total = $total + $tampil['jumlah'];
                                                        ?>
                                                        <tr>
                                                            <td><?= $b++; ?></td>
                                                            <td><?= $tampil['id_order'] ?></td>
                                                            <td><?= $tampil['nama_user'] ?></td>
                                                            <td><?= $tampil['tanggal'] ?></td>
                                                            <td>Rp.<?= number_format($tampil['total_bayar']) ?></td>
                                                            <td>Rp.<?= number_format($tampil['jumlah']) ?></td>
                                                            <td>Rp.<?= number_format($tampil['kembalian']) ?></td>
                                                        </tr>
                                                        <?php endforeach ?>
                                                    </tbody>
                                                    <tfoot> 
                                                        <td colspan="5">Total Keuntungan</td>
                                                        <td colspan="2">Rp.<?= number_format($total);?></td>
                                                    </tfoot>
                                            </table>
                                        </div>
                                    </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>