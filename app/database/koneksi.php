<?php 
// error_reporting(0);
date_default_timezone_set("Asia/Jakarta");

$dbname = "pembayaran_spp";
$config = mysqli_connect("localhost", "root", "", $dbname);

if($config->error){
    mysqli_error($config);
    $config->close();
}

?>