<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Default form</h4>
                        <p class="card-description"> Basic form layout </p>

                        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                        <?php if($this->session->flashdata('error_upload')): ?>
                            <div class="alert alert-danger">
                                <?php echo $this->session->flashdata('error_upload'); ?>
                            </div>
                        <?php endif; ?>

                        <form action="<?php echo base_url('AdminController/katalog/tambahData') ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="package_name">Nama Paket</label>
                                        <input type="text" class="form-control" id="package_name" name="package_name" placeholder="Masukkan nama produk" value="<?php echo set_value('package_name'); ?>">
                                        <div class="text-danger"><?php echo form_error('package_name'); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Deskripsi</label>
                                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Masukkan deskripsi produk"><?php echo set_value('description'); ?></textarea>
                                        <div class="text-danger"><?php echo form_error('description'); ?></div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="image">Gambar Header</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                        <div class="text-danger"><?php echo form_error('image'); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Harga (Rp)</label>
                                        <input type="number" class="form-control" id="price" name="price" placeholder="Rp." value="<?php echo set_value('price'); ?>">
                                        <div class="text-danger"><?php echo form_error('price'); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="status_publish">Status Publish</label>
                                        <select class="form-control" id="status_publish" name="status_publish">
                                            <option value="N" <?php echo set_select('status_publish', 'N'); ?>>Draft</option>
                                            <option value="Y" <?php echo set_select('status_publish', 'Y'); ?>>Published</option>
                                        </select>
                                        <div class="text-danger"><?php echo form_error('status_publish'); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <a href="<?php echo base_url('admin-katalog') ?>" class="btn btn-warning w-100">Kembali</a>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>