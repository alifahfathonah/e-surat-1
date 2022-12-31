<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="swal" data-swal="<?= session()->getFlashdata('m'); ?>"></div>
                        <div class="card-header">
                            <a href="<?= base_url('data-user/add') ?>" class="btn btn-primary btn-xs">
                                <i class="fa fa-plus-circle"></i>&nbsp;Tambah
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Nomor HP</th>
                                        <th>Username</th>
                                        <th>
                                            <center>Foto</center>
                                        </th>
                                        <th style="width: 10%">
                                            <center>Aksi</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($data as $key => $r) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $r['nama']; ?></td>
                                            <td><?= $r['email']; ?></td>
                                            <td><?= $r['nohp']; ?></td>
                                            <td><?= $r['username']; ?></td>
                                            <td>
                                                <center>
                                                    <?php if ($r['foto'] == null) { ?>
                                                        <img src="<?= base_url('/media/fotouser/' . 'blank.png') ?>" width="30px" class="img rounded">
                                                    <?php } else { ?>
                                                        <img src="<?= base_url('/media/fotouser/' . $r['foto']) ?>" width="30px" class="img rounded">
                                                    <?php } ?>
                                                </center>
                                            <td>
                                                <div class="form-button-action">
                                                    <center>
                                                        <a href="data-user/edit/<?= $r['id']; ?>" class="btn btn-warning btn-xs">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-danger btn-xs" title="Hapus Data" data-toggle='modal' data-target='#activateModalDelete<?= $r['id'] ?>'>
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </center>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>