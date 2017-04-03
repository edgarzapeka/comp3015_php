<?php

if(count($_POST) > 1){
var_dump($_POST);
$fieldInput = true;

if($fieldInput != false)
{
echo updatePost($_POST);
    $message = '<div class="alert-success bg-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    Updated
</div>';
}
else
{
$message = '<div class="alert alert-warning alert-dismissable text-center">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    Invalid input!
</div>';
}

}
?>

<html>
<body>
<h1><?php echo $message ?></h1>
</body>
</html>