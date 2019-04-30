<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   Data Transaksi
                </h2>
            </div>
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="card">
                            </br>
                            <div class="body">
                                <h2 class="card-inside-title" align="center">Pembayaran</h2>
                              </br>
                              </br>
                                <?php $total = 0;
                                                    foreach ($view as $tampil):
                                                        $total = $total + $tampil['qty'] * $tampil['harga'];
                                ?>
                                 <?php endforeach ?>
                              <form id="form_validation" method="POST" action="">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" class="form-control" name="jumlah" id="jumlah" value="<?= $total ?>">
                                            <label class="form-label">Jumlah Yang Harus Dibayar</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" class="form-control" name="bayar" id="bayar" oninput="hitung()">
                                            <label class="form-label">Bayar</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                                <label for="email_address_2">Kembalian</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="kembalian" class="form-control" name="kembalian">
                                                    </div>
                                                </div>
                                        </div>
                                    </br>
                                    <button type="submit" name="simpan" id="simpan" value="save" class="btn btn-block btn-lg btn-primary waves-effect" disabled="disabled">Simpan</button>
                              </form>
                            </div>
                        </div>
                </div>        
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                       </br>
                        <div class="body">
                            <h2 class="card-inside-title" align="center">List Pesanan</h2>
                            <br/>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                     <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                <thead>     
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Pesanan</th>
                                                        <th>Harga</th>
                                                        <th>Qty</th>
                                                        <th>SubTotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $b=1;$total = 0;
                                                foreach ($view as $tampil):
                                                    $total = $total + $tampil['qty'] * $tampil['harga'];
                                                ?>
                                               
                                                    <tr>
                                                        <td><?= $b++; ?></td>
                                                        <td><?= $tampil['nama_masakan'] ?></td>
                                                        <td>Rp.<?= number_format($tampil['harga']) ?></td>
                                                        <td><?= $tampil['qty'] ?></td>
                                                        <td>Rp.<?= number_format($tampil['harga'] * $tampil['qty'])?> </td>
                                                    </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                                <tfoot> 
                                                    <td colspan="4">Total</td>
                                                    <td>Rp.<?= number_format($total);?></td>
                                                </tfoot>
                                         </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function hitung() {
            var bayar = document.getElementById('jumlah').value;
            var harga = document.getElementById('bayar').value;
            // var kembali = document.getElementById('kembalia');

            var kembali = harga - bayar;
            document.getElementById('kembalian').value = kembali;
            if(kembali >= 0){
                document.getElementById('simpan').removeAttribute('disabled');
            }else{
                document.getElementById('simpan').setAttribute('disabled', 'disabled');
            }
        }
    </script>