<?php 
namespace model;

class pembinaan {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function Table(){
        $sql = "SELECT * FROM spp order by id_spp asc";
        $row = $this->db->query($sql);
        return $row;
    }

    public function create($nominal){
        $nominal = htmlentities($_POST['nominal']) ? htmlspecialchars($_POST['nominal']) : $_POST['nominal'];

        $table = "spp";
        $sql = "INSERT $table SET nominal='$nominal'";
        $row = $this->db->query($sql);

        if($row){
            echo "<script>
            window.setTimeout(() => {
            document.location.href = '../ui/header.php?page=spp'
            }, 3000);
            </script>";
            return true;
        }else{
            echo "<script>
            window.setTimeout(() => {
            document.location.href = '../ui/header.php?page=spp&aksi=tambahspp'
            }, 3000);
            </script>";
            return false;
        }
    }

    public function update($nominal, $id){
        $nominal = htmlentities($_POST['nominal']) ? htmlspecialchars($_POST['nominal']) : $_POST['nominal'];
        $id = htmlentities($_POST['id_spp']) ? htmlspecialchars($_POST['id_spp']) : $_POST['id_spp'];

        $table = "spp";
        $sql = "UPDATE $table SET nominal = '$nominal' WHERE id_spp = '$id'";
        $row = $this->db->query($sql);

        if($row){
            echo "<script>
            window.setTimeout(() => {
            document.location.href = '../ui/header.php?page=spp'
            }, 3000);
            </script>";
            return true;
        }else{
            echo "<script>
            window.setTimeout(() => {
            document.location.href = '../ui/header.php?page=spp&aksi=ubahspp&id_spp=$id'
            }, 3000);
            </script>";
            return false;
        }
    }

    public function delete($id){
       $id = htmlentities($_GET['id_spp']) ? htmlspecialchars($_GET['id_spp']) : $_GET['id_spp'];

        $table = "spp";
        $sql = "DELETE FROM $table WHERE id_spp = '$id'";
        $row = $this->db->query($sql);

        if($row){
            echo "<script>
            window.setTimeout(() => {
            document.location.href = '../ui/header.php?page=spp'
            }, 3000);
            </script>";
            return true;
        }else{
            echo "<script>
            window.setTimeout(() => {
            document.location.href = '../ui/header.php?page=spp'
            }, 3000);
            </script>";
            return false;
        }
    }
}

?>