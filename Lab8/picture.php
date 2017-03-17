<?php
	//error_reporting(E_ALL);
	//ini_set('display_errors', 1);
	
	require('functions.php');
	
	if (count($_POST) > 1){
		$imageName = $_FILES['file']['name'];
		$imageTmpName = $_FILES['file']['tmp_name'];
		$uploads_dir = 'uploads/';
		$text = $_POST['text'];
		$type = $_POST['type'];
		
		move_uploaded_file($imageTmpName, $uploads_dir.$imageName);
		
		draw_display_and_save_image('uploads/'.$imageName, $type, $text, $imageName);
		
	}
	
?>


<html>
<head>
</head>
<body>
	<form action="picture.php" method="post" enctype="multipart/form-data">
		Write some text<input type="text" name="text" />
		Upload file<input type="file" name="file" />
		File extension
		<select name="type">
			<option value="image/jpeg">JPEG</option>
			<option value="image/png">PNG</option>
		</select>
		<button type="submit" >Submit</button>
	</form>
</body>
</html>