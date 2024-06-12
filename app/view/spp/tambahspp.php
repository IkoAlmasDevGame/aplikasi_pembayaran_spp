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
        <script>
        function rupiah() {
            var uang = document.getElementById('nominal').value;
            uang = Intl.NumberFormat('id-ID', {
                style: "currency",
                currency: "IDR"
            }).format(uang);
            document.getElementById("textrupiah").innerText = uang;
        }
        </script>
        <title>Data Master SPP</title>
    </head>

    <body>
        <?php require_once("../ui/sidebar.php") ?>
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-2">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <h4 class="card-title">Tambah Data SPP</h4>
                        <a href="?page=spp" class="btn btn-close fa-2x"></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <form action="?aksi=tambah-spp" method="post">
                            <div class="form-label">
                                <label for="">Nominal</label>
                                <div class="form-inline">
                                    <div class="form-text">
                                        <small>Nominal Pembayaran sekolah</small>
                                        <input type="text" name="nominal" class="form-control" maxlength="11"
                                            onkeyup="rupiah()" id="nominal" aria-required="true"
                                            placeholder="masukkan nominal ..." required>
                                        <small id="textrupiah">Rp 0,00</small>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="?page=spp" role="button" class="btn btn-default">Cancel</a>
                                    <button type="reset" class="btn btn-danger">Hapus Semua</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>