   
    <?php 
        $main_username = $main_role = $main_name = '';
        $main_username = $_COOKIE["username"];
        $main_role = $_COOKIE['role'];
        $main_name = $_COOKIE['name'];
        // echo $main_role;
        // echo $main_username;
        // echo $main_name;

        require_once 'header.php';
     ?>
       

   <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin-top: -2vh; width: 98vw; margin-left: 1vw" id="top">
     <ol class="carousel-indicators">
       <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
       <li data-target="#carousel-example-generic" data-slide-to="1"></li>
       <li data-target="#carousel-example-generic" data-slide-to="2"></li>
     </ol>
    
     <div class="carousel-inner" role="listbox">
       <div class="item active">
         <img src="src/img/slider1.jpg" alt="slider1" class="indexSliderImage responsive">
         <div class="carousel-caption">
         </div>
       </div>
       <div class="item">
         <img src="src/img/slider2.jpg" alt="slider2" class="indexSliderImage responsive">
         <div class="carousel-caption">
         </div>
       </div>
       <div class="item">
         <img src="src/img/slider3.jpg" alt="slider3"  class="indexSliderImage responsive">
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
                <p class="indexIntroductionText text-justify">IIT Roorkee invites applications for institute-funded SPARK fellowships for summer internships with a weekly stipend of
                    Rs. <strong>2500/week</strong> and project-funded summer internships.</p>

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
                        Following minimum CGPA criterion will apply:
                        <ul>
                            <li>CGPA &gt; 7.5 for IITs/IISc.</li>
                            <li>CGPA &gt; 8.0 for NITs/ IISERs/ NISER/IIEST.</li>
                            <li>CGPA &gt; 8.5 for students of other institutes.</li>
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
                    Please login to submit your application and view status of your application.
                </li>
                <li>
                    Applications need to be submitted through an online portal made for the purpose where the
                    applicants will upload the transcripts, photograph, a 500-word research
                    statement, and a brief 1-2 page resume. For students of other institutes, No Objection
                    Certificate (NOC) and letter of recommendation(s)(LOR) will also be sought.
                </li>
                <li>
                    Applicants need to mention names of five faculty members of their choice from the list of
                    faculty members interested in having a summer intern.
                </li>

                <li>
                Application submission deadline will be February -- and decision on applications will be
                made by March -- .Summer training will be held during the scheduled summer vacation at IITR (14th May-8th July),
                    or a shorter term if the applicant is not available for the entire period.
                    However, the term of the summer training should not be less than 6 weeks.
                    Students of IITR will be allowed to begin their summer internship immediately after the completion of the term-end examination.
            </li>
            <li>
                    Accommodation and mess facilities in the Bhawans, subject to payment of necessary charges
                    at par with that paid by students living in hostels. The average cost of housing would be around Rs.<strong>3500/month</strong> (including mess facility).
                </li>
                <li>
                    All interns will be issued a temporary institute ID to avail the library, sports, medical,
                    computer centre, internet, and other institute and departmental research and recreation
                    facilities. S/He will be required to abide by the conduct rules of the institute, failing which the
                    internship will be terminated and the intern will be asked to leave.
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
       <div class="alert alert-info indexNoticeTag">
           <strong>NOTICE</strong>
           <ul class="">
               <li class="list-group-item indexNotice">The Application portal shall open by 22nd Jan, 2018(tentative). After then only students can apply.
               <br> Students can see the list of projects available in the Projects Section of the website. <!--<span class="badge">12th JAN (Tentative)</span>--></li>
           </ul>
       </div>
           </div>
       </div>
<!--  The Table showing Dates -->
<!--    <div class="row" style="margin-top: 5vh">
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
                    <td>Application Submission Deadline</td>
                    <td>28th February 2018</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Result Announcement</td>
                    <td>15th March 2018</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>-->

    <div class="row">
        <div class="col-sm-6 col-sm-offset-3" style="text-align: center;margin-bottom:5vh;">



            <?php if($main_role='student'){ ?>

            <a href="<?php echo base_url_student; ?>" class="indexApplyNowButton" ><span class="glyphicon glyphicon-ok-circle"> APPLY NOW</span></a>

            <?php } else{?>

            <a href="#login" data-toggle="modal" data-target="#login" class="indexApplyNowButton" ><span class="glyphicon glyphicon-ok-circle">APPLY NOW</span></a>

            
            <?php }?>

        </div>
    </div>
</div>


    <?php require_once('footer.php'); ?>

    <?php require_once('login_modal.php'); ?>
  

  




   
</body>