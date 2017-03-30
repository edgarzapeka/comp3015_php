<?php
session_start();
require ("includes/functions.php");

$host = 'localhost';
$userName = 'root';
$password = 'root';
$database = 'second_assignment';

$link = mysqli_connect($host, $userName, $password, $database);



$message        = '';
$firstName      = '';
$lastName       = '';
$phoneNumber    = '';
$dob            = '';

if(isset($_COOKIE['firstName']))
{
    $firstName = $_COOKIE['firstName'];
}

if(isset($_COOKIE['lastName']))
{
    $lastName = $_COOKIE['lastName'];
}

if(isset($_COOKIE['phoneNumber']))
{
    $phoneNumber = $_COOKIE['phoneNumber'];
}

if(isset($_COOKIE['dob']))
{
    $dob = $_COOKIE['dob'];
}

if(count($_POST) > 0)
{
    $check = checkSignUp($_POST);

    if($check === true)
    {
        $message = '<div class="alert alert-success text-center">
                        Thank you for signing up!
                    </div>';
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $password = $_POST['password'];
        $phoneNumber = preg_replace('/[^\d]/',"",$_POST['phoneNumber']);
        $dob = $_POST['dob'];
        $result = mysqli_query($link, "INSERT INTO logins VALUES('id','$phoneNumber', '$password', '$firstName', '$lastName', '$dob')");
        mysqli_close($link);

        $_SESSION['flag'] = true;
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;

        redirectToMainPage($_SESSION['flag']);
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
                                    <input class="form-control"
                                           value="<?php echo $firstName;?>"
                                           name="firstName"
                                           placeholder="First Name"
                                           type="text"
                                           autofocus
                                    />
                                </div>
                                <div class="form-group">
                                    <input class="form-control"
                                           value="<?php echo $lastName;?>"
                                           name="lastName"
                                            placeholder="Last Name"
                                            type="text"
                                    />
                                </div>
                                <div class="form-group">
                                    <input class="form-control"
                                           name="password"
                                           placeholder="Password"
                                           type="password"
                                    />
                                </div>
                                <div class="form-group">
                                    <input class="form-control"
                                           value="<?php echo $phoneNumber;?>"
                                           name="phoneNumber"
                                           placeholder="Phone Number"
                                           type="text"
                                    />
                                </div>
                                <div class="form-group">
                                    <input class="form-control"
                                           value="<?php echo $dob;?>"
                                           name="dob"
                                           placeholder="Date of Birth"
                                           type="text"
                                    />
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
