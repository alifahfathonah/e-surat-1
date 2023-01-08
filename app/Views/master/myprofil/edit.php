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
                        <li class=" breadcrumb-item active">Edit Profil</li>
                    </ol>
                </div>
            </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"><?= $title ?></h3>
                </div>
                <form action="<?= base_url('my-profil/update/' . $data['id']) ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= $data['id']; ?>">
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama<span class="text-danger">*</span></label>
                                        <input name="nama" type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" autocomplete="off" value="<?= (old('nama')) ? old('nama') : $data['nama']; ?>">
                                        <span class="error invalid-feedback"> <?= $validation->getError('nama'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Email<span class="text-danger">*</span></label>
                                        <input name="email" type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>l" autocomplete="off" value="<?= (old('email')) ? old('email') : $data['email']; ?>">
                                        <span class="error invalid-feedback"> <?= $validation->getError('email'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor HP<span class="text-danger">*</span></label>
                                        <input name="nohp" type="text" class="form-control <?= ($validation->hasError('nohp')) ? 'is-invalid' : ''; ?>" autocomplete="off" value="<?= (old('nohp')) ? old('nohp') : $data['nohp']; ?>">
                                        <span class="error invalid-feedback"> <?= $validation->getError('nohp'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Password<span class="text-danger">*</span></label>
                                        <input name="password" type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" autocomplete="off">
                                        <span class="error invalid-feedback"> <?= $validation->getError('password'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Re-Type Password<span class="text-danger">*</span></label>
                                        <input name="repassword" type="password" class="form-control <?= ($validation->hasError('repassword')) ? 'is-invalid' : ''; ?>" autocomplete="off">
                                        <span class="error invalid-feedback"> <?= $validation->getError('repassword'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Foto</label>
                                        </div>
                                        <div class="col-md-4">
                                            <img src="<?= base_url('media/fotouser/' . $data['foto']) ?>" alt="image profile" class="img-thumbnail rounded img-preview">
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="foto" class="custom-file-input <?= ($validation->hasError('foto')) ? 'has-error' : ''; ?>" id="foto" onchange="previewImg();" accept=".png, .jpg, .jpeg">
                                                    <label class="custom-file-label">Pilih File</label>
                                                </div>
                                            </div>
                                            <span class="error invalid-feedback"> <?= $validation->getError('foto'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>