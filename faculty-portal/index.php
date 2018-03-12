<?php
ob_start();
session_start();

   /* logout after 10min. */
    
     if(time()-$_SESSION['time']>24*60*60){
        if(isset($_COOKIE['username'])):
            setcookie('username', '', time()-7000000, '/');
        endif;
        if(isset($_COOKIE['name'])):
            setcookie('name', '', time()-7000000, '/');
        endif;if(isset($_COOKIE['role'])):
            setcookie('role', '', time()-7000000, '/');
        endif;
        
        unset($_SESSION['time']);
        session_unset();
        session_destroy();
        setcookie("username", null, time()-3600);
        setcookie("role", null, time()-3600);
        setcookie("name", null, time()-3600);
        header("location: ../index.php");}
    else{
        $_SESSION['time']=time();
    }

    
require_once '../config/config.php';
$facultyRealId = $name = $email1  = $department = $college = $adminRemark = $sparkId = ""; 
if($_SESSION['role']=='faculty')
{
    $role = $_SESSION['role'];
$sql = "SELECT id,name,email,department,adminRemark,sparkId FROM faculty WHERE email = ? and role = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_username,$param_role);
            
            $param_username = $_SESSION['username'];
            $param_role = $_SESSION['role'];
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt,$facultyRealId, $name,$email1,$department,$adminRemark,$sparkId);
                    if(mysqli_stmt_fetch($stmt)){

                        require_once '../header.php';


           ?>         

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-3  studentProfileContainer">
                        <div class="row">
                             <div class="col-sm-12" style="text-align: center;">
                                <img src="<?php echo base_url; ?>uploadFiles/showProfileImage.php?email=<?=$email1 ?>" class="facultyProfileImg" alt="Please Upload Image">
                             </div>
                             <div class="col-sm-12 col-xs-12">
                                <form action="<?php echo base_url; ?>uploadFiles/facultyImageUpload.php"  id="imageForm"  method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="imageId" value="<?php echo $email1; ?>">
                                    <input type="hidden" name="imageRole" value="<?php echo $role; ?>">
                                    <div class="selectImageButtonMobFix">
                                        <input type="file" name="image" id="profileImageUpload" class="inputimage" />
                                        <label for="profileImageUpload" class="selectImageButton"><span class="glyphicon glyphicon-folder-open hidden-sm hidden-xs selectImageButtonTabFix selectImageButtonMobFix" ></span>Change Image</label>
                                    </div>
                                </form>
                             </div>
                        </div>
                        <div class="row studentDetails">
                            <p class="studentProfileDetailsTag  studentProfileUpperMargin">Spark Id</p>
                            <p class="studentProfileDetails"><?php echo $sparkId; ?></p>

                            <p class="studentProfileDetailsTag">Name</p>
                            <p class="studentProfileDetails"><?php echo $name; ?></p>

                            <p class="studentProfileDetailsTag">Department</p>
                            <p class="studentProfileDetails"><?php echo $department; ?></p>

                            <p class="studentProfileDetailsTag">Email</p>
                            <p class="studentProfileDetails"><?php echo $email1; ?></p>

                            <a href="#resetPwd" data-toggle="modal" data-target="#resetPwd" class="footerResetPwd " style="margin-left: 14%; margin-top: -2vh;margin-bottom: 2vh">Reset password</a><br>

                            <a class="btn btn-default facultyProfileLogoutButton" style="margin-left:13%; margin-top: 2vh " href="../logout.php" >Logout</a>
                        </div>
                    </div>
                    <div class="col-sm-9 ">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="container-fluid">
                                     <div class="row" style="margin-top: 0vh;">
                                         <div class="col-sm-6">
                                             <p class="studentProjectTag"><b>PROJECTS</b></p>
                                         </div>
                                        <!-- <div class="col-sm-4 col-sm-offset-2" style="margin-top: -2.5vh">
                                            <input class="form-control projectSearchingInput" id="myInput" type="text" placeholder="Search Projects..">
                                        </div> -->
                                    </div>
                                </div>
                                <div class="TableDiv">
                                    <ul class="nav nav-tabs" role="tablist" >
                                        <li role="presentation" class="active col-sm-2 col-xs-4 facultyProfileTableTag " style="margin-left: 0%"><a class="facultyProfileTableTag0"  href="#application" aria-controls="home" role="tab" data-toggle="tab">Applications</a></li>
                                        <!-- <li role="presentation" class="col-sm-2 col-xs-4 facultyProfileTableTag " ><a class="facultyProfileTableTag1"  href="#allApplications" aria-controls="kill" role="tab" data-toggle="tab">All Applications</a></li> -->
                                        <li role="presentation" class="col-sm-2 col-xs-4 facultyProfileTableTag "><a class="facultyProfileTableTag2"  href="#accepted" aria-controls="kill" role="tab" data-toggle="tab">Approved</a></li>
                                        <li role="presentation" class="col-sm-2 col-xs-4 facultyProfileTableTag "><a class="facultyProfileTableTag3"  href="#yourProjects" aria-controls="profile" role="tab" data-toggle="tab">Your Projects</a></li>
                                        <li role="presentation" class="col-sm-2 col-xs-3 facultyProfileTableTag "><a class="facultyProfileTableTag4"  href="#allProject" aria-controls="kill" role="tab" data-toggle="tab">All Projects</a></li>
                                        <li class="col-sm-2 col-xs-5 facultyProfileTableTag" style="float: right;"> <input class="form-control projectSearchingInput" id="myInput" type="text" placeholder="Search Applications.."> </li>
                                    </ul>
                                    <div class="tab-content  studentTabContentDiv">
                                        <div role="tabpanel" class="tab-pane fade in active" id="application">

                                            <?php include('facultyApplications.php'); ?>
                                        
                                        </div>

                                        <div role="tabpanel" class="tab-pane fade" id="allApplications">
                                            
                                            <?php //include('allApplications.php'); ?>
                                        
                                        </div>

                                        <div role="tabpanel" class="tab-pane fade" id="accepted">
                                            
                                            <?php include('acceptedProject.php'); ?>
                                        
                                        </div>

                                        <div role="tabpanel" class="tab-pane fade" id="yourProjects">
                                            
                                            <?php include('yourProject.php'); ?>
                                        
                                        </div>

                                        <div role="tabpanel" class="tab-pane fade" id="allProject">
                                            
                                            <?php include('allProject.php'); ?>
                                        
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-11 col-sm-offset-0"   id="FetchDetailDiv">
                                <div class="row doctorsStudentContainer">
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                        

                        
                    </div>
                </div>
            </div>

            <div class="container-fluid" style="margin-top: 0vh; ">
                <div class="row">
                    <div class="col-sm-9 col-sm-offset-3">
                        <div class="alert alert-success studentProfileInstructionBox " role="alert">
                            <ul><p class="studentProfileInstructionsTag"> <strong>Instructions :</strong> </p>
                                <li>Size of Image should be less than 500 KB.</li>
                                <li>Each faculty have five choices to set their student according to their priority.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid" >
                <div class="row">
                    <div class="col-sm-9 col-sm-offset-3">
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="facultyProfileComplaintTag" >Add Project</p> <textarea class="form-control facultyProfileComplaintBox" rows="2" cols="55" id="addProjectText" placeholder="Text here .. "></textarea>
                                <input class="btn facultyProfileComplaintButton" type="submit"  onclick="add_project();">
                                <div id="addProjectDiv"></div>
                            </div>
                
                            <div class="col-sm-6 ">
                                <p class="facultyProfileComplaintTag" >Problem/Complaint</p>
                                <textarea class="form-control facultyProfileComplaintBox" rows="2" cols="55" id="complaintText" placeholder="Text here .. "></textarea>
                                <input class="btn facultyProfileComplaintButton" style="margin-bottom: 5vh;" type="submit" name="complaintSubmit" onclick="faculty_complaint();">
                                <div id="complaintDiv"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            

                                <?php if($adminRemark){ ?>
            <div class="container-fluid" style="margin-top: 5vh">
                <div class="row">
                    <div class="col-sm-9 col-sm-offset-3">
                        <div class="alert alert-warning studentProfileStatusBox">
                            <ul>                                                                                                                                  <span style="font-weight: 800">Remark : </span><ul style="margin-left: 5%"> <?php echo $adminRemark; ?></ul>
                             </ul>
                        </div>
                    </div>
                </div>
            </div>        
                            <?php } ?>

                   


    
    <?php require_once('../footer.php');?>
    <?php require_once('../student-portal/resetPassword_modal.php'); ?>


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
            mysqli_close($conn);
        
    }

    
else
      header ("location:../index.php");
    ?>

    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

    <script>
    $(document).ready(function(){
        $("#showResumeButton").click(function(){
            $("#showResume").css("display", "");
            $("#showNOC").css("display","none");
        });
    });
    $(document).ready(function(){
        $("#showNOCButton").click(function(){
            $("#showResume").css("display", "none");
            $("#showNOC").css("display","");
        });
    });
</script>

<script>
    $('#resume').on('change', function () {
        $('#resumeFrom').submit();
    });
    $('#noc').on('change', function () {
        $('#nocForm').submit();
    });
    $('#profileImageUpload').on('change', function () {
        $('#imageForm').submit();
    });

    function resetPassword(){
        var email = "<?php echo $email1; ?>";
        var oldPassword = $('#oldPassword').val();
        var newPassword = $('#newPassword').val();
        var confirmPassword = $('#confirmPassword').val();
        // alert(oldPassword);
        // alert(newPassword);
        // alert(confirmPassword);
        // alert(email);
            $.ajax({
                url: 'facultyResetPassword.php',
                data: {"oldPassword":oldPassword,"newPassword":newPassword,"confirmPassword":confirmPassword,"email":email},
                async: false,
                type: 'POST',          

                success: function(data){
                    $("#resetPasswordDiv").html(data);
                },
                error : function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown+ ' Set.');
                }
            });
        }

    </script>
    <script>
       
    function fetch_student_detail(data){
        var id = data;
     $.ajax({
        url: 'fetchStudentDetail.php',
        data: {"id":id},
        async: true,
        type: 'POST',          

        success: function(data){
            
            $('#FetchDetailDiv').html(data);
     },
       error : function(XMLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown);
        }
        });
 }
    
   
    </script>

    <script>
       
    function faculty_complaint(){
        
        var id = '<?php echo $email1; ?>';
        var complaint = $('#complaintText').val();
        // alert(complaint);
        if(complaint!=''){
     $.ajax({
        url: '../complaint.php',
        data: {"complaintId":id,"complaintText":complaint},
        async: true,
        type: 'POST',          

        success: function(data){
            
            $('#complaintDiv').html(data);
            $('#complaintText').val('');
     },
       error : function(XMLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown);
        }
        });
    }else{
        $('#complaintDiv').html('Insert text');
    }
 }
    
   
    </script>

    <script>
       
    function add_project(){
        
        var id = <?php echo $facultyRealId; ?>;
        var addProjectText = $('#addProjectText').val();
        // alert(id);
        if(addProjectText!=''){
     $.ajax({
        url: 'addProject.php',
        data: {"id":id,"addProjectText":addProjectText},
        async: true,
        type: 'POST',          

        success: function(data){
            
            $('#addProjectDiv').html(data);
            $('#addProjectText').val('');
     },
       error : function(XMLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown);
        }
        });
    }else{
        $('#addProjectDiv').html('Insert text');
    }
 }
    
   
    </script>