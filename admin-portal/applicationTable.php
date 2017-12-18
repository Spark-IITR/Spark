<?php 
	
	$sql = "select id,name,cgpa,department,year,college,email,contact,dob,gender,degree,spriority1,spriority2,spriority3 from user where role='student'";
	$result = $conn->query($sql);
	
	if($result){
		if(!$result->num_rows == 0) {

            ?>
            <table class="table table-striped">
                    <thead >
                        <tr>
                            <th title="Field #1">ID</th>
                            <th title="Field #2">Name</th>
                            <th title="Field #3">Department</th>
                            <th title="Field #4">Degree</th>
                            <th title="Field #5">College</th>
                        </tr>
                    </thead>

                    <tbody id="myTable">

            <?php 
        	while($row = $result->fetch_assoc()) {
                if($row['spriority1']!=NULL || $row['spriority1']!=NULL || $row['spriority1']!=NULL ){
        		?>
                         <tr  onclick="fetch_student_detail(<?php echo $row['id']; ?>);" style="cursor: pointer;">
                            <td ><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['department']; ?></td>
                            <td><?php echo $row['degree']; ?></td>
                            <td><?php echo $row['college']; ?></td>
                        </tr>
                        
                <?php } } ?> 

                    </tbody>
                </table>
             </div>
            </div>
        </div>
    </div>

                 <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="row doctorsStudentContainer"  id="FetchDetailDiv">
                            
                        </div>
                    </div>
                </div>
	<?php }
}	        
            mysqli_close($conn);
?>


 <script>
       
    function fetch_student_detail(data){
        var id = data;
     $.ajax({
        url: 'fetchStudentDetailAdmin.php',
        data: {"id":id},
        async: true,
        type: 'POST',          

        success: function(data){
            
            $('#FetchDetailDiv').html(data);
     },
       error : function(XMLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown);
        }
        });
 }
    
   
    </script>