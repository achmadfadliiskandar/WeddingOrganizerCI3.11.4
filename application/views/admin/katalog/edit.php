<form action="<?php echo base_url('AdminController/katalog/updateData') ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="catalogue_id" value="<?php echo $katalog->catalogue_id; ?>">
    
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="package_name">Nama Paket</label>
                <input type="text" class="form-control" id="package_name" name="package_name" value="<?php echo set_value('package_name', $katalog->package_name); ?>">
                <div class="text-danger"><?php echo form_error('package_name'); ?></div>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" id="description" name="description" rows="4"><?php echo set_value('description', $katalog->description); ?></textarea>
                <div class="text-danger"><?php echo form_error('description'); ?></div>
            </div>
            <div class="form-group">
                <label for="price">Harga (Rp)</label>
                <input type="number" class="form-control" id="price" name="price" value="<?php echo set_value('price', $katalog->price); ?>">
                <div class="text-danger"><?php echo form_error('price'); ?></div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="image">Gambar Header</label>
                <input type="file" class="form-control" id="image" name="image">
                <img src="<?php echo base_url('assets/files/katalog/' . $katalog->image); ?>" width="150" class="mt-2" alt="Gambar Katalog">
                <div class="text-danger"><?php echo form_error('image'); ?></div>
            </div>
            <div class="form-group">
                <label for="status_publish">Status Publish</label>
                <select class="form-control" id="status_publish" name="status_publish">
                    <option value="N" <?php echo set_select('status_publish', 'N', ($katalog->status_publish == 'N')); ?>>Draft</option>
                    <option value="Y" <?php echo set_select('status_publish', 'Y', ($katalog->status_publish == 'Y')); ?>>Published</option>
                </select>
                <div class="text-danger"><?php echo form_error('status_publish'); ?></div>
            </div>
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary me-2">Update</button>
    <a href="<?php echo base_url('admin-katalog') ?>" class="btn btn-warning me-2">Kembali</a>
</form>