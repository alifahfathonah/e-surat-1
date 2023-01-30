<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('/home'); ?>" class="brand-link">
        <img src="<?= base_url(); ?>/media/logo/logo.png" alt="Lambang Batu Bara" class="brand-image ml-4 mr-4">
        <span class="brand-text font-weight-light">e Arsip</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-2 d-flex">
            <div class="image">
                <?php if (session()->get('foto') == null) { ?>
                    <img src="<?= base_url('/media/fotouser/' . 'blank.png') ?>" class="img-circle elevation-2" alt="User Image">
                <?php } else { ?>
                    <img src="<?= base_url('/media/fotouser/' . session()->get('foto')) ?>" class="img-circle elevation-2" alt="User Image">
                <?php } ?>
            </div>
            <div class="info">
                <a href="<?= base_url('my-profil'); ?>" class="d-block"><?= session()->get('nama'); ?></a>
                <small class="text-muted">
                    <?php if (session()->get('level') == '1') {
                        echo "Administrator";
                    } elseif (session()->get('level') == '2') {
                        echo "Sekretaris";
                    } elseif (session()->get('level') == '3') {
                        echo "User";
                    }
                    ?>
                </small>
            </div>
        </div>
        <center>
            <small class="text-white badge badge-success mb-2"> <?= format_indo(date('Y-m-d')) ?> | <span id='jam'></span></small>
        </center>
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <!-- Service uri -->
            <?php $request = \Config\Services::request(); ?>
            <!-- =========== -->
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">MENU</li>
                <li class="nav-item">
                    <a href="<?= base_url('/home') ?>" class="nav-link <?= ($request->uri->getSegment(1) == 'home') ? 'active' : ""; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>
                <?php if (session()->get('level') == '1') { ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link <?= ($request->uri->getSegment(1) == 'data-user' or $request->uri->getSegment(1) == 'penandatangan') ? 'active' : ""; ?>">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Master
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('data-user') ?>" class="nav-link <?= ($request->uri->getSegment(1) == 'data-user') ? 'active' : ""; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>User</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('penandatangan') ?>" class="nav-link <?= ($request->uri->getSegment(1) == 'penandatangan') ? 'active' : ""; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Penandatangan</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>

                <li class="nav-item">
                    <a href="#" class="nav-link <?= ($request->uri->getSegment(1) == 'tambah-surat-masuk' or $request->uri->getSegment(1) == 'surat-masuk' or $request->uri->getSegment(1) == 'data-surat-masuk') ? 'active' : ""; ?>">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Surat Masuk
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <?php if (session()->get('level') == '3'  or session()->get('level') == '2') { ?>
                                <a href="<?= base_url('tambah-surat-masuk') ?>" class="nav-link <?= ($request->uri->getSegment(1) == 'tambah-surat-masuk') ? 'active' : ""; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tambah Surat Masuk</p>
                                </a>
                                <a href="<?= base_url('surat-masuk') ?>" class="nav-link <?= ($request->uri->getSegment(1) == 'surat-masuk') ? 'active' : ""; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Daftar Surat Masuk</p>
                                </a>
                            <?php } ?>
                            <?php if (session()->get('level') == '1') { ?>
                                <a href="<?= base_url('surat-masuk') ?>" class="nav-link <?= ($request->uri->getSegment(1) == 'surat-masuk') ? 'active' : ""; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Daftar Surat Masuk</p>
                                </a>
                            <?php } ?>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link <?= ($request->uri->getSegment(1) == 'tambah-surat-keluar' or $request->uri->getSegment(1) == 'surat-keluar' or $request->uri->getSegment(1) == 'data-surat-keluar') ? 'active' : ""; ?>">
                        <i class="nav-icon fas fa-envelope-open-text"></i>
                        <p>
                            Surat Keluar
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <?php if (session()->get('level') == '3' or session()->get('level') == '2') { ?>
                                <a href="<?= base_url('tambah-surat-keluar') ?>" class="nav-link <?= ($request->uri->getSegment(1) == 'tambah-surat-keluar') ? 'active' : ""; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tambah Surat Keluar</p>
                                </a>
                                <?php if (session()->get('level') == '3') { ?>
                                    <a href="<?= base_url('surat-keluar') ?>" class="nav-link <?= ($request->uri->getSegment(1) == 'surat-keluar') ? 'active' : ""; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Daftar Surat Keluar</p>
                                    </a>
                                <?php } ?>
                            <?php } ?>
                            <?php if (session()->get('level') == '1' or session()->get('level') == '2') { ?>
                                <a href="<?= base_url('data-surat-keluar') ?>" class="nav-link <?= ($request->uri->getSegment(1) == 'data-surat-keluar') ? 'active' : ""; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Daftar Surat Keluar</p>
                                </a>
                            <?php } ?>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('auth/logout') ?>" class="nav-link">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <i class="nav-icon fa fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>