<?php 
require_once '../config/config.php';
	$facultyId = $_POST['facultyId'];
	$studentId  = $_POST['studentId'];

	// $sql = "SELECT fpriority5 from faculty where id=?";
	// 			if($stmt1 = mysqli_prepare($conn, $sql)){
	// 	            mysqli_stmt_bind_param($stmt1, "i", $param_id);
		            
	// 	            $param_id = $facultyId;
		            
	// 	            if(mysqli_stmt_execute($stmt1)){
	// 	                mysqli_stmt_store_result($stmt1);

	// 	                if(!mysqli_stmt_num_rows($stmt1) == 0){                    
	// 	                    mysqli_stmt_bind_result($stmt1, $fpriority5);
	// 	                    if(mysqli_stmt_fetch($stmt1)){
	
	// 							if($fpriority5==NULL || $fpriority5==0){
								$sql = "UPDATE facult set fpriority5=? where id=?";
         
							        if($stmt = mysqli_prepare($conn, $sql)){
							            mysqli_stmt_bind_param($stmt, "ii",$param_studentId, $param_facultyId);
							            $param_facultyId = $facultyId;
							            $param_studentId = $studentId;
							            if(mysqli_stmt_execute($stmt)){
							                echo '<script>alert("5th Priority set.")</script>';
							            } else{
							                echo '<script>alert("Something Went Wrong.")</script>';
							            }
							        }else {echo '<script>alert("Priorities selection closed.")</script>';}
							         
							        mysqli_stmt_close($stmt);
							        
				// 			    }else{
				// 		    	echo '<script>alert("Already Choosen.")</script>';
				// 		    	}
				// 		    }

						    
				// 		}
				// 	}mysqli_stmt_close($stmt1);
				// }
			



            mysqli_close($conn);

?>