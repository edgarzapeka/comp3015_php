<?php

session_start();



require ("includes/functions.php");

$host = 'localhost';
$userName = 'root';
$password = 'root';
$database = 'second_assignment';

$link = mysqli_connect($host, $userName, $password, $database);

$phoneNumber = '';
$message = '';

if (count($_POST) > 1){

    if(isset($_POST['phoneNumber']) && isset($_POST['password'])){

        $phoneNumber = $phoneNumber = preg_replace('/[^\d]/',"",$_POST['phoneNumber']);
        $password = $_POST['password'];

        $result = mysqli_query($link, "SELECT firstName, lastName, admin FROM logins WHERE phoneNumber='$phoneNumber' AND password='$password'");

        if (mysqli_num_rows($result) == 0){
            $message = '<div class="alert alert-danger text-center">
                        User not found. Try again
                    </div>';
        } else{
            $row = mysqli_fetch_assoc($result);

            $_SESSION['flag'] = true;
            $_SESSION['firstName'] = $row['firstName'];
            $_SESSION['lastName'] = $row['lastName'];

            if($row['admin'] == 1){
                $_SESSION['admin'] = 1;
            } else{
                redirectToMainPage($_SESSION['flag']);
                header('Location: index.php');
                exit();
            }
        }
        mysqli_close($link);
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
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form name="login" role="form" action="login.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control"
                                           value="<?php echo $phoneNumber;?>"
                                           name="phoneNumber"
                                           placeholder="Phone Number"
                                           type="text"
                                        <?php echo empty($phoneNumber) ? 'autofocus' : ''; ?>
                                    />
                                </div>
                                <div class="form-group">
                                    <input class="form-control"
                                           name="password"
                                           placeholder="Password"
                                           type="password"
                                        <?php echo empty($phoneNumber) ? '' : 'autofocus'; ?>
                                    />
                                </div>
                                <div class="form-group">
                                    <input type="checkbox"
                                           value="1"
                                           name="remember"
                                        <?php echo empty($phoneNumber) ? '' : 'checked'; ?>
                                    />
                                    Remember Me
                                </div>
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Login"/>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <a class="btn btn-sm btn-default" href="signup.php">Sign Up</a>
            </div>
        </div>

    </div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
