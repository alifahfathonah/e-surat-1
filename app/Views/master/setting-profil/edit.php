<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $titlebar ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('my-profil') ?>">Profil Saya</a></li>
                        <li class=" breadcrumb-item active">Edit Profil Desa</li>
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
                        <form action="<?= base_url('setting-profil/update/' . $data['id']) ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="id" value="<?= $data['id']; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Desa<span class="text-danger">*</span></label>
                                    <input name="nmdesa" type="text" class="form-control <?= ($validation->hasError('nmdesa')) ? 'is-invalid' : ''; ?>" autocomplete="off" value="<?= (old('nmdesa')) ? old('nmdesa') : $data['nama_desa']; ?>">
                                    <span class="error invalid-feedback"> <?= $validation->getError('nmdesa'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Kecamatan<span class="text-danger">*</span></label>
                                    <input name="nmkecamatan" type="text" class="form-control <?= ($validation->hasError('nmkecamatan')) ? 'is-invalid' : ''; ?>" autocomplete="off" value="<?= (old('nmkecamatan')) ? old('nmkecamatan') : $data['nama_kecamatan']; ?>">
                                    <span class="error invalid-feedback"> <?= $validation->getError('nmkecamatan'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Alamat<span class="text-danger">*</span></label>
                                    <textarea name="alamat" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" rows="5" autocomplete="off" placeholder="Tulis Alamat ..."><?= (old('alamat')) ? old('alamat') : $data['alamat']; ?></textarea>
                                    <span class="error invalid-feedback"> <?= $validation->getError('alamat'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Kode Pos<span class="text-danger">*</span></label>
                                    <input name="kdpos" type="text" class="form-control <?= ($validation->hasError('kdpos')) ? 'is-invalid' : ''; ?>" autocomplete="off" value="<?= (old('kdpos')) ? old('kdpos') : $data['kode_pos']; ?>">
                                    <span class="error invalid-feedback"> <?= $validation->getError('kdpos'); ?></span>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>