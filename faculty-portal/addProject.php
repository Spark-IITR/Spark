<?php 
require_once '../config/config.php';
	// echo "string";
	
	$id = $_POST['id'];
	$addProjectText = $_POST['addProjectText'];

	$sql = "SELECT project from faculty where id=$id";
				if($stmt1 = mysqli_prepare($conn, $sql)){
		            mysqli_stmt_bind_param($stmt1, "i", $param_id);
		            $param_id = $id;
		            if(mysqli_stmt_execute($stmt1)){
		                mysqli_stmt_store_result($stmt1);

		                if(!mysqli_stmt_num_rows($stmt1) == 0){                    
		                    mysqli_stmt_bind_result($stmt1, $previousProject);
		                    if(mysqli_stmt_fetch($stmt1)){
								if($previousProject){
		                    		$addProjectText = $previousProject.'<li>'.$addProjectText.'</li>';
		                    	}else{
		                    		$addProjectText = '<li>'.$addProjectText.'</li>';
		                    	}

								$sql = "UPDATE faculty set project=? where id=?";
         
							        if($stmt = mysqli_prepare($conn, $sql)){
							            mysqli_stmt_bind_param($stmt, "si",$param_addProject, $param_id);
							            $param_addProject = $addProjectText;
							            if(mysqli_stmt_execute($stmt)){
							                echo ' Project Added.';
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