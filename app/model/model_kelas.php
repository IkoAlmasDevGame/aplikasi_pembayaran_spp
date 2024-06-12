<?php 
namespace model;

class room {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function Table(){
        $sql = "SELECT * FROM kelas order by id_kelas asc";
        $row = $this->db->query($sql);
        return $row;
    }

    public function create($nama){
        $nama = htmlentities($_POST['nama_kelas']) ? htmlspecialchars($_POST['nama_kelas']) : $_POST['nama_kelas'];
        
        $table = "kelas";
        $sql = "INSERT $table SET nama_kelas='$nama'";
        $row = $this->db->query($sql);

        if($row){
            echo "<script>
            window.setTimeout(() => {
            document.location.href = '../ui/header.php?page=kelas'
            }, 3000);
            </script>";
            die;
            return true;
        }else{
            echo "<script>
            window.setTimeout(() => {
            document.location.href = '../ui/header.php?page=kelas&aksi=tambahkelas'
            }, 3000);
            </script>";
            die;
            return false;
        }
    }

    public function update($nama, $id){
        $nama = htmlentities($_POST['nama_kelas']) ? htmlspecialchars($_POST['nama_kelas']) : $_POST['nama_kelas'];
        $id = htmlentities($_POST['id_kelas']) ? htmlspecialchars($_POST['id_kelas']) : $_POST['id_kelas'];
        
        $table = "kelas";
        $sql = "UPDATE $table SET nama_kelas='$nama' WHERE id_kelas='$id'";
        $row = $this->db->query($sql);

        if($row){
            echo "<script>
            window.setTimeout(() => {
            document.location.href = '../ui/header.php?page=kelas'
            }, 3000);
            </script>";
            die;
            return true;
        }else{
            echo "<script>
            window.setTimeout(() => {
            document.location.href = '../ui/header.php?page=kelas&aksi=ubahkelas&id_kelas=$id'
            }, 3000);
            </script>";
            die;
            return false;
        }
    }

    public function delete($id){
        $id = htmlentities($_GET['id_kelas']) ? htmlspecialchars($_GET['id_kelas']) : $_GET['id_kelas'];
        
        $table = "kelas";
        $sql = "DELETE FROM $table WHERE id_kelas='$id'";
        $row = $this->db->query($sql);

        if($row){
            echo "<script>
            window.setTimeout(() => {
            document.location.href = '../ui/header.php?page=kelas'
            }, 3000);
            </script>";
            die;
            return true;
        }else{
            echo "<script>
            window.setTimeout(() => {
            document.location.href = '../ui/header.php?page=kelas'
            }, 3000);
            </script>";
            die;
            return false;
        }
    }
}

?>