<section class="content-header">
    <h1>
        <?= $title ?> Tahun Akademik : <?= $ta_aktif['ta']; ?> (<?= $ta_aktif['semester']; ?>)
    </h1>
</section>
<br>
<div class="row">
    <div class="col-sm-12">
        <table class="table table-bordered table-striped table-responsive">
            <tr class="label-success">
                <th rowspan="2" class="text-center">#</th>
                <th rowspan="2" class="text-justify">Kode</th>
                <th rowspan="2" class="text-center">Mata Kuliah</th>
                <th colspan="20" class="text-center">Pertemuan</th>
                <th rowspan="2" class="text-center">%</th>
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
            $sks = 0;
            foreach ($data_matkul as $key => $value) {
                $sks = $sks + $value['sks'];
            ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="text-center"><?= $value['kode_matkul']; ?></td>
                    <td><?= $value['matkul']; ?></td>
                    <td>
                        <?php if ($value['p1'] == 0) {
                            echo "<i class='fa fa-times text-danger'></i>";
                        } elseif ($value['p1'] == 1) {
                            echo "<i class='fa fa-info text-warning'></i>";
                        } elseif ($value['p1'] == 2) {
                            echo "<i class='fa fa-check text-success'></i>";
                        } ?>
                    </td>
                    <td>
                        <?php if ($value['p2'] == 0) {
                            echo "<i class='fa fa-times text-danger'></i>";
                        } elseif ($value['p2'] == 1) {
                            echo "<i class='fa fa-info text-warning'></i>";
                        } elseif ($value['p2'] == 2) {
                            echo "<i class='fa fa-check text-success'></i>";
                        } ?>
                    </td>
                    <td>
                        <?php if ($value['p3'] == 0) {
                            echo "<i class='fa fa-times text-danger'></i>";
                        } elseif ($value['p3'] == 1) {
                            echo "<i class='fa fa-info text-warning'></i>";
                        } elseif ($value['p3'] == 2) {
                            echo "<i class='fa fa-check text-success'></i>";
                        } ?>
                    </td>
                    <td>
                        <?php if ($value['p4'] == 0) {
                            echo "<i class='fa fa-times text-danger'></i>";
                        } elseif ($value['p4'] == 1) {
                            echo "<i class='fa fa-info text-warning'></i>";
                        } elseif ($value['p4'] == 2) {
                            echo "<i class='fa fa-check text-success'></i>";
                        } ?>
                    </td>
                    <td>
                        <?php if ($value['p5'] == 0) {
                            echo "<i class='fa fa-times text-danger'></i>";
                        } elseif ($value['p5'] == 1) {
                            echo "<i class='fa fa-info text-warning'></i>";
                        } elseif ($value['p5'] == 2) {
                            echo "<i class='fa fa-check text-success'></i>";
                        } ?>
                    </td>
                    <td>
                        <?php if ($value['p6'] == 0) {
                            echo "<i class='fa fa-times text-danger'></i>";
                        } elseif ($value['p6'] == 1) {
                            echo "<i class='fa fa-info text-warning'></i>";
                        } elseif ($value['p6'] == 2) {
                            echo "<i class='fa fa-check text-success'></i>";
                        } ?>
                    </td>
                    <td>
                        <?php if ($value['p7'] == 0) {
                            echo "<i class='fa fa-times text-danger'></i>";
                        } elseif ($value['p7'] == 1) {
                            echo "<i class='fa fa-info text-warning'></i>";
                        } elseif ($value['p7'] == 2) {
                            echo "<i class='fa fa-check text-success'></i>";
                        } ?>
                    </td>
                    <td>
                        <?php if ($value['p8'] == 0) {
                            echo "<i class='fa fa-times text-danger'></i>";
                        } elseif ($value['p8'] == 1) {
                            echo "<i class='fa fa-info text-warning'></i>";
                        } elseif ($value['p8'] == 2) {
                            echo "<i class='fa fa-check text-success'></i>";
                        } ?>
                    </td>
                    <td>
                        <?php if ($value['p9'] == 0) {
                            echo "<i class='fa fa-times text-danger'></i>";
                        } elseif ($value['p9'] == 1) {
                            echo "<i class='fa fa-info text-warning'></i>";
                        } elseif ($value['p9'] == 2) {
                            echo "<i class='fa fa-check text-success'></i>";
                        } ?>
                    </td>
                    <td>
                        <?php if ($value['p10'] == 0) {
                            echo "<i class='fa fa-times text-danger'></i>";
                        } elseif ($value['p10'] == 1) {
                            echo "<i class='fa fa-info text-warning'></i>";
                        } elseif ($value['p10'] == 2) {
                            echo "<i class='fa fa-check text-success'></i>";
                        } ?>
                    </td>
                    <td>
                        <?php if ($value['p11'] == 0) {
                            echo "<i class='fa fa-times text-danger'></i>";
                        } elseif ($value['p11'] == 1) {
                            echo "<i class='fa fa-info text-warning'></i>";
                        } elseif ($value['p11'] == 2) {
                            echo "<i class='fa fa-check text-success'></i>";
                        } ?>
                    </td>
                    <td>
                        <?php if ($value['p12'] == 0) {
                            echo "<i class='fa fa-times text-danger'></i>";
                        } elseif ($value['p12'] == 1) {
                            echo "<i class='fa fa-info text-warning'></i>";
                        } elseif ($value['p12'] == 2) {
                            echo "<i class='fa fa-check text-success'></i>";
                        } ?>
                    </td>
                    <td>
                        <?php if ($value['p13'] == 0) {
                            echo "<i class='fa fa-times text-danger'></i>";
                        } elseif ($value['p13'] == 1) {
                            echo "<i class='fa fa-info text-warning'></i>";
                        } elseif ($value['p13'] == 2) {
                            echo "<i class='fa fa-check text-success'></i>";
                        } ?>
                    </td>
                    <td>
                        <?php if ($value['p14'] == 0) {
                            echo "<i class='fa fa-times text-danger'></i>";
                        } elseif ($value['p14'] == 1) {
                            echo "<i class='fa fa-info text-warning'></i>";
                        } elseif ($value['p14'] == 2) {
                            echo "<i class='fa fa-check text-success'></i>";
                        } ?>
                    </td>
                    <td>
                        <?php if ($value['p15'] == 0) {
                            echo "<i class='fa fa-times text-danger'></i>";
                        } elseif ($value['p15'] == 1) {
                            echo "<i class='fa fa-info text-warning'></i>";
                        } elseif ($value['p15'] == 2) {
                            echo "<i class='fa fa-check text-success'></i>";
                        } ?>
                    </td>
                    <td>
                        <?php if ($value['p16'] == 0) {
                            echo "<i class='fa fa-times text-danger'></i>";
                        } elseif ($value['p16'] == 1) {
                            echo "<i class='fa fa-info text-warning'></i>";
                        } elseif ($value['p16'] == 2) {
                            echo "<i class='fa fa-check text-success'></i>";
                        } ?>
                    </td>
                    <td>
                        <?php if ($value['p17'] == 0) {
                            echo "<i class='fa fa-times text-danger'></i>";
                        } elseif ($value['p17'] == 1) {
                            echo "<i class='fa fa-info text-warning'></i>";
                        } elseif ($value['p17'] == 2) {
                            echo "<i class='fa fa-check text-success'></i>";
                        } ?>
                    </td>
                    <td>
                        <?php if ($value['p18'] == 0) {
                            echo "<i class='fa fa-times text-danger'></i>";
                        } elseif ($value['p18'] == 1) {
                            echo "<i class='fa fa-info text-warning'></i>";
                        } elseif ($value['p18'] == 2) {
                            echo "<i class='fa fa-check text-success'></i>";
                        } ?>
                    </td>
                    <td>
                        <?php if ($value['p19'] == 0) {
                            echo "<i class='fa fa-times text-danger'></i>";
                        } elseif ($value['p19'] == 1) {
                            echo "<i class='fa fa-info text-warning'></i>";
                        } elseif ($value['p19'] == 2) {
                            echo "<i class='fa fa-check text-success'></i>";
                        } ?>
                    </td>
                    <td>
                        <?php if ($value['p20'] == 0) {
                            echo "<i class='fa fa-times text-danger'></i>";
                        } elseif ($value['p20'] == 1) {
                            echo "<i class='fa fa-info text-warning'></i>";
                        } elseif ($value['p20'] == 2) {
                            echo "<i class='fa fa-check text-success'></i>";
                        } ?><br>
                    </td>
                    <td>
                        <?php
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
                        echo number_format($absensi, 0) . ' %';
                        ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>