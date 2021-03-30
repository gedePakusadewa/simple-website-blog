<?php

    session_start(); 
    
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "personal_blog_2";

    $db = new mysqli($servername, $username, $password, $dbname);

    if ($db->connect_error) {
        die("Koneksi Gagal: " . $db->connect_error);
    }

    if(isset($pageIndex)){
        if($pageIndex == "index"){

            if(isset($_SESSION['data_preview_artikel'])){
                unset($_SESSION['data_preview_artikel']);
            }

            if(isset($_GET['next_artikel'])){

                if(isset($_SESSION['posisi_artikel'])){

                    $_SESSION['posisi_artikel'] = (int)$_SESSION['posisi_artikel'] + 3;
                    
                    getBeberapaPreviewArtikel( $_SESSION['posisi_artikel'], 3); 
                    
                }
            }else if(isset($_GET['previous_artikel'])){

                if(isset($_SESSION['posisi_artikel'])){
                        
                    $_SESSION['posisi_artikel'] = (int)$_SESSION['posisi_artikel'] - 3;
                    
                    getBeberapaPreviewArtikel( $_SESSION['posisi_artikel'], 3);
 
                }
            }else{
                //getDataPreviewArtikel();
                $_SESSION['posisi_artikel'] = 0;
                getBeberapaPreviewArtikel( $_SESSION['posisi_artikel'], 3);
            }

            getPopulerArtikel();
        }
    }

    function getBeberapaPreviewArtikel($dariBaris, $jumlahBaris){
        global $db;

        $_SESSION['ujung_preview_artikel'] = FALSE;
        $_SESSION['previous_preview_artikel'] = FALSE;

        $id_baris = str_replace(" ", "", $dariBaris);
        $id_jumlah = str_replace(" ", "", $jumlahBaris);

        $dta_baris_gDPA = getDataBaris("SELECT id FROM preview_artikel 
            ORDER BY id DESC LIMIT $id_jumlah OFFSET $id_baris");

        if($id_jumlah > count($dta_baris_gDPA)){
            $_SESSION['ujung_preview_artikel'] = TRUE;
        }elseif($id_baris == 0){
            $_SESSION['previous_preview_artikel'] = TRUE;
        }   

        for($i = 0; $i < count($dta_baris_gDPA); $i++){

            $id_gDPA = $dta_baris_gDPA[$i];

            $data_gDPA = runQuery("SELECT id, judul, kode_artikel, tanggal, isi_artikel, 
                gambar_artikel FROM preview_artikel WHERE id = '$id_gDPA' ");
        
            $array_data_gDPA = array(
                $data_gDPA[0]['kode_artikel']
                    =>array('id'=>$data_gDPA[0]['id'],
                            'judul'=>$data_gDPA[0]['judul'], 
                            'kode_artikel'=>$data_gDPA[0]['kode_artikel'],                           
                            'tanggal'=>$data_gDPA[0]['tanggal'],
                            'isi_artikel'=>$data_gDPA[0]['isi_artikel'], 
                            'gambar_artikel'=>$data_gDPA[0]['gambar_artikel']
                    )
            );

            if(!isset($_SESSION['data_preview_artikel'])){
                $_SESSION['data_preview_artikel'] = $array_data_gDPA;
            }else{
                $_SESSION['data_preview_artikel'] = array_merge($_SESSION['data_preview_artikel'] 
                    , $array_data_gDPA);
            }
        }

    }

    function getPopulerArtikel(){
        global $db;
        unset($_SESSION['data_populer_artikel']);
        $tmp_data = array();
        $id_data = array();

        $dta_baris_gDPA = getDataBaris("SELECT id FROM aktivitas_artikel ORDER BY id_artikel DESC LIMIT 6");

        for($i = 0; $i < count($dta_baris_gDPA); $i++){
            $id_gDPA = $dta_baris_gDPA[$i];
            $data_gDPA = runQuery("SELECT id, id_artikel, share_poin, komen_poin FROM aktivitas_artikel 
                WHERE id = '$id_gDPA' ");
            
            $array_data_gDPA = array(
                $data_gDPA[0]['id']
                    =>array('id'=>$data_gDPA[0]['id'],
                            'id_artikel'=>$data_gDPA[0]['id_artikel'], 
                            'share_poin'=>$data_gDPA[0]['share_poin'],                           
                            'komen_poin'=>$data_gDPA[0]['komen_poin']
                    )
            );
            
            if(!isset($tmp_data)){
                $tmp_data = $array_data_gDPA;
            }else{
                $tmp_data = array_merge($tmp_data, $array_data_gDPA);
            }
            
        }

        //sort share_poin dari besar ke kecil        
        usort($tmp_data, function($a, $b) {
            return $a['share_poin'] < $b['share_poin'];
        });

        $incre = 0;
        foreach($tmp_data as $dta){
            if($incre != 3){
                $id_data[$incre] = $dta['id_artikel'];
            }else{
                break;
            }
            $incre++;
        }

        for($i = 0; $i < count($id_data); $i++){

            $id_gDPA = $id_data[$i];

            $data_gDPA = runQuery("SELECT id, judul, kode_artikel, tanggal, gambar_artikel FROM preview_artikel 
                WHERE id = '$id_gDPA' ");
        
            $array_data_gDPA = array(
                $data_gDPA[0]['kode_artikel']
                    =>array('id'=>$data_gDPA[0]['id'],
                            'judul'=>$data_gDPA[0]['judul'], 
                            'kode_artikel'=>$data_gDPA[0]['kode_artikel'],                           
                            'tanggal'=>$data_gDPA[0]['tanggal'],
                            'gambar_artikel'=>$data_gDPA[0]['gambar_artikel']
                    )
            );

            if(!isset($_SESSION['data_populer_artikel'])){
                $_SESSION['data_populer_artikel'] = $array_data_gDPA;
            }else{
                $_SESSION['data_populer_artikel'] = array_merge($_SESSION['data_populer_artikel'] 
                    , $array_data_gDPA);
            }
        }

    }

    function getDataPreviewArtikel(){
        global $db;
        
        $dta_baris_gDPA = getDataBaris("SELECT id FROM preview_artikel ORDER BY id DESC LIMIT 3");

        for($i = 0; $i < count($dta_baris_gDPA); $i++){
            $id_gDPA = $dta_baris_gDPA[$i];
            $data_gDPA = runQuery("SELECT id, judul, kode_artikel, tanggal, isi_artikel, gambar_artikel FROM preview_artikel 
                WHERE id = '$id_gDPA' ");
        
            $array_data_gDPA = array(
                $data_gDPA[0]['kode_artikel']
                    =>array('id'=>$data_gDPA[0]['id'],
                            'judul'=>$data_gDPA[0]['judul'], 
                            'kode_artikel'=>$data_gDPA[0]['kode_artikel'],                           
                            'tanggal'=>$data_gDPA[0]['tanggal'],
                            'isi_artikel'=>$data_gDPA[0]['isi_artikel'], 
                            'gambar_artikel'=>$data_gDPA[0]['gambar_artikel']
                    )
            );

            if(!isset($_SESSION['data_preview_artikel'])){
                $_SESSION['data_preview_artikel'] = $array_data_gDPA;
            }else{
                $_SESSION['data_preview_artikel'] = array_merge($_SESSION['data_preview_artikel'] 
                    , $array_data_gDPA);
            }
        }

    }

    function runQuery($query) {
        global $db;
        $result = mysqli_query($db,$query);
        
		while($row = mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
        }
        		
		if(!empty($resultset)){
            return $resultset;
        }
            
    }

    function getDataBaris($sql_gDB){
        global $db;

        //$sql_admin = "SELECT id FROM tour_bulan_skedul";

        $result_gDB = $db->query($sql_gDB);
        $array_list_gDB = [];
        $incre = 0;

        if ($result_gDB->num_rows > 0) {
            while($row_gDB = $result_gDB->fetch_assoc()) {
                    $array_list_gDB[$incre] =  $row_gDB['id'];
                    $incre = $incre + 1;
            }
        }
        return $array_list_gDB;
    }

    $db->close();
?>