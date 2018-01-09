<?php 
require_once '../config/config.php';
    // echo "string";
    
    $facultyId = $_POST['id'];

    $sql = "select id,name,department,email,project,fpriority1,fpriority2,fpriority3,fpriority4,fpriority5 from faculty where id=$facultyId";

    $result = $conn->query($sql);
    
    if($result){
        if($result->num_rows == 0) {
            echo '<p>Select Student to show details';
        }else{
            while($row = $result->fetch_assoc()) {
                $fpriority1Id = $row['fpriority1'];
                $fpriority2Id = $row['fpriority2'];
                $fpriority3Id = $row['fpriority3'];
                $fpriority4Id = $row['fpriority4'];
                $fpriority5Id = $row['fpriority5'];

                 /* fetch details of first priority */
                  $sql1    = "select name from student where id=$fpriority1Id";

                  $result1 = $conn->query($sql1);
                    if(!$result1->num_rows == 0) {
                        $row1 = $result1->fetch_assoc();

                        $fpriority1StudentName = $row1['name'];
                    }

                    /* fetch details of second priority */
                    $sql2    = "select name from student where id=$fpriority2Id";

                  $result2 = $conn->query($sql2);
                    if(!$result2->num_rows == 0) {
                        $row2 = $result2->fetch_assoc();

                        $fpriority2StudentName = $row2['name'];
                    }

                    /* fetch details of third priority */
                    $sql3    = "select name from student where id=$fpriority3Id";

                  $result3 = $conn->query($sql3);
                    if(!$result3->num_rows == 0) {
                        $row3 = $result3->fetch_assoc();

                        $fpriority3StudentName = $row3['name'];
                    }

                    /* fetch details of fourth priority */
                    $sql4    = "select name from student where id=$fpriority4Id";
                  $result4 = $conn->query($sql4);
                    if(!$result4->num_rows == 0) {
                        $row4 = $result4->fetch_assoc();

                        $fpriority4StudentName = $row4['name'];
                    }

                    /* fetch details of fifth priority */
                    $sql5    = "select name from student where id=$fpriority5Id";
                  $result5 = $conn->query($sql5);
                    if(!$result5->num_rows == 0) {
                        $row5 = $result5->fetch_assoc();

                        $fpriority5StudentName = $row5['name'];

                    }

                    $email = $row['email'];

            echo '          <div class="col-sm-3" style="text-align: center;">
                                <img src="../uploadFiles/showProfileImage.php?email='; echo $email; echo '" alt="prashant" class="doctorsStudentTabImg" >
                                <p class="doctorsStudentTabName">'; echo $row['name']; echo '</p>
                            
                            </div>
                            <div class="col-sm-1" style="font-weight: 700">
                                <p>ID : </p>
                                <p>Email: </p>
                                <p>Contact: </p>
                                <p>Gender: </p>
                                <p>Department: </p>
                            </div>
                            <div class="col-sm-2">
                                <p>'; echo $row['id']; echo '</p>
                                <p>'; echo $row['email']; echo '</p>
                                <p>'; echo $row['department']; echo '</p>
                            </div>
                            <div class="col-sm-2 col-sm-offset-1" style="font-weight: 700">
                                <p>1st Priority  : </p>
                                <p>2nd Priority  : </p>
                                <p>3rd Priority : </p>
                                <p>4th Priority : </p>
                                <p>5th Priority : </p>
                            </div>
                            <div class="col-sm-3">
                                

                                '; if($fpriority1Id==NULL){ echo 'Priority didn\'t set';}else{   echo '
                                <p>'; echo $fpriority1StudentName.' ( '.$fpriority1Id.' ) '; } echo '</p>

                                '; if($fpriority2Id==NULL){ echo 'Priority didn\'t set';}else{   echo '
                                <p>'; echo $fpriority2StudentName.' ( '.$fpriority2Id.' ) '; } echo '</p>

                                '; if($fpriority3Id==NULL){ echo 'Priority didn\'t set';}else{   echo '
                                <p>'; echo $fpriority3StudentName.' ( '.$fpriority3Id.' ) '; } echo '</p>

                                '; if($fpriority4Id==NULL){ echo 'Priority didn\'t set';}else{   echo '
                                <p>'; echo $fpriority4StudentName.' ( '.$fpriority4Id.' ) '; } echo '</p>

                                '; if($fpriority5Id==NULL){ echo 'Priority didn\'t set';}else{   echo '
                                <p>'; echo $fpriority5StudentName.' ( '.$fpriority5Id.' ) '; } echo '</p>


                            </div>
                            <div class="col-sm-9 col-sm-offset-3">
                            <p><span style="font-weight: 700"> Project : </span>'; echo $row['project']; echo '</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-7 col-sm-offset-3">
                                    <textarea rows="3" cols="20"  id="remarkText" placeholder="Text here .. "></textarea>
                                    <input type="submit" onclick="admin_remark_faculty(';echo $facultyId; echo')" > 
                                <div id="remarkDiv">
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                        </div>
                        

                            ';
        }
    }
}
            
                 
            
            mysqli_close($conn);


?>