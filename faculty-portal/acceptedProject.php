
                                    <?php 
                             $sql0    = "select fpriority1,fpriority2,fpriority3,fpriority4,fpriority5 from user where id=$facultyRealId";
                            $result0 = $conn->query($sql0);

                            if(!$result0->num_rows == 0) {
                               $row0 = $result0->fetch_assoc();
                               $fpriority1StudentId =  $row0['fpriority1'];
                               $fpriority2StudentId =  $row0['fpriority2'];
                               $fpriority3StudentId =  $row0['fpriority3'];
                               $fpriority4StudentId =  $row0['fpriority4'];
                               $fpriority5StudentId =  $row0['fpriority5'];

                                 
                                 /* fetch details of first priority */
                                  $sql1    = "select id,name,department,college from user where id=$fpriority1StudentId";
                                  $result1 = $conn->query($sql1);
                                    if(!$result1->num_rows == 0) {
                                        $row1 = $result1->fetch_assoc();

                                        $fpriority1StudentName = $row1['name'];
                                        $fpriority1StudentDepartment = $row1['department'];
                                        $fpriority1Studentcollege = $row1['college'];

                                    }

                                    /* fetch details of second priority */
                                    $sql2    = "select id,name,department,college from user where id=$fpriority2StudentId";
                                  $result2 = $conn->query($sql2);
                                    if(!$result2->num_rows == 0) {
                                        $row2 = $result2->fetch_assoc();

                                        $fpriority2StudentName = $row2['name'];
                                        $fpriority2StudentDepartment = $row2['department'];
                                        $fpriority2Studentcollege = $row2['college'];

                                    }

                                    /* fetch details of third priority */
                                    $sql3    = "select id,name,department,college from user where id=$fpriority3StudentId";
                                  $result3 = $conn->query($sql3);
                                    if(!$result3->num_rows == 0) {
                                        $row3 = $result3->fetch_assoc();

                                        $fpriority3StudentName = $row3['name'];
                                        $fpriority3StudentDepartment = $row3['department'];
                                        $fpriority3Studentcollege = $row3['college'];

                                    }

                                    /* fetch details of third priority */
                                    $sql4    = "select id,name,department,college from user where id=$fpriority4StudentId";
                                  $result4 = $conn->query($sql4);
                                    if(!$result4->num_rows == 0) {
                                        $row4 = $result4->fetch_assoc();

                                        $fpriority4StudentName = $row4['name'];
                                        $fpriority4StudentDepartment = $row4['department'];
                                        $fpriority4Studentcollege = $row4['college'];

                                    }

                                    /* fetch details of third priority */
                                    $sql5    = "select id,name,department,college from user where id=$fpriority5StudentId";
                                  $result5 = $conn->query($sql5);
                                    if(!$result5->num_rows == 0) {
                                        $row5 = $result5->fetch_assoc();

                                        $fpriority5StudentName = $row5['name'];
                                        $fpriority5StudentDepartment = $row5['department'];
                                        $fpriority5Studentcollege = $row5['college'];

                                    }
                            } ?>
                                    <table class="table table-striped">
                                        <thead style="font-size: 14px;"><tr><th>Priority</th>
                                            <th>Name</th>
                                            <th>Department</th>
                                            <th>College</th>
                                        </tr></thead>
                                        <tbody id="myTable" >
                                        <tr onclick="fetch_student_detail(<?php echo $fpriority1StudentId; ?>);" style="cursor: pointer;" >
                                            <td>1st</td>
                                            <?php if(!$fpriority1StudentId){ ?>
                                            <td colspan="4"> <?php echo ' Priority yet not choosen';?></td>
                                            <?php }else{ ?>
                                            
                                            <td><?php echo $fpriority1StudentName; ?></td>
                                            <td><?php echo $fpriority1StudentDepartment; ?></td>
                                            <td><?php echo $fpriority1Studentcollege; ?></td>
                                            <?php } ?>
                                        </tr>
                                        <tr onclick="fetch_student_detail(<?php echo $fpriority2StudentId; ?>);" style="cursor: pointer;" >
                                            <td>2nd</td>
                                            <?php if(!$fpriority2StudentId){ ?>
                                            <td colspan="4"> <?php echo ' Priority yet not choosen';?></td>
                                            <?php }else{ ?>
                                            
                                            <td><?php echo $fpriority2StudentName; ?></td>
                                            <td><?php echo $fpriority2StudentDepartment; ?></td>
                                            <td><?php echo $fpriority2Studentcollege; ?></td>
                                            <?php } ?>
                                        </tr>
                                        <tr onclick="fetch_student_detail(<?php echo $fpriority3StudentId; ?>);" style="cursor: pointer;" >
                                            <td>3rd</td>
                                            <?php if(!$fpriority3StudentId){ ?>
                                            <td colspan="4"> <?php echo 'Priority yet not choosen';?></td>
                                            <?php }else{ ?>
                                            
                                            <td><?php echo $fpriority3StudentName; ?></td>
                                            <td><?php echo $fpriority3StudentDepartment; ?></td>
                                            <td><?php echo $fpriority3Studentcollege; ?></td>
                                            <?php } ?>
                                        </tr>
                                        <tr onclick="fetch_student_detail(<?php echo $fpriority4StudentId; ?>);" style="cursor: pointer;" >
                                            <td>4th</td>
                                            <?php if(!$fpriority4StudentId){ ?>
                                            <td colspan="4"> <?php echo 'Priority yet not choosen';?></td>
                                            <?php }else{ ?>
                                            
                                            <td><?php echo $fpriority4StudentName; ?></td>
                                            <td><?php echo $fpriority4StudentDepartment; ?></td>
                                            <td><?php echo $fpriority4Studentcollege; ?></td>
                                            <?php } ?>
                                        </tr>
                                        <tr onclick="fetch_student_detail(<?php echo $fpriority5StudentId; ?>);" style="cursor: pointer;" >
                                            <td>5th</td>
                                            <?php if(!$fpriority5StudentId){ ?>
                                            <td colspan="4"> <?php echo 'Priority yet not choosen';?></td>
                                            <?php }else{ ?>
                                            
                                            <td><?php echo $fpriority5StudentName; ?></td>
                                            <td><?php echo $fpriority5StudentDepartment; ?></td>
                                            <td><?php echo $fpriority5Studentcollege; ?></td>
                                            <?php } 

                               $result0->free();
                               $result1->free();
                               $result2->free();
                               $result3->free();
                               $result4->free();
                               $result5->free();


                                            ?>
                                        </tr>
                                    </table>