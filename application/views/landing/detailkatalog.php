<div class="container py-5">
    <div class="row g-5">
        <?php if ($this->session->flashdata('success_message')) : ?>
            <div class="alert alert-success my-3" role="alert">
                <?php echo $this->session->flashdata('success_message'); ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error_message')) : ?>
            <div class="alert alert-danger my-3" role="alert">
                <?php echo $this->session->flashdata('error_message'); ?>
            </div>
        <?php endif; ?>
        <div class="col-lg-6 wow fadeInUp">
            <img class="img-fluid rounded" src="<?= base_url('assets/files/katalog/') . $katalog->image; ?>" alt="<?= $katalog->package_name; ?>">
        </div>
        <div class="col-lg-6 wow fadeInUp">
            <h1 class="display-3"><?= $katalog->package_name; ?></h1>
            <p class="fs-5 fw-medium text-primary"><?= $katalog->status_publish == 'Y' ? 'Published' : 'Draft'; ?></p>
            <p class="mb-4"><?= $katalog->description; ?></p>
            <h4 class="text-primary">Rp. <?= number_format($katalog->price, 0, ',', '.'); ?></h4>
            <h2>Tertarik Paket ini? Yuk Langsung Pesan</h2>
            <form action="<?php echo base_url('beranda/Orderadd/' . $katalog->catalogue_id) ?>" method="post">
                <div class="row g-4">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="nama_anda">Nama Anda</label>
                            <input type="text" class="form-control" id="nama_anda" name="name" placeholder="Masukkan nama Anda">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="alamat_email">Alamat Email</label>
                            <input type="email" class="form-control" id="alamat_email" name="email" placeholder="Masukkan alamat email">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="no_handphone">No Handphone</label>
                            <input type="tel" class="form-control" id="no_handphone" name="phone_number" placeholder="Masukkan nomor handphone">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="tanggal_pernikahan">Tanggal Pernikahan</label>
                            <input type="date" class="form-control" id="tanggal_pernikahan" min="<?php echo date('Y-m-d'); ?>"
                                name="wedding_date">
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                    <button type="submit" class="btn btn-primary me-md-2">Submit</button>
                </div>
            </form>
            <!-- <a href="" class="btn btn-primary rounded-pill py-3 px-5 mt-3">Pesan Paket</a> -->
        </div>
    </div>
</div>