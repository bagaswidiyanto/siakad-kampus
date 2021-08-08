<div class="col-sm-12">
    <a href="<?= base_url('product/tambah'); ?>" class="btn btn-primary">Tambah Data</a>
    <br><br>
    <?php
    if (!empty(session()->getFlashdata('success'))) { ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php } ?>
    <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Product</th>
                <th>Deskripsi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($product as $key => $value) :
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value['product_name']; ?></td>
                    <td><?= $value['product_description']; ?></td>
                    <td>
                        <a href="<?= base_url('product/edit/' . $value['product_id']); ?>" class="btn btn-warning">Edit</a>
                        <a href="<?= base_url('product/delete/' . $value['product_id']); ?>" class="btn btn-danger" onclick="return confirm('Apakah ingin hapus data ? ')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>