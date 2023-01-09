<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title ?></h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-widget widget-user">
                            <div class="widget-user-header bg-info">
                                <h3 class="widget-user-username"><?= $data['nama'] ?></h3>
                                <h5 class="widget-user-desc"><?= $data['pokja'] ?></h5>
                            </div>
                            <div class="widget-user-image">
                                <?php if ($data['foto'] == null) { ?>
                                    <img src="<?= base_url('/media/fotouser/' . 'blank.png') ?>" class="img-circle elevation-2" alt="User Avatar">
                                <?php } else { ?>
                                    <img src="<?= base_url('/media/fotouser/' . session()->get('foto')) ?>" class="img-circle elevation-2" alt="User Avatar">
                                <?php } ?>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-6 border-right">
                                        <div class="description-block">
                                            <?php if (session()->get('level') == '3') { ?>
                                                <h5 class="description-header"><?= $suratmasuk ?></h5>
                                            <?php } ?>
                                            <?php if (session()->get('level') == '1' or session()->get('level') == '2') { ?>
                                                <h5 class="description-header"><?= $suratmasukall ?></h5>
                                            <?php } ?>
                                            <span class="description-text">Surat Masuk</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="description-block">
                                            <?php if (session()->get('level') == '1') { ?>
                                                <h5 class="description-header"><?= $suratkeluarall ?></h5>
                                            <?php } ?>
                                            <?php if (session()->get('level') == '2') { ?>
                                                <h5 class="description-header"><?= $suratkeluar_s ?></h5>
                                            <?php } ?>
                                            <?php if (session()->get('level') == '3') { ?>
                                                <h5 class="description-header"><?= $suratkeluar ?></h5>
                                            <?php } ?>
                                            <span class="description-text">Surat Keluar</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="invoice p-3 mb-3">
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-user"></i> Profil Saya
                                        <a href="<?= base_url('my-profil/edit/' . $data['id']) ?>" class="btn btn-info btn-xs float-right">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                            <div class="col-sm-4 invoice-col mt-4">
                                <h6><b>Nama</b></h6>
                                <span><?= $data['nama'] ?></span>
                                <h6 class="mt-2"><b>Email</b></h6>
                                <span><?= $data['email'] ?></span>
                                <h6 class="mt-2"><b>Username</b></h6>
                                <span><?= $data['username'] ?></span>
                                <h6 class="mt-2"><b>Nomor Handphone</b></h6>
                                <span><?= $data['nohp'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>