<div class="container-fluid bg-white sticky-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0">
            <a href="<?php echo base_url('beranda'); ?>" class="navbar-brand">
                <img class="img-fluid" src="<?= base_url(uri: 'assets/landing/TeaHouse-1.0.0/') ?>img/logo.png" alt="Logo">
            </a>
            <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="<?php echo base_url('beranda'); ?>" class="nav-item nav-link <?php echo ($this->uri->segment(1) == 'beranda' || $this->uri->segment(1) == '') ? 'active' : ''; ?>">Beranda</a>
                    <a href="<?php echo base_url('kontak'); ?>" class="nav-item nav-link <?php echo ($this->uri->segment(1) == 'kontak') ? 'active' : ''; ?>">Kontak Kami</a>
                    <a href="<?php echo base_url('admin/login'); ?>" class="nav-item nav-link <?php echo ($this->uri->segment(1) == 'admin/login') ? 'active' : ''; ?>">Login</a>
                </div>
                <div class="border-start ps-4 d-none d-lg-block">
                    <button type="button" class="btn btn-sm p-0"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </nav>
    </div>
</div>