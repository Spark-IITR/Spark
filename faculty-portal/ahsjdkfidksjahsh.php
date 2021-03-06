
<?php
require_once '../config/config.php';
?>
<link rel="icon" href="../../favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="<?php echo base_url; ?>src/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url; ?>src/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="<?php echo base_url; ?>src/css/index1.css" rel="stylesheet">
    <link href="<?php echo base_url; ?>src/css/index1Tab.css" rel="stylesheet">
    <link href="<?php echo base_url; ?>src/css/index1Mob.css" rel="stylesheet">
    <script src="<?php echo base_url; ?>src/js/bootstrap.min.js"></script>



<?php
// require_once '../header.php';

$name = $username = $contact = $gender = $dob = $department = $password = $confirm_password = $sparkId = "";
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
                    $query = "SELECT sparkId from faculty order by id desc limit 1";
                    $result = $conn->query($query);
                    if(!$result->num_rows == 0){
                        while($row = $result->fetch_assoc()) {
                        
                        $a = $row['sparkId'];
                        $a =  $a[3].$a[4].$a[5].$a[6].$a[7]+1;
                        $sparkId = "SPF".$a;
                        }
                    }else{
                        $sparkId = "SPF18001";
                    }
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
    
   
    
    if(empty(trim($_POST['contact']))){
        $contact_err = "Please enter a contact no.";     
    } elseif(strlen(trim($_POST['contact'])) < 10){
        $contact_err = "Password must have atleast 10 digits.";
    } else{
        $contact = trim($_POST['contact']);
        // echo $contact;
    }
    
    
    
    if(empty(trim($_POST['department']))){
        $department_err = "Please enter a department name.";     
    } else{
        $department = trim($_POST['department']);
        // echo $department;
    }
    

    
    // if(empty(trim($_POST['password']))){
    //     $password_err = "Please enter a password.";     
    // } elseif(strlen(trim($_POST['password'])) < 6){
    //     $password_err = "Password must have atleast 6 characters.";
    // } else{
    //     $password = trim($_POST['password']);
    //     // echo $password;
    // }
    
    // if(empty(trim($_POST["confirm_password"]))){
    //     $confirm_password_err = 'Please confirm password.';     
    // } else{
    //     $confirm_password = trim($_POST['confirm_password']);
    //     if($password != $confirm_password){
    //         $confirm_password_err = 'Password did not match.';
    //     }
    // }

    $password = "L#o&fk&Dy";
    $confirm_password = "L#o&fk&Dy";
    // echo $username_err; echo $password_err; echo $confirm_password_err;
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
         $sql = "INSERT INTO faculty (email, password, name,contact,department,role,sparkId) VALUES (?,?,?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "sssssss", $param_username, $param_password, $param_name, $param_contact, $param_department, $param_role, $param_sparkId);
            // echo 'hello';
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            $param_name = $name;
            $param_contact = $contact;
            $param_department = $department;
            $param_role = "faculty";
            // $param_project = $_POST['project'];
            $param_sparkId = $sparkId;
            // echo $param_gender;
            // echo $param_username;
            if(mysqli_stmt_execute($stmt)){
               // echo 'hello';
                // header("location: index.php");
            header('Location: '.base_url.'index.php');
                

            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // mysqli_stmt_close($stmt);
    }
    
    mysqli_close($conn);
}
?>
 

<?php //include('../header.php'); ?>


<div class="container">
            <p style="text-align: center;color:#0068ee;font-size: 3vw;margin-bottom: 5vh ">Faculty Signup</p>   
         
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                
            
           <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
           
               <div class="form-group">
                 <label  class="sr-only">Name<sup>*</sup></label>
                 <div class="col-sm-12">
                   <input type="text"  name="name"  class="form-control"  placeholder="Name" value="<?php echo $name; ?>" >
                    <span class="help-block"><?php echo $name_err; ?></span>
                 </div>
               </div>
            
               <div class="form-group">
                 <label  class="sr-only">Email<sup>*</sup></label>
                 <div class="col-sm-12">
                   <input type="email" name="username"  class="form-control"  placeholder="Email"  value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                 </div>
               </div>
          
               <div class="form-group ">
                 <label  class="sr-only ">department</label>
                 <div class="col-sm-6 col-xs-6">
                   <input type="text" name="department"  class="form-control"  placeholder="Department" value="<?php echo $department; ?>">
                    <span class="help-block"><?php echo $department_err; ?></span>
                 </div>
                 <label  class="sr-only ">Website Link</label>
                 <div class="col-sm-6 col-xs-6">
                   <input type="text" name="Website Link"  class="form-control facultyRegisterInput"   placeholder="Website Link" value="">
                   <span class="help-block"></span>
                 </div>
               </div>
            <div class="form-group ">
            <label  class="sr-only">Contact</label>
             <div class="col-sm-6 col-xs-6">
               <input type="number"  name="contact" class="form-control"  placeholder="Contact" value="<?php echo $contact; ?>">
                <span class="help-block"></span>
             </div>
           </div>
          
          <!--  <div class="form-group">
             <label   class="sr-only">Password<sup>*</sup></label>
             <div class="col-sm-6 col-xs-6">
               <input type="password" name="password" id="signupPassword" class="form-control"  placeholder="Password"  value="<?php //echo $password; ?>" autocomplete="false">
                <span class="help-block"><?php //echo $password_err; ?></span>
             </div>

             <label  class="sr-only">Confirm Password<sup>*</sup></label>
             <div class="col-sm-6 col-xs-6">
               <input type="password" name="confirm_password" class="form-control" id="signupConfirmPassword" placeholder="Confirm Password"  value="<?php //echo $confirm_password; ?>" autocomplete='false'>
                <span class="help-block"><?php //echo $confirm_password_err; ?></span>
             </div>
            
           </div>
 -->
           <!-- <div class="form-group">
             <label for="inputEmail3" class="sr-only">Name<sup>*</sup></label>
             <div class="col-sm-12 col-xs-6">
               <textarea  name="project"  class="form-control" ></textarea>
                <span class="help-block"></span>
             </div>
           </div> -->
           <div class="form-group">
             <div class="col-sm-offset-2 col-sm-10">
               <input type="submit" id="signUpSubmit" value="Sign In" class="btn btn-primary signupModalSignupButton">
             </div>
           </div>
         </form>
        </div> 
    </div>
        </div>

        <!-- <script>
            $(document).ready(function(){
                $('#signUpSubmit').click(function(){
                    $(":input").val('');
                });
            });
        </script> -->


    <!-- <script src="src/js/bootstrap.min.js"></script>
    <script src="src/js/jquery.js"></script>
    <script src="src/js/facultyRegister.js"></script> -->
</body>

</html>
