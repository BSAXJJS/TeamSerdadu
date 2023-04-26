<?php
    include "koneksi.php";
    
    $coki = $_COOKIE["usn"];
    $cokibarang = $_COOKIE["rmvcart"];
    
    mysqli_query($koneksi,"DELETE FROM `$coki` WHERE `$coki`.`namaBarang` = '$cokibarang'");
    header("Refresh:0");

?>