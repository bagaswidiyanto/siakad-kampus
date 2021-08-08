<section class="content-header">
    <h1>
        <?= $title ?> TA : <?= $ta['ta']; ?>/<?= $ta['semester']; ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dsn/index'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Jadwal Mengajar</li>
    </ol>
</section>
<br>
<div class="row">
    <table class="table table-bordered table-striped table-responsive">
        <tr class="label-success">
            <th>#</th>
            <th>Hari</th>
            <th>Program Studi</th>
            <th>Kode Mata Kuliah</th>
            <th>Mata Kuliah</th>
            <th>SKS</th>
            <th>Kelas</th>
            <th>Ruangan</th>
            <th>Dosen</th>
        </tr>
        <?php $no = 1;
        foreach ($jadwal as $key => $value) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $value['hari']; ?>, <?= $value['waktu']; ?></td>
                <td><?= $value['prodi']; ?></td>
                <td><?= $value['kode_matkul']; ?></td>
                <td><?= $value['matkul']; ?></td>
                <td><?= $value['sks']; ?></td>
                <td><?= $value['nama_kelas']; ?> - <?= $value['tahun_angkatan']; ?></td>
                <td><?= $value['ruangan']; ?></td>
                <td><?= $value['nama_dosen']; ?></td>
            </tr>
        <?php } ?>
    </table>
</div>