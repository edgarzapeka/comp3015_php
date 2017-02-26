<?php
    require ("includes/functions.php");

    $message = " ";
    $listOfPosts = null;

    if (count($_POST) > 0){
        if(trim($_POST['firstName']) == '' || trim($_POST['lastName']) == '' || trim($_POST['comment']) == '' || trim($_POST['priority']) == '')
        {
            $message = '<div class="alert alert-warning alert-dismissable text-center">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        All inputs are required!
                    </div>';
        }
        else{
            if (checkInputValues($_POST, $_FILES['file']['tmp_name'])){

                $message = '<div class="alert alert-success alert-dismissable text-center">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Thank you ' . $_POST['firstName'] . ' ' . $_POST['lastName'] . '! .
                        ' . date('F dS, Y', time()).'.
                    </div>';

                //add user
                addPost($_POST, $_FILES);
            }
            else{
                $message = '<div class="alert alert-warning alert-dismissable text-center">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        ERROR. Data are invalid
                    </div>';
            }
        }


    }


    if (file_exists('./posts.txt')){
        $listOfPosts = SortArrayByPriority(4, readFileAndSplitData('posts.txt'));
    }
    else{
        $message = '<div class="alert alert-warning alert-dismissable text-center">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        ERROR. File \'posts.txt\' doesn\'t exists
                    </div>';
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
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h3 class="login-panel text-center text-muted"><?php echo $message;?></h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h3 class="login-panel text-center text-muted">It is now <?php echo date('l F \t\h\e dS, Y', time());?></h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <button class="btn btn-default" data-toggle="modal" data-target="#newPost"><i class="fa fa-comment"></i> New Post</button>
                <a href="search.php" class="btn btn-default"><i class="fa fa-search"> </i> Search</a>
                <hr/>
            </div>
        </div>

        <?php
            $counter = 0;
            while ($counter < count($listOfPosts)) {
                $firstName = trim($listOfPosts[$counter][0]);
                $lastName = trim($listOfPosts[$counter][1]);
                $title = trim($listOfPosts[$counter][2]);
                $content = trim($listOfPosts[$counter][3]);
                $priority = trim($listOfPosts[$counter][4]);
                $image = trim($listOfPosts[$counter][5]);
                $time = trim($listOfPosts[$counter][6]);

                $panelColor;
                switch ($priority){
                    case 1:
                        $panelColor = "panel-danger";
                        break;
                    case 2:
                        $panelColor = "panel-warning";
                        break;
                    default:
                        $panelColor = "panel-info";
                        break;

                }

                $formattedAuthor = trim(ucwords(strtolower($firstName . " " . $lastName)));
                $formattedPostedTime = date('l F \t\h\e dS, Y', $time);
                $moment = moments(time() - $time);

                $counter++;
                ?>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel <?php echo $panelColor ?>">
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
                                    <img class="img-thumbnail img-responsive" src="<?php echo "uploads/$image" ?>"/>
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
            }
        ?>



<div id="newPost" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
    <form role="form" method="post" action="index.php" enctype="multipart/form-data">
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

</body>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>
