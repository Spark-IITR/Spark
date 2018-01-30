<?php
ob_start();
session_start();

   /* logout after 5min. */
    
    if(time()-$_SESSION['time']>5*60*60){
        unset($_SESSION['time']);
        setcookie("username", "", time()-3600);
        setcookie("role", "", time()-3600);
        setcookie("name", "", time()-3600); 
        session_destroy();
        header("location: ../index.php");}
    else{
        $_SESSION['time']=time();
    }

require_once '../config/config.php';
$name = $email =  ""; 
if($_SESSION['role']=='admin')
{
$role = $_SESSION['role'];

$sql = "SELECT name,email FROM admin WHERE email = ? and role = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_username,$param_role);
            
            $param_username = $_SESSION['username'];
            $param_role = $_SESSION['role'];
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $name,$email);
                    if(mysqli_stmt_fetch($stmt)){

                        require_once '../header.php';
                        
           ?>         


           <!-- <div class="container-fluid">
               <div class="row">
                   <div class="col-sm-6 col-sm-offset-3">
                        <input type="number" class="form-control" placeholder="ID..." name="facultyName" id="facultyName" onkeyup="fetch_faculty_name(this.value)">
                        <div id="FetchFacultyNameDiv"></div>
                   </div>
               </div>
           </div>

           <script>
                function fetch_faculty_name(data){
                        var id = data;
                     $.ajax({
                        url: 'fetchFacultyName.php',
                        data: {"id":id},
                        async: true,
                        type: 'POST',          

                        success: function(data){
                            
                            $('#FetchFacultyNameDiv').html(data);
                     },
                       error : function(XMLHttpRequest, textStatus, errorThrown) {
                            alert(errorThrown);
                        }
                        });
                 }
           </script> -->

            <div class="container-fluid">
                <div class="row" style="margin-top: -3vh;margin-left: .5%">
                    <div class="col-sm-6">
                        <h3>Welcome Admin</h3>
                    </div>
                    <div class="col-sm-4 col-sm-offset-2">
                        <form action="exportCsv.php" method="post">
                            <input type="submit" name="export" class="btn btn-primary" value="Export Student CSV" style="float: right;margin-right: 10%;margin-top: 2vh">
                        </form>
                        <form action="exportFacultyCsv.php" method="post">
                            <input type="submit" name="export" class="btn btn-primary" value="Export Faculty CSV" style="float: right;margin-right: 10%;margin-top: 2vh">
                        </form>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row" style="margin-top: 5vh">
                    <div class="col-sm-10 col-sm-offset-1">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation"   class="active"><a href="#application" role="tab" data-toggle="tab">Applications</a></li>
                            <li role="presentation"><a href="#faculty"  role="tab" data-toggle="tab">Faculty Profile</a></li>
                            <li role="presentation"><a href="#sparkFunding"  role="tab" data-toggle="tab">Spark</a></li>
                            <li role="presentation"><a href="#projectFunding"  role="tab" data-toggle="tab">Project</a></li>
                            <li role="presentation"><a href="#complaintStudent"  role="tab" data-toggle="tab">Student Complaint</a></li>
                            <li role="presentation"><a href="#complaintFaculty"  role="tab" data-toggle="tab">Faculty Complaint</a></li>
                            <li style="float: right;margin-top: -5vh"> <input class="form-control projectSearchingInput" id="myInput" type="text" placeholder="Search Applications.."> </li>
                        </ul>

                 <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="application" style="max-height: 100vh;overflow: scroll;width:100%">

                                <?php include 'applicationTable.php'; ?>

                                <div class="row">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="row doctorsStudentContainer FetchStudentDetailDiv"  >

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="faculty">
                                <?php include 'facultyTable.php'; ?>
                                <div class="row">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="row doctorsStudentContainer FetchFacultyDetailDiv"  >


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="sparkFunding">
                                
                                <?php include 'sparkFunding.php'; ?>
                                <div class="row">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="row doctorsStudentContainer FetchStudentDetailDiv"  >


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="projectFunding">
                                
                                <?php include 'projectFunding.php'; ?>
                                <div class="row">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="row doctorsStudentContainer FetchStudentDetailDiv"  >


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="complaintStudent">
                                
                                <?php include 'complaintStudent.php'; ?>
                                <div class="row">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="row doctorsStudentContainer FetchStudentDetailDiv"  >


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="complaintFaculty">
                                
                                <?php include 'complaintFaculty.php'; ?>
                                <div class="row">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="row doctorsStudentContainer FetchFacultyDetailDiv"  >


                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div id="DeleteApplicationDiv">
                    
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
       
    function fetch_student_detail(data){
        var id = data;
     $.ajax({
        url: 'fetchStudentDetail.php',
        data: {"id":id},
        async: true,
        type: 'POST',          

        success: function(data){
            
            $('.FetchStudentDetailDiv').html(data);
     },
       error : function(XMLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown);
        }
        });
 }


 function fetch_faculty_detail(data){
        var id = data;
     $.ajax({
        url: 'fetchFacultyDetail.php',
        data: {"id":id},
        async: true,
        type: 'POST',          

        success: function(data){
            
            $('.FetchFacultyDetailDiv').html(data);
     },
       error : function(XMLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown);
        }
        });
 }
    
 function delete_application(data){
    var id = data;
    var x = confirm('Do you want to delete his/her Application? It will be deleted Permanently . ')

    if(x==true){
     $.ajax({
        url: 'deleteApplication.php',
        data: {"id":id},
        async: true,
        type: 'POST',          

        success: function(data){
            
            $('#DeleteApplicationDiv').html(data);
        },
       error : function(XMLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown);
            }
        });
    }
 }

    </script>


    <script>
       
    function admin_remark_faculty(data){
        
        var id = data;
        var remark = $('#remarkText').val();
        // alert(remark);
        if(remark!=''){
     $.ajax({
        url: 'adminRemarkFaculty.php',
        data: {"remarkId":id,"remarkText":remark},
        async: true,
        type: 'POST',          

        success: function(data){
            
            $('#remarkDiv').html(data);
            $('#remarkText').val('');
     },
       error : function(XMLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown);
        }
        });
    }else{
        $('#remarkDiv').html('Insert text');
    }
 }
    
   
    </script>

    <script>
       
    
    </script>