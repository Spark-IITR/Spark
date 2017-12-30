<?php
ob_start();
session_start();
require_once '../config/config.php';
$facultyRealId = $name = $email1 = $contact = $department = $college = $adminRemark = $sparkId = ""; 
if($_SESSION['role']=='faculty')
{
    $role = $_SESSION['role'];
$sql = "SELECT id,name,email,contact,department,college,adminRemark,sparkId FROM user WHERE email = ? and role = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_username,$param_role);
            
            $param_username = $_SESSION['username'];
            $param_role = $_SESSION['role'];
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt,$facultyRealId, $name,$email1,$contact,$department,$college,$adminRemark,$sparkId);
                    if(mysqli_stmt_fetch($stmt)){

                        require_once '../header.php';


           ?>         

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3  studentProfileContainer">
                <div class="row">
                     <div class="col-sm-12" style="text-align: center;">
                        <img src="../uploadFiles/showProfileImage.php?email=<?=$email1 ?>" class="studentProfileImg" alt="<?php echo $name; ?>">
                     </div>
                     <div class="col-sm-12 col-xs-12">
                        <form action="../uploadFiles/imageUpload.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="imageId" value="<?php echo $email1; ?>">
                            <input type="hidden" name="imageRole" value="<?php echo $role; ?>">
                            <div class="col-sm-7 col-xs-7"><input type="file" name="image" id="file" class="inputfile" />
                                <label for="file"><span class="glyphicon glyphicon-folder-open hidden-sm" style="padding-right: 7px"></span>Choose File</label></div>
                                <div class="col-sm-5 col-xs-5"><input type="submit" name="submit" class="btn btn-default studentProfileImageSubmitButton inputfile1" value="Change Image" placeholder="" ></div>
                        </form>
                     </div>
                </div>
                <p class="studentProfileDetailsTag  studentProfileUpperMargin">ID</p>
                <p class="studentProfileDetails"><?php echo $sparkId; ?></p>

                <p class="studentProfileDetailsTag">Name</p>
                <p class="studentProfileDetails"><?php echo $name; ?></p>

                <p class="studentProfileDetailsTag">Department</p>
                <p class="studentProfileDetails"><?php echo $department; ?></p>

                <p class="studentProfileDetailsTag">College</p>
                <p class="studentProfileDetails"><?php echo $college; ?></p>

                <p class="studentProfileDetailsTag">Email</p>
                <p class="studentProfileDetails"><?php echo $email1; ?></p>

                <p class="studentProfileDetailsTag">Contact No.</p>
                <p class="studentProfileDetails"><?php echo $contact; ?></p>


                <a class="btn btn-default studentProfileLogoutButton" style="margin-left:2vh; " href="../logout.php" >Logout</a>
            </div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <p class="studentProjectTag">Projects</p>
                        <div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active col-xs-2"><a href="#application" aria-controls="home" role="tab" data-toggle="tab">Applications</a></li>
                                <li role="presentation" class="col-xs-2"><a href="#allApplications" aria-controls="kill" role="tab" data-toggle="tab">All Applications</a></li>
                                <li role="presentation" class="col-xs-2"><a href="#accepted" aria-controls="kill" role="tab" data-toggle="tab">Approved</a></li>
                                <li role="presentation" class="col-xs-2"><a href="#yourProjects" aria-controls="profile" role="tab" data-toggle="tab">Your Projects</a></li>
                                <li role="presentation" class="col-xs-2"><a href="#allProject" aria-controls="kill" role="tab" data-toggle="tab">All Projects</a></li>
                            </ul>
                            <div class="tab-content" style="max-height: 50vh;overflow: scroll;min-height: 40vh">


                                <div role="tabpanel" class="tab-pane fade in active" id="application">

                                    <?php include('facultyApplications.php'); ?>
                                
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="allApplications">
                                    
                                    <?php include('allApplications.php'); ?>
                                
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
                        <li>Size of Image should be less than 100 KB.</li>
                        <li>Each faculty have choices to set their student according to their priority.</li>
                        <li>Once the priorities are selected you will not be able to change it. So, choose priorities carefully after inspecting all the applications.</li>
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
                        Add Project <textarea rows="5" cols="55" id="addProjectText" placeholder="Text here .. "></textarea>
                        <input type="submit"  onclick="add_project();"> 
                        <div id="addProjectDiv"></div>
                    </div>
        
                    <div class="col-sm-6">
                        Problem/Complaint<textarea rows="5" cols="55" id="complaintText" placeholder="Text here .. "></textarea>
                        <input type="submit" name="complaintSubmit" onclick="faculty_complaint();"> 
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
        
        var id = <?php echo $facultyRealId; ?>;
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
        // alert(complaint);
        if(complaint!=''){
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