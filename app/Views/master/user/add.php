<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $titlebar ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('data-user') ?>">Daftar User</a></li>
                        <li class=" breadcrumb-item active">Tambah Data User</li>
                    </ol>
                </div>
            </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><?= $title ?></h3>
                        </div>
                        <form action="<?= base_url('data-user/save') ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input name="nama" type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" autocomplete="off" value="<?= old('nama'); ?>">
                                    <span class="error invalid-feedback"> <?= $validation->getError('nama'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" autocomplete="off" value="<?= old('email'); ?>">
                                    <span class="error invalid-feedback"> <?= $validation->getError('email'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Nomor HP</label>
                                    <input name="nohp" type="text" class="form-control <?= ($validation->hasError('nohp')) ? 'is-invalid' : ''; ?>" autocomplete="off" value="<?= old('nohp'); ?>">
                                    <span class="error invalid-feedback"> <?= $validation->getError('nohp'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input name="username" type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" autocomplete="off" value="<?= old('username'); ?>">
                                    <span class="error invalid-feedback"> <?= $validation->getError('username'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input name="password" type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" class="form-control" autocomplete="off">
                                    <span class="error invalid-feedback"> <?= $validation->getError('password'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Re-Type Password</label>
                                    <input name="repassword" type="password" class="form-control <?= ($validation->hasError('repassword')) ? 'is-invalid' : ''; ?>" class="form-control" autocomplete="off">
                                    <span class="error invalid-feedback"> <?= $validation->getError('repassword'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Level</label>
                                    <select name="level" class="form-control <?= ($validation->hasError('level')) ? 'is-invalid' : ''; ?>">
                                        <option selected disabled><?= (old('level')) ? old('level') : ".::Pilih Level::." ?></option>
                                        <option value="2">Sekretaris</option>
                                        <option value="3">Pokja I</option>
                                        <option value="4">Pokja II</option>
                                        <option value="5">Pokja III</option>
                                        <option value="6">Pokja IV</option>
                                    </select>
                                    <span class="error invalid-feedback"> <?= $validation->getError('level'); ?></span>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>