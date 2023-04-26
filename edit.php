<?php
    include 'koneksi.php';
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location:login.php");
    }

    $namahps = $_GET['namaBarang'];

    $get = mysqli_query($koneksi, "SELECT * FROM stock WHERE namaBarang = '$namahps'");
    $row = mysqli_fetch_assoc($get);
    $namaBarang = $row['namaBarang'];
    $harga = $row['harga'];
    $markas1 = $row['markas1'];
    $markas2 = $row['markas2'];
    $image = $row['image'];

    // mysqli_query($koneksi, "UPDATE `stock` SET `namaBarang` = '$namaBarang', `harga` = '$harga', `markas1` = '$markas1', `markas2` = '$markas2' WHERE `stock`.`$namaBarang` = `$namahps`");

    if(isset($_POST["submit"])){

        $namaBarang1 = htmlspecialchars($_POST["namaBarang"]);
        $harga1 = htmlspecialchars($_POST["harga"]);
        $markas11 = htmlspecialchars($_POST["markas1"]);
        $markas21 = htmlspecialchars($_POST["markas2"]);
        $image = htmlspecialchars($_POST["image"]);

        mysqli_query($koneksi, "UPDATE stock SET namaBarang = '$namaBarang1', harga = '$harga1', markas1 = '$markas11', markas2 = '$markas21', image = 'product/$image'  WHERE namaBarang = '$namahps'");

        if(mysqli_affected_rows($koneksi) >0){
            echo "
                <script>
                    alert('data berhasil diubah!');
                    document.location.href= 'table.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('data gagal diubah!');
                    document.location.href= 'table.php';
                </script>
            ";
        }
    }
    if(isset($_POST["back"])){
        header("Location:table.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit Data</h1>

    <form action="" method="POST">
        <table>
            <tr>
                <td>
                    <label for="namaBarang">Nama Barang</label>
                </td>
                <td>
                    <input type="text" name="namaBarang" id="namaBarang" required value="<?= $namaBarang ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="harga">Harga</label>
                </td>
                <td>
                <input type="text" name="harga" id="harga" value="<?= $harga ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="markas1">Stock Markas 1</label>
                </td>
                <td>
                    <input type="text" name="markas1" id="markas1" value="<?= $markas1 ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="markas2">Stock Markas 2</label>
                </td>
                <td>
                    <input type="text" name="markas2" id="markas2" value="<?= $markas2 ?>">
                </td>
            </tr>
            <tr>
                <td>
                <button type="submit" name="submit">Add</button>
                </td>
                <td>
                <button type="submit" name="back">Back</button>
                </td>
            </tr>
        </table>
    </form>
    
</body>
</html>
