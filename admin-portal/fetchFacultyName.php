<?php 
require_once '../config/config.php';
	// echo "string";
	
	$facultyId = $_POST['id'];

	$sql = "select name from user where id=$facultyId and role='faculty'";
	$result = $conn->query($sql);
	
	if($result){
		if($result->num_rows == 0) {
            echo '<p>Wrong Faculty Id </p>';
        }else{
        	while($row = $result->fetch_assoc()) {
                echo '
                <h1> '; echo $row['name']; echo'  </h1>
                ';
        		
        }
	}
}
			
	             
	        
            mysqli_close($conn);


?>