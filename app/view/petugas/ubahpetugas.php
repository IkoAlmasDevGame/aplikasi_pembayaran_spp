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
            <div class="card shadow mb-4">
                <div class="card-header py-2">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <h4 class="card-title">Edit Data Petugas</h4>
                        <a href="?page=petugas" class="btn btn-close fa-2x"></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <?php 
                            if(isset($_GET['id_petugas'])){
                                $id = htmlspecialchars($_GET['id_petugas']);
                                $row = $config->query("SELECT * FROM users WHERE id_petugas = '$id'");
                                while($isi = $row->fetch_array()){
                        ?>
                        <form action="?aksi=ubah-petugas" method="post">
                            <input type="hidden" name="id_petugas" value="<?=$isi['id_petugas']?>">
                            <table class="table table-sm w-100 table-striped-columns">
                                <tbody>
                                    <tr>
                                        <td>
                                            <label for="">User Name</label>
                                            <input type="text" value="<?=$isi['username']?>" name="username" required
                                                class="form-control" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Password</label>
                                            <input type="password" name="password" required class="form-control" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Nama Petugas</label>
                                            <input type="text" value="<?=$isi['nama_petugas']?>" name="nama_petugas"
                                                required class="form-control" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Jabatan</label>
                                            <br>
                                            <input type="radio" name="level" class="radio radio-inline ms-1" id=""
                                                value="admin" <?php if($isi['level'] == "admin"){?> checked <?php } ?>>
                                            Admin
                                            <input type="radio" name="level" class="radio radio-inline ms-3" id=""
                                                value="petugas" <?php if($isi['level'] == "petugas"){?> checked
                                                <?php } ?>> Petugas
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="card-footer">
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="?page=petugas" role="button" class="btn btn-default">Cancel</a>
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
        <?php require_once("../ui/footer.php") ?>