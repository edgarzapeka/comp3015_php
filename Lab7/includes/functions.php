<?php
ini_set('display_errors', 'On');


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

function checkSignUp($data)
{
    $valid = false;

    // if any of the fields are missing, return an error
    if(trim($data['firstName']) == '' ||
        trim($data['lastName']) == '' ||
        trim($data['password'])  == '' ||
        trim($data['phoneNumber'])    == '' ||
        trim($data['dob']) == '')
    {
        $valid = "All inputs are required.";
    }
    elseif(!preg_match("/^[A-Z]+$/i", trim($data['firstName'])))
    {
        $valid = 'First Name needs to be alphabetical only.';
    }
    elseif(!preg_match("/^[A-Z]+$/i", trim($data['lastName'])))
    {
        $valid = 'Last Name needs to be alphabetical only';
    }
    elseif(!preg_match("/^.*([0-9]+.*[A-Z])|([A-Z]+.*[0-9]+).*$/i", trim($data['password'])))
    {
        $valid = 'Password must contain at least a number and a letter.';
    }
    elseif(!preg_match("/^((\([0-9]{3}\))|([0-9]{3}))?( |-)?[0-9]{3}( |-)?[0-9]{4}$/", trim($data['phoneNumber'])))
    {
        $valid = 'Phone Number must be in the format of (000) 000 0000.';
    }
    elseif(!preg_match("/^(JAN|FEB|MAR|APR|MAY|JUN|JUL|AUG|SEP|OCT|NOV|DEC)-[0-9]{2}-[0-9]{4}$/i", trim($data['dob'])))
    {
        $valid = 'Date of Birth must be in the format of MMM-DD-YYYY.';
    }
    else
    {
        $valid = true;
    }

    return $valid;
}

function addUser($data){

    $line  = $data['firstName'] . ',';
    $line .= $data['lastName']  . ',';
    $line .= $data['password']     . ',';
    $line .= $data['phoneNumber']   . ',';
    $line .= $data['dob']  . PHP_EOL;

    $fp = fopen("logins.txt", "a+");
    fwrite($fp, $line);
    fclose($fp);

}

function isUserLoggedIn($data){

    if (isset($data) & $data === true){

        header('Location: ' . "lab7.php");

        exit();

    }

}

function isUserExists($userPhoneNumber, $userPassword){

    $fp = fopen("logins.txt", "a+");
    while(! feof($fp)){
        $line = fgets($fp);
        list($firstName, $lastName, $password, $phoneNumber, $dob) = explode(",", $line);

        if($phoneNumber === $userPhoneNumber & $password === $userPassword) {
            fclose($fp);
            return true;
            }
    }
    fclose($fp);

    return false;

}