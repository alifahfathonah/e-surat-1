<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('/home'); ?>" class="brand-link">
        <img src="<?= base_url(); ?>/template/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">e Surat</span>
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
                        <a href="#" class="nav-link <?= ($request->uri->getSegment(1) == 'data-user') ? 'active' : ""; ?>">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Master Data
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('data-user') ?>" class="nav-link <?= ($request->uri->getSegment(1) == 'data-user') ? 'active' : ""; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data User</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
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