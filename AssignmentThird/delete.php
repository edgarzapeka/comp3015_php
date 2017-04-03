<?php
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] != 1){
    header('Location: index.php');
    exit;
}

$message = "";

if (isset($_GET['id']) && !empty($_GET['id'])) {

    $id = $_GET['id'];

    $host = 'localhost';
    $userName = 'root';
    $password = 'root';
    $database = 'second_assignment';

    $link = mysqli_connect($host, $userName, $password, $database);

    $result = mysqli_query($link, "DELETE FROM posts WHERE id='$id'");

    if(mysqli_affected_rows($link) > 0){
        $message = '<div class=\"bg-success alert-success btn-success\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                            Successfully deleted!
                    </div>';
    } else{
        $message = $message = '<div class="alert alert-danger text-center">
                        Post not found.
                    </div>';
    }
}
?>

<html>
<body>
<div id="wrapper">

    <div class="container">

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h3 class="login-panel text-center text-muted">Edit post</h3>
                <?php echo $message; ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
