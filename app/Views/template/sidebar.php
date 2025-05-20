<ul class="navbar-nav bg-website sidebar sidebar-dark" id="accordionSidebar">
    <!-- Sidebar Brand -->
    <a class="sidebar-brand text-white hvnb" href="<?= base_url('adminController/dashboard') ?>">
        The Evgift
    </a>

    <!-- Dashboard -->
    <li class="nav-item <?= isset($activePage) && $activePage == 'dashboard' ? 'aktif' : '' ?>">
        <a class="nav-link al pl-3 pt-2 pb-2 msb" href="<?= base_url('adminController/dashboard') ?>">
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Produk -->
    <li class="nav-item <?= isset($activePage) && $activePage == 'produk' ? 'aktif' : '' ?>">
        <a class="nav-link al pl-3 pt-2 pb-2 msb" href="<?= base_url('adminController/produk') ?>">
            <span>Produk</span>
        </a>
    </li>

    <!-- Kategori -->
    <li class="nav-item <?= isset($activePage) && $activePage == 'kategori' ? 'aktif' : '' ?>">
        <a class="nav-link al pl-3 pt-2 pb-2 msb" href="<?= base_url('adminController/kategori') ?>">
            <span>Kategori</span>
        </a>
    </li>

    <!-- Laporan Produk -->
    <li class="nav-item <?= isset($activePage) && $activePage == 'laporan_produk' ? 'aktif' : '' ?>">
        <a class="nav-link al pl-3 pt-2 pb-2 msb" href="<?= base_url('adminController/laporan/produk') ?>">
            <span>Laporan Produk</span>
        </a>
    </li>


    <!-- Laporan Pemesanan -->
    <li class="nav-item <?= isset($activePage) && $activePage == 'laporan_pemesanan' ? 'aktif' : '' ?>">
        <a class="nav-link al pl-3 pt-2 pb-2 msb" href="<?= base_url('adminController/laporan/pemesanan') ?>">
            <span>Laporan Pemesanan</span>
        </a>
    </li>

    <!-- Laporan Pengiriman -->
    <li class="nav-item <?= isset($activePage) && $activePage == 'laporan_pengiriman' ? 'aktif' : '' ?>">
        <a class="nav-link al pl-3 pt-2 pb-2 msb" href="<?= base_url('adminController/laporan/pengiriman') ?>">
            <span>Laporan Pengiriman</span>
        </a>
    </li>

    <!-- Laporan Pembayaran -->
    <li class="nav-item <?= isset($activePage) && $activePage == 'laporan_pembayaran' ? 'aktif' : '' ?>">
        <a class="nav-link al pl-3 pt-2 pb-2 msb" href="<?= base_url('adminController/laporan/pembayaran') ?>">
            <span>Laporan Pembayaran</span>
        </a>
    </li>

    <!-- Laporan Retur Produk -->
    <li class="nav-item <?= isset($activePage) && $activePage == 'laporan_retur' ? 'aktif' : '' ?>">
        <a class="nav-link al pl-3 pt-2 pb-2 msb" href="<?= base_url('adminController/laporan/retur') ?>">
            <span>Laporan Retur Produk</span>
        </a>
    </li>

    <!-- Laporan Penjualan -->
    <li class="nav-item <?= isset($activePage) && $activePage == 'laporan_penjualan' ? 'aktif' : '' ?>">
        <a class="nav-link al pl-3 pt-2 pb-2 msb" href="<?= base_url('adminController/laporan/penjualan') ?>">
            <span>Laporan Penjualan</span>
        </a>
    </li>

    <!-- Transaksi -->
    <li class="nav-item <?= isset($activePage) && $activePage == 'transaksi' ? 'aktif' : '' ?>">
        <a class="nav-link al pl-3 pt-2 pb-2 msb" href="<?= base_url('adminController/transaksi') ?>">
            <span>Transaksi</span>
        </a>
    </li>

    <!-- Informasi Testimoni -->
    <li class="nav-item <?= isset($activePage) && $activePage == 'testimoni' ? 'aktif' : '' ?>">
        <a class="nav-link al pl-3 pt-2 pb-2 msb" href="<?= base_url('adminController/testimoni') ?>">
            <span>Informasi Testimoni</span>
        </a>
    </li>

    <!-- Produk Retur -->
    <li class="nav-item <?= isset($activePage) && $activePage == 'retur' ? 'aktif' : '' ?>">
        <a class="nav-link al pl-3 pt-2 pb-2 msb" href="<?= base_url('adminController/retur') ?>">
            <span>Produk Retur</span>
        </a>
    </li>
</ul>