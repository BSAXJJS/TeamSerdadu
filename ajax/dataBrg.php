<?php
    include "../koneksi.php";
    $keyword = $_GET["keyword"];

    $result = mysqli_query($koneksi, "SELECT * FROM stock WHERE namaBarang LIKE '%$keyword%'");

    // if(isset($_POST['keyword'])) {
    //     $keyword = $_POST['keyword'];

    //     $data = mysqli_query($koneksi, "SELECT * FROM stock WHERE namaBarang LIKE '%".$keyword."%'");

    //     while ($tampil = mysqli_fetch_array($data)){

        
    
?>

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