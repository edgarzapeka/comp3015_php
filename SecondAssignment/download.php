<?php
    if (isset($_GET['filename']) &&  !empty($_GET['filename'])){
        if(file_exists('uploads/'.$_GET['filename'])){
            header('Content-Type: image/jpeg');
            header("Content-Disposition: attachment; filename=" . $_GET['filename'] . "");
            $img = imagecreatefromjpeg("uploads/".$_GET['filename']);
            imagejpeg($img);
            //echo $im;
            //readfile("uploads/".$_GET['filename']);
            exit;
        }
        //echo $_GET['filename'];
    }
    else{
        echo "<h1>Error. Image not found</h1>";
    }