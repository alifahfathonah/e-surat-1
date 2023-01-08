<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard
                        <?php if (session()->get('level') == '1') {
                            echo "Administrator";
                        } elseif (session()->get('level') == '2') {
                            echo "Sekretaris";
                        } elseif (session()->get('level') == '3') {
                            echo "User"; ?>&nbsp;<?= session()->get('pokja'); ?>
                    <?php } ?></h1>
                    <h6><?= $appname; ?></h6>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $users ?></h3>
                            <p>Account Users</p>
                        </div>
                        <div class="icon">
                            <i class="ionicons ion-ios-people"></i>
                        </div>
                        <a href="<?= base_url('data-user') ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $suratmasuk ?></h3>
                            <p>Surat Masuk</p>
                        </div>
                        <div class="icon">
                            <i class="ionicons ion-email-unread"></i>
                        </div>
                        <a href="<?= base_url('surat-masuk') ?>" class="small-box-footer">Selengkapnya<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>0</h3>
                            <p>Surat Keluar</p>
                        </div>
                        <div class="icon">

                            <i class="ionicons ion-android-drafts"></i>
                        </div>
                        <a href="#" class="small-box-footer">Selengkapnya<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>