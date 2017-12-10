<?php 
require_once '../config/config.php';
	echo "string";
	$facultyId = $_POST['facultyId'];
	$studentId  = $_POST['studentId'];

	$sql = "update user set spriority1=$facultyId where id=$studentId";
 
		if (mysqli_query($conn, $sql)) {
               echo "true";
            } else {
                echo "Error: Could not save the data to mysql database. Please try again.";
            }

            mysqli_close($conn);

?>



?>