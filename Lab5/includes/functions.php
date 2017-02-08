<?php

function moments($seconds)
{
    if($seconds < 60 * 60 * 24 * 30)
    {
        return "within the month";
    }

    return "a while ago";
}

function checkInput($input)
{
    if(trim($input['firstName']) == '' ||
        trim($input['lastName']) == '' ||
        trim($input['title'])    == '' ||
        trim($input['comment'])  == '' ||
        trim($input['priority']) == '')
    {
        return false;
    }

    return true;
}

function saveInput($data)
{
    $line  = $data['firstName'] . ',';
    $line .= $data['lastName']  . ',';
    $line .= $data['title']     . ',';
    $line .= $data['comment']   . ',';
    $line .= $data['priority']  . ',';
    $line .= $data['filename']  . ',';
    $line .= time();
    $line .= PHP_EOL;

    $fp = fopen("posts.txt", "a+");
    fwrite($fp, $line);
    fclose($fp);
}

function getPosts()
{
    $posts = [];

    if(file_exists("posts.txt"))
    {
        $posts = file("posts.txt");
    }

    return $posts;
}


function validate($postArray){
    if (preg_match('/^[a-zA-Z]+$/i',$postArray['firstName']) == false || preg_match('/^[a-zA-Z]+$/',$postArray['lastName']) == false){
        return false;
    }
    if (preg_match('/^([a-zA-Z]|\d)+[a-zA-Z]?[0-9]?(\w|\d)+$/', $postArray['password']) == false) {
        return false;
    }
    if(preg_match('/^[\(]?[0-9]{3}[\)]?[\s|\-]?[0-9]{3}[\s|\-]?([0-9]{4}|[0-9])$/', $postArray['phoneNumber']) == false){
        return false;
    }
    if (preg_match('/^[A,D,J,M,K,N,O,S,F][A-Z][A-Z][\-](((0|1|2)[0-9])|[3][0,1])[\-](19|20)[0-9]{2}$/', $postArray['dob']) == false) {
        return false;
    }
    return true;
}

function addUser($userData){

    $user = "".$userData['firstName']."|".$userData['lastName']."|".$userData['password']."|".$userData['phoneNumber']."|".$userData['dob']."\n";
            $file = fopen("users.txt",'a+');
            fwrite($file, $user );
            fclose($file);
}

function logIn($phoneNumber, $password){
    $file = fopen("users.txt", "r");
            while (($line = fgets($file)) !== false) {
                if($phoneNumber == $userData[3] && $password == $userData[2]){
                    $message = "Hello, " . $userData[0] . " " . $userData[1];
                    fclose($file);
                    return $message;
                }
            }
    fclose($file);
    return " ";
}
