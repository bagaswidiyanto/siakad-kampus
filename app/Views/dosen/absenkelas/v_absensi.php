<section class="content-header">
    <h1>
        <?= $title ?> Kelas : <?= $jadwal['nama_kelas']; ?> - <?= $jadwal['tahun_angkatan']; ?> TA : <?= $ta['ta']; ?>/<?= $ta['semester']; ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dsn/index'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?= base_url('dsn/AbsenKelas'); ?>">Absen Kelas</a></li>
        <li class="active">Absensi</li>
    </ol>
</section>
<br>
<div class="row">
    <div class="col-sm-12">
        <table class="table table-striped table-responsive">
            <tr>
                <td width="150px">Program Studi</td>
                <td width="30px">:</td>
                <td><?= $jadwal['prodi']; ?></td>
            </tr>
            <tr>
                <td>Fakultas</td>
                <td>:</td>
                <td><?= $jadwal['fakultas']; ?></td>
            </tr>
            <tr>
                <td>Kode Mata Kuliah</td>
                <td>:</td>
                <td><?= $jadwal['kode_matkul']; ?></td>
            </tr>
            <tr>
                <td>Jadwal</td>
                <td>:</td>
                <td><?= $jadwal['hari']; ?>, <?= $jadwal['waktu']; ?></td>
            </tr>
            <tr>
                <td>Dosen PA</td>
                <td>:</td>
                <td><?= $jadwal['nama_dosen']; ?></td>
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
        <a href="<?= base_url('dsn/print_absensi/' . $jadwal['id_jadwal']); ?>" target="_blank" class="btn btn-xs btn-flat btn-success"><i class="fa fa-print"></i> Cetak Absensi</a>
    </div>

    <div class="col-sm-12">
        <?= form_open('dsn/SimpanAbsen/' . $jadwal['id_jadwal']) ?>
        <table class="table table-bordered table-striped table-responsive text-sm">
            <tr class="label-success">
                <th rowspan="2" class="text-center">#</th>
                <th rowspan="2" class="text-center">NIM</th>
                <th rowspan="2" class="text-center">Mahasiswa</th>
                <th colspan="20" class="text-center">Pertemuan</th>
            </tr>
            <tr class="label-success">
                <td class="text-center">1</td>
                <td class="text-center">2</td>
                <td class="text-center">3</td>
                <td class="text-center">4</td>
                <td class="text-center">5</td>
                <td class="text-center">6</td>
                <td class="text-center">7</td>
                <td class="text-center">8</td>
                <td class="text-center">9</td>
                <td class="text-center">10</td>
                <td class="text-center">11</td>
                <td class="text-center">12</td>
                <td class="text-center">13</td>
                <td class="text-center">14</td>
                <td class="text-center">15</td>
                <td class="text-center">16</td>
                <td class="text-center">17</td>
                <td class="text-center">18</td>
                <td class="text-center">19</td>
                <td class="text-center">20<br></td>
            </tr>
            <?php
            $no = 1;
            foreach ($mhs as $key => $value) {
                echo form_hidden($value['id_krs'] . 'id_krs', $value['id_krs']);
            ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="text-center"><?= $value['nim']; ?></td>
                    <td><?= $value['nama_mhs']; ?></td>
                    <td>
                        <select name="<?= $value['id_krs']; ?>p1">
                            <option value="0" <?php if ($value['p1'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($value['p1'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($value['p1'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_krs']; ?>p2">
                            <option value="0" <?php if ($value['p2'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($value['p2'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($value['p2'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_krs']; ?>p3">
                            <option value="0" <?php if ($value['p3'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($value['p3'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($value['p3'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_krs']; ?>p4">
                            <option value="0" <?php if ($value['p4'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($value['p4'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($value['p4'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_krs']; ?>p5">
                            <option value="0" <?php if ($value['p5'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($value['p5'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($value['p5'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_krs']; ?>p6">
                            <option value="0" <?php if ($value['p6'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($value['p6'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($value['p6'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_krs']; ?>p7">
                            <option value="0" <?php if ($value['p7'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($value['p7'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($value['p7'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_krs']; ?>p8">
                            <option value="0" <?php if ($value['p8'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($value['p8'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($value['p8'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_krs']; ?>p9">
                            <option value="0" <?php if ($value['p9'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($value['p9'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($value['p9'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_krs']; ?>p10">
                            <option value="0" <?php if ($value['p10'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($value['p10'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($value['p10'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_krs']; ?>p11">
                            <option value="0" <?php if ($value['p11'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($value['p11'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($value['p11'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_krs']; ?>p12">
                            <option value="0" <?php if ($value['p12'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($value['p12'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($value['p12'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_krs']; ?>p13">
                            <option value="0" <?php if ($value['p13'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($value['p13'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($value['p13'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_krs']; ?>p14">
                            <option value="0" <?php if ($value['p14'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($value['p14'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($value['p14'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_krs']; ?>p15">
                            <option value="0" <?php if ($value['p15'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($value['p15'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($value['p15'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_krs']; ?>p16">
                            <option value="0" <?php if ($value['p16'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($value['p16'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($value['p16'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_krs']; ?>p17">
                            <option value="0" <?php if ($value['p17'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($value['p17'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($value['p17'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_krs']; ?>p18">
                            <option value="0" <?php if ($value['p18'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($value['p18'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($value['p18'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_krs']; ?>p19">
                            <option value="0" <?php if ($value['p19'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($value['p19'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($value['p19'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_krs']; ?>p20">
                            <option value="0" <?php if ($value['p20'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($value['p20'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($value['p20'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <button class="btn btn-success btn-flat btn-sm"><i class="fa fa-save"></i> Simpan Absen</button>
        <?= form_close(); ?>
    </div>
</div>