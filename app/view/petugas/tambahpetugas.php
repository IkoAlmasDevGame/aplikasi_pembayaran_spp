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
                        <h4 class="card-title">Tambah Data Petugas</h4>
                        <a href="?page=petugas" class="btn btn-close fa-2x"></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <form action="?aksi=tambah-petugas" method="post">
                            <table class="table table-sm w-100 table-striped-columns">
                                <tbody>
                                    <tr>
                                        <td>
                                            <label for="">User Name</label>
                                            <input type="text" name="username" required class="form-control" id="">
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
                                            <input type="text" name="nama_petugas" required class="form-control" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Jabatan</label>
                                            <br>
                                            <input type="radio" name="level" class="radio radio-inline ms-1" id=""
                                                value="admin"> Admin
                                            <input type="radio" name="level" class="radio radio-inline ms-3" id=""
                                                value="petugas"> Petugas
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
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>