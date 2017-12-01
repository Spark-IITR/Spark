
<?php

?>

<?php
// require_once 'config.php';
 
// $name = $username = $contact = $gender = $dob = $college = $password = $confirm_password = "";
// $name_err = $username_err = $contact_err = $gender_err = $dob_err = $college_err = $password_err = $confirm_password_err = "";
 
// if($_SERVER["REQUEST_METHOD"] == "POST"){
 
//     if(empty(trim($_POST["username"]))){
//         $username_err = "Please enter a email.";
//     } else{
//         $sql = "SELECT * FROM student WHERE email = ?";
       
//         if($stmt = mysqli_prepare($conn, $sql)){
//             mysqli_stmt_bind_param($stmt, "s", $param_username);
            
//             $param_username = trim($_POST["username"]);
            
//             if(mysqli_stmt_execute($stmt)){
//                 mysqli_stmt_store_result($stmt);
                
//                 if(mysqli_stmt_num_rows($stmt) == 1){
//                     $username_err = "This email is already taken.";
//                 } else{
//                     $username = trim($_POST["username"]);
//                     echo $username;
//                 }
//             } else{
//                 echo "Oops! Something went wrong. Please try again later.";
//             }
//         }
         
//         mysqli_stmt_close($stmt);
//     }

//     /* validators */
//     if(empty(trim($_POST['name']))){
//         $name_err = "Please enter a name.";     
//     }  else{
//         $name = trim($_POST['name']);
//         echo $name;
//     }
    
//     if(empty(trim($_POST['gender']))){
//         $gender_err = "Please select gender";     
//     } else{
//         $gender = trim($_POST['gender']);
//         echo $gender;
//     }
    
//     if(empty(trim($_POST['contact']))){
//         $contact_err = "Please enter a contact no.";     
//     } elseif(strlen(trim($_POST['contact'])) < 10){
//         $contact_err = "Password must have atleast 10 digits.";
//     } else{
//         $contact = trim($_POST['contact']);
//         echo $contact;
//     }
    
//     if(empty(trim($_POST['dob']))){
//         $dob_err = "Please enter a date of birth";     
//     } else{
//         $dob = trim($_POST['dob']);
//         echo $dob;
//     }
    
//     if(empty(trim($_POST['college']))){
//         $college_err = "Please enter a college name.";     
//     } else{
//         $college = trim($_POST['college']);
//         echo $college;
//     }
    

    
//     if(empty(trim($_POST['password']))){
//         $password_err = "Please enter a password.";     
//     } elseif(strlen(trim($_POST['password'])) < 6){
//         $password_err = "Password must have atleast 6 characters.";
//     } else{
//         $password = trim($_POST['password']);
//         echo $password;
//     }
    
//     if(empty(trim($_POST["confirm_password"]))){
//         $confirm_password_err = 'Please confirm password.';     
//     } else{
//         $confirm_password = trim($_POST['confirm_password']);
//         if($password != $confirm_password){
//             $confirm_password_err = 'Password did not match.';
//         }
//     }
//     echo $username_err; echo $password_err; echo $confirm_password_err;
//     if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
//          $sql = "INSERT INTO student (email, password, name, contact, dob, college, gender) VALUES (?, ?, ?, ?, ?, ?, ?)";
         
//         if($stmt = mysqli_prepare($conn, $sql)){
//             mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password, $param_name, $param_contact, $param_dob, $param_college, $param_gender);
//             echo 'hello';
//             $param_username = $username;
//             $param_password = password_hash($password, PASSWORD_DEFAULT); 
//             $param_name = $name;
//             $param_contact = $contact;
//             $param_dob = $dob;
//             $param_college = $college;
//             $param_gender = $gender;
//             echo $param_gender;
//             echo $param_username;
//             if(mysqli_stmt_execute($stmt)){
//                 header("location: contact.php");
//             } else{
//                 echo "Something went wrong. Please try again later.";
//             }
//         }
         
//         mysqli_stmt_close($stmt);
//     }
    
//     mysqli_close($conn);
// }
?>
 

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
                            header("location: contact.php");
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

<?php require_once 'header.php' ?>

   <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin-top: -2vh; width: 98vw; margin-left: 1vw">
     <ol class="carousel-indicators">
       <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
       <li data-target="#carousel-example-generic" data-slide-to="1"></li>
       <li data-target="#carousel-example-generic" data-slide-to="2"></li>
     </ol>
    
     <div class="carousel-inner" role="listbox">
       <div class="item active">
         <img src="src/img/slider1.jpg" alt="slider1" class="indexSliderImage">
         <div class="carousel-caption">
         </div>
       </div>
       <div class="item">
         <img src="src/img/slider2.jpg" alt="slider2" class="indexSliderImage">
         <div class="carousel-caption">
         </div>
       </div>
       <div class="item">
         <img src="src/img/slider3.jpg" alt="slider3"  class="indexSliderImage">
         <div class="carousel-caption">
         </div>
       </div>
     </div>

     <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
       <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
       <span class="sr-only">Previous</span>
     </a>
     <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
       <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
       <span class="sr-only">Next</span>
     </a>
   </div>

   <div class="container-fluid">
      <div class="row" id="aboutUs">
         <div class="col-sm-10 col-sm-offset-1">
            <p class="indexIntroductionTag">ABOUT SPARK</p>
                <p class="indexIntroductionText text-justify">Starting from 2018, IIT Roorkee will have <strong>100</strong> institute-funded SPARK fellowships for summer
                    internships with a weekly stipend of<strong> Rs. 2500/week.</strong> </p>

                <div class="row" id="objectives">
                <p class="indexObjectiveTag"><strong>Program Objectives</strong></p>
                <p class="indexObjectiveText text-justify">
                <ul class="indexGuidelines">
                    <li>
                        To provide research exposure to interested undergraduate students of IITR.
                    </li>
                    <li>
                        To attract and nurture talented undergraduate students of other institutes. Some of these
                        students may then choose to apply for postgraduate or doctoral studies at IITR.
                    </li>
                </ul>
                </p>
            </div>

            <div class="row">
                <p class="indexObjectiveTag"><strong>Eligibility</strong></p>
                <p class="indexObjectiveText text-justify">
                <ul class="indexGuidelines">
                    <li>
                        Students who are currently enrolled and have completed at least two
                        semesters of the undergraduate degree (B.Arch./B.E./B.Tech./M.Sc) in a relevant discipline
                        from any institute in India.
                    </li>
                    <li>
                        Following CGPA criterion will apply:
                        <ul>
                            <li>CGPA&gt;7.5 for IITs/IISc.</li>
                            <li>CGPA&gt;8.0 for NITs/ IISERs/ NISER/IIEST.</li>
                            <li>CGPA&gt;8.5 for students of other institutes.</li>
                        </ul>
                    </li>
                </ul>
                </p>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <p class="indexGuidelinesTag" id="guidelines">GUIDELINES</p>
            <ul class="indexGuidelines">

                <li>
                    Applications need to be submitted through an online portal made for the purpose where the
                    applicants will upload the transcripts (marksheets), photograph, a 500-word research
                    statement, and a brief 1-2 page resume. For students of other institutes, no objection
                    certificate (NOC) and letter of recommendation(s) will also be sought.
                </li>
                <li>
                    Applicants need to mention names of three faculty members of their choice from the list of
                    faculty members interested in having a summer intern.
                </li><li>
                Application submission deadline will be February 28 and decision on applications will be
                made by March 15. Summer training will be held during the scheduled summer vacation at
                IITR, or a shorter term if the applicant is not available for the entire period. However, the
                term of the summer training should not be less than 6 weeks. Students of IITR will be
                allowed to begin their summer internship immediately after the completion of the term-end
                examination.
            </li>
                <li>
                    All candidates selected for either the SPARK program or project funding will be provided
                    accommodation and mess facilities in the Bhawans, subject to payment of necessary charges
                    at par with that paid by students living in hostels.
                </li>
                <li>
                    All interns will be issued a temporary institute ID to avail the library, sports, medical,
                    computer centre, internet, and other institute and departmental research and recreation
                    facilities. S/he will be required to abide by the conduct rules of the institute, failing which the
                    internship will be terminated and the intern will be asked to leave.
                </li>
                <li>
                    There will be an open poster presentation by all SPARK fellows near the completion of the
                    summer internship and three best poster awards will be given.
                </li>
                <li>
                    At the successful completion of the internship, a certificate from the institute with the name
                    of the intern and mentor, signed by Dean, SRIC, will be issued to the SPARK fellows. Project
                    funded interns can get a certificate from the mentor on his/her letterhead.
                </li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <p class="indexGuidelinesTag" id="timeline">Important Dates</p>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Description</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Faculties and their Research work announced</td>
                    <td>15th Jan 2018</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Online Application Starts</td>
                    <td>15th January 2018</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Online Application Closed</td>
                    <td>15th March 2018</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Application Submission Deadline</td>
                    <td>28th February 2018</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Result Anoouncement</td>
                    <td>15th March 2018</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-3" style="text-align: center;margin-bottom:5vh;">
            <button class="indexApplyNowButton"><span class="glyphicon glyphicon-ok-circle"> APPLY NOW</span></button>
        </div>
    </div>
</div>



<footer>
    <div class="footer" id="footer">
        <div class="container">
            <div class="row" style="align-content: center;">
                <div class="col-lg-1  col-md-1 hidden-sm hidden-xs">
                </div>
                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-6  indexContactUs" >
                    <h3> Portals </h3>
                    <ul>
                        <li> <a href="https://www.iitr.ac.in/Main/pages/_en_Indian_Institute_of_Technology_Roorkee__en_.html"> IIT Roorkee Official Website </a> </li>
                        <li> <a href="https://www.iitr.ac.in/institute/pages/The_Institute.html"> About IIT Roorkee  </a> </li>
                        <li> <a href="https://www.iitr.ac.in/campus_life/pages/index.html"> Campus Life @ IITR </a> </li>
                        <li> <a href="https://www.iitr.ac.in/administration/pages/Institute_Central_Administration.html"> Administration IITR </a> </li>
                        <li> <a href="https://www.iitr.ac.in/institute/pages/How_to_reach_IIT_Roorkee.html"> Reach IITR </a> </li>
                    </ul>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-6  indexContactUs">
                    <h3> Academics </h3>
                    <ul>
                        <li> <a href="https://www.iitr.ac.in/Main/pages/_en_Departments__en_.html"> Departments of IIT Roorkee  </a> </li>
                        <li> <a href="https://www.iitr.ac.in/Main/pages/_en_Centers__en_.html"> Centres @ IIT Roorkee </a> </li>
                        <li> <a href="https://www.iitr.ac.in/administration/pages/Administration+DOFA+DOFA.html"> Faculty @ IITR </a> </li>

                    </ul>
                </div>


                <div class="col-lg-4  col-md-5 col-sm-8 col-xs-8 indexContactUs">
                    <h3> Contact Us </h3>
                    <ul>
                        <li>
                            <div class="input-append  text-left" style="color: #000">
                                <p><strong>For Programme related issues:</strong></p>
                                <ul style="margin-top: 0px">
                                    <li><a href="https://www.iitr.ac.in/departments/CH/pages/People+Prateek_Jha.html" style="color: blue">Dr. Prateek Kumar Jha</a></li>
                                    <li>Assistant Professor</li>
                                    <li><a href="https://www.iitr.ac.in/departments/CH/pages/index.html" >Department of Chemical Engineering,IIT Roorkee</a></li>
                                    <li>Telephone: +91-1332-284810 (O)</li>
                                </ul>
                            </div>
                        </li>
                    </ul>

                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left"> Copyright © 2017, All Rights Reserved, Indian Institute of Technology, Roorkee </p>
            <div class="pull-right">
                <ul class="social">
                    <li> <a href="#"> <i class="fa fa-facebook">   </i> </a> </li>
                </ul>
            </div>
        </div>
    </div>
    <!--/.footer-bottom-->
</footer>




<div>
    <footer class="container-fluid footerBottom text-center">
        <p>For Technical Assistance Contact:  Prashant Verma (+91-9919431223) Pratham Gupta (+91-8126119585)</p>
    </footer>
</div>


         



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
                <a href=""  data-toggle="modal" data-target="#signup" id="signupModalShow" data-dismiss="modal" style="text-decoration: none;">Don't Have Account</a>
            </div>
           </div> 
         </form>
         </div>
      </div>
     </div>
   </div>


   <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
     <div class="modal-dialog modal-md" role="document">
       <div class="modal-content">
         <div class="modal-header" style="background-color: #aaa">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title loginModalHeader">Sign Up</h4>
         </div>
         <div class="modal-body">
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
          
           <div class="form-group   <?php echo (!empty($gender_err)) ? 'has-error' : ''; ?>">
             
             <label for="inputEmail3" class="sr-only">Gender</label>
             <div class="col-sm-6">
               <select class="form-control"  name="gender" id="inputEmail3" placeholder="gender">
                  <option value="male">Male</option>
                  <option value="female">Female</option>
               </select>
                <span class="help-block"><?php echo $gender_err; ?></span>
             </div>
            
             <label for="inputEmail3" class="sr-only">Date Of Birth</label>
             <div class="col-sm-6">
               <input type="text" name="dob"  class="form-control" id="inputEmail3" placeholder="Date Of Birth"  onfocus="(this.type='date')" onblur="(this.type='text')" value="<?php echo $dob; ?>" >
                <span class="help-block"> <?php echo $dob_err; ?></span>
             </div>
           </div>
           
           <div class="form-group   <?php echo (!empty($college_err)) ? 'has-error' : ''; ?>">
            <label for="inputEmail3" class="sr-only">College</label>
             <div class="col-sm-6">
               <input type="text" name="college"  class="form-control" id="inputEmail3" placeholder="College" value="<?php echo $college; ?>">
                <span class="help-block"><?php echo $college_err; ?></span>
             </div>
            
            <label for="inputEmail3" class="sr-only">Contact</label>
             <div class="col-sm-6">
               <input type="number"  name="contact" class="form-control" id="inputEmail3" placeholder="Contact" value="<?php echo $contact; ?>">
                <span class="help-block"><?php echo $contact_err; ?></span>
             </div>
           </div>
          
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
     </div>
   </div>


<script>

function form_validator(){
      
      var pass = $("#signupPassword").val();
      var conf = $("#signupConfirmPassword").val();
      if(pass!=conf){
          $("#error_reset_msg").text("Passwords don't match"); 
          return false;
      }
  }


</script>



   <script src="src/js/jquery.min.js"></script>
    <script src="src/js/bootstrap.min.js"></script>
</body>