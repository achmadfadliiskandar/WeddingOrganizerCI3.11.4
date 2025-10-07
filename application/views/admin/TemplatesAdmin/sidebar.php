<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == 'admin-dashboard') ? 'active' : ''; ?>" href="<?php echo base_url('admin-dashboard'); ?>">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == 'admin-katalog') ? 'active' : ''; ?>" href="<?php echo base_url('admin-katalog'); ?>">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Manajemen Katalog</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == 'admin-pesanan') ? 'active' : ''; ?>" href="<?php echo base_url('admin-pesanan'); ?>">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Manajemen Pesanan</span>
            </a>
        </li>
    </ul>
</nav>