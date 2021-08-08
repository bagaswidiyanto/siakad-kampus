<section class="content-header">
    <h1>
        <?= $title ?> TA : <?= $ta['ta']; ?>/<?= $ta['semester']; ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dsn/index'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Nilai Mahasiswa</li>
    </ol>
</section>
<br>
<div class="row">
    <table class="table table-bordered table-striped table-responsive">
        <tr class="label-success">
            <th class="text-center">#</th>
            <th class="text-center">Kode Mata Kuliah</th>
            <th>Mata Kuliah</th>
            <th class="text-center">SKS</th>
            <th class="text-center">Kelas</th>
            <th class="text-center">Nilai</th>
        </tr>
        <?php $no = 1;
        foreach ($absen as $key => $value) { ?>
            <tr>
                <td class="text-center"><?= $no++; ?></td>
                <td class="text-center"><?= $value['kode_matkul']; ?></td>
                <td><?= $value['matkul']; ?></td>
                <td class="text-center"><?= $value['sks']; ?></td>
                <td class="text-center"><?= $value['nama_kelas']; ?> - <?= $value['tahun_angkatan']; ?></td>
                <td class="text-center">
                    <a href="<?= base_url('dsn/DataNilai/' . $value['id_jadwal']); ?>" class="btn btn-success btn-sm btn-flat"><i class="fa fa-calendar"></i> Nilai</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>