<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $titlebar ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('desa') ?>">Desa</a></li>
                        <li class=" breadcrumb-item active">Tambah Desa</li>
                    </ol>
                </div>
            </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title"><?= $title ?></h3>
                        </div>
                        <form action="<?= base_url('desa/save') ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kode<span class="text-danger">*</span></label>
                                    <input name="kode" type="text" class="form-control <?= ($validation->hasError('kode')) ? 'is-invalid' : ''; ?>" autocomplete="off" value="<?= old('kode'); ?>">
                                    <span class="error invalid-feedback"> <?= $validation->getError('kode'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Nama Desa<span class="text-danger">*</span></label>
                                    <input name="nama_desa" type="text" class="form-control <?= ($validation->hasError('nama_desa')) ? 'is-invalid' : ''; ?>" autocomplete="off" value="<?= old('nama_desa'); ?>">
                                    <span class="error invalid-feedback"> <?= $validation->getError('nama_desa'); ?></span>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>