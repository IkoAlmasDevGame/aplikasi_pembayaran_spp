<?php 
namespace model;

class buyer {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function BuySchool($id_petugas, $nisn, $tgl, $bln, $thn, $id_spp, $total){
        $id_petugas = htmlentities($_POST['id_petugas']) ? htmlspecialchars($_POST['id_petugas']) : $_POST['id_petugas'];
        $nisn = htmlentities($_POST['nisn']) ? htmlspecialchars($_POST['nisn']) : $_POST['nisn'];
        $tgl = htmlentities($_POST['tgl_bayar']) ? htmlspecialchars($_POST['tgl_bayar']) : $_POST['tgl_bayar'];
        $bln = htmlentities($_POST['bulan_dibayar']) ? htmlspecialchars($_POST['bulan_dibayar']) : $_POST['bulan_dibayar'];
        $thn = htmlentities($_POST['tahun_dibayar']) ? htmlspecialchars($_POST['tahun_dibayar']) : $_POST['tahun_dibayar'];
        $id_spp = htmlentities($_POST['id_spp']) ? htmlspecialchars($_POST['id_spp']) : $_POST['id_spp'];
        $total = htmlentities($_POST['jumlah_bayar']) ? htmlspecialchars($_POST['jumlah_bayar']) : $_POST['jumlah_bayar'];

        $table = "pembayaran";
        $sql = "INSERT $table SET id_petugas='$id_petugas', nisn='$nisn', tgl_bayar='$tgl', bulan_dibayar='$bln',
         tahun_dibayar='$thn', id_spp = '$id_spp', jumlah_bayar='$total'";
        $row = $this->db->query($sql);
        $this->db->query("UPDATE siswa SET id_spp = '$id_spp' WHERE nisn = '$nisn'");

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
            document.location.href = '../ui/header.php?page=pembayaran'
            }, 3000);
            </script>";
            die;
            return false;
        }
    }
}

?>