<?php 
require_once '../config/config.php';
	// echo "string";
	
	$studentId = $_POST['id'];

	$sql = "select name,cgpa,department,year,college,email,contact,dob,gender,degree,spriority1,spriority2,spriority3 from user where id=$studentId";
	$result = $conn->query($sql);
	
	if($result){
		if($result->num_rows == 0) {
            echo '<p>Select Student to show details';
        }else{
        	while($row = $result->fetch_assoc()) {
        		$spriority1Id = $row['spriority1'];
                $spriority2Id = $row['spriority2'];
                $spriority3Id = $row['spriority3'];


                 /* fetch details of first priority */
                  $sql1    = "select name from user where id=$spriority1Id";
                  $result1 = $conn->query($sql1);
                    if(!$result1->num_rows == 0) {
                        $row1 = $result1->fetch_assoc();

                        $spriority1FacultyName = $row1['name'];
                    }

                    /* fetch details of second priority */
                    $sql2    = "select name from user where id=$spriority2Id";
                  $result2 = $conn->query($sql2);
                    if(!$result2->num_rows == 0) {
                        $row2 = $result2->fetch_assoc();

                        $spriority2FacultyName = $row2['name'];
                    }

                    /* fetch details of third priority */
                    $sql3    = "select name from user where id=$spriority3Id";
                  $result3 = $conn->query($sql3);
                    if(!$result3->num_rows == 0) {
                        $row3 = $result3->fetch_assoc();

                        $spriority3FacultyName = $row3['name'];
                    }

                    $email = $row['email'];

        	echo '			<div class="col-sm-3" style="text-align: center;">
                                <img src="../uploadFiles/showProfileImage.php?email='; echo $email; echo '" alt="prashant" class="doctorsStudentTabImg" >
                                <p class="doctorsStudentTabName">'; echo $row['name']; echo '</p>
                                <p class="doctorsStudentTabYear">'; echo $row['year']; echo ' Year, '.$row['degree']; echo '</p>
                            </div>
                            <div class="col-sm-1" style="font-weight: 700">
                                <p>Email : </p>
                                <p>Contact : </p>
                                <p>D.O.B : </p>
                                <p>Gender : </p>
                                <p>College : </p>
                            </div>
                            <div class="col-sm-2">
                                <p>'; echo $row['email']; echo '</p>
                                <p>'; echo $row['contact']; echo '</p>
                                <p>'; echo $row['dob']; echo '</p>
                                <p>'; echo $row['gender']; echo '</p>
                                <p>'; echo $row['college']; echo '</p>
                            </div>
                            <div class="col-sm-2 col-sm-offset-1" style="font-weight: 700">
                                <p>Department : </p>
                                <p>C.G.P.A : </p>
                                <p>1st Priority : </p>
                                <p>2nd Priority : </p>
                                <p>3rd Priority : </p>
                            </div>
                            <div class="col-sm-3">
                                <p>'; echo $row['department']; echo '</p>
                                <p>'; echo $row['cgpa']; echo '</p>
                                
                                '; if($spriority1Id==NULL){ echo 'Priority didn\'t set';}else{   echo '
                                <p>'; echo $spriority1FacultyName.' ( '.$spriority1Id.' ) '; } echo '</p>

                                '; if($spriority2Id==NULL){ echo 'Priority didn\'t set';}else{   echo '
                                <p>'; echo $spriority2FacultyName.' ( '.$spriority2Id.' ) '; } echo '</p>

                                '; if($spriority3Id==NULL){ echo 'Priority didn\'t set';}else{   echo '
                                <p>'; echo $spriority3FacultyName.' ( '.$spriority3Id.' ) '; } echo '</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 ">
                                <div class="row">
                                    <div class="col-sm-1 col-sm-offset-0" style="text-align: center;margin-left:3%">
                                        <input type="button" class="btn btn-default studentProfileImageSubmitButton" value="Resume" id="showResumeButton">
                                    </div>
                                	<div class="col-sm-2" style="text-align: center;">
                                        <input type="button"  class="btn btn-default studentProfileImageSubmitButton" value="NOC/LOR" id="showNOCButton">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-10 col-sm-offset-1" style="margin-top:4vh">
                            	<a target="_blank"><embed src="../uploadFiles/showResume.php?email='; echo $email; echo '" type="application/pdf"   height="1000vh" width="100%" id="showResume" style="display:none"></a>
                            	<a target="_blank"><embed src="../uploadFiles/showNOC.php?email='; echo $email; echo '" type="application/pdf"   height="1000vh" width="100%" id="showNOC" style="display:none"></a>
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