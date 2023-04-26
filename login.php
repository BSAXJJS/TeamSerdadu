<?php
    include "koneksi.php";
    session_start();
    if(isset($_SESSION["login"])){
        header("location: https://bsaxjjs.000webhostapp.com/?is_login=true");
    }
    $eror   ="";
    $username = "";

    if(isset($_POST['login'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username =='' or $password == ''){
            $eror .= "Masukan Username atau Password!!";
        }else{
            $sql1 = "select * from user_data where username = '$username';";
            $q1 = mysqli_query($koneksi, $sql1);
            $r1 = mysqli_fetch_array($q1);

            if($r1['username'] != $username){
                $eror .= "Username $username tidak tersedia.";
            }elseif($r1['password'] != $password){
                $eror .= "Password tidak sesuai!";
            }elseif($r1['password'] == $password and $r1['username'] == $username){
                $_SESSION["login"] = true;
                setcookie('usn', $username);
                header("location: https://bsaxjjs.000webhostapp.com");
            }
        }
    }

    //register 
    
    
    

    if(isset($_POST['register'])){
        $email = htmlspecialchars($_POST['email']);
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        if($username =='' or $password == ''){

        }else{
            $result = mysqli_query($koneksi, "SELECT * FROM user_data");
            $row = mysqli_fetch_assoc($result);
            $usn = $row['username'];

            if($usn == $username){
                $eror .= "Username $username telah digunakan.";
            }else{
                $addusr = mysqli_query($koneksi, "INSERT INTO `user_data` (`id`,  `username`, `email`, `password`) VALUES (NULL,  '$username', '$email', '$password')");
                $addusr;
                
                $create_usrtbl = mysqli_query($koneksi, "CREATE TABLE $username ( `id` INT(225) NOT NULL AUTO_INCREMENT , `foto` BLOB NOT NULL , `namaBarang` VARCHAR(225) NOT NULL ,`harga` INT(225) NOT NULL, `jumlah` VARCHAR(225) NOT NULL , PRIMARY KEY (`id`), UNIQUE (`namaBarang`))");
                
                if($addusr) {
                    echo "<script>
                    alert('Berhasil membuat id! silahkan login kembali');
                    $create_usrtbl;
                    
                    
                </script>";
                }else {
                    echo "<script>
                    alert('Gagal membuat id! silahkan login kembali');
                </script>";
                }
                
            }
        }
    }

    

    // $user=$_POST['username'];
    // $pass=$_POST['password'];

    // $sql=mysqli_query($koneksi, "SELECT * FROM user_data WHERE username = '$user'AND password = '$pass' ;");

    // $cek=mysqli_num_rows($sql);

    // if ($user ="" or $pass = ""){
    //     $eror .= "<li>Masukan Username atau Password!!</li>";
    // }elseif ($cek >0){
    //     header("location: adminMode.php");
    // }else{
    //     echo "Username Atau Password Salah!!";
    // }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>BSA X JJS</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/swiper@9.0.2/swiper-bundle.min.css" rel="stylesheet">
    <link href="source/BSA1.jpg" rel="Icon BSA">    
    <style>
        body{
            background-color: rgb(30, 28, 28);;
            height:100vh;
            background-color:white;
        }
        img {
            display:block;
            width: 175px;
            position: absolute;
            margin-left: auto;
            margin-right: auto;
            left: 0;
            right: 0;
            top:8%;
            border-radius:50px
            box-shadow: 0px 8px 12px rgba(0, 0, 0, 0.3), 4px 8px 12px rgba(0, 0, 0, 0.3) ;
        }
        .content h1 {
            line-height:70px;
            padding: 20px 0px 0px 0px;
            border-bottom: 1px solid ;
        }

        .loginCover {
            z-index:1;
            position:absolute;
            bottom:0;
            right:0;
            background-color:white;
            width:100%;
            height:60vh;
            border-radius:30px 30px 0px 0px;
        }
        .content {
            text-align: center;
            transform:translateY(-8%);
        }
        .boxInp {
            height:40px;
            width:300px;
            margin:10px
        }
        .loginbtn {
            padding-left:20px;
            padding-right:20px;
            z-index: 10;
            border-radius:30px;
            background: transparent;
            color:white;
            background-color:black;

        }
        .content input[placeholder] {
            
            text-align:center;
            border:1px solid black;
            border-radius:30px;
        }
        .message {
            position:absolute;
            width:50%;
            opacity: .8;
        }
        .btmtxt{
            position:absolute;
            width:100%;
            z-index:1000;
            /*transform:translateY(94vh);*/
        }
        .btmtxt input {
            display:inline;
            background-color:white;
            border:none;
            font-weight:bolder;
        }
        .btmtxt .register {
            position:relative;
            text-decoration:none;
            color:black;
        }
        
        .btmtxt .lgnswtch{
            display:none;
        }
        
        .coverlgrg .aktif {
            z-index: 10;
        }
    </style>
</head>
<body>
    <img src="BSA1.jpg" alt="">
    <!-- login menu -->
    <?php if($eror){ ?>
        <div class="alert alert-danger message">
            <?php echo $eror ?>
        </div>
    <?php } ?>


    <div class="coverlgrg">
        <div class="loginCover "  id="regform">
            <div class="content">
                <h1>Register</h1>
                <div class="loginWrapper">
                    <form method="POST" action="" role="form" class="formClass">
                        <input class="boxInp" type="text" class="usn inptCt" name="email" placeholder="email" required>
                        <br>
                        <input 
                        class="boxInp" type="text" class="usn inptCt" name="username" placeholder="Username" required>
                        <br>
                        <input class="boxInp" type="password" class="pw inptCT" name="password" placeholder="Password" required>
                        <br>
                        <div class="btmtxt">
                            <input type="button" class="lgnswtch register" id="btnlgn" onclick="my2Function()" value="Sudah punya akun? Login">
                        </div>
                        <br><br>
                        <button type="submit" class="btn btn-dark loginbtn" value="REGISTER" class="loginbtn" name="register">Register</button>
                        <!-- <input type="submit" value="LOGIN" class="loginbtn" name="login"></input> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="coverlgrg" >
        <div class="loginCover aktif" id="log">
            <div class="content">
                <h1>Login</h1>
                <div class="loginWrapper">
                    <form method="POST" action="" role="form" class="formClass">
                        <input class="boxInp" type="text" class="usn inptCt" name="username" placeholder="Username">
                        <br>
                        <input class="boxInp" type="password" class="pw inptCT" name="password" placeholder="Password">
                        <br>
                        <div class="btmtxt">
                            <input type="button" class="register " id="btnrgr" onclick="myFunction()" value="Belum punya akun? Register">
                        </div>
                        <br><br>
                        <button type="submit" class="btn btn-dark loginbtn" value="LOGIN" class="loginbtn" name="login">Login</button>
                        
                        <div id="h1"></div>
                        <!-- <input type="submit" value="LOGIN" class="loginbtn" name="login"></input> -->
                    </form>
                </div>
            </div>
        </div>
        
    </div>

        
    
    

        <script>
            const lgn = document.getElementById("btnlgn");
            const reg = document.getElementById("btnrgr");
            const regfrm = document.getElementById("regform");
            const log = document.getElementById("log");

            function myFunction() {
                lgn.classList.remove("lgnswtch");
                reg.classList.add("lgnswtch");
                regfrm.classList.add("aktif");
                log.classList.remove("aktif");
            }
            function my2Function() {
                lgn.classList.add("lgnswtch");
                reg.classList.remove("lgnswtch");
                regfrm.classList.remove("aktif");
                log.classList.add("aktif");
            }
        </script>

        <!-- aos -->
    
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    
        <!-- Swiper JS item slider -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    
    </body>
</html>
