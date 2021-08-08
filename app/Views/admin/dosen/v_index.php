<section class="content-header">
    <h1>
        <?= $title ?>
    </h1>
</section>
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data <?= $title ?></h3>

                <div class="box-tools pull-right">
                    <a href="<?= base_url('dosen/add'); ?>" class="btn btn-default"><i class="fa fa-plus"></i></a>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success" role="alert">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                }
                ?>
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="50px">No</th>
                            <th>Kode Dosen</th>
                            <th>NIDN</th>
                            <th>Nama Dosen</th>
                            <th>password</th>
                            <th>Foto</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($dosen as $key => $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['kode_dosen']; ?></td>
                                <td><?= $value['nidn']; ?></td>
                                <td><?= $value['nama_dosen']; ?></td>
                                <td><?= $value['password']; ?></td>
                                <td>
                                    <img src="<?= base_url('fotodosen/' . $value['foto_dsn']); ?>" class="img-circle" width="50px" height="50px" alt="User Image">
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('dosen/edit/' . $value['id_dosen']); ?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_dosen'] ?>"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<!-- Modal delete -->
<?php foreach ($dosen as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_dosen'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete <?= $title; ?></h4>
                </div>
                <div class="modal-body text-center">
                    <h3>Apakah Anda Ingin Menghapus <?= $title; ?></h3>
                    <h4 class="text-red"><b><?= $value['nama_dosen']; ?></b></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left btn-flet" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('dosen/delete_data/' . $value['id_dosen']); ?>" class="btn btn-success btn-flat">Ya</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>