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
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title"><?= $title ?></h3>
                        </div>
                        <form action="<?= base_url('surat-masuk/update/' . $data['id']) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="id" value="<?= $data['id']; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nomor Surat<span class="text-danger">*</span></label>
                                    <input name="nosurat" type="text" class="form-control <?= ($validation->hasError('nosurat')) ? 'is-invalid' : ''; ?>" autocomplete="off" value="<?= (old('nosurat')) ? old('nosurat') : $data['no_surat']; ?>">
                                    <span class="error invalid-feedback"> <?= $validation->getError('nosurat'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Sifat Surat<span class="text-danger">*</span></label>
                                    <select name="sifat" class="form-control <?= ($validation->hasError('sifat')) ? 'is-invalid' : ''; ?>">
                                        <option value="<?= $data['sifat_surat'] ?>"><?= (old('sifat')) ? old('sifat') : $data['sifat_surat'] ?></option>
                                        <option value="Amat Segera">Amat Segera</option>
                                        <option value="Biasa">Biasa</option>
                                        <option value="Penting">Penting</option>
                                        <option value="Segera">Segera</option>
                                        <option value="Sangat Biasa">Sangat Biasa</option>
                                        <option value="Rahasia">Rahasia</option>
                                    </select>
                                    <span class="error invalid-feedback"> <?= $validation->getError('sifat'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Kategori Surat<span class="text-danger">*</span></label>
                                    <select name="kategori" class="form-control <?= ($validation->hasError('kategori')) ? 'is-invalid' : ''; ?>">
                                        <option value="<?= $data['kategori_surat'] ?>"><?= (old('kategori')) ? old('kategori') : $data['kategori_surat'] ?></option>
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
                                    <label>Perihal<span class="text-danger">*</span></label>
                                    <textarea name="perihal" class="form-control <?= ($validation->hasError('perihal')) ? 'is-invalid' : ''; ?>" rows="3" autocomplete="off" placeholder="Tulis Perihal ..."><?= (old('perihal')) ? old('perihal') : $data['perihal'] ?></textarea>
                                    <span class="error invalid-feedback"> <?= $validation->getError('perihal'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Asal Surat<span class="text-danger">*</span></label>
                                    <input name="asal" type="text" class="form-control <?= ($validation->hasError('asal')) ? 'is-invalid' : ''; ?>" autocomplete="off" value="<?= (old('asal')) ? old('asal') : $data['asal_surat'] ?>">
                                    <span class="error invalid-feedback"> <?= $validation->getError('asal'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>File Surat<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="file_surat" class="custom-file-input <?= ($validation->hasError('file_surat')) ? 'is-invalid' : ''; ?>">
                                            <label class="custom-file-label">Pilih File</label>
                                        </div>
                                    </div>
                                    <span class="text-danger text-sm"> <?= $validation->getError('file_surat'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Lampiran <small class>(*Opsional)</small></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="lampiran" class="custom-file-input">
                                            <label class="custom-file-label">Pilih File</label>
                                        </div>
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