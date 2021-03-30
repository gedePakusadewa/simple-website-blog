<?php

    $infoIndex = pathinfo( __FILE__ );
    $pageIndex = $infoIndex['filename'];

    include('../standar_function.php');

?>

<!DOCTYPE html>
<html>
    <title>Personal Blog Ku</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway" />
    <style>
        body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
    </style>

    <body class="w3-light-grey">

    <!-- w3-content defines a container for fixed size centered content, 
    and is wrapped around the whole page content, except for the footer in this example -->
    <div class="w3-content" style="max-width:1400px">

    <!-- Header -->
    <header class="w3-container w3-center w3-padding-32"> 
        <h1><b>My Journey</b></h1>
        <p>Welcome to the blog of <span class="w3-tag">Ulala</span></p>
    </header>

    <!-- Grid -->
    <div class="w3-row">

    <!-- Blog entries -->
    <div class="w3-col l8 s12">
    <!-- Blog entry -->

    <div class="w3-card-4 w3-margin w3-white">
            <img src= "../img/besakih7.jpg" alt= "Nature " style= "width:100% ">
            <div class= "w3-container ">
                <h3><b>GUNUNG PURA</b></h3>
                <h5><span class= "w3-opacity ">12 Juli 2019</span></h5>
            </div>

            <div class= "w3-container ">
                <p>Diharapkan, melalui pelaksanaan upacara yang dilaksanakan setiap Purnama Sasih 
                Karo ini mampu menjaga keseimbangan Jagat Bali dan memohon anugrah-Nya. “Melalui 
                upacara ini kita memohon keselamatan dan keseimbangan alam beserta isinya,” ujar 
                Bupati Suwirta.</p>
                <p>Pihak pengelola mengusulkan penataan dengan membangun gedung parkir baru untuk 
                menambah daya tampung. Usulan ini disampaikan ke Kementerian Pekerjaan Umum dan 
                Perumahan Rakyat (PUPR).</p>
                <p>Ada 3 usulan yang disampaikan. Pertama, aksesibilitas dari dan menuju pura 
                dengan memperlebar jalan yang sudah ada, menambah jalan baru, serta mengatur lalu 
                lintas satu arah.</p>
                <p>"Kalau dari usulan, ada jalan yang diperlebar 16 kilometer, ada juga jalan baru
                    hampir 1 kilometer dan menata traffic management jadi satu arah," kata Direktur 
                    Jenderal Cipta Karya Kementerian PUPR, Danis H. Sumadilaga di kawasan 
                    Pura Besakih.</p>
                <p>Kedua, pembangunan gedung parkir baru di lahan seluas dua hektare. Rencananya,
                    gedung sanggup menampung 2043 mobil, 4000 motor dan 117 bus. Ketiga, penataan 
                    pedagang yang berada di sepanjang jalan menuju pura. "Ini menata tanpa mengusir.
                    Kita relokasi dan kita siapkan kawasan untuk pedagan," paparnya.</p>
                <p>Namun, Kementerian PUPR tidak serta merta menerima usulan tersebut. Danis 
                mengatakan pihaknya akan mempelajari terlebih dahulu permintaan tersebut.</p>
                <p>"Ini baru sebatas usulan. Saya lihat ke lapangan supaya lebih paham mana yang 
                ingin menjadi prioritas, apakah kondisi lapangannya memungkinkan atau tidak," 
                ujarnya.</p>
                <div class= "w3-row ">
                    <div class= "w3-col m9 w3-hide-small ">
                        <p><span class= "w3-padding-large w3-right "><b>Share  </b> <span class= "w3-tag ">9</span></span></p>
                    </div>
                    <div class= "w3-col m3 w3-hide-small ">
                        <p><span class= "w3-padding-large w3-right "><b>Comments  </b> <span class= "w3-tag ">4</span></span></p>
                    </div>
                </div>
            </div>
        </div>

    <!-- END BLOG ENTRIES -->
    </div>

    <!-- Introduction menu -->
    <div class="w3-col l4">
    <!-- About Card -->
    <div class="w3-card w3-margin w3-margin-top">
        <div class="w3-container w3-white">
            <h4><b>My Name</b></h4>
            <p>Just me, myself and I, exploring the universe of 
                uknownment. I have a heart of love and a interest of 
                lorem ipsum and mauris neque quam blog. I want to share my world with you.</p>
        </div>
    </div><hr>
    
    <!-- Posts -->
    <div class="w3-card w3-margin">
        <div class="w3-container w3-padding">
        <h4>Artikel Populer</h4>
        </div>
        <ul class="w3-ul w3-hoverable w3-white">
        
            <?php
                if(isset($_SESSION['data_populer_artikel'])){
                    foreach($_SESSION['data_populer_artikel'] as $artikelPopuler){
                        echo "
                        <li class=\"w3-padding-16\">
                            <img src=\"../".$artikelPopuler['gambar_artikel']."\" alt=\"Image\" 
                                class=\"w3-left w3-margin-right\" style=\"width:50px\" />
                            <span class=\"w3-large\">".$artikelPopuler['judul']."</span><br>
                            <span>".$artikelPopuler['tanggal']."</span>
                        </li>";
                    }
                }else{
                    echo "Tidak ada berita populer";
                }
            ?> 
        </ul>
    </div>
    <hr> 
    
    <!-- Labels / tags -->
    <div class="w3-card w3-margin">
        <div class="w3-container w3-padding">
        <h4>Tags</h4>
        </div>
        <div class="w3-container w3-white">
        <p><span class="w3-tag w3-black w3-margin-bottom">Travel</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">New York</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">London</span>
        <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">IKEA</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">NORWAY</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">DIY</span>
        <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Ideas</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Baby</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Family</span>
        <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">News</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Clothing</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Shopping</span>
        <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Sports</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Games</span>
        </p>
        </div>
    </div>
    
    <!-- END Introduction Menu -->
    </div>

    <!-- END GRID -->
    </div><br>

    <!-- END w3-content -->
    </div>

    <!-- Footer -->
    <footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
    
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
    </footer>

    </body>
</html>
