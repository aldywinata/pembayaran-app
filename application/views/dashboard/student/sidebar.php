<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        
        <li class="nav-heading">Dashboard</li>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard/student') ?>">
            <i class="bi bi-grid"></i>
            <span>Profil</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">Menu Pembayaran</li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-cash-stack"></i><span>Pembayaran</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= base_url() ?>Pembayaran">
                    <i class="bi bi-circle"></i><span>Input Pembayaran</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>KonfirmasiPembayaran">
                    <i class="bi bi-circle"></i><span>Menunggu Konfirmasi</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Pembayaran Nav -->
        
        <li class="nav-heading">Database</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url() ?>RiwayatPembayaran">
            <i class="bi bi-printer"></i>
            <span>Riwayat Pembayaran</span>
            </a>
        </li>
            
    </ul>
</aside><!-- End Sidebar-->