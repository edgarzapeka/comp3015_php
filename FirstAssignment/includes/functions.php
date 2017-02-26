<?php

function moments($seconds)
{
    if($seconds < 60 * 60 * 24 * 30)
    {
        return "within the month";
    }

    return "a while ago";
}
//Bubble sorting
function sortArrayByPriority($row, $dataArray){
    $sortedArray = $dataArray;

    for($i = 0; $i < count($sortedArray); $i++){
        for($j = 0; $j < count($sortedArray) - 1 - $i; $j++){
            if ((int)$sortedArray[$j][$row] > (int)$sortedArray[$j+1][$row]){
                $tmp = $sortedArray[$j];
                $sortedArray[$j] =  $sortedArray[$j+1];
                $sortedArray[$j+1] = $tmp;
            }
        }
    }

    return $sortedArray;
}

function readFileAndSplitData($fileName){
    $dataArray = array();
    $fileName = './' . $fileName;
    $file = fopen($fileName, 'r');
    do {
        if ($line = fgets($file) ){
            $lineData = explode('|' , $line);
            if (count($lineData) === 7) {
                array_push($dataArray, $lineData);
            }
        }
        else{
            break;
        }
    } while (true);

    fclose($fileName);

    return $dataArray;
}

function checkInputValues($postArray, $filePath){

    if (preg_match('/^[a-zA-Z]+$/i',$postArray['firstName']) == false || preg_match('/^[a-zA-Z]+$/',$postArray['lastName']) == false){
        return false;
    }

    if ( preg_match('/^\d$/', $postArray['priority']) == false ){
        return false;
    }

    if( preg_match('/^[^<>|]+$/', $postArray['comment']) == false ){
        return false;
    }

    if( preg_match('/^[^<>|]+$/', $postArray['title']) == false ){
        return false;
    }

    if (exif_imagetype($filePath) != IMAGETYPE_JPEG){
        return false;
    }

    return true;
    //check image
}

function addPost($userData, $image){

    $time = time();

    move_uploaded_file($image['file']['tmp_name'], "uploads/". $time .$image['file']['name']);
    $file = fopen('posts.txt', 'a+');
    foreach ($userData as $val) {
        fwrite($file, $val . "|");
    }
    fwrite($file,  $time . $image['file']['name'] . "|");
    fwrite($file, $time);
    fwrite($file, "\n");
    fclose($file);
}

function validateSearchForm($string){

    if (preg_match('/^[a-zA-Z]+$/i',$string) == false){
        return false;
    }

    return true;

}

function findPosts($searchString){

    $resultedArray = Array();
    $postsArray = readFileAndSplitData('posts.txt');

    foreach($postsArray as $post){
        if (preg_match('/'.$searchString .'/i',$post[3]) )
        {
            array_push($resultedArray, $post);
        }
    }

    return $resultedArray;
}