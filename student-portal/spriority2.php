<?php 
require_once '../config/config.php';
	$facultyId = $_POST['facultyId'];
	$studentId  = $_POST['studentId'];

	$sql100 = "select spriority2 from user where id=$studentId";
	$result100 = $conn->query($sql100);
	$row100 = $result100->fetch_assoc();
		if($row100['spriority2']==NULL){
		$sql101 = "update user set spriority2=$facultyId where id=$studentId";
	 
			if (mysqli_query($conn, $sql101)) {
	               echo "true";
	            } else {
	                echo "error";
	            }
	        }

    else{
    	echo 'already present';
    }
   

            // mysqli_close($conn);

?>