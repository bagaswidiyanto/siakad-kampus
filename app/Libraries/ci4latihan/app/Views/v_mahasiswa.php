<div class="col-sm-12">
    <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>Fakultas</th>
                <th>Jurusan</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($mahasiswa as $key => $value) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value['nama_mhs']; ?></td>
                    <td><?= $value['nama_fakultas']; ?></td>
                    <td><?= $value['nama_jurusan']; ?></td>
                    <td><?= $value['alamat']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>