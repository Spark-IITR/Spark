<?php 
require_once '../config/config.php';
	// echo "string";
	
	$studentId = $_POST['id'];

	$sql = "select id,name,cgpa,department,year,college,email,contact,dob,gender,degree,spriority1,spriority2,spriority3,spriority4,spriority5 from student where id=$studentId";
	$result = $conn->query($sql);
	
	if($result){
		if($result->num_rows == 0) {
            echo '<p>Select Student to show details';
        }else{
        	while($row = $result->fetch_assoc()) {
        		$spriority1Id = $row['spriority1'];
                $spriority2Id = $row['spriority2'];
                $spriority3Id = $row['spriority3'];
                $spriority4Id = $row['spriority4'];
                $spriority5Id = $row['spriority5'];


                 /* fetch details of first priority */
                  $sql1    = "select name from faculty where id=$spriority1Id";
                  $result1 = $conn->query($sql1);
                    if(!$result1->num_rows == 0) {
                        $row1 = $result1->fetch_assoc();

                        $spriority1FacultyName = $row1['name'];
                    }

                    /* fetch details of second priority */
                    $sql2    = "select name from faculty where id=$spriority2Id";
                  $result2 = $conn->query($sql2);
                    if(!$result2->num_rows == 0) {
                        $row2 = $result2->fetch_assoc();

                        $spriority2FacultyName = $row2['name'];
                    }

                    /* fetch details of third priority */
                    $sql3    = "select name from faculty where id=$spriority3Id";
                  $result3 = $conn->query($sql3);
                    if(!$result3->num_rows == 0) {
                        $row3 = $result3->fetch_assoc();

                        $spriority3FacultyName = $row3['name'];
                    }

                    /* fetch details of third priority */
                    $sql4    = "select name from faculty where id=$spriority4Id";
                  $result4 = $conn->query($sql4);
                    if(!$result4->num_rows == 0) {
                        $row4 = $result4->fetch_assoc();

                        $spriority4FacultyName = $row4['name'];
                    }

                    /* fetch details of third priority */
                    $sql5    = "select name from faculty where id=$spriority5Id";
                  $result5 = $conn->query($sql5);
                    if(!$result5->num_rows == 0) {
                        $row5 = $result5->fetch_assoc();

                        $spriority5FacultyName = $row5['name'];
                    }

                    $email3 = $row['email'];

        	echo '			<div class="col-sm-3" style="text-align: center;">
                                <img src="../uploadFiles/showProfileImage.php?email='; echo $email3; echo '" alt="prashant" class="doctorsStudentTabImg" >
                                <p class="doctorsStudentTabName">'; echo $row['name']; echo '</p>
                                <p class="doctorsStudentTabYear">'; echo $row['year']; echo ' Year, '.$row['degree']; echo '</p>
                            </div>
                            <div class="col-sm-1" style="font-weight: 700">
                                <p>Email : </p>
                                <p>Contact: </p>
                                <p>D.O.B: </p>
                                <p>Gender: </p>
                                <p>Department: </p>
                                <p>College: </p>
                            </div>
                            <div class="col-sm-2">
                                <p>'; echo $row['email']; echo '</p>
                                <p>'; echo $row['contact']; echo '</p>
                                <p>'; echo $row['dob']; echo '</p>
                                <p>'; echo $row['gender']; echo '</p>
                                <p style="margin-left:8%">'; echo $row['department']; echo '</p>
                                <p>'; echo $row['college']; echo '</p>
                            </div>
                            <div class="col-sm-2 col-sm-offset-1" style="font-weight: 700">
                                
                                <p>C.G.P.A : </p>
                                <p>1st Priority : </p>
                                <p>2nd Priority : </p>
                                <p>3rd Priority : </p>
                                <p>4th Priority : </p>
                                <p>5th Priority : </p>
                            </div>
                            <div class="col-sm-3">
                                
                                <p>'; echo $row['cgpa']; echo '</p>
                                
                                '; if($spriority1Id==NULL){ echo 'Priority didn\'t set';}else{   echo '
                                <p>'; echo $spriority1FacultyName.' ( '.$spriority1Id.' ) '; } echo '</p>

                                '; if($spriority2Id==NULL){ echo 'Priority didn\'t set';}else{   echo '
                                <p>'; echo $spriority2FacultyName.' ( '.$spriority2Id.' ) '; } echo '</p>

                                '; if($spriority3Id==NULL){ echo 'Priority didn\'t set';}else{   echo '
                                <p>'; echo $spriority3FacultyName.' ( '.$spriority3Id.' ) '; } echo '</p>

                                '; if($spriority4Id==NULL){ echo 'Priority didn\'t set';}else{   echo '
                                <p>'; echo $spriority4FacultyName.' ( '.$spriority4Id.' ) '; } echo '</p>

                                '; if($spriority5Id==NULL){ echo 'Priority didn\'t set';}else{   echo '
                                <p>'; echo $spriority5FacultyName.' ( '.$spriority5Id.' ) '; } echo '</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <h3>Faculty Choice : </h3>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th title="Field #1">ID</th>
                                            <th title="Field #2">Faculty Name</th>
                                            <th title="Field #3">Email</th>
                                            <th title="Field #4">Department</th>
                                            <th title="Field #5">Priority</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    ';  
                                     $sql1    = "select id,name,email,department from user where fpriority1=$studentId";
                                    $result1 = $conn->query($sql1);

                                    while($row1=mysqli_fetch_assoc($result1)) {
                                             echo '
                                        <tr>
                                            <td >'; echo $row1['id']; echo ' </td>
                                            <td>'; echo $row1['name']; echo '</td>
                                            <td>'; echo $row1['email']; echo '</td>
                                            <td>'; echo $row1['department']; echo '</td>
                                            <td>1st</td>
                                        </tr>

                                        '; }  

                                        $sql2    = "select id,name,email,department from user where fpriority2=$studentId";
                                    $result2 = $conn->query($sql2);

                                    while($row2=mysqli_fetch_assoc($result2)) {
                                             echo '
                                        <tr>
                                            <td >'; echo $row2['id']; echo ' </td>
                                            <td>'; echo $row2['name']; echo '</td>
                                            <td>'; echo $row2['email']; echo '</td>
                                            <td>'; echo $row2['department']; echo '</td>
                                            <td>2nd</td>
                                        </tr>

                                        '; }

                                        $sql3    = "select id,name,email,department from user where fpriority3=$studentId";
                                    $result3 = $conn->query($sql3);

                                    while($row3=mysqli_fetch_assoc($result3)) {
                                             echo '
                                        <tr>
                                            <td >'; echo $row3['id']; echo ' </td>
                                            <td>'; echo $row3['name']; echo '</td>
                                            <td>'; echo $row3['email']; echo '</td>
                                            <td>'; echo $row3['department']; echo '</td>
                                            <td>3rd</td>
                                        </tr>

                                        '; }

                                        $sql4    = "select id,name,email,department from user where fpriority4=$studentId";
                                    $result4 = $conn->query($sql4);

                                    while($row4=mysqli_fetch_assoc($result4)) {
                                             echo '
                                        <tr>
                                            <td >'; echo $row4['id']; echo ' </td>
                                            <td>'; echo $row4['name']; echo '</td>
                                            <td>'; echo $row4['email']; echo '</td>
                                            <td>'; echo $row4['department']; echo '</td>
                                            <td>4th</td>
                                        </tr>

                                        '; }

                                        $sql5    = "select id,name,email,department from user where fpriority5=$studentId";
                                    $result5 = $conn->query($sql5);

                                    while($row5=mysqli_fetch_assoc($result5)) {
                                             echo '
                                        <tr>
                                            <td >'; echo $row5['id']; echo ' </td>
                                            <td>'; echo $row5['name']; echo '</td>
                                            <td>'; echo $row5['email']; echo '</td>
                                            <td>'; echo $row5['department']; echo '</td>
                                            <td>5th</td>
                                        </tr>

                                        '; }

                                        if($result1->num_rows == 0 && $result2->num_rows == 0 && $result3->num_rows == 0 && $result4->num_rows == 0 && $result5->num_rows == 0 ) {
                                            echo ' <tr>
                                                       <td  colspan="5" style="color:red;font-size:1.2vw"> His Application is not aprroved by any faculty . </td>
                                                    </tr>';
                                        }

                                        echo '
                                    </tbody>
                                </table>
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

                                    
                                    <div class="col-sm-2" style="text-align: center;">
                                        
                                          <div class="form-group">
                                              <div class="btn-group">
                                                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Recommend <span class="caret"></span>
                                                  </button>
                                                  <ul class="dropdown-menu">
                                                    <li><a><input type="radio" name="recommendStatus" id="recommendStatusYes';echo $row['id'];echo '" value="1" > Yes </a></li>
                                                    <li><a><input type="radio" name="recommendStatus" id="recommendStatusNo';echo $row['id'];echo '" value="0" > No </a></li>
                                                  </ul>
                                              </div>
                                          </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-4" id="statusYesDiv';echo $row['id'];echo '" style="display:none">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="facultyId" class="sr-only"></label>
                                                        <input type="number" name="recommendFacultyId" class="form-control" id="recommendFacultyId';echo $row['id'];echo '" placeholder="Faculty Id.." onkeyup="fetch_faculty_name(this.value)">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6" id="FetchFacultyNameDiv">
                                                    
                                                </div>
                                                <div id="recommendDiv2"></div>
                                            </div>
                                            <div class="form-group">
                                                Funding Type : <select name="recommendFundingType" id="recommendFundingType';echo $row['id'];echo '">
                                                    <option style="display:none" ></option>
                                                    <option value="spark">Spark</option>
                                                    <option value="project">Project</option>
                                                    <option value="none">None</option>
                                                </select>
                                            <div id="recommendDiv1"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-offset-4 col-sm-6">
                                                <button  class="btn btn-default" onclick="recommend_faculty(';echo $row['id'];echo ');">Submit</button>
                                            </div>
                                        <div>
                                        <div id="recommendDiv"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4 col-sm-offset-3">
                                        <textarea rows="3" cols="20"  id="remarkStudentText" placeholder="Text here .. "></textarea>
                                        <input type="submit" onclick="admin_remark_student(';echo $row['id']; echo')" > 
                                    <div id="remarkDiv">
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-sm-offset-3" style="margin-top:4vh">
                            	<a target="_blank"><embed src="../uploadFiles/showResume.php?email='; echo $email3; echo '" type="application/pdf"   height="1000vh" width="100%" id="showResume" style="display:none"></a>
                            	<a target="_blank"><embed src="../uploadFiles/showNOC.php?email='; echo $email3; echo '" type="application/pdf"   height="1000vh" width="100%" id="showNOC" style="display:none"></a>
                            </div>

                            <form  method="post">
                                    <input type="button" name="deleteButton" value="Delete Application" class="btn btn-danger" onclick="delete_application('; echo $row['id']; echo ')">
                            </form>
                        </div>


                        '; ?>


                            <script>
                                
                                function recommend_faculty(data){
                                        
                                        var id = data;
                                        var fundingType = $('#recommendFundingType<?php echo $row['id'];?> ').val();
                                        var recommendFacultyId = $('#recommendFacultyId<?php echo $row['id'] ?>').val();
                                        var recommendStatus = $("input[name=recommendStatus]:checked").val();
                                        if(recommendStatus==null){
                                            $("#recommendDiv").html('<span style="color:red;font-size:14px">Select if you want to recommend or not.</span>');
                                        }
                                        
                                        // alert(id+fundingType+recommendFacultyId+recommendStatus);

                                    if(recommendStatus=="1"){

                                        if(!fundingType){
                                            $("#recommendDiv1").html('<span style="color:red;font-size:14px">Select Funding Type.</span>');
                                        }
                                        if(!recommendFacultyId){
                                            $("#recommendDiv2").html('<span style="color:red;font-size:14px">Insert faculty id.</span>');
                                        }
                                         $.ajax({
                                            url: "recommend.php",
                                            data: {"studentId":id,"recommendStatus":recommendStatus,"recommendFacultyId":recommendFacultyId,"recommendFundingStatus":fundingType},
                                            async: false,
                                            type: "POST",          

                                            success: function(data){
                                               $("#recommendDiv").html(data); 
                                               $("#recommendFacultyId<?php echo $row['id'] ?>").val('');
                                                $("input[name=recommendStatus]:checked").val('');
                                                $('#recommendFundingType<?php echo $row['id'];?> ').val('');
                                                $("#statusYesDiv<?php echo $row['id'];?>").css("display","none");
                                                recommendStatus = null;
                                         },
                                           error : function(XMLHttpRequest, textStatus, errorThrown) {
                                                alert(errorThrown);
                                                $("#recommendFacultyId<?php echo $row['id'] ?>").val('');
                                                $("input[name=recommendStatus]:checked").val('');
                                                $('#recommendFundingType<?php echo $row['id'];?> ').val('');
                                            }
                                            });

                                         
                                    }else if(recommendStatus=="0"){
                                        var confirmNo = confirm("Are you sure to reject his/her application ? ");
                                        if(confirmNo==true){
                                        $.ajax({
                                            url: "recommend.php",
                                            data: {"studentId":id,"recommendStatus":0,"recommendFacultyId":0,"recommendFundingStatus":""},
                                            async: true,
                                            type: "POST",          

                                            success: function(data){

                                                    $("#recommendDiv").html('<span style="color:green;font-size:14px">Recommended Status No Set</span>'); 
                                                    recommendStatus = null;
                                             },
                                           error : function(XMLHttpRequest, textStatus, errorThrown) {
                                                alert(errorThrown);
                                                $(":input").val('');
                                            }
                                            });
                                        }
                                    }
                                }
                            </script>

                            <script>
                                function fetch_faculty_name(data){
                                        var id = data;
                                     $.ajax({
                                        url: "fetchFacultyName.php",
                                        data: {"id":id},
                                        async: true,
                                        type: "POST",          

                                        success: function(data){
                                            
                                            $("#FetchFacultyNameDiv").html(data);
                                     },
                                       error : function(XMLHttpRequest, textStatus, errorThrown) {
                                            alert(errorThrown);
                                        }
                                        });
                                 }
                           </script>




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

                            $(document).ready(function(){
                                $("#recommendStatusYes<?php echo $row['id'];?>").click(function(){
                                    $("#statusYesDiv<?php echo $row['id'];?>").css("display","");
                                });
                            });

                            
                            </script>

                            
                            <?php
        }
	}
}
			
	             
	        
            mysqli_close($conn);


?>