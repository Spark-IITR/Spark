<?php 
require_once '../config/config.php';
	// echo "string";
	
	$id = $_POST['remarkId'];
	$remark = $_POST['remarkText'];

	$sql = "SELECT adminRemark from student where id=$id";
				if($stmt1 = mysqli_prepare($conn, $sql)){
		            mysqli_stmt_bind_param($stmt1, "i", $param_id);
		            
		            $param_id = $id;
		            
		            if(mysqli_stmt_execute($stmt1)){
		                mysqli_stmt_store_result($stmt1);

		                if(!mysqli_stmt_num_rows($stmt1) == 0){                    
		                    mysqli_stmt_bind_result($stmt1, $previousremark);
		                    if(mysqli_stmt_fetch($stmt1)){
								if($previousremark){
		                    		$remark = $previousremark.'<li>'.$remark.'</li>';
		                    	}else{
		                    		$remark = '<li>'.$remark.'</li>';
		                    	}

								$sql101 = "UPDATE student set adminRemark=? where id=?";
         
							        if($stmt = mysqli_prepare($conn, $sql101)){
							            mysqli_stmt_bind_param($stmt, "si",$param_remark, $param_id);
							            $param_remark = $remark;
							            if(mysqli_stmt_execute($stmt)){
							                echo 'Remark Inserted.';
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