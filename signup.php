 <?php include('header.php'); ?>
 <?php
require 'config/config.php';
 
$name = $username = $contact = $gender = $dob = $college = $password = $confirm_password = "";
$name_err = $username_err = $contact_err = $gender_err = $dob_err = $college_err = $password_err = $confirm_password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a email.";
    } else{
        $sql = "SELECT * FROM user WHERE email = ?";
       
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
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
    
    if(empty(trim($_POST['gender']))){
        $gender_err = "Please select gender";     
    } else{
        $gender = trim($_POST['gender']);
        // echo $gender;
    }
    
    if(empty(trim($_POST['contact']))){
        $contact_err = "Please enter a contact no.";     
    } elseif(strlen(trim($_POST['contact'])) < 10){
        $contact_err = "Password must have atleast 10 digits.";
    } else{
        $contact = trim($_POST['contact']);
        // echo $contact;
    }
    
    if(empty(trim($_POST['dob']))){
        $dob_err = "Please enter a date of birth";     
    } else{
        $dob = trim($_POST['dob']);
        // echo $dob;
    }
    
    if(empty(trim($_POST['college']))){
        $college_err = "Please enter a college name.";     
    } else{
        $college = trim($_POST['college']);
        // echo $college;
    }
    

    
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
         $sql = "INSERT INTO user (email, password, name, contact, dob, college, gender,role) VALUES (?, ?, ?, ?, ?, ?, ?,?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "ssssssss", $param_username, $param_password, $param_name, $param_contact, $param_dob, $param_college, $param_gender,$param_role);
            // echo 'hello';
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            $param_name = $name;
            $param_contact = $contact;
            $param_dob = $dob;
            $param_college = $college;
            $param_gender = $gender;
            $param_role = "student";
            // echo $param_gender;
            // echo $param_username;
            if(mysqli_stmt_execute($stmt)){
                header("location: index.php");
            } else{
                ?> <script> alert(' Something went wrong. ') </script> <?php
            }
        }
         
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($conn);
}
?>





		<div class="container">
            <div id="Error">
                
            </div>
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<p class="signupHereTag">Sign Up Here ..</p>
					<form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
           
			           <div class="form-group   <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
			             <label for="" class="sr-only">Name<sup>*</sup></label>
			             <div class="col-sm-12">
			               <input type="text"  name="name"  class="form-control"  placeholder="Name" value="<?php echo $name; ?>" >
			                <span class="help-block"><?php echo $name_err; ?></span>
			             </div>
			           </div>
			            
			           <div class="form-group  <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
			             <label for="" class="sr-only">Email<sup>*</sup></label>
			             <div class="col-sm-12">
			               <input type="email" name="username"  class="form-control"  placeholder="Email"  value="<?php echo $username; ?>">
			                <span class="help-block"><?php echo $username_err; ?></span>
			             </div>
			           </div>
			          
			           <div class="form-group   <?php echo (!empty($gender_err)) ? 'has-error' : ''; ?>">
			             <label for="" class="sr-only">Gender</label>
			             <div class="col-sm-6">
			               <select class="form-control"  name="gender"  placeholder="gender">
			                  <option value="male">Male</option>
			                  <option value="female">Female</option>
			               </select>
			                <span class="help-block"><?php echo $gender_err; ?></span>
			             </div>
			            
			             <label for="" class="sr-only">Date Of Birth</label>
			             <div class="col-sm-6">
			               <input type="text" name="dob"  class="form-control"  placeholder="Date Of Birth"  onfocus="(this.type='date')" onblur="(this.type='text')" value="<?php echo $dob; ?>" >
			                <span class="help-block"> <?php echo $dob_err; ?></span>
			             </div>
			           </div>
			           
			           <div class="form-group   <?php echo (!empty($college_err)) ? 'has-error' : ''; ?>">
			            <label for="" class="sr-only">College</label>
			             <div class="col-sm-6">
			               <input type="text" name="college"  class="form-control"  placeholder="College" value="<?php echo $college; ?>">
			                <span class="help-block"><?php echo $college_err; ?></span>
			             </div>
			            
			            <label for="" class="sr-only">Contact</label>
			             <div class="col-sm-6">
			               <input type="number"  name="contact" class="form-control"  placeholder="Contact" value="<?php echo $contact; ?>">
			                <span class="help-block"><?php echo $contact_err; ?></span>
			             </div>
			           </div>
			          
			           <div class="form-group  <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
			             <label for=""  class="sr-only">Password<sup>*</sup></label>
			             <div class="col-sm-6">
			               <input type="password" name="password" id="signupPassword" class="form-control"  placeholder="Password"  value="<?php echo $password; ?>" autocomplete="off">
			                <span class="help-block"><?php echo $password_err; ?></span>
			             </div>
			            
			             <label for="" class="sr-only">Confirm Password<sup>*</sup></label>
			             <div class="col-sm-6">
			               <input type="password" name="confirm_password" class="form-control" id="signupConfirmPassword" placeholder="Confirm Password"  value="<?php echo $confirm_password; ?>" autocomplete="off">
			                <span class="help-block"><?php echo $confirm_password_err; ?></span>
			             </div>
			          
			           </div>
			           <div class="form-group">
			             <div class="col-sm-offset-3 col-sm-6">
			               <input type="submit" value="Sign In" class="btn btn-primary signupModalSignupButton" style="width: 100%;margin-bottom: 5vh" autocomplete="off">
			             </div>
			           </div>
			         </form>

				</div>
			</div>
		</div>

           
<?php require_once('footer.php'); ?>

    <?php require_once('login_modal.php'); ?>
