<section class="content-header">
    <h1>
        <?= $title ?> Tahun Akademik : <?= $ta_aktif['ta']; ?> (<?= $ta_aktif['semester']; ?>)
    </h1>
</section>
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="box box-success box-solid">
            <!-- /.box-header -->
            <div class="box-body">
                <table id="" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th>Fakultas</th>
                            <th class="text-center">Kode Prodi</th>
                            <th>Prodi</th>
                            <th class="text-center">Jenjang</th>
                            <th class="text-center">Jadwal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($prodi as $key => $value) { ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $value['fakultas']; ?></td>
                                <td class="text-center"><?= $value['kode_prodi']; ?></td>
                                <td><?= $value['prodi']; ?></td>
                                <td class="text-center"><?= $value['jenjang']; ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('jadwalkuliah/detailjadwal/' . $value['id_prodi']); ?>" class="btn btn-success btn-flat btn-sm" title="Cek Jadwal">
                                        <i class="fa fa-calendar"></i>
                                    </a>
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