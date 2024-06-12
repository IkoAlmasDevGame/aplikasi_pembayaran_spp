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
            <div class="card shadow mb-4">
                <div class="card-header py-2">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <h4 class="card-title">Ubah Data Siswa</h4>
                        <a href="?page=siswa" class="btn btn-close fa-2x"></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <?php 
                            if(isset($_GET['nisn'])){
                                $nisn = htmlspecialchars($_GET['nisn']);
                                $row = $config->query("SELECT siswa.*, kelas.id_kelas, kelas.nama_kelas FROM siswa
                                left join kelas on siswa.id_kelas = kelas.id_kelas WHERE nisn = '$nisn'");
                                while ($isi = $row->fetch_array()) {
                        ?>
                        <form action="?aksi=ubah-siswa" method="post">
                            <input type="hidden" name="nisn" value="<?=$isi['nisn']?>">
                            <div class="form-label">
                                <label for="">NISN</label>
                                <div class="form-inline">
                                    <div class="form-text">
                                        <small>3 digit tahun lahir, 7 digit nomor acak</small>
                                        <input type="text" name="nisn" class="form-control" maxlength="10" id="nisn"
                                            aria-required="true" value="<?=$isi['nisn']?>" readonly aria-readonly="true"
                                            placeholder="masukkan nisn baru anda disini ..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label">
                                <label for="">NIS</label>
                                <div class="form-inline">
                                    <div class="form-text">
                                        <small>2 digit tahun lahir, 5 digit nomor sekolah, 3 digit nomor masuk
                                            siswa</small>
                                        <input type="text" name="nis" class="form-control" maxlength="10" id="nis"
                                            aria-required="true" value="<?=$isi['nis']?>" readonly aria-readonly="true"
                                            placeholder="masukkan nis baru anda disini ..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label">
                                <label for="">Nama Siswa</label>
                                <div class="form-inline">
                                    <div class="form-text">
                                        <input type="text" name="nama" class="form-control" maxlength="35" id="nis"
                                            aria-required="true"
                                            placeholder="masukkan nama lengkap siswa baru disini ..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label">
                                <label for="">Kelas</label>
                                <div class="form-inline">
                                    <div class="form-text">
                                        <select name="id_kelas" id="id_kelas" class="form-control form-select" required
                                            aria-required="true">
                                            <option value="">Pilih Kelas</option>
                                            <?php 
                                                $row = $kelas->Read();
                                                while ($ik = $row->fetch_array()) {
                                            ?>
                                            <option <?php if($isi['id_kelas'] == $ik['id_kelas']){?> selected
                                                value="<?=$ik['id_kelas']?>" <?php } ?>><?php echo $isi['nama_kelas'] ?>
                                            </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label">
                                <label for="">Alamat</label>
                                <div class="form-inline">
                                    <div class="form-text">
                                        <textarea name="alamat" required aria-required="true" class="form-control" id=""
                                            placeholder="masukkan alamat rumah ..."
                                            maxlength="255"><?php echo $isi['alamat'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label">
                                <label for="">Nomor Telepon</label>
                                <div class="form-inline">
                                    <div class="form-text">
                                        <input type="text" name="no_telp" id="" maxlength="13" class="form-control"
                                            required aria-required="true" value="<?=$isi['no_telp']?>"
                                            placeholder="masukkan nomor telepon ...">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-end">
                                    <button type="submit" class="btn btn-secondary">Update</button>
                                    <a href="?page=siswa" role="button" class="btn btn-default">Cancel</a>
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