				


							<table class="table table-hover">
										
				                        <?php  
										
											$sql    = "select id,name,department,project from faculty where role='faculty'";
											$result = $conn->query($sql);
											if($result) {
											    if($result->num_rows == 0) {
											        echo '<p>There are no entries in the database</p>';
											    }
											    else {
											        echo '<thead>
											        		<tr>
									                            <th style="width:15%">Name</th>
									                            <th style="width:15%">Department</th>
									                            <th style="width:55%">Research interests/Tentative projects for summer internship</th>
									                            <th style="width:15%">Set Priority</th>
								                        	</tr>
								                        </thead>';
															 
											        while($row = $result->fetch_assoc()) {
											            echo "
											                <tbody id='myTable'>
											                	<tr>
												                    <td>{$row['name']}</td>
												                    <td>{$row['department']}</td>
												                    <td style='list-style-type:none'>{$row['project']}</td>
												                    <td><div class='btn-group'>
																			<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
																			    Priority <span class='caret'></span>
																			</button>
																			<ul class='dropdown-menu'>
																			    <li onclick='spriority1({$row['id']})'><a>1st</a></li>
																			    <li onclick='spriority2({$row['id']})'><a>2nd</a></li>
																			    <li onclick='spriority3({$row['id']})'><a>3rd</a></li>
																			    <li onclick='spriority4({$row['id']})'><a>4th</a></li>
																			    <li onclick='spriority5({$row['id']})'><a>5th</a></li>
																			    
																			</ul>
																		</div>
																	</td>
											                	</tr>
											                	<div id='spriority1Div'></div>
											                </tbody>
														
											            ";?>

														
											                 <?php
											        }
											    }
											 $result->free();
											}

											 ?>
									</table>