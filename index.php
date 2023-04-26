<?php
    session_start();
    include "koneksi.php";
    
    $result = mysqli_query($koneksi, "SELECT * FROM stock");
    $prdctnum = mysqli_num_rows($result);
    $i = 1;
    
    
    if(isset($_SESSION["login"])){
        $coki = $_COOKIE["usn"];
        $host_db =  "localhost";
        $user_db =  "id20259726_bsajjs";
        $pass_db =  "Ig2qh[2BOuA4wMER";
        $nama_db =  $_COOKIE["usn"];
        
        $logedin = "<a style='font-size:18px'><strong>$coki</strong></a><a href='logout.php'>Logout</a>";
        
        
        
        
        
        // if(isset($_POST['addcart'])){
        //     $nmbrg = $_POST['namabrg'];
            
        //      mysqli_query($koneksi, "INSERT INTO `$coki` (`namaBarang`) VALUES ('$nmbrg')");
            
        // }
        
    }else{
        $logedin = "<a href='login.php'>Login / Register</a>";
    }
    
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
    <link href="source/BSA1.jpg" rel="Icon BSA">
    <link href="asset/css/all.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <!-- Demo styles -->
    <style>
        /* Item Slide */
        body {
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        #product {
            height: 100vh;
        }
        /*.product h1{*/
        /*    font-weight: bolder;*/
        /*    transform: translate(3%, 500%)*/
        /*}*/
        /*.mySwiper {*/
        /*    height: 100vh;*/
        /*}*/
        /*.swiper-slide {*/
        /*    width: 390px;*/
        /*    height: 450px;*/
        /*    font-size: 18px;*/
        /*    display: flex;*/
        /*}*/
        /*.card {*/
        /*    width: 390px;*/
        /*    height: 450px;*/
        /*    overflow: hidden;*/
        /*    transform: translateY(40%);*/
        /*}*/
        /*.card1 {*/
        /*    background-image: url("source/imgfx1.jpg");*/
        /*    background-size: cover;*/
        /*    border: none;*/
        /*    z-index: 3;*/
        /*    box-shadow: 0px 8px 12px rgba(0, 0, 0, 0.3), 4px 8px 12px rgba(0, 0, 0, 0.3) ;*/
        /*}*/
        /*.card2 {*/
        /*    background-image: url("source/imgfx2.jpg");*/
        /*    background-size: cover;*/
        /*    border: none;*/
        /*    z-index: 3;*/
        /*    box-shadow: 0px 8px 12px rgba(0, 0, 0, 0.3), 4px 8px 12px rgba(0, 0, 0, 0.3) ;*/
        /*}*/
        /*.card3 {*/
        /*    background-image: url("source/imgfx3.jpg");*/
        /*    background-size: cover;*/
        /*    border: none;*/
        /*    z-index: 3;*/
        /*    box-shadow: 0px 8px 12px rgba(0, 0, 0, 0.3), 4px 8px 12px rgba(0, 0, 0, 0.3) ;*/
        /*}*/
        /*.card4 {*/
        /*    background-image: url("source/imgfx1.jpg");*/
        /*    background-size: cover;*/
        /*    border: none;*/
        /*    z-index: 3;*/
        /*    box-shadow: 0px 8px 12px rgba(0, 0, 0, 0.3), 4px 8px 12px rgba(0, 0, 0, 0.3) ;*/
        /*}*/
        /*.card5 {*/
        /*    background-image: url("source/imgfx2.jpg");*/
        /*    background-size: cover;*/
        /*    border: none;*/
        /*    z-index: 3;*/
        /*    box-shadow: 0px 8px 12px rgba(0, 0, 0, 0.3), 4px 8px 12px rgba(0, 0, 0, 0.3) ;*/
        /*}*/
        /*.card6 {*/
        /*    background-image: url("source/imgfx3.jpg");*/
        /*    background-size: cover;*/
        /*    border: none;*/
        /*    z-index: 3;*/
        /*    box-shadow: 0px 8px 12px rgba(0, 0, 0, 0.3), 4px 8px 12px rgba(0, 0, 0, 0.3) ;*/
        /*}*/
        /*.card .card-content{*/
        /*    background-color: white;*/
        /*    padding: 20px 20px 0px 20px;*/
        /*    transform: translateY(130%);*/
        /*    border-radius: 10px;*/
        /*    transition: transform 0.5s ease-in-out;*/
        /*}*/
        
        /*.card-wraper .card:hover .card-content{*/
        /*    transform: translateY(59%);*/
        /*}*/

        /* Navigation */
        nav {
            z-index: 9;
            position: fixed;
            height: 70px;
            width: 100%;
            background-color: white;
            box-shadow: 0px 8px 12px rgba(0, 0, 0, .3);
        }
        nav .navigationWrapper ul {
            float: right;
            transform:translateY(-22%);
        }
        nav .navigationWrapper {
            height:65px;
        }
        nav .navigationWrapper ul li {
            display: inline-block;
            transform: translateY(100%);
        }
        nav .navigationWrapper ul li a {
            padding: 10px 20px 10px 20px;
            border-radius: 40px;
            text-decoration: none;
            color: black ;
            font-weight: bolder;
        }
        nav .navigationWrapper ul  .active {
            background-color: black ;
            color: white;
        }
        nav .navigationWrapper ul li:hover a {
            background-color: black ;
            color: white;;
            transition: all .3s ease-in-out;
        }

        nav .navigationWrapper .navigationBrandlogo img {
            position: absolute;
            z-index: 10;
            height: 90px;
            border-radius: 50px;
            box-shadow: 0px 10px 18px rgba(0, 0, 0, 0.5), 0px 10px 18px rgba(0, 0, 0, 0.5) ;
        }
        nav .menu-toogle {
            display:none;
        }

        /* content 1 (img cover) */
        .content1 .trnsprnt-bg{
            z-index: 1;
            position: absolute;;
            width: 100%;
            height: 100vh;
            background: linear-gradient(to left, #000000, #0000006d);
        }
        .content1 .img-and-txt-wrapper-content1 {
            width: 100%;
            height: 100vh;
            background-size: cover;
            background-image: url("source/DisplayBgCT1.jpg");
        }
        .content1 .trnsprnt-bg h2 {
            font-size: 50px;
            font-weight: bolder;
        }
        .content1 .trnsprnt-bg .ct1Text {
            font-size: 130%;
            font-weight: bolder;
            color: white !important;;
            max-width: 60%;
            text-align: right;
            float: right;
            transform: translate(0%, 80%);
        }

        /* content 2 about */
        .content21 .gambar img {
            width: 600px;
            border-radius: 20px;
        }
        .content21 .row .text {
            position:relative;
            text-align:right;
        }.content21 .row .text h1 {
            font-size:65px;
            font-weight:bolder;
        }
        .content21 .row .text p {
            font-size:19px;
        }
        .content21 .row {
            transform:translateY(30%);
        }
        .content21 {
            height:100vh;
        }
        



        /* footer */
        .background-footer .trnsprnt-footer .content-footer .txt-footer p a {
                color: white !important;
        }

    </style>

    <style>
        /* iphone 8 responsive */
        @media screen and (max-width: 500px)  {
            /* Navigation */
            
            nav .menu-toogle {
                display:content;
            }   
            nav {
                z-index: 9;
                position: fixed;
                height: 50px;
                width: 100%;
                background-color: white;
                box-shadow: 0px 8px 12px rgba(0, 0, 0, .3);
            }
            nav .navigationWrapper {
                width: 100%;

            }
            .listMenu {
                display:flex;
                flex-direction:row-reverse;
                width:100%;
                transform:translateY(-100%);

            }
            nav .navigationWrapper .listWrap{
                overflow:scroll;
                position:absolute;
                float:right;
                height:220px;
                border-radius:20px;
                background-color:white;
                transform:translate(53px,-487px) scale(0);
                transition:all 0.5s;
            }
            nav .navigationWrapper .listWrap ul{
                transform:translateY(12px);
            }
            nav .navigationWrapper ul {
                float: right;
                width: 190px;
                height: 290px;
            }
            nav .navigationWrapper ul li {
                display: block;
                line-height: 50px;
                transform: translateY(0px);
                text-align: right;
                padding-right: 5px;
            }
            nav .navigationWrapper ul li a {
                padding: 10px 20px 10px 20px;
                border-radius: 40px;
                text-decoration: none;
                color: black ;
                font-weight: bolder;
            }
            nav .navigationWrapper ul  .active {
                background-color: black ;
                color: white;
            }
            nav .navigationWrapper ul li:hover a {
                background-color: black ;
                color: white;;
                transition: all .3s ease-in-out;
            }

            nav .navigationWrapper .navigationBrandlogo img {
                position: relative;
                z-index: 10;
                height: 65px;
                border-radius: 50px;
                box-shadow: 0px 10px 18px rgba(0, 0, 0, 0.5), 0px 10px 18px rgba(0, 0, 0, 0.5) ;
            }
            
            .cart-toggle {
                position:absolute;
                float:right;
                transform:translate(178%, 3px);
            }
            .cart-toggle i {
                font-size:20px;
            }
            .cart{
                overflow-y:scroll;
                position:absolute;
                transform:translate(27%, -57%) scale(0);
                z-index:100;
                background-color:white;
                border-radius:20px;
                border:1px solid;
                width:93%;
                height:80vh;
                transition:all 0.5s;
            }
            .cart-active {
                transform:translate(0px, 4px) scale(1) !important;
            }
            .cart h3{
                float:left;
                transform:translate(10px,5px);
            }
            .cart .X {
                float:right;
                width:23px !important;
                transform:translateY(5px);
            }
            /*.cart-content img {*/
            /*    position:absolute;*/
            /*    transform:translateX(10px);*/
            /*    width:75px;*/
            /*    border:1px solid;*/
            /*}*/
            /*.cart-content h5 {*/
            /*    font-size:25px;*/
            /*    transform:translate(25%, 0px);*/
            /*}*/
            /*.cart-content p{*/
            /*    display:inline-block;*/
            /*    transform:translate(96px, 0px);*/
            /*    font-size:20px;*/
            /*}*/
            .wrapFntc{
                transform:translateX(10%);
            }
            .user-list{
                position:absolute;
                width:160px;
                float:right;
                transition: all 0.5s;
                transform:translate(47%, -15px) scale(0);
                background-color:white;
                border-radius:20px;
            }
            .user-toggle {
                position:relative;
                float:right;
                transform:translate(-350%, 3px);
            }
            .user-toggle i {
                font-size:20px;
            }
            .user-list a{
                display:block;
                text-align:right;
            }
            .user-list a{
                color:black;
                padding:17px;
            }
            .usrwrap {
                transform:translateY(-370px);
                display:flex;
                flex-direction:row-reverse;
                width:86%;
            }
            .user-list-active {
                transform:translate(0%, 55px) scale(1);
            }

            /* menu button */
            nav .navigationWrapper .slide {
                transform: translate(0px, -310px) scale(1);
            }
            .mActive span:nth-child(2){
                transform: rotate(45deg) translate(8px, 4px);
            }
            .mActive span:nth-child(3){
                transform: scale(0);
            }
            .mActive span:nth-child(4){
                transform: rotate(-45deg) translate(8px, -4px);
            }

            nav .menu-toogle {
                transform: translateY(15px);
                position: relative;
                float: right;
                display: flex;
                height: 20px;
                flex-direction: column;
                justify-content: space-between;
            }
            nav .menu-toogle input {
                position: absolute;
                width: 40px;
                height: 20px;
                opacity: 0;
            }
            nav .menu-toogle span {
                display: block;
                width: 30px;
                height: 3px;
                background-color: black;
                border-radius: 3px;
                transition: all 0.4s;
            }
            .content1 .trnsprnt-bg{
                background: linear-gradient(to top,#000000ba, #00000077) ;
            }
            /* content 1 */
            .content1 .trnsprnt-bg h2 {
                font-size: 20px;
                font-weight: bolder;
            }
            .content1 .trnsprnt-bg .ct1Text {
                max-width: 100%;
                text-align: center;;
                font-size: 14px;
                font-weight: bolder;
                color: white !important;
        }
            /* content 2 About  */

            .content2 .row {
                align-items: center;;
            }   
            .content2 .row img {
                padding-top: 55px;
                padding-bottom: 50px;
                transform: translateX(9%);
                width: 300px ;
            }
            .content2 .row .text{
                text-align: center;
            }
            .content2 .row .text h1 {
                font-weight: bolder;
            }

            /* content 3 */
            .content3 .row3 {
                align-items: center;;
            }   
            .content3 .row3 img {
                padding-top: 55px;
                padding-bottom: 50px;
                transform: translateX(13%);
                width: 300px ;
            }
            .content3 .row3 .text3{
                text-align: center;
            }
            .content3 .row3 .text3 h1 {
                font-size: 25px;
                font-weight: bolder;
            }
            .content3 .row3 .text3 h4 {
                font-size: 18px;
                font-weight: bolder;
            }

            /* footer */
            .background-footer .trnsprnt-footer .content-footer .txt-footer {
                position: absolute;
                color: white;
                transform: translate(20px, 40px);
            }
            .background-footer .trnsprnt-footer .content-footer img {
                width: 100%;
                height: 40vh;
            }

            /* content 2 */
            .content22 .gambar img {
                position: relative;
                height: 300px !important;
                left:7%;
            }
            .content22 .row .text {
                text-align:center;
            }
            .content22 .row {
                position:relative;
                top :10%;
            }
            .content22 {
                height:100vh;
            }
            .content22 {
                display:content;
            }
            .content21 {
                display:none;
            }
            .card {
                width:350px;
            }
            .card input {
                background-color:white;
                width:300px;
                font-weight:bolder;
                font-size:30px;
                border:none;
                transform:translateY(-50%);
                padding-left:28px;
                text-align:left !important;
            }
            .card-content {
                height:430px;
            }
            .card img {
                border-radius:10px 10px 0px 0px;
                margin:25px;
                width:300px;
                padding-bottom:5px;
            }
            .card .harga {
                transform:translateY(-43px);
                padding-left:28px;
                line-height:0;
            }
            .card .chart {
                /*border:none;*/
                /*width:58px;*/
                /*padding-top:15px;*/
                /*padding-bottom:15px;*/
                /*color:white;*/
                /*border-radius:10px;*/
                /*text-align:center;*/
                /*background-color:blue;*/
                /*transform:translate(267px, -105px);*/
            }
            #product {
                transform:translateY(30px);
            }
            .product {
                margin-left:10px;
            }
            .chart {
                z-index:10000;
            }
            .cart-login div{
                position:relative;
                top:70px;
                display:block;
                line-height:50px;
                text-align:center;
                font-weight:bolder;
                
            }
            .cart-login .cart-log {
                color:white;
                text-decoration:none;
                background-color:black;
                padding:8px;
                border-radius:5px;
            }
            .card-title {
                z-index:-10;
            }
    
        }
        
        
        
    </style>
    
    <style>
        .cart-content img {
            position:relative;
            transform:translateX(-40px);
            width:75px;
            border:1px solid;
            border-radius:5px;
        }
        .cart-content h5 {
            font-weight:bold;
            position:absolute;
            width:250px;
            font-size:20px;
            transform:translate(53%, -75px);
        }
        .cart-content p{
            font-weight:30%;
            display:inline-block;
            transform:translate(160%,-50px);
            font-size:17px;
        }
        .cart {
            transform:scale(0);
        }
        .cart-content {
            width:100%;
            transform:translateY(10px);
            margin-bottom:10px;
            height:75px;
            overflow:hidden;
        }
        .count {
            width:25px;
            height:25px;
            text-align:center;
            font-size:15px;
            transform:translate(-50px, 2px);
        }
        .qctbtn {
            width:25px;
            height:25px;
            text-align:center;
            background-color:white;
            border:1px solid;
        }
        .addQct {
            transform:translate(9px, -21px);
        }
        .minQct {
            transform:translate(-20px, 27px);
        }
        .ddCvr {
            width:200px;
            transform:translate(67%, -50px);
            font-size:14px;
        }
        .ddCvr select {
            border:1px solid grey;
            border-radius:5px;
            opacity:70%;
        }
        .cart-content a{
            font-size:20px;
            color:white;
            transform:translate(320%, -104px);
            position:absolute;
            background-color:grey;
            padding-top:30px;
            padding-bottom:30px;
            padding-right:40px;
            padding-left:12px;
            border-radius:50px 0px 0px 50px;
        }
    </style>

</head>
<body onclick="close()">
    <!-- Navigation Bar -->
    <nav class="navigation">
        <div class="navigationWrapper container">
            <div class="navigationBrandlogo">
                <img src="source/BSA1.jpg" alt="">
            </div>
            <ul class="wrapFntc">
                <li>
                    <div class="cart-toggle">
                        <i class="fa-solid fa-cart-shopping" onclick="cartFunction()"></i>
                        
                    </div>
                </li>
                <li>
                    <div class="user-toggle" >
                        <i class="fa-solid fa-user" onclick="usrFunction()"></i>
                    </div>
                </li>
                <li>
                    <div class="menu-toogle" id="mnclk">
                        <input type="checkbox"/>
                        <span ></span>
                        <span ></span>
                        <span ></span>
                    </div>
                </li>
            </ul>
            <div class="cart" id="cart">
                <h3><strong>Cart</strong></h3>
                <h3 class="X" onclick="clscart()"><i class="fa-sharp fa-solid fa-xmark"></i></h3>
                
                <?php 
                    
                    if(isset($_SESSION["login"])){
                        $krnjgdb = mysqli_query($koneksi, "SELECT * FROM stock INNER JOIN `$coki` ON stock.namaBarang = $coki.namaBarang");
                        $krnjgusr = mysqli_query($koneksi, "SELECT namaBarang From $coki");
                    }
                    $k = 1;
                ?>
                <?php if(isset($_SESSION['login'])) : ?>
                    <div id="cart-ct">
                        <?php while($krnjgct = mysqli_fetch_array($krnjgdb)): ?>
                            <div class="cart-content" >
                                <button onclick="addQct<?php echo $k ?>()" class="addQct qctbtn" >+</button>
                                <button onclick="minQct<?php echo $k ?>()" class="minQct qctbtn">-</button>
                                <input type="text" value="1" class="count" id="Qct<?php echo $k; ?>">
                                <img src="product/<?php echo $krnjgct['image']?>">
                                <h5 id="crt<?php echo $k ?>"><?php echo $krnjgct["namaBarang"] ?></h5>
                                <div class="ddCvr">
                                    <select name="cars" id="cars">
                                        <option value="10cm">10cm</option>
                                        <option value="20cm">20cm</option>
                                        <option value="30cm">30cm</option>
                                        <option value="40cm">40cm</option>
                                    </select>
                                </div>
                                
                                <p>Rp.<?php echo $krnjgct["harga"] ?></p>
                                
                                <a class="rmvFrmcrt" onclick="remvcrt<?php echo $k ?>()"><i class="fa-solid fa-trash"></i></a>
                                
                                <script>
                                        function remvcrt<?php echo $k ?>(){
                                            var prdctrmv = document.getElementById("crt<?php echo $k ?>").innerHTML;
                                            document.cookie = "rmvcart=" + prdctrmv;
                                            $.get("rmvcart.php",function(data) {
                                                $("#cart-ct").html(data);
                                                
                                            });
                                        }
                                    </script>
                                    
                                    
                            </div> 
                            
                            <script>
                                
                                
                                function addQct<?php echo $k ?>(){
                                    var qctIn = document.getElementById("Qct<?php echo $k; ?>").value;
                                    var qctResult = parseInt(qctIn) + 1;
                                    document.getElementById("Qct<?php echo $k; ?>").value = qctResult;
                                }
                                function minQct<?php echo $k ?>(){
                                    var qctIn = document.getElementById("Qct<?php echo $k; ?>").value;
                                    if(parseInt(qctIn) >1){
                                        var qctResult = parseInt(qctIn) - 1;
                                        document.getElementById("Qct<?php echo $k; ?>").value = qctResult;
                                    }
                                    
                                }
                                
                                
                                
                            </script>
                            
                            
                            <?php $k++; ?>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
                <?php if(!isset($_SESSION['login'])):?>
                    <div class="cart-login">
                        <div>
                            <a class="cart-log" href="login.php">Login </a>
                        </div>
                        <div>
                            <a>Login Untuk Melihat Keranjang Belanja!</a>
                        </div>
                    </div>
                <?php endif; ?>
                
            </div>
            <div class="usrwrap">
                <div class="user-list">
                    <?php echo $logedin ?>
                </div>    
            </div>
            
            <div class="listMenu">
                <div class="listWrap">
                    <ul>
                        <!--<?php echo "<p class='user'>$usr</p>"?>-->
                        <li><a href="#home" class="active">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#product">Product</a></li>
                        <li><a href="#footer">Contact</a></li>
                        
                        <?php if(isset($_SESSION['login'])) : ?>
                            <?php if($coki = 'admin') : ?>
                                <li><a href='table.php'>DM</a></li>
                            <?php endif; ?>
                        <?php endif; ?>
                            
                    </ul>
                </div>
            </div>
           
            
        </div>
    </nav>

    <div>
        <!-- Content 1 (Image Cover) -->
        <div class="content1" id="about">
            <div class="trnsprnt-bg">
                <div class="container">
                    <div class=" ct1Text">
                        <h2>BSA X JJS</h2>
                        <p >Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima reiciendis, laboriosam vero incidunt corrupti illum ratione. In quae, maiores a blanditiis magni porro, quasi exercitationem deserunt vel dolor earum enim. Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium repellendus, sunt unde laudantium similique beatae aliquam eum consectetur consequuntur voluptas delectus omnis perspiciatis eos temporibus tenetur placeat non magni accusamus!</p>
                    </div>
                </div>
            </div>
            <div class="img-and-txt-wrapper-content1">
            </div>
        </div>
    
        <!-- content 2 about -->
        <div class="content21 container" id="about">
            <div class="row">
                <div class="text col-6">
                    <h1>About ME</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam, autem fugit. Culpa dolorum incidunt maiores voluptates eveniet, consectetur recusandae dolorem sint tenetur at enim vel tempora totam ab! Provident, nemo?
                    </p><p> 
                    ipsum dolor sit amet consectetur adipisicing elit. Id iusto, eos, ex soluta quisquam ullam veritatis consequuntur officiis possimus, ad aperiam voluptas Voluptatem.</p>
                </div>
                <div class="gambar col-6">
                    <img src="source/mgmg1.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="content22 container" id="about">
            <div class="row">
                <div class="gambar">
                    <img src="source/mgmg1.jpg" alt="">
                </div>
                <div class="text">
                    <h1>About ME</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam, autem fugit. Culpa dolorum incidunt maiores voluptates eveniet, consectetur recusandae dolorem sint tenetur at enim vel tempora totam ab! Provident, nemo?
                    </p><p> 
                    ipsum dolor sit amet consectetur adipisicing elit. Id iusto, eos, ex soluta quisquam ullam veritatis consequuntur officiis possimus, ad aperiam voluptas Voluptatem.</p>
                </div>
            </div>
        </div>
        <div class="content3 FAQ">
            <div class="row3">
                <div class="gambar3">
                    <img src="source/mgmg2.jpg" alt="">
                </div>
                <div class="text3">
                    <h1>For our safety, we must
                        keep our masks on</h1>
                    <p> live in troubled times. As such, we kindly
                        ask our dear customers to keep their masks on
                        while ordering for their safety and security.</p>
                    <h4>Other Social Distancing FAQs</h4>
                    <p><strong>Can we still visit the warehouse?</strong><br>
                        Yes! We are open from 7 AM to 7 PM.</p>
                    <p> <strong>open on weekends?</strong><br>
                        Yes! On weekends, we are open from 9 AM to 9 PM.</p>
                    <p><strong> deliver?</strong><br> 
                        Absolutely! You can find us on all mobile delivery platforms.</p>                    
                </div>
            </div>
        </div>
        <!-- Swiper -->
        <div class="swiper container-sm mySwiper" id="product">
            <div class="product">
                <h1 class="prdct"><strong>Our Product</strong></h1>
            </div>
            <div class="swiper-wrapper">
                <?php while($row = mysqli_fetch_object($result)) :?>
                    <div class="container card-wraper swiper-slide">
                        <div class="card1 card">
                            <div class="card-content">
                                <img src="product/<?php echo $row->image ?>" width="100px">
                                <h3 class="namaBarang" id="nmbrg<?php echo $i ?>" nmbrgc="<?php echo $row->namaBarang ?>"><?php echo $row->namaBarang ?></h3>
                                <br><br>
                                <p class="harga">Rp. <?php echo $row->harga ?></p>
                                
                                <button id="addCart" onclick="addCart<?php echo $i ?>()" data-id="">
                                    <i class="fa-solid fa-cart-shopping"></i></button>
                                
                                <script>
                                    function addCart<?php echo $i ?>(){
                                        var prdctadd = document.getElementById("nmbrg<?php echo $i ?>").innerHTML;
                                        document.cookie = "productName=" + prdctadd;
                                        $.get("addcart.php",function(data) {
                                            $("#cart-ct").html(data);
                                        });
                                    }
                                </script>
                                
                                        
                                        <!--<p class="chart" onclick="addCart()" name="addcart">add to chart</p>-->
                    
                            </div>
                        </div>
                    </div>
                    <?php $i++; ?>
                <?php endwhile; ?>
            </div>
        </div>
        <div id="footer">
            <div class="background-footer">
                <div class="trnsprnt-footer">
                    <div class="content-footer">
                        <div class="txt-footer">
                            <h2  >Contact Us</h2>
                            <p  >Jalan SerdaduKasbon no 3
                                <br>
                                +628156510375
                                <br>
                                Serdadupusatkasbon@gmail.com
                                <br>
                                @SerdaduKasbon</p>
                            <p class="linkmp"><strong><a href="https://goo.gl/maps/1mFz59gbkoUAb9U37">Visit our warehouse today!</a></strong></p>
                        </div>  
                        <img src="source/footer1.jpg" alt="" class="bg3-end">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="content"></div>
    
    

    <!-- Menu Toogle -->

    <script>
        const menu = document.querySelector('.menu-toogle');
        const menuToogle = document.querySelector('.menu-toogle input');
        const nav = document.querySelector('nav .navigationWrapper .listWrap');
        const userToggle = document.querySelector('.user-toggle');
        const userList = document.querySelector('.user-list');
        const cart = document.querySelector('.cart');
        
        menuToogle.addEventListener('click', function(){
            menu.classList.toggle('mActive');
            nav.classList.toggle('slide');
            userList.classList.remove("user-list-active");
            cart.classList.remove("cart-active");
        });
    
        function usrFunction(){
            userList.classList.toggle("user-list-active");
            nav.classList.remove('slide');
            menu.classList.remove('mActive');
            cart.classList.remove("cart-active");
        }
        function cartFunction(){
            userList.classList.remove("user-list-active");
            nav.classList.remove('slide');
            menu.classList.remove('mActive');
            cart.classList.toggle("cart-active");
            
        }
        function clscart(){
            cart.classList.remove("cart-active");
        }
        
    </script>
        
    <!-- aos -->

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <!-- Swiper JS item slider -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper Item Slider -->
    <script>
        var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 50,
                },
            },
        });
    </script>
</body>
</html>