<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>General Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('data-user') ?>">Daftar User</a></li>
                        <li class=" breadcrumb-item active">Edit Data User</li>
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
                        <form action="<?= base_url('data-user/update') ?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input name="nama" type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" autocomplete="off" value="<?= (old('nama')) ? old('nama') : $data['nama']; ?>">
                                    <span class="error invalid-feedback"> <?= $validation->getError('level'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>l" autocomplete="off" value="<?= (old('email')) ? old('email') : $data['email']; ?>">
                                    <span class="error invalid-feedback"> <?= $validation->getError('level'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Nomor HP</label>
                                    <input name="nohp" type="text" class="form-control <?= ($validation->hasError('nohp')) ? 'is-invalid' : ''; ?>" autocomplete="off" value="<?= (old('nohp')) ? old('nohp') : $data['nohp']; ?>">
                                    <span class="error invalid-feedback"> <?= $validation->getError('level'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input name="username" type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" autocomplete="off" value="<?= (old('username')) ? old('username') : $data['username']; ?>">
                                    <span class="error invalid-feedback"> <?= $validation->getError('level'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input name="pass" type="password <?= ($validation->hasError('pass')) ? 'is-invalid' : ''; ?>" class="form-control" autocomplete="off">
                                    <span class="error invalid-feedback"> <?= $validation->getError('level'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Re-Type Password</label>
                                    <input name="repass" type="password <?= ($validation->hasError('repass')) ? 'is-invalid' : ''; ?>" class="form-control" autocomplete="off">
                                    <span class="error invalid-feedback"> <?= $validation->getError('level'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Level</label>
                                    <select name="level" class="form-control <?= ($validation->hasError('level')) ? 'is-invalid' : ''; ?>">
                                        <option value="<?= $data['level'] ?>" <?= $data['level'] == 2 ? 'selected' : ''; ?>>Sekretaris</option>
                                        <option value="<?= $data['level'] ?>" <?= $data['level'] == 3 ? 'selected' : ''; ?>>User</option>
                                    </select>
                                    <span class="error invalid-feedback"> <?= $validation->getError('level'); ?></span>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>