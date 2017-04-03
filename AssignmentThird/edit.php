<?php
require ("includes/functions.php");
    session_start();
    if (!isset($_SESSION['admin']) || $_SESSION['admin'] != 1){
        header('Location: index.php');
        exit;
    }

    $id = "";
    $message = "";
    $firstName = "";
    $lastName = "";
    $title = "";
    $comment = "";
    $priority = 0;


    if (isset($_GET['id']) && !empty($_GET['id'])){
        $id = $_GET['id'];

        $host = 'localhost';
        $userName = 'root';
        $password = 'root';
        $database = 'second_assignment';

        if (isset($_GET['firstName']) && isset($_GET['lastName']) && isset($_GET['title']) && isset($_GET['comment']) && isset($_GET['priority'])){
            updatePost($_GET);
            $message = '<div class="bg-success alert-success btn-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Successfully updated!
                    </div>';
        }

        $link = mysqli_connect($host, $userName, $password, $database);
        $result = mysqli_query($link, "SELECT * FROM posts WHERE id='$id'");
        if(count($result) > 0){
            $post = mysqli_fetch_assoc($result);

            $firstName = $post['firstname'];
            $lastName = $post['lastname'];
            $title = $post['title'];
            $comment = $post['comment'];
            $priority = $post['priority'];
        }
        else{
            $message = '<div class="alert alert-danger text-center">
                        Post not found.
                    </div>';
        }

    } else{
        $message = '<div class="alert alert-danger text-center">
                        Empty get parameter. try again
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
                <h3 class="login-panel text-center text-muted">Edit post</h3>
                <?php echo $message; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <a href="/search.php" class="btn btn-default"><i class="fa fa-arrow-circle-left"> </i> Back</a>
                <hr/>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">


                <div class="panel panel-default">
                    <div class="panel-heading">
                        Post
                    </div>
                    <!-- /.panel-heading -->
                    <form class="panel-body" action="edit.php" method="get">

                        <div class="form-group">
                            <label>ID</label>
                            <input class="form-control" name="id" value="<?php echo $id ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label>First Name</label>
                            <input class="form-control" name="firstName" value="<?php echo $firstName ?>">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input class="form-control" name="lastName" value="<?php echo $lastName ?>">
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input class="form-control" name="title" value="<?php echo $title ?>">
                        </div>
                        <div class="form-group">
                            <label>Comment</label>
                            <textarea class="form-control" rows="5" name="comment" ><?php echo $comment ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Priority</label>
                            <select class="form-control" name="priority" >
                                <option value="1" <?php if ($priority == '1') { echo "selected"; } ?>>Important</option>
                                <option value="2" <?php if ($priority == '2') { echo "selected"; } ?>>High</option>
                                <option value="3" <?php if ($priority == '3') { echo "selected"; } ?>>Normal</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Update"/>
                        </div>

                    </form>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->

            </div>
        </div>



    </div>
</div>

</body>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>
