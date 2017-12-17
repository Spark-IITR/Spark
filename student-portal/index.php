<?php
ob_start();
session_start();
require_once '../config/config.php';
$studentRealId = $name = $email = $contact = $department = $college = ""; 

if(isset($_SESSION['role'])=='student')
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
                    mysqli_stmt_bind_result($stmt, $studentRealId ,$name,$email,$contact,$department,$college);
                    if(mysqli_stmt_fetch($stmt)){

                        require_once '../header.php';

                        function setPriority1(){
                        	 header ("location:../inde.php");
                        }
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
    					<!-- <div class="alert alert-success" role="alert"> PLease Upload Your  NOC ( for student of other than IIT,Roorkee ) and Resume ( compulsory for all students ) ..</div> -->
    					<p class="studentProjectTag">Projects</p>
    					<div>
						  	<ul class="nav nav-tabs" role="tablist">
							    <li role="presentation" class="active"><a href="#available" aria-controls="profile" role="tab" data-toggle="tab">Available Projects</a></li>
							     <li role="presentation"><a href="#applied" aria-controls="home" role="tab" data-toggle="tab">Applied Projects</a></li>
						  	</ul>
						  	<div class="tab-content" style="max-height: 50vh;overflow: scroll;">
								<div role="tabpanel" class="tab-pane fade in" id="applied">
									<table class="table table-striped">
										<thead style="font-size: 14px;"><tr><th title="Field #1">#</th>
				                            <th title="Field #2">Name</th>
				                            <th title="Field #3">Department</th>
				                            <th title="Field #4">E-mail</th>
				                            <th title="Field #5">Tentative projects for summer internship</th>
				                            <th title="Field #6">Status</th>
				                        </tr></thead>
				                        <tbody id="myTable"><tr>
				                            <td align="right">1</td>
				                            <td>Uttam Kumar Roy</td>
				                            <td>Architecture and Planning</td>
				                            <td>ukroyfap@iitr.ac.in</td>
				                            <td>Affordable Housing Design, Industrialised Building system, New town and Smart City Development, Building codes</td>
				                            <td><div class="btn-group">
												  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												    Priority <span class="caret"></span>
												  </button>
												  <ul class="dropdown-menu">
												    <li><a href="#">1st </a></li>
												    <li><a href="#">2nd </a></li>
												    <li><a href="#">3rd </a></li>
												  </ul>
												</div>
											</td>
				                        </tr>
				                        <tr>
				                            <td align="right">2</td>
				                            <td>Ram Sateesh Pasupuleti</td>
				                            <td>Architecture and Planning</td>
				                            <td>ramsateeshfap@iitr.ac.in</td>
				                            <td>Build Back Better- A book editing exercise, under GADRI initiative , Kyoto, Japan</td>
				                            <td><span class="glyphicon glyphicon-remove-circle studentProjectStatus" style="color: red"></span></td>
				                        </tr>
				                        <tr>
				                            <td align="right">3</td>
				                            <td>Sonal Atreya</td>
				                            <td>Architecture and Planning</td>
				                            <td>sonalfap@iitr.ac.in</td>
				                            <td>anthropometrics and ergonomics</td>
				                            <td><span class="glyphicon glyphicon-remove-circle studentProjectStatus" style="color: red"></td>
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

 	 $.ajax({

        url: 'spriority1.php',
        data: data,
        async: false,
		type: 'POST',          

		success: function(data){
               alert('form submitted');     
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown);
        }
	    });
	});
});

</script>
											                 ";
											        }
											    }
											 
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
    				<div class="col-sm-5">
    					<form action="../uploadFiles/uploadResume.php" method="post" enctype="multipart/form-data">
					        <input type="hidden" name="resumeId" value="<?php echo $email; ?>" />
					        <input type="file" name="resume" id="resume" class="inputfile" />
							<label for="resume"><span class="glyphicon glyphicon-folder-open" style="padding-right: 7px"></span><span class="glyphicons glyphicons-folder-open"></span>Choose File</label>
	    					<input type="submit" name="submit" class="btn btn-primary studentProfileImageSubmitButton" value="Upload Resume" placeholder="" >
						</form>
    				</div>
    				<div class="col-sm-5 col-sm-offset-1">
    					<form action="../uploadFiles/uploadNOC.php" method="post" enctype="multipart/form-data">
					        <input type="hidden" name="nocId" value="<?php echo $email; ?>" />
					        <input type="file" name="noc" id="noc" class="inputfile" />
							<label for="noc"><span class="glyphicon glyphicon-folder-open" style="padding-right: 7px"></span><span class="glyphicons glyphicons-folder-open"></span>Choose File</label>
	    					<input type="submit" name="submit" class="btn btn-primary studentProfileImageSubmitButton" value="Upload NOC/LOR" placeholder="" >
						</form>
    				</div>
    			</div>

    			<div class="row" style="margin-top: 5vh">
    				<div class="col-sm-12">
    					<div class="jumbotron">
						  <h2>Status</h2>
						  <ul>
						  	<li>Application Submitted</li>
						  	<li>Not Recommended</li>
						  	<li>Last date is coming soon..</li>
						  </ul>
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
		 else{echo 'error';}
                } else{
                    $username_err = 'No account found with that username.';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        mysqli_stmt_close($stmt);
    }

    // var facultyId=document.getElementById('spriority1FacultyId";echo $row['id']; echo "').value;
      // var studentId=document.getElementById('spriority1StudentId";echo $row['id']; echo "').value;
else
      header ("location:../index.php");
    ?>


<?php echo"


";?>