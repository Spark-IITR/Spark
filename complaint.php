<?php 
require_once 'config/config.php';
	// echo "string";
	
	$id = $_POST['complaintId'];
	$complaint = $_POST['complaintText'];

	$sql = "SELECT complaints from faculty where email=? union SELECT complaints from student where email=?";
				if($stmt1 = mysqli_prepare($conn, $sql)){
		            mysqli_stmt_bind_param($stmt1, "ss", $param_id, $param_id);
		            
		            $param_id = $id;
		            
		            if(mysqli_stmt_execute($stmt1)){
		                mysqli_stmt_store_result($stmt1);

		                if(!mysqli_stmt_num_rows($stmt1) == 0){                    
		                    mysqli_stmt_bind_result($stmt1, $previousComplaint);
		                    if(mysqli_stmt_fetch($stmt1)){
								if($previousComplaint){
		                    		$complaint = $previousComplaint.'<li>'.$complaint.'</li>';
		                    	}else{
		                    		$complaint = '<li>'.$complaint.'</li>';
		                    	}

								$sql1 = "UPDATE faculty set complaints=? where email=?";
								$sql2 = "UPDATE student set complaints=? where email=?";
         
							        if($stmt = mysqli_prepare($conn, $sql1)){
							            mysqli_stmt_bind_param($stmt, "ss",$param_complaint, $param_id);
							            $param_complaint = $complaint;
							            if(mysqli_stmt_execute($stmt)){
							                echo 'Complaint Inserted.';
							            } else{
							                echo 'false';
							            }
							        }else if($stmt = mysqli_prepare($conn, $sql2)){
							            mysqli_stmt_bind_param($stmt, "ss",$param_complaint, $param_id);
							            $param_complaint = $complaint;
							            if(mysqli_stmt_execute($stmt)){
							                echo 'Complaint Inserted.';
							            } else{
							                echo 'false';
							            }
							        }else {echo 'hello';}
							         
							        mysqli_stmt_close($stmt);
							        
						    }else{echo 'hello4';}

						    
						}else{echo 'hello3';}
					}else{echo 'hello2';}mysqli_stmt_close($stmt1);
				}else{echo 'hello1';}
			
	             
	        
            mysqli_close($conn);


?>