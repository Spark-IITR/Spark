<?php
    require_once('../config/config.php');
// echo 'hello1';

if ($_POST && !empty($_FILES)) {
    $formOk = true;
// echo 'hello1';
     $email = $_POST['imageId'];
     $role = $_POST['imageRole'];
    $path = $_FILES['image']['tmp_name'];
    $size = $_FILES['image']['size'];
    $type = $_FILES['image']['type'];

    if ($_FILES['image']['error'] || !is_uploaded_file($path)) {
        $formOk = false;
        // echo "Error: No Image Selected";
        header('Location: '.base_url_student.'index.php');
    }

    if ($formOk && !in_array($type, array('image/png', 'image/x-png', 'image/jpeg', 'image/pjpeg', 'image/gif'))) {
        $formOk = false;
        echo "Error: Unsupported file extension. Supported extensions are JPG / PNG.";
    }
    if ($formOk && filesize($path) > 200000) {
        $formOk = false;
        // echo "Error: File size must be less than 100 KB.";
        header('Location: '.base_url_student.'index.php');
    }
    if ($formOk) {
        $content = file_get_contents($path);

            $content = mysqli_real_escape_string($conn, $content);
            // echo $content;
            $sql1 = "SELECT image from student where email=?";
                if($stmt1 = mysqli_prepare($conn, $sql1)){
                    mysqli_stmt_bind_param($stmt1, "s", $param_email);
                    
                    $param_email = $email;
                    
                    if(mysqli_stmt_execute($stmt1)){
                        mysqli_stmt_store_result($stmt1);

                        if(!mysqli_stmt_num_rows($stmt1) == 0){                    
                            mysqli_stmt_bind_result($stmt1, $image);
                            if(mysqli_stmt_fetch($stmt1)){
    
                                if($image==NULL){
                                $sql = "UPDATE student set image=? where email=?";
         
                                    if($stmt = mysqli_prepare($conn, $sql)){
                                        mysqli_stmt_bind_param($stmt, "bs",$param_image, $param_Email);
                                        $param_Email= $email;
                                        $param_image = NULL;
                                        $stmt->send_long_data(0, file_get_contents($path));
                                        // echo $param_image;
                                        if(mysqli_stmt_execute($stmt)){
                                            header('Location: '.base_url_student.'index.php');
                                        } else{
                                            // echo "Error: Could not save the data to mysql database. Please try again.";
                                            header('Location: '.base_url_student.'index.php');
                                        }
                                    }else {echo 'hello';}
                                     
                                    mysqli_stmt_close($stmt);
                                    
                                }else{
                                // echo 'already present';
                                    header('Location: '.base_url_student.'index.php');
                                }
                            }

                            
                        }
                     }//mysqli_stmt_close($stmt1);
                }
            mysqli_close($conn);
        
        }
    
    }else{
        // echo "not able to access";
            header('Location: '.base_url_student.'index.php');
        }
?>