<?php
require('includes/functions.php');

$message = '';
if(count($_POST) > 0)
{
    if(trim($_POST['firstName']) == '' || trim($_POST['lastName']) == '' || trim($_POST['password']) == '' || trim($_POST['phoneNumber']) == '' || trim($_POST['dob']) == '')
    {
        $message = '<div class="alert alert-warning alert-dismissable text-center">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        All inputs are required!
                    </div>';
    }
    else
    {
        $userData = array_map('trim', $_POST);
        if(validate($userData)){
            $message = '<div class="alert alert-success alert-dismissable text-center">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Thank you ' . $_POST['firstName'] . ' ' . $_POST['lastName'] . '
                    </div>';

            addUser($userData);
        }
        else{
            $message = '<div class="alert alert-warning alert-dismissable text-center">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Invalid data!
                    </div>';
        }
        
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
                <h3 class="login-panel text-center text-muted"><?php echo $message; ?></h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h1 class="login-panel text-center text-muted">COMP 3015</h1>
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Create Account</h3>
                    </div>
                    <div class="panel-body">
                        <form name="signup" role="form" action="signup.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" name="firstName" placeholder="First Name" type="text" autofocus />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="lastName" placeholder="Last Name" type="text"/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="password" placeholder="Password" type="password"/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="phoneNumber" placeholder="Phone Number" type="text" />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="dob" placeholder="Date of Birth" type="text" />
                                </div>
                                <input type="submit" class="btn btn-lg btn-info btn-block" value="Sign Up!"/>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <a class="btn btn-sm btn-default" href="login.php">Login</a>
            </div>
        </div>

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
