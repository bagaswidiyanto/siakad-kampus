<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="<?= base_url(); ?>/template/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block"><?= session()->get('nama_user'); ?>/
                <?php if (session()->get('level') == 1) {
                    echo 'Admin';
                } else {
                    echo 'User';
                } ?></a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <?php if (session()->get('level') == 1) { ?>
                <li class="nav-item menu-close">
                    <a href="" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Home
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sub menu 1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sub menu 2</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('home/menu2'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Menu 2
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('home/menu3'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Menu 3
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('home/menu4'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Menu 4
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('product'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Product
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('mahasiswa'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Mahasiswa
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('upload/index'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-upload"></i>
                        <p>
                            Upload
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('uploads'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-upload"></i>
                        <p>
                            Multi Upload
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('home/grafik'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                            Grafik
                        </p>
                    </a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a href="<?= base_url('mahasiswa'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Mahasiswa
                        </p>
                    </a>
                </li>
            <?php } ?>
            <li class="nav-item">
                <a href="<?= base_url('login/logout'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-sign-out"></i>
                    <p>
                        Logout
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">