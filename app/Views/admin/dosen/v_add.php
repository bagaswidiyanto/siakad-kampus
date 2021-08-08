<section class="content-header">
    <h1>
        <?= $title ?>
    </h1>
</section>
<br>
<div class="row">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-6">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $title ?></h3>

                <div class="box-tools pull-right">

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
                <?= form_open_multipart('dosen/insert'); ?>
                <div class="form-group">
                    <label>Kode Dosen</label>
                    <input name="kode_dosen" class="form-control" placeholder="Kode Dosen">
                </div>
                <div class="form-group">
                    <label>NIDN</label>
                    <input name="nidn" class="form-control" placeholder="NIDN">
                </div>
                <div class="form-group">
                    <label>Nama Dosen</label>
                    <input name="nama_dosen" class="form-control" placeholder="Nama Dosen">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto_dsn" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <a href="<?= base_url('dosen'); ?>" class="btn btn-danger pull-left btn-flet">Close</a>
                <button type="submit" class="btn btn-success btn-flat">Simpan</button>
            </div>
            <!-- /.box-body -->
            <?= form_close(); ?>
        </div>
        <!-- /.box -->
    </div>
    <div class="col-sm-3">
    </div>
</div>