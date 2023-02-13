<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $titlebar ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('laporan-kegiatan') ?>"><?= $titlebar ?></a></li>
                        <li class=" breadcrumb-item active"><?= $title ?></li>
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
                        <form action="<?= base_url('tambah-laporan-kegiatan/save') ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Judul Kegiatan<span class="text-danger">*</span></label>
                                    <input name="judul" type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" autocomplete="off" value="<?= old('judul'); ?>">
                                    <span class="error invalid-feedback"> <?= $validation->getError('judul'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Manfaat dan Tujuan Kegiatan<span class="text-danger">*</span></label>
                                    <textarea name="manfaat" class="form-control <?= ($validation->hasError('manfaat')) ? 'is-invalid' : ''; ?>" rows="5" autocomplete="off" placeholder="Tulis Manfaat dan Tujuan Kegiatan ..."><?= old('manfaat'); ?></textarea>
                                    <span class="error invalid-feedback"> <?= $validation->getError('manfaat'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Sasaran dan Capaian<span class="text-danger">*</span></label>
                                    <textarea name="sasaran" class="form-control <?= ($validation->hasError('sasaran')) ? 'is-invalid' : ''; ?>" rows="5" autocomplete="off" placeholder="Tulis Sasaran dan Capaian ..."><?= old('sasaran'); ?></textarea>
                                    <span class="error invalid-feedback"> <?= $validation->getError('sasaran'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Kegiatan<span class="text-danger">*</span></label>
                                    <input name="tglk" type="date" class="form-control <?= ($validation->hasError('tglk')) ? 'is-invalid' : ''; ?>" autocomplete="off" value="<?= old('tglk'); ?>">
                                    <span class="error invalid-feedback"> <?= $validation->getError('tglk'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Foto Kegiatan<span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <img src="<?= base_url('media/foto-kegiatan/camera.png') ?>" alt="image profile" width="120px" class="img-thumbnail rounded img-preview">
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="foto" class="custom-file-input <?= ($validation->hasError('foto')) ? 'has-error' : ''; ?>" id="foto" onchange="previewImg();" accept=".png, .jpg, .jpeg">
                                                <label class="custom-file-label">Pilih File</label>
                                            </div>
                                        </div>
                                        <span class="text-danger text-sm"> <?= $validation->getError('foto'); ?></span>
                                    </div>
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