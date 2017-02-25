<?php

require ("includes/functions.php");
$message = '';

if(count($_POST) > 0)
{
    $check = checkSignUp($_POST);
    setcookie("firstName", $_POST['firstName']);
    setcookie("lastName", $_POST['lastName']);
    setcookie("phoneNumber", $_POST['phoneNumber']);
    setcookie("dob", $_POST['dob']);

    if($check === true)
    {
        $message = '<div class="alert alert-success text-center">
                        Thank you for signing up!
                    </div>';
    }
    else
    {
        $message = '<div class="alert alert-danger text-center">
                        '.$check.' 
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
            <div class="col-md-4 col-md-offset-4">
                <h1 class="login-panel text-center text-muted">COMP 3015</h1>

                <?php echo $message; ?>

                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Create Account</h3>
                    </div>
                    <div class="panel-body">
                        <form name="signup" role="form" action="signup.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" name="firstName" placeholder="First Name" value="<?php if(isset($_COOKIE['firstName'])) {   echo  $_COOKIE['firstName']; } ?>" type="text" autofocus />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="lastName" placeholder="Last Name" value="<?php if(isset($_COOKIE['lastName'])) {   echo  $_COOKIE['lastName']; } ?>" type="text"/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="password" placeholder="Password" type="password"/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="phoneNumber" placeholder="Phone Number" type="text" value="<?php if(isset($_COOKIE['phoneNumber'])) {   echo  $_COOKIE['phoneNumber']; } ?>"/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="dob" placeholder="Date of Birth" type="text" value="<?php if(isset($_COOKIE['dob'])) {   echo  $_COOKIE['dob']; } ?>"/>
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

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
