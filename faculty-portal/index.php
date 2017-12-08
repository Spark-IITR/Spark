<?php
ob_start();
session_start();
require_once '../config/config.php';
$name = $email = $contact = $department = $college = ""; 
if(isset($_SESSION['role'])=='faculty')
{
    $role = $_SESSION['role'];
$sql = "SELECT name,email,contact,department,college FROM user WHERE email = ? and role = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_username,$param_role);
            
            $param_username = $_SESSION['username'];
            $param_role = $_SESSION['role'];
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $name,$email,$contact,$department,$college);
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
                            <input type="submit" name="submit" class="btn btn-primary studentProfileImageSubmitButton" value="Change Image" placeholder="" >
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


                <a class="btn btn-primary studentProfileLogoutButton" href="../logout.php" >Logout</a>
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
                            <div class="tab-content" style="max-height: 50vh;overflow: scroll;">

                                <div role="tabpanel" class="tab-pane fade in active" id="application">
                                    <table class="table table-striped">
                                        <thead style="font-size: 14px;">
                                            <tr>
                                                <th title="Field #1">#</th>
                                                <th title="Field #2">Name</th>
                                                <th title="Field #3">College</th>
                                                <th title="Field #5">Tentative projects for summer internship</th>
                                                <th title="Field #6">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            <tr>
                                                <td align="right">1</td>
                                                <td>Uttam Kumar Roy</td>
                                                <td>Indian Institute of technology, IIT Roorkee</td>
                                                <td>Affordable Housing Design, Industrialised Building system, New town and Smart City Development, Building codes</td>
                                                <td><span class="glyphicon glyphicon-ok-circle studentProjectStatus" style="color: green"></span></td>
                                            </tr>
                                            <tr>
                                                <td align="right">2</td>
                                                <td>Prashant verma</td>
                                                <td>Indian Institute of technology, IIT Roorkee</td>
                                                <td>Affordable Housing Design, Industrialised Building system, New town and Smart City Development, Building codes</td>
                                                <td><span class="glyphicon glyphicon-ok-circle studentProjectStatus" style="color: green"></span></td>
                                            </tr>
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
                                                                    <th title="Field #5">Set Priority</th>
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
            </div>

                <div class="row">
                    <div class="col-sm-10 col-sm-offset-0">
                        <div class="row doctorsStudentContainer" >
                            <div class="col-sm-4" style="text-align: center;">
                                <img src="<?php echo base_url; ?>src/img/iitrLogo.png" alt="prashant" class="doctorsStudentTabImg" >
                                <p class="doctorsStudentTabName">Prashant Verma</p>
                                <p class="doctorsStudentTabYear">2nd Year, B.Tech</p>
                            </div>
                            <div class="col-sm-2" style="font-weight: 700">
                                <p>Email : </p>
                                <p>Contact : </p>
                                <p>D.O.B : </p>
                                <p>Department:</p>
                                <p>College : </p>
                                <p>Project :</p>
                            </div>
                            <div class="col-sm-6">
                                <p>prashantverma1223@gmail.com</p>
                                <p>9919431223</p>
                                <p>09/12/1999</p>
                                <p>Chemical Engineering</p>
                                <p>Indian institute of technology, Roorkee</p>
                                <p>Affordable Housing Design, Industrialised Building system, New town and Smart City Development, Building codes</p>
                            </div>
                            <div class="col-sm-6 col-sm-offset-6">
                                <div class="row">
                                    <div class="col-sm-3" style="text-align: center;">
                                        <input type="submit" name="" class="btn btn-default studentProfileImageSubmitButton" value="Resume" placeholder="" >
                                    </div>
                                   <div class="col-sm-3" style="text-align: center;">
                                        <input type="submit" name="" class="btn btn-default studentProfileImageSubmitButton" value="NOC/LOR" placeholder="" >
                                    </div>
                                    <div class="col-sm-6" style="text-align: center;">
                                        <input type="submit" name="" onclick="return confirm('Do you want to accept the application of Prashant Verma')" class="btn btn-primary studentProfileImageSubmitButton" value="Accept Application" placeholder="" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-bottom: 5vh;padding-left: 5%">
                    <div class="col-sm-2" style="font-size: 1.2vw">
                        Add Remark :                     
                    </div>
                    <div class="col-sm-7">
                         <textarea class="facultyAddRemark" rows="4" cols="50"></textarea>
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