<?php
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] != 1){
    header('Location: index.php');
    exit;
}

$host = 'localhost';
$userName = 'root';
$password = 'root';
$database = 'second_assignment';

$total = 0;

$link = mysqli_connect($host, $userName, $password, $database);
$result = mysqli_query($link, 'SELECT * FROM logins');

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
                <h3 class="login-panel text-center text-muted">Users</h3>
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
                        Users
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>DOB</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                While($array = mysqli_fetch_array($result)){
                                    $firstName = $array['firstname'];
                                    $lastName = $array['lastname'];
                                    $dob = $array['dob'];
                                    if($firstName === 'Admin'){
                                        continue;
                                    }
                                    $total++;
                                    echo "<tr>
                                        <td>$firstName</td>
                                        <td>$lastName</td>
                                        <td>$dob</td>
                                    </tr>";
                                };


                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->

            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <p class="text-center text-muted">
                    Total users: <?php echo $total + ".";  ?>
                </p>
            </div>
        </div>

    </div>
</div>

<?php

mysqli_close($link);

?>

</body>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>
