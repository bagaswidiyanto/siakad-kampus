<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
        <!-- Jika upload berhasil -->
        <?php if (!empty(session()->getFlashdata('success'))) { ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php } ?>

        <!-- Jika upload gagal -->
        <?php
        $errors = $validation->getErrors();
        if (!empty($errors)) { ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors(); ?>
            </div>
        <?php } ?>


        <div class="card-header">
            <h3 class="card-title">Upload Gambar</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?= form_open_multipart(base_url('upload/save')); ?>
        <div class="card-body">
            <div class="form-group">
                <label>Keterangan</label>
                <input name="ket" class="form-control" placeholder="Keterangan" required>
            </div>
            <div class="form-group">
                <label>Gambar/Foto</label>
                <input type="file" name="gambar" class="form-control" required>
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <?= form_close(); ?>
    </div>

</div>
<!-- /.card -->
<div class="col-sm-6">
    <table id="" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Keterangan</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($data as $key => $value) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value['ket']; ?></td>
                    <td>
                        <img src="<?= base_url('folder_upload/' . $value['gambar']) ?>" width="50px" height="50px" alt="">
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>