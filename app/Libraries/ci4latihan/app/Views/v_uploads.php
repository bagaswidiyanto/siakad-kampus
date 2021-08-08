<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
        <!-- Jika upload berhasil -->
        <?php if (!empty(session()->getFlashdata('success'))) { ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php } ?>

        <div class="card-header">
            <h3 class="card-title">Upload Gambar</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?= form_open_multipart(base_url('uploads/save')); ?>
        <div class="card-body">
            <div class="form-group">
                <label>Judul</label>
                <input name="judul" class="form-control" placeholder="Keterangan" required>
            </div>
            <div class="form-group">
                <label>Gambar/Foto</label>
                <input type="file" name="file_upload[]" class="form-control" required multiple="true">
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <?= form_close(); ?>
    </div>

</div>