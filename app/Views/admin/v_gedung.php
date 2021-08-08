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
                            <th>Gedung</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($gedung as $key => $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['gedung']; ?></td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit<?= $value['id_gedung'] ?>"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_gedung'] ?>"><i class="fa fa-trash"></i></button>
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
                <h4 class="modal-title">Add Gedung</h4>
            </div>
            <div class="modal-body">
                <?= form_open('gedung/add'); ?>
                <div class="form-group">
                    <label> gedung</label>
                    <input name="gedung" class="form-control" placeholder="Gedung" required>
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
<?php foreach ($gedung as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_gedung'] ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Gedung</h4>
                </div>
                <div class="modal-body">
                    <?= form_open('gedung/edit/' . $value['id_gedung']); ?>
                    <div class="form-group">
                        <label> gedung</label>
                        <input name="gedung" value="<?= $value['gedung']; ?>" class="form-control" placeholder="gedung" required>
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
<?php foreach ($gedung as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_gedung'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete Gedung</h4>
                </div>
                <div class="modal-body text-center">
                    <h3>Apakah Anda Ingin Menghapus Gedung</h3>
                    <h4 class="text-red"><b><?= $value['gedung']; ?></b></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left btn-flet" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('gedung/delete_data/' . $value['id_gedung']); ?>" class="btn btn-success btn-flat">Ya</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>