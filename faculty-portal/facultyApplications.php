            



                <table class="table table-striped">
                    <thead style="font-size: 14px;">
                        <tr>
                            
                            <th title="Field #2">Name</th>
                            <th title="Field #3">Year</th>
                            <th title="Field #5">Department</th>
                            <th title="Field #6">College</th>
                            <th title="Field #7">Approve</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php 
                             $sql    = "select id,name,email,department,college,year,spriority1,spriority2,spriority3 from user where spriority1=$facultyRealId or spriority2=$facultyRealId or spriority3=$facultyRealId";
                            $result = $conn->query($sql);

                            while($row=mysqli_fetch_assoc($result)) {
                                    if($row['spriority1']==$facultyRealId){ ?>
                                        <tr onclick="fetch_student_detail(<?php echo $row['id']; ?>);" style="cursor: pointer;" >
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['year']; ?></td>
                                            <td><?php echo $row['department']; ?></td>
                                            <td><?php echo $row['college']; ?></td>
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
                                            <td><?php echo $row['college']; ?></td>
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
                                            <td><?php echo $row['college']; ?></td>
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

