<?php
ob_start();
session_start();
require '../config/config.php';
$studentRealId = $name = $email = $contact = $department = $college = ""; 

if($_SESSION['role']=='student')
{
	$role = $_SESSION['role'];

$sql = "SELECT id,name,email,contact,department,college,recommendStatus,recommendedFaculty,fundingType FROM user WHERE email = ? and role = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_username,$param_role);
            
            $param_username = $_SESSION['username'];
            $param_role = $_SESSION['role'];
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $studentRealId ,$name,$email,$contact,$department,$college,$recommendStatus,$recommendedFaculty,$fundingType);
                    if(mysqli_stmt_fetch($stmt)){

                        require_once '../header.php';



                        	/* fetch applied projects*/
                        	 $sql    = "select spriority1,spriority2,spriority3 from user where id=$studentRealId";
							$result = $conn->query($sql);

							if(!$result->num_rows == 0) {
						       $row = $result->fetch_assoc();
						       $spriority1FacultyId =  $row['spriority1'];
						       $spriority2FacultyId =  $row['spriority2'];
						       $spriority3FacultyId =  $row['spriority3'];
					             
					             /* fetch details of first priority */
					              $sql1    = "select id,name,department,project from user where id=$spriority1FacultyId";
							      $result1 = $conn->query($sql1);
									if(!$result1->num_rows == 0) {
								    	$row1 = $result1->fetch_assoc();

								    	$spriority1FacultyName = $row1['name'];
								    	$spriority1FacultyDepartment = $row1['department'];
								    	$spriority1FacultyProject = $row1['project'];

								    }

								    /* fetch details of second priority */
								    $sql2    = "select id,name,department,project from user where id=$spriority2FacultyId";
							      $result2 = $conn->query($sql2);
									if(!$result2->num_rows == 0) {
								    	$row2 = $result2->fetch_assoc();

								    	$spriority2FacultyName = $row2['name'];
								    	$spriority2FacultyDepartment = $row2['department'];
								    	$spriority2FacultyProject = $row2['project'];

								    }

								    /* fetch details of third priority */
								    $sql3    = "select id,name,department,project from user where id=$spriority3FacultyId";
							      $result3 = $conn->query($sql3);
									if(!$result3->num_rows == 0) {
										$row3 = $result3->fetch_assoc();

								    	$spriority3FacultyName = $row3['name'];
								    	$spriority3FacultyDepartment = $row3['department'];
								    	$spriority3FacultyProject = $row3['project'];

								    }
							}

							 
					}
		 
                } 
            } 
        }
        
        // mysqli_stmt_close($stmt);
    }
?>

    <div class="container-fluid">
    	<div class="row">
    		<div class="col-sm-3  studentProfileContainer">
    			<div class="row">
    				 <div class="col-sm-12" style="text-align: center;">
		    			<img src="../uploadFiles/showProfileImage.php?email=<?=$email ?>" class="studentProfileImg" alt="<?php echo $name; ?>">

    				 </div>
    				 <div class="col-sm-12 col-xs-12">
                         <p class="studentProfileUploadTag0" >Update Profile Picture</p>
    				 	<form action="../uploadFiles/imageUpload.php" method="post" enctype="multipart/form-data">
					        <input type="hidden" name="imageId" value="<?php echo $email; ?>">
					        <input type="hidden" name="imageRole" value="<?php echo $role; ?>">
					        <div class="col-sm-7 col-xs-7"><input type="file" name="image" id="file" class="inputfile" />
							<label for="file"><span class="glyphicon glyphicon-folder-open hidden-sm" style="padding-right: 7px;"></span>Select Image</label></div>
	    					<div class="col-sm-5 col-xs-5"><input type="submit" name="submit" class="btn btn-default studentProfileImageSubmitButton inputfile1" value="Change" placeholder="" ></div>
						</form>
    				 </div>
    			</div>
    			<div class="row">
                <p class="studentProfileDetailsTag  studentProfileUpperMargin">Name</p>
    			<p class="studentProfileDetails"><?php echo $name; ?></p>

    			<p class="studentProfileDetailsTag">Department</p>
    			<p class="studentProfileDetails"><?php echo $department; ?></p>

    			<p class="studentProfileDetailsTag">College</p>
    			<p class="studentProfileDetails"><?php echo $college; ?></p>

    			<p class="studentProfileDetailsTag">Email</p>
    			<p class="studentProfileDetails"><?php echo $email; ?></p>

    			<p class="studentProfileDetailsTag">Contact No.</p>
    			<p class="studentProfileDetails"><?php echo $contact; ?></p></div>

    			 <a class="btn btn-default studentProfileLogoutButton" href="../logout.php" >Logout</a>
    		</div>
    		<div class="col-sm-9">
    			<div class="row">
    				<div class="col-sm-12">
    					
    					
    					<div class="container-fluid">
			                <div class="row" style="margin-top: 0vh;">
			                    <div class="col-sm-6">
			                        <p class="studentProjectTag" style="font-size: 26px">Projects</p>
			                    </div>
			                    <!-- <div class="col-sm-4 col-sm-offset-2" style="margin-top: -2.5vh">
			                        <input class="form-control projectSearchingInput" id="myInput" type="text" placeholder="Search Projects..">
			                    </div> -->
			                </div>
			            </div>
			            

    					<div>
						  	<ul class="nav nav-tabs" role="tablist">
							    <li role="presentation" class="active"><a href="#available" aria-controls="profile" role="tab" data-toggle="tab">Available Projects</a></li>
							     <li role="presentation"><a href="#applied" aria-controls="home" role="tab" data-toggle="tab">Applied Projects</a></li>
							     <li style="float: right;margin-top: -5vh"><input class="form-control projectSearchingInput" id="myInput" type="text" placeholder="Search Projects.."></li>
						  	</ul>

						  	<div class="tab-content"  style="max-height: 50vh;overflow: scroll;">
								<div role="tabpanel" class="tab-pane fade in" id="applied">
									<table class="table table-striped">
										<thead style="font-size: 14px;"><tr><th title="Field #1">Priority</th>
				                            <th title="Field #2">Name</th>
				                            <th title="Field #3">Department</th>
				                            <th title="Field #5">Tentative projects for summer internship</th>
				                        </tr></thead>
				                        <tbody id="myTable" ><tr>
				                            <td align="right">1st</td>
				                            <?php if(!$spriority1FacultyId){ ?>
				                            <td colspan="4"> <?php echo ' Project yet not choosen';?></td>
				                            <?php }else{ ?>
				                            
				                            <td><?php echo $spriority1FacultyName; ?></td>
				                            <td><?php echo $spriority1FacultyDepartment; ?></td>
				                            <td><?php echo $spriority1FacultyProject; ?></td>
				                          	<?php } ?>
				                        </tr>
				                        <tr>
											<td align="right">2nd</td>
				                            <?php if(!$spriority2FacultyId){ ?>
				                            <td colspan="4"> <?php echo ' Project yet not choosen';?></td>
				                            <?php }else{ ?>
				                            
				                            <td><?php echo $spriority2FacultyName; ?></td>
				                            <td><?php echo $spriority2FacultyDepartment; ?></td>
				                            <td><?php echo $spriority2FacultyProject; ?></td>
				                          	<?php } ?>
				                        </tr>
				                        <tr>
				                            <td align="right">3rd</td>
				                            <?php if(!$spriority3FacultyId){ ?>
				                            <td colspan="4"> <?php echo 'Project yet not choosen';?></td>
				                            <?php }else{ ?>
				                            
				                            <td><?php echo $spriority3FacultyName; ?></td>
				                            <td><?php echo $spriority3FacultyDepartment; ?></td>
				                            <td><?php echo $spriority3FacultyProject; ?></td>
				                          	<?php } ?>
				                        </tr>
									</table>
								</div>


								<div role="tabpanel" class="tab-pane fade in active" id="available">
									<div class="">
									<table class="table table-striped">
										
				                        <?php  
										
											$sql    = "select id,name,department,project from user where role='faculty'";
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
												                    <td><div class='btn-group'>
																			<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
																			    Priority <span class='caret'></span>
																			</button>
																			<ul class='dropdown-menu'>
																			    <li>
																			    	<form method='post' id='spriority1Form";echo $row['id']; echo "'>
														                    			<input type='hidden' name='studentId' id='spriority1StudentId";echo $row['id']; echo "' value='";echo $studentRealId; echo"' >
														                    			<input type='hidden' name='facultyId' id='spriority1FacultyId";echo $row['id']; echo "' value='";echo $row['id']; echo"'  >
														                    			<input type='submit' id='spriority1Button";echo $row['id']; echo "'  value='1st' > 
													                    			</form>
													                    		</li>
																			    <li><button> 2nd </button></li>
																			    <li><button> 3rd </button></li>
																			</ul>
																		</div>
																	</td>
											                	</tr>
											                </tbody>
<script>

$(function() {
	$('#spriority1Button";echo $row['id']; echo "').click(function() {	
	 var data = $('#spriority1Form";echo $row['id']; echo "').serialize();

	 confirm = confirm('If you want to set 1st priority for your project to ";echo $row['name']; echo " ? ');
	 if(confirm==true ){
 	 $.ajax({
        url: 'spriority1.php',
        data: data,
        async: true,
		type: 'POST',          

		success: function(data){
    		data=data.replace(/\s+/g,'true');
 
           if(data == 'true'){
 
                console.log('form submitted');     
         
         }else{
         	alert('Priority already selected . ');
         }
     },
       error : function(XMLHttpRequest, textStatus, errorThrown) {
            alert('Priority inserted .');
        }
	    });
	}
	});
});

</script>
											                 ";
											        }
											    }
											 // $result->free();
											}
											 ?>
									</div>
									</table>
								</div>
					      	</div>
						</div>
    				</div>
    			</div>
    			<div class="row" style="margin-left: 0%">
    				<div class="col-sm-6 col-xs-12">
                        <p class="studentProfileUploadTag" >Upload Resume</p>
    					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
					        <input type="hidden" name="resumeId" value="<?php echo $email; ?>" />
                            <div class="col-sm-7 col-xs-7"><input type="file" name="resume" id="resume" class="inputfile" />
							<label for="resume"><span class="glyphicon glyphicon-folder-open" style="padding-right: 7px"></span></span>Select File</label></div>
                                <div class="col-sm-5 col-xs-5"><input type="submit" name="submit" class="btn btn-default studentProfileImageSubmitButton inputfile1" value="Upload" placeholder="" ></div>

						</form>
    				</div>
    				<div class="col-sm-6 col-xs-12" style="display: block;">
                        <p class="studentProfileUploadTag" >Upload NOC/LOR</p>
    					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
					        <input type="hidden" name="nocId" value="<?php echo $email; ?>" />
					        <div class="col-sm-7 col-xs-7"> <input type="file" name="noc" id="noc" class="inputfile" />
							<label for="noc"><span class="glyphicon glyphicon-folder-open" style="padding-right: 7px"></span></span>Select File</label></div>
                            <div class="col-sm-5 col-xs-5"><input type="submit" name="submit" class="btn btn-default studentProfileImageSubmitButton inputfile1" value="Upload" placeholder="" ></div>
						</form>
    				</div>
    			</div>

<?php
require '../config/config.php';

if ($_POST && !empty($_FILES)) {
    if($_FILES['resume']['error'] == 0) {
        $email = $_POST['resumeId'];
        $type = $conn->real_escape_string($_FILES['resume']['type']);
        $data = $conn->real_escape_string(file_get_contents($_FILES  ['resume']['tmp_name']));
        $size = intval($_FILES['resume']['size']);
 
 if ( in_array($type, array('application/pdf'))) {
     if ( $size < 500000) {

                $sql = "select resume from user where email='$email'";
                $result1 = $conn->query($sql);
                if($result1){
                    
                    	while($row1 = $result1->fetch_assoc()) {
                    		if($row1['resume']==null){
                        $query = "update user set resume='$data' where email='$email'";
             
                        $result = $conn->query($query);
                 
                        if($result) {
                            // echo 'resume uploaded';
                            header ("location:../student-portal/");
                        }
                        else {
                            echo 'Error! Failed to insert the file'
                               . "<pre>{$conn->error}</pre>";
                        }
                    }else{echo 'already uploaded';
                        // header ("location:../student-portal/");
                }
            }
      }
            }else{echo "File size too large. Size limit is 100kb only.<script>alert('kjf');</script> ";}
        
        }else{echo "Choose pdf format.";}
    }
        else {
            echo 'File is not selected.';
        }
 
    $conn->close();
}


?>

   <script>
   		function resume_error(){
	   		var resume = $('#resume').value;
	   		if(resume==NULL){
	   			alert('no file selected');
	   		}
		}
   </script> 			

    			<div class="container-fluid" style="margin-top: 5vh">
	    			<div class="alert alert-success" role="alert">
						<ul>Instructions
							<li>PLease Upload Your  NOC (for student of other than IITR) and Resume ( compulsory for all students ) otherwise your application will be rejected.</li>
							<li>Size of Image / Resume / NOC should be less than 100 KB.</li>
							<li>You will not be able to change the Resume / Image / NOC once uploaded . </li>
							<li>Each student have three choices to select their project according to his/her priority.</li>
							<li>Once the priorities are selected you will not be able to change it. So, choose priorities carefully after inspecting all the projects.</li>
						</ul>
				    </div>
				</div>

				<div class="container-fluid" style="margin-top: 5vh">
	    			<div class="row">
	    				<div class="col-sm-12">
	    					<div class="jumbotron">
							  <h2>Status</h2>
							  <ul>

							  	<?php if($recommendStatus==1){ ?>

								  	<span style="font-weight: 800;color: green"><h3>Application Accepted</h1></span>


								  	<?php	$query    = "select name from user where id=$recommendedFaculty";
												$result5 = $conn->query($query);
												if($result5) {
												    if(!$result5->num_rows == 0) {
												    	while($row5 = $result5->fetch_assoc()) {
												        ?><li><span style="font-weight: 800">Faculty Recommended : </span> <?php echo $row5['name']; ?></li>
												    <?php	}
												    }
												}  ?>
								  	
								  	<li><span style="font-weight: 800">Funding Type/Stipend : </span> <?php echo $fundingType; ?></li>
								  	
							  	<?php }else{ ?>

							  	<span style="font-weight: 800;"><h3> Yet not recommended any faculty. </h1></span>

							  	<?php } ?>

							  </ul>
							</div>
	    				</div>
	    			</div>
	    		</div>
    		</div>
    	</div>
    </div>
<div style="height:5vh;"> </div>
    <?php require_once('../footer.php');?>


		 


<?php echo"


";?>

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