<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('surat-masuk') ?>">Daftar Surat masuk</a></li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $title ?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    <div class="row">
                        <div class="col-12">
                            <div class="post">
                                <div class="user-block">
                                    <?php if ($data['foto'] == null) { ?>
                                        <img src="<?= base_url('/media/fotouser/' . 'blank.png') ?>" class="img-circle img-bordered-sm" alt="User Image">
                                    <?php } else { ?>
                                        <img src="<?= base_url('/media/fotouser/' . session()->get('foto')) ?>" class="img-circle img-bordered-sm" alt="User Image">
                                    <?php } ?>
                                    <span class="username">
                                        <a href="#"><?= $data['nama'] ?></a>
                                    </span>
                                    <span class="description"><?= $data['pokja'] ?></span>
                                    <span class="description">post on - <span class="badge badge-info"><?= format_indo($data['created_at']) ?></span></span>
                                </div>
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table>
                                                <tr>
                                                    <td style="width: 4%">
                                                        Nomor Surat
                                                    </td>
                                                    <td style="width: 1%">
                                                        :
                                                    </td>
                                                    <td style="width: 20%">
                                                        <?= $data['no_surat'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Sifat
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td>
                                                        <?= $data['sifat_surat'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Kategori
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td>
                                                        <?= $data['kategori_surat'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Perihal
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td>
                                                        <?= $data['perihal'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Asal Surat
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td>
                                                        <?= $data['asal_surat'] ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?= base_url() ?>/media/surat-masuk/<?= $data['file']; ?>" target="blank" class="link-blue text-sm"><i class="fas fa-link mr-1"></i> File Surat</a>
                                </p>
                                <?php if ($data['lampiran'] != null) { ?>
                                    <a href="<?= base_url() ?>/media/lampiran/<?= $data['lampiran']; ?>" target="blank" class="link-blue text-sm"><i class="fas fa-link mr-1"></i> File Lampiran</a>
                                <?php } else { ?>
                                    <a href="#" class="link-blue text-sm LampiranError"><i class="fas fa-link mr-1"></i> File Lampiran</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>