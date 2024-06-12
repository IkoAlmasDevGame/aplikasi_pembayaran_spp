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
        <title>Data Master Siswa</title>
    </head>

    <body>
        <?php require_once("../ui/sidebar.php") ?>
        <div class="container-fluid">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4 class="panel-heading">Data Siswa</h4>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-2">
                    <h4 class="card-title">Data Master Siswa</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table w-100 table-sm table-bordered" id="example2">
                            <thead>
                                <tr>
                                    <th>NISN</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Alamat</th>
                                    <th>No Telepon</th>
                                    <th>SPP</th>
                                    <th>Opsional</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $row = $siswa->Read();
                                    while ($isi = $row->fetch_array()) {
                                ?>
                                <tr>
                                    <td><?php echo $isi['nisn']; ?></td>
                                    <td><?php echo $isi['nis']; ?></td>
                                    <td><?php echo $isi['nama']; ?></td>
                                    <td><?php echo $isi['nama_kelas']; ?></td>
                                    <td><?php echo $isi['alamat']; ?></td>
                                    <td><?php echo $isi['no_telp']; ?></td>
                                    <td><?php echo $isi['nominal']; ?></td>
                                    <td>
                                        <a href="?page=siswa&aksi=ubahsiswa&nisn=<?=$isi['nisn']?>"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit fa-1x"></i>
                                        </a>
                                        <a href="?page=siswa&aksi=hapus-siswa&nisn=<?=$isi['nisn']?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah data siswa ini ingin dihapus ?')">
                                            <i class="fa fa-trash fa-1x"></i>
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
                                <a href="?page=siswa&aksi=tambahsiswa" aria-current="page"
                                    class="btn btn-sm btn-danger">
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