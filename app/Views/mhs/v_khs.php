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
        <a href="<?= base_url('mhs/print_khs'); ?>" target="_blank" class="btn btn-xs btn-flat btn-success"><i class="fa fa-print"></i> Cetak KHS</a>
    </div>
    <div class="col-sm-12">
        <table class="table table-bordered table-striped table-responsive">
            <tr class="label-success">
                <th class="text-center">#</th>
                <th class="text-center">Kode</th>
                <th class="text-center">Mata Kuliah</th>
                <th class="text-center">SKS</th>
                <th class="text-center">SMT</th>
                <th class="text-center">Nilai</th>
                <th class="text-center">Bobot</th>
            </tr>
            <?php
            $no = 1;
            $sks = 0;
            $grand_tot_bobot = 0;
            foreach ($data_matkul as $key => $value) {
                $sks = $sks + $value['sks'];
                $tot_bobot = $value['sks'] * $value['bobot'];
                $grand_tot_bobot = $grand_tot_bobot + $tot_bobot;
            ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="text-center"><?= $value['kode_matkul']; ?></td>
                    <td><?= $value['matkul']; ?></td>
                    <td class="text-center"><?= $value['sks']; ?></td>
                    <td class="text-center"><?= $value['smt']; ?></td>
                    <td class="text-center"><?= $value['nilai_huruf']; ?></td>
                    <td class="text-center"><?= $value['bobot']; ?></td>

                </tr>
            <?php } ?>
        </table>
        <h5><b>Jumlah SKS : <?= $sks; ?></b></h5>
        <h5><b>IP : <?php if (empty($data_matkul)) {
                        echo '0';
                    } else {
                        echo number_format($grand_tot_bobot / $sks, 2);
                    } ?></b></h5>
    </div>
</div>