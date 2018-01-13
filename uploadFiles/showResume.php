<?php
    require_once('../config/config.php');
    $content='';
	if (empty($_GET['email'])) {
		echo 'A valid image file id is required to display the image file.';
		exit;
	}

	header("Content-type: application/pdf");  
	$imageId = $_GET['email'];

		$content = mysqli_real_escape_string($conn, $content);
		$sql = "SELECT  resume FROM student where email='$imageId'";

		if ($rs = mysqli_query($conn, $sql)) {
			$imageData = mysqli_fetch_array($rs, MYSQLI_ASSOC);
			mysqli_free_result($rs);
		} else {
			echo "Error: Could not get data from mysql database. Please try again.";
		}
		mysqli_close($conn);

	if (!empty($imageData)) {
		echo $imageData['resume'];
	}
?>