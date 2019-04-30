
                <!-- edit -->
                <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   Edit User
                </h2>
                 </div>
                    </div>
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                       </br>
                        <div class="body">
                            <h2 class="card-inside-title" align="center">Edit Data User</h2>
                            <br/>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                <div class="form-group form-float">
                                <form action="" method="post">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="username" value="<?= @$view1['username']?>">
                                            <label class="form-label">Username</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="password" value="<?= base64_decode($view1['password'])?>">
                                            <label class="form-label">Password</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="email" value="<?= @$view1['email']?>">
                                            <label class="form-label">Email</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="nama_user" value="<?= @$view1['nama_user']?>">
                                            <label class="form-label">Nama</label>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary waves-effect" name="update" value="update">Update</button>
                                   <a href="<?php echo base_url().'kasir/c_user'?>" class="btn btn-danger waves-effect">Close</a>
                                    </div>
                                    </form>
                                </div>
                            </div>
                </div>
            </div>
    </section>
            </div>