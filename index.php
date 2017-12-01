
<?php

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

    <div class="container-fluid">
        <div class="row">
            <?php require_once 'header.php' ?>
        </div>
    </div>

   <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin-top: -2vh; width: 98vw; margin-left: 1vw" id="top">
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

   <div >
        <a href="#top"><span class="glyphicon glyphicon-chevron-up moveToUpButton" aria-hidden="true"></span></a>
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
                <ul class="indexGuidelines text-justify" style="padding-right: 5%">
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
                <ul class="indexGuidelines text-justify" style="padding-right: 5%">
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
            <ul class="indexGuidelines text-justify" style="padding-right: 5%">

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

    


    <div class="row" style="margin-top: 5vh">
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


<?php require_once('footer.php'); ?>

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
                <a href="signup.php" id="signupModalShow" data-dismiss="modal" style="text-decoration: none;">Don't Have Account</a>
            </div>
           </div> 
         </form>
         </div>
      </div>
     </div>
   </div>

  




   
</body>