<?php 
require_once '../config/config.php';
	$facultyId = $_POST['facultyId'];
	$studentId  = $_POST['studentId'];

	$sql100 = "SELECT spriority1 from user where id=?";
	if($stmt1 = mysqli_prepare($conn, $sql100)){
		            mysqli_stmt_bind_param($stmt1, "i", $param_id);
		            
		            $param_username = $studentId;
		            
		            if(mysqli_stmt_execute($stmt1)){
		                mysqli_stmt_store_result($stmt1);

		                if(!mysqli_stmt_num_rows($stmt1) == 0){                    
		                    mysqli_stmt_bind_result($stmt1, $resumePdf);
		                    if(mysqli_stmt_fetch($stmt1)){
	$result100 = $conn->query($sql100);
	$row100 = $result100->fetch_assoc();
		if($row100['spriority1']==NULL){
		$sql101 = "update user set spriority1=$facultyId where id=$studentId";
	 
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