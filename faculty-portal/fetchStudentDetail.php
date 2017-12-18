<?php 
require_once '../config/config.php';
	// echo "string";
	
	$studentId = $_POST['id'];

	$sql = "select name,cgpa,department,year,college,email,contact,dob,gender,degree,project from user where id=$studentId";
	$result = $conn->query($sql);
	
	if($result){
		if($result->num_rows == 0) {
            echo '<p>Select Student to show details';
        }else{
        	while($row = $result->fetch_assoc()) {
        		$email = $row['email'];
        	echo '			<div class="col-sm-4" style="text-align: center;">
                                <img src="../uploadFiles/showProfileImage.php?email='; echo $email; echo '" alt="prashant" class="doctorsStudentTabImg" >
                                <p class="doctorsStudentTabName">'; echo $row['name']; echo '</p>
                                <p class="doctorsStudentTabYear">'; echo $row['year']; echo ' Year, '.$row['degree']; echo '</p>
                            </div>
                            <div class="col-sm-2" style="font-weight: 700">
                                <p>Email : </p>
                                <p>Contact : </p>
                                <p>D.O.B : </p>
                                <p>Department:</p>
                                <p>College : </p>
                            </div>
                            <div class="col-sm-6">
                                <p>'; echo $row['email']; echo '</p>
                                <p>'; echo $row['contact']; echo '</p>
                                <p>'; echo $row['dob']; echo '</p>
                                <p>'; echo $row['department']; echo '</p>
                                <p>'; echo $row['college']; echo '</p>
                            </div>
                            <div class="col-sm-6 col-sm-offset-6">
                                <div class="row">
                                    <div class="col-sm-3" style="text-align: center;">
                                        <input type="button" class="btn btn-default studentProfileImageSubmitButton" value="Resume" id="showResumeButton">
                                    </div>
                                	<div class="col-sm-3" style="text-align: center;">
                                        <input type="button"  class="btn btn-default studentProfileImageSubmitButton" value="NOC/LOR" id="showNOCButton">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-10 col-sm-offset-1" style="margin-top:4vh">
                            	<a target="_blank"><embed src="../uploadFiles/showResume.php?email='; echo $email; echo '" type="application/pdf"   height="1000vh" width="100%" id="showResume" style="display:none"></a>
                            	<a target="_blank"><embed src="../uploadFiles/showNOC.php?email='; echo $email; echo '" type="application/pdf"   height="1000vh" width="100%" id="showNOC" style="display:none"></a>
                            </div>

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

                            ';
        }
	}
}
			
	             
	        
            mysqli_close($conn);


?>