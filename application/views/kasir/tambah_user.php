
     <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Tambah User
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
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Nama User</th>
                                            <th>Level</th>
                                            <th>Aksi</th>  
                                          </tr>
                                    </thead>
                                    <tbody>
                                        <?php $b=1;foreach ($view as $tampil):?>
                                        <tr>
                                            <td><?= $b++; ?></td>
                                            <td><?= $tampil['username'] ?></td> 
                                            <td><?= $tampil['email'] ?></td>
                                            <td><?= $tampil['nama_user'] ?></td>
                                            <td><?= $tampil['nama_level'] ?></td>
                                            <td>
                                                 <a class="btn btn-danger" href="<?= base_url()?>kasir/c_user/hapus/<?= $tampil['id_user']?>"
                                                 onclick="return confirm('yakin ingin di hapus ??')">
                                                     <i class="material-icons">delete</i>
                                                  </a>
                                                  <a class="btn btn-success" href="<?= base_url()?>kasir/c_user/edit/<?= $tampil['id_user']?>">
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
                            <h4 class="modal-title" id="defaultModalLabel">Tambah User</h4>
                        </div>
                        <br/>
                        <div class="modal-body">
                            <form method="post" action="">
                                  <div class="form-group">
                                     <div class="form-line">
                                         <input type="text" class="form-control" name="username" placeholder="Username" />
                                      </div>
                                     </div>
                                  <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="password" placeholder="Password"/>
                                     </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="email" placeholder="Email"/>
                                     </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nama_user" placeholder="Name"/>
                                     </div>
                                  </div>
                            <div class="form-group">
                                    <p>
                                        Level
                                    </p>
                                    <select class="form-control show-tick" name="id_level">
                                    <?php if($this->session->userdata('akses')=='1'):?>
                                        <option value="1">Admin</option>
                                        <option value="2">Waiter</option>
                                        <option value="3">Kasir</option>
                                        <option value="4">Owner</option>
                                        <option value="5">Pelanggan</option>
                                    <?php elseif($this->session->userdata('akses')=='2' || $this->session->userdata('akses')=='3'):?>
                                        <option value="5">Pelanggan</option>
                                    <?php endif;?>
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

