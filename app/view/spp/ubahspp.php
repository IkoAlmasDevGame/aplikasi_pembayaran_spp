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
            var uang = document.getElementById('nominalrupiah').value;
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
                        <h4 class="card-title">Edit Data SPP</h4>
                        <a href="?page=spp" class="btn btn-close fa-2x"></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <?php 
                            if(isset($_GET['id_spp'])){
                                $id = htmlspecialchars($_GET['id_spp']);
                                $row = $config->query("SELECT * FROM spp WHERE id_spp = '$id'");
                                while ($isi = $row->fetch_array()) {
                        ?>
                        <form action="?aksi=ubah-spp" method="post">
                            <input type="hidden" name="id_spp" value="<?=$isi['id_spp']?>">
                            <div class="form-label">
                                <label for="">Nominal</label>
                                <div class="form-inline">
                                    <div class="form-text">
                                        <small>Nominal Pembayaran sekolah</small>
                                        <input type="text" name="nominal" class="form-control" maxlength="11"
                                            onkeyup="rupiah(this)" id="nominalrupiah" value="<?=$isi['nominal']?>"
                                            aria-required="true" placeholder="masukkan nominal ..." required>
                                        <small id="textrupiah" onclick="rupiah(this)">Rp 0,00</small>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-end">
                                    <button type="submit" class="btn btn-secondary">Update</button>
                                    <a href="?page=spp" role="button" class="btn btn-default">Cancel</a>
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