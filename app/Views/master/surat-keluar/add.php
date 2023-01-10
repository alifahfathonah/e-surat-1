<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $titlebar ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('surat-masuk') ?>">Daftar Surat masuk</a></li>
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
                                                        <select name="penandatangan " class="form-control <?= ($validation->hasError('penandatangan ')) ? 'is-invalid' : ''; ?>">
                                                            <option selected disabled><?= (old('penandatangan ')) ? old('penandatangan ') : ".::Pilih Penandatangan ::." ?></option>
                                                            <option value="Abii Hutabarat">Abii Hutabarat</option>
                                                        </select>
                                                        <span class="error invalid-feedback"> <?= $validation->getError('sifat'); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                                    </div>
                                    <div id="isi" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                        <div class="form-group">
                                            <label>Isi<span class="text-danger">*</span></label>
                                            <textarea name="isi" id="editor" class="form-control <?= ($validation->hasError('isi')) ? 'is-invalid' : ''; ?>" rows="5" autocomplete="off"><?= old('isi'); ?></textarea>
                                            <span class="error invalid-feedback"> <?= $validation->getError('isi'); ?></span>
                                        </div>
                                        <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                                        <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                                    </div>
                                    <div id="tujuan" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                        <div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
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