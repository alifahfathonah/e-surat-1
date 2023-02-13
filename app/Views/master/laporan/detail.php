<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <?php if (session()->get('level') == '1' or session()->get('level') == '2') { ?>
                            <li class="breadcrumb-item"><a href="<?= base_url('data-laporan-kegiatan') ?>">Daftar Laporan Kegiatan</a></li>
                        <?php } else { ?>
                            <li class="breadcrumb-item"><a href="<?= base_url('laporan-kegiatan') ?>">Daftar Laporan Kegiatan</a></li>
                        <?php } ?>
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
                                    <img src="<?= base_url('media/fotouser/' . $data['foto']); ?>" class="img-circle img-bordered-sm" alt="User Image">
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
                                                    <td style="width: 10%">
                                                        Judul
                                                    </td>
                                                    <td style="width: 1%">
                                                        :
                                                    </td>
                                                    <td style="width: 20%">
                                                        <p><?= $data['judul'] ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Manfaat dan Tujuan Kegiatan
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td>
                                                        <p style="text-align:justify;"><?= $data['manfaat'] ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Sasaran dan Capaian
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td>
                                                        <p style="text-align:justify;"><?= $data['sasaran'] ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Tanggal Kegiatan
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td>
                                                        <?= format_indo($data['tgl_kegiatan']) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Dokumentasi Kegiatan
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td>
                                                        <img src="<?= base_url('/media/foto-kegiatan/' . $data['foto_kegiatan']) ?>" width="300px" height="150px" class="img rounded border">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>