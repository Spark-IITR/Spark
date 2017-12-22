<?php
ob_start();
session_start();
require_once '../config/config.php';
$facultyRealId = $name = $email = $contact = $department = $college = ""; 
if($_SESSION['role']=='faculty')
{
    $role = $_SESSION['role'];
$sql = "SELECT id,name,email,contact,department,college FROM user WHERE email = ? and role = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_username,$param_role);
            
            $param_username = $_SESSION['username'];
            $param_role = $_SESSION['role'];
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt,$facultyRealId, $name,$email,$contact,$department,$college);
                    if(mysqli_stmt_fetch($stmt)){

                        require_once '../header.php';


           ?>         

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3  studentProfileContainer">
                <div class="row">
                     <div class="col-sm-12" style="text-align: center;">
                        <img src="../uploadFiles/showProfileImage.php?email=<?=$email ?>" class="studentProfileImg" alt="<?php echo $name; ?>">
                     </div>
                     <div class="col-sm-12">
                        <form action="../uploadFiles/imageUpload.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="imageId" value="<?php echo $email; ?>">
                            <input type="hidden" name="imageRole" value="<?php echo $role; ?>">
                            <input type="file" name="image" id="file" class="inputfile" />
                            <label for="file"><span class="glyphicon glyphicon-folder-open" style="padding-right: 7px"></span><span class="glyphicons glyphicons-folder-open"></span>Choose File</label>
                            <input type="submit" name="submit" class="btn btn-default studentProfileImageSubmitButton" value="Change Image" placeholder="" >
                        </form>
                     </div>
                </div>
                <p class="studentProfileDetailsTag  studentProfileUpperMargin">Name</p>
                <p class="studentProfileDetails"><?php echo $name; ?></p>

                <p class="studentProfileDetailsTag">Department</p>
                <p class="studentProfileDetails"><?php echo $department; ?></p>

                <p class="studentProfileDetailsTag">College</p>
                <p class="studentProfileDetails"><?php echo $college; ?></p>

                <p class="studentProfileDetailsTag">Email</p>
                <p class="studentProfileDetails"><?php echo $email; ?></p>

                <p class="studentProfileDetailsTag">Contact No.</p>
                <p class="studentProfileDetails"><?php echo $contact; ?></p>


                <a class="btn btn-default studentProfileLogoutButton" href="../logout.php" >Logout</a>
            </div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-12">
                        <p class="studentProjectTag">Projects</p>
                        <div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#application" aria-controls="home" role="tab" data-toggle="tab">Applications</a></li>
                                <li role="presentation"><a href="#accepted" aria-controls="kill" role="tab" data-toggle="tab">Approved</a></li>
                                <li role="presentation"><a href="#yourProjects" aria-controls="profile" role="tab" data-toggle="tab">Your Projects</a></li>
                                <li role="presentation"><a href="#allProject" aria-controls="kill" role="tab" data-toggle="tab">All Projects</a></li>
                            </ul>
                            <div class="tab-content" style="max-height: 50vh;overflow: scroll;min-height: 40vh">

                                <div role="tabpanel" class="tab-pane fade in active" id="application">
                                    <table class="table table-striped">
                                        <thead style="font-size: 14px;">
                                            <tr>
                                                
                                                <th title="Field #2">Name</th>
                                                <th title="Field #3">Year</th>
                                                <th title="Field #5">Department</th>
                                                <th title="Field #6">College</th>
                                                <th title="Field #7">Approve</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            <?php 
                                                 $sql    = "select id,name,email,department,college,year,spriority1,spriority2,spriority3 from user where spriority1=$facultyRealId or spriority2=$facultyRealId or spriority3=$facultyRealId";
                                                $result = $conn->query($sql);

                                                while($row=mysqli_fetch_assoc($result)) {
                                                        if($row['spriority1']==$facultyRealId){ ?>
                                                            <tr onclick="fetch_student_detail(<?php echo $row['id']; ?>);" style="cursor: pointer;" >
                                                                <td><?php echo $row['name']; ?></td>
                                                                <td><?php echo $row['year']; ?></td>
                                                                <td><?php echo $row['department']; ?></td>
                                                                <td><?php echo $row['college']; ?></td>
                                                                <td>
                                                                    <div class='btn-group'>
                                                                      <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                                        Priority <span class='caret'></span>
                                                                      </button>
                                                                      <ul class='dropdown-menu'>
                                                                        <li><a href='#'>1st </a></li>
                                                                        <li><a href='#'>2nd </a></li>
                                                                        <li><a href='#'>3rd </a></li>
                                                                        <li><a href='#'>4rd </a></li>
                                                                        <li><a href='#'>5rd </a></li>
                                                                      </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php }else if($row['spriority2']==$facultyRealId){?>

                                                            <tr onclick="fetch_student_detail(<?php echo $row['id']; ?>);" style="cursor: pointer;" >
                                                                <td><?php echo $row['name']; ?></td>
                                                                <td><?php echo $row['year']; ?></td>
                                                                <td><?php echo $row['department']; ?></td>
                                                                <td><?php echo $row['college']; ?></td>
                                                                <td>
                                                                    <div class='btn-group'>
                                                                      <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                                        Priority <span class='caret'></span>
                                                                      </button>
                                                                      <ul class='dropdown-menu'>
                                                                        <li><a href='#'>1st </a></li>
                                                                        <li><a href='#'>2nd </a></li>
                                                                        <li><a href='#'>3rd </a></li>
                                                                        <li><a href='#'>4rd </a></li>
                                                                        <li><a href='#'>5rd </a></li>
                                                                      </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                        <?php }else if($row['spriority3']==$facultyRealId){?>

                                                            <tr onclick="fetch_student_detail(<?php echo $row['id']; ?>);" style="cursor: pointer;" >
                                                                <td><?php echo $row['name']; ?></td>
                                                                <td><?php echo $row['year']; ?></td>
                                                                <td><?php echo $row['department']; ?></td>
                                                                <td><?php echo $row['college']; ?></td>
                                                                <td>
                                                                    <div class='btn-group'>
                                                                      <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                                        Priority <span class='caret'></span>
                                                                      </button>
                                                                      <ul class='dropdown-menu'>
                                                                        <li><a href='#'>1st </a></li>
                                                                        <li><a href='#'>2nd </a></li>
                                                                        <li><a href='#'>3rd </a></li>
                                                                        <li><a href='#'>4rd </a></li>
                                                                        <li><a href='#'>5rd </a></li>
                                                                      </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                        <?php }
                                                    }

                                            ?>

                                            
                                            
                                        </tbody>
                                    </table>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="accepted">
                                    <div class="">
                                        <table class="table table-striped">
                                            <thead style="">
                                                <tr>
                                                    <th title="Field #1">#</th>
                                                    <th title="Field #2">Name</th>
                                                    <th title="Field #3">Department</th>
                                                    <th title="Field #4">E-mail</th>
                                                    <th title="Field #5">Research interests/Tentative projects for summer internship</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myTable">
                                                <tr>
                                                    <td align="right">1</td>
                                                    <td>Uttam Kumar Roy</td>
                                                    <td>Architecture and Planning</td>
                                                    <td>ukroyfap@iitr.ac.in</td>
                                                    <td>Affordable Housing Design, Industrialised Building system, New town and Smart City Development, Building codes</td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="yourProjects">
                                    <div class="">
                                        <table class="table table-striped">
                                            <thead style="">
                                                <tr>
                                                    <th title="Field #1">#</th>
                                                    <th title="Field #5">Research interests/Tentative projects for summer internship</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myTable">
                                                <?php  
                                                $sql    = "select project from user where email='$email'";
                                                $result = $conn->query($sql);
                                                if($result) {
                                                        while($row = $result->fetch_assoc()) {
                                                            echo "
                                                                <tr>
                                                                    <td align='right'>1</td>
                                                                    <td>{$row['project']}</td>
                                                                </tr>";
                                                        }
                                                    
                                                    $result->free();
                                                }
                                                 ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                           

                                <div role="tabpanel" class="tab-pane fade" id="allProject">
                                    <div class="">
                                        <table class="table table-striped">
                                            <?php  
                                                $sql = "select id,name,department,project from user where role='faculty'";
                                                $result = $conn->query($sql);
                                                if($result) {
                                                    if($result->num_rows == 0) {
                                                        echo '<p>There are no files in the database</p>';
                                                    }
                                                    else {
                                                        echo '<thead style="">
                                                                <tr>
                                                                    <th title="Field #1">ID</th>
                                                                    <th title="Field #2">Name</th>
                                                                    <th title="Field #3">Department</th>
                                                                    <th title="Field #4">Research interests/Tentative projects for summer internship</th>
                                                                </tr>
                                                             </thead>';
                                                                 
                                                        while($row = $result->fetch_assoc()) {
                                                            echo "
                                                                <tbody id='myTable'>
                                                                    <tr>
                                                                        <td>{$row['id']}</td>
                                                                        <td>{$row['name']}</td>
                                                                        <td>{$row['department']}</td>
                                                                        <td>{$row['project']}</td>
                                                                        
                                                                    </tr>
                                                                </tbody>";
                                                        }
                                                    }
                                                 
                                                    $result->free();
                                                }
                                            ?>
                                        </table>
                                    </div>
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