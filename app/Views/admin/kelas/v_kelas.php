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
                            <th>Nama Kelas</th>
                            <th>Prodi</th>
                            <th>Dosen PA</th>
                            <th>Tahun Angkatan</th>
                            <th>Jumlah</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $db = \Config\Database::connect();
                        $no = 1;
                        foreach ($kelas as $key => $value) {
                            $jumlah = $db->table('tbl_mhs')
                                ->where('id_kelas', $value['id_kelas'])
                                ->countAllResults();
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td class="text-center"><?= $value['nama_kelas']; ?>-<?= $value['tahun_angkatan']; ?></td>
                                <td><?= $value['prodi']; ?></td>
                                <td><?= $value['nama_dosen']; ?></td>
                                <td class="text-center"><?= $value['tahun_angkatan']; ?></td>
                                <td class="text-center">

                                    <a href="<?= base_url('kelas/rincian_kelas/' . $value['id_kelas']); ?>">
                                        <p class="label bg-green"><?= $jumlah; ?></p>
                                        <br>Mahasiswa
                                    </a>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_kelas'] ?>"><i class="fa fa-trash"></i></button>
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
                <h4 class="modal-title">Add kelas</h4>
            </div>
            <div class="modal-body">
                <?= form_open('kelas/add'); ?>
                <div class="form-group">
                    <label>Nama Kelas</label>
                    <input name="nama_kelas" class="form-control" placeholder="Nama Kelas">
                </div>
                <div class="form-group">
                    <label>Program Studi</label>
                    <select name="id_prodi" class="form-control">
                        <option value="">--Pilih Program Studi--</option>
                        <?php foreach ($prodi as $key => $value) { ?>
                            <option value="<?= $value['id_prodi']; ?>"><?= $value['prodi']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Dosen PA</label>
                    <select name="id_dosen" class="form-control">
                        <option value="">--Pilih Dosen PA--</option>
                        <?php foreach ($dosen as $key => $value) { ?>
                            <option value="<?= $value['id_dosen']; ?>"><?= $value['nama_dosen']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tahun Angkatan</label>
                    <select name="tahun_angkatan" class="form-control">
                        <option value="">--Pilih Tahun Angkatan--</option>
                        <?php
                        for ($i = date('Y'); $i >= date('Y') - 6; $i--) { ?>
                            <option value="<?= $i; ?>"><?= $i; ?></option>
                        <?php } ?>
                    </select>
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

<!-- Modal delete -->
<?php foreach ($kelas as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_kelas'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete <?= $title; ?></h4>
                </div>
                <div class="modal-body text-center">
                    <h3>Apakah Anda Ingin Menghapus <?= $title; ?></h3>
                    <h4 class="text-red"><b><?= $value['nama_kelas']; ?></b></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left btn-flet" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('kelas/delete_data/' . $value['id_kelas']); ?>" class="btn btn-success btn-flat">Ya</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>