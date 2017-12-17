<?php 
require_once '../config/config.php';
	echo "string";
	$facultyId = $_POST['facultyId'];
	$studentId  = $_POST['studentId'];

	$sql = "select spriority1 from user where id=$studentId";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
		if($row['spriority1']==NULL){
		$sql1 = "update user set spriority1=$facultyId where id=$studentId";
	 
			if (mysqli_query($conn, $sql1)) {
	               echo "true";
	            } else {
	                echo "Error: Could not save the data to mysql database. Please try again.";
	            }
	        }

    else{
    	echo 'false';
    }
   

            mysqli_close($conn);

?>



?>