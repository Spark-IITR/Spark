                                



            
                <table class="table table-striped">
                    <thead style="font-size: 14px;">
                        <tr>
                            
                            <th title="Field #2">Name</th>
                            <th title="Field #3">C.G.P.A</th>
                            <th title="Field #4">Year</th>
                            <th title="Field #5">Department</th>
                            <th title="Field #6">College</th>
                            <th title="Field #7">Approve</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php 
                             $sql    = "SELECT id,name,email,department,college,year,spriority1,spriority2,spriority3,cgpa from student where ( spriority1!=0 or spriority2!=0 or spriority3!=0 or spriority4!=0 or spriority5!=0 ) and LENGTH(resume)>0 and length(noc)>0 ;";
                            $result = $conn->query($sql);

                            while($row=mysqli_fetch_assoc($result)) {
                                    ?>
                                        <tr onclick="fetch_student_detail(<?php echo $row['id']; ?>);" style="cursor: pointer;" >
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['cgpa']; ?></td>
                                            <td><?php echo $row['year']; ?></td>
                                            <td><?php echo $row['department']; ?></td>
                                            <td><?php echo $row['college']; ?></td>
                                            <td>
                                                <div class='btn-group'>
                                                  <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    Priority <span class='caret'></span>
                                                  </button>
                                                  <ul class='dropdown-menu'>
                                                    <li onclick="fpriority1(<?php echo $row['id']; ?>)"><a>1st </a></li>
                                                    <li onclick="fpriority2(<?php echo $row['id']; ?>)"><a>2nd </a></li>
                                                    <li onclick="fpriority3(<?php echo $row['id']; ?>)"><a>3rd </a></li>
                                                    <li onclick="fpriority4(<?php echo $row['id']; ?>)"><a>4rd </a></li>
                                                    <li onclick="fpriority5(<?php echo $row['id']; ?>)"><a>5rd </a></li>
                                                  </ul>
                                                  <div id="fpriority1Div"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php 
                                }
                               $result->free();
                        ?>

                        
                        
                    </tbody>
                </table>
