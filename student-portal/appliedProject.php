
									<?php 
                        	 $sql0    = "select spriority1,spriority2,spriority3,spriority4,spriority5 from student where id=$studentRealId";
							$result0 = $conn->query($sql0);

							if(!$result0->num_rows == 0) {
						       $row0 = $result0->fetch_assoc();
						       $spriority1FacultyId =  $row0['spriority1'];
						       $spriority2FacultyId =  $row0['spriority2'];
						       $spriority3FacultyId =  $row0['spriority3'];
						       $spriority4FacultyId =  $row0['spriority4'];
						       $spriority5FacultyId =  $row0['spriority5'];

					             
					             /* fetch details of first priority */
					              $sql1    = "select id,name,department,project from faculty where id=$spriority1FacultyId";
							      $result1 = $conn->query($sql1);
									if(!$result1->num_rows == 0) {
								    	$row1 = $result1->fetch_assoc();

								    	$spriority1FacultyName = $row1['name'];
								    	$spriority1FacultyDepartment = $row1['department'];
								    	$spriority1FacultyProject = $row1['project'];

								    }

								    /* fetch details of second priority */
								    $sql2    = "select id,name,department,project from faculty where id=$spriority2FacultyId";
							      $result2 = $conn->query($sql2);
									if(!$result2->num_rows == 0) {
								    	$row2 = $result2->fetch_assoc();

								    	$spriority2FacultyName = $row2['name'];
								    	$spriority2FacultyDepartment = $row2['department'];
								    	$spriority2FacultyProject = $row2['project'];

								    }

								    /* fetch details of third priority */
								    $sql3    = "select id,name,department,project from faculty where id=$spriority3FacultyId";
							      $result3 = $conn->query($sql3);
									if(!$result3->num_rows == 0) {
										$row3 = $result3->fetch_assoc();

								    	$spriority3FacultyName = $row3['name'];
								    	$spriority3FacultyDepartment = $row3['department'];
								    	$spriority3FacultyProject = $row3['project'];

								    }

								    /* fetch details of third priority */
								    $sql4    = "select id,name,department,project from faculty where id=$spriority4FacultyId";
							      $result4 = $conn->query($sql4);
									if(!$result4->num_rows == 0) {
										$row4 = $result4->fetch_assoc();

								    	$spriority4FacultyName = $row4['name'];
								    	$spriority4FacultyDepartment = $row4['department'];
								    	$spriority4FacultyProject = $row4['project'];

								    }

								    /* fetch details of third priority */
								    $sql5    = "select id,name,department,project from faculty where id=$spriority5FacultyId";
							      $result5 = $conn->query($sql5);
									if(!$result5->num_rows == 0) {
										$row5 = $result5->fetch_assoc();

								    	$spriority5FacultyName = $row5['name'];
								    	$spriority5FacultyDepartment = $row5['department'];
								    	$spriority5FacultyProject = $row5['project'];

								    }
							} ?>
									<table class="table table-striped" >
										<thead style="font-size: 14px;width: 10%"><tr><th title="Field #1">Priority</th>
				                            <th style="width:18%">Name</th>
				                            <th style="width:18%">Department</th>
				                            <th style="width:64%">Tentative projects for summer internship</th>
				                        </tr></thead>
				                        <tbody id="myTable" ><tr>
				                            <td>1st</td>
				                            <?php if(!$spriority1FacultyId){ ?>
				                            <td colspan="4"> <?php echo ' Project yet not choosen';?></td>
				                            <?php }else{ ?>
				                            
				                            <td><?php echo $spriority1FacultyName; ?></td>
				                            <td><?php echo $spriority1FacultyDepartment; ?></td>
				                            <td><?php echo $spriority1FacultyProject; ?></td>
				                          	<?php } ?>
				                        </tr>
				                        <tr>
											<td >2nd</td>
				                            <?php if(!$spriority2FacultyId){ ?>
				                            <td colspan="4"> <?php echo ' Project yet not choosen';?></td>
				                            <?php }else{ ?>
				                            
				                            <td><?php echo $spriority2FacultyName; ?></td>
				                            <td><?php echo $spriority2FacultyDepartment; ?></td>
				                            <td><?php echo $spriority2FacultyProject; ?></td>
				                          	<?php } ?>
				                        </tr>
				                        <tr>
				                            <td >3rd</td>
				                            <?php if(!$spriority3FacultyId){ ?>
				                            <td colspan="4"> <?php echo 'Project yet not choosen';?></td>
				                            <?php }else{ ?>
				                            
				                            <td><?php echo $spriority3FacultyName; ?></td>
				                            <td><?php echo $spriority3FacultyDepartment; ?></td>
				                            <td><?php echo $spriority3FacultyProject; ?></td>
				                          	<?php } ?>
				                        </tr>
				                        <tr>
				                            <td >4th</td>
				                            <?php if(!$spriority4FacultyId){ ?>
				                            <td colspan="4"> <?php echo 'Project yet not choosen';?></td>
				                            <?php }else{ ?>
				                            
				                            <td><?php echo $spriority4FacultyName; ?></td>
				                            <td><?php echo $spriority4FacultyDepartment; ?></td>
				                            <td><?php echo $spriority4FacultyProject; ?></td>
				                          	<?php } ?>
				                        </tr>
				                        <tr>
				                            <td >5th</td>
				                            <?php if(!$spriority5FacultyId){ ?>
				                            <td colspan="4"> <?php echo 'Project yet not choosen';?></td>
				                            <?php }else{ ?>
				                            
				                            <td><?php echo $spriority5FacultyName; ?></td>
				                            <td><?php echo $spriority5FacultyDepartment; ?></td>
				                            <td><?php echo $spriority5FacultyProject; ?></td>
				                          	<?php } ?>
				                        </tr>
									</table>