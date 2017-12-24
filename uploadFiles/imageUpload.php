<?php
    require_once('../config/config.php');

if ($_POST && !empty($_FILES)) {
    $formOk = true;

     $email = $_POST['imageId'];
     $role = $_POST['imageRole'];
    $path = $_FILES['image']['tmp_name'];
    $size = $_FILES['image']['size'];
    $type = $_FILES['image']['type'];

    if ($_FILES['image']['error'] || !is_uploaded_file($path)) {
        $formOk = false;
        // echo "Error: Error in uploading file. Please try again.";
        if($role=='faculty'){
                    header ("location:../faculty-portal/");
                }else if($role=='student'){
                    header ("location:../student-portal/");
                }
    }

    if ($formOk && !in_array($type, array('image/png', 'image/x-png', 'image/jpeg', 'image/pjpeg', 'image/gif'))) {
        $formOk = false;
        echo "Error: Unsupported file extension. Supported extensions are JPG / PNG.";
    }
    if ($formOk && filesize($path) > 500000) {
        $formOk = false;
        // echo "Error: File size must be less than 500 KB.";
        if($role=='faculty'){
                    header ("location:../faculty-portal/");
                }else if($role=='student'){
                    header ("location:../student-portal/");
                }
    }
    if ($formOk) {
        $content = file_get_contents($path);

            $content = mysqli_real_escape_string($conn, $content);
            $sql = "update user set image='$content' where email='$email'";

            if (mysqli_query($conn, $sql)) {
                if($role=='faculty'){
                    header ("location:../faculty-portal/");
                }else if($role=='student'){
                    header ("location:../student-portal/");
                }
            } else {
                // echo "Error: Could not save the data to mysql database. Please try again.";
                if($role=='faculty'){
                    header ("location:../faculty-portal/");
                }else if($role=='student'){
                    header ("location:../student-portal/");
                }
            }

            mysqli_close($conn);
        
}else{
        // echo "not able to access";
        if($role=='faculty'){
                    header ("location:../faculty-portal/");
                }else if($role=='student'){
                    header ("location:../student-portal/");
                }
    }
}
?>