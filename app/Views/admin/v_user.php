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
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i></button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php
                $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            <?php foreach ($errors as $key => $value) { ?>
                                <li><?= esc($value); ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
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
                            <th>Nama User</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Foto</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($user as $key => $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['nama']; ?></td>
                                <td><?= $value['username']; ?></td>
                                <td><?= $value['password']; ?></td>
                                <td>
                                    <img src="<?= base_url('foto/' . $value['foto']); ?>" class="img-circle" width="50px" height="50px" alt="User Image">
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit<?= $value['id_user'] ?>"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_user'] ?>"><i class="fa fa-trash"></i></button>
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


<!-- Modal add -->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add User</h4>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('user/add'); ?>
                <div class="form-group">
                    <label>Nama User</label>
                    <input name="nama" class="form-control" placeholder="Nama User">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input name="username" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left btn-flet" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success btn-flat">Simpan</button>
            </div>
            <?= form_close(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- Modal edit -->
<?php foreach ($user as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_user'] ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit user</h4>
                </div>
                <div class="modal-body">
                    <?= form_open_multipart('user/edit/' . $value['id_user']); ?>
                    <div class="form-group">
                        <label>Nama User</label>
                        <input name="nama" value="<?= $value['nama']; ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" value="<?= $value['username']; ?>" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" value="<?= $value['password']; ?>" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label>Ganti Foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                    <div class="form-group">
                        <img src="<?= base_url('foto/' . $value['foto']); ?>" alt="" class="img-circle" width="50px" height="50px">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left btn-flet" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-flat">Simpan</button>
                </div>
                <?= form_close(); ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>

<!-- Modal delete -->
<?php foreach ($user as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_user'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete <?= $title; ?></h4>
                </div>
                <div class="modal-body text-center">
                    <h3>Apakah Anda Ingin Menghapus User</h3>
                    <h4 class="text-red"><b><?= $value['nama']; ?></b></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left btn-flet" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('user/delete_data/' . $value['id_user']); ?>" class="btn btn-success btn-flat">Ya</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>