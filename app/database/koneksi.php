<?php 
// error_reporting(0);
date_default_timezone_set("Asia/Jakarta");

$dbname = "pembayaran_spp";
$config = mysqli_connect("localhost", "root", "", "cp_pembayaran_spp");

if($config->error){
    mysqli_error($config);
    $config->close();
}

?>