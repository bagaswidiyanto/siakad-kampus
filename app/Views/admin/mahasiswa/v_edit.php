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
                <?= form_open_multipart('mahasiswa/update/' . $mhs['id_mhs']); ?>
                <div class="form-group">
                    <label>NIM</label>
                    <input name="nim" value="<?= $mhs['nim']; ?>" class="form-control" placeholder="NIM">
                </div>
                <div class="form-group">
                    <label>Nama Mahasiswa</label>
                    <input name="nama_mhs" value="<?= $mhs['nama_mhs']; ?>" class="form-control" placeholder="Nama Mahasiswa">
                </div>
                <div class="form-group">
                    <label>Prodi</label>
                    <select name="id_prodi" class="form-control">
                        <option value="<?= $mhs['id_prodi']; ?>"><?= $mhs['prodi']; ?></option>
                        <?php foreach ($prodi as $key => $value) { ?>
                            <option value="<?= $value['id_prodi']; ?>"><?= $value['prodi']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input name="password" value="<?= $mhs['password']; ?>" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto_mhs" class="form-control">
                </div>
                <div class="form-group">
                    <img src="<?= base_url('fotomhs/' . $mhs['foto_mhs']); ?>" class="img-circle" width="50px" height="50px">
                </div>
            </div>
            <div class="modal-footer">
                <a href="<?= base_url('mahasiswa'); ?>" class="btn btn-danger pull-left btn-flet">Close</a>
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