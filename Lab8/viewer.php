<?php

	
	$array = scandir("modified_images/");
	
	if (isset($_GET['name']) && !empty($_GET['name']) ){
	
		foreach($array as &$value){
			if ($value === $_GET['name']){
				header("Content-Disposition: attachment; filename=".$_GET['name']);
				$image = imagecreatefromjpeg("modified_images/".$_GET['name']);
				imagejpeg($image);
				exit;
			}
		}
		
		echo "The file " . $_GET['name'] . " doesn't exists";
	}
	else{
		echo 'No $_GET value';
	}
?>