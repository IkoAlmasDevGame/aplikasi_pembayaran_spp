<?php 
require_once("../../database/koneksi.php");
$tamp = htmlspecialchars($_POST["tamp"]);
$pecah_bar = explode(".", $tamp);
$kode_bar = $pecah_bar[0];

$sql = "SELECT siswa.*, kelas.id_kelas, kelas.nama_kelas FROM siswa left join kelas on siswa.id_kelas = kelas.id_kelas where nisn = '$kode_bar'";
$result = $config->query($sql);
    while($row = mysqli_fetch_assoc($result)) {
?>
<label for="">Nisn Siswa</label>
<div class="form-group">
    <div class="form-line">
        <input readonly="readonly" id="nisn" name="nisn" type="text" class="form-control"
            value="<?php echo $row["nisn"];?>">
        </input>
    </div>
</div>
<label for="">Nama Siswa</label>
<div class="form-group">
    <div class="form-line">
        <input readonly="readonly" id="nama" name="nama" type="text" class="form-control"
            value="<?php echo $row["nama"];?>">
        </input>
    </div>
</div>
<label for="">Kelas</label>
<div class="form-group">
    <div class="form-line">
        <input readonly="readonly" id="id_kelas" name="id_kelas" type="text" class="form-control"
            value="<?php echo $row["nama_kelas"];?>">
        </input>
    </div>
</div>
<?php
}
?>