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
                        <?php if (session()->get('level') == '3') { ?>
                            <div class="card-header">
                                <a href="<?= base_url('tambah-surat-masuk') ?>" class="btn btn-info btn-xs">
                                    <i class="fa fa-plus-circle"></i>&nbsp;Tambah
                                </a>
                            </div>
                        <?php } ?>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th style="width: 15%">Nomor Surat</th>
                                        <th style="width: 20%">Asal</th>
                                        <th style="width: 30%">Perihal</th>
                                        <th style="width: 10%">
                                            <center>Post by</center>
                                        </th>
                                        <th style="width: 10%">
                                            <center>Created</center>
                                        </th>
                                        <th style="width: 15%">
                                            <center>Aksi</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($data as $key => $r) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $r['no_surat']; ?></td>
                                            <td><?= $r['asal_surat']; ?></td>
                                            <td><?= $r['perihal']; ?></td>
                                            <td>
                                                <center>
                                                    <?= $r['pokja']; ?>
                                                </center>
                                            </td>
                                            <td><?= format_tanggal($r['created_at']); ?></td>
                                            <td>
                                                <div class="form-button-action">
                                                    <center>
                                                        <a href="surat-masuk/view/<?= $r['id']; ?>" class="btn btn-info btn-xs" title="Detail Data">
                                                            <i class="fa fa-info-circle"></i>
                                                        </a>
                                                        <?php if (session()->get('level') == '3' && $r['pokja'] == (session()->get('pokja'))) { ?>
                                                            <a href="surat-masuk/edit/<?= $r['id']; ?>" class="btn btn-warning btn-xs" title="Edit Data">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-danger btn-xs" title="Hapus Data" data-toggle='modal' data-target='#activateModalDeleteSm<?= $r['id'] ?>'>
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        <?php } ?>
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
<!-- Modal -->
<?php foreach ($data as $r) { ?>
    <form action="<?= base_url('surat-masuk/' . $r['id']); ?>" method="post">
        <?= csrf_field(); ?>
        <div class="modal fade" id="activateModalDeleteSm<?= $r['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apa kamu yakin ingin menghapus surat dengan nomor <span class="text-danger"><?= $r['no_surat'] ?></span> ini secara permanen ???
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-default btn-sm" type="button" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-primary btn-sm">Ya</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php } ?>