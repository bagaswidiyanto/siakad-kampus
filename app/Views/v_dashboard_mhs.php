<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-success">
            <div class="box-body box-profile">
                <div class="text-center">
                    <img class="img-circle" src="<?= base_url('fotomhs/' . $mhs['foto_mhs']); ?>" alt="User profile picture" width="80%" height="268px">
                </div>
                <h3 class="profile-username text-center"><?= $mhs['nim']; ?></h3>
                <h3 class="profile-username text-center"><?= $mhs['nama_mhs']; ?></h3>

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
                        <th width="150px">Tahun Akademik</th>
                        <th width="30px">:</th>
                        <th><?= $ta['ta']; ?></th>
                    </tr>
                    <tr>
                        <th>Progam Studi</th>
                        <th>:</th>
                        <th><?= $mhs['prodi']; ?></th>
                    </tr>
                    <tr>
                        <th>Fakultas</th>
                        <th>:</th>
                        <th><?= $mhs['fakultas']; ?></th>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <th>:</th>
                        <th><?= $mhs['nama_kelas']; ?> - <?= $mhs['tahun_angkatan']; ?></th>
                    </tr>
                    <tr>
                        <th>Dosen PA</th>
                        <th>:</th>
                        <th><?= $mhs['nama_dosen']; ?></th>
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