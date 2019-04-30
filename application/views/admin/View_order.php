
                <!-- edit -->
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   View Order
                </h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                       </br>
                        <div class="body">
                            <h2 class="card-inside-title" align="center">View Order</h2>
                            <br/>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <table class="table table-striped">
                                        <tr>
                                            <td>ID Order</td>
                                            <td><?= $view1['id_order']?></td>
                                        </tr>
                                        <tr>
                                            <td>No Meja</td>
                                            <td><?= $view1['no_meja']?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Order</td>
                                            <td><?= $view1['tanggal']?></td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td><?= $view1['keterangan']?></td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td><?= $view1['status_order']?></td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- <div class="col-md-3">
                                    
                                </div> -->
                                <div class="col-md-12">
                                <?php
                                    if ($this->session->flashdata('flash') == TRUE) {?>
                                            
                                            <div class="alert bg-green alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <?php echo $this->session->flashdata('flash');?>
                                            </div>
                                 <?php } ?>
                                 <?php if($view1['status_order'] == "Lunas"):?>                  
                                 <?php else:?>
                                    <button class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">Tambah Order</button>
                                <?php endif;?>
                                </div>
                                <div class="col-md-12">
                                     <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                <thead>     
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Menu</th>
                                                        <th>Keterangan</th>
                                                        <th>Jumlah</th>
                                                        <th>Harga</th>
                                                        <th>Sub Total</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $b=1;$total = 0;
                                                    foreach ($view_detail_order as $tampil):
                                                    $total = $total + $tampil['qty'] * $tampil['harga'];
                                                    ?>
                                                    <tr>
                                                        <td><?= $b++; ?></td>
                                                        <td><?= $tampil['nama_masakan'] ?></td>
                                                        <td><?= $tampil['keterangan'] ?></td>
                                                        <td><?= $tampil['qty'] ?></td>
                                                        <td>Rp.<?= number_format($tampil['harga']) ?></td>
                                                        <td>Rp.<?= number_format($tampil['qty'] * $tampil['harga']) ?></td>
                                                        <td>
                                                        <?php if($view1['status_order'] == "Lunas"):?>
                                                           Sudah Lunas
                                                        <?php else:?>
                                                            <a class="btn btn-danger" onclick="return confirm('yakin ingin di hapus ??')" href="<?= base_url()?>admin/c_order/hapus_order/<?= $tampil['id_detail_order']?>?id=<?= $view1['id_order']?>">
                                                                <i class="material-icons">delete</i>
                                                            </a>
                                                         <?php endif;?>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                                <tfoot> 
                                                    <td colspan="5">Total</td>
                                                    <td colspan="2">Rp.<?= number_format($total);?></td>
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
    <form method="post">
        <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Tambah Detail Order</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <p>
                                Masakan
                            </p>
                            <select class="form-control show-tick" name="id_masakan" required>
                                <option value="">-- Silahkan Pilih Masakan --</option>
                                <?php $b=1;foreach ($view as $tampil):?>
                                    <option value="<?= $tampil['id_masakan'] ?>"><?= $tampil['nama_masakan']." ==> Rp.".number_format($tampil['harga']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" class="form-control" name="qty" placeholder="Jumlah" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" required/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary waves-effect" name="simpan" value="save">SAVE</button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>