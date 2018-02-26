<?php
require_once '../config/config.php';

$email = $newPassword = $confirmPassword = $oldPassword  = "";
$email_err = $newPassword_err = $oldPassword_err = $confirmPassword_err =  "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = $_POST['email'];

  if(empty(trim($_POST["oldPassword"]))){
    $oldPassword_err = 'Please enter Old Password.';
} else{
    $oldPassword = trim($_POST["oldPassword"]);
}

if(empty(trim($_POST['newPassword']))){
        $newPassword_err = "Please enter a New Password.";     
    } elseif(strlen(trim($_POST['newPassword'])) < 6){
        $newPassword_err = "Password must have atleast 6 characters.";
    } else{
        $newPassword = trim($_POST['newPassword']);
        if(empty(trim($_POST['confirmPassword']))){
            $confirmPassword_err = "Please enter a Confirm Password.";     
        }  else{
            $confirmPassword = trim($_POST['confirmPassword']);
                if($newPassword != $confirmPassword){
                    $confirmPassword_err = "Password doesn't match.";

                }
        }        
    }

echo $newPassword_err;
echo $confirmPassword_err;
if(empty($newPassword_err) && empty($confirmPassword_err)){

    $sql = "SELECT password from student where email=?";
    if($stmt1 = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt1, "s", $param_email);
        
        $param_email = $email;
        
        if(mysqli_stmt_execute($stmt1)){
            mysqli_stmt_store_result($stmt1);

            if(!mysqli_stmt_num_rows($stmt1) == 0){                    
                mysqli_stmt_bind_result($stmt1, $password);
                if(mysqli_stmt_fetch($stmt1)){
                    if(!password_verify($oldPassword, $password)){
                        $oldPassword_err = "Old Password Is wrong";
                        echo $oldPassword_err;
                    }
                }
            }
        }else{
            echo "Oops! Something went wrong. Please try again later.1";
        }
    }
  
if(empty($oldPassword_err)){
    $sql = "UPDATE student set password=? where email=?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        
        mysqli_stmt_bind_param($stmt, "ss", $param_password, $param_email);
        $param_email = $email;
        $param_password = password_hash($newPassword, PASSWORD_DEFAULT); 
        // echo '2345';

        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            echo 'Password Changes Successfully';
            } else{
                
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
}


?>