<section class="content-header">
    <h1>
        <a href="<?= base_url('jadwalkuliah'); ?>" title="Kembali Ke Jadwal Kuliah"><?= $title ?></a>
        <small><?= $prodi['prodi']; ?></small>
    </h1>
</section>
<br>
<div class="row">
    <div class="col-sm-12">
        <a href="<?= base_url('jadwalkuliah'); ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i></a>
        <br><br>
        <div class="box box-success box-solid">
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th width="150px">Program Studi</th>
                        <td width="20px">:</td>
                        <td><?= $prodi['prodi']; ?></td>
                    </tr>
                    <tr>
                        <th>Jenjang</th>
                        <td>:</td>
                        <td><?= $prodi['jenjang']; ?></td>
                    </tr>
                    <tr>
                        <th>Fakultas</th>
                        <td>:</td>
                        <td><?= $prodi['fakultas']; ?></td>
                    </tr>
                    <tr>
                        <th>Tahun Akademik</th>
                        <td>:</td>
                        <td><?= $ta_aktif['ta']; ?> (<?= $ta_aktif['semester']; ?>)</td>
                    </tr>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="box box-success box-solid">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data <?= $title ?></h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#add" title="Tambah Mata Kuliah"><i class="fa fa-plus"></i></button>
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
                        <table id="" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" width="50px">No</th>
                                    <th class="text-center">Smt</th>
                                    <th>Kode Mata Kuliah</th>
                                    <th class="text-center">SKS</th>
                                    <th class="text-center">Kelas</th>
                                    <th class="text-center">Dosen</th>
                                    <th class="text-center">Hari</th>
                                    <th class="text-center">Waktu</th>
                                    <th class="text-center">Ruangan</th>
                                    <th class="text-center">Quota</th>
                                    <th class="text-center" width="150">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($jadwal as $key => $value) { ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td class="text-center"><?= $value['smt']; ?></td>
                                        <td><?= $value['matkul']; ?></td>
                                        <td class="text-center"><?= $value['sks']; ?></td>
                                        <td class="text-center"><?= $value['nama_kelas']; ?> (<?= $value['tahun_angkatan']; ?>)</td>
                                        <td><?= $value['nama_dosen']; ?></td>
                                        <td class="text-center"><?= $value['hari']; ?></td>
                                        <td class="text-center"><?= $value['waktu']; ?></td>
                                        <td class="text-center"><?= $value['ruangan']; ?></td>
                                        <td class="text-center"><?= $value['quota']; ?></td>
                                        <td>
                                            <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_jadwal'] ?>"><i class="fa fa-trash"></i></button>
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
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<!-- Modal add -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add <?= $title; ?></h4>
            </div>
            <div class="modal-body">
                <?= form_open('jadwalkuliah/add/' . $prodi['id_prodi']); ?>
                <div class="form-group">
                    <label>Kode Mata Kuliah</label>
                    <select name="id_matkul" id="" class="form-control">
                        <option value="">--Pilih Mata Kuliah--</option>
                        <?php foreach ($matkul as $key => $value) { ?>
                            <?php if ($value['semester'] == $ta_aktif['semester']) { ?>
                                <option value="<?= $value['id_matkul']; ?>"><?= $value['smt']; ?> | <?= $value['kode_matkul']; ?> | <?= $value['matkul']; ?> | <?= $value['sks']; ?> SKS</option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Dosen</label>
                    <select name="id_dosen" id="" class="form-control">
                        <option value="">--Pilih Dosen--</option>
                        <?php foreach ($dosen as $key => $value) { ?>
                            <option value="<?= $value['id_dosen']; ?>"><?= $value['nama_dosen']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Kelas</label>
                    <select name="id_kelas" id="" class="form-control">
                        <option value="">--Pilih Kelas--</option>
                        <?php foreach ($kelas as $key => $value) { ?>
                            <option value="<?= $value['id_kelas']; ?>"><?= $value['nama_kelas']; ?>-<?= $value['tahun_angkatan']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Hari:*</label>
                            <select name="hari" id="" class="form-control">
                                <option value="">--Pilih Hari--</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Waktu</label>
                            <input name="waktu" class="form-control" placeholder="Ex: 08:00-10:30">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Ruangan</label>
                            <select name="id_ruangan" id="" class="form-control">
                                <option value="">--Pilih Ruangan--</option>
                                <?php foreach ($ruangan as $key => $value) { ?>
                                    <option value="<?= $value['id_ruangan']; ?>"><?= $value['ruangan']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Quota</label>
                            <input name="quota" class="form-control" placeholder="Quota">
                        </div>
                    </div>
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
<?php foreach ($jadwal as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_jadwal'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete <?= $title; ?></h4>
                </div>
                <div class="modal-body text-center">
                    <h3>Apakah Anda Ingin Menghapus <?= $title; ?></h3>
                    <h4 class="text-red"><b><?= $value['kode_matkul']; ?> | <?= $value['nama_dosen']; ?></b></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left btn-flet" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('jadwalkuliah/delete/' . $value['id_jadwal'] . '/' . $prodi['id_prodi']); ?>" class="btn btn-success btn-flat">Ya</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>