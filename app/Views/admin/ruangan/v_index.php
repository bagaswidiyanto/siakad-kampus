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
                    <a href="<?= base_url('ruangan/add'); ?>" class="btn btn-default"><i class="fa fa-plus"></i></a>
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
                            <th>Ruangan</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($ruangan as $key => $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['gedung']; ?></td>
                                <td><?= $value['ruangan']; ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('ruangan/edit/' . $value['id_ruangan']); ?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_ruangan'] ?>"><i class="fa fa-trash"></i></button>
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
<?php foreach ($ruangan as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_ruangan'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete Ruangan</h4>
                </div>
                <div class="modal-body text-center">
                    <h3>Apakah Anda Ingin Menghapus Ruangan</h3>
                    <h4 class="text-red"><b><?= $value['ruangan']; ?></b></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left btn-flet" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('ruangan/delete_data/' . $value['id_ruangan']); ?>" class="btn btn-success btn-flat">Ya</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>