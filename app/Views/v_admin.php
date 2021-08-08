<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?= $jml_gedung; ?></h3>

                <p>Gedung</p>
            </div>
            <div class="icon">
                <i class="fa fa-building-o"></i>
            </div>
            <a href="<?= base_url('gedung'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?= $jml_ruangan; ?></h3>

                <p>Ruangan</p>
            </div>
            <div class="icon">
                <i class="fa fa-columns"></i>
            </div>
            <a href="<?= base_url('admin/ruangan'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-blue">
            <div class="inner">
                <h3><?= $jml_fakultas; ?></h3>

                <p>Fakultas</p>
            </div>
            <div class="icon">
                <i class="fa fa-columns"></i>
            </div>
            <a href="<?= base_url('fakultas'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?= $jml_prodi; ?></h3>

                <p>Program Studi</p>
            </div>
            <div class="icon">
                <i class="fa fa-rss-square"></i>
            </div>
            <a href="<?= base_url('admin/prodi'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-orange">
            <div class="inner">
                <h3><?= $jml_dosen; ?></h3>

                <p>Dosen</p>
            </div>
            <div class="icon">
                <i class="fa fa-male"></i>
            </div>
            <a href="<?= base_url('admin/dosen'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-purple">
            <div class="inner">
                <h3><?= $jml_mhs; ?></h3>

                <p>Mahasiswa</p>
            </div>
            <div class="icon">
                <i class="fa fa-graduation-cap"></i>
            </div>
            <a href="<?= base_url('admin/mhs'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-fuchsia">
            <div class="inner">
                <h3><?= $jml_matkul; ?></h3>

                <p>Mata Kuliah</p>
            </div>
            <div class="icon">
                <i class="fa fa-book"></i>
            </div>
            <a href="<?= base_url('admin/matkul'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?= $jml_user; ?></h3>

                <p>User</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="<?= base_url('user'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

</div>
<!-- /.row -->