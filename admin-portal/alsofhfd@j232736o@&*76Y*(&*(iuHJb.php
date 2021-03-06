<?php
require_once '../config/config.php';
 
$name = $username = $contact = $gender = $dob = $department = $password = $confirm_password = "";
$name_err = $username_err = $contact_err = $gender_err = $dob_err = $department_err = $password_err = $confirm_password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a email.";
    } else{
        $sql = "SELECT email FROM student where email=? union select email from faculty WHERE email = ? union select email from admin WHERE email = ?";
       
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_username, $param_username);
            
            $param_username = trim($_POST["username"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This email is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                    // echo $username;
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        mysqli_stmt_close($stmt);
    }

    /* validators */
    if(empty(trim($_POST['name']))){
        $name_err = "Please enter a name.";     
    }  else{
        $name = trim($_POST['name']);
        // echo $name;
    }
    
   
    
    // if(empty(trim($_POST['contact']))){
    //     $contact_err = "Please enter a contact no.";     
    // } elseif(strlen(trim($_POST['contact'])) < 10){
    //     $contact_err = "Password must have atleast 10 digits.";
    // } else{
    //     $contact = trim($_POST['contact']);
    //     // echo $contact;
    // }
    
    
    
    // if(empty(trim($_POST['department']))){
    //     $department_err = "Please enter a department name.";     
    // } else{
    //     $department = trim($_POST['department']);
    //     // echo $department;
    // }
    

    
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST['password']);
        // echo $password;
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
        }
    }
    // echo $username_err; echo $password_err; echo $confirm_password_err;
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
         $sql = "INSERT INTO admin (email, password, name, role) VALUES ( ?, ?, ?,?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_password, $param_name, $param_role);
            // echo 'hello';
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            $param_name = $name;
            // $param_contact = $contact;
            // $param_department = $department;
            $param_role = "admin";
            // echo $param_gender;
            // echo $param_username;
            if(mysqli_stmt_execute($stmt)){
               // echo 'hello';
                header('Location: '.base_url_admin.'index.php');

            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($conn);
}
?>
 

<?php include('../header.php'); ?>


<div class="container">
            
         
           <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
           
           <div class="form-group   <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
             <label for="inputEmail3" class="sr-only">Name<sup>*</sup></label>
             <div class="col-sm-12">
               <input type="text"  name="name"  class="form-control" id="inputEmail3" placeholder="Name" value="<?php echo $name; ?>" >
                <span class="help-block"><?php echo $name_err; ?></span>
             </div>
           </div>
            
           <div class="form-group  <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
             <label for="inputEmail3" class="sr-only">Email<sup>*</sup></label>
             <div class="col-sm-12">
               <input type="email" name="username"  class="form-control" id="inputEmail3" placeholder="Email"  value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
             </div>
           </div>
          
           <!-- <div class="form-group">
            <label for="inputEmail3" class="sr-only ">department</label>
             <div class="col-sm-6">
               <input type="text" name="department"  class="form-control" id="inputEmail3" placeholder="Department" value="<?php echo $department; ?>">
                <span class="help-block"></span>
             </div>
            
            <label for="inputEmail3" class="sr-only">Contact</label>
             <div class="col-sm-6">
               <input type="number"  name="contact" class="form-control" id="inputEmail3" placeholder="Contact" value="<?php echo $contact; ?>">
                <span class="help-block"></span>
             </div>
           </div> -->
          
           <div class="form-group  <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
             <label for="inputEmail3"  class="sr-only">Password<sup>*</sup></label>
             <div class="col-sm-6">
               <input type="password" name="password" id="signupPassword" class="form-control"  placeholder="Password"  value="<?php echo $password; ?>" >
                <span class="help-block"><?php echo $password_err; ?></span>
             </div>
            
             <label for="inputEmail3" class="sr-only">Confirm Password<sup>*</sup></label>
             <div class="col-sm-6">
               <input type="password" name="confirm_password" class="form-control" id="signupConfirmPassword" placeholder="Confirm Password"  value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
             </div>
          
           </div>
           <div class="form-group">
             <div class="col-sm-offset-2 col-sm-10">
               <input type="submit" value="Sign In" class="btn btn-primary signupModalSignupButton">
             </div>
           </div>
         </form>
        </div> 


    <script src="src/js/bootstrap.min.js"></script>
    <script src="src/js/jquery.js"></script>
</body>

</html>