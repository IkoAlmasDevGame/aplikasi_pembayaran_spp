<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php 
            if($_SESSION['level'] == "admin" || $_SESSION['level'] == "petugas"){
                require_once("../ui/header.php");
            }else{
                header("location:../ui/header.php?page=beranda");
            }
        ?>
        <title>Data Master SPP</title>
    </head>

    <body>
        <?php require_once("../ui/sidebar.php") ?>
        <div class="container-fluid">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4 class="panel-heading">Data Sumbangan Pembinaan Pendidikan</h4>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-2">
                    <h4 class="card-title">Data Master Sumbangan Pembinaan Pendidikan</h4>
                </div>
                <div class="table-responsive">
                    <div class="card-body">
                        <table class="table table-sm w-100 table-bordered" id="example2">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nominal Pembayaran</th>
                                    <th>Opsional</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    $row = $spp->Read();
                                    while ($isi = $row->fetch_array()) {
                                ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td id="nominal">Rp. <?php echo number_format($isi['nominal']) ?> ,-</td>
                                    <td>
                                        <a href="?page=spp&aksi=ubahspp&id_spp=<?=$isi['id_spp']?>"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit fa-1x"></i>
                                        </a>
                                        <a href="?page=spp&aksi=hapus-spp&id_spp=<?=$isi['id_spp']?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah data spp ini akan anda hapus ?')">
                                            <i class="fa fa-trash fa-1x"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                $no++;
                                    }
                                ?>
                            </tbody>
                        </table>
                        <table>
                            <tbody>
                                <a href="?page=spp&aksi=tambahspp" aria-current="page" class="btn btn-sm btn-danger">
                                    <i class="bi bi-plus"></i>
                                    <span>Tambah Data Pembayaran</span>
                                </a>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>