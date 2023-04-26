<?php
    $host_db =  "localhost";
    $user_db =  "id20259726_bsajjs";
    $pass_db =  "Ig2qh[2BOuA4wMER";
    $nama_db =  "id20259726_bsaxjjs";
    $konek_db = mysqli_connect($host_db,$user_db,$pass_db);
    
    $koneksi =  mysqli_connect($host_db,$user_db,$pass_db,$nama_db);


    function hapus($namahps){
        global $koneksi;
        mysqli_query($koneksi, "DELETE FROM stock WHERE namaBarang = $namahps");
        return mysqli_affected_rows($koneksi);
    }
?>