<?php 
namespace model;

class Petugas {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function Login($username, $password){
        $username = htmlentities($_POST['userInput']) ? htmlspecialchars($_POST['userInput']) : $_POST['userInput'];
        $password = md5($_POST['passInput'], false);
        password_verify($password, PASSWORD_DEFAULT);

        if($username == "" || $password == ""){
            echo "<script>document.location.href = '../auth/index.php?alert=blank'</script>";
            die;
            exit;
        }

        $table = "users";
        $sql = "SELECT * FROM $table WHERE username = '$username' and password = '$password'";
        $configs = $this->db->query($sql);
        $cek = mysqli_num_rows($configs);

        if($cek > 0){
            $response = array($username,$password);
            $respon[$table] = $response;
            if($row = $configs->fetch_assoc()){
                if($row['level'] == "admin"){
                    $_SESSION['id'] = $row['id_petugas'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['nama'] = $row['nama_petugas'];
                    $_SESSION['level'] = "admin";
                    echo "<script>document.location.href = '../ui/header.php?page=beranda'</script>";
                }else if($row['level'] == "petugas"){
                    $_SESSION['id'] = $row['id_petugas'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['nama'] = $row['nama_petugas'];
                    $_SESSION['level'] = "petugas";
                    echo "<script>document.location.href = '../ui/header.php?page=beranda'</script>";
                }
                $_SESSION['status'] = true;
                $_SERVER['HTTPS'] == $_SERVER['HTTP'] = true;
                $_COOKIE['cookies'] = $username;
                setcookie($respon[$table], $row, time() + (86400 * 30), "/");
                array_push($respon[$table], $row);
                exit;
            }
        }else{
            $_SESSION['status'] = false;
            $_SERVER['HTTPS'] == $_SERVER['HTTP'] = false;
            echo "<script>document.location.href = '../auth/index.php?alert=failed'</script>";
            die;
            exit;            
        }
    }
    
    public function LoginSiswa($username, $password){
        $username = htmlentities($_POST['userInput']) ? htmlspecialchars($_POST['userInput']) : $_POST['userInput'];
        $password = md5($_POST['passInput'], false);
        password_verify($password, PASSWORD_DEFAULT);

        if($username == "" || $password == ""){
            echo "<script>document.location.href = '../auth/index.php?alert=blank'</script>";
            die;
            exit;
        }

        $table = "users";
        $sql = "SELECT * FROM $table WHERE username = '$username' and password = '$password'";
        $configs = $this->db->query($sql);
        $cek = mysqli_num_rows($configs);

        if($cek > 0){
            $response = array($username,$password);
            $respon[$table] = $response;
            if($row = $configs->fetch_assoc()){
                if($row['level'] == "siswa"){
                    $_SESSION['id'] = $row['id_petugas'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['nama'] = $row['nama_petugas'];
                    $_SESSION['level'] = "siswa";
                    echo "<script>document.location.href = '../ui/header.php?page=beranda'</script>";
                }
                $_SESSION['status'] = true;
                $_SERVER['HTTPS'] == $_SERVER['HTTP'] = true;
                $_COOKIE['cookies'] = $username;
                setcookie($respon[$table], $row, time() + (86400 * 30), "/");
                array_push($respon[$table], $row);
                exit;
            }
        }else{
            $_SESSION['status'] = false;
            $_SERVER['HTTPS'] == $_SERVER['HTTP'] = false;
            echo "<script>document.location.href = '../auth/index.php?alert=failed'</script>";
            die;
            exit;            
        }
    }

    public function Table(){
        $sql = "SELECT * FROM users order by id_petugas desc";
        $row = $this->db->query($sql);
        return $row;
    }

    public function create($username, $password, $nama, $role){
        $username = htmlentities($_POST['username']) ? htmlspecialchars($_POST['username']) : $_POST['username'];
        $password = md5($_POST['password'], false);
        $nama = htmlentities($_POST['nama_petugas']) ? htmlspecialchars($_POST['nama_petugas']) : $_POST['nama_petugas'];
        $role = htmlentities($_POST['level']) ? htmlspecialchars($_POST['level']) : $_POST['level'];

        $table = "users";
        $sql = "INSERT $table SET username='$username', password='$password', nama_petugas='$nama', level='$role'";
        $row = $this->db->query($sql);

        if($row){
            echo "<script>
            window.setTimeout(() => {
                alert('berhasil tambah data petugas ...'),
                document.location.href = '../ui/header.php?page=petugas'
            }, 3000);
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            window.setTimeout(() => {
                alert('gagal tambah data petugas ...'),
                document.location.href = '../ui/header.php?page=petugas&aksi=tambahpetugas'
            }, 3000);
            </script>";
            die;
            exit;
        }
    }

    public function update($username, $password, $nama, $role, $id){
        $username = htmlentities($_POST['username']) ? htmlspecialchars($_POST['username']) : $_POST['username'];
        $password = md5($_POST['password'], false);
        $nama = htmlentities($_POST['nama_petugas']) ? htmlspecialchars($_POST['nama_petugas']) : $_POST['nama_petugas'];
        $role = htmlentities($_POST['level']) ? htmlspecialchars($_POST['level']) : $_POST['level'];        
        $id = htmlentities($_POST['id_petugas']) ? htmlspecialchars($_POST['id_petugas']) : $_POST['id_petugas'];
        
        $table = "users";
        $sql = "UPDATE $table SET username='$username', password='$password', nama_petugas='$nama', level='$role' WHERE id_petugas = '$id'";
        $row = $this->db->query($sql);

        if($row){
            echo "<script>
            window.setTimeout(() => {
                alert('berhasil ubah data petugas ...'),
                document.location.href = '../ui/header.php?page=petugas'
            }, 3000);
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            window.setTimeout(() => {
                alert('gagal ubah data petugas ...'),
                document.location.href = '../ui/header.php?page=petugas&aksi=ubahpetugas&id_petugas=$id'
            }, 3000);
            </script>";
            die;
            exit;
        }
    }
}

?>