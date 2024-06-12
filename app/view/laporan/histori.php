<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php 
            if($_SESSION['level'] == "siswa"){
                require_once("../ui/header.php");
            }else{
                header("location:../ui/header.php?page=beranda");
            }
        ?>
        <title>Data Laporan Pembayaran Siswa</title>
    </head>

    <body>
        <?php require_once("../ui/sidebar.php") ?>
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4 class="panel-heading">Data Laporan Pembayaran Siswa</h4>
                </div>
            </div>
            <?php 
                if(isset($_SESSION['username'])){
                    $username = htmlspecialchars($_SESSION['username']);
                    $row = $config->query("SELECT pembayaran.*, siswa.nisn, siswa.nis, kelas.id_kelas, kelas.nama_kelas, siswa.nama, spp.id_spp, spp.nominal, users.id_petugas, users.nama_petugas FROM pembayaran left join siswa on pembayaran.nisn = siswa.nisn left join spp on pembayaran.id_spp = spp.id_spp 
                    left join users on pembayaran.id_petugas = users.id_petugas left join kelas on siswa.id_kelas = kelas.id_kelas where siswa.nis = '$username'");
                while($isi = $row->fetch_array()){
                    $jumlah = 0;
                    $jumlah += $isi['jumlah_bayar'];
            ?>
            <div class="container">
                <div class="d-flex justify-content-end align-items-center flex-wrap">
                    <h4>Total Bayar SPP : <?php echo "Rp.".number_format($jumlah).",-"; ?></h4>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-2">
                    <h4 class="card-title text-center">Data Laporan Pembayaran Siswa</h4>
                    <h4 class="panel-heading text-center">
                        <?php echo $isi['nama'] ?> - <?php echo $isi['nama_kelas'] ?>
                    </h4>
                    <h5 class="text-center">Tanggal Pembayaran :
                        <?php echo $isi['tgl_bayar']."/".$isi['bulan_dibayar']."/".$isi['tahun_dibayar'] ?>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="form-inline">
                            <div class="d-flex align-items-center justify-content-around flex-wrap mt-2">
                                <div class="col-sm-12 col-md-9 me-auto">
                                    <h6>Nama Petugas</h6>
                                </div>
                                <h6><?php echo $isi['nama_petugas'] ?></h6>
                            </div>
                        </div>
                        <div class="border border-top"></div>
                        <div class="form-inline">
                            <div class="d-flex align-items-center justify-content-around flex-wrap mt-2">
                                <div class="col-sm-12 col-md-7 me-auto">
                                    <h6>Nama Siswa</h6>
                                </div>
                                <h6><?php echo $isi['nama'] ?></h6>
                            </div>
                        </div>
                        <div class="border border-top"></div>
                        <div class="form-inline">
                            <div class="d-flex align-items-center justify-content-around flex-wrap mt-2">
                                <div class="col-sm-12 col-md-9 me-auto">
                                    <h6>Kelas Siswa</h6>
                                </div>
                                <h6><?php echo $isi['nama_kelas'] ?></h6>
                            </div>
                        </div>
                        <div class="border border-top"></div>
                        <div class="form-inline">
                            <div class="d-flex align-items-center justify-content-around flex-wrap mt-2">
                                <div class="col-sm-12 col-md-8 me-auto">
                                    <h6>Nominal Pembayaran</h6>
                                </div>
                                <h6>Rp. <?php echo number_format($isi['nominal']) ?> ,-</h6>
                            </div>
                        </div>
                        <div class="border border-top"></div>
                        <div class="form-inline">
                            <div class="d-flex align-items-center justify-content-around flex-wrap mt-2">
                                <div class="col-sm-12 col-md-8 me-auto">
                                    <h6>Jumlah Bayar</h6>
                                </div>
                                <h6>Rp. <?php echo number_format($isi['jumlah_bayar']) ?> ,-</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-end">
                            <a href="?page=laporan" aria-current="page" class="btn btn-primary hover btn-sm">
                                <i class="fa fa-print"></i>
                                <span>Print Bukti Pembayaran</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                } 
            }
            ?>
        </div>
        <?php require_once("../ui/footer.php") ?>