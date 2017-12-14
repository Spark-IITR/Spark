<?php

// Check for post data.
if ($_POST && !empty($_FILES)) {
	$formOk = true;

	//Assign Variables
	$path = $_FILES['image']['tmp_name'];
	$name = $_FILES['image']['name'];
	$size = $_FILES['image']['size'];
	$type = $_FILES['image']['type'];

	if ($_FILES['image']['error'] || !is_uploaded_file($path)) {
		$formOk = false;
		echo "Error: Error in uploading file. Please try again.";
	}

	//check file extension
	if ($formOk && !in_array($type, array('image/png', 'image/x-png', 'image/jpeg', 'image/pjpeg', 'image/gif'))) {
		$formOk = false;
		echo "Error: Unsupported file extension. Supported extensions are JPG / PNG.";
	}
	// check for file size.
	if ($formOk && filesize($path) > 500000) {
		$formOk = false;
		echo "Error: File size must be less than 500 KB.";
	}

	if ($formOk) {
		// read file contents
		$content = file_get_contents($path);

		//connect to mysql database
		if ($conn = mysqli_connect('localhost', 'root', '99569', 'spark')) {
			$content = mysqli_real_escape_string($conn, $content);
			$sql = "insert into images (name, size, type, content) values ('{$name}', '{$size}', '{$type}', '{$content}')";

			if (mysqli_query($conn, $sql)) {
				$uploadOk = true;
				$imageId = mysqli_insert_id($conn);
			} else {
				echo "Error: Could not save the data to mysql database. Please try again.";
			}

			mysqli_close($conn);
		} else {
			echo "Error: Could not connect to mysql database. Please try again.";
		}
	}
}
?>

<html>
	<head>
		<title>Upload image to mysql database.</title>
		<style type="text/css">
			img{
				margin: .2em;
				border: 1px solid #555;
				padding: .2em;
				vertical-align: top;
			}
		</style>
	</head>
	<body>
			<div>
		  		<h3>Image Uploaded:</h3>
		  	</div>
			<div>
				<img src="image.php?id=<?=$imageId ?>" width="150px">
				<strong>Embed</strong>: <input size="25" value='<img src="image.php?id=<?=$imageId ?>">'>
			</div>

			<hr>
		<? endif; ?>

		<form action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data" >
		  <div>
		  	<h3>Image Upload:</h3>
		  </div>
		  <div>
		  	<label>Image</label>
		  	<input type="hidden" name="MAX_FILE_SIZE" value="500000">
			<input type="file" name="image" />
		    <input name="submit" type="submit" value="Upload">
		  </div>
		</form>
	</body>
</html>