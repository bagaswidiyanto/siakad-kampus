<section class="content-header">
    <h1>
        <?= $title ?>
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
                            <th width="50px">No</th>
                            <th>Fakultas</th>
                            <th>Kode Prodi</th>
                            <th>Prodi</th>
                            <th>Jenjang</th>
                            <th>Mata Kuliah</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $db = \Config\Database::connect();
                        $no = 1;
                        foreach ($prodi as $key => $value) {
                            $jumlah = $db->table('tbl_matkul')
                                ->where('id_prodi', $value['id_prodi'])
                                ->countAllResults();
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['fakultas']; ?></td>
                                <td><?= $value['kode_prodi']; ?></td>
                                <td><?= $value['prodi']; ?></td>
                                <td><?= $value['jenjang']; ?></td>
                                <td class="text-center">
                                    <p class="label bg-green"><?= $jumlah; ?></p>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('matkul/detail/' . $value['id_prodi']); ?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-th-list"></i></a>
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