<?php

    require ("includes/functions.php");

    $message = "";
    $arrayOfFoundItems = null;

    if ($_GET['searchString'] != null){

        if (validateSearchForm($_GET['searchString'])){
            $arrayOfFoundItems = sortArrayByPriority(4,findPosts($_GET['searchString']));
        }
        else{
            $message = '<div class="alert alert-warning alert-dismissable text-center">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        ERROR. Invalid input. Alphabet only text is accepted"
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
                <h3 class="login-panel text-center text-muted"><?php echo $message;?></h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h3 class="login-panel text-center text-muted">Search</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <a href="/" class="btn btn-default"><i class="fa fa-arrow-circle-left"> </i> Back</a>
                <hr/>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form role="form" method="GET" action="search.php">
                    <div class="form-group input-group">
                        <input type="text" placeholder="Search term" class="form-control" name="searchString">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Results
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                    foreach ($arrayOfFoundItems as $item){
                                        $firstName = trim($item[0]);
                                        $lastName = trim($item[1]);
                                        $title = trim($item[2]);
                                        $content = trim($item[3]);
                                        $priority = trim($item[4]);
                                        $image = trim($item[5]);
                                        $time = trim($item[6]);

                                        $formattedAuthor = trim(ucwords(strtolower($firstName . " " . $lastName)));
                                        $formattedPostedTime = date('M d\, \'y', $time);

                                        $panelColor;
                                        switch ($priority){
                                            case 1:
                                                $panelColor = "danger";
                                                break;
                                            case 2:
                                                $panelColor = "warning";
                                                break;
                                            default:
                                                $panelColor = "info";
                                                break;

                                        }

                                ?>
                                <tr class="<?php echo $panelColor ?>">
                                    <td><?php echo $formattedAuthor ?></td>
                                    <td><?php echo  $title ?></td>
                                    <td><?php echo $formattedPostedTime ?></td>
                                </tr>
                                <?php

                                    }

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
                    Total results: <?php echo count($arrayOfFoundItems); ?>.
                </p>
            </div>
        </div>

    </div>
</div>

</body>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>
