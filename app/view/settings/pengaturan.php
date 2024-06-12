<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php 
            if($_SESSION['level'] == "admin"){
                require_once("../ui/header.php");
                require_once("../../database/koneksi.php");
            }else{
                header("location:../ui/header.php?page=beranda");
            }
        ?>
        <title>Pengaturan Website</title>
    </head>

    <body>
        <?php require_once("../ui/sidebar.php") ?>
        <div class="d-flex justify-content-center align-items-center flex-wrap">
            <div class="col-sm-12 col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Pengaturan Website</h4>
                    </div>
                    <div class='card-body'>
                        <div class="table-responsvie">
                            <table class="table w-100 table-sm table-bordered mt-2">
                                <tr>
                                    <th class="text-center">Nama Sekolah</th>
                                    <th class="text-center">Nama Kepala Sekolah</th>
                                    <th class="text-center">Alamat Sekolah</th>
                                    <th class="text-center">Icon Sekolah</th>
                                    <th class="text-center">Opsional</th>
                                </tr>
                                <?php 
                                    $row = $config->query("SELECT * FROM sistem WHERE flags = '1'");
                                    while ($isi = $row->fetch_array()) {
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $isi['nama_sekolah'] ?></td>
                                    <td class="text-center"><?php echo $isi['nama_kepsek'] ?></td>
                                    <td class="text-center"><?php echo $isi['alamat'] ?></td>
                                    <td class="text-center">
                                        <img src="../../../assets/<?php echo $isi['gambar'] ?>"
                                            alt="<?php echo $isi['gambar'] ?>" style="max-width: 128px; width: 32px;">
                                    </td>
                                    <td>
                                        <a href="?page=pengaturan&aksi=ubahpengaturan&id_sistem=<?=$isi['id_sistem']?>"
                                            class="btn btn-sm btn-info" aria-current="page">
                                            <i class="fa fa-edit fa-1x"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <?php 
            if(isset($_GET['aksi'])){
                if($_GET['aksi'] == "ubahpengaturan"){
            ?>
            <div class="col-sm-12 col-md-10">
                <div class="card shadow mb-4">
                    <div class="card-header py-2">
                        <h4 class="card-title">Ubah Pengaturan Sistem</h4>
                    </div>
                    <?php 
                    if(isset($_GET['id_sistem'])){
                        $id = htmlspecialchars($_GET['id_sistem']);
                        $row = $config->query("SELECT * FROM sistem WHERE id_sistem = '$id' and flags = '1'");
                        while ($isi = $row->fetch_array()) {
                    ?>
                    <div class="card-body">
                        <div class="form-group">
                            <form action="?aksi=ubah-sistem" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_sistem" value="<?=$isi['id_sistem']?>">
                                <input type="hidden" name="flags" value="<?=$isi['flags']?>">
                                <table>
                                    <tbody>
                                        <tr class="mt-2">
                                            <td class="col-sm-12 col-md-3">
                                                <label for="">Nama Sekolah</label>
                                                <input type="text" name="nama_sekolah" class="form-control"
                                                    value="<?=$isi['nama_sekolah']?>" required id="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-12 col-md-3">
                                                <label for="">Nama Kepala Sekolah</label>
                                                <input type="text" name="nama_kepsek" class="form-control"
                                                    value="<?=$isi['nama_kepsek']?>" required id="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-12 col-md-3">
                                                <label for="">Alamat Sekolah</label>
                                                <textarea name="alamat" class="form-control" required
                                                    aria-required="true" id=""><?php echo $isi['alamat'] ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-12 col-md-3">
                                                <label for="">Gambar / Icon Sekolah</label>
                                                <div class="form-inline">
                                                    <div class="form-icon mb-1">
                                                        <img src="../../../assets/<?=$isi['gambar']?>" alt="">
                                                    </div>
                                                    <input type="file" name="gambar" accept="" class="form-control-file"
                                                        required>
                                                    <div class="form-inline">
                                                        <small>format:ico|jpg|jpeg|gif|png|jfif</small>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="card-footer">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-secondary">
                                            Update
                                        </button>
                                        <a href="?page=pengaturan" role="button" class="btn btn-default">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php 
                    }
                }
                ?>
                </div>
            </div>
            <?php
            }
        }
        ?>
        </div>
        <?php require_once("../ui/footer.php") ?>