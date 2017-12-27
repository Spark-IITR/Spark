<?php 
require_once '../config/config.php';
	$studentId = $_POST['id'];

	
								$sql101 = "DELETE from user where id=?";
         
							        if($stmt = mysqli_prepare($conn, $sql101)){
							            mysqli_stmt_bind_param($stmt, "i", $param_studentId);
							            $param_studentId = $studentId;
							            if(mysqli_stmt_execute($stmt)){
							                echo '<script>alert("deleted");</script>';
							            } else{
							                echo 'false';
							            }
							        }else {echo 'hello';}
							         
							        mysqli_stmt_close($stmt);
							        
            // mysqli_close($conn);

?>