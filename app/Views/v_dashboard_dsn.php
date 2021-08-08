<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-success">
            <div class="box-body box-profile">
                <div class="text-center">
                    <img class="img-circle" src="<?= base_url('fotodsn/' . $dosen['foto_dsn']); ?>" alt="User profile picture" width="80%" height="268px">
                </div>
                <h3 class="profile-username text-center"><?= $dosen['nidn']; ?></h3>
                <h3 class="profile-username text-center"><?= $dosen['nama_dosen']; ?></h3>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-9">
        <!-- About Me Box -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Biodata Mahasiswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-responsive">
                    <tr>
                        <th width="200px">Tahun Akademik</th>
                        <th width="30px">:</th>
                        <th><?= $ta['ta']; ?>/<?= $ta['semester']; ?></th>
                    </tr>
                    <tr>
                        <th>Kode</th>
                        <th>:</th>
                        <th><?= $dosen['nidn']; ?></th>
                    </tr>
                    <tr>
                        <th>Tempat Lahir</th>
                        <th>:</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <th>:</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>Pendidikan Terakhir</th>
                        <th>:</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <th>:</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>No HP</th>
                        <th>:</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <th>:</th>
                        <th></th>
                    </tr>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>