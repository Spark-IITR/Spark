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
            header('Location: '.base_url_faculty.'index.php');
    }

    if ($formOk && !in_array($type, array('image/png', 'image/x-png', 'image/jpeg', 'image/pjpeg', 'image/gif'))) {
        $formOk = false;
        echo "Error: Unsupported file extension. Supported extensions are JPG / PNG.";
    }
    if ($formOk && filesize($path) > 200000) {
        $formOk = false;
        // echo "Error: File size must be less than 100 KB.";
            header('Location: '.base_url_faculty.'index.php');
    }
    if ($formOk) {
        $content = file_get_contents($path);

            $content = mysqli_real_escape_string($conn, $content);
            // echo $content;
            
                                $sql = "UPDATE faculty set image=? where email=?";
         
                                    if($stmt = mysqli_prepare($conn, $sql)){
                                        mysqli_stmt_bind_param($stmt, "bs",$param_image, $param_Email);
                                        $param_Email= $email;
                                        $param_image = NULL;
                                        $stmt->send_long_data(0, file_get_contents($path));
                                        // echo $param_image;
                                        if(mysqli_stmt_execute($stmt)){
                                                header('Location: '.base_url_faculty.'index.php');
                                        } else{
                                            // echo "Error: Could not save the data to mysql database. Please try again.";
                                                header('Location: '.base_url_faculty.'index.php');
                                        }
                                    }else {echo 'hello';}
                                     
                                    mysqli_stmt_close($stmt);
                mysqli_close($conn);
        
        }
    
    }else{
        // echo "not able to access";
            header('Location: '.base_url_faculty.'index.php');
        }
?>