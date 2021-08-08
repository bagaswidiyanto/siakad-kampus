<section class="content-header">
    <h1>
        <?= $title ?> Kelas : <?= $jadwal['nama_kelas']; ?> - <?= $jadwal['tahun_angkatan']; ?> TA : <?= $ta['ta']; ?>/<?= $ta['semester']; ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dsn/index'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?= base_url('dsn/NilaiMahasiswa'); ?>">Nilai Mahasiswa</a></li>
        <li class="active">Data Nilai</li>
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
        <a href="<?= base_url('dsn/PrintNilai/' . $jadwal['id_jadwal']); ?>" target="_blank" class="btn btn-xs btn-flat btn-success"><i class="fa fa-print"></i> Cetak Nilai</a>
        <?= form_open('dsn/SimpanNilai/' . $jadwal['id_jadwal']) ?>
        <table class="table table-bordered table-striped table-responsive text-sm">
            <tr class="label-success">
                <th rowspan="2" class="text-center">#</th>
                <th rowspan="2" class="text-center">NIM</th>
                <th rowspan="2" class="text-center">Mahasiswa</th>
                <th colspan="20" class="text-center">Nilai</th>
            </tr>
            <tr class="label-success">
                <th class="text-center">Absensi</th>
                <th class="text-center">Tugas</th>
                <th class="text-center">UTS</th>
                <th class="text-center">UAS</th>
                <th class="text-center">NA <br> (15% + 15% + 30% + 40%)</th>
                <th class="text-center">Huruf</th>
                <th class="text-center">Bobot</th>
            </tr>
            <?php
            $no = 1;
            foreach ($mhs as $key => $value) {
                echo form_hidden($value['id_krs'] . 'id_krs', $value['id_krs']);
            ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="text-center"><?= $value['nim']; ?></td>
                    <td width="400px"><?= $value['nama_mhs']; ?></td>
                    <td><?php
                        $absensi = ($value['p1'] +
                            $value['p2'] +
                            $value['p3'] +
                            $value['p4'] +
                            $value['p5'] +
                            $value['p6'] +
                            $value['p7'] +
                            $value['p8'] +
                            $value['p9'] +
                            $value['p10'] +
                            $value['p11'] +
                            $value['p12'] +
                            $value['p13'] +
                            $value['p14'] +
                            $value['p15'] +
                            $value['p16'] +
                            $value['p17'] +
                            $value['p18'] +
                            $value['p19'] +
                            $value['p20']) / 40 * 100;
                        echo number_format($absensi, 0);
                        echo form_hidden($value['id_krs'] . 'absen', number_format($absensi, 0));

                        ?></td>
                    <td class="text-center" width="80px"><input value="<?= $value['nilai_tugas']; ?>" name="<?= $value['id_krs']; ?>nilai_tugas" class="form-control"></td>
                    <td class="text-center" width="80px"><input value="<?= $value['nilai_uts']; ?>" name="<?= $value['id_krs']; ?>nilai_uts" class="form-control"></td>
                    <td class="text-center" width="80px"><input value="<?= $value['nilai_uas']; ?>" name="<?= $value['id_krs']; ?>nilai_uas" class="form-control"></td>
                    <td class="text-center"><?= $value['nilai_akhir']; ?></td>
                    <td class="text-center"><?= $value['nilai_huruf']; ?></td>
                    <td class="text-center"><?= $value['bobot']; ?></td>
                </tr>
            <?php } ?>
        </table>
        <button class="btn btn-success btn-flat btn-sm"><i class="fa fa-save"></i> Simpan Dan Proses</button>
        <?= form_close(); ?>

    </div>
</div>