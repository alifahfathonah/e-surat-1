<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/admin/dist/css/adminlte.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/admin/plugins/toastr/toastr.min.css">
    <link rel="icon" href="<?= base_url(); ?>/media/logo/logo.png" type="image/x-icon" />
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <img src="<?= base_url(); ?>/media/logo/logo.png" alt="" class="img-fluid" width="70">
                <h4 class="mt-2">E-Arsip</h4>
                <small>(Desa Mangkai Baru | Kabupaten Batu Bara)</small>
            </div>
            <div class="card-body">
                <div class="swal-login" data-swal="<?= session()->getFlashdata('m'); ?>"></div>
                <div class="swal-logout" data-swal="<?= session()->getFlashdata('ml'); ?>"></div>
                <form action="<?= base_url('auth/verify') ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" name="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" value="<?= old('username'); ?>" placeholder="Masukkan Username" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <span class="text-danger text-sm <?= ($validation->hasError('password')) ? 'xtime' : ''; ?>"> <?= $validation->getError('username'); ?></span>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan Password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <span class="text-danger text-sm <?= ($validation->hasError('password')) ? 'xtime' : ''; ?>"> <?= $validation->getError('password'); ?></span>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="<?= base_url(); ?>/template/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>/template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>/template/admin/dist/js/adminlte.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url(); ?>/template/admin/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?= base_url(); ?>/template/admin/plugins/sweetalert2/script.js"></script>
    <!-- Toastr -->
    <script src="<?= base_url(); ?>/template/admin/plugins/toastr/toastr.min.js"></script>
    <script>
        window.setTimeout(function() {
            $(".xtime").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            })
        }, 3000);
    </script>
</body>

</html>