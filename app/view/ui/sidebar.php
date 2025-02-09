<?php 
if($_SESSION["level"] == ""){
    echo "<script>document.location.href = '../auth/index.php'</script>";
    die;
    exit;
}
?>


<?php 
if($_SESSION['level'] == "admin"){
?>
<!-- ======= Header ======= -->

<header id="header" class="header fixed-top d-flex align-items-center" style="position:fixed">
    <div class="d-flex align-items-center justify-content-between">
        <a href="" role="button" class="logo d-flex align-items-center fs-6 fst-normal fw-semibold">
            <?php echo $hasil['nama_sekolah'] ?>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto mx-3">
        <ul>
            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" role="button"
                    data-bs-toggle="dropdown" aria-controls="dropdown">
                    <i class="fa fa-user-alt"></i>
                    <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <hr class="dropdown-divider">
                        <div class="text-start">username : <?php echo $_SESSION['username'] ?></div>
                        <div class="mb-1"></div>
                        <div class="text-start">nama : <?php echo $_SESSION['nama'] ?></div>
                        <div class="mb-1"></div>
                        <div class="text-start">Jabatan : <?php echo $_SESSION['level'] ?></div>
                        <hr class="dropdown-divider">
                    </li>
                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header>
<!-- ======= Header ======= -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed" aria-current="page" href="?page=beranda">
                <i class="fa fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Blank Page Nav -->

        <li class="nav-item">
            <a href="#" data-bs-target="#transaksi-nav" data-bs-toggle="collapse" class="nav-link collapsed">
                <i class="bi bi-menu-button-wide"></i><span>Data Transaksi</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul class="nav-content collapse" id="transaksi-nav" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="?page=pembayaran" aria-current="page">
                        <i class="bi bi-circle"></i><span>Pembayaran SPP</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="#" data-bs-target="#master-nav" data-bs-toggle="collapse" class="nav-link collapsed">
                <i class="bi bi-menu-button-wide"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul class="nav-content collapse" id="master-nav" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="?page=kelas" aria-current="page">
                        <i class="bi bi-circle"></i><span>Data Master Kelas</span>
                    </a>
                </li>
                <li>
                    <a href="?page=siswa" aria-current="page">
                        <i class="bi bi-circle"></i><span>Data Master Siswa</span>
                    </a>
                </li>
                <li>
                    <a href="?page=petugas" aria-current="page">
                        <i class="bi bi-circle"></i><span>Data Master Petugas</span>
                    </a>
                </li>
                <li>
                    <a href="?page=spp" aria-current="page">
                        <i class="bi bi-circle"></i><span>Data Master SPP</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" aria-current="page" href="?page=pengaturan">
                <i class="fa fa-gears"></i>
                <span>Pengaturan</span>
            </a>
        </li><!-- End Blank Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" aria-current="page" href="?page=keluar"
                onclick="return confirm('Apakah anda ingin logout ?')">
                <i class="fa fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </li><!-- End Blank Page Nav -->
    </ul>
</aside><!-- End Sidebar-->
<!-- ======= Sidebar ======= -->

<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                </div>

            </div><!-- End Right side columns -->

        </div>
    </section>
    <?php
}else if($_SESSION['level'] == "petugas"){
?>
    <!-- ======= Header ======= -->

    <header id="header" class="header fixed-top d-flex align-items-center" style="position:fixed">
        <div class="d-flex align-items-center justify-content-between">
            <a href="" role="button" class="logo d-flex align-items-center fs-6 fst-normal fw-semibold">
                <?php echo $hasil['nama_sekolah'] ?>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto mx-3">
            <ul>
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" role="button"
                        data-bs-toggle="dropdown" aria-controls="dropdown">
                        <i class="fa fa-user-alt"></i>
                        <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <hr class="dropdown-divider">
                            <div class="text-start">username : <?php echo $_SESSION['username'] ?></div>
                            <div class="mb-1"></div>
                            <div class="text-start">nama : <?php echo $_SESSION['nama'] ?></div>
                            <div class="mb-1"></div>
                            <div class="text-start">Jabatan : <?php echo $_SESSION['level'] ?></div>
                            <hr class="dropdown-divider">
                        </li>
                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header>
    <!-- ======= Header ======= -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link collapsed" aria-current="page" href="?page=beranda">
                    <i class="fa fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Blank Page Nav -->

            <li class="nav-item">
                <a href="#" data-bs-target="#transaksi-nav" data-bs-toggle="collapse" class="nav-link collapsed">
                    <i class="bi bi-menu-button-wide"></i><span>Data Transaksi</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul class="nav-content collapse" id="transaksi-nav" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="?page=pembayaran" aria-current="page">
                            <i class="bi bi-circle"></i><span>Pembayaran SPP</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" data-bs-target="#master-nav" data-bs-toggle="collapse" class="nav-link collapsed">
                    <i class="bi bi-menu-button-wide"></i><span>Data Master</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul class="nav-content collapse" id="master-nav" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="?page=kelas" aria-current="page">
                            <i class="bi bi-circle"></i><span>Data Master Kelas</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=siswa" aria-current="page">
                            <i class="bi bi-circle"></i><span>Data Master Siswa</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=spp" aria-current="page">
                            <i class="bi bi-circle"></i><span>Data Master SPP</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" aria-current="page" href="?page=keluar"
                    onclick="return confirm('Apakah anda ingin logout ?')">
                    <i class="fa fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li><!-- End Blank Page Nav -->
        </ul>
    </aside><!-- End Sidebar-->
    <!-- ======= Sidebar ======= -->

    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">

                    </div>

                </div><!-- End Right side columns -->

            </div>
        </section>
        <?php
}else if($_SESSION['level'] == "siswa"){
?>
        <!-- ======= Header ======= -->

        <header id="header" class="header fixed-top d-flex align-items-center" style="position:fixed">
            <div class="d-flex align-items-center justify-content-between">
                <a href="" role="button" class="logo d-flex align-items-center fs-6 fst-normal fw-semibold">
                    <?php echo $hasil['nama_sekolah'] ?>
                </a>
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </div><!-- End Logo -->

            <nav class="header-nav ms-auto mx-3">
                <ul>
                    <li class="nav-item dropdown pe-3">

                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" role="button"
                            data-bs-toggle="dropdown" aria-controls="dropdown">
                            <i class="fa fa-user-alt"></i>
                            <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                        </a><!-- End Profile Iamge Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                <hr class="dropdown-divider">
                                <div class="text-start">username : <?php echo $_SESSION['username'] ?></div>
                                <div class="mb-1"></div>
                                <div class="text-start">nama : <?php echo $_SESSION['nama'] ?></div>
                                <div class="mb-1"></div>
                                <div class="text-start">Jabatan : <?php echo $_SESSION['level'] ?></div>
                                <hr class="dropdown-divider">
                            </li>
                        </ul><!-- End Profile Dropdown Items -->
                    </li><!-- End Profile Nav -->

                </ul>
            </nav><!-- End Icons Navigation -->

        </header>
        <!-- ======= Header ======= -->

        <!-- ======= Sidebar ======= -->
        <aside id="sidebar" class="sidebar">
            <ul class="sidebar-nav" id="sidebar-nav">
                <li class="nav-item">
                    <a class="nav-link collapsed" aria-current="page" href="?page=beranda">
                        <i class="fa fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li><!-- End Blank Page Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" aria-current="page" href="?page=histori">
                        <i class="fa fa-history"></i>
                        <span>Histori</span>
                    </a>
                </li><!-- End Blank Page Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" aria-current="page" href="?page=keluar"
                        onclick="return confirm('Apakah anda ingin logout ?')">
                        <i class="fa fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li><!-- End Blank Page Nav -->
            </ul>
        </aside><!-- End Sidebar-->
        <!-- ======= Sidebar ======= -->

        <main id="main" class="main">
            <section class="section dashboard">
                <div class="row">

                    <!-- Left side columns -->
                    <div class="col-lg-8">
                        <div class="row">

                        </div>

                    </div><!-- End Right side columns -->

                </div>
            </section>

            <?php
}else{
    echo "<script>
    document.location.href = '../auth/index.php';
    </script>";
    die;
    exit;
}
?>