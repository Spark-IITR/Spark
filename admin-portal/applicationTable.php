<?php 
	
	$sql = "SELECT id,sparkId,name,cgpa,department,year,college,email,contact,dob,gender,degree,spriority1,spriority2,spriority3,spriority4,spriority5 from student where role='student'";
	$result = $conn->query($sql);
	
	if($result){
		if(!$result->num_rows == 0) {

            ?>
            <table class="table table-striped" style="max-height: 70vh;overflow: scroll;">
                    <thead >
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Degree</th>
                            <th>C.G.P.A</th>
                        </tr>
                    </thead>

                    <tbody id="myTable">

            <?php 
        	while($row = $result->fetch_assoc()) {
                if($row['spriority1']!=NULL || $row['spriority2']!=NULL || $row['spriority3']!=NULL|| $row['spriority4']!=NULL || $row['spriority5']!=NULL ){
        		?>
                         <tr  onclick="fetch_student_detail(<?php echo $row['id']; ?>);" style="cursor: pointer;">
                            <td ><?php echo $row['sparkId']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['department']; ?></td>
                            <td><?php echo $row['degree']; ?></td>
                            <td><?php echo $row['cgpa']; ?></td>
                           
                        </tr>
                        
                <?php } } ?> 

                    </tbody>
                </table>
             
                            
                        
	<?php }
    $result->free();
}	        
            ?>

