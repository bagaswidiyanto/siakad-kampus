<section class="content-header">
    <h1>
        <?= $title ?> TA : <?= $ta['ta']; ?>/<?= $ta['semester']; ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dsn/index'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Absen Kelas</li>
    </ol>
</section>
<br>
<div class="row">
    <table class="table table-bordered table-striped table-responsive">
        <tr class="label-success">
            <th>#</th>
            <th>Kode Mata Kuliah</th>
            <th>Mata Kuliah</th>
            <th>SKS</th>
            <th>Kelas</th>
            <th>Absensi</th>
        </tr>
        <?php $no = 1;
        foreach ($absen as $key => $value) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $value['kode_matkul']; ?></td>
                <td><?= $value['matkul']; ?></td>
                <td><?= $value['sks']; ?></td>
                <td><?= $value['nama_kelas']; ?> - <?= $value['tahun_angkatan']; ?></td>
                <td class="text-center">
                    <a href="<?= base_url('dsn/absensi/' . $value['id_jadwal']); ?>" class="btn btn-success btn-sm btn-flat"><i class="fa fa-calendar"></i> Absensi</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>