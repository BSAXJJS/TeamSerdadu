<?php
    require 'koneksi.php';
    if (isset($_POST["back"])){
        header('Location: table.php');
    }

    if (isset($_POST["submit"])) {
        $namaBarang = htmlspecialchars($_POST["namaBarang"]);
        $harga = htmlspecialchars($_POST["harga"]);
        $markas1 = htmlspecialchars($_POST["markas1"]);
        $markas2 = htmlspecialchars($_POST["markas2"]);
        
        $result = mysqli_query($koneksi, "SELECT * FROM stock");
        $row = mysqli_fetch_assoc($result);
        $namaBarang2 = $row['namaBarang'];


        if($_FILES["image"]["error"] === 4 ){
            echo "<script> alert('Image Doesnt Exist'); </script>";
        }else if ($namaBarang == $namaBarang2){
            $tampil = "Nama barang $namaBarang sudah tersedia!";
        }else{
            $fileName =$_FILES["image"]["name"];
            $fileSize = $_FILES["image"]["size"];
            $tmpName = $_FILES["image"]["tmp_name"];

            $validImageExtension = ['jpg', 'jpeg', 'png' ];
            $imageExtension = explode('.',$fileName);
            $imageExtension = strtolower(end($imageExtension));

            if(!in_array($imageExtension, $validImageExtension)){
                echo "<script>alert('invalid image extension'); </script>";
            }else if($fileSize > 1000000) {
                echo "<script>alert('file size too large'); </script>";
            }else {
                $newImageName = uniqid();
                $newImageName .= '.' . $imageExtension;

                move_uploaded_file($tmpName, 'product/'. $newImageName);

                mysqli_query($koneksi, "INSERT INTO `stock` (`id_prdk`, `namaBarang`, `harga`, `markas1`, `markas2`, `image`) VALUES (NULL, '$namaBarang', '$harga', '$markas1', '$markas2', '$newImageName')");
        
                if(mysqli_affected_rows($koneksi) >0) {
                    $tampil = "Tambah Data Berhasil!";
                }else {
                    $tampil = "Tambah Data Gagal!";
                }
            }
        }
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
    <table>
    <form method="post" action="" enctype="multipart/form-data">
        <tr>
            <td>
                <label for="namaBarang">Nama Barang</label>
            </td>
            <td>
                <input type="text" name="namaBarang" id="namaBarang" require>
            </td>
        </tr>
        <tr>
            <td>
                <label for="harga">Harga</label>
            </td>
            <td>
                <input type="text" name="harga" id="harga">
            </td>
        </tr>
        <tr>
            <td>
                <label for="markas1">Stock Markas 1</label>
            </td>
            <td>
                <input type="text" name="markas1" id="markas1">
            </td>
        </tr>
        <tr>
            <td>
                <label for="markas2">Stocl Markas 2</label>
            </td>
            <td>
                <input type="text" name="markas2" id="markas2">
            </td>
        </tr>

        
        <tr>
            <td><label for="image">Foto</label></td>
            <td><input type="file" name="image" accept=".jpg, .jpeg, .png" ></td>
        </tr>
        <tr>
            <td><button type="submit" name="submit">Add</button></td>
            <td><button type="submit" name="back">Back</button></td>
        </tr>
    </form>
    </table>
</body>
</html>