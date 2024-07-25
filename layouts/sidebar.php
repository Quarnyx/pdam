<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a href="index.html" class="logo logo-light">
                    Sistem Pengelolaan Kas Besar

                </a>
                <a href="index.html" class="logo logo-dark">
                    Sistem Pengelolaan Kas Besar
                </a>
            </div>

            <ul id="side-menu">

                <li class="menu-title">Menu</li>

                <li>
                    <a href="?page=dashboard" class="tp-link">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>

                </li>
                <li class="menu-title">Halaman</li>

                <li>
                    <a href="#sidebarAuth" data-bs-toggle="collapse">
                        <i data-feather="database"></i>
                        <span> Transaksi </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAuth">
                        <ul class="nav-second-level">
                            <li>
                                <a href="?page=kas-masuk" class="tp-link">Kas Masuk</a>
                            </li>
                            <li>
                                <a href="?page=kas-keluar" class="tp-link">Kas Keluar</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php
                if ($_SESSION['level'] === 'Admin') {
                    ?>
                    <li>
                        <a href="#sidebarError" data-bs-toggle="collapse">
                            <i data-feather="bar-chart"></i>
                            <span> Laporan </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarError">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="?page=laporan-kas-masuk" class="tp-link">Kas Masuk</a>
                                </li>
                                <li>
                                    <a href="?page=laporan-kas-keluar" class="tp-link">Kas Keluar</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="?page=rekening" class="tp-link">
                            <i data-feather="dollar-sign"></i>
                            <span> Rekening </span>
                        </a>
                    </li>

                    <li>
                        <a href="?page=kategori" class="tp-link">
                            <i data-feather="grid"></i>
                            <span> Kategori Transaksi </span>
                        </a>
                    </li>

                    <li>
                        <a href="?page=pengguna" class="tp-link">
                            <i data-feather="users"></i>
                            <span> Data Pengguna </span>
                        </a>
                    </li>
                <?php } ?>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>