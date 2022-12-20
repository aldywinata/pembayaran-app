<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-heading">Administrator</li>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard/') ?>">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">Menu Pembayaran</li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-cash-stack"></i><span>Pembayaran</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="<?= base_url() ?>InputPembayaran">
                <i class="bi bi-circle"></i><span>Input Pembayaran</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>KonfirmasiPembayaran">
                <i class="bi bi-circle"></i><span>Menunggu Konfirmasi</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>RiwayatPembayaran">
                <i class="bi bi-circle"></i><span>Riwayat Pembayaran</span>
                </a>
            </li>
            </ul>
        </li><!-- End Pembayaran Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url() ?>jenistagihan">
            <i class="bi bi-menu-button-wide"></i>
            <span>Data Jenis Tagihan</span>
            </a>
        </li><!-- End Data Jenis Pembayaran -->

        <li class="nav-heading">Menu Siswa</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url() ?>tahunajaran">
            <i class="bi bi-calendar3"></i>
            <span>Data Tahun Ajaran</span>
            </a>
        </li><!-- End Data Tahun Ajaran -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url() ?>Students">
            <i class="bi bi-people"></i>
            <span>Data Siswa</span>
            </a>
        </li><!-- End Data Siswa -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url() ?>Kejuruan">
            <i class="bx bxs-graduation"></i>
            <span>Data Kejuruan</span>
            </a>
        </li><!-- End Data Jurusan -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url() ?>Kelas">
            <i class="bx bxs-building"></i>
            <span>Data Kelas</span>
            </a>
        </li><!-- End Data Kelas -->

        <li class="nav-heading">Database</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url() ?>User">
            <i class="bi bi-people"></i>
            <span>Data Users</span>
            </a>
        </li><!-- End Data Users -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
            <i class="bi bi-printer"></i>
            <span>Print Laporan</span>
            </a>
        </li>

    </ul>
</aside><!-- End Sidebar-->