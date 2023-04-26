<?php
    include 'koneksi.php';
    session_start();

    // session
    if(!isset($_SESSION["login"])){
        header("Location:login.php");
    }


    $result = mysqli_query($koneksi, "SELECT * FROM stock");

    if (isset($_POST["search"])){
        
        $keyword = $_POST["keyword"];
        $result = mysqli_query($koneksi, "SELECT * FROM stock WHERE namaBarang LIKE '%$keyword%'");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="asset/css/all.css" rel="stylesheet">
    <style>
        #wrptbl {
            height:300px;
            overflow:scroll;
        }
        table {
            text-align:center;
            width:700px;
        }
        .functionTable a{
            font-size:20px;
            display:block;
            line-height:40px;
            color:black;
        }
        .judul{
            padding-top:20px;
            padding-bottom:20px;
        }
    </style>
</head>
<body>
    
    <h1> Daftar Produk</h1>

    <h4><a href="tambah.php">Tambah Data</a></h4>

    <form action="" method="post">

        <label for="keyword"></label>
        <input type="text" name="keyword" id="keyword"  autofocus placeholder="masukan nama barang">
        <button type="submit" name="search"> Search </button>

    </form>
    
    <div class="table-header">

    </div>

    <div id="wrptbl">
    <table >
        <div>
            <tr class="">
                <th rowspan="2" >Nama Barang</th>
                <th rowspan="2" >Harga</th>
                <th colspan="2" >Stock</th>
                <th rowspan="2" >Foto</th>
                <th rowspan="2" >Function</th>
            </tr>
            <tr class="">
                <th>M 1</th>
                <th>M 2</th>
            </tr>
        </div>
        <?php while($row = mysqli_fetch_assoc($result)) :?>
            <tr class="judul">
                <td><?php echo $row["namaBarang"] ?></td>
                <td><?php echo $row["harga"] ?></td>
                <td><?php echo $row["markas1"] ?></td>
                <td><?php echo $row["markas2"] ?></td>
                <td><img src="product/<?php echo $row["image"] ?>" width="100px"> </td>
                <td class="functionTable"><a href="edit.php?namaBarang=<?= $row["namaBarang"]?>"><i class="fa-solid fa-pen-to-square"></i></a><a href="hapus.php?namaBarang=<?= $row["namaBarang"]?>"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
        <?php endwhile; ?>

    </table>
    </div>

    <script>
        var keyword = document.getElementById('keyword');
        var wrptbl = document.getElementById('wrptbl');

        keyword.addEventListener('keyup', function(){
            // buat objecr ajax
            var xhr = new XMLHttpRequest();

            // cek kesiapan ajax
            xhr.onreadystatechange = function(){
                if (xhr.readyState==4 && xhr.status==200){
                    
                }
                wrptbl.innerHTML = xhr.responseText;
            }

            // eksekusi ajax
            xhr.open('GET', 'ajax/dataBrg.php?keyword=' + keyword.value, true);
            xhr.send();

        });
    </script>

</body>
</html>