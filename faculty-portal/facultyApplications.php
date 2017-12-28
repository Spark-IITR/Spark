            



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

                            while($row=mysqli_fetch_assoc($result)) {
                                    if($row['spriority1']==$facultyRealId){ ?>
                                        <tr onclick="fetch_student_detail(<?php echo $row['id']; ?>);" style="cursor: pointer;" >
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['year']; ?></td>
                                            <td><?php echo $row['department']; ?></td>
                                            <td><?php echo $row['cgpa']; ?></td>
                                            <td>1st</td>
                                            <td>
                                                <div class='btn-group'>
                                                  <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    Priority <span class='caret'></span>
                                                  </button>
                                                  <ul class='dropdown-menu'>
                                                    <li><a href='#'>1st </a></li>
                                                    <li><a href='#'>2nd </a></li>
                                                    <li><a href='#'>3rd </a></li>
                                                    <li><a href='#'>4rd </a></li>
                                                    <li><a href='#'>5rd </a></li>
                                                  </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php }else if($row['spriority2']==$facultyRealId){?>

                                        <tr onclick="fetch_student_detail(<?php echo $row['id']; ?>);" style="cursor: pointer;" >
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['year']; ?></td>
                                            <td><?php echo $row['department']; ?></td>
                                            <td><?php echo $row['cgpa']; ?></td>
                                            <td>2nd</td>
                                            <td>
                                                <div class='btn-group'>
                                                  <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    Priority <span class='caret'></span>
                                                  </button>
                                                  <ul class='dropdown-menu'>
                                                    <li><a href='#'>1st </a></li>
                                                    <li><a href='#'>2nd </a></li>
                                                    <li><a href='#'>3rd </a></li>
                                                    <li><a href='#'>4rd </a></li>
                                                    <li><a href='#'>5rd </a></li>
                                                  </ul>
                                                </div>
                                            </td>
                                        </tr>

                                    <?php }else if($row['spriority3']==$facultyRealId){?>

                                        <tr onclick="fetch_student_detail(<?php echo $row['id']; ?>);" style="cursor: pointer;" >
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['year']; ?></td>
                                            <td><?php echo $row['department']; ?></td>
                                            <td><?php echo $row['cgpa']; ?></td>
                                            <td>3rd</td>
                                            <td>
                                                <div class='btn-group'>
                                                  <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    Priority <span class='caret'></span>
                                                  </button>
                                                  <ul class='dropdown-menu'>
                                                    <li><a href='#'>1st </a></li>
                                                    <li><a href='#'>2nd </a></li>
                                                    <li><a href='#'>3rd </a></li>
                                                    <li><a href='#'>4rd </a></li>
                                                    <li><a href='#'>5rd </a></li>
                                                  </ul>
                                                </div>
                                            </td>
                                        </tr>

                                        <?php }else if($row['spriority4']==$facultyRealId){?>

                                        <tr onclick="fetch_student_detail(<?php echo $row['id']; ?>);" style="cursor: pointer;" >
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['year']; ?></td>
                                            <td><?php echo $row['department']; ?></td>
                                            <td><?php echo $row['cgpa']; ?></td>
                                            <td>
                                                <div class='btn-group'>
                                                  <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    Priority <span class='caret'></span>
                                                  </button>
                                                  <ul class='dropdown-menu'>
                                                    <li><a href='#'>1st </a></li>
                                                    <li><a href='#'>2nd </a></li>
                                                    <li><a href='#'>3rd </a></li>
                                                    <li><a href='#'>4th </a></li>
                                                    <li><a href='#'>5rd </a></li>
                                                  </ul>
                                                </div>
                                            </td>
                                        </tr>

                                        <?php }else if($row['spriority5']==$facultyRealId){?>

                                        <tr onclick="fetch_student_detail(<?php echo $row['id']; ?>);" style="cursor: pointer;" >
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['year']; ?></td>
                                            <td><?php echo $row['department']; ?></td>
                                            <td><?php echo $row['cgpa']; ?></td>
                                            <td>5th</td>
                                            <td>
                                                <div class='btn-group'>
                                                  <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    Priority <span class='caret'></span>
                                                  </button>
                                                  <ul class='dropdown-menu'>
                                                    <li><a href='#'>1st </a></li>
                                                    <li><a href='#'>2nd </a></li>
                                                    <li><a href='#'>3rd </a></li>
                                                    <li><a href='#'>4rd </a></li>
                                                    <li><a href='#'>5rd </a></li>
                                                  </ul>
                                                </div>
                                            </td>
                                        </tr>

                                    <?php }
                                }

                        ?>

                        
                        
                    </tbody>
                </table>

