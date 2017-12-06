<?php
ob_start();
session_start();
require_once '../config/config.php';
$name = $email = $contact = $department = $college = ""; 
if(isset($_SESSION['role'])=='admin')
{
$sql = "SELECT name,email,contact,department,college FROM user WHERE email = ? and role = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_username,$param_role);
            
            $param_username = $_SESSION['username'];
            $param_role = $_SESSION['role'];
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $name,$email,$contact,$department,$college);
                    if(mysqli_stmt_fetch($stmt)){






                        require_once '../header.php';
                        

           ?>         

    <div class="container-fluid">
        <div class="row">
            <h1>Welcome Admin</h1>
        </div>
    </div>




    <?php
         }else{echo 'error';}
                } else{
                    $username_err = 'No account found with that username.';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        mysqli_stmt_close($stmt);
    }

    
else
      header ("location:../index.php");
    ?>