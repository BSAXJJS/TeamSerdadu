<?php
    include 'koneksi.php';

    $namahps = $_GET['namaBarang'];

    mysqli_query($koneksi, "DELETE FROM stock WHERE namaBarang = '$namahps'");

    if(mysqli_affected_rows($koneksi) >0){
        echo "
            <script>
                alert('data berhasil dihapus!');
                document.location.href= 'table.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('data berhasil gagal!');
                document.location.href= 'table.php';
            </script>
        ";
    }

?>