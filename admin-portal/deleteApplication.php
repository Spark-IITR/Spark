<?php 
require_once '../config/config.php';
	$studentId = $_POST['id'];

	
		$sql101 = "DELETE from user where id=?";

	        if($stmt = mysqli_prepare($conn, $sql101)){
	            mysqli_stmt_bind_param($stmt, "i", $param_studentId);
	            $param_studentId = $studentId;
	            if(mysqli_stmt_execute($stmt)){
	                
	                header("location: index.php");
	            } else{
	                echo '<script>alert("Not Able To Delete. ");</script>';
	            }
	        }else {echo '<script>alert(" Something Went Wrong. ");</script>';}
	         
	        mysqli_stmt_close($stmt);
							        
            mysqli_close($conn);

?>