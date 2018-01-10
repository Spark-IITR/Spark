<?php
require '../config/config.php';

if ($_POST && !empty($_FILES)) {
    if($_FILES['noc']['error'] == 0) {
        $email = $_POST['nocId'];
        $type = $conn->real_escape_string($_FILES['noc']['type']);
        $data = $_FILES['noc']['tmp_name'];
        $size = intval($_FILES['noc']['size']);
 
         if ( in_array($type, array('application/pdf'))) {
             if ( $size < 100000) {

                        $sql1 = "SELECT noc from student WHERE email= ? ";

                if($stmt1 = mysqli_prepare($conn, $sql1)){
                    mysqli_stmt_bind_param($stmt1, "s", $param_username);
                    
                    $param_username = $email;
                    
                    if(mysqli_stmt_execute($stmt1)){
                        mysqli_stmt_store_result($stmt1);

                        if(!mysqli_stmt_num_rows($stmt1) == 0){                    
                            mysqli_stmt_bind_result($stmt1, $nocPdf);
                            if(mysqli_stmt_fetch($stmt1)){
                        
                                if($nocPdf==null){
                                    $query = "UPDATE student set noc=? where email=?";
                                    if($stmt3 = mysqli_prepare($conn, $query)){
                                        mysqli_stmt_bind_param($stmt3, "bs",$param_noc, $param_email);
                                        $param_email = $email;
                                        $param_noc = NULL;
                                        $stmt3->send_long_data(0, file_get_contents($data));
                                        if(mysqli_stmt_execute($stmt3)){
                                             // echo 'noc uploaded';?>
                                             <script>
                                                 alert('sj');
                                             </script>
                                             <?php
                                                header('Location: '.base_url_student.'index.php');
                                              
                                        } else{
                                              header('Location: '.base_url_student.'index.php');
                                        }
                                    }else {
                                        // echo 'Already uploaded';
                                        header('Location: '.base_url_student.'index.php');
                                        // mysqli_stmt_close($stmt);
                                    }
                                }else{
                                    // echo 'Already uploaded';
                                header('Location: '.base_url_student.'index.php');
                                }
                            }
                        }
                    }
                }
            }
            else{
                    // echo "File size too large. Size limit is 100kb only.";
                header('Location: '.base_url_student.'index.php');
            }
                
        }
            else{
                // echo "Choose pdf format.";
                header('Location: '.base_url_student.'index.php');
        }
    }
        else {
            // echo 'File is not selected.';
            header('Location: '.base_url_student.'index.php');
    }
 
   mysqli_stmt_close($stmt1);

            mysqli_close($conn);

}


?>
