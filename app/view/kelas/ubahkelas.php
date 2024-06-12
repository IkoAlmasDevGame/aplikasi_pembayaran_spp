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
            <div class="card shadow mb-4">
                <div class="card-header py-2">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <h4 class="card-title">Edit Data Kelas</h4>
                        <a href="?page=kelas" class="btn btn-close fa-2x"></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="form-group">
                            <?php 
                            if(isset($_GET['id_kelas'])){
                                $id = htmlspecialchars($_GET['id_kelas']);
                                $row = $config->query("SELECT * FROM kelas WHERE id_kelas = '$id'");
                                while ($isi = $row->fetch_array()) {
                            ?>
                            <form action="?aksi=ubah-kelas" method="post">
                                <input type="hidden" name="id_kelas" value="<?=$isi['id_kelas']?>">
                                <div class="form-label">
                                    <label for="">Nama Kelas</label>
                                    <div class="form-inline">
                                        <div class="form-text">
                                            <small>Nama Kelas</small>
                                            <input type="text" name="nama_kelas" value="<?=$isi['nama_kelas']?>"
                                                class="form-control" maxlength="10" id="nisn" aria-required="true"
                                                placeholder="masukkan nama kelas disini ..." required>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="?page=kelas" role="button" class="btn btn-default">Cancel</a>
                                        <button type="reset" class="btn btn-danger">Hapus Semua</button>
                                    </div>
                                </div>
                            </form>
                            <?php 
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>