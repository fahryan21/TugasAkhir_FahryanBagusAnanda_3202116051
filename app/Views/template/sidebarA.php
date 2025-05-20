<ul class="navbar-nav bg-website sidebar sidebar-dark" id="accordionSidebar">
    <!-- Sidebar Brand -->
    <a class="sidebar-brand text-white hvnb" href="<?= base_url('admin/dashboard') ?>">
        The Evgift
    </a>

    <!-- Dashboard -->
    <li class="nav-item <?= isset($activePage) && $activePage == 'dashboard' ? 'aktif' : '' ?>">
        <a class="nav-link al pl-3 pt-2 pb-2 msb" href="<?= base_url('admin/dashboard') ?>">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Produk -->
    <li class="nav-item <?= isset($activePage) && $activePage == 'produk' ? 'aktif' : '' ?>">
        <a class="nav-link al pl-3 pt-2 pb-2 msb" href="<?= base_url('admin/produk') ?>">
            <i class="fas fa-box"></i>
            <span>Produk</span>
        </a>
    </li>

    <!-- Kategori -->
    <li class="nav-item <?= isset($activePage) && $activePage == 'kategori' ? 'aktif' : '' ?>">
        <a class="nav-link al pl-3 pt-2 pb-2 msb" href="<?= base_url('admin/kategori') ?>">
            <i class="fas fa-tags"></i>
            <span>Kategori</span>
        </a>
    </li>

    <!-- Laporan -->
    <li class="nav-item <?= isset($activePage) && strpos($activePage, 'laporan_') === 0 ? 'aktif' : '' ?>">
        <a class="nav-link al pl-3 pt-2 pb-2 msb" href="#" data-toggle="collapse" data-target="#collapseLaporan" aria-expanded="true" aria-controls="collapseLaporan">
            <i class="fas fa-file-alt"></i>
            <span>Laporan</span>
        </a>
        <div id="collapseLaporan" class="collapse <?= isset($activePage) && strpos($activePage, 'laporan_') === 0 ? 'show' : '' ?>" aria-labelledby="headingLaporan" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?= isset($activePage) && $activePage == 'laporan_produk' ? 'aktif' : '' ?>" href="<?= base_url('admin/laporan/produk') ?>">Laporan Produk</a>
                <a class="collapse-item <?= isset($activePage) && $activePage == 'laporan_pemesanan' ? 'aktif' : '' ?>" href="<?= base_url('admin/laporan/pemesanan') ?>">Laporan Pemesanan</a>
                <a class="collapse-item <?= isset($activePage) && $activePage == 'laporan_pengiriman' ? 'aktif' : '' ?>" href="<?= base_url('admin/laporan/pengiriman') ?>">Laporan Pengiriman</a>
                <a class="collapse-item <?= isset($activePage) && $activePage == 'laporan_pembayaran' ? 'aktif' : '' ?>" href="<?= base_url('admin/laporan/pembayaran') ?>">Laporan Pembayaran</a>
                <a class="collapse-item <?= isset($activePage) && $activePage == 'laporan_penjualan' ? 'aktif' : '' ?>" href="<?= base_url('admin/laporan/penjualan') ?>">Laporan Penjualan</a>
            </div>
        </div>
    </li>

    <!-- User Management -->
    <li class="nav-item <?= isset($activePage) && $activePage == 'user_management' ? 'aktif' : '' ?>">
        <a class="nav-link al pl-3 pt-2 pb-2 msb" href="<?= base_url('admin/user-management') ?>">
            <i class="fas fa-users-cog"></i>
            <span>User Management</span>
        </a>
    </li>
</ul>
