<?php
date_default_timezone_set('America/Vancouver');
require ("includes/functions.php");

// do not modify these variables
$postedTime = 1481808630;
$author = "   gary TonG  ";
$content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.";

// modify these variables
$formattedAuthor        = trim(ucwords(strtolower($author)));
$formattedCurrentTime   = date('l F \t\h\e dS, Y', time());
$formattedPostedTime    = date('l F \t\h\e dS, Y', $postedTime);
$moment                 = moments(time() - $postedTime);
$title = 'First Post!';
$image = 'nyc.jpg';

$message = '';
if(count($_POST) > 0)
{
    if(trim($_POST['firstName']) == '' || trim($_POST['lastName']) == '' || trim($_POST['comment']) == '' || trim($_POST['priority']) == '')
    {
        $message = '<div class="alert alert-warning alert-dismissable text-center">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        All inputs are required!
                    </div>';
    }
    else
    {
        $message = '<div class="alert alert-success alert-dismissable text-center">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Thank you ' . $_POST['firstName'] . ' ' . $_POST['lastName'] . '! .
                        ' . date('F dS, Y', time()).'.
                    </div>';
        $time = time();
        move_uploaded_file($_FILES['file']['tmp_name'], "uploads/".$_FILES['file']['name']);
        $file = fopen('posts.txt', 'a+');
        foreach ($_POST as $val) {
            $val = str_replace(',', ' ', $val); 
            fwrite($file, $val . ",");
        }
        fwrite($file, $_FILES['file']['name'] . ",");
        fwrite($file, $time);
        fwrite($file, "\n");
        fclose($file);

    }
}


$arrayReadyToPrint = bubbleSort(4, readFileAndSplitData('posts.txt'));
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
            <div class="locol-md-6 col-md-offset-3">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h3 class="login-panel text-center text-muted">It is now <?php echo $formattedCurrentTime; ?></h3>
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
        $counter = 0;
        do { 
            ?>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <span>
                            <? echo $title; ?>
                        </span>
                        <span class="pull-right text-muted">
                            <?php echo $moment; ?>
                        </span>
                    </div>
                    <div class="panel-body">
                        <p class="text-muted">Posted on
                            <?php echo $formattedPostedTime; ?>
                        </p>
                        <p>
                            <?php echo $content; ?>
                        </p>
                        <div class="img-box">
                            <img class="img-thumbnail img-responsive" src="<?php echo "uploads/$image" ?>" />
                        </div>
                    </div>
                    <div class="panel-footer">
                        <p> By
                            <?php echo $formattedAuthor; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            $firstName = $arrayReadyToPrint[$counter][0];
            $lastName = $arrayReadyToPrint[$counter][1];
            $title = $arrayReadyToPrint[$counter][2];
            $content = $arrayReadyToPrint[$counter][3];
            $priority = $arrayReadyToPrint[$counter][4];
            $image = $arrayReadyToPrint[$counter][5];
            $time = $arrayReadyToPrint[$counter][6];

            $autror = $firstName . $lastName;
            $formattedAuthor        = trim(ucwords(strtolower($firstName . " " . $lastName)));
            $formattedPostedTime = date('l F \t\h\e dS, Y', $time);
            $moment = moments(time() - $time);
            } while($counter++ < count($arrayReadyToPrint)); 
            ?>
    </div>
</div>
<div id="newPost" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
    <form role="form" method="post" action="lab4.php" enctype="multipart/form-data">
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
