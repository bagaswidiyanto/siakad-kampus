<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIAKAD | Print Absensi</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/dist/css/AdminLTE.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style type="text/css" media="print">
        body {
            page-break-before: avoid;
            width: 100%;
            height: 100%;
            zoom: 100%;
        }
    </style>
</head>

<body onload="window.print();">
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-file-o"></i> <b>Nilai Mahasiswa TA : <?= $ta['ta']; ?>/<?= $ta['semester']; ?></b>
                        <small class="pull-right">Date: <?= date('d M Y'); ?></small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row">
                <div class="col-xs-6">
                </div>
            </div>

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-6 table-responsive">
                    <table class="table table-striped table-responsive">
                        <tr>
                            <td width="150px">Program Studi</td>
                            <td width="20px">:</td>
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

                    </table>
                </div>
                <div class="col-xs-6 table-responsive">
                    <table class="table table-striped table-responsive">
                        <tr>
                            <td width="150px">Mata Kuliah</td>
                            <td width="20px">:</td>
                            <td><?= $jadwal['matkul']; ?></td>
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
            </div>
            <!-- /.col -->
            <div class="row">
                <div class="col-sm-12">
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
                        </tr>
                        <?php
                        $no = 1;
                        foreach ($mhs as $key => $value) {
                            echo form_hidden($value['id_krs'] . 'id_krs', $value['id_krs']);
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td class="text-center"><?= $value['nim']; ?></td>
                                <td width="200px"><?= $value['nama_mhs']; ?></td>
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
                                <td class="text-center" width="80px"><?= $value['nilai_tugas']; ?></td>
                                <td class="text-center" width="80px"><?= $value['nilai_uts']; ?></td>
                                <td class="text-center" width="80px"><?= $value['nilai_uas']; ?></td>
                                <td class="text-center" width="200px"><?= $value['nilai_akhir']; ?></td>
                                <td class="text-center"><?= $value['nilai_huruf']; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-4">
                </div>
                <!-- /.col -->
                <div class="col-xs-4">

                </div>
                <div class="col-xs-4">
                    Padang <?= date('d M Y'); ?> <br>
                    Dosen
                    <br>
                    <br>
                    <br>
                    dto.
                    <br>
                    <br>
                    <br>
                    <?= $jadwal['nama_dosen']; ?>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </div>
    </section>
    <!-- /.content -->
    </div>
    <!-- ./wrapper -->
</body>

</html>