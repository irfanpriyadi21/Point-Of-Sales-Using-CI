
                <!-- edit -->
        <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   Edit Makanan
                </h2>
                 </div>
                    </div>
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                       </br>
                        <div class="body">
                            <h2 class="card-inside-title" align="center">Edit Data Makanan</h2>
                            <br/>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                <form action="" method="post">
                                <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="nama_masakan" value="<?= @$view1['nama_masakan']?>">
                                            <label class="form-label">Nama Masakan</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="harga" value="<?= @$view1['harga']?>">
                                            <label class="form-label">Harga</label>
                                        </div>
                                    </div>
                                        <div class="form-group">
                                    <p>
                                        Status
                                    </p>
                                    <select class="form-control show-tick" name="status_masakan">
                                        <option <?= $view1['status_masakan'] == "Ready" ? "selected='selected'" : "" ?> value="Ready">Ready</option>
                                        <option <?= $view1['status_masakan'] == "Not Ready" ? "selected='selected'" : "" ?> value="Not Ready">Not Ready</option>
                                    </select>
                                       </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary waves-effect" name="update" value="Update">Update</button>
                                   <a href="<?php echo base_url().'index.php/page/input_makanan'?>" class="btn btn-danger waves-effect">Close</a>
                                    </div>
                                    </form>
                                </div>
                            </div>
                </div>
            </div>
    </section>
            </div>