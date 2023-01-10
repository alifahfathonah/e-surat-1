<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $titlebar ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('surat-keluar') ?>">Daftar Surat Keluar</a></li>
                        <li class=" breadcrumb-item active">Tambah Surat Masuk</li>
                    </ol>
                </div>
            </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title"><?= $title ?></h3>
                        </div>
                        <form action="<?= base_url('tambah-surat-keluar/save') ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="card-body p-0">
                                <div class="bs-stepper">
                                    <div class="bs-stepper-header" role="tablist">
                                        <div class="step" data-target="#rincian">
                                            <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                                <span class="bs-stepper-circle">1</span>
                                                <span class="bs-stepper-label">Rincian Surat</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#isi">
                                            <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                                <span class="bs-stepper-circle">2</span>
                                                <span class="bs-stepper-label">Isi Surat</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#tujuan">
                                            <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                                <span class="bs-stepper-circle">3</span>
                                                <span class="bs-stepper-label">Tujuan</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="bs-stepper-content">
                                        <div id="rincian" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Nomor Surat<span class="text-danger">*</span></label>
                                                            <input name="nosurat" type="text" class="form-control <?= ($validation->hasError('nosurat')) ? 'is-invalid' : ''; ?>" autocomplete="off" value="<?= old('nosurat'); ?>">
                                                            <span class="error invalid-feedback"> <?= $validation->getError('nosurat'); ?></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Kategori Surat<span class="text-danger">*</span></label>
                                                            <select name="kategori" class="form-control <?= ($validation->hasError('kategori')) ? 'is-invalid' : ''; ?>">
                                                                <option selected disabled><?= (old('kategori')) ? old('kategori') : ".::Pilih Kategori::." ?></option>
                                                                <option value="Undangan">Undangan</option>
                                                                <option value="Biasa">Biasa</option>
                                                                <option value="Pengumuman">Pengumuman</option>
                                                                <option value="Pemberitahuan">Pemberitahuan</option>
                                                                <option value="Panggilan">Panggilan</option>
                                                                <option value="Pengantar">Pengantar</option>
                                                                <option value="Edaran">Edaran</option>
                                                            </select>
                                                            <span class="error invalid-feedback"> <?= $validation->getError('kategori'); ?></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Sifat Surat<span class="text-danger">*</span></label>
                                                            <select name="sifat" class="form-control <?= ($validation->hasError('sifat')) ? 'is-invalid' : ''; ?>">
                                                                <option selected disabled><?= (old('sifat')) ? old('sifat') : ".::Pilih Sifat::." ?></option>
                                                                <option value="Amat Segera">Amat Segera</option>
                                                                <option value="Biasa">Biasa</option>
                                                                <option value="Penting">Penting</option>
                                                                <option value="Segera">Segera</option>
                                                                <option value="Sangat Biasa">Sangat Biasa</option>
                                                                <option value="Rahasia">Rahasia</option>
                                                            </select>
                                                            <span class="error invalid-feedback"> <?= $validation->getError('sifat'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Perihal<span class="text-danger">*</span></label>
                                                            <textarea name="perihal" class="form-control <?= ($validation->hasError('perihal')) ? 'is-invalid' : ''; ?>" rows="5" autocomplete="off" placeholder="Tulis Perihal ..."><?= old('perihal'); ?></textarea>
                                                            <span class="error invalid-feedback"> <?= $validation->getError('perihal'); ?></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Penandatangan<span class="text-danger">*</span></label>
                                                            <select name="penandatangan" class="form-control <?= ($validation->hasError('penandatangan')) ? 'is-invalid' : ''; ?>">
                                                                <option selected disabled><?= (old('penandatangan')) ? old('penandatangan') : ".::Pilih Penandatangan ::." ?></option>
                                                                <option value="Abii Hutabarat">Abii Hutabarat</option>
                                                            </select>
                                                            <span class="error invalid-feedback"> <?= $validation->getError('penandatangan'); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="btn btn-primary" onclick="stepper.next()">Next</a>
                                        </div>
                                        <div id="isi" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                            <div class="form-group">
                                                <label>Isi<span class="text-danger">*</span></label>
                                                <textarea name="isi" id="editor" class="form-control <?= ($validation->hasError('isi')) ? 'is-invalid' : ''; ?>" autocomplete="off"><?= old('isi'); ?></textarea>
                                                <span class="error invalid-feedback"> <?= $validation->getError('isi'); ?></span>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Jumlah Lampiran</label>
                                                    <input name="jlhlampiran" type="text" class="form-control <?= ($validation->hasError('jlhlampiran')) ? 'is-invalid' : ''; ?>" autocomplete="off" value="<?= old('jlhlampiran'); ?>">
                                                    <span class="error invalid-feedback"> <?= $validation->getError('jlhlampiran'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Satuan</label>
                                                    <select name="satuan" class="form-control <?= ($validation->hasError('satuan')) ? 'is-invalid' : ''; ?>">
                                                        <option selected disabled><?= (old('satuan')) ? old('satuan') : ".::Pilih Satuan::." ?></option>
                                                        <option value="Lembar">Lembar</option>
                                                        <option value="Bundel">Bundel</option>
                                                        <option value="Set">Set</option>
                                                    </select>
                                                    <span class="error invalid-feedback"> <?= $validation->getError('satuan'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Lampiran<small>(*Opsional)</small></label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="file_lampiran" class="custom-file-input <?= ($validation->hasError('file_lampiran')) ? 'is-invalid' : ''; ?>">
                                                            <label class="custom-file-label">Pilih File</label>
                                                        </div>
                                                    </div>
                                                    <span class="text-danger text-sm"> <?= $validation->getError('file_lampiran'); ?></span>
                                                </div>
                                            </div>
                                            <a class="btn btn-primary mt-2" onclick="stepper.previous()">Previous</a>
                                            <a class="btn btn-primary mt-2" onclick="stepper.next()">Next</a>
                                        </div>
                                        <div id="tujuan" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tujuan<span class="text-danger">*</span></label>
                                                    <select name="tujuan" class="form-control <?= ($validation->hasError('tujuan')) ? 'is-invalid' : ''; ?>">
                                                        <option selected disabled><?= (old('tujuan')) ? old('tujuan') : ".::Pilih Tujuan::." ?></option>
                                                        <option value="Dinas Komunikasi dan Informartika">Dinas Komunikasi dan Informartika</option>
                                                    </select>
                                                    <span class="error invalid-feedback"> <?= $validation->getError('tujuan'); ?></span>
                                                </div>
                                                <a class="btn btn-primary" onclick="stepper.previous()">Previous</a>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>