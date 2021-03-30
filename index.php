<?php

    $infoIndex = pathinfo( __FILE__ );
    $pageIndex = $infoIndex['filename'];

    include('standar_function.php');

?>

<!DOCTYPE html>
<html>
    <title>Personal Blog Ku</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/main.css" />
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

        <?php
        
        //var_dump($_SESSION['posisi_artikel']);
            if(isset($_SESSION['data_preview_artikel'])){
                foreach($_SESSION['data_preview_artikel'] as $artikel){
                    echo"
                    <div class=\"w3-card-4 w3-margin w3-white\">
                        <img src=\"".$artikel['gambar_artikel']."\" alt=\"Nature\" style=\"width:100%\">
                        <div class=\"w3-container\">
                            <h3><b>".$artikel['judul']."</b></h3>
                            <h5><span class=\"w3-opacity\">".$artikel['tanggal']."</span></h5>
                        </div>
            
                        <div class=\"w3-container\">
                            <p>".$artikel['isi_artikel']."</p>
                            <div class=\"w3-row\">
                                <div class=\"w3-col m6 s12\">
                                    <p><a href=\"artikel/".$artikel['id']."_".str_replace(" ", "_", $artikel['judul']).".php\"><button class=\"w3-button w3-padding-large w3-white w3-border\">
                                            <b>Lanjutkan »</b></button></a></p>
                                </div>
                                <div class=\"w3-col m3 w3-hide-small\">
                                    <p><span class=\"w3-padding-large w3-right\"><b>Share  </b> <span class=\"w3-tag\">9</span></span></p>
                                </div>
                                <div class=\"w3-col m3 w3-hide-small\">
                                    <p><span class=\"w3-padding-large w3-right\"><b>Comments  </b> <span class=\"w3-tag\">4</span></span></p>
                                </div>
                            </div>
                        </div>
                    </div>";
                }
            }
        
        ?>

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
                            <img src=\"".$artikelPopuler['gambar_artikel']."\" alt=\"Image\" 
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
    
    <?php

    //<a href="index.php?previous_artikel=3"><button class="w3-button w3-black w3-padding-large w3-margin-bottom">Previous</button></a>
        $prev = "";
        $next = "";

        if(isset($_SESSION['previous_preview_artikel'])){
            
            if($_SESSION['previous_preview_artikel'] == TRUE){
                //echo "<button class=\"w3-button w3-black w3-padding-large
                  //      w3-disabled w3-margin-bottom\">Previous</button>";
                $prev = "<button class=\"w3-button w3-black w3-padding-large
                        w3-disabled w3-margin-bottom\">Previous</button>";
            }else{
                $prev = "<a href=\"index.php?previous_artikel=3\" ><button class=\"w3-button w3-black w3-padding-large
                        w3-margin-bottom\">Previous</button><a>";
            }
        }else{
            //echo "<a href=\"index.php?previous_artikel=3\" ><button class=\"w3-button w3-black w3-padding-large
              //          w3-margin-bottom\">Previous</button><a>";
            $prev = "<a href=\"index.php?previous_artikel=3\" ><button class=\"w3-button w3-black w3-padding-large
                        w3-margin-bottom\">Previous</button><a>";
        }
    ?>

    <?php
        if(isset($_SESSION['ujung_preview_artikel'])){
            
            if($_SESSION['ujung_preview_artikel'] == TRUE){
                //echo "<button class=\"w3-button w3-black w3-padding-large
                //        w3-disabled w3-margin-bottom\">Next »</button>";
                $next = "<button class=\"w3-button w3-black w3-padding-large
                        w3-disabled w3-margin-bottom\">Next »</button>";
            }else{
                $next = "<a href=\"index.php?next_artikel=3\" ><button class=\"w3-button w3-black w3-padding-large
                        w3-margin-bottom\">Next »</button><a>";
            }
        }else{
            //echo "<a href=\"index.php?next_artikel=3\" ><button class=\"w3-button w3-black w3-padding-large
            //            w3-margin-bottom\">Next »</button><a>";
            $next = "<a href=\"index.php?next_artikel=3\" ><button class=\"w3-button w3-black w3-padding-large
                        w3-margin-bottom\">Next »</button><a>";
        }

        echo $prev;
        echo $next;
    ?>
    
    </footer>

    </body>
</html>
