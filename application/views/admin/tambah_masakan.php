
     <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   Daftar Makanan
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
                        <button class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">Tambah Data</button>
                        </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>no</th>
                                            <th>Nama Makanan</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $b=1;foreach ($view as $tampil):?>
                                        <tr>
                                            <td><?= $b++; ?></td>
                                            <td><?= $tampil['nama_masakan'] ?></td>
                                            <td>Rp.<?= number_format($tampil['harga']) ?></td>
                                            <td><?= $tampil['status_masakan'] ?></td>
                                            <td><?= $tampil['tgl_masuk'] ?></td>
                                            <td>
                                                 <a class="btn btn-danger" href="<?= base_url()?>admin/makanan/hapus/<?= $tampil['id_masakan']?>"
                                                 onclick="return confirm('yakin ingin di hapus ??')">
                                                     <i class="material-icons">delete</i>
                                                  </a>
                                                  <a class="btn btn-success" href="<?= base_url()?>admin/makanan/edit/<?= $tampil['id_masakan']?>">
                                                     <i class="material-icons">create</i>
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
                            <h4 class="modal-title" id="defaultModalLabel">Masukan Data Makanan & minuman</h4>
                        </div>
                        <br/>
                        <div class="modal-body">
                            <form method="post" action="">
                                  <div class="form-group">
                                     <div class="form-line">
                                         <input type="text" class="form-control" name="nama_masakan" placeholder="Nama Makanan atau Minuman" value="<?= @$view1['nama_masakan']?>" />
                                      </div>
                                     </div>
                                  <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="harga" placeholder="Harga" value="<?= @$view1['harga']?>"/>
                                     </div>
                                  </div>
                            <div class="form-group">
                                    <p>
                                        Status
                                    </p>
                                    <select class="form-control show-tick" name="status_masakan" value="<?= @$view1['status_masakan']?>">
                                        <option value="Ready">Ready</option>
                                        <option value="Not Ready">Not Ready</option>
                                    </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            
                             
                            <button type="submit" class="btn btn-primary waves-effect" name="simpan" value="save">SAVE CHANGES</button>
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>          
    </section>

