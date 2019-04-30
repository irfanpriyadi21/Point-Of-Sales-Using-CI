<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   Data Transaksi
                </h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php
                                                if ($this->session->flashdata('flash') == TRUE) {?>
                                                        
                                                        <div class="alert bg-green alert-dismissible" role="alert">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <?php echo $this->session->flashdata('flash');?>
                                                        </div>
                    <?php } ?>
                    <div class="card">
                       </br>
                        <div class="body">
                            <h2 class="card-inside-title" align="center">Data Transaksi</h2>
                            <br/>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                     <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                <thead>     
                                                    <tr>
                                                        <th>No</th>
                                                        <th>No Meja</th>
                                                        <th>Id User</th>
                                                        <th>Tanggal</th>
                                                        <th>Status Order</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $b=1;foreach ($view as $tampil):?>
                                                    <tr>
                                                        <td><?= $b++; ?></td>
                                                        <td><?= $tampil['no_meja'] ?></td>
                                                        <td><?= $tampil['id_user'] ?></td>
                                                        <td><?= $tampil['tanggal'] ?></td>
                                                        <td><?= $tampil['status_order'] ?></td>
                                                        <td>
                                                            
                                                            <?php if($tampil['status_order'] == "Lunas"):?>
                                                                <a class="btn btn-primary" href="<?= base_url()?>admin/c_transaksi/faktur/<?= $tampil['id_order']?>">
                                                                    <i class="material-icons">print</i>
                                                                </a>
                                                                <a class="btn btn-danger" onclick="return confirm('yakin ingin di hapus ??')" href="<?= base_url()?>admin/c_transaksi/hapus_order/<?= $tampil['id_order']?>">
                                                                    <i class="material-icons">delete</i>
                                                                </a>
                                                            <?php else:?>
                                                            <a class="btn btn-success" href="<?= base_url()?>admin/c_transaksi/view/<?= $tampil['id_order']?>">
                                                                <i class="material-icons">attach_money</i>
                                                            </a>
                                                            <?php endif;?>

                                                        </td>
                                                    </tr>
                                                    <?php endforeach ?>
                                                </tbody>
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