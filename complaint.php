<?php 
require_once 'config/config.php';
	// echo "string";
	
	$id = $_POST['complaintId'];
	$complaint = $_POST['complaintText'];

	$sql = "UPDATE user set complaints='$complaint' where id=$id";
	if (mysqli_query($conn, $sql)) {

	               echo "<p>hello world</p>";
	            
	        }

    else{
    	echo 'false';
    }	
			
	             
	        
            mysqli_close($conn);


?>