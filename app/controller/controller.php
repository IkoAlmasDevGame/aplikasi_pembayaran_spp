<?php 
namespace controller;
use model\Petugas;
use model\Student;
use model\room;
use model\pembinaan;
use model\buyer;

class Authentication {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new Petugas($konfig);
    }

    public function SignIn(){
        $username = htmlentities($_POST['userInput']) ? htmlspecialchars($_POST['userInput']) : $_POST['userInput'];
        $password = md5($_POST['passInput'], false);

        $result = $this->konfig->Login($username,$password);
        if($result === true){
            return true;
        }else{
            return false;
        }
    }

    public function SignInSiswa(){
        $username = htmlentities($_POST['userInput']) ? htmlspecialchars($_POST['userInput']) : $_POST['userInput'];
        $password = md5($_POST['passInput'], false);

        $result = $this->konfig->LoginSiswa($username,$password);
        if($result === true){
            return true;
        }else{
            return false;
        }
    }

    public function Read(){
        $row = $this->konfig->Table();
        return $row;
    }

    public function buat(){
        $username = htmlentities($_POST['username']) ? htmlspecialchars($_POST['username']) : $_POST['username'];
        $password = md5($_POST['password'], false);
        $nama = htmlentities($_POST['nama_petugas']) ? htmlspecialchars($_POST['nama_petugas']) : $_POST['nama_petugas'];
        $role = htmlentities($_POST['level']) ? htmlspecialchars($_POST['level']) : $_POST['level'];

        $row = $this->konfig->create($username, $password, $nama, $role);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }

    public function ubah(){
        $username = htmlentities($_POST['username']) ? htmlspecialchars($_POST['username']) : $_POST['username'];
        $password = md5($_POST['password'], false);
        $nama = htmlentities($_POST['nama_petugas']) ? htmlspecialchars($_POST['nama_petugas']) : $_POST['nama_petugas'];
        $role = htmlentities($_POST['level']) ? htmlspecialchars($_POST['level']) : $_POST['level'];        
        $id = htmlentities($_POST['id_petugas']) ? htmlspecialchars($_POST['id_petugas']) : $_POST['id_petugas'];

        $row = $this->konfig->update($username, $password, $nama, $role, $id);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }
}

class Siswa {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new Student($konfig);
    }

    public function Read(){
        $row = $this->konfig->Table();
        return $row;
    }

    public function buat(){
        $nisn = htmlentities($_POST['nisn']) ? htmlspecialchars($_POST['nisn']) : $_POST['nisn'];
        $nis = htmlentities($_POST['nis']) ? htmlspecialchars($_POST['nis']) : $_POST['nis'];
        $nama = htmlentities($_POST['nama']) ? htmlspecialchars($_POST['nama']) : $_POST['nama'];
        $kelas = htmlentities($_POST['id_kelas']) ? htmlspecialchars($_POST['id_kelas']) : $_POST['id_kelas'];
        $alamat = htmlentities($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : $_POST['alamat'];
        $telepon = htmlentities($_POST['no_telp']) ? htmlspecialchars($_POST['no_telp']) : $_POST['no_telp'];

        $row = $this->konfig->create($nisn, $nis, $nama, $kelas, $alamat, $telepon);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }

    public function ubah(){
        $nisn = htmlentities($_POST['nisn']) ? htmlspecialchars($_POST['nisn']) : $_POST['nisn'];
        $kelas = htmlentities($_POST['id_kelas']) ? htmlspecialchars($_POST['id_kelas']) : $_POST['id_kelas'];
        $alamat = htmlentities($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : $_POST['alamat'];
        $telepon = htmlentities($_POST['no_telp']) ? htmlspecialchars($_POST['no_telp']) : $_POST['no_telp'];

        $row = $this->konfig->update($nisn, $kelas, $alamat, $telepon);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }

    public function hapus(){
        $nisn = htmlentities($_GET['nisn']) ? htmlspecialchars($_GET['nisn']) : $_GET['nisn'];

        $row = $this->konfig->delete($nisn);
        if($row === true){
            return true;
            uniqid("../ui/header.php?page=siswa&aksi=hapus-siswa&nisn=".$nisn);
        }else{
            return false;
        }
    }
}

class Kelas {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new room($konfig);
    }

    public function Read(){
        $row = $this->konfig->Table();
        return $row;
    }

    public function buat(){
        $nama = htmlentities($_POST['nama_kelas']) ? htmlspecialchars($_POST['nama_kelas']) : $_POST['nama_kelas'];

        $row = $this->konfig->create($nama);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }

    public function ubah(){
        $nama = htmlentities($_POST['nama']) ? htmlspecialchars($_POST['nama']) : $_POST['nama'];
        $id = htmlentities($_POST['id_kelas']) ? htmlspecialchars($_POST['id_kelas']) : $_POST['id_kelas'];

        $row = $this->konfig->update($nama,$id);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }

    public function hapus(){
        $id = htmlentities($_GET['id_kelas']) ? htmlspecialchars($_GET['id_kelas']) : $_GET['id_kelas'];

        $row = $this->konfig->delete($id);
        if($row === true){
            return true;
            uniqid("../ui/header.php?page=kelas&aksi=hapus-kelas&id_kelas=".$id);
        }else{
            return false;
        }
    }
}

class spp {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new pembinaan($konfig);
    }

    public function Read(){
        $row = $this->konfig->Table();
        return $row;
    }

    public function buat(){
        $nominal = htmlentities($_POST['nominal']) ? htmlspecialchars($_POST['nominal']) : $_POST['nominal'];

        $row = $this->konfig->create($nominal);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }

    public function ubah(){
        $nominal = htmlentities($_POST['nominal']) ? htmlspecialchars($_POST['nominal']) : $_POST['nominal'];
        $id = htmlentities($_POST['id_spp']) ? htmlspecialchars($_POST['id_spp']) : $_POST['id_spp'];

        $row = $this->konfig->update($nominal,$id);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }

    public function hapus(){
        $id = htmlentities($_GET['id_spp']) ? htmlspecialchars($_GET['id_spp']) : $_GET['id_spp'];

        $row = $this->konfig->delete($id);
        if($row === true){
            return true;
            uniqid("../ui/header.php?page=spp&aksi=hapus-spp&id_spp=".$id);
        }else{
            return false;
        }
    }
}

class Pembayaran {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new buyer($konfig);
    }

    public function buy(){
        $id_petugas = htmlentities($_POST['id_petugas']) ? htmlspecialchars($_POST['id_petugas']) : $_POST['id_petugas'];
        $nisn = htmlentities($_POST['nisn']) ? htmlspecialchars($_POST['nisn']) : $_POST['nisn'];
        $tgl = htmlentities($_POST['tgl_bayar']) ? htmlspecialchars($_POST['tgl_bayar']) : $_POST['tgl_bayar'];
        $bln = htmlentities($_POST['bulan_dibayar']) ? htmlspecialchars($_POST['bulan_dibayar']) : $_POST['bulan_dibayar'];
        $thn = htmlentities($_POST['tahun_dibayar']) ? htmlspecialchars($_POST['tahun_dibayar']) : $_POST['tahun_dibayar'];
        $id_spp = htmlentities($_POST['id_spp']) ? htmlspecialchars($_POST['id_spp']) : $_POST['id_spp'];
        $total = htmlentities($_POST['jumlah_bayar']) ? htmlspecialchars($_POST['jumlah_bayar']) : $_POST['jumlah_bayar'];

        $row = $this->konfig->BuySchool($id_petugas, $nisn, $tgl, $bln, $thn, $id_spp, $total);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }
}

?>