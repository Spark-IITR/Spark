            



                <table class="table table-striped">
                    <thead style="font-size: 14px;">
                        <tr>
                            
                            <th title="Student Name">Name</th>
                            <th title="Year">Year</th>
                            <th title="Department">Department</th>
                            <th title="C.G.P.A">C.G.P.A</th>
                            <th title="Student's Priority">Student's Priority</th>
                            <th title="Approve">Approve</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php 
                             $sql    = "select id,name,email,cgpa,department,college,year,spriority1,spriority2,spriority3,spriority4,spriority5 from user where spriority1=$facultyRealId or spriority2=$facultyRealId or spriority3=$facultyRealId";
                            $result = $conn->query($sql);

                            while($row=mysqli_fetch_assoc($result)) { ?>

                                            <tr onclick="fetch_student_detail(<?php echo $row['id']; ?>);" style="cursor: pointer;" >
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['year']; ?></td>
                                            <td><?php echo $row['department']; ?></td>
                                            <td><?php echo $row['cgpa']; ?></td>

                                    <?php if($row['spriority1']==$facultyRealId){ ?>
                                        
                                            <td>1st</td>
                                            
                                    <?php }else if($row['spriority2']==$facultyRealId){?>
                                        
                                            <td>2nd</td>

                                    <?php }else if($row['spriority3']==$facultyRealId){?>

                                            <td>3rd</td>

                                    <?php }else if($row['spriority4']==$facultyRealId){?>

                                            <td>4th</td>

                                    <?php }else if($row['spriority5']==$facultyRealId){?>

                                            <td>5th</td> 

                                     <?php } ?>
                                            <td>
                                                <div class='btn-group'>
                                                  <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    Priority <span class='caret'></span>
                                                  </button>
                                                  <ul class='dropdown-menu'>
                                                    <li><a><span onclick="fpriority1(<?php $row['id']; ?>)">1st </span></a></li>
                                                    <li><a><span onclick="fpriority2(<?php $row['id']; ?>)">2nd </span></a></li>
                                                    <li><a><span onclick="fpriority3(<?php $row['id']; ?>)">3rd </span></a></li>
                                                    <li><a><span onclick="fpriority4(<?php $row['id']; ?>)">4rd </span></a></li>
                                                    <li><a><span onclick="fpriority5(<?php $row['id']; ?>)">5rd </span></a></li>
                                                  </ul>
                                                </div>
                                            </td>
                                        </tr>

                                    <?php 
                                }

                        ?>

                        
                        
                    </tbody>
                </table>

