<?php

function moments($seconds)
{
    if($seconds < 60 * 60 * 24 * 30)
    {
        return "within the month";
    }

    return "a while ago";
}

function getPosts()
{
    $host = 'localhost';
    $userName = 'root';
    $password = 'root';
    $database = 'second_assignment';

    $link = mysqli_connect($host, $userName, $password, $database);
    $result = mysqli_query($link, 'SELECT id, firstname, lastname, title, comment, priority, filename, time FROM posts');

    $posts = [];



    $importantPriority  = [];
    $highPriority       = [];
    $normalPriority     = [];

    while($line = mysqli_fetch_assoc($result))
    {
        $post = validatePost(implode("|", $line));
        if($post != false)
        {
            switch($post['priority'])
            {
                case 3;
                    array_push($normalPriority, $post);
                    break;
                case 2;
                    array_push($highPriority, $post);
                    break;
                case 1;
                    array_push($importantPriority,$post);
                    break;
            }
        }
    }

    $posts = array_merge($importantPriority, $highPriority, $normalPriority);

    mysqli_close($link);
    return $posts;
}

function searchPosts($term)
{
    $posts = [];
    $host = 'localhost';
    $userName = 'root';
    $password = 'root';
    $database = 'second_assignment';

    $link = mysqli_connect($host, $userName, $password, $database);
    $result = mysqli_query($link, 'SELECT id, firstname, lastname, title, comment, priority, filename, time FROM posts');


    $importantPriority = [];
    $highPriority   = [];
    $normalPriority = [];



    while($line = mysqli_fetch_assoc($result))
    {

        $post = validatePost(implode("|", $line));
        if($post != false && strpos($post['comment'], $term) != false)
        {
            switch($post['priority'])
            {
                case 3;
                    array_push($normalPriority, $post);
                    break;
                case 2;
                    array_push($highPriority, $post);
                    break;
                case 1;
                    array_push($importantPriority,$post);
                    break;
            }
        }
    }

    $posts = array_merge($importantPriority, $highPriority, $normalPriority);

    mysqli_close($link);
    return $posts;
}

function validatePost($post)
{
    $valid = [];

    $fields = preg_split("/\|/", $post);

    if(count($fields) == 8)
    {
        $id = $fields[0];
        $firstName  = trim($fields[1]);
        $lastName   = trim($fields[2]);
        $title      = trim($fields[3]);
        $comment    = trim($fields[4]);
        $priority   = trim($fields[5]);
        $filename   = trim($fields[6]);
        $time       = trim($fields[7]);

        if($firstName == '' ||
            $lastName == '' ||
            $title    == '' ||
            $comment  == '' ||
            $priority == '' ||
            $filename == '' ||
            $time     == '')
        {
            $valid = false;
        }
        elseif(!file_exists('uploads/'.$filename))
        {
            $valid = false;
        }
        else
        {
            $valid['firstName'] = $firstName;
            $valid['lastName']  = $lastName;
            $valid['title']     = $title;
            $valid['comment']   = $comment;
            $valid['priority']  = $priority;
            $valid['filename']  = $filename;
            $valid['time']      = $time;
            $valid['id'] = $id;
        }
    }

    return $valid;
}

function filterPost($post)
{
    $author     = trim($post['firstName']) . ' ' . trim($post['lastName']);
    $title      = trim($post['title']);
    $comment    = trim($post['comment']);
    $priority   = trim($post['priority']);
    $filename   = trim($post['filename']);
    $postedTime = trim($post['time']);

    $filteredPost['id'] = $post['id'];
    $filteredPost['author']     = ucwords(strtolower($author));
    $filteredPost['moment']     = moments(time() - $postedTime);
    $filteredPost['title']      = trim($title);
    $filteredPost['comment']    = trim($comment);
    $filteredPost['priority']   = trim($priority);
    $filteredPost['filename']   = trim($filename);
    $filteredPost['postedTime'] = date('l F \t\h\e dS, Y', $postedTime);
    $filteredPost['searchResultsPostedTime'] = date('M d, \'y', $postedTime);

    return $filteredPost;
}

function validateFields($input)
{
    $valid = [];

    $firstName  = trim($input['firstName']);
    $lastName   = trim($input['lastName']);
    $title      = trim($input['title']);
    $comment    = trim($input['comment']);
    $priority   = trim($input['priority']);

    if($firstName == '' ||
        $lastName == '' ||
        $title    == '' ||
        $comment  == '' ||
        $priority == '' )
    {
        $valid = false;
    }
    elseif(!preg_match("/^[A-Z]+$/i", $firstName) || !preg_match("/^[A-Z]+$/i", $lastName) || !preg_match("/^[A-Z]+$/i", $title))
    {
        $valid = false;
    }
    elseif(preg_match("/<|>/", $comment))
    {
        $valid = false;
    }
    elseif(!preg_match("/^[0-9]{1}$/i", $priority))
    {
        $valid = false;
    }
    else
    {
        $valid['firstName'] = $firstName;
        $valid['lastName'] = $lastName;
        $valid['title'] = $title;
        $valid['comment'] = $comment;
        $valid['priority'] = $priority;
    }

    return $valid;
}

function isValidFile($fileInfo)
{
    if($fileInfo['type'] == 'image/jpeg')
    {
        return true;
    }

    return false;
}

function isValidSearchTerm($term)
{
    if(preg_match("/^[A-Z]+$/i", $term))
    {
        return true;
    }

    return false;
}

function insertPost($data)
{
    // md5 is a hashing function http://php.net/manual/en/function.md5.php
    $fileName = md5(time().$data['firstName'].$data['lastName']) . '.jpg';

    move_uploaded_file($data['file'], 'uploads/'.$fileName);

    $line = PHP_EOL;
    $line .= $data['firstName'] . '|';
    $line .= $data['lastName']  . '|';
    $line .= $data['title']     . '|';
    $line .= $data['comment']   . '|';
    $line .= $data['priority']  . '|';
    $line .= $fileName          . '|';
    $line .= time();

    $fp = fopen('posts.txt', 'a+');
    fwrite($fp, $line);
    fclose($fp);
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

function redirectToMainPage($flag){

    if($flag){
        header('Location: index.php');
        exit;
    }
}

function updatePost($post){

    $host = 'localhost';
    $userName = 'root';
    $password = 'root';
    $database = 'second_assignment';

    $link = mysqli_connect($host, $userName, $password, $database);

    $id = $post['id'];
    $firstName = $post['firstName'];
    $lastName = $post['lastName'];
    $title = $post['title'];
    $comment = $post['comment'];
    $priority = $post['priority'];

    $result = mysqli_query($link, "UPDATE posts SET firstname='$firstName', lastname='$lastName', title='$title', comment='$comment', priority='$priority' WHERE id='$id';");

}