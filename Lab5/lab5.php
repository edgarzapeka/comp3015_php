<?php

require ("includes/functions.php");

$message = '';
$posts = getPosts();

if(count($_POST) > 0)
{
    if(!checkInput($_POST))
    {
        $message = '<div class="alert alert-warning alert-dismissable text-center">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        All inputs are required!
                    </div>';
    }
    else
    {
        $fileDestination = 'uploads/' . $_FILES['file']['name'];

        move_uploaded_file($_FILES['file']['tmp_name'], $fileDestination);

        $data['firstName']  = trim($_POST['firstName']);
        $data['lastName']   = trim($_POST['lastName']);
        $data['title']      = trim($_POST['title']);
        $data['comment']    = trim($_POST['comment']);
        $data['priority']   = trim($_POST['priority']);
        $data['filename']   = $_FILES['file']['name'];

        saveInput($data);

        $message = '<div class="alert alert-success alert-dismissable text-center">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Thank you ' . $_POST['firstName'] . ' ' . $_POST['lastName'] . '! ' . date('F dS, Y', time()).'.
                    </div>';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>COMP 3015</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<div id="wrapper">

    <div class="container">

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h3 class="login-panel text-center text-muted">It is now <?php echo date('l F \t\h\e dS, Y'); ?></h3>
                <?php echo $message; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <button class="btn btn-default" data-toggle="modal" data-target="#newPost">New Post</button>
                <hr/>
            </div>
        </div>

        <?php
        foreach($posts as $post)
        {
            $words = preg_split("/,/", $post);

            $author     = trim($words[0]) . ' ' . trim($words[1]);
            $title      = trim($words[2]);
            $comment    = trim($words[3]);
            $priority   = trim($words[4]);
            $filename   = trim($words[5]);
            $postedTime = trim($words[6]);

            $moment                 = moments(time() - $postedTime);
            $formattedCurrentTime   = date('l F \t\h\e dS, Y', time());
            $formattedPostedTime    = date('l F \t\h\e dS, Y', $postedTime);
            $formattedAuthor        = ucwords(strtolower($author));

            echo '
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <span>
                                    '.$title. '
                                </span>
                                <span class="pull-right text-muted">
                                '.$moment.'
                                </span>
                            </div>
                            <div class="panel-body">
                                <p class="text-muted">Posted on
                                    '.$formattedPostedTime.'
                                </p>
                                <p>
                                    '.$comment.'
                                </p>
                                <div class="img-box">
                                    <img class="img-thumbnail img-responsive" src="uploads/'.$filename.'"/>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <p> By
                                    ' . $formattedAuthor .'
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            ';
        }
        ?>

    </div>
</div>

<div id="newPost" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
    <form role="form" method="post" action="lab5.php" enctype="multipart/form-data">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">New Post</h4>
        </div>
        <div class="modal-body">
                <div class="form-group">
                    <input class="form-control" placeholder="First Name" name="firstName">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Last Name" name="lastName">
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input class="form-control" placeholder="" name="title">
                </div>
                <div class="form-group">
                    <label>Comment</label>
                    <textarea class="form-control" rows="3" name="comment"></textarea>
                </div>
                <div class="form-group">
                    <label>Priority</label>
                    <select class="form-control" name="priority">
                        <option value="1">Important</option>
                        <option value="2">High</option>
                        <option value="3">Normal</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="file" />
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Post!"/>
        </div>
    </div><!-- /.modal-content -->
    </form>
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
