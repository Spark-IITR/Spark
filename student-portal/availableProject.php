				


							<table class="table table-striped">
										
				                        <?php  
										
											$sql11    = "select id,name,department,project from user where role='faculty'";
											$result11 = $conn->query($sql11);
											if($result11) {
											    if($result11->num_rows == 0) {
											        echo '<p>There are no entries in the database</p>';
											    }
											    else {
											        echo '<thead style="">
											        		<tr>
											        			<th title="Field #1">ID</th>
									                            <th title="Field #2">Name</th>
									                            <th title="Field #3">Department</th>
									                            <th title="Field #4">Research interests/Tentative projects for summer internship</th>
									                            <th title="Field #5">Set Priority</th>
								                        	</tr>
								                        </thead>';
															 
											        while($row11 = $result11->fetch_assoc()) {
											            echo "
											                <tbody id='myTable'>
											                	<tr>
												                    <td>{$row11['id']}</td>
												                    <td>{$row11['name']}</td>
												                    <td>{$row11['department']}</td>
												                    <td>{$row11['project']}</td>
												                    <td><div class='btn-group'>
																			<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
																			    Priority <span class='caret'></span>
																			</button>
																			<ul class='dropdown-menu'>
																			    <li onclick='spriority1({$row11['id']})'><a>1st</a></li>
																			    <li onclick='spriority2({$row11['id']})'><a>2nd</a></li>
																			    <li onclick='spriority3({$row11['id']})'><a>3rd</a></li>
																			    <li onclick='spriority4({$row11['id']})'><a>4th</a></li>
																			    <li onclick='spriority5({$row11['id']})'><a>5th</a></li>
																			    
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