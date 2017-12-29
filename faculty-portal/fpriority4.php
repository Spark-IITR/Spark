<?php 
require_once '../config/config.php';
	$facultyId = $_POST['facultyId'];
	$studentId  = $_POST['studentId'];

	$sql100 = "SELECT fpriority4 from user where id=?";
				if($stmt1 = mysqli_prepare($conn, $sql100)){
		            mysqli_stmt_bind_param($stmt1, "i", $param_id);
		            
		            $param_id = $facultyId;
		            
		            if(mysqli_stmt_execute($stmt1)){
		                mysqli_stmt_store_result($stmt1);

		                if(!mysqli_stmt_num_rows($stmt1) == 0){                    
		                    mysqli_stmt_bind_result($stmt1, $fpriority4);
		                    if(mysqli_stmt_fetch($stmt1)){
	
								if($fpriority4==NULL || $fpriority4==0){
								$sql101 = "UPDATE user set fpriority4=? where id=?";
         
							        if($stmt = mysqli_prepare($conn, $sql101)){
							            mysqli_stmt_bind_param($stmt, "ii",$param_studentId, $param_facultyId);
							            $param_facultyId = $facultyId;
							            $param_studentId = $studentId;
							            if(mysqli_stmt_execute($stmt)){
							                echo '<script>alert("1st Priority set.")</script>';
							            } else{
							                echo '<script>alert("Something Went Wrong.")</script>';
							            }
							        }else {echo '<script>alert("Something Went Wrong.")</script>';}
							         
							        mysqli_stmt_close($stmt);
							        
							    }else{
						    	echo '<script>alert("Already Choosen.")</script>';
						    	}
						    }

						    
						}
					}mysqli_stmt_close($stmt1);
				}
			



            // mysqli_close($conn);

?>