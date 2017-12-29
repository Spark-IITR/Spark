				


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
																			    <li><a style='cursor:pointer'><span onclick='spriority1({$row11['id']})'>1st<span></a></li>
																			    <li><a style='cursor:pointer'><span onclick='spriority2({$row11['id']})'>2nd<span></a></li>
																			    
																			    
																			</ul>
																		</div>
																	</td>
											                	</tr>
											                	<div id='spriority1Div'></div>
											                </tbody>
														
											            ";?>

														<script>

															function spriority1(data){

																var facultyId = data;
																var studentId = <?php echo $studentRealId; ?> ;
															 confirm = confirm('If you want to set 1st priority for your project to <?php echo $row11['name']; ?> ? ');
															 if(confirm==true ){
														 	 $.ajax({
														        url: 'spriority1.php',
														        data: {"studentId":studentId,"facultyId":facultyId},
														        async: true,
																type: 'POST',          

																success: function(data){
																	$("#spriority1Div").html(data);
														     },
														       error : function(XMLHttpRequest, textStatus, errorThrown) {
														            alert(errorThrown+ 'Priority Set.');
														        }
															    });
															}
															}


															function spriority2(data){

																var facultyId = data;
																var studentId = <?php echo $studentRealId; ?> ;
															 confirm = confirm('If you want to set 2nd priority for your project to <?php echo $row11['name']; ?> ? ');
															 if(confirm==true ){
														 	 $.ajax({
														        url: 'spriority2.php',
														        data: {"studentId":studentId,"facultyId":facultyId},
														        async: true,
																type: 'POST',          

																success: function(data){
																	$("#spriority1Div").html(data);
														     },
														       error : function(XMLHttpRequest, textStatus, errorThrown) {
														            alert(errorThrown+ 'Priority Set.');
														        }
															    });
															}
															}

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

											                 <?php
											        }
											    }
											 // $result->free();
											}
											 ?>
									</table>