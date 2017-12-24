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
                
                if(!mysqli_stmt_num_rows($stmt) == 0){                    
                    mysqli_stmt_bind_result($stmt, $studentRealId ,$name,$email,$contact,$department,$college,$recommendStatus,$recommendedFaculty,$fundingType);
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
									
									<?php require_once('appliedProject.php'); ?>

								</div>


								<div role="tabpanel" class="tab-pane fade in active" id="available">
									
									<?php require_once('availableProject.php'); ?>

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



    			<?php require_once('../uploadFiles/uploadResume.php'); ?>



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
<?php
					}
		 
                } 
            } 
        }
        
        mysqli_stmt_close($stmt);
    }

?>

		 


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