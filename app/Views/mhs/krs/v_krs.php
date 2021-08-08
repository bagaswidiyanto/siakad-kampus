<section class="content-header">
    <h1>
        <?= $title ?> Tahun Akademik : <?= $ta_aktif['ta']; ?> (<?= $ta_aktif['semester']; ?>)
    </h1>
</section>
<br>

<div class="row">
    <div class="col-sm-12">
        <table class="table-striped table-responsive">
            <tr>
                <th rowspan="7"><img src="<?= base_url('fotomhs/' . $mhs['foto_mhs']) ?>" width="120px" height="200px" style="margin-right: 10px;"></th>
                <th width="150px">Tahun Akademik</th>
                <th width="20px">:</th>
                <th><?= $ta_aktif['ta']; ?> (<?= $ta_aktif['semester']; ?>)</th>
                <th rowspan="7"></th>
            </tr>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td><?= $mhs['nim']; ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?= $mhs['nama_mhs']; ?></td>
            </tr>
            <tr>
                <td>Fakultas</td>
                <td>:</td>
                <td><?= $mhs['fakultas']; ?></td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td>:</td>
                <td><?= $mhs['prodi']; ?></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td><?= $mhs['nama_kelas']; ?>-<?= $mhs['tahun_angkatan']; ?></td>
            </tr>
            <tr>
                <td>Dosen PA</td>
                <td>:</td>
                <td><?= $mhs['nama_dosen']; ?></td>
            </tr>
        </table>
    </div>

    <div class="col-sm-12" style="margin-top: 10px;">
        <?php
        if (session()->getFlashdata('pesan')) {
            echo '<div class="alert alert-success" role="alert">';
            echo session()->getFlashdata('pesan');
            echo '</div>';
        }
        ?>
        <button class="btn btn-xs btn-flat btn-primary" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Add KRS</button>
        <a href="<?= base_url('krs/print'); ?>" target="_blank" class="btn btn-xs btn-flat btn-success"><i class="fa fa-print"></i> Cetak KRS</a>
    </div>
    <div class="col-sm-12">
        <table class="table table-bordered table-striped table-responsive">
            <tr class="label-success">
                <th class="text-center">#</th>
                <th class="text-center">Kode</th>
                <th class="text-center">Mata Kuliah</th>
                <th class="text-center">SKS</th>
                <th class="text-center">SMT</th>
                <th class="text-center">Kelas</th>
                <th class="text-center">Ruang</th>
                <th class="text-center">Dosen</th>
                <th class="text-center">Waktu</th>
                <th></th>
            </tr>
            <?php
            $no = 1;
            $sks = 0;
            foreach ($data_matkul as $key => $value) {
                $sks = $sks + $value['sks'];
            ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="text-center"><?= $value['kode_matkul']; ?></td>
                    <td><?= $value['matkul']; ?></td>
                    <td class="text-center"><?= $value['sks']; ?></td>
                    <td class="text-center"><?= $value['smt']; ?></td>
                    <td class="text-center"><?= $value['nama_kelas']; ?> <?= $value['tahun_angkatan']; ?></td>
                    <td class="text-center"><?= $value['ruangan']; ?></td>
                    <td><?= $value['nama_dosen']; ?></td>
                    <td class="text-center"><?= $value['hari']; ?>, <?= $value['waktu']; ?></td>
                    <td class="text-center">
                        <a href="" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#delete<?= $value['id_krs'] ?>"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <h5><b>Jumlah SKS : <?= $sks; ?></b></h5>
    </div>
</div>

<!-- Modal add Mata Kuliah -->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Daftar Mata Kuliah Ditawarkan</h4>
            </div>
            <div class="modal-body">
                <table id="example1" class="table table-bordered table-striped text-sm">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Kode</th>
                            <th>Mata Kuliah</th>
                            <th class="text-center">SKS</th>
                            <th class="text-center">SMT</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Ruang</th>
                            <th>Dosen</th>
                            <th>Waktu</th>
                            <th>Quota</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $db = \Config\Database::connect();
                        $no = 1;
                        foreach ($matkul_ditawarkan as $key => $value) {
                            $jumlah = $db->table('tbl_krs')
                                ->where('id_jadwal', $value['id_jadwal'])
                                ->countAllResults();
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td class="text-center"><?= $value['kode_matkul']; ?></td>
                                <td><?= $value['matkul']; ?></td>
                                <td class="text-center"><?= $value['sks']; ?></td>
                                <td class="text-center"><?= $value['smt']; ?></td>
                                <td><?= $value['nama_kelas']; ?></td>
                                <td class="text-center"><?= $value['ruangan']; ?></td>
                                <td><?= $value['kode_dosen']; ?></td>
                                <td><?= $value['waktu']; ?></td>
                                <td>
                                    <span class="label label-success" title="Quota Sudah Terisi <?= $jumlah; ?>"><?= $jumlah; ?>/<?= $value['quota']; ?></span>
                                </td>
                                <td>
                                    <?php if ($jumlah == $value['quota']) { ?>
                                        <span class="label label-danger" title="Quota Sudah Full">Full</span>
                                    <?php } else { ?>
                                        <a href="<?= base_url('krs/tambah_matkul/' . $value['id_jadwal']); ?>" class="btn btn-success btn-flat btn-xs"><i class="fa fa-plus"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal delete -->
<?php foreach ($data_matkul as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_krs'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete <?= $title; ?></h4>
                </div>
                <div class="modal-body text-center">
                    <h3>Apakah Anda Ingin Menghapus <br> <?= $title; ?></h3>
                    <h4 class="text-red"><b><?= $value['kode_matkul']; ?> | <?= $value['matkul']; ?></b></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left btn-flet" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('krs/delete_data/' . $value['id_krs']); ?>" class="btn btn-success btn-flat">Ya</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>