<?php
require '../config/config.php';

if ($_POST && !empty($_FILES)) {
    if($_FILES['resume']['error'] == 0) {
        $email = $_POST['resumeId'];
        $type = $conn->real_escape_string($_FILES['resume']['type']);
        $data = $_FILES['resume']['tmp_name'];
        $size = intval($_FILES['resume']['size']);
 
         if ( in_array($type, array('application/pdf'))) {
             if ( $size < 500000) {

                        $sql1 = "SELECT resume from user WHERE email= ? ";

                if($stmt1 = mysqli_prepare($conn, $sql1)){
                    mysqli_stmt_bind_param($stmt1, "s", $param_username);
                    
                    $param_username = $email;
                    
                    if(mysqli_stmt_execute($stmt1)){
                        mysqli_stmt_store_result($stmt1);

                        if(!mysqli_stmt_num_rows($stmt1) == 0){                    
                            mysqli_stmt_bind_result($stmt1, $resumePdf);
                            if(mysqli_stmt_fetch($stmt1)){
                        
                                if($resumePdf==null){
                                    $query = "UPDATE user set resume=? where email=?";
                                    if($stmt3 = mysqli_prepare($conn, $query)){
                                        mysqli_stmt_bind_param($stmt3, "bs",$param_resume, $param_email);
                                        $param_email = $email;
                                        $param_resume = NULL;
                                        $stmt3->send_long_data(0, file_get_contents($data));
                                        if(mysqli_stmt_execute($stmt3)){
                                             // echo 'Resume uploaded';?>
                                             <script>
                                                 alert('sj');
                                             </script>
                                             <?php
                                              header ("location:../student-portal/");
                                        } else{
                                           echo 'Error! Failed to insert the file'
                                           . "<pre>{$conn->error}</pre>";
                                        }
                                    }else {
                                        echo 'Already uploaded';
                                        // header ("location:../student-portal/");
                                        // mysqli_stmt_close($stmt);
                                    }
                                }else{echo 'Already uploaded';
                                // header ("location:../student-portal/");
                                }
                            }
                        }
                    }
                }
            }
            else{
                    echo "File size too large. Size limit is 100kb only.";
            }
                
        }
            else{
                echo "Choose pdf format.";
        }
    }
        else {
            echo 'File is not selected.';
    }
 
   mysqli_stmt_close($stmt1);

            mysqli_close($conn);
   
}


?>
