<?php 
namespace model;

class Student {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function Table(){
        $sql = "SELECT siswa.*, kelas.id_kelas, kelas.nama_kelas, spp.id_spp, spp.nominal FROM siswa
        left join kelas on siswa.id_kelas = kelas.id_kelas left join spp on siswa.id_spp = spp.id_spp 
        order by nisn asc";
        $row = $this->db->query($sql);
        return $row;
    }

    public function create($nisn, $nis, $nama, $kelas, $alamat, $telepon){
        $nisn = htmlentities($_POST['nisn']) ? htmlspecialchars($_POST['nisn']) : $_POST['nisn'];
        $nis = htmlentities($_POST['nis']) ? htmlspecialchars($_POST['nis']) : $_POST['nis'];
        $nama = htmlentities($_POST['nama']) ? htmlspecialchars($_POST['nama']) : $_POST['nama'];
        $kelas = htmlentities($_POST['id_kelas']) ? htmlspecialchars($_POST['id_kelas']) : $_POST['id_kelas'];
        $alamat = htmlentities($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : $_POST['alamat'];
        $telepon = htmlentities($_POST['no_telp']) ? htmlspecialchars($_POST['no_telp']) : $_POST['no_telp'];

        $table = "siswa";
        $sql = "INSERT $table SET nisn='$nisn', nis='$nis', nama='$nama', id_kelas='$kelas', alamat='$alamat', no_telp='$telepon'";
        $row = $this->db->query($sql);
        $pass = md5($nisn, false);
        $this->db->query("INSERT users SET username='$nis', password='$pass', nama_petugas='$nama', level='siswa'");

        if($row){
            echo "<script>
            window.setTimeout(() => {
            document.location.href = '../ui/header.php?page=siswa'
            }, 3000);
            </script>";
            die;
            return true;
        }else{
            echo "<script>
            window.setTimeout(() => {
            document.location.href = '../ui/header.php?page=tambahsiswa'
            }, 3000);
            </script>";
            die;
            return false;
        }
    }

    public function update($nisn, $kelas, $alamat, $telepon){
        $nisn = htmlentities($_POST['nisn']) ? htmlspecialchars($_POST['nisn']) : $_POST['nisn'];
        $kelas = htmlentities($_POST['id_kelas']) ? htmlspecialchars($_POST['id_kelas']) : $_POST['id_kelas'];
        $alamat = htmlentities($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : $_POST['alamat'];
        $telepon = htmlentities($_POST['no_telp']) ? htmlspecialchars($_POST['no_telp']) : $_POST['no_telp'];

        $table = "siswa";
        $sql = "UPDATE $table SET id_kelas='$kelas', alamat='$alamat', no_telp='$telepon' WHERE nisn='$nisn'";
        $row = $this->db->query($sql);

        if($row){
            echo "<script>
            window.setTimeout(() => {
            document.location.href = '../ui/header.php?page=siswa'
            }, 3000);
            </script>";
            die;
            return true;
        }else{
            echo "<script>
            window.setTimeout(() => {
            document.location.href = '../ui/header.php?page=siswa&aksi=ubahsiswa&nisn=$nisn'
            }, 3000);
            </script>";
            die;
            return false;
        }
    }

    public function delete($nisn){
        $nisn = htmlentities($_GET['nisn']) ? htmlspecialchars($_GET['nisn']) : $_GET['nisn'];
        $table = "siswa";
        $sql = "DELETE FROM $table WHERE nisn='$nisn'";
        $row = $this->db->query($sql);

        if($row){
            echo "<script>
            window.setTimeout(() => {
            document.location.href = '../ui/header.php?page=siswa'
            }, 3000);
            </script>";
            die;
            return true;
        }else{
            echo "<script>
            window.setTimeout(() => {
            document.location.href = '../ui/header.php?page=siswa'
            }, 3000);
            </script>";
            die;
            return false;
        }
    }
}

?>