<?php
    require_once('../config/config.php');



if ($_POST && !empty($_FILES)) {
    if($_FILES['noc']['error'] == 0) {
        $email = $_POST['nocId'];
        $type = $conn->real_escape_string($_FILES['noc']['type']);
        $data = $conn->real_escape_string(file_get_contents($_FILES  ['noc']['tmp_name']));
        $size = intval($_FILES['noc']['size']);
 
 if ( in_array($type, array('application/pdf'))) {
     if ( $size < 500000) {
        
        $query = "update user set noc='$data' where email='$email'";
 
        $result = $conn->query($query);
 
        if($result) {
            header ("location:../student-portal/");
        }
        else {
            echo 'Error! Failed to insert the file'
               . "<pre>{$conn->error}</pre>";
        }
        }else{echo "file size too large. Size Limit is 500kb only.";}
    }else{echo "choose pdf format";}
}
    else {
        echo 'An error accured while the file was being uploaded. '
           . 'Error code: '. intval($_FILES['noc']['error']);
    }
 
    $conn->close();
}
else {
    echo 'Error! A file was not sent!';
}
 



?>