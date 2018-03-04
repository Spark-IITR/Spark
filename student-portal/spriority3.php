<?php 
require_once '../config/config.php';
	$facultyId = $_POST['facultyId'];
	$studentId  = $_POST['studentId'];

	// $sql = "SELECT spriority3 from student where id=?";
	// 			if($stmt1 = mysqli_prepare($conn, $sql)){
	// 	            mysqli_stmt_bind_param($stmt1, "i", $param_id);
		            
	// 	            $param_id = $studentId;
		            
	// 	            if(mysqli_stmt_execute($stmt1)){
	// 	                mysqli_stmt_store_result($stmt1);

	// 	                if(!mysqli_stmt_num_rows($stmt1) == 0){                    
	// 	                    mysqli_stmt_bind_result($stmt1, $spriority3);
	// 	                    if(mysqli_stmt_fetch($stmt1)){
	
	// 							if($spriority3==NULL || $spriority3==0){
								$sql = "UPDATE studen set spriority3=? where id=?";
         
							        if($stmt = mysqli_prepare($conn, $sql)){
							            mysqli_stmt_bind_param($stmt, "ii",$param_facultyId, $param_studentId);
							            $param_facultyId = $facultyId;
							            $param_studentId = $studentId;
							            if(mysqli_stmt_execute($stmt)){
							                echo '<script>alert("3rd Priority set.")</script>';
							            } else{
							                echo '<script>alert("Something Went Wrong.")</script>';
							            }
							        }else {echo '<script>alert("Unable to change priority.")</script>';}
							         
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