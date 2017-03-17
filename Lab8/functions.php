<?php

function draw_display_and_save_image($imagePath, $type, $string, $imageName){
	
	$imageOverlay = ($type === 'image/jpeg') ? imagecreatefromjpeg($imagePath) : imagecreatefrompng($imagePath);
	
	
	$image = imagecreatetruecolor(500, 450);
	
	$cyan = imagecolorallocate($image, 38, 198, 218);
	
	$yellow = imagecolorallocate($image, 255, 195, 0);
	
	imagefill($image, 0, 0, $cyan);
	
	imagecopy($image, $imageOverlay, 10, 10, 0, 0, imagesx($imageOverlay), imagesy($imageOverlay));
	
	imageString($image, 10, 10, 50, $string, $yellow);
	

	switch($type){
		case 'image/jpeg':
			header("Content-Type: ".$type);
			imagejpeg($image, 'modified_images/'.$imageName );
			//echo '<img src=\''.'modified_images/'.$imageName.'\'>';
			imagejpeg($image);
			break;
		case 'image/png':
			header("Content-Type: ".$type);
			imagepng($image, 'modified_images/'.$imageName);
			break;
		default:
			echo "Unrecognizable format";
	}
	imagedestroy($image);
	exit;
	
}