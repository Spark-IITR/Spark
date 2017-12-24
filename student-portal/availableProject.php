				


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
																			    <li>
																			    	<form method='post' id='spriority1Form{$row11['id']}'>
														                    			<input type='hidden' name='studentId' id='spriority1StudentId{$row11['id']}' value='{$studentRealId}' >
														                    			<div id='a'></div>
														                    			<input type='hidden' name='facultyId' id='spriority1FacultyId{$row11['id']}' value='{$row11['id']}'  >
														                    			<input type='submit' id='spriority1Button{$row11['id']}'  value='1st' > 
													                    			</form>
													                    		</li>
																			    <li>
																			    	<form method='post' id='spriority2Form{$row11['id']}'>
														                    			<input type='hidden' name='studentId' id='spriority2StudentId{$row11['id']}' value='{$studentRealId}' >
														                    			<div id='a'></div>
														                    			<input type='hidden' name='facultyId' id='spriority2FacultyId{$row11['id']}' value='{$row11['id']}'  >
														                    			<input type='submit' id='spriority2Button{$row11['id']}'  value='2nd' > 
													                    			</form>
													                    		</li>
																			    <li><button> 3rd </button></li>
																			</ul>
																		</div>
																	</td>
											                	</tr>
											                </tbody>
														


														<script>

														$(function() {
															$('#spriority1Button{$row11['id']}').click(function() {	
															 var data = $('#spriority1Form{$row11['id']}').serialize();
															 //alert(data);
															 confirm = confirm('If you want to set 1st priority for your project to {$row11['id']} ? ');
															 if(confirm==true ){
														 	 $.ajax({
														        url: 'spriority1.php',
														        data: data,
														        async: true,
																type: 'POST',          

																success: function(data){
																	//alert(data);

																	if(data=='already present'){
																		alert('Priority already choosen.');
																	}
																	if(data=='error'){
																		alert('There is some internal error.');
																	}
														    		
														     },
														       error : function(XMLHttpRequest, textStatus, errorThrown) {
														            alert('Priority Set.');
														        }
															    });
															}
															});
														});

														</script>

														<script>

														$(function() {
															$('#spriority2Button{$row11['id']}').click(function() {	
															 var data = $('#spriority2Form{$row11['id']}').serialize();
															 //alert(data);
															 confirm = confirm('If you want to set 2nd priority for your project to {$row11['id']} ? ');
															 if(confirm==true ){
														 	 $.ajax({
														        url: 'spriority2.php',
														        data: data,
														        async: true,
																type: 'POST',          

																success: function(data){
																	//alert(data);

																	if(data=='already present'){
																		alert('Priority already choosen.');
																	}
																	if(data=='error'){
																		alert('There is some internal error.');
																	}
														    		
														     },
														       error : function(XMLHttpRequest, textStatus, errorThrown) {
														            alert('Priority Set.');
														        }
															    });
															}
															});
														});

														</script>
											                 ";
											        }
											    }
											 // $result->free();
											}
											 ?>
									</table>