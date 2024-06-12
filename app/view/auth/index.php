<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php 
            require_once("../../database/koneksi.php");
            $row = $config->query("SELECT * FROM sistem WHERE flags = '1'");
            $hasil = $row->fetch_array();

            require_once("../../model/model_petugas.php");
            require_once("../../controller/controller.php");
            $users = new controller\Authentication($config);
            
            if(!isset($_GET['aksi'])){
                require_once("../../controller/controller.php");
            }else{
                switch ($_GET['aksi']) {
                    case 'signin-petugas':
                        session_start();
                        $users->SignIn();
                        break;
                        
                    case 'signin-siswa':
                        session_start();
                        $users->SignInSiswa();
                        break;
                                                                        
                    default:
                        require_once("../../controller/controller.php");
                        break;
                }
            }
        ?>
        <title>Aplikasi Pembayaran <?php echo $hasil['nama_sekolah']; ?></title>
        <link rel="shortcut icon" href="/assets/<?=$hasil['gambar']?>" type="image/x-icon">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <style type="text/css">
        * {
            box-sizing: border-box;
            font-family: "Times New Roman";
            font-style: normal;
        }

        .card-title {
            font-size: 16px;
            font-weight: normal;
            text-align: center;
        }

        .card-title2 {
            font-size: 32px;
            font-weight: normal;
            text-align: center;
        }

        body {
            background-color: gray;
            background-blend-mode: darken;
        }

        .card {
            width: 360px;
        }

        .card-body {
            height: 350px;
        }

        @media (max-height: 500px) {
            .card-body {
                max-height: 500px;
            }
        }

        @media (max-width: 720px) {
            .card {
                max-width: 720px;
            }
        }
        </style>
    </head>

    <body onload="startTime()">
        <div class="layout">
            <div class="d-grid justify-content-center align-items-center flex-wrap p-1 m-1">
                <div class="container-fluid bg-body-tertiary p-5 m-5 mx-auto">
                    <div class="card">
                        <div class="d-flex justify-content-center align-items-center flex-wrap">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title2">Login</h4>
                                    <div class="border border-top mb-2"></div>
                                    <h4 class="card-title display-4">
                                        - <?php echo $hasil['nama_sekolah'] ?> -
                                    </h4>
                                    <div class="d-flex justify-content-around align-items-center flex-wrap">
                                        <a href="?tombol=petugas" class="btn btn-primary btn-sm">
                                            <i class="fa fa-user"></i><span> Petugas / Admin</span>
                                        </a>
                                        <a href="?tombol=siswa" class="btn btn-secondary btn-sm">
                                            <i class="fa fa-user-graduate"></i><span> Siswa/i</span>
                                        </a>
                                    </div>
                                    <?php if(isset($_GET['tombol'])){ ?>
                                    <?php if($_GET['tombol'] == "petugas"){ ?>
                                    <form action="?aksi=signin-petugas" method="post">
                                        <table class="table table-striped-columns">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <label for="">username</label>
                                                        <input type="text" name="userInput" id=""
                                                            placeholder="masukkan username anda ..."
                                                            class="form-control" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">password</label>
                                                        <input type="password" name="passInput" id=""
                                                            placeholder="masukkan password anda ..."
                                                            class="form-control" required>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="card-footer">
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary hover col-sm-12 col-md-12">
                                                    <i class="fa fa-sign-in-alt"></i>
                                                    <span>Sign In</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php } ?>
                                    <?php if($_GET['tombol'] == "siswa"){ ?>
                                    <form action="?aksi=signin-siswa" method="post">
                                        <table class="table table-striped-columns">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <label for="">username</label>
                                                        <input type="text" name="userInput" id=""
                                                            placeholder="masukkan username anda ..."
                                                            class="form-control" required>
                                                        <small>username adalah nis</small>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">password</label>
                                                        <input type="password" name="passInput" id=""
                                                            placeholder="masukkan password anda ..."
                                                            class="form-control" required>
                                                        <small>password mu adalah nisn</small>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="card-footer">
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary hover col-sm-12 col-md-12">
                                                    <i class="fa fa-sign-in-alt"></i>
                                                    <span>Sign In</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php
                            if(isset($_GET['alert'])){
                                if($_GET['alert'] == "failed"){
                            ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Informasi</strong>
                                <p>username dan password anda salah !</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                                    onclick="document.location.href = '../auth/index.php'"></button>
                            </div>
                            <?php
                                }else if($_GET['alert'] == "blank"){
                            ?>
                            <div class="alert alert-light alert-dismissible fade show" role="alert">
                                <strong>Informasi</strong>
                                <p>Tidak boleh kosong Form Login</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                                    onclick="document.location.href = '../auth/index.php'"></button>
                            </div>
                            <?php
                                }
                            } 
                            ?>
                            <div class="container m-5">
                                <footer class="footer">
                                    <p id="year" class="text-center"></p>
                                </footer>
                                <div class="text-center">By <?php echo $hasil['nama_sekolah'] ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js">
            </script>
            <script type="text/javascript">
            function startTime() {
                var day = ["minggu", "senin", "selasa", "rabu", "kamis", "jumat", "sabtu"];
                var today = new Date();
                var h = today.getHours();
                var tahun = today.getFullYear();
                var m = today.getMinutes();
                var s = today.getSeconds();
                m = checkTime(m);
                s = checkTime(s);
                document.getElementById('year').innerHTML =
                    "&copy Aplikasi Pembayaran Spp " + tahun + "<br>" + day[today.getDay()] + ", " + h + " : " + m +
                    " : " + s;
                var t = setTimeout(startTime, 500);
            }

            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i
                }; // add zero in front of numbers < 10
                return i;
            }
            </script>
        </div>
    </body>

</html>