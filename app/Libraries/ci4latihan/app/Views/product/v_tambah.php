<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="<?= base_url('product/save'); ?>" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label>Product Name</label>
                    <input name="product_name" class="form-control" placeholder="Product Name" required>
                </div>
                <div class="form-group">
                    <label>Product Description</label>
                    <input name="product_description" class="form-control" placeholder="Product Description" required>
                </div>
                <div class="form-group">
                    <label>Tahun</label>
                    <input name="tahun" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Jumlah</label>
                    <input name="jumlah" class="form-control" required>
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
<!-- /.card -->