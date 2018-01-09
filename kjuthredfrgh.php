<?php
  require_once 'config/config.php';
 
  $email = $pass =$name= $role="";
  $email_err = $pass_err = "";
 
  if($_SERVER["REQUEST_METHOD"] == "POST"){
 
      if(empty(trim($_POST["email"]))){
        $email_err = 'Please enter email.';
    } else{
        $email = trim($_POST["email"]);
    }
    
    if(empty(trim($_POST['pass']))){
        $pass_err = 'Please enter your password.';
    } else{
        $pass = trim($_POST['pass']);
    }
    
    if(empty($email_err) && empty($pass_err)){
        $sql = "SELECT email,password,role FROM student WHERE email = ? union SELECT email,password,role FROM faculty WHERE email = ? union SELECT email,password,role FROM admin WHERE email = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "sss", $param_email, $param_email, $param_email);
            
            $param_email = $email;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $email, $hashed_pass, $role);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($pass, $hashed_pass)){
                          
                            if($role == "faculty"){
                                session_start();
                                $_SESSION['username'] = $email; 
                                $_SESSION['role']=$role;
                                $_SESSION['time'] = time();
                                header("location: faculty-portal/");

                              }else if($role == "student"){
                                session_start();
                                $_SESSION['username'] = $email; 
                                $_SESSION['role']=$role;
                                $_SESSION['time'] = time();
                                header("location: student-portal/");

                              }else if($role == "admin"){
                                session_start();
                                $_SESSION['username'] = $email; 
                                $_SESSION['role']=$role;
                                $_SESSION['time'] = time();
                                header("location: admin-portal/");
                          }
                            
                        } else{
                            $pass_err = 'The password you entered was incorrect.
                                            <script>
                                              $("#login").modal("show");
                                            </script>';
                        }
                    }else{echo 'error';}
                } else{
                    $email_err = 'No account found with this email.<script>
                                              $("#login").modal("show");
                                            </script>';
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