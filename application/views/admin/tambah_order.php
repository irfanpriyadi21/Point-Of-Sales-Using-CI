
     <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   Daftar Order
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                        <?php
                                if ($this->session->flashdata('flash') == TRUE) {?>
                                        
                                        <div class="alert bg-green alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <?php echo $this->session->flashdata('flash');?>
                                        </div>
                        <?php } ?>
                        <div class="button-demo">
                            <button class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">Tambah Order</button>
                        </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>no</th>
                                            <th>No Meja</th>
                                            <th>Tanggal Pesan</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $b=1;foreach ($view as $tampil):?>
                                        <tr>
                                            <td><?= $b++; ?></td>
                                            <td><?= $tampil['no_meja'] ?></td>
                                            <td><?= $tampil['tanggal'] ?></td>
                                            <td><?= $tampil['keterangan'] ?></td>
                                            <td>
                                                 <a class="btn btn-danger" href="<?= base_url()?>admin/c_order/hapus/<?= $tampil['id_order']?>"
                                                 onclick="return confirm('yakin ingin di hapus ??')">
                                                     <i class="material-icons">delete</i>
                                                  </a>
                                                  <a class="btn btn-primary" href="<?= base_url()?>admin/c_order/view/<?= $tampil['id_order']?>">
                                                    <i class="material-icons">remove_red_eye</i>
                                                  </a>
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
            <!-- #END# Basic Examples -->
                    </div>

            <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Masukan Data Order</h4>
                        </div>
                        <br/>
                        <div class="modal-body">
                               <form method="post" action="">
                                    <div class="form-group">
                                            <p>
                                                No Meja
                                            </p>
                                          
                                            <select class="form-control show-tick" name="no_meja">
                                                 <?php foreach ($view1 as $tampil1):?> 
                                                    <option value="<?php echo $tampil1['no_meja'] ?>"><?php echo $tampil1['no_meja'] ?></option>
                                                 <?php endforeach ?>
                                            </select>
                                            
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="keterangan" placeholder="Keterangan"/>
                                        </div>
                                    </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary waves-effect" name="simpan" value="save">SAVE CHANGES</button>
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
    </div>          
    </section>

