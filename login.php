<?php
  require_once 'config.php';
 
  $username = $password = "";
  $username_err = $password_err = "";
 
  if($_SERVER["REQUEST_METHOD"] == "POST"){
 
      if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }
    
    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT email, password FROM student WHERE email = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = $username;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            session_start();
                            $_SESSION['username'] = $username;      
                            header("location: signup.php");
                        } else{
                            $password_err = 'The password you entered was not valid.';
                        }
                    }
                } else{
                    $username_err = 'No account found with that username.';
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




<!-- login modal -->
   <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
     <div class="modal-dialog modal-md loginModalWidth" role="document">
       <div class="modal-content">
         <div class="modal-header" style="background-color: #aaa">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title loginModalHeader">Log In</h4>
         </div>
         <div class="modal-body">
           <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
           <div class="form-group  <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
             <label for="inputEmail3" class="col-sm-2 control-label">Email<sup>*</sup></label>
             <div class="col-sm-10">
               <input type="email" name="username" class="form-control" placeholder="Email"  value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
             </div>
           </div>
           <div class="form-group  <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>"">
             <label for="inputPassword3" class="col-sm-2 control-label">Password<sup>*</sup></label>
             <div class="col-sm-10">
               <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
               <span class="help-block"><?php echo $password_err; ?></span>
             </div>
           </div>
           <div class="form-group">
             <div class="col-sm-offset-2 col-sm-10">
               <button type="submit" class="btn btn-primary loginModalSignupButton">Sign in</button>
             </div>
           </div>
           <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="signup.php"  data-toggle="modal" data-target="#signup" id="signupModalShow" data-dismiss="modal" style="text-decoration: none;">Don't Have Account</a>
            </div>
           </div> 
         </form>
         </div>
      </div>
     </div>
   </div>

