

<?php
require_once '../config/config.php';

$email = $newpass = $role = $login_name = "";
$email_err = $pass_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

  if(empty(trim($_POST["email"]))){
    $email_err = 'Please enter email.';
} else{
    $email = trim($_POST["email"]);
}

if(empty(trim($_POST['passWord']))){
        $pass_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST['passWord'])) < 6){
        $pass_err = "Password must have atleast 6 characters.";
    } else{
        $newpass = trim($_POST['passWord']);
         echo $newpass;
    }

if(empty($email_err) && empty($pass_err)){

    $sql = "UPDATE student set password=? where email=?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        
        mysqli_stmt_bind_param($stmt, "ss", $param_email, $param_password);
        $param_email = $email;
        $param_password = password_hash($newpass, PASSWORD_DEFAULT); 
        echo '2345';

        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            echo 'success';
            } else{
                echo '123';
                $email_err = 'No account found with this email.<script>
                $("#login").modal("show");
                </script>';
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
}


?>