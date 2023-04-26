<?php
    include "koneksi.php";
    
    $coki = $_COOKIE["usn"];
    $cokibarang = $_COOKIE["productName"];
    
    
    mysqli_query($koneksi, "INSERT INTO `$coki` (`namaBarang`, `quantity`) VALUES ('$cokibarang', '1')");
    header("Refresh:0");
?>