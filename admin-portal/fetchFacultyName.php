<?php 
require_once '../config/config.php';
	// echo "string";
	
	$facultyId = $_POST['id'];

	$sql = "select name from faculty where id=$facultyId";
	$result = $conn->query($sql);
	
	if($result){
		if($result->num_rows == 0) {
            echo '<p style="color:red">Wrong Faculty Id </p>';
        }else{
        	while($row = $result->fetch_assoc()) {
                echo '
                <p> '; echo $row['name']; echo'  </p>
                ';
        		
        }
	}
}
			
	             
	        
            mysqli_close($conn);


?>