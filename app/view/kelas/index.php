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
        <title>Data Master Kelas</title>
    </head>

    <body>
        <?php require_once("../ui/sidebar.php") ?>
        <div class="container-fluid">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4 class="panel-heading">Data Kelas</h4>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-2">
                    <h4 class="card-title">Data Master Kelas</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table w-100 table-sm table-bordered" id="example2">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kelas</th>
                                    <th>Opsional</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    $row = $kelas->Read();
                                    while($isi = $row->fetch_array()){
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $isi['nama_kelas'] ?></td>
                                    <td>
                                        <a href="?page=kelas&aksi=ubahkelas&id_kelas=<?=$isi['id_kelas']?>"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit fa-1x"></i>
                                        </a>
                                        <a href="?page=kelas&aksi=hapus-kelas&id_kelas=<?=$isi['id_kelas']?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah data kelas ini akan anda hapus ?')">
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
                                <a href="?page=kelas&aksi=tambahkelas" aria-current="page"
                                    class="btn btn-danger btn-sm">
                                    <i class="bi bi-plus"></i>
                                    <span>Tambah Kelas</span>
                                </a>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>