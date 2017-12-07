<?php
    require_once('../config/config.php');

    $content = mysqli_real_escape_string($conn, $content);
	if (empty($_GET['id']) || !is_numeric($_GET['id'])) {
		echo 'A valid image file id is required to display the image file.';
		exit;
	}

	$imageId = $_GET['id'];

		$content = mysqli_real_escape_string($conn, $content);
		$sql = "SELECT  image FROM user where id = 2";

		if ($rs = mysqli_query($conn, $sql)) {
			$imageData = mysqli_fetch_array($rs, MYSQLI_ASSOC);
			mysqli_free_result($rs);
		} else {
			echo "Error: Could not get data from mysql database. Please try again.";
		}
		mysqli_close($conn);

	if (!empty($imageData)) {
		echo $imageData['image'];
	}
?>