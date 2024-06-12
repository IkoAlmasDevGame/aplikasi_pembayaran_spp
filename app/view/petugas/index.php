<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php 
            if($_SESSION['level'] == "admin"){
                require_once("../ui/header.php");
            }else{
                header("location:../ui/header.php?page=beranda");
            }
        ?>
        <title>Data Master Petugas</title>
    </head>

    <body>
        <?php require_once("../ui/sidebar.php") ?>
        <div class="container-fluid">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4 class="panel-heading">Data Petugas</h4>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-2">
                    <h4 class="card-title">Data Master Petugas</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm w-100 table-bordered" id="example2">
                            <thead>
                                <tr>
                                    <th>user-name</th>
                                    <th>password</th>
                                    <th>nama petugas</th>
                                    <th>jabatan</th>
                                    <th>opsional</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $row = $user->Read();
                                    while($isi = mysqli_fetch_array($row)){
                                ?>
                                <tr>
                                    <td><?php echo $isi['username']; ?></td>
                                    <td><?php echo "Ter-Enkripsi"; ?></td>
                                    <td><?php echo $isi['nama_petugas']; ?></td>
                                    <td><?php echo $isi['level']; ?></td>
                                    <td>
                                        <a href="?page=petugas&aksi=ubahpetugas&id_petugas=<?=$isi['id_petugas']?>"
                                            aria-current="page" class="btn btn-sm btn-default">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                        <table>
                            <tbody>
                                <a href="?page=petugas&aksi=tambahpetugas" class="btn btn-sm btn-danger">
                                    <i class="bi bi-plus"></i>
                                    Tambah Data
                                </a>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>