<?php 
require_once '../config/config.php';
	// echo "string";
	
	$studentId = $_POST['id'];

	$sql = "select name,cgpa,department,year,college,email,contact,dob,gender,degree,cgpa from student where id=$studentId";
	$result = $conn->query($sql);
	
	if($result){
		if($result->num_rows == 0) {
            echo '<p>Select Student to show details';
        }else{
        	while($row = $result->fetch_assoc()) {
        		$email = $row['email'];
        	echo '			<div class="col-sm-4 col-xs-12" style="text-align: center;">
                                <img src="../uploadFiles/showProfileImage.php?email='; echo $email; echo '" alt="prashant" class="doctorsStudentTabImg" >
                                <p class="doctorsStudentTabName">'; echo $row['name']; echo '</p>
                                <p class="doctorsStudentTabYear">'; echo $row['year']; echo ' Year. '.$row['degree']; echo '</p>
                            </div>
                            <div class="col-sm-2 col-xs-3" style="font-weight: 700">
                                <p>Email : </p>
                                <p>C.G.P.A : </p>
                                <p>Contact: </p>
                                <p>D.O.B : </p>
                                <p>Department:</p>
                                <p>College : </p>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <p>'; echo $row['email']; echo '</p>
                                <p>'; echo $row['cgpa']; echo '</p>
                                <p>'; echo $row['contact']; echo '</p>
                                <p>'; echo $row['dob']; echo '</p>
                                <p>'; echo $row['department']; echo '</p>
                                <p>'; echo $row['college']; echo '</p>
                            </div>
                            <div class="col-sm-6 col-sm-offset-6 col-xs-12 col-xs-offset-3">
                                <div class="row">
                                    <div class="col-sm-3 col-xs-3 " style="text-align: center;">
                                        <a target="_blank" href="../uploadFiles/showResume.php?email='; echo $email; echo '&param='; echo $studentId; echo '"  ><input type="button" class="btn btn-default studentProfileImageSubmitButton" value="Resume" id="showResumeButton"></a>
                                    </div>
                                	<div class="col-sm-3 col-xs-3" style="text-align: center;">
                                        <a target="_blank" href="../uploadFiles/showNOC.php?email='; echo $email; echo '&param='; echo $studentId; echo '" type="application/pdf" ><input type="button"  class="btn btn-default studentProfileImageSubmitButton" value="Transcript" id="showNOCButton"></a>
                                    </div>
                                </div>
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