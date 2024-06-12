<?php 
require_once("../../database/koneksi.php");
$row = $config->query("SELECT * FROM sistem WHERE flags = '1'");
$hasil = $row->fetch_array();

// Controller & Model
/* Controller */  
require_once("../../controller/controller.php");
/* Model */
require_once("../../model/model_petugas.php");
require_once("../../model/model_siswa.php");
require_once("../../model/model_pembayaran.php");
require_once("../../model/model_kelas.php");
require_once("../../model/model_spp.php");

$user = new controller\Authentication($config);
$siswa = new controller\Siswa($config);
$kelas = new controller\Kelas($config);
$spp = new controller\spp($config);
$buyschool = new controller\Pembayaran($config);

if(!isset($_GET['page'])){
    require_once("../dashboard/index.php");
}else{
    switch ($_GET['page']) {
        case 'beranda':
            require_once("../dashboard/index.php");
            break;

        case 'kelas':
            require_once("../kelas/index.php");
            break;

        case 'siswa':
            require_once("../siswa/index.php");
            break;

        case 'petugas':
            require_once("../petugas/index.php");
            break;

        case 'spp':
            require_once("../spp/index.php");
            break;

        case 'pembayaran':
            require_once("../pembayaran/index.php");
            break;

        case 'histori':
            require_once("../laporan/histori.php");
            break;

        case 'laporan':
            require_once("../laporan/print.php");
            break;
    
        case 'pengaturan':
            require_once("../settings/pengaturan.php");
            break;

        case 'keluar':
            if(isset($_SESSION['status'])){
                unset($_SESSION['status']);
                session_unset();
                session_destroy();
                $_SESSION = array();
            }
            header("location:../auth/index.php");
            exit(0);
            break;
            
        default:
            require_once("../dashboard/index.php");
            break;
    }
}

if(!isset($_GET['aksi'])){
    require_once("../../controller/controller.php");
}else{
    switch ($_GET['aksi']) {
        // Sistem Page
        case 'ubah-sistem':
            $sekolah = htmlspecialchars($_POST['nama_sekolah']);
            $kepsek = htmlspecialchars($_POST['nama_kepsek']);
            $alamat = htmlspecialchars($_POST['alamat']);
            $flags = htmlspecialchars($_POST['flags']);
            $id = htmlspecialchars($_POST['id_sistem']);
            // Files Gambar
            $ekstensi_diperbolehkan_foto = array('png', 'jpg', 'jpeg', 'jfif', 'gif');
            $gambar = htmlspecialchars($_FILES["gambar"]["name"]) ? htmlentities($_FILES["gambar"]["name"]) : $_FILES["gambar"]["name"];
            $x_foto = explode('.', $gambar);
            $ekstensi_foto = strtolower(end($x_foto));
            $ukuran_foto = htmlspecialchars($_FILES['gambar']['size']);
            $file_tmp_foto = htmlspecialchars($_FILES['gambar']['tmp_name']);

            $sql = "UPDATE sistem SET nama_sekolah = '$sekolah', nama_kepsek='$kepsek', alamat='$alamat', gambar='$gambar', flags = '1' WHERE id_sistem='$id'";
            $row = $config->query($sql);

            if(in_array($ekstensi_foto, $ekstensi_diperbolehkan_foto) === true){
                if($ukuran_foto < 10440070){
                    move_uploaded_file($file_tmp_foto, "../../../assets/" . $gambar);
                    if($row){
                        echo "<script>document.location.href = '../ui/header.php?page=pengaturan'</script>";
                    }else{
                        echo "<script>document.location.href = '../ui/header.php?page=pengaturan'</script>";
                    }
                }else{
                    echo "GAGAL MENGUPLOAD FILE FOTO";
                }
            }else{
                echo "EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN";
            }
            break;

        // Page Petugas
        case 'tambahpetugas':
            require_once("../petugas/tambahpetugas.php");
            break;
        case 'ubahpetugas':
            require_once("../petugas/ubahpetugas.php");
            break;
        case 'tambah-petugas':
            $user->buat();
            break;
        case 'edit-petugas':
            $user->ubah();
            break;
        // Page Petugas

        // Page Siswa
        case 'tambahsiswa':
            require_once("../siswa/tambahsiswa.php");
            break;
        case 'ubahsiswa':
            require_once("../siswa/ubahsiswa.php");
            break;
        case 'tambah-siswa':
            $siswa->buat();
            break;
        case 'edit-siswa':
            $siswa->ubah();
            break;
        case 'hapus-siswa':
            $siswa->hapus();
            break;
        // Page Siswa

        // Page Kelas
        case 'tambahkelas':
            require_once("../kelas/tambahkelas.php");
            break;
        case 'ubahkelas':
            require_once("../kelas/ubahkelas.php");
            break;
        case 'tambah-kelas':
            $kelas->buat();
            break;
        case 'edit-kelas':
            $kelas->ubah();
            break;
        case 'hapus-kelas':
            $kelas->hapus();
            break;
        // Page Kelas

        // Page spp
        case 'tambahspp':
            require_once("../spp/tambahspp.php");
            break;
        case 'ubahspp':
            require_once("../spp/ubahspp.php");
            break;
        case 'tambah-spp':
            $spp->buat();
            break;
        case 'edit-spp':
            $spp->ubah();
            break;
        case 'hapus-spp':
            $spp->hapus();
            break;
        // Page spp

        // Pembayaran SPP
        case 'bayar-spp':
            $buyschool->buy();
            break;
        // 
        
        default:
            require_once("../../controller/controller.php");
            break;
    }
}

?>